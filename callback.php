<?php
/**
 * @file
 * Take the user when they return from Twitter. Get access tokens.
 * Verify credentials and redirect to based on response from Twitter.
 */

/* Start session and load lib */
session_start();
require_once('protected/extensions/yiitwitteroauth/twitteroauth.php');
require_once('config.php');

/* If the oauth_token is old redirect to the connect page. */
// if (isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) {
//   $_SESSION['oauth_status'] = 'oldtoken';
//   header('Location: ./clearsessions.php');
// }

// /* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
// $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

// /* Request access tokens from twitter */
// $access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);

// /* Save the access tokens. Normally these would be saved in a database for future use. */ 
// $_SESSION['access_token'] = $access_token;

// /* Remove no longer needed request tokens */
// unset($_SESSION['oauth_token']);
// unset($_SESSION['oauth_token_secret']);

// /* If HTTP response is 200 continue otherwise send to connect page to retry */
// if (200 == $connection->http_code) {
//   /* The user has been verified and the access tokens can be saved for future use */
//   $_SESSION['status'] = 'verified';
//   header('Location: ./index.php');
// } else {
//   /* Save HTTP status for error dialog on connnect page.*/
//   header('Location: ./clearsessions.php');
// }

////////////////////////////

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


////////////////////////////