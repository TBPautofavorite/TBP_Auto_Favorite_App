<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SignupForm extends CFormModel
{
	public $username;

	public $email;

	public $password;

	public $twitter_id;
	
	public $oauth_token;
	
	public $oauth_token_secret;
	
	public $consumer_key;
	
	public $consumer_secret;

	public $_identity;
	//public $password;
	//public $rememberMe;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array (
                array (
                        //'username, email, password, twitter_id, oauth_token, oauth_token_secret, consumer_key, consumer_secret',
                        'username, email, password',
                        'required' 
                ),
                array (
                        'username',
                        'username' 
                ),
                array (
                        'username',
                        'unique' 
                ),
                array (
                        'email, password',
                        'length',
                        'max' => 32 
                ),
                array (
                        'username, twitter_id',
                        'length',
                        'max' => 32 
                ),

        );
	}

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array (
                'username' => 'Username',
                'email' => 'Email address',
                'password' => 'Password',
        );
    }

    /**
     * sign up
     */
    /*public function signup() {
        $user = new User();
        
        $user->attributes = $_POST ['SignupForm'];
        $user->password = User::generateHash( $user->password );
        $user->created_at = date( Constants::DATE_TIME_FORMAT );
        if( $user->validate() ) {
            $user->save();
        }
        
        $this->_identity = new UserIdentity( $user->email, $user->password );
    }*/

    //=================================================

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	//original
/*	public function login()
	{
		if($this-> _identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}*/

	public function signupWithTwitter() 
	{

		$user = new User();



        $config = array (
        		'oauth_token' => Yii::app()->params ['oauth_token'],
        		'oauth_token_secret' => Yii::app()->params ['oauth_token_secret'],
        		'username' => Yii::app()->params ['username'],
        		'twitter_id' => Yii::app()->params ['twitter_id'],
        		'comsumer_key' => Yii::app()->params ['consumer_key'],
        		'comsumer_secret' => Yii::app()->params ['consumer_secret'],

                // 'appId' => Yii::app()->params ['fbAppId'],
                // 'secret' => Yii::app()->params ['fbAppSecret'],
                // 'fileUpload' => false  // optional
        );
        
        $twitter = new Twitter($config);

        if( $this->_identity === null && $twitter->getUser() ) {
            $this->_identity = new TWUserIdentity( $twitter->getUser() );
            $this->_identity->authenticate();
        }
        
        return $this->login();
    }

}
