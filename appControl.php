<?php
include('session.php');

if ($_SESSION["u_type"] != "editor") {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
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
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient" style="font-family: Roboto, sans-serif;opacity: 1;background-image: url(&quot;assets/img/Rectangle%201.png&quot;);background-size: cover;">
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
                $errors = array();
                if (isset($_GET["appname"])) {
                    $query_check_app = 'Select * from application where appname ="' . $_GET["appname"] . '"';
                    $result = mysqli_query($db, $query_check_app);
                    $app_info = mysqli_fetch_assoc($result);
                    echo '<div class="row">
                            <div class="col-md-12" style="padding-bottom: 25px;padding-top: 25px;">
                                <h2 class="text-center">Application Control</h2>
                            </div>
                            <div class="col site-form">';
                    echo '<div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Application Name</td>
                                        <td>' . $app_info["appname"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Version</td>
                                        <td>' . $app_info["app_version"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td>' . $app_info["app_date"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td>' . $app_info["cat_id"] . '</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>';
                    echo '<div style="padding:50px" class="col"><a href="./uploads/' . $app_info["file"] .'"><button class="button" type="button" name="approve" value="1" style="background-color:rgb(111, 204, 39)" data-hover="CONFIRM ?"><span>DOWNLOAD APPLICATION</span></button></a></div>';
                    echo '</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h3>Description</h3>
                            <p>' . $app_info["description"] . '</p>
                            <form method="post" class="shadow-none" style="padding: 0px;margin: 0px;width: 100%;max-width: 100%;" action="appCheck.php?app_id=' . $app_info["app_id"] .'&appname=' . $app_info["appname"] . '">
                            <div class="row" style="padding-top: 25px;">
                                <div class="col"><button class="button" type="submit" name="approve" value="1" style="background-color:rgb(255, 204, 39)" data-hover="CONFIRM ?"><span>APPROVE APPLICATION</span></button></div>
                                <div class="col"><button class="button" type="submit" data-hover="CONFIRM ?" name="disapprove" value="1" style="background-color:rgb(209, 50, 82)"><span>DISAPPROVE APPLICATION</span></button></div>
                            </div>
                            </form>
                        </div>
                    </div>';
                } else {
                    array_push($errors, "An error occured. Try again.");
                    $_SESSION["error"] = $errors;
                    header("location: appList.php");
                }
                ?>
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
</body>

</html>