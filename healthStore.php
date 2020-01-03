<?php
include('session.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Store</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Button-Change-Text-on-Hover.css">
    <link rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="assets/css/ebs-contact-form.css">
    <link rel="stylesheet" href="assets/css/Features-Blue.css">
    <link rel="stylesheet" href="assets/css/Forum---Thread-listing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="assets/css/Lista-Productos-Canito.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Search-Form.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Search-Field-With-Icon.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/User-Information-Panel---Lite--Secondary-User-Panel-Footer.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient" style="font-family: Roboto, sans-serif;opacity: 1;background-image: url(&quot;assets/img/Rectangle%201.png&quot;);">
        <div class="container"><a class="navbar-brand logo" href="index.php">AppLoad</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" <?php
                                                                                    if (isset($_SESSION["loggedin"])) {
                                                                                        if ($_SESSION["u_type"] == "regular") {
                                                                                            echo "href='profileUser.php'";
                                                                                        } else if ($_SESSION["u_type"] == "developer") {
                                                                                            echo "href='profileDev.php'";
                                                                                        } else if ($_SESSION["u_type"] == "editor") {
                                                                                            echo "href='profileEditor.php'";
                                                                                        }
                                                                                    ?>> My Profile</a></li>
                <?php
                                                                                    } else {
                                                                                        echo "></a></li>";
                                                                                    }
                ?>
                <li class="nav-item" role="presentation"><a class="nav-link" <?php
                                                                                if (isset($_SESSION["loggedin"])) {
                                                                                ?> href='forum.php?sort=lastest&pageno=1'>Forum</a></li>
            <?php
                                                                                } else {
                                                                                    echo "></a></li>";
                                                                                }
            ?>
            <li class="nav-item" role="presentation"><a class="nav-link" <?php
                                                                            if (isset($_SESSION["loggedin"])) {
                                                                            ?> href='store.php'>Store</a></li>
        <?php
                                                                            } else {
                                                                                echo "></a></li>";
                                                                            }
        ?>
        <li class="nav-item" role="presentation"><a class="nav-link" <?php
                                                                        if (isset($_SESSION["loggedin"])) {
                                                                        ?> href='logout.php'>Logout</a></li>
    <?php
                                                                        } else {
                                                                            echo "href='loginScreen.php'>Login</a></li>";
                                                                        }
    ?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page projects-page">
        <section class="portfolio-block projects-with-sidebar">
            <div class="container mx-auto" style="margin: 36px;font-size: 19px;font-family: Roboto, sans-serif;">
                <div class="row">
                   
                </div>
            </div>
            <div class="container">
                <div class="heading" style="margin-bottom: 40px;">
                    <h2>Recent Health APPS</h2>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-unstyled sidebar">
          <li><a class="active" href="store.php">All</a></li>
                            <li><a href="gamesStore.php">Games</a></li>
                            <li><a href="programsStore.php">Programs</a></li>
                            <li><a href="picturingStore.php">Picturing</a></li>
                            <li><a href="musicsStore.php">Music</a></li>
                            <li><a href="securityStore.php">Security</a></li>
                            <li><a href="healthStore.php">Health</a></li>
                            <li><a href="browserStore.php">Browser</a></li>
                            <li><a href="softwareStore.php">Software</a></li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                        
                           <!--<a href="manageApplication.php?app_id='.$app_id.'"> -->
                            <?php
                            $page;
                            if(isset($_GET["page"]))
                            {
                                $page = $_GET["page"];
                            }
                                
                                if(empty($page))
                                {
                                    $page = 1;
                                }
                                else
                                {
                                    $page = $page +0;
                                }
                                $u_id = $_SESSION["u_id"];
                                $u_id = $u_id +0;
                            $offSet = (($page - 1) * 9 ) + 1;
                      
                          #        echo gettype($page);
                                $storeQuery = " Select * 
                                                from application
                                                where app_id in(
                                                                 Select app_id
                                                                 from restricts
                                                                 where area_id in(
                                                                                  Select area_id
                                                                                  from area as A, regularuser as R
                                                                                  where R.u_id = $u_id
                                                                                            AND
                                                                                        A.area_name = R.area))
                                                        AND
                                                        minimumAge <=( Select u_age
                                                                        from users
                                                                        where u_id = $u_id)
                                                        AND
                                                        app_status = 'APPROVED'
                                                        order by app_date Desc
                                                        limit ".$offSet .", 9";        
             
                                              #    $storeQuery = " Select * 
                                               # from application
                                            #    where app_id in(
                                             #                    Select app_id
                                              #                   from restricts
                                            #                     where area_id in(
                                            #                                      Select area_id
                                            #                                      from area as A, regularuser as R
                                            #v                                      where R.u_id = $u_id
                                            #                                                AND
                                             #                                           A.area_name = R.area))
                                              #          AND
                                               #         minimumAge <=( Select u_age
                                                #                        from users
                                                 #                       where u_id = $u_id)
                                                  #      AND
                                                   #     app_status = 'APPROVED'
                                                    #    order by app_date Desc
                                                     #   limit 9 offset ". $offSet;    
                                                        
                            if($result = mysqli_query($db, $storeQuery))
                            {
                                while($row = mysqli_fetch_array($result))
                                {
                                    if($row["cat_id"] == 8) {
                                    echo '<div class="col-md-6 col-lg-4 d-flex d-xl-flex align-items-xl-center project-sidebar-card">
                                            <a class="d-flex d-xl-flex" href="appPage.php?appname=' . $row["appname"] . '">
                                                <img class="img-fluid image scale-on-hover" src="./images/application_photos/'.$row["appLogo"].'">
                                            </a>
                                        </div>';
                                    }
                                }
                            }
                            else
                            {
                                echo "***********";
                            }
                               
                                
                            ?>
                                 <!-- burası php echolu olacak -->   
                        
                        
                        </div>
                        <nav class="d-xl-flex justify-content-xl-center">
                           <!-- burada dynamic olmalı ondan dolayı php olacak burası da -->
                            <ul class="pagination">
                              <!--  <li class="page-item"><a class="page-link" href="store.php?page=" aria-label="Previous"><span aria-hidden="true">«</span></a></li> -->
                               <?php
                                
                                $u_id = $_SESSION["u_id"];
                                $storeQueryCount = " Select count(*) as count 
                                                     from application
                                                     where app_id in(
                                                                    Select app_id
                                                                    from restricts
                                                                     where area_id in(
                                                                                      Select area_id
                                                                                      from area as A, regularuser as R
                                                                                       where R.u_id = $u_id
                                                                                              AND
                                                                                            A.area_name = R.area))
                                                                            AND
                                                                           minimumAge <=( Select u_age
                                                                                          from users
                                                                                          where u_id = $u_id)
                                                                            AND
                                                                         app_status = 'APPROVED'
                                                                         AND
                                                                        cat_id = 8";        
                                $count2;
                                if($result2 = mysqli_query($db, $storeQueryCount))
                                {
                                    while($row2 = mysqli_fetch_array($result2))
                                    {
                                        $count2 = $row2["count"];
                                        $count2  = $count2 / 9;
                                        
                                        
                                    }
                                 #    echo '<script type="text/javascript">alert("__ss__"); </script>';
                                }
                                else
                                {
                                    # echo '<script type="text/javascript">alert("__ss__"); </script>';
                                }
                                $temp = 0;
                                while($temp <= $count2)
                                {
                                    $temp +=1;
                                    echo '<li class="page-item"><a class="page-link" href="healthStore.php?page='.$temp.'">'.$temp.'</a></li>';
                                    
                                }
                                                        
                                ?>
                               
                       
                               
                               <!-- <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="links"><a href="#">About us</a><a href="contact.html">Contact us</a><a href="store.html">Store</a></div>
            <div class="social-icons"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-instagram-outline"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a></div>
        </div>
    </footer>
    <div class="col"></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>