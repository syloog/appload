<?php
include("session.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Forum</title>
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
        <section class="portfolio-block projects-with-sidebar" style="padding-bottom:250px">
            <div class="container">
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
                    <div class="col-md-12" style="padding:0px">
                        <ul class="nav link border nav-fill rounded border-dark" style="background-color: #c78b01;padding-bottom: 0px;">
                            <li class="nav-item"><a role="tab" data-toggle="tab" class="nav-link" href="#tab-1" style="font-weight:bold"><strong>Lastest</strong></a></li>
                            <li class="nav-item"><a role="tab" data-toggle="tab" class="nav-link" href="#tab-2" style="font-weight:bold"><strong>Popular</strong></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane <?php
                                                    if ($_GET['sort'] == "lastest") {
                                                        echo "active";
                                                    }
                                                    ?>" role="tabpanel" id="tab-1">
                                <div class="table-responsive table-borderless border rounded border-dark" style="background-color: #343a40;">
                                    <table class="table table-bordered table-dark">
                                        <thead>
                                            <tr>
                                                <th class="bg" style="width: 15%;min-width: 15%;max-width: 25%;background-color: #c78b01">Date</th>
                                                <th class="bg" style="background-color: #c78b01">Title</th>
                                                <th class="bg" style="width: 15%;min-width: 15%;max-width: 25%;background-color: #c78b01">Owner</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            if (isset($_GET['pageno']) && $_GET['sort'] == "lastest") {
                                                $pageno = $_GET['pageno'];
                                            } else {
                                                $pageno = 1;
                                            }

                                            $no_of_records_per_page = 7;
                                            $offset = ($pageno - 1) * $no_of_records_per_page;

                                            $total_pages_sql = "SELECT COUNT(*) FROM sharesposts";
                                            $result = mysqli_query($db, $total_pages_sql);
                                            $total_rows = mysqli_fetch_array($result)[0];
                                            $total_pages = ceil($total_rows / $no_of_records_per_page);

                                            $post_info_query = "SELECT u_id, post_id, title, date(post_date) as post_date FROM post INNER JOIN sharesposts USING (post_id) ORDER BY post.post_date DESC LIMIT $offset, $no_of_records_per_page";
                                            $post_data = mysqli_query($db, $post_info_query);

                                            while ($row = mysqli_fetch_array($post_data)) {
                                                $user_check_query = "SELECT u_name FROM users WHERE u_id = '" . $row["u_id"] . "'";
                                                $result = mysqli_query($db, $user_check_query);
                                                $user = mysqli_fetch_assoc($result);
                                                echo "<tr><td><span class='text'>" . $row["post_date"] . "</span></td><td><span class='title'><a style='color:#ffffff' href='posts.php?post_id=" . $row["post_id"] . "&u_id=" . $row["u_id"] . "'>" . $row["title"] . "</a></span></td><td><span class='text'>" . $user["u_name"] . "</span></td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="d-xl-flex justify-content-xl-center thread-list-head">
                                        <ul class="pagination">
                                            <?php
                                            echo "<li class='page-item'style='background-color: #343a40;'><a class='page-link' href='";
                                            if ($pageno <= 1) {
                                                echo '#';
                                            } else {
                                                echo "?sort=lastest&pageno=" . ($pageno - 1);
                                            }
                                            echo "'aria-label='Previous'><span aria-hidden='true'>«</span></a></li>";
                                            $j = $pageno;
                                            for ($i = 1; $i <= 3; $i++) {
                                                if ($j <= $total_pages) {
                                                    echo "<li class='page-item'><a class='page-link' href='";
                                                    echo "?sort=lastest&pageno=" . $j;
                                                    echo "'>" . $j . "</a></li>";
                                                    $j++;
                                                }
                                            }
                                            echo "<li class='page-item'><a class='page-link' href='";
                                            if ($pageno >= $total_pages) {
                                                echo '#';
                                            } else {
                                                echo "?sort=lastest&pageno=" . ($pageno + 1);
                                            }
                                            echo "' aria-label='Next'><span aria-hidden='true'>»</span></a></li>";
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane <?php
                                                    if ($_GET['sort'] == "popular") {
                                                        echo "active";
                                                    }
                                                    ?>" role="tabpanel" id="tab-2">
                                <div class="table-responsive table-borderless border rounded border-dark" style="background-color: #343a40;">
                                    <table class="table table-bordered table-dark">
                                        <thead>
                                            <tr>
                                                <th class="bg" style="width: 15%;min-width: 15%;max-width: 25%;background-color: #c78b01">Date</th>
                                                <th class="bg" style="background-color: #c78b01">Title</th>
                                                <th class="bg" style="width: 15%;min-width: 15%;max-width: 25%;background-color: #c78b01">Owner</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            if (isset($_GET['pageno']) && $_GET['sort'] == "popular") {
                                                $pageno = $_GET['pageno'];
                                            } else {
                                                $pageno = 1;
                                            }

                                            $no_of_records_per_page = 7;
                                            $offset = ($pageno - 1) * $no_of_records_per_page;

                                            $total_pages_sql = "SELECT COUNT(*) FROM sharesposts";
                                            $result = mysqli_query($db, $total_pages_sql);
                                            $total_rows = mysqli_fetch_array($result)[0];
                                            $total_pages = ceil($total_rows / $no_of_records_per_page);

                                            $post_info_query = "SELECT u_id, post_id, title, date(post_date) as post_date FROM post INNER JOIN sharesposts USING (post_id) ORDER BY sharesposts.post_views DESC LIMIT $offset, $no_of_records_per_page";
                                            $post_data = mysqli_query($db, $post_info_query);

                                            while ($row = mysqli_fetch_array($post_data)) {
                                                $user_check_query = "SELECT u_name FROM users WHERE u_id = '" . $row["u_id"] . "'";
                                                $result = mysqli_query($db, $user_check_query);
                                                $user = mysqli_fetch_assoc($result);
                                                echo "<tr><td><span class='text'>" . $row["post_date"] . "</span></td><td><span class='title'><a style='color:#ffffff' href='posts.php?post_id=" . $row["post_id"] . "&u_id=" . $row["u_id"] . "'>" . $row["title"] . "</a></span></td><td><span class='text'>" . $user["u_name"] . "</span></td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="d-xl-flex justify-content-xl-center thread-list-head">
                                        <ul class="pagination">
                                            <?php
                                            echo "<li class='page-item'style='background-color: #343a40;'><a class='page-link' href='";
                                            if ($pageno <= 1) {
                                                echo '#';
                                            } else {
                                                echo "?sort=popular&pageno=" . ($pageno - 1);
                                            }
                                            echo "'aria-label='Previous'><span aria-hidden='true'>«</span></a></li>";
                                            $j = $pageno;
                                            for ($i = 1; $i <= 3; $i++) {
                                                if ($j <= $total_pages) {
                                                    echo "<li class='page-item'><a class='page-link' href='";
                                                    echo "?sort=popular&pageno=" . $j;
                                                    echo "'>" . $j . "</a></li>";
                                                    $j++;
                                                }
                                            }
                                            echo "<li class='page-item'><a class='page-link' href='";
                                            if ($pageno >= $total_pages) {
                                                echo '#';
                                            } else {
                                                echo "?sort=popular&pageno=" . ($pageno + 1);
                                            }
                                            echo "' aria-label='Next'><span aria-hidden='true'>»</span></a></li>";
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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