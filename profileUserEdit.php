<?php
include('session.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Manage Profile</title>
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
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient" style="font-family: Roboto, sans-serif;opacity: 1;background-size: cover;background-image: url(&quot;assets/img/Rectangle%201.png&quot;);">
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
    <main class="page lanidng-page" style="background-color: #141414;">
        <section class="portfolio-block block-intro">
            <div class="container border rounded shadow" style="padding: 50px;background-color: #0c0f18;">
                <div class="row justify-content-center align-items-center" style="background-image: url('assets/img/thumb-1920-892291.jpg');">
                    <div class="col-auto relative" style="padding: 30px;">
                        <div class="container border rounded border-dark shadow-lg" style="background-color: #0c0f18;padding: 20px;">
                            <div class="d-xl-flex justify-content-xl-end avatar">
                                <div class="avatar-bg center" style="width: 160px;height: 160px;"></div>
                            </div><input type="file" class="form-control" name="avatar-file" style="font-size: 10px;" />
                        </div>
                    </div>
                    <div class="col-auto col-xl-6">
                        <form class="shadow-none" method="post" action="profileEdit.php">
                            <h2 class="text-center border rounded border-dark" style="padding: 16px;color: rgb(255,255,255);background-color: #0c0f18;letter-spacing: 0px;font-family: 'Titillium Web', sans-serif;"><strong>Manage your profile.</strong></h2>
                            <div class="form-group">
                                <?php
                                if (isset($_SESSION["error"])) {
                                    foreach ($_SESSION["error"] as $error) {
                                        echo "<div class='row' style='padding-left: 10px; padding-right:10px'><div class='col'><div class='alert alert-danger' role='alert' style='width:100%'><span><strong> Warning: </strong>";
                                        echo $error;
                                        echo " </span></div></div></div>";
                                    }
                                    unset($_SESSION["error"]);
                                }
                                ?>
                                <div class="form-row" style="padding: 10px;">
                                    <div class="col"><input class="form-control" type="text" placeholder="Name" name="name" ></div>
                                </div>
                                <div class="form-row" style="padding: 10px;">
                                    <div class="col"><input class="form-control" type="text" placeholder="Age" name="age" ></div>
                                </div>
                                <div class="form-row" style="padding: 10px;">
                                    <div class="col"><input class="form-control" type="password" placeholder="Password" name="password_1" ></div>
                                </div>
                                <div class="form-row" style="padding: 10px;">
                                    <div class="col"><input class="form-control" type="password" placeholder="Password (Repeat)" name="password_2" ></div>
                                </div>
                                <div class="form-row" style="padding: 10px;">
                                    <div class="col d-xl-flex justify-content-xl-center align-items-xl-center"><button class="btn btn-primary btn-block border rounded-0 border-dark" type="submit" style="background-color: rgb(12,15,24);margin: 0px;">Apply Changes</button></div>
                                </div>
                                <div class="form-row" style="padding: 10px;">
                                    <input type='hidden' name="editType" value="regular" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
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
</body>

</html>