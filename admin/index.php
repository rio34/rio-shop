<?php
session_start();
if ($_SESSION['admin']) {
	header("Location: page/");
}else{
	header ("Location:login.php");
}
?>