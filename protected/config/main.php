<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

define('CONSUMER_KEY', 'wtba5sUW4hYTduVrJi23tw');
define('CONSUMER_SECRET', 'hj3vwsH3LSeXDooZnR3GhlhYTCOtiYkdcspLlXW4');
define('OAUTH_CALLBACK', 'http://www.tbpautofavorite.dev/index.php/user/twittercallback');

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
			//'ipFilters'=>array('127.0.0.1','::1'),
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
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>'=>'<controller>/list',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                '<controller:\w+>/<id:\d+>/<title>'=>'<controller>/view',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
			),
		),
		
		/* for MySQL database */
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=tbp_auto_favorite',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
			//uncomment so if in the future we need to modify the table name prefix without touching our source code
			//'tablePrefix' => 'tbl_',
		),
		/* database is located in /Applications/MAMP/db/mysql/tbp_auto_favorite/ */
		
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
		
		/* added for yii twitter extension */
		//For Single Sign ON (SSO)
		'twitter' => array(
			'class' => 'ext.yiitwitteroauth.YiiTwitter',
            'consumer_key' => 'wtba5sUW4hYTduVrJi23tw',
            'consumer_secret' => 'hj3vwsH3LSeXDooZnR3GhlhYTCOtiYkdcspLlXW4',
            'callback' => 'http://www.tbpautofavorite.dev/index.php/user/twittercallback'
			)

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'jsantoku@gmail.com'
        //'CONSUMER_KEY' => 'wtba5sUW4hYTduVrJi23tw',
        //'CONSUMER_SECRET' => 'hj3vwsH3LSeXDooZnR3GhlhYTCOtiYkdcspLlXW4',
        //'OAUTH_CALLBACK' => 'http://www.tbpautofavorite.dev/index.php/user/twittercallback'
	)

);






