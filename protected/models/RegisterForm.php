<?php

/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user register form data. It is used by the 'register' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $iname;
	public $ipwd;
	public $rePassword;

	public $igender;
	public $iage;
	public $iaddress;
	public $iphone;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('iname, ipwd, rePassword, iaddress, iphone', 'required'),
			//
			array('iname', 'unique'),
			//age and sex must be numerical
			array('iage, igender', 'numerical'),
			// password needs to be authenticated
			array('rePassword', 'compare', 'compareAttribute'=>'ipwd'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'iname'=>'UserName',
			'ipwd'=>'Passwoed',
			'rePassword'=>'Confirm Password',
			'igender' => 'Gender',
			'iage' => 'Age',
			'iaddress' => 'Address',
			'iphone' => 'Phone Number',
		);
	}

	public function unique($attribute,$params)
	{
		$record = User::model()->findByAttributes(array("uname"=>$this->iname));
		if($record != null) {
			$this->addError('iname','The name is occupied, please change one.');
		}
	}
	
	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function register()
	{
		$user=new User;
		// $salt = $user->generateSalt();
		 $user->uname = $this->iname;
		 $user->upwd = $this->ipwd;
		 $user->udegree=0;
		// $user->password = $user->hashPassword($this->password, $salt);
		// $user->salt = $salt;
		
		if($user->save()) {
			$insider = new Insider;
			$insider->iuid = $user->uid;
			$insider->attributes = $this->attributes;
		
			date_default_timezone_set ("Asia/Shanghai");
			$insider->itime = date("y-m-d");
			
			if($insider->save()) {
				return true;
			} else {
				// echo var_dump($this);
				die();
			}
		}
		
		return false;
	}
}
