<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Twitter Auto Favorite',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		//
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'root',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		//
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		//'db'=>array(
		//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/twitterAutoFavorite.db',
		//),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=twitterAutoFavorite',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);





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