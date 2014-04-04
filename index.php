<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */

/* Load required lib files. */
session_start();
require_once('protected/extensions/yii-twitter/twitteroauth.php');
require_once('/config.php');

/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: protected/extensions/twitteroauth/clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

/* If method is set change API call made. Test is called by default. */
$content = $connection->get('account/verify_credentials');

/* Some example calls */
//$connection->get('users/show', array('screen_name' => 'abraham'));
//$connection->post('statuses/update', array('status' => date(DATE_RFC822)));
//$connection->post('statuses/destroy', array('id' => 5437877770));
//$connection->post('friendships/create', array('id' => 9436992));
//$connection->post('friendships/destroy', array('id' => 9436992));

////////////////
//require_once('protected/extentions/twitteroauth/config.php');
//if (CONSUMER_KEY === '' || CONSUMER_SECRET === '' || CONSUMER_KEY === 'wtba5sUW4hYTduVrJi23tw' || CONSUMER_SECRET === 'hj3vwsH3LSeXDooZnR3GhlhYTCOtiYkdcspLlXW4') {
//  echo 'You need a consumer key and secret to test the sample code. Get one from <a href="https://dev.twitter.com/apps">dev.twitter.com/apps</a>';
//  exit;
}

/* Build an image link to start the redirect process. */
//$content = '<a href="./redirect.php"><img src="./images/lighter.png" alt="Sign in with Twitter"/></a>';
///////////// 


/* Include HTML to display on the page */
include('html.inc');
