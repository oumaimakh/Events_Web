<?php 
	require 'cnx.php';
	$login=$_REQUEST['login'];
	$password=$_REQUEST['password'];
	$req="select * from admin where login='$login' and password='$password'";
	$res=mysqli_query($conn ,$req);
	$ligne=mysqli_fetch_array($res);
	if($ligne){
		session_start();
		$_SESSION['login']=$login;
		$_SESSION['password']=$password;
		echo 'admin' ;
	}else{
		echo 'no admin';
	}

?>