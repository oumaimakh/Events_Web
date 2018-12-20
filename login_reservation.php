<?php 
	require 'cnx.php';
	$mail=$_REQUEST['mail'];
	$code=$_REQUEST['code'];
	$req="select * from inscrit where adresse='$mail' and code='$code'";
	$res=mysqli_query($conn ,$req);
	$ligne=mysqli_fetch_array($res);
	if($ligne){
		echo 'approved';
		session_start();
		$_SESSION['mail']=$mail;
	}else{
		echo 'vide';
	}

?>