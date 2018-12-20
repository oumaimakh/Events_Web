<?php
    session_start();
    require 'cnx.php';
    $idevt=$_GET['id'];
    $rep="select * from evenement where idevt='$idevt'";
    $result=mysqli_query($conn,$rep);
    $row=mysqli_fetch_array($result);
    $rep_inscrit="select * from inscrit p INNER JOIN inscription i where p.id=i.idinscrit and idevt='$idevt'";
    $result_inscrit=mysqli_query($conn,$rep_inscrit);
    
    mysqli_close($conn);
    require 'header.php';
?>

<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-4">        
                <div class="flex flex-wrap justify-content-between">
                    <div class="single-event-details"><!--Details de l'événement-->

                        <!--Un controle sur la session de l'admin pour le permettre de modifier le contenu s'il est connecté-->
                        <?php if($_SESSION['login']==true && $_SESSION['password']==true){?> 
                                            
                            <div class="single-event-details-row" >
                                <h2 class="entry-title" contenteditable="true" id="title_input">
                                    <div id="title_edit">
                                        <?php echo $row['title']?>
                                    </div>
                                </h2>
                                <div class="single-event-details-row">
                                    <label>Debut:</label>
                                    <p id="debut" contenteditable="true"><?php echo $row['debut']?></p>
                                </div>
                                <div class="single-event-details-row">
                                    <label>Fin:</label>
                                    <p id="fin" contenteditable="true"><?php echo $row['fin']?></p>
                                </div>
                                <div class="single-event-details-row">
                                    <label>Prix (Euros):</label>
                                    <p id="prix" contenteditable="true"><?php echo $row['prix']?> </p>
                                </div>
                                <div class="single-event-details-row">
                                    <label>Categories:</label>
                                    <p id="categorie" contenteditable="true"><?php echo $row['categorie']?></p>
                                </div>
                                <div class="single-event-details-row">
                                    <label>Lieu:</label>
                                    <p id="lieu" contenteditable="true"><?php echo $row['lieu']?></p>
                                </div>

                            </div>
                        <?php }else{ ?>
                            <div class="single-event-details-row">
                                <h2 class="entry-title"><?php echo $row['title']?></h2>
                            </div>
                            <div class="single-event-details-row">
                                <label>Debut:</label>
                                <p><?php echo $row['debut']?></p>
                            </div>
                            <div class="single-event-details-row">
                                <label>Fin:</label>
                                <p><?php echo $row['fin']?></p>
                            </div>
                            <div class="single-event-details-row">
                                <label>Prix:</label>
                                <p class="sold-out"><?php echo $row['prix']?> Euros</p>
                            </div>
                            <div class="single-event-details-row">
                                <label>Categories:</label>
                                <p><?php echo $row['categorie']?></p>
                            </div>
                            <div class="single-event-details-row">
                                <label>Lieu:</label>
                                <p><?php echo $row['lieu']?></p>
                            </div>
                        <?php }?>
   
                    </div>
                </div>
            </div>

            <!--La carte avec la localisation de l'utilisateur et l'itinéraire-->
            <div id="myMap" style="position:relative;width:600px;height:400px;"></div>

            <div class="col-12">
                <div class="single-event-details-row">
                    <h4 style="color: #A9A9A9">Description:</h4>
                        <?php if($_SESSION['login']==true && $_SESSION['password']==true){?> 
                            <div contenteditable="true" id="description_input" >
                                <p id="description_edit" style="color: black">
                                        <?php echo $row['description']?>  
                                </p>  
                            </div>
                        <?php }else{ ?>
                                <p style="color: black"><?php echo $row['description']?></p>
                        <?php }?>
                </div>
            </div>
        </div><!-- .row -->
        <!--deux bouttons dui s'affichent selon la session active (admin ou visiteur) -->
        <div class="col-12 load-more flex justify-content-center">
                <?php if($_SESSION['login']==false && $_SESSION['password']==false){?>
                <div id="inscription_butt">
                    <input type="submit" value="Réserver" class="btn" id="inscription" onclick="fu();">
                </div>
                <?php }else{?>
                    <div class="discret" id="modify_butt">
                        <input type="submit" value="Enregistrer" class="btn" onclick="modify();">
                    </div>
                <?php }?>
        </div>

        <!--Afficher la liste des inscrits si l'admin est connecté-->
            <?php if($_SESSION['login']==true && $_SESSION['password']==true){?>
                <h4 style="color: #A9A9A9">Inscrits:</h4>
                <table class="table" style="color: black">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row_inscrit=mysqli_fetch_array($result_inscrit)) {
                        ?>
                        <tr>
                            <td><?php echo $row_inscrit['nom'];?></td>
                            <td><?php echo $row_inscrit['prenom'];?></td>
                            <td><?php echo $row_inscrit['adresse'];?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
             <?php }?>
             <!--Formulaire d'inscription invisible après le chargement de la page-->   
            <div class="row">
                <div class="col-12">
                    <div id="user_result" style="color: blue"> 
                    </div> 
                    <div class="discret" id="inscription_form" style="">
                        <div class="contact-form">
                            <input type='text' name='nom' id='nom' placeholder='nom'required/>
                            <input type='text' name='prenom' id='prenom' placeholder='prenom'required/>
                            <input type='email' name='mail' id='mail' placeholder='mail' required/>
                            <input type='button' id='submit' class="btn mt-2 mb-2 mt-lg-0 mb-lg-0" value='valider' onclick='register_user();'/>
                        </div>
                    </div>
                </div>
            </div><!-- col-12 -->
        </div><!-- row -->
</div><!-- main-content -->

<script type='text/javascript' 
            src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>

<script type='text/javascript'>
    function GetMap() {
        var map = new Microsoft.Maps.Map('#myMap', {
            credentials: key='AtTaV9ah66twPEUOE6r5EvybsYq7yO9O82uqXoSW4y0YDR_mgvXPGOEhZJ3EQZ5j'
        });

        //Request the user's location
        navigator.geolocation.getCurrentPosition(function (position) {
            var loc = new Microsoft.Maps.Location(
                position.coords.latitude,
                position.coords.longitude);

            //Add a pushpin at the user's location.
            var pin = new Microsoft.Maps.Pushpin(loc);
            map.entities.push(pin);

            //Center the map on the user's location.
            map.setView({ center: loc, zoom: 15 });

        Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
                    var directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
                    // Set Route Mode to walking
                    directionsManager.setRequestOptions({ routeMode: Microsoft.Maps.Directions.RouteMode.driving});
                    var waypoint1 = new Microsoft.Maps.Directions.Waypoint({ address: 'ma position', location: loc });
                    var waypoint2 = new Microsoft.Maps.Directions.Waypoint({ address: '<?php echo $row["lieu"] ?>' });
                    
                    directionsManager.addWaypoint(waypoint1);
                    directionsManager.addWaypoint(waypoint2);
                    // Set the element in which the itinerary will be rendered
                    //directionsManager.setRenderOptions({ itineraryContainer: document.getElementById('printoutPanel') });
                    directionsManager.calculateDirections();
                });
        });

    }
</script>

<script type="text/javascript">
    
    <?php if($_SESSION['login']==true && $_SESSION['password']==true){?>
        //Mettre un listener sur les champs susceptibles à etre modifier afin de declencher la fonction
        // modify après un clic  
        document.getElementById("description_input").addEventListener("click", fu_modify);
        document.getElementById("title_input").addEventListener("click", fu_modify);
        document.getElementById("debut").addEventListener("click", fu_modify);
        document.getElementById("fin").addEventListener("click", fu_modify);
        document.getElementById("prix").addEventListener("click", fu_modify);
        document.getElementById("categorie").addEventListener("click", fu_modify);
        document.getElementById("lieu").addEventListener("click", fu_modify);
    <?php } ?>

    //Afficher un boutton pour enregistrer les modification
    function fu_modify(){
            var y = document.getElementById("modify_butt");
              y.style.display = "block";
        }

    //Enregistrer les modifications apportées aux differents champs ContentEditable
    function modify() {
          var xhttp;
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                document.location.href="view.php?id=<?php echo $idevt?>"; 
                    
            }
          };
          var data="title="+document.getElementById('title_edit').innerText+"&description="+document.getElementById('description_edit').innerText+"&id="+<?php echo $idevt?>+"&debut="+document.getElementById('debut').innerText+"&fin="+document.getElementById('fin').innerText+"&prix="+document.getElementById('prix').innerText+"&categorie="+document.getElementById('categorie').innerText+"&lieu="+document.getElementById('lieu').innerText;

          xhttp.open("POST", "modifbd.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send(data);   
        }

</script>

<script type="text/javascript">

        //Afficher le formulaire d'inscription à un événement        
        function fu(){
            var x = document.getElementById("inscription_butt");
            var y = document.getElementById("inscription_form");
          x.style.display = "none";
          y.style.display = "block";
        }
        //Inscription d'un utilisateur
        function register_user() {
          var xhttp;
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { 
                document.getElementById("user_result").innerHTML=this.responseText;
              
            }
          };
          xhttp.open("GET", "addinscrit.php?mail="+document.querySelector('#mail').value+"&nom="+document.querySelector('#nom').value+"&prenom="+document.querySelector('#prenom').value+"&id="+<?php echo $idevt ?>, true);
          xhttp.send();   
        }
         
        
</script>


<?php
    require 'footer.php';
?>