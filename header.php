<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>EVENTS WEBSITE</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="site-header">
        <div class="header-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-10 col-lg-4">
                        <h1 class="site-branding flex">
                            <a href="welcome.php">EVENTS WEBSITE</a>
                        </h1>
                    </div>

                    <div class="col-2 col-lg-8" id="espace">
                        <nav class="site-navigation">
                            

                            <ul>

                            <?php if($_SESSION['login']==false && $_SESSION['mdp']==false){?>
                              
                                <li><input type="submit" value="Mes reservations" onclick="fr();"/></li>
                                <li><input type="submit" value="ESPACE ADMIN" onclick="f();"/></li>

                            <?php }else{ ?>

                                <li>ADMIN</li>
                                <li><a href="logout.php"><i class="fas fa-power-off"></i></a></li>

                            <?php }?>
                            </ul><!-- flex -->
                        </nav><!-- .site-navigation -->
                    </div><!-- .col-12 -->
                </div><!-- .row -->
            </div><!-- container-fluid -->
        </div><!-- header-bar -->
    </header><!-- .site-header -->

    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 offset-lg-2 col-lg-10">
                    <div class="entry-header">
                        
                    
                </div><!-- .col-12 -->
            </div><!-- row -->

           </div> 
        </div><!-- .container -->
    </div><!-- .hero-content -->
    <div class="col-12 offset-lg-2 col-lg-10">
        <!--Afficher le résultat de la tentation de connexion-->
        <div id="login_result"></div>

        <!--formulaire pour connexion de l'admin, invisible après chargement de page-->
        <div class="discret" id="form_admin">
            <input type="text" id="login" name="login" placeholder="login" required/>
            <input type="password" name="password" id="password" placeholder="mot de passe" required/>
            <button onclick="login_admin()"><i class="fas fa-sign-in-alt"></i></button>
        </div>
        
        <!--formulaire pour entrer les identifiants d'un inscrit afin d'afficher ses reservations, invisible après chargement de la page-->
        <div class="discret" id="form_reservation">
            <input type="text" id="mail_reservation" name="mail" placeholder="tapez votre adresse mail" required/>
            <input type="password" name="code" id="code" placeholder="mot de passe" required/>
            <button onclick="login_reservation()"><i class="fas fa-sign-in-alt"></i></button>
        </div>
        
    </div>