<?php
	session_start();
 	require 'cnx.php';
 	require 'header.php';
	
?>
	<div class="container">
        <div class="main-content">
        	<div class="get-in-touch">
			<div class="contact-form">
		                    <div class="row">
		                        <div class="col-12 col-md-4">
		                            <input type="text" placeholder="Titre" id="title">
		                        </div><!-- col-4 -->

		                        <div class="col-12 col-md-4">
		                            <input type="text" placeholder="Categorie" id="categorie">
		                        </div><!-- col-6 -->
		                        <div class="col-12 col-md-4">
		                            <input type="text" placeholder="Prix" id="prix">
		                        </div><!-- col-6 -->

		                        <div class="col-12 col-md-4">
		                            <input type="date" placeholder="Date" id="date">
		                        </div><!-- col-4 -->

		                        <div class="col-12 col-md-4">
		                            <input type="time" placeholder="Debut" id="debut">
		                        </div><!-- col-6 -->
		                        <div class="col-12 col-md-4">
		                            <input type="time" placeholder="Fin" id="fin">
		                        </div><!-- col-6 -->
		                        <div class="col-12">
		                            <input type="text" placeholder="Lieu" id="lieu">
		                        </div><!-- col-6 -->
		                        <div class="col-12">
		                            <textarea id="description" rows="8" cols="80" placeholder="Description"></textarea>
		                        </div>

		                        <div class="col-12 submit flex justify-content-center">
		                            <input type="submit" name="" value="Ajouter" class="btn" onclick='add();'>
		                        </div>

		                    </div><!-- row -->
		    </div><!-- contact-form -->
		</div>
		</div>
	</div>
	<script type="text/javascript">
		function add() {
          var xhttp;
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              
                        document.location.href="welcome.php"; 
                    
            }
          };
          var data="title="+document.querySelector('#title').value+"&description="+document.querySelector('#description').value+"&debut="+document.querySelector('#debut').value+"&fin="+document.querySelector('#fin').value+"&prix="+document.querySelector('#prix').value+"&categorie="+document.querySelector('#categorie').value+"&lieu="+document.querySelector('#lieu').value+"&date="+document.querySelector('#date').value;;

          xhttp.open("POST", "addevtbd.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send(data);   
        }


	</script>
<?php
    require 'footer.php';
?>
