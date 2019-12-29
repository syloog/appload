<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>User Register</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link visible" href="loginScreen.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page contact-page" style="background-color: #0c0f18;">
        <section class="portfolio-block contact" style="padding-top: 50px;">
            <div class="container">
                <div class="border rounded shadow-lg form-container" style="background-color: #ffebe0;padding: 30px;background-image: url(&quot;assets/img/thumb-1920-892291.jpg&quot;);">
                    <form class="border rounded-0 border-light" method="post" style="padding: 30px;background-color: rgba(255,255,255,0.79);" action="signup.php">
                        <h2 class="text-center" style="padding: 15px;"><strong>Register Form</strong></h2>
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
                        <div class="form-group">
                            <div class="form-row" style="padding: 10px;">
                                <div class="col"><input class="form-control" type="text" placeholder="Name" name="name" required=""></div>
                            </div>
                            <div class="form-row" style="padding: 10px;">
                                <div class="col"><input class="form-control" type="text" placeholder="Age" name="age" required=""></div>
                            </div>
                            <div class="form-row" style="padding: 10px;">
                                <div class="col"><input class="form-control" type="text" placeholder="Username" name="username" required=""></div>
                            </div>
                            <div class="form-row" style="padding: 10px;">
                                <div class="col"><input class="form-control" type="text" placeholder="Email" name="email" required=""></div>
                            </div>
                            <div class="form-row" style="padding: 10px;">
                                <div class="col"><input class="form-control" type="password" placeholder="Password" name="password_1" required=""></div>
                            </div>
                            <div class="form-row" style="padding: 10px;">
                                <div class="col"><input class="form-control" type="password" placeholder="Password (Repeat)" name="password_2" required=""></div>
                            </div>
                            <div class="form-row" style="padding: 10px;">
                                <div class="col"><select name="area" class="form-control" required="">
                                        <option value="North America">North America</option>
                                        <option value="Europe">Europe</option>
                                        <option value="Asia">Asia</option>
                                        <option value="Russia">Russia</option>
                                        <option value="South America">South America</option>
                                        <option value="Ocenia">Ocenia</option>
                                        <option value="Middle East and Turkey">Middle East and Turkey</option>
                                        <option value="Africa">Africa</option>
                                        <option value="Central America">Central America</option>
                                    </select></div>
                            </div>
                            <div class="form-row" style="padding: 10px;">
                                <input type='hidden' name="loginType" value="regular" />
                            </div>
                            <div class="form-row" style="padding: 10px;">
                                <div class="col"><a href="#"><label>Terms and Conditions</label></a></div>
                            </div>
                            <div class="form-row" style="padding: 10px;">
                                <div class="col">
                                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" required="">I agree to the license terms.</label></div>
                                </div>
                            </div>
                            <div class="form-row" style="padding: 10px;">
                                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center"><button class="btn btn-primary btn-block border rounded" type="submit" style="background-color: rgb(252,158,42);">Register</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
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