<?php 
	require 'cnx.php';
	$id=$_GET['id'];
	$mail=$_GET['mail'];
	$req="delete from inscription where idinscription='$id'";
	mysqli_query($conn ,$req);
	session_start();
	$_SESSION['mail']=$mail;
	header('Location: reservations.php');
	

?>