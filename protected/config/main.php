<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

//path to Yii-Bootstrap library
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');


// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'TBP Automated Social Marketing',
	
	// to user Bootstrap in the application
	'theme'=>'bootstrap',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*', //added this to import the libraries we've added
	),
	
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'root',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
	),

	// application components
	'components'=>array(
		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
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

		'twitter'=>array(
			'class' => 'ext.yiitwitteroauth.YiiTwitter',
			//these are defined below within the params array
			'consumer_key' => Yii::app()->params['consumerKey'], 
			'consumer_secret' => Yii::app()->params['consumerSecret'],
			'callback' => Yii::app()->params['oauthCallback']
		)
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
	    'adminEmail'=>'jsantoku@gmail.com',
	    // these are for the twitter app
	    'class' => 'ext.yiitwitteroauth.YiiTwitter',
        'consumerKey' => 'wtba5sUW4hYTduVrJi23tw', 
        'consumerSecret' => 'hj3vwsH3LSeXDooZnR3GhlhYTCOtiYkdcspLlXW4',
        'oauthCallback' => 'http://www.tbpautofavorite.dev/index.php/user/twittercallback',
        'companyName'=>'John DiBaggio',
	)

	/* added for requiring users to login to access almost all of the site's content */
	//This will apply to entire application, not a specific component or module
	//This code associates one class with the onBeginRequest behavior, so every time a request is made, an instance of the RequireLogin class should be created.
/*	'behaviors' => array(
	    'onBeginRequest' => array(
	        'class' => 'application.components.RequireLogin'
	    )
	),*/


);






