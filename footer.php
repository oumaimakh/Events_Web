
<footer class="site-footer">
        <div class="footer-cover-title flex justify-content-center align-items-center">
            <h2>EVENTS WEBSITE</h2>
        </div><!-- .site-footer -->

        <div class="footer-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="copyright-info">
                            <script>document.write(new Date().getFullYear());</script> 
                        </div>

                        <div class="footer-social">
                            <ul class="flex justify-content-center align-items-center">
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div><!-- footer-social -->
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </div><!-- footer-content-wrapper -->
    </footer><!-- site-footer -->
    
    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/masonry.pkgd.min.js'></script>
    <script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='js/swiper.min.js'></script>
    <script type='text/javascript' src='js/jquery.countdown.min.js'></script>
    <script type='text/javascript' src='js/circle-progress.min.js'></script>
    <script type='text/javascript' src='js/jquery.countTo.min.js'></script>
    <script type='text/javascript' src='js/custom.js'></script>
    <script type="text/javascript">
      //Afficher le formulaire de connexion admin
        function f(){
            var y = document.getElementById("form_admin");
              y.style.display = "block";
        }

      //Afficher le formulaire pour entrer les identifiants de l'inscrit
        function fr(){
            var y = document.getElementById("form_reservation");
              y.style.display = "block";
        }

      //connexion admin
        function login_admin() {
          var xhttp;
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              if(this.responseText === 'no admin')
                    {
                        document.getElementById("login_result").innerHTML="login ou mot de passe invalide";            
                    }else if(this.responseText === 'admin')
                    {
                        document.location.href="welcome.php";            
                    }
            }
          };
          xhttp.open("GET", "login_admin.php?login="+document.querySelector('#login').value+"&password="+document.querySelector('#password').value, true);
          xhttp.send();   
        } 
        
      //Afficher les reservations
        function login_reservation() {
          var xhttp;
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              if(this.responseText === 'vide')
                    {
                        document.getElementById("login_result").innerHTML="mail ou mot de passe invalide";            
                    }else if(this.responseText === 'approved')
                    {
                       document.location.href="reservations.php";            
                    }
            }
          };
          xhttp.open("GET", "login_reservation.php?mail="+document.querySelector('#mail_reservation').value+"&code="+document.querySelector('#code').value, true);
          xhttp.send();   
        } 

    </script>
</body>
</html>
