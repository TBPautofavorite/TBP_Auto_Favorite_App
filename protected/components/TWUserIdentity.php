<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class TWUserIdentity extends CUserIdentity
{

	public $username;
	public $password;

	// don't have UserIdentity anymore, which already had a constructor function for $username and $password from CUserIdentity
	public $twitter_id;
	public $oauth_token;
	public $oauth_token_secret;

	public $email; //we'll have users add in an email address after authenticating with Twitter

	public function __construct($twid, $userHandle, $userPass, $oToken, $oTokenSecret)
	{
		$this->twitter_id = $twid;
		$this->username = $userHandle;
		$this->password = $userPass;
		$this->oauth_token = $oToken;
		$this->oauth_token_secret = $oTokenSecret;
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
	            'twitter_id' => $record->twitter_id,
	            'oauth_token' => $record->oauth_token,
	            'oauth_token_secret' => $record->oauth_token_secret
            ));
            $this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

    //Override the CUserIdentity::getId() method to return the _id property because the default implementation returns the username as the ID
    //public function getId()
    //{
    //    return $this->_id;
    //}

}
