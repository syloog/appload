
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Application</title>
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
            <div class="collapse navbar-collapse" id="navbarNav">
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
    <main class="page lanidng-page">

        <section class="portfolio-block block-intro" style="padding-bottom: 30px;">

            <div class="container" id="info-container">
                <?php
                if (isset($_SESSION["error"])) {
                    foreach ($_SESSION["error"] as $error) {
                        echo "<div class='row'><div class='col d-xl-flex justify-content-xl-center'><div class='alert alert-danger' role='alert' style='width:100%'><span><strong> Alert </strong>";
                        echo $error;
                        echo " </span></div></div></div>";
                    }
                    unset($_SESSION["error"]);
                } else if (isset($_SESSION["success"])) {
                    foreach ($_SESSION["success"] as $success) {
                        echo "<div class='row'><div class='col d-xl-flex justify-content-xl-center'><div class='alert alert-success' role='alert' style='width:100%;padding-left: 35px'><span><strong> Success: </strong>";
                        echo $success;
                        echo " </span></div></div></div>";
                    }
                    unset($_SESSION["success"]);
                }
                ?>
                <div class="row">
                    <div class="col-md-12" style="padding-bottom: 25px;padding-top: 25px;">
                        <h2 class="text-center text-info">Application Publish Form</h2>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col relative">

                        <form action="appUpload.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 align-self-center" id="contact-box">
                                    <div class="row" style="padding-bottom: 20px;">
                                        <div class="col">
                                            <div class="dashed_upload">
                                                <div class="wrapper">
                                                    <div class="drop">
                                                        <div class="cont">
                                                        <input id="files" name="photo_file" type="file">
                                                            <i class="fa fa-cloud-upload"></i>
                                                            <div class="tit">
                                                                Upload An Icon
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 site-form">
                                    <div class="form-group"><input class="form-control" type="text" id="appname" name="appname" required="" placeholder="Name of the Application" autofocus=""></div>
                                    <div class="form-group"><input class="form-control" type="text" id="version" name="version" required="" placeholder="Version"></div>
                                    <div class="form-group"><select name="minAge" class="form-control" required="" placheholder="Minimal Age">
                                            <option value="3">Minimal Age: 3</option>
                                            <option value="8">Minimal Age: 8</option>
                                            <option value="13">Minimal Age: 13</option>
                                            <option value="15">Minimal Age: 15</option>
                                            <option value="18">Minimal Age: 18</option>
                                    </div>
                                    <div class="form-group">
                                        <div class="col" class="form-control border rounded">
                                            <input type="file" name="app_file" style="padding-top:25px" placeholder="select the app from computer" required="">
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 34px;">
                                        <div class="col"><button class="button" name="continue" type="submit"><span>Continue to System Requirements</span></button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="portfolio-block block-intro" style="padding-bottom: 30px;"></section>

    </main>
    <section class="portfolio-block website gradient" style="background-image: url(&quot;assets/img/2018-06-04-21-40-16.jpeg&quot;);background-size: contain;"></section>
    <footer class="page-footer">
        <div class="container">
            <div class="links"><a href="#">About us</a><a href="contact.html">Contact us</a></div>
            <div class="social-icons"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-instagram-outline"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a></div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/not_empty.js"></script>
</body>

</html>