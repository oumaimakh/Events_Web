<?php
 require 'cnx.php';
	$nom=$_REQUEST['nom'];
	$prenom=$_REQUEST['prenom'];
	$mail=$_REQUEST['mail'];
	$id=$_REQUEST['id'];
	//chercher si l'utilisateur est déjà inscrit à l'événement
	$rep="select * from inscrit i inner join inscription inspt 
		where i.id=inspt.idinscrit and i.adresse='$mail' and inspt.idevt='$id'";
	$result=mysqli_query($conn,$rep);

	if(mysqli_fetch_array($result)) {

		echo 'Vous etes deja inscrit';
	}
	else{
		//chercher si l'utilisateur existe dans la base de données cad il est inscrit à un autre événement ou bien il est un nouveau inscrit. Dans ce dernier cas, il faut d'abord enregistrer le nouveau utilisateur dans la table inscrit puis enregistrer son réservation
		$rep1="select * from inscrit where adresse='$mail'";
		$result1=mysqli_query($conn,$rep1);
		$ligne=mysqli_fetch_array($result1);
		$message= 'Inscription reussie.';
		if(!$ligne){

			$code_r=rand(10000,30000);
			$message.='Voici votre code pour acceder à vos reservations :'.$code_r;
			
			$code= hash ('md5', $code_r, FALSE);
			$rep2="insert into inscrit (nom,prenom,adresse,code) values ('$nom','$prenom','$mail','$code')";
			mysqli_query($conn,$rep2);
			$result2=mysqli_query($conn,$rep1);
			$ligne=mysqli_fetch_array($result2);
		}

		$idinscrit=$ligne['id'];
		$rep3="insert into inscription (idinscrit,idevt) values ('$idinscrit','$id')";
			mysqli_query($conn,$rep3);
		
		
		echo $message;
	}
?>

