<?php
 require 'cnx.php';

	$title=$_POST["title"]; 
	$id=$_POST["id"]; 
	$description=$_POST["description"]; 
	$debut=$_POST["debut"];
	$fin=$_POST["fin"];
	$prix=$_POST["prix"];
	$categorie=$_POST["categorie"];
	$lieu=$_POST["lieu"];
	$rep="update evenement set title='$title', description='$description', debut='$debut', fin='$fin', prix='$prix', categorie='$categorie', lieu='$lieu' where idevt='$id'";
	$result=mysqli_query($conn,$rep);
	mysqli_close($conn);
?>
