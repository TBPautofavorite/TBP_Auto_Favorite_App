<?php include "protected/extensions/twitteroauth.php"; ?>
<?php  
$consumer = "IRwjT5WEXoUALEei4czUg";
$consumersecret = "UEt6lrKBj5J9tferFwwrniEtmiC983qCNpzA84FiOM";
//$accesstoken = "1836126486-hud3pfXw9TLRoFE6ajPeSGwNp3ohMv2KHGB8qQI";
//$accesstokensecret = "zmPf1cQOFfjebsN2JqSJ0itMXeeqsNyWEVZmj76ekXulV";

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