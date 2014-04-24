<?php

/* Let's connect to MySQL and our twitter app database */

$username = "root";
$password = "root";
$hostname = "localhost"; 
$database_name = "tbp_auto_favorite";

//connect to the database
//echo "Let's try to connect to MySQL..." . "<br/>";
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");
//echo "Connected to MySQL" . "<br/>";

//select a database to work with
$selected = mysql_select_db($database_name,$dbhandle) 
  or die("Could not select " . $database_name);
//echo "Connected to database: " . $database_name . "<br/>";

//make new variables for auth and set them equal to those in the access_token array assigned when the user logs in with twitter
$callback_oauth_token = $access_token['oauth_token'];
$callback_oauth_token_secret = $access_token['oauth_token_secret'];
$callback_user_id = $access_token['user_id'];
$callback_screen_name = $access_token['screen_name'];
//====//
$temporary_search_tag = "#thinkbig";

//add our new variable values to the tbp_auto_favorite database
$input_user_data = mysql_query("INSERT INTO tbl_user
	(username, user_id, oauth_token, oauth_token_secret, search_tag_1) 
	VALUES 
	('$callback_screen_name','$callback_user_id','$callback_oauth_token','$callback_oauth_token_secret','$temporary_search_tag')
	");
	//ignore id (the primary key) because it auto-increments

//execute the SQL query and return records
/*
$result = mysql_query("SELECT id, username, oauth_token, oauth_token_secret FROM tbl_user");

//fetch tha data from the database 
while ($row = mysql_fetch_array($result)) {
   echo "ID: ".$row{'id'}." Username: ".$row{'username'}." Oauth Token: ".$row{'oauth_token'}."Oauth Token Secret: ".$row{'oauth_token_secret'}."<br/>"; //display the results
}
*/

//add new searchtag to tbl_searchtag
/*
$input_search_data = mysql_query("INSERT INTO tbl_searchtag
	(search_tag, user_id, username)
	VALUES
	('$temporary_search_tag','$callback_user_id','$callback_screen_name')
	");
	//ignore id (the primary key) because it auto-increments
*/

//close the connection
mysql_close($dbhandle);