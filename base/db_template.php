<?php  // make a copy of this template and rename to db.php
session_start();
// DB connection
$db_host = 'localhost';
$db_name = 'DBname';
$db_user = 'DBuser';
$db_pass = 'DBpwd';

//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
error_reporting(E_ERROR);
date_default_timezone_set("America/Los_Angeles");

//Create mysqli object
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);

function echoDEBUG($s) { if (isAdmin()) echo "<p class='warningMsg'>$s</p>\n"; }

//Error handler
if($mysqli->connect_error){
	printf("DB connection failed: %s\n",$mysqli->connect_error);
	exit;
}
?>
