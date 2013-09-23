<?php

/**
 * This is the model class for table "insider".
 *
 * The followings are the available columns in table 'insider':
 * @property integer $iid
 * @property string $iname
 * @property string $ipwd
 * @property integer $istate
 * @property integer $igender
 * @property integer $irank
 * @property string $itime
 * @property integer $iage
 * @property string $iphone
 * @property string $iaddress
 * @property integer $imoney
 * @property integer $iuid
 *
 * The followings are the available model relations:
 * @property User $iu
 * @property Sale[] $sales
 */
class Insider extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Insider the static model class
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
		return 'insider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iname, ipwd, iage, iphone, iaddress,', 'required'),
			array('istate, igender, irank, iage, imoney, iuid', 'numerical', 'integerOnly'=>true),
			array('iname, ipwd, iaddress', 'length', 'max'=>59),
			array('iphone', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('iid, iname, ipwd, istate, igender, irank, itime, iage, iphone, iaddress, imoney, iuid', 'safe', 'on'=>'search'),
		//	array('repwd', 'compare', 'compareAttribute'=>'newpwd'),
			array('iname', 'unique', 'insert'),
		);
	}
//name must be unique except herself
	public function unique($attribute,$params)
	{	
		if(Yii::app()->user->name!=$this->iname){
			$record = Insider::model()->findByAttributes(array("iname"=>$this->iname));
			if($record != null) {
				$this->addError('iname','The name is occupied, please change one.');
			}
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'iu' => array(self::BELONGS_TO, 'User', 'iuid'),
			'sales' => array(self::HAS_MANY, 'Sale', 'siid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iid' => 'Insider Id',
			'iname' => 'Name',
			'istate' => 'Active State',
			'igender' => 'Gender',
			'irank' => 'Member Rank',
			'itime' => 'Register Time',
			'iage' => 'Age',
			'iphone' => 'Pnone Number',
			'iaddress' => 'Address',
			'imoney' => 'Member Card Money',
			'iuid' => 'Iuid',
			'istate'=>'Member Card State',
			'ipwd'=>"Password"
			
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

		$criteria->compare('iid',$this->iid);
		$criteria->compare('iname',$this->iname,true);
		$criteria->compare('ipwd',$this->ipwd,true);
		$criteria->compare('istate',$this->istate);
		$criteria->compare('igender',$this->igender);
		$criteria->compare('irank',$this->irank);
		$criteria->compare('itime',$this->itime,true);
		$criteria->compare('iage',$this->iage);
		$criteria->compare('iphone',$this->iphone,true);
		$criteria->compare('iaddress',$this->iaddress,true);
		$criteria->compare('imoney',$this->imoney);
		$criteria->compare('iuid',$this->iuid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function MpMember(){
		$user = User::model()->findByPK(Yii::app()->user->id);
		$user->uname = $this->iname;
		//modify user coressponding to the insider

		if($user->update()) {
			Yii::app()->user->name=$this->iname;
			$insider= Insider::model()->findByAttributes(array("iuid"=>Yii::app()->user->id));
			$insider->attributes=$this->attributes;
			if($insider->update()){
				return true;
			}
			else{
				 echo var_dump($this);
				die();
			}
		}
	}

	// public function  mpPwdModify(){
	// 	$user = User::model()->findByPK(Yii::app()->user->id);

	// 	if($user->update()) {
	// 		$insider= Insider::model()->findByAttributes(array("iuid"=>Yii::app()->user->id));
	// 		$insider->ipwd=$this->newpwd;
	// 		if($insider->update()){
	// 			return true;
	// 		}
	// 		else{
	// 			 echo var_dump($this);
	// 			die();
	// 		}
	// 	}
	// }

	public function mpAdminAddMem(){
		$user=new User;
		// $salt = $user->generateSalt();
		 $user->uname = $this->iname;
		 $user->upwd = $this->ipwd;
		 $user->udegree=0;
		// $user->password = $user->hashPassword($this->password, $salt);
		// $user->salt = $salt;
		
		if($user->save()) {
			$insider = new Insider;
			$insider->attributes = $this->attributes;
			$insider->iuid = $user->uid;
		
			date_default_timezone_set ("Asia/Shanghai");
			$insider->itime = date("y-m-d");
			
			if($insider->save()) {
				return true;
			} else {
				echo var_dump($insider);
				die();
			}
		} 
		else{
			echo var_dump($this);
			die();
		}
		return false;
	}


	public function mpAdminShow(){
		$user = User::model()->findByPK($this->iuid);
		$user->uname = $this->iname;
		$user->upwd=$this->ipwd;
		//modify user coressponding to the insider

		if($user->update()) {
			$insider= Insider::model()->findByAttributes(array("iuid"=>$this->iuid));
			$insider->attributes=$this->attributes;
			if($insider->update()){
				return true;
			}
			else{
				 echo var_dump($this);
				die();
			}
		}
	}
/////ending	
}