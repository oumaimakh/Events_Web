<?php
 require 'cnx.php';
	$id=$_GET['id'];

	$rep="delete from evenement where idevt='$id'";
	$result=mysqli_query($conn,$rep);
	mysqli_close($conn);
	header('Location:welcome.php');
?>
