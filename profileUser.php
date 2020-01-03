<?php
include('session.php');


if ($_SESSION["u_type"] != "regular") {
    $errors = array();
    array_push($errors, "You don't have access to this page.");
    $_SESSION["error"] = $errors;
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>User</title>
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
    <link rel="stylesheet" href="assets/css/Forum---Thread-listing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="assets/css/Lista-Productos-Canito.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Search-Field-With-Icon.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/User-Information-Panel---Lite--Secondary-User-Panel-Footer.css">
    <link rel="stylesheet" href="assets/css/Pretty-Search-Form.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
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
    <main class="page lanidng-page" style="background-color: #141414;">
        <section class="portfolio-block block-intro" style="padding-bottom: 30px;">
            <div class="container border rounded border-light shadow-lg" style="padding: 50px;background-color: #0c0f18;">
                <div class="row" style="background-image: url('assets/img/thumb-1920-892291.jpg');background-size: cover;">
                    <div class="col">
                        <?php
                        if (isset($_SESSION["error"])) {
                            foreach ($_SESSION["error"] as $error) {
                                echo "<div class='row' style='padding-top: 20px; padding-left: 10px; padding-right:10px'><div class='col'><div class='alert alert-danger' role='alert' style='width:100%'><span><strong> Warning: </strong>";
                                echo $error;
                                echo " </span></div></div></div>";
                            }
                            unset($_SESSION["error"]);
                        }
                        ?>
                        <?php
                        $user_check = $_SESSION['u_id'];

                        $sql_user = mysqli_query($db, "SELECT * FROM users WHERE u_id = '$user_check'");
                        $user_name_age_mail = mysqli_fetch_array($sql_user);

                        echo '<img class="rounded-circle" style="padding:20px;width:300px;height:300px;background-size:cover;" src="./images/profile_photos/'; 
                        echo $user_name_age_mail["u_picture"] . '">';
                        ?>
                        <div class="about-me">
                            <?php
                            echo "<p class='border rounded border-dark' style='background-color: #feba2b;font-weight: normal;'> Welcome " . $_SESSION["u_username"] . "</p>";
                            ?>
                        </div>
                        <div class="row" style="padding: 10px;">
                            <div class="col" style="background-color: rgba(255,255,255,0);">
                                <div class="card" style="background-color: rgb(253,184,31);padding: 12px;">
                                    <ul class="fa-ul" style="margin: 0px;">
                                        <?php

                                        $user_check = $_SESSION['u_id'];

                                        $sql_regular_user = mysqli_query($db, "SELECT area FROM regularuser WHERE u_id = '$user_check'");
                                        $user_area = mysqli_fetch_array($sql_regular_user, MYSQLI_ASSOC);

                                        echo "<li class='d-xl-flex justify-content-xl-start'><label><strong>Name:&nbsp;</strong>&nbsp;</label><label>" .  $user_name_age_mail["u_name"] . "</label></li>";
                                        echo "<li class='d-xl-flex justify-content-xl-start'><label><strong>Email:</strong>&nbsp;&nbsp;</label><label>" . $user_name_age_mail["u_mail"] . "</label></li>";
                                        echo "<li class='d-xl-flex justify-content-xl-start'><label><strong>Age:</strong>&nbsp;&nbsp;</label><label>" . $user_name_age_mail["u_age"] . "</label></li>";
                                        echo "<li class='d-xl-flex justify-content-xl-start'><label><strong>Area:</strong>&nbsp;&nbsp;</label><label>" . $user_area["area"] . "</label></li>";
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col my-auto">
                                <div class="row">
                                    <div class="col d-inline-block"><a class="btn btn-primary border rounded-0 border-dark" role="button" href="downloadedApps.php" style="background-color: rgb(58,21,126);margin-right: 0;margin-bottom: 0;margin-left: 0;margin-top: 0;width: 100%;">Downloaded Apps</a></div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col d-inline-block"><a class="btn btn-primary border rounded-0 border-dark" role="button" href="deviceList.php" style="background-color: rgb(146,32,117);margin-right: 0;margin-bottom: 0;margin-left: 0;margin-top: 0;width: 100%;">Manage Devices</a></div>
                                        </div>
                                        <div class="row">
                                            <div class="col d-inline-block"><a class="btn btn-primary border rounded-0 border-dark" role="button" href="profileUserEdit.php" style="margin-top: 0;margin-right: 0;margin-bottom: 0;margin-left: 0;width: 100%;background-color: rgb(17,138,255);">Manage Account</a></div>
                                        </div>
                                        <div class="row">
                                            <div class="col d-inline-block"><a class="btn btn-primary border rounded-0 border-dark" role="button" style="background-color: rgb(232,192,96);color: rgb(255,255,255);margin-top: 0;margin-right: 0;margin-bottom: 0;margin-left: 0;width: 100%;" href="deleteUserProfile.php">Delete Account</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="portfolio-block photography"></section>
        <section class="portfolio-block call-to-action border-bottom"></section>
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