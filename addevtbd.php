<?php
 require 'cnx.php';
	$title=$_POST["title"];
	$description=$_POST["description"];
	$date=$_POST["date"];
	$debut=$_POST["debut"];
	$fin=$_POST["fin"];
	$prix=$_POST["prix"];
	$categorie=$_POST["categorie"];
	$lieu=$_POST["lieu"];
	$rep="insert into evenement (title, description, debut, fin, categorie, prix, lieu, date_event) values ('$title','$description', '$debut','$fin','$categorie','$prix','$lieu', '$date')";
	$result=mysqli_query($conn,$rep);
	mysqli_close($conn);
	
?>
