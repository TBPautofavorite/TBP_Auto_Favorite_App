<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
///
require_once('protected/extensions/yiitwitteroauth/twitteroauth.php');
require_once('protected/config/config.php');
///
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

//=====================================================
/* new attempt for twitter auth */
	
	// public function athenticate()
	// {

	// 	/* Build TwitterOAuth object with client credentials. */
	// 	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
 
	// 	/* Get temporary credentials. */
	// 	$request_token = $connection->getRequestToken(OAUTH_CALLBACK);

	// 	/* Save temporary credentials to session. */
	// 	$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
	// 	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
		 
	// 	/* If last connection failed don't display authorization link. */
	// 	switch ($connection->http_code) {
	// 	  case 200:
	// 	    /* Build authorize URL and redirect user to Twitter. */
	// 	    $url = $connection->getAuthorizeURL($token);
	// 	    header('Location: ' . $url); 
	// 	    break;
	// 	  default:
	// 	    /* Show notification if something went wrong. */
	// 	    echo 'Could not connect to Twitter. Refresh the page or try again later.';
	// 	}


	// }



//=====================================================
//Original:
	public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
}



//=====================================================
/* From internet tutorial
{
    private $_id;
 
    public function authenticate()
    {
        $username=strtolower($this->username);
        $user=User::model()->find('LOWER(username)=?',array($username));
        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!$user->validatePassword($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$user->id;
            $this->username=$user->username;
            $this->errorCode=self::ERROR_NONE;
        }
        return $this->errorCode==self::ERROR_NONE;
    }
 
    //below, we override the getId() method which returns the id value of the user found in the tbl_user table. The parent implementation would return the username, instead. Both the username and id properties will be stored in the user session and may be accessed via Yii::app()->user from anywhere in our code.
    public function getId()
    {
        return $this->_id;
    }
}

*/