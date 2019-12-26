<?php
include('session.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>App List</title>
    <meta property="og:type" content="">
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
    <main class="page projects-page" style="background-color: #0c0f18;">
        <section style="padding:50px;padding-bottom:250px">
            <div class="container border rounded" style="background-color: #ffffff;">
                <div class="row d-xl-flex justify-content-xl-center">
                    <div class="col-md-4 text-center" style="padding-bottom: 15px;padding-top: 24px;">
                        <h2 style="width: 343px;">List of Devices</h2>
                    </div>
                </div>
                <?php
                if (isset($_SESSION["error"])) {
                    foreach ($_SESSION["error"] as $error) {
                        echo "<div class='row'><div class='col d-xl-flex justify-content-xl-center'><div class='alert alert-danger' role='alert' style='width:100%;padding-left: 35px'><span><strong> Alert </strong>";
                        echo $error;
                        echo " </span></div></div></div>";
                    }
                    unset($_SESSION["error"]);
                }
                else if (isset($_SESSION["success"])) {
                    foreach ($_SESSION["success"] as $success) {
                        echo "<div class='row' style='padding-left:35px;padding-right:35px'><div class='col d-xl-flex justify-content-xl-center'><div class='alert alert-success' role='alert' style='width:100%;padding-left: 35px'><span><strong> Success: </strong>";
                        echo $success;
                        echo " </span></div></div></div>";
                    }
                    unset($_SESSION["success"]);
                }
                ?>
                <form method='post' action='deleteDevice.php'>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive" style="padding: 35px">
                                <?php
                                $u_id = $_SESSION["u_id"];
                                $select_user_device_query = mysqli_query($db, "SELECT device_id, d_os, d_ram, d_cpu, d_storage
                                FROM regularuserdevice
                                INNER JOIN device USING (device_id) WHERE u_id='" . $u_id . "'");

                                echo "<table class='table '>
                                <thead>
                                <tr>
                                <th>Device OS</th>
                                <th>Device RAM</th>
                                <th>Device CPU</th>
                                <th>Device Storage</th>
                                <th>Action</th>
                                </tr>
                                </thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($select_user_device_query)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['d_os'] . "</td>";
                                    echo "<td>" . $row['d_ram'] . "</td>";
                                    echo "<td>" . $row['d_cpu'] . "</td>";
                                    echo "<td>" . $row['d_storage'] . "</td>";
                                    echo "<td><a class='btn btn-warning' role='button' type='submit' name='device_id' value= " . $row['device_id'] . "><i class='fas fa-exclamation-triangle d-xl-flex justify-content-xl-center align-items-xl-center'></i></a></td>";
                                    echo "</tr>";
                                }
                                echo "</tbody></table>";
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row " style="padding-top: 25px;">
                    <div class="col d-xl-flex justify-content-xl-center"><a href="createDevice.php"><button class="button" type="button" data-hover="CONFIRM ?"><span>CREATE DEVICE</span></button></a></div>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>