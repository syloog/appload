<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home Page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts.googleapis.com/css?family=Lato:300,400,700">
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

<body style="background-color: rgb(16,16,16);">
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
    <main class="page contact-page">
        <section class="portfolio-block contact" style="margin: 150px;">
            <div class="container">
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
                <?php
                if (isset($_SESSION["u_type"])) {
                    $userType = $_SESSION["u_type"];
                    $userId = $_SESSION["u_id"];
                    $username = $_SESSION["u_username"];
                    if ($userType == "developer") {
                        echo "<h1 class='display-2 text-center' style='padding:5px; color: rgb(255,237,140);'> Welcome Developer, ";
                        echo "$username</h1>";
                    } else if ($userType == "editor") {
                        echo "<h1 class='display-2 text-center' style='padding:5px; color: rgb(255,237,140);'> Welcome Editor, ";
                        echo "$username</h1>";
                    } else if ($userType == "regular") {
                        echo "<h1 class='display-2 text-center' style='padding:5px; color: rgb(255,237,140);'> Welcome User, ";
                        echo "$username</h1>";
                    }
                } else {
                    echo "<h1 class='display-2 text-center' style='color: rgb(247,153,0);padding-bottom: 150px;'>Welcome to AppLoad!</h1>
                    </div>
                </div>
            </div>
            <div class='container' style='background-color: #ffcd00;padding: 100px;'>
                <div class='intro'>
                    <h2 class='text-center'>Features</h2>
                    <p class='text-center'>Here are some features of our website you can take a look.</p>
                </div>
                <div class='row features'>
                    <div class='col-sm-6 col-md-4 item'><i class='fa fa-forumbee icon'></i>
                        <h3 class='name'>Forums</h3>
                        <p class='description'>Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                    </div>
                    <div class='col-sm-6 col-md-4 item'><i class='fa fa-download icon'></i>
                        <h3 class='name'>Applications</h3>
                        <p class='description'>Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                    </div>
                    <div class='col-sm-6 col-md-4 item'><i class='fa fa-certificate icon'></i>
                        <h3 class='name'>Rating System</h3>
                        <p class='description'>Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                    </div>
                    <div class='col-sm-6 col-md-4 item'><i class='fa fa-universal-access icon'></i>
                        <h3 class='name'>Easy Access</h3>
                        <p class='description'>Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                    </div>
                    <div class='col-sm-6 col-md-4 item'><i class='fa fa-plane icon'></i>
                        <h3 class='name'>Fast</h3>
                        <p class='description'>Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                    </div>
                    <div class='col-sm-6 col-md-4 item'><i class='far fa-user icon'></i>
                        <h3 class='name'>Own Profile</h3>
                        <p class='description'>Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                    </div>
                </div>
            </div>";
                }
                ?>
            </div>
        </section>
    </main>
    <div data-bs-parallax-bg="true" style="height: 500px;background-image: url(&quot;assets/img/2018-06-04-21-40-16.jpeg&quot;);background-position: center;background-size: cover;">
    </div>
    <footer class="page-footer">
        <div class="container">
            <div class="links"><a href="#" style="color: #725e26;">About us</a><a href="contact.html" style="color: #725e26;">Contact us</a></div>
            <div class="social-icons"><a href="#" style="color: #af7505;"><i class="icon ion-social-facebook" style="color: #725e26;"></i></a><a href="#"><i class="icon ion-social-instagram-outline" style="color: #725e26;"></i></a><a href="#" style="color: #725e26;"><i class="icon ion-social-twitter"></i></a></div>
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