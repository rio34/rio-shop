<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "eshopper";
$url	  = 'http://localhost/eshopper';
$connect = mysqli_connect($host, $username, $password, $database);

if(!isset($_COOKIE["user_session"])){
	setcookie("user_session", "$session_id", time()+86400*30*12 );
	header("location:index.php");
	exit();
}else{
	$cookie_id =  $_COOKIE["user_session"];
}
?>