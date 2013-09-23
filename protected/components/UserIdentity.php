<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
	private $_id;
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * 
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		$user = User::model ()->findByAttributes ( array('uname'=>$this->username) );
		if ($user === null) {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		} else if ($user->upwd != $this->password) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else {
			$this->_id = $user->uid;
			 $Webuser = Yii::app ()->user;
			 $Webuser->setState('degree',$user->udegree);
			// switch ($->udegree) {
			// 	case User::$ADMIN:
			// 		$user->returnUrl = URLUtility::getURL("/statistics/index");
			// 		break;
			// 	case User::$STAFF:
			// 		$user->returnUrl = URLUtility::getURL("/sell/index");
			// 		break;
			// 	case User::$MENBER:
			// 		$user->returnUrl = URLUtility::getURL("/menbership/index");
			// 		break;
			// 	default:
			// 		break;
			// }

			switch ($user->udegree) {
				case 1:
					$Webuser->returnUrl = Yii::app()->createUrl('/Dessertsora/dssalesman');
					break;
				case 2:
					$Webuser->returnUrl = Yii::app()->createUrl('/dessertsora/dsadminAdd');
					break;
				case 0:
					$Webuser->returnUrl = Yii::app()->createUrl('/dessertsold/dsmember');
					break;
				default:
					break;
			}
			$this->errorCode = self::ERROR_NONE;
		}
		return ! $this->errorCode;
	}

	public function getId() {
		return $this->_id;
	}
}