<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class TWUserIdentity extends UserIdentity
{
	///////////////////////
	require_once('protected/extensions/yiitwitteroauth/twitteroauth.php');
	require_once('protected/config/config.php');
	///////////////////////
	public $twitter_id;

	public function __construct($twid)
	{
		$this->twitter_id = $twid;
	}
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
		$record = User::model()->findByAttributes(array('twitter_id' => $this->twitter_id));
		if($record === null)
			$this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
		else {
			$this->_id=$record->ID;
			$this->setState('admin', $record->admin);
			$this->setPersistentStates(array(
                'username' => $record->username,
	            'user_id' => $record->user_id,
	            'oauth_token' => $record->oauth_token,
	            'oauth_token_secret' => $record->oauth_token_secret
            ));
            $this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

}
