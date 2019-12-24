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
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient" style="font-family: Roboto, sans-serif;opacity: 1;background-size: cover;background-image: url('assets/img/Rectangle 1.png');">
        <div class="container"><a class="navbar-brand logo" href="index.php">AppLoad</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        </div>
    </nav>
    <main class="page contact-page" style="background-color: #0c0f18;">
        <section class="portfolio-block contact" style="padding-top:50px;">
            <div class="container">
                <div class="heading">
                    <h2 style="color: #ffffff;">Please login to access our store</h2>
                </div>
            </div>
            <div class="login-card" style="background-image:url(&quot;assets/img/thumb-1920-783633.jpg&quot;);">
                <form class="form-signin" method="post" action="login.php" style="background-color: rgba(255,255,255,0.79);">
                    <?php
                    if (isset($_SESSION["error"])) {
                        echo "<div class='row'><div class='col'><div class='alert alert-danger' role='alert' style='width:100%'><span><strong> Warning: </strong>";
                        echo $_SESSION["error"];
                        echo " </span></div></div></div>";
                        unset($_SESSION["error"]);
                    }
                    ?>
                    <input class="form-control" type="text" id="username" required="" placeholder="Username" name="username" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>">
                    <input class="form-control" type="password" id="password" required="" placeholder="Password" name="password">
                    <div class="d-xl-flex justify-content-xl-center checkbox">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="rememberMe" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>><label class="form-check-label" for="rememberMe">Remember me</label></div>
                    </div>
                    <div class="form-row">
                        <div class="col d-xl-flex justify-content-xl-center" style="padding-top: 11px;"><button class="btn btn-primary btn-block btn-lg btn-signin" type="submit" style="background-color: #af7505;">Sign in</button></div>
                    </div>
                </form>
                <div class="col text-center mx-auto" style="margin: 20px;background-color: rgba(255,255,255,0.82);max-width: 650px;"><a class="forgot-password" href="#">Forgot your password?</a></div>
                <div class="col text-center mx-auto" style="margin: 20px;background-color: rgba(255,255,255,0.82);max-width: 650px;"><a class="forgot-password" href="register.php" style="opacity: 1;">Create a New Account</a></div>
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