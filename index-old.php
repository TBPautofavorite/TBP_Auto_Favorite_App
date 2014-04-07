<?php include "protected/extensions/twitteroauth.php"; ?>
<?php  
$consumer = "wtba5sUW4hYTduVrJi23tw";
$consumersecret = "hj3vwsH3LSeXDooZnR3GhlhYTCOtiYkdcspLlXW4";
$accesstoken = "1836126486-AXX1eQCw5gIzBf5yM3H65YmCnAy5il9i5p9tONf";
$accesstokensecret = "MIQKMc5eVOioajDSLSjN1olnQLiIKtrvb9x9FcTEQ4Z6X";

$twitter = new TwitterOAuth($consumer, $consumersecret, $accesstoken, $accesstokensecret);

?>
<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../YiiRoot/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();