<?php
 require 'cnx.php';
 	session_start();

	$mail=$_SESSION["mail"]; 
	
	$rep="select * from evenement e inner join inscription inspt inner join inscrit ins 
		where e.idevt=inspt.idevt and inspt.idinscrit=ins.id and ins.adresse='$mail'";
	$result=mysqli_query($conn,$rep);
	
	mysqli_close($conn);

	require 'header.php';
?>

<div class="main-content">
        <div class="container">
        <?php if($_SESSION['mail']==true ){?> 
        	<h4 style="color: #A9A9A9">Mes reservations:</h4>
                <table class="table" style="color: black">
                    <thead>
                        <tr>
                            <th scope="col">Evenement</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">Date</th>
                            <th scope="col">Annuler inscription</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($ligne=mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $ligne['title'];?></td>
                            <td><?php echo $ligne['categorie'];?></td>
                            <td><?php echo $ligne['date_event'];?></td>
                            <td><a href="delete_inscription.php?id=<?php echo $ligne['idinscription'];?>&mail=<?php echo $mail?>"><i class="fas fa-trash"></i></a></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            <!--détruire la session si la page est actualisé pour des raisons de securité-->
            <?php 
            unset($_SESSION['mail']);
             session_destroy();
        }
            else{?>
            <h1>ERROR 404</h1>
            <?php }?>
        </div>
</div>

<?php 

	require 'footer.php';
?>