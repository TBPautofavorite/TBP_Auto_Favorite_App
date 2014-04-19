<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $user_id;
	public $oauth_token;
	public $oauth_token_secret;
	public $consumer_key;
	public $consumer_secret;

	
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

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
	public function login()
	{
		if($this->_identity===null)
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
	}

	public function loginWithTwitter() 
	{
        $config = array (
        		'oauth_token' => Yii::app()->para,s ['oauth_token'],
        		'oauth_token_secret' => Yii::app()->para,s ['oauth_token_secret'],
        		'username' => Yii::app()->para,s ['username'],
        		'user_id' => Yii::app()->para,s ['user_id'],
        		'comsumer_key' => Yii::app()->para,s ['consumer_key'],
        		'comsumer_secret' => Yii::app()->para,s ['consumer_key_secret'],

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
