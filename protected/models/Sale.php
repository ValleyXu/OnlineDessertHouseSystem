<?php

/**
 * This is the model class for table "sale".
 *
 * The followings are the available columns in table 'sale':
 * @property integer $sid
 * @property integer $siid
 * @property integer $sgid
 * @property integer $snum
 * @property string $stime
 *
 * The followings are the available model relations:
 * @property Goods $sg
 * @property Insider $si
 */
class Sale extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sale the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sale';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('siid, sgid', 'required'),
			array('siid, sgid, snum', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sid, siid, sgid, snum, stime', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'sg' => array(self::BELONGS_TO, 'Goods', 'sgid'),
			'si' => array(self::BELONGS_TO, 'Insider', 'siid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sid' => 'Sid',
			'siid' => 'Siid',
			'sgid' => 'Sgid',
			'snum' => 'Number',
			'stime' => 'Stime',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('sid',$this->sid);
		$criteria->compare('siid',$this->siid);
		$criteria->compare('sgid',$this->sgid);
		$criteria->compare('snum',$this->snum);
		$criteria->compare('stime',$this->stime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function buy(){
		$good=Goods::model()->findByPk($this->sgid);
		$member=Insider::model()->findByPk($this->siid);
		$pay=$good->gprice;

		if($member->irank==0)
			$pay*=0.9;
		else if($member->irank==1)
			$pay*=0.8;
		else
			$pay*=0.7;

		if(($this->snum)>($good->gaccess))
		{
			
			echo "<p style='color:#EA0000' class='msg'>Sorry, there are not enough cakes! </p>";
		}
		else if($member->istate!=2)
		{
			echo "<p style='color:#EA0000' class='msg'>Sorry, member card is not actived! </p>";					
		}
		else if(($this->snum*$pay)>$member->imoney)
		{	
			$mon = $this->snum*$pay;
			$avail = $member->imoney;
			echo "<p style='color:#EA0000' class='msg'>Sorry,there's not enough money in  member card ! $mon and $avail</p>";		
		
		}
		else{
			if($this->stime==-1){
				date_default_timezone_set ("Asia/Shanghai");
				$this->stime = date("y-m-d");
			}
			if($this->save()){
				$good->gaccess-=$this->snum;
				$member->imoney-=($this->snum*$good->gprice);
				if($good->update()&&$member->update())
					//$this->render
					echo "<p style='color:#EA0000' class='msg'>Buy sucessfully! </p>";	
					return true;	
			}
		}
	}
}