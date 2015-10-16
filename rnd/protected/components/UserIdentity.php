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
	private $_id;
	public function authenticate()
	{
		// $users=array(
		// 	// username => password
		// 	'demo'=>'demo',
		// 	'admin'=>'admin',
		// );

		//$userUser = User_user::model()->findByAttributes(array('Paid_user_email'=>$this->username,'session_password'=>$this->password));
		$userUser = User_user::model()->find("Paid_user_email=?",array($this->username));
		if($userUser === null){
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}else if($userUser->session_password !== trim($this->password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			$this->_id = $userUser['first_name'];
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;

	}
	public function getId(){
		return $this->_id;
	}
}