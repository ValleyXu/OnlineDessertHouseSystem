<?php

/**
 * 
 */
class PwdModify extends CFormModel
{
	public static $isModi=0;
	public $newpwd;
	public $ipwd;
	public $repwd;
	public $_identity;
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('ipwd, newpwd,repwd', 'required'),
			// password needs to be authenticated
			array('ipwd', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'newpwd'=>'New Password',
			'repwd'=>'Confirm New Password',
			'ipwd' => 'Original Password',

		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		$this->_identity=new UserIdentity(Yii::app()->user->name,$this->ipwd);
		if(!$this->_identity->authenticate())
			$this->addError('ipwd','Incorrect original password.');
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function mpPwdModify()
	{
		$user = User::model()->findByPK(Yii::app()->user->id);
		$user->upwd=$this->newpwd;
		if($user->update()) {
			$insider= Insider::model()->findByAttributes(array("iuid"=>Yii::app()->user->id));
			$insider->ipwd=$this->newpwd;
			if($insider->update()){
				//$isModi=1;
				return true;
			}
			else{
				echo "fail";
				 echo var_dump($this);

				die();
			}
		}

	}
}
