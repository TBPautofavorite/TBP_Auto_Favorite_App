<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
		echo "SiteController actionIndex";
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
/*	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		*/$this->render('login',array('model'=>$model));
	}

	public function actionLogin()
	{

	$identity=new UserIdentity($username,$user_id,$oauth_token,$oauth_token_secret);
	if($identity->authenticate()) 
	    Yii::app()->user->login($identity,3600*24*30); //Keep the user logged in for 30 days (cookie-based login)
	else
	    echo $identity->errorMessage;

	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


	
	public function actionTwitterCallBack() {   
        /* If the oauth_token is old redirect to the connect page. */
        if (isset($_REQUEST['oauth_token']) && Yii::app()->session['oauth_token'] !== $_REQUEST['oauth_token']) {
            Yii::app()->session['oauth_status'] = 'oldtoken';
        }
 
        /* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
        $twitter = Yii::app()->twitter->getTwitterTokened(Yii::app()->session['oauth_token'], Yii::app()->session['oauth_token_secret']);   
 
        /* Request access tokens from twitter */
        $access_token = $twitter->getAccessToken($_REQUEST['oauth_verifier']);
 
        /* Save the access tokens. Normally these would be saved in a database for future use. */
        Yii::app()->session['access_token'] = $access_token;
 
        /* Remove no longer needed request tokens */
        unset(Yii::app()->session['oauth_token']);
        unset(Yii::app()->session['oauth_token_secret']);
 
        if (200 == $twitter->http_code) {
            /* The user has been verified and the access tokens can be saved for future use */
            Yii::app()->session['status'] = 'verified';
 
            //get an access twitter object
            $twitter = Yii::app()->twitter->getTwitterTokened($access_token['oauth_token'],$access_token['oauth_token_secret']);
 
            //get user details
            $twuser= $twitter->get("account/verify_credentials");
            //get friends ids
            $friends= $twitter->get("friends/ids");
                        //get followers ids
                $followers= $twitter->get("followers/ids");
            //tweet
                        $result=$twitter->post('statuses/update', array('status' => "Tweet message"));
 
        } else {
            /* Save HTTP status for error dialog on connnect page.*/
            //header('Location: /clearsessions.php');
            $this->redirect(Yii::app()->homeUrl);
        }
    }
	
}