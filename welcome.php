<?php
    session_start();
    require 'cnx.php';
    $rep="select * from evenement";
    $result=mysqli_query($conn,$rep);
    mysqli_close($conn);
    require 'header.php';
?>

<div class="content-section">
    <div class="home-page-last-news">
        <div class="container">
             <!--Un controle sur la session (admin ou visiteur) pour afficher l'icone de suppression d'un événement et l'icone d'ajout d'un événement si l'admin est connecté-->
                
            <?php if($_SESSION['login']==true && $_SESSION['password']==true){?> 
                <a href="addevt.php"><i class="fa fa-plus" style="font-size:24px; margin-left: 900px"></i></a>
            <?php  }?> 
            <div class="home-page-last-news-wrap">
                <div class="row">
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                        <div class="col-12 col-md-6">
                            <figure class="featured-image">
                                <a href="view.php?id=<?php echo $row['idevt']?>"> <img src="images/news-image-1.jpg" alt="fesival+celebration"> </a>
                            </figure><!-- featured-image -->

                            <div class="box-link-date">
                                <?php echo $row['date_event']?>
                            </div>
                            <div class="content-wrapper">
                                <div class="entry-content">
                                    <div class="entry-header">
                                        <h2><?php echo $row['title']?></h2>
                                        <?php if($_SESSION['login']==true && $_SESSION['password']==true){?>  
                                            <a href="deletevt.php?id=<?php echo $row['idevt']?>"><i class="fa fa-trash" style="font-size:24px"></i></a>
                                            
                                        <?php  }?>
                                    </div><!-- entry-header -->

                                    <div class="entry-description">
                                        <p><?php echo $row['description']?> .</p>
                                    </div><!-- entry-description -->
                                </div><!-- entry-content -->
                            </div><!-- content-wrapper -->
                        </div><!-- .col-6 -->

                        <?php }?>
                </div><!-- row -->
            </div><!-- home-page-last-news-wrap -->
        
            
        </div><!-- container -->
    </div><!-- home-page-last-news -->
</div>

<?php
    require 'footer.php';
?>