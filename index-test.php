<?php
/**
 * This is the bootstrap file for test application.
 * This file should be removed when the application is deployed for production.
 */

// change the following paths if necessary
$yii=dirname(__FILE__).'/../YiiRoot/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/test.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
Yii::createWebApplication($config)->run();

<!--

//PHP for Twitter Search API:
/*
<?php include "library/twitteroauth.php"; ?>
<?php  
$consumer = "IRwjT5WEXoUALEei4czUg";
$consumersecret = "UEt6lrKBj5J9tferFwwrniEtmiC983qCNpzA84FiOM";
$accesstoken = "1836126486-hud3pfXw9TLRoFE6ajPeSGwNp3ohMv2KHGB8qQI";
$accesstokensecret = "zmPf1cQOFfjebsN2JqSJ0itMXeeqsNyWEVZmj76ekXulV";

$twitter = new TwitterOAuth($consumer, $consumersecret, $accesstoken, $accesstokensecret);

?>
<html>
	<head>
		<meta charset="UTF-8" />	
		<title>DiBaggio / Twitter Auto Favorite</title>
	</head>
	<body>
	<form action="" method="post">
		<label>Search : </label><input type="text" name="keyword" /></label>
	</form>
	<!-- <?php print_r($tweets);?> -->
	<?php 
	if (isset($_POST['keyword']) ) {
		$tweets = $twitter->get ('https://api.twitter.com/1.1/search/tweets.json?q='.$_POST['keyword'].'&result_type=recent&count=50');
 		$hashtags = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$_POST['keyword'].'&result_type=recent&count=3&include_entities=true');
 		// This one:
 		foreach($tweets as $tweet) {
 			foreach($tweet as $t) {
 				echo '<img src="'.$t->user->profile_image_url.'" /> '.$t->text .'<br>.';
 			}
 		}
 		// Or this one?:
 		//foreach($tweets->statuses as $tweet){
		//	echo '<img src="'.$tweet->user->profile_image_url.'" /> '.$tweet->text.'<br>';
		//}﻿
		// To view hastag photo:
		foreach ($hashtags->statuses as $tweet) {
    		echo "Tweet : ".$tweet->text."<br>";
   			if ( $tweet->entities->media[0]->media_url) {
   				echo "Media : ".$tweet->entities->media[0]->media_url."<br>";
   			}
   		}
 	}
	?>
	</body>
</html>
*/

-->