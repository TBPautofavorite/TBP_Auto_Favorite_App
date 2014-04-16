<?php

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

?>