<?php
include('session.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Create Device</title>
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
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient" style="font-family: Roboto, sans-serif;opacity: 1;background-image: url(&quot;assets/img/Rectangle%201.png&quot;);background-size: cover;">
        <div class="container"><a class="navbar-brand logo" href="home.html">AppLoad</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
                                                                                ?> href='forum.php'>Forum</a></li>
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
    <main class="page lanidng-page" style="background-color: #0c0f18;">
        <section class="portfolio-block block-intro" style="padding-bottom: 30px;">
            <div class="container">
                <div class="col">
                    <form class="border rounded border-light" method="post" action="addDevice.php" style="background-color: #ffffff;">
                        <div class="col">
                            <?php
                            if (isset($_SESSION["error"])) {
                                foreach ($_SESSION["error"] as $error) {
                                    echo "<div class='row'><div class='col d-xl-flex justify-content-xl-center'><div class='alert alert-danger' role='alert'><span><strong> Alert </strong>";
                                    echo $error;
                                    echo " </span></div></div></div>";
                                }
                                unset($_SESSION["error"]);
                            }
                            ?>
                        </div>
                        <h3 style="padding: 15px;">You can create a device below for your account.</h3>
                        <div>
                            <div class="form-group">
                                <fieldset id="ramField">
                                    <legend>Choose a RAM amount for your device</legend>
                                    <div class="custom-control custom-radio"><input type="radio" id="ram512" class="custom-control-input" name="ramField" value="512MB"><label class="custom-control-label" for="ram512">512 MB or less</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="ram1GB" class="custom-control-input" name="ramField" value="1GB"><label class="custom-control-label" for="ram1GB">1 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="ram2GB" class="custom-control-input" name="ramField" value="2GB"><label class="custom-control-label" for="ram2GB">2 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="ram4GB" class="custom-control-input" name="ramField" value="4GB"><label class="custom-control-label" for="ram4GB">4 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="ram8GB" class="custom-control-input" name="ramField" value="8GB"><label class="custom-control-label" for="ram8GB">8 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="ram16GB" class="custom-control-input" name="ramField" value="16GB"><label class="custom-control-label" for="ram16GB">16 GB or more</label></div>
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <fieldset id="storageField">
                                    <legend>Choose a Storage amount for your device</legend>
                                    <div class="custom-control custom-radio"><input type="radio" id="storage512" class="custom-control-input" name="storageField" value="512MB"><label class="custom-control-label" for="storage512">512 MB or less</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="storage1GB" class="custom-control-input" name="storageField" value="1GB"><label class="custom-control-label" for="storage1GB">1 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="storage5GB" class="custom-control-input" name="storageField" value="5GB"><label class="custom-control-label" for="storage5GB">5 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="storage10GB" class="custom-control-input" name="storageField" value="10GB"><label class="custom-control-label" for="storage10GB">10 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="storage25GB" class="custom-control-input" name="storageField" value="25GB"><label class="custom-control-label" for="storage25GB">25 GB or more</label></div>
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <fieldset id="cpuField">
                                    <legend>Choose CPU types for your device</legend>
                                    <div class="custom-control custom-radio"><input type="radio" id="amdCheck" class="custom-control-input" name="cpuField" value="AMD"><label class="custom-control-label" for="amdCheck">AMD</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="intelCheck" class="custom-control-input" name="cpuField" value="Intel"><label class="custom-control-label" for="intelCheck">Intel</label></div>
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <fieldset id="osField">
                                    <legend>Choose Operating Systems for your device</legend>
                                    <div class="custom-control custom-radio"><input type="radio" id="macCheck" class="custom-control-input" name="osField" value="MacOS"><label class="custom-control-label" for="macCheck">MacOS</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="winCheck" class="custom-control-input" name="osField" value="Windows"><label class="custom-control-label" for="winCheck">Windows</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="linuxCheck" class="custom-control-input" name="osField" value="Linux"><label class="custom-control-label" for="linuxCheck">Linux</label></div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 25px;">
                            <div class="col"><button class="button" type="submit" data-hover="CONFIRM ?"><span>SEND FEEDBACK</span></button></div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="portfolio-block block-intro" style="padding-bottom: 30px;"></section>
    </main>
    <section class="portfolio-block website gradient" style="background-image: url(&quot;assets/img/2018-06-04-21-40-16.jpeg&quot;);background-size: contain;"></section>
    <footer class="page-footer">
        <div class="container">
            <div class="links"><a href="#">About us</a><a href="contact.html">Contact us</a><a href="store.html">Store</a></div>
            <div class="social-icons"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-instagram-outline"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a></div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>