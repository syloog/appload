<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: profile.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
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

<body style="background-color: rgb(255,255,255);">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient" style="font-family: Roboto, sans-serif;opacity: 1;background-image: url(&quot;assets/img/Rectangle 1.png&quot;);">
        <div class="container"><a class="navbar-brand logo" href="index.php">AppLoad</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        </div>
    </nav>
    <main class="page contact-page">
        <section class="portfolio-block contact">
            <div class="container">
                <div class="heading">
                    <h2>Please login to access our store</h2>
                </div>
            </div>
            <div class="login-card">
            <div class="row">
                <div class="col d-xl-flex justify-content-xl-center" style="padding:5px;">
                    <?php
                    if (isset($_SESSION["error"])) {
                        $error = $_SESSION["error"];
                        echo "<span class='bg-danger border rounded border-danger' style='padding:5px;'> $error </span>";
                        unset($_SESSION["error"]);
                    }
                    ?>
                </div>
            </div>
                <form class="form-signin" method="post" action="login.php"><span class="reauth-email"> </span><input class="form-control" type="username" id="username" required="" placeholder="Username" autofocus="" name="username"><input class="form-control" type="password" id="password" required="" placeholder="Password" name="password">
                    <div class="d-xl-flex justify-content-xl-center checkbox">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Remember me</label></div>
                    </div>
                    <div class="form-row">
                        <fieldset>
                            <div class="custom-control custom-radio"><input type="radio" id="loginRadioUser" class="custom-control-input" value ="regular" name="loginRadio"><label class="custom-control-label" for="loginRadioUser">Login as user</label></div>
                            <div class="custom-control custom-radio"><input type="radio" id="loginRadioDev" class="custom-control-input" value ="dev" name="loginRadio"><label class="custom-control-label" for="loginRadioDev">Login as developer</label></div>
                            <div class="custom-control custom-radio"><input type="radio" id="loginRadioEditor" class="custom-control-input" value ="editor" name="loginRadio"><label class="custom-control-label" for="loginRadioEditor">Login as editor</label></div>
                        </fieldset>
                    </div>
                    <div class="form-row">
                        <div class="col d-xl-flex justify-content-xl-center" style="padding-top: 11px;"><button class="btn btn-primary btn-block btn-lg btn-signin" type="submit" style="background-color: #af7505;">Sign in</button></div>
                    </div>
                </form>
                <div class="col text-center mx-auto" style="margin: 20px;"><a class="forgot-password" href="#">Forgot your password?</a></div>
                <div class="col text-center mx-auto" style="margin: 20px;"><a class="forgot-password" href="register.html" style="opacity: 1;">Create a New Account</a></div>
            </div>
        </section>
    </main>
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