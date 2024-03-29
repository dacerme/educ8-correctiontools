<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = User::model()->find('username=:username and password=:password',array(':username'=>$this->username,':password'=>md5($this->password)));
		if($user === null){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else{
			$userplus = UserPlus::model()->find('uid=:uid',array(':uid'=>$user->uid));
			$userinfo=array(
				'uid'=>$user->uid,
				'username'=>$user->username,
				'email'=>$user->email,
				'group'=>$userplus->groupid
			);
			Yii::app()->user->setState('userinfo',$userinfo);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}