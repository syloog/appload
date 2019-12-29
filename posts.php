<?php
include("session.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Post Screen</title>
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
    <main class="page contact-page" style="background-color: #0c0f18;">
        <section class="portfolio-block contact" style="padding-bottom:15px;">
            <div class="container border rounded" style="background-color: #343a40;color: #ffffff;">
                <div class="row clearfix">
                    <?php
                    if (isset($_GET["post_id"])) {
                        $post_id = $_GET["post_id"];
                        $u_id = $_GET["u_id"];

                        $user_post_view_query = "UPDATE sharesposts SET post_views = post_views + 1 WHERE post_id = '$post_id'";
                        if (mysqli_query($db, $user_post_view_query) || die(mysqli_error($db)));

                        $post_info_query = "SELECT text, title, DATE(post_date) as post_date, TIME(post_date) as post_time FROM post WHERE post_id = '" . $post_id . "'";
                        $post_data = mysqli_query($db, $post_info_query);
                        $post_row = mysqli_fetch_array($post_data);

                        $user_info_query = "SELECT u_name, u_age, DATE(u_signdate) as u_signdate FROM users WHERE u_id = '" . $u_id . "'";
                        $user_data = mysqli_query($db, $user_info_query);
                        $user_row = mysqli_fetch_array($user_data);

                        $userType;
                        $check_queries = array();
                        $check_queries[0] = "SELECT u_id FROM regularuser WHERE u_id = '$u_id'";
                        $check_queries[1] = "SELECT u_id FROM developer WHERE u_id = '$u_id'";
                        $check_queries[2] = "SELECT u_id FROM editor WHERE u_id = '$u_id'";
                        $i = 0;

                        foreach ($check_queries as $query) {
                            $result = mysqli_query($db, $query);
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                            $count = mysqli_num_rows($result);

                            if ($count == 1 && $i == 0) {
                                $userType = "regular";
                            } else if ($count == 1 && $i == 1) {
                                $userType = "developer";
                            } else if ($count == 1 && $i == 2) {
                                $userType = "editor";
                            }
                            $i++;
                        }

                        echo "<div class='col-md-12 column' style='padding: 30px;'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
                                    <section class='panel-title'><time class='pull-right'><i class='fa fa-calendar'></i> " . $post_row["post_date"] . " , <i class='fa fa-clock-o'></i>" . $post_row["post_time"] . "
                                              </time>
                                        <section class='pull-left' id='id'><abbr title='count of posts in this topic'>#1</abbr></section>
                                    </section>
                                </div>
                                <section class='row panel-body'>
                                    <section class='col-md-9'>
                                        <h2>" . $post_row["title"] . "</h2>
                                        <hr />" . $post_row["text"] . "
                                    </section>
                                    <section id='user-description' class='col-md-3 '>
                                        <section class='well'>
                                            <div class='dropdown' ><a style='color:#c29801' href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cricle'></i>" . $user_row["u_name"] . "<span class='caret'></span></a>
                                                <ul class='dropdown-menu border-white' style='background-color: #343a40;padding-left:5px'>
                                                    <li><a style='color:#c29801' href='viewProfile.php?u_id=". $u_id ."'><i class='fa fa-user'></i> See profile</a></li>
                                                    <li class='divider'></li>
                                                </ul>
                                            </div>
                                            <dl class='dl-horizontal'><dt>Joined Date:</dt>
                                                <dd>" . $user_row["u_signdate"] . "</dd><dt>Age:</dt>
                                                <dd>" . $user_row["u_age"] . "</dd><dt>User:</dt>
                                                <dd class = 'text-capitalize'>" . $userType . "</dd>
                                            </dl>
                                        </section>
                                    </section>
                                </section>
                                <div class='panel-footer'>
                                    <div class='row justify-content'>
                                        <section class='col-md-2'></section>
                                        <section id='thanks' class='col-md-7 pull-left'><small></small><br /></section>
                                        <section class='col-md-4'";
                        echo "><span class='fa-stack'></span><i class='fa fa-edit'";
                        if ($_SESSION["u_id"] == $u_id) {
                            echo "visible";
                        } else {
                            echo "hidden";
                        };
                        echo "></i><a style='color:#c29801' href='#'";
                        if ($_SESSION["u_id"] == $u_id) {
                            echo "visible";
                        } else {
                            echo "hidden";
                        };
                        echo "> Edit Post | </a><i class='fa fa-close'";
                        if ($_SESSION["u_id"] == $u_id || $_SESSION["u_type"] == "editor") {
                            echo "visible";
                        } else {
                            echo "hidden";
                        };
                        echo "></i><a style='color:#c29801' href='#'";
                        if ($_SESSION["u_id"] == $u_id || $_SESSION["u_type"] == "editor") {
                            echo "visible";
                        } else {
                            echo "hidden";
                        };
                        echo "> Delete Post </a></section>
                                    </div>
                                </div>
                            </div>
                        </div></div></section><section class='portfolio-block contact' style='padding:0px;'><div class='container border rounded' style='background-color: #343a40;color: #ffffff;'>";


                        if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }

                        $no_of_answers_per_page = 5;
                        $offset = ($pageno - 1) * $no_of_answers_per_page;

                        $total_answers_sql = "SELECT COUNT(*) FROM answersposts WHERE post_id = '" . $post_id . "'";
                        $result = mysqli_query($db, $total_answers_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_answers_per_page);

                        $post_answers_info_query = "SELECT u_id, text, DATE(post_date) as post_date, TIME(post_date) as post_time FROM answersposts WHERE post_id = '" . $post_id . "' ORDER BY UNIX_TIMESTAMP(post_date) ASC LIMIT $offset, $no_of_answers_per_page";
                        $post_answers_data = mysqli_query($db, $post_answers_info_query);

                        while ($post_row = mysqli_fetch_array($post_answers_data)) {
                            $user_info_query = "SELECT u_id, u_name, u_age, DATE(u_signdate) as u_signdate FROM users WHERE u_id = '" . $post_row["u_id"] . "'";
                            $user_data = mysqli_query($db, $user_info_query);
                            $user_row = mysqli_fetch_array($user_data);

                            $userType;
                            $check_queries = array();
                            $check_queries[0] = "SELECT u_id FROM regularuser WHERE u_id = '" . $post_row["u_id"] . "'";
                            $check_queries[1] = "SELECT u_id FROM developer WHERE u_id = '" .$post_row["u_id"] . "'";
                            $check_queries[2] = "SELECT u_id FROM editor WHERE u_id = '" .$post_row["u_id"] . "'";
                            $i = 0;

                            foreach ($check_queries as $query) {
                                $result = mysqli_query($db, $query);
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                                $count = mysqli_num_rows($result);

                                if ($count == 1 && $i == 0) {
                                    $userType = "regular";
                                } else if ($count == 1 && $i == 1) {
                                    $userType = "developer";
                                } else if ($count == 1 && $i == 2) {
                                    $userType = "editor";
                                }
                                $i++;
                            }

                            echo "<div class='col-md-12 column' style='padding: 30px;'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
                                    <section class='panel-title'><time class='pull-right'><i class='fa fa-calendar'></i> " . $post_row["post_date"] . " , <i class='fa fa-clock-o'></i>" . $post_row["post_time"] . "
                                              </time>
                                        <section class='pull-left' id='id'><abbr title='count of posts in this topic'>#1</abbr></section>
                                    </section>
                                </div>
                                <section class='row panel-body'>
                                    <section class='col-md-9'>
                                        <hr />" . $post_row["text"] . "
                                    </section>
                                    <section id='user-description' class='col-md-3 '>
                                        <section class='well'>
                                            <div class='dropdown' ><a style='color:#c29801' href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cricle'></i>" . $user_row["u_name"] . "<span class='caret'></span></a>
                                                <ul class='dropdown-menu border-white' style='background-color: #343a40;padding-left:5px'>
                                                    <li><a style='color:#c29801' href='viewProfile.php?u_id=". $post_row["u_id"] ."'><i class='fa fa-user'></i> See profile</a></li>
                                                    <li class='divider'></li>
                                                </ul>
                                            </div>
                                            <dl class='dl-horizontal'><dt>Joined Date:</dt>
                                                <dd>" . $user_row["u_signdate"] . "</dd><dt>Age:</dt>
                                                <dd>" . $user_row["u_age"] . "</dd><dt>User:</dt>
                                                <dd class = 'text-capitalize'>" . $userType . "</dd>
                                            </dl>
                                        </section>
                                    </section>
                                </section>
                                <div class='panel-footer'>
                                    <div class='row justify-content'>
                                        <section class='col-md-2'></section>
                                        <section id='thanks' class='col-md-7 pull-left'><small></small><br /></section>
                                        <section class='col-md-4'";
                            echo "><span class='fa-stack'></span><i class='fa fa-edit'";
                            if ($_SESSION["u_id"] == $post_row["u_id"]) {
                                echo "visible";
                            } else {
                                echo "hidden";
                            };
                            echo "></i><a style='color:#c29801' href='#'";
                            if ($_SESSION["u_id"] == $post_row["u_id"]) {
                                echo "visible";
                            } else {
                                echo "hidden";
                            };
                            echo "> Edit Post | </a><i class='fa fa-close'";
                            if ($_SESSION["u_id"] == $post_row["u_id"] || $_SESSION["u_type"] == "editor") {
                                echo "visible";
                            } else {
                                echo "hidden";
                            };
                            echo "></i><a style='color:#c29801' href='#'";
                            if ($_SESSION["u_id"] == $post_row["u_id"] || $_SESSION["u_type"] == "editor") {
                                echo "visible";
                            } else {
                                echo "hidden";
                            };
                            echo "> Delete Answer </a></section>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        }
                    } else {
                        echo "Post cannot be found";
                    }
                    ?>
                </div>
                <div class="d-xl-flex justify-content-xl-center thread-list-head">
                    <ul class="pagination">
                        <?php
                        echo "<li class='page-item'style='background-color: #343a40;'><a class='page-link' href='";
                        if ($pageno <= 1) {
                            echo '#';
                        } else {
                            echo "?post_id=" . $_GET["post_id"] . "&u_id=" . $_GET["u_id"];
                            echo "&pageno=" . ($pageno - 1);
                        }
                        echo "'aria-label='Previous'><span aria-hidden='true'>«</span></a></li>";
                        $j = $pageno;
                        for ($i = 1; $i <= 3; $i++) {
                            if ($j <= $total_pages) {
                                echo "<li class='page-item'><a class='page-link' href='";
                                echo "?post_id=" . $_GET["post_id"] . "&u_id=" . $_GET["u_id"];
                                echo "&pageno=" . $j;
                                echo "'>" . $j . "</a></li>";
                                $j++;
                            }
                        }
                        echo "<li class='page-item'><a class='page-link' href='";
                        if ($pageno >= $total_pages) {
                            echo '#';
                        } else {
                            echo "?post_id=" . $_GET["post_id"] . "&u_id=" . $_GET["u_id"];
                            echo "&pageno=" . ($pageno + 1);
                        }
                        echo "' aria-label='Next'><span aria-hidden='true'>»</span></a></li>";
                        ?>
                    </ul>
                </div>
        </section>
        <section class="portfolio-block contact" style="padding-top:0px">
            <div class="container border rounded" style="background-color: #343a40;color: #ffffff">
                <form class="shadow-none" action="addPost.php" method="POST" style="max-width:100%;padding:15px;margin:0px">
                    <div class="form-group" hidden>
                        <input type='hidden' name="post_id" value="<?php echo $_GET['post_id']; ?>" />
                    </div>
                    <div class="form-group" style="width:100%">
                        <label for="description">Your Reply</label>
                        <textarea rows="5" class="form-control" name="description" style="background-color: rgb(255,255,255);height: 150px;min-height: 100px;max-height: 300px;" required></textarea>
                    </div>
                    <div class="form-group" style="width:100%">
                        <button name="answerpost" value="1" style="margin:0px;width:100%" class="btn btn-primary bg-dark border rounded-0" type="submit">Send</button>
                    </div>
                </form>
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