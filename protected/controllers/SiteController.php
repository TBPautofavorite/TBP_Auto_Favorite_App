<?php
require_once('./protected/extensions/yiitwitteroauth/twitteroauth.php');
require_once('./protected/config/main.php');
require_once('./protected/extensions/yiitwitteroauth/YiiTwitter.php');
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions() {
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
	public function actionIndex() {
       /* if( !Yii::app()->user->getIsGuest() ) {
            // get login user info
            $id = Yii::app()->user->getId();
            $user = User::model()->findByPk( $id );
            echo $id;
            echo $user;
           }*/
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php

		$this->render('index');
		/* Build an image link to start the redirect process. */
		$content = '<a href="http://www.tbpautofavorite.dev/index.php/site/twitterredirect"><img src="./images/lighter.png" alt="Sign in with Twitter"/></a>
					<br/>
					<a href="http://www.tbpautofavorite.dev/index.php/site/twitterredirect"><img src="./images/sign_up_with_twitter.png" alt="Sign up with Twitter"/></a>';
		echo $content;


	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {
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
	public function actionContact() {
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
	public function actionLogin() {
	//Here, we first create a LoginForm model instance; if the request is a POST request (meaning the login form is submitted), we populate $model with the submitted data $_POST['LoginForm']; we then validate the input and if successful, redirect the user browser to the page that previously needed authentication. If the validation fails, or if the action is initially accessed, we render the login view whose content is to be described in the next subsection.
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
			$model->attributes=$_POST['LoginForm']; //this line of code populates the model with the user submitted data
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionTwitterRedirect() {
    	$connection = new TwitterOAuth(Yii::app()->params['consumerKey'], Yii::app()->params['consumerSecret']);

		$request_token = $connection->getRequestToken(Yii::app()->params['oauthCallback']);

		$redirect_url = $connection->getAuthorizeURL($request_token);

		Yii::app()->session['oauth_token'] = $token = $request_token['oauth_token'];
		Yii::app()->session['oauth_token_secret'] = $request_token['oauth_token_secret'];

		/* If last connection failed don't display authorization link. */
			switch ($connection->http_code) {
			case 200:
			    /* Build authorize URL and redirect user to Twitter. */
			    $url = $connection->getAuthorizeURL($token);
			    header('Location: ' . $url); 
			    break;
			 default:
			    /* Show notification if something went wrong. */
			    echo 'Could not connect to Twitter. Refresh the page or try again later.';
		}

    }

}