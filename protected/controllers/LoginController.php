<?php 
class LoginController extends Controller {
	/* 
	* Declares class-based actions.
	* This controller is for already existing users first making accounts.
	* It must make sure that users already exist.
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

	public function actionIndex() {
		// url here is http://www.tbpautofavorite.dev/index.php/Login/index
		echo "Login Controller actionIndex";

	}

	public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect( Yii::app()->homeUrl );
    }

	public function actionTwitter() {
		$config = array (
			'appId' => Yii::app()->params['consumerKey'];
			'secret' => Yii::app()->params['consumerSecret'];
		);

		$twitter = new Twitter($config);

		print_r( $twitter->getUser() );
	}

}

 ?>