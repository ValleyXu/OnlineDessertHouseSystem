<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $uid
 * @property string $uname
 * @property string $upwd
 * @property integer $udegree
 *
 * The followings are the available model relations:
 * @property Insider[] $insiders
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uname, upwd, udegree', 'required'),
			array('udegree', 'numerical', 'integerOnly'=>true),
			array('uname, upwd', 'length', 'max'=>59),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, uname, upwd, udegree', 'safe', 'on'=>'search'),
			array('iname', 'unique'),
		);
	}

	public function unique($attribute,$params)
	{
		$record = User::model()->findByAttributes(array("uname"=>$this->uname));
		if($record != null) {
			$this->addError('uname','The name is occupied, please change one.');
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
			'insiders' => array(self::HAS_MANY, 'Insider', 'iuid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => 'Uid',
			'uname' => 'User Name',
			'upwd' => 'Password',
			'udegree' => 'Identity',
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

		$criteria->compare('uid',$this->uid);
		$criteria->compare('uname',$this->uname,true);
		$criteria->compare('upwd',$this->upwd,true);
		$criteria->compare('udegree',$this->udegree);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function mpAdminAddSorA(){
		$user=new User;
		$user->attributes=$this->attributes;
		if($user->save()){
			return true;
		}
		else{
			echo var_dump($$user);
			die();
		}
	}

	public function mpAdminDel($nameDel){
		$model=User::model()->findByAttributes(array("uname"=>$nameDel));
		if($model==null){
			echo "<p style='color:#EA0000' class='msg'>No Such User!</p>";
		}
		else{
			if($model->delete()){
				echo "<p style='color:#EA0000' class='msg'>Delete Suscessfully!</p>";
			}else{
				echo var_dump($model);
				die();
			}
		}
	}
	

	/////ending
}