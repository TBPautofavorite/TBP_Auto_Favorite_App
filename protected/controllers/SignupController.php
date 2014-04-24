<?php 
class SignupController extends Controller {
	/* 
	* Declares class-based actions.
	* This controller is for new users first making accounts.
	* It must make sure that users don't already exist.
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
	 * This is the default 'index' action that is invoked when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		// url here is http://www.tbpautofavorite.dev/index.php/Signup/index
		if( isset(Yii::app()->user->id) ) {
			$this->redirect( '/' ); //what is the '/' for??
		}

		$loginForm = new LoginForm();

		if( $loginForm->loginWithTwitter() ) {
			$this->redirect( '/' );
		}

		$model = new SignupForm();

		// if it is ajax validation request
		/*if( isset( $_POST ['ajax'] ) && $_POST ['ajax'] === 'signup-form' ) {
			echo CActiveForm::validate( $model );
			Yii::app()->end();
		}*/

		// need Twitter authentication now

	}

}

 ?>