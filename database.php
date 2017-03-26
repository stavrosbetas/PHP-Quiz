<?php
// Create Connection Credentials

$db_host = 'db14.papaki.gr:3306';
$db_name = 'z57346stav_quizzer';
$db_user = 'z5734_quizzer';
$db_pass = 'O5wsc&81';

//Create the MySQLi object

$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);

//Error Handler(Show error if connection failed) Object Oriented Programming when it has arrows

if($mysqli->connect_error){
	printf("Connection failed: %s\n", $mysqli->connect_error);
	exit();
}