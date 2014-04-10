<?php

/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */
//=====================================================
/* Load required lib files. */
session_start();
require_once('protected/extensions/yiitwitteroauth/twitteroauth.php');
require_once('protected/config/config.php');

// //=====================================================
// /* Set keys */
// $consumerKey = 'wtba5sUW4hYTduVrJi23tw';
// $consumerSecret = 'hj3vwsH3LSeXDooZnR3GhlhYTCOtiYkdcspLlXW4';

// //=====================================================
// /* If access tokens are not available redirect to connect page. */
// if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
//     header('Location: clearsessions.php');
// }
// /* Get user access tokens out of the session. */
// $access_token = $_SESSION['access_token'];

// /* Create a TwitterOauth object with consumer/user tokens. */
// $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

// /* If method is set change API call made. Test is called by default. */
// $content = $connection->get('account/verify_credentials');

/* print_r($access_token);
	//sample output:
	Array ( [oauth_token] => 2413183478-qOr4pehWlrbdsiftS25ywmbS0ndSeGs1HvVmdvN
			[oauth_token_secret] => 9hscTvxLC6TMMIjfjlC2LOdbooa2xwNQKOKqyiOWEEiez
			[user_id] => 2413183478
			[screen_name] => JohnSantoKU ) */

//===================================================
/* This is a trial for posting a single tweet for the user signing in */
/*$accessToken = $access_token['oauth_token'];
$accessTokenSecret = $access_token['oauth_token_secret'];

// Create object
$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

// Set status message
$tweetMessage = 'This is a tweet to my Twitter account via PHP.';

// Check for 140 characters
if(strlen($tweetMessage) <= 140)
{
    // Post the status message
    $tweet->post('statuses/update', array('status' => $tweetMessage));
}*/
//retweet not working yet
//$retweetResult = $tweet->post('statuses/retweet/'.$postID);

//=====================================================
/* Some example calls */
//$connection->get('users/show', array('screen_name' => 'dibaggioj'));
//$connection->post('statuses/update', array('status' => date(DATE_RFC822)));
//$connection->post('statuses/destroy', array('id' => 5437877770));
//$connection->post('friendships/create', array('id' => 9436992));
//$connection->post('friendships/destroy', array('id' => 9436992));

//============================================
/*
$arr[status]=urlencode("hi, testing api");
//$connection=getConnectionWithAccessToken("XXX","XXX");
$content = $connection->get('users/show', array('statuses/update', $arr));
var_export($connection->http_info);
*/

//============================================
/* This is taken from connect.php */
require_once('protected/config/config.php');
if (CONSUMER_KEY === '' || CONSUMER_SECRET === '' || CONSUMER_KEY === 'CONSUMER_KEY_HERE' || CONSUMER_SECRET === 'CONSUMER_SECRET_HERE') {
  echo 'You need a consumer key and secret to test the sample code. Get one from <a href="https://dev.twitter.com/apps">dev.twitter.com/apps</a>';
  exit;
}

/* Build an image link to start the redirect process. */
$content = '<a href="./redirect.php"><img src="./images/lighter.png" alt="Sign in with Twitter"/></a>';
/////////////// 


$yii=dirname(__FILE__).'/../YiiRoot/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();

//============================================
/* Include HTML to display on the page */ 
include('html.inc');

?>
