<?php 
	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['password']);
	session_destroy();
	header("Location: welcome.php");

?>