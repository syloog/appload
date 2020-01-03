<?php
include('session.php');



if (isset($_GET["appname"]) != 0) {

    $var = $_GET['appname'];
    $query_app_name = "Select * from application where appname = '$var'";

    if ($result_app_info  = mysqli_query($db, $query_app_name)) {
    } else {
        die(mysqli_error($db));
    }
    $errors = array();
    $row = mysqli_fetch_array($result_app_info, MYSQLI_BOTH);
    $app_id = $row["app_id"];
    $description = $row["description"];
    $app_version = $row["app_version"];
    $minimumAge = $row["minimumAge"];
    $appLogo = $row["appLogo"];
    $cat_id = $row["cat_id"];
    $app_status = $row["app_status"];
    $file = $row["file"];

    if ($_SESSION["u_type"] == "regular" && $app_status == "WAITING") {
        array_push($errors, "This application is under evalution. Please, try again some other time.");
        $_SESSION["error"] = $errors;
        header("location: index.php");
    } else {
        $area_req = "Select area_name from restricts INNER JOIN area USING(area_id) WHERE app_id = " . $app_id;
        $areas = array();
        if ($result_area_requirement = mysqli_query($db, $area_req)) {

            while ($row = mysqli_fetch_array($result_area_requirement)) {
                array_push($areas, $row["area_name"]);
            }
        } else {
            die(mysqli_error($db));
        }

        $query_req = "Select req_id from req_restricts where app_id = $app_id";
        $reqId;

        if ($result_requirement = mysqli_query($db, $query_req)) {

            $row = mysqli_fetch_assoc($result_requirement);
            $req_Id = $row["req_id"];
        } else {
            die(mysqli_error($db));
        }

        $req_Id = $req_Id + 0;
        $query_min_req = "Select * from minimum_requirement where req_id = $req_Id";


        if ($result_min_req  = mysqli_query($db, $query_min_req)) {
        } else {
            die(mysqli_error($db));
        }

        $row = mysqli_fetch_assoc($result_min_req);
        $os_version = $row["os_version"];
        $ram = $row["ram"];
        $cpu = $row["cpu"];
        $storage = $row["storage"];
    }
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

<body>';



    echo ' <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient" style="font-family: Roboto, sans-serif;opacity: 1;background-image: url(&quot;assets/img/Rectangle%201.png&quot;);">
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
            <?php
            if (isset($_SESSION["error"])) {
                foreach ($_SESSION["error"] as $error) {
                    echo "<div class='row' style='padding-left:35px;padding-right:35px'><div class='col d-xl-flex justify-content-xl-center'><div class='alert alert-danger' role='alert' style='width:50%; padding-left: 35px'><span><strong> Alert </strong>";
                    echo $error;
                    echo " </span></div></div></div>";
                }
                unset($_SESSION["error"]);
            } else if (isset($_SESSION["success"])) {
                foreach ($_SESSION["success"] as $success) {
                    echo "<div class='row' style='padding-left:35px;padding-right:35px'><div class='col d-xl-flex justify-content-xl-center'><div class='alert alert-success' role='alert' style='width:50%; padding-left: 35px'><span><strong> Success: </strong>";
                    echo $success;
                    echo " </span></div></div></div>";
                }
                unset($_SESSION["success"]);
            }
            ?>
            <div class="container border rounded" style="padding:35px">
                <div class="row">
                    <div class="col d-xl-flex align-self-center align-items-xl-center item" style="height:400px;width:400px;max-width:400px;max-height:400px"><a><img class="img-thumbnail" style="width:400px;height:400px;background-size:cover;<?php echo 'background-image:url(&quot;/images/application_photos/' . $appLogo . '&quot;);' ?>"></a></div>
                    <div class=" col align-self-center">
                        <h4><?php echo $var; ?><br /></h4>
                        <div class="row d-sm-flex d-xl-flex justify-content-center align-items-xl-center">
                            <div class="col">
                                <div class="row">
                                    <?php
                                    if ($_SESSION["u_type"] == "developer") {
                                        echo "<a href=manageApplication.php?app_id=" . $app_id . '><div class="col"><button class="button" type="submit" data-hover="CLICK HERE"><span>MANAGE APP</span></button></a>';
                                    } else if ($_SESSION["u_type"] == "regular") {
                                        echo "<a href=download.php?app_id=". $app_id ."&file=" . $file . '><div class="col"><button class="button" type="submit" data-hover="NOW!"><span>DOWNLOAD</span></button></a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="portfolio-block block-intro" style="padding-bottom: 30px;">
            <div class="container">
                <div>
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Details</a></li>
                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Comments</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" role="tabpanel" id="tab-1">
                            <div class="col">
                                <p><br><br> <?php echo $description; ?> <br><br></p>
                            </div>
                            <div class="col-6 mx-auto" style="padding-bottom: 15px;padding-top: 15px;">
                            </div>
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>App Requirements</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Age</td>
                                                <td>+ <?php echo $minimumAge; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Supported Areas</td>
                                                <td>
                                                    <?php
                                                    $totalCount = count($areas);
                                                    $i = 0;
                                                    foreach ($areas as $area) {
                                                        $i++;
                                                        echo $area;
                                                        if ($i !=  $totalCount)
                                                            echo " / ";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Operating System</td>
                                                <td> <?php echo $os_version; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>RAM</td>
                                                <td> <?php echo $ram; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Storage</td>
                                                <td> <?php echo $storage; ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="tab-2">
                            <div class="col" style="padding: 0px;">
                                <div class="comment-wrapper">
                                    <div class="panel panel-info">
                                        <div class="panel-body" style="padding-top: 15px">
                                            <div class="row mx-auto d-flex justify-content-center" style="padding:0px;margin:0px">
                                                <?php
                                                if ($_SESSION["u_type"] == "regular") {
                                                    echo '<form method="post" action="addComment.php?appname=' . $_GET["appname"] . '&app_id=' . $app_id . '" class="shadow-none border" style="padding:10px;margin:0px;margin-bottom:50px;height:100%;width:100%;max-width:100%;max-height:100%">
                                                    <fieldset id="rating" required="">
                                                        <legend>Choose a Rating for this application</legend>
                                                        <div class="row mx-auto d-flex justify-content-center" style="padding-bottom:10px">
                                                        <div class="custom-control custom-radio" style="padding-right:15px"><input type="radio" value="1" id="rate1" class="custom-control-input" name="rating"><label class="custom-control-label" for="rate1">1</label></div>
                                                        <div class="custom-control custom-radio" style="padding-right:15px"><input type="radio" value="2" id="rate2" class="custom-control-input" name="rating"><label class="custom-control-label" for="rate2">2</label></div>
                                                        <div class="custom-control custom-radio" style="padding-right:15px"><input type="radio" value="3" id="rate3" class="custom-control-input" name="rating"><label class="custom-control-label" for="rate3">3</label></div>
                                                        <div class="custom-control custom-radio" style="padding-right:15px"><input type="radio" value="4" id="rate4" class="custom-control-input" name="rating"><label class="custom-control-label" for="rate4">4</label></div>
                                                        <div class="custom-control custom-radio" style="padding-right:15px"><input type="radio" value="5" id="rate5" class="custom-control-input" name="rating"><label class="custom-control-label" for="rate5">5</label></div>
                                                        </div>
                                                    </fieldset>
                                                    <textarea required="" style="max-height:200px" class="form-control" name="description" placeholder="write a comment..." rows="3"></textarea>
                                                    <br>
                                                    <button type="submit" class="button" name="addcomment" value="1" class="btn btn-info pull-right">Comment</button>
                                                    <div class="clearfix"></div>
                                                    <hr>
                                                </form>';
                                                }
                                                ?>
                                            </div>
                                            <?php

                                            $comments_info_query = "SELECT commentson.u_id, comment.text, commentson.rate, commentson.c_id FROM comment
                                            INNER JOIN commentson
                                             ON comment.c_id = commentson.c_id
                                            INNER JOIN about
                                             ON comment.c_id = about.c_id WHERE about.app_id = '" . $app_id . "'";
                                            if ($comment_data = mysqli_query($db, $comments_info_query)) {
                                                while ($comment_row = mysqli_fetch_array($comment_data)) {
                                                    $user_info_query = "SELECT u_id, u_name FROM users WHERE u_id = '" . $comment_row["u_id"] . "'";
                                                    $user_data = mysqli_query($db, $user_info_query);
                                                    $user_row = mysqli_fetch_array($user_data);

                                                    echo '<ul class="media-list" style="padding-top:40px">
                                                    <li class="media">
                                                        <a href="viewProfile.php?u_id=' . $user_row["u_id"] . '" class="pull-left">
                                                            <img src="images/profile_photos/default_pic.png" alt="" class="img-circle">
                                                        </a>
                                                        <div class="media-body">
                                                            <strong class="text-success">' . $user_row["u_name"] . '</strong>
                                                            <div class="row mx-auto d-flex justify-content-center" style="margin:0px;padding:0px">
                                                                <p>' . $comment_row["text"] . '
                                                                </p>
                                                            </div>';

                                                    if ($_SESSION["u_id"] == $user_row["u_id"]) {
                                                        echo '<a style="padding:0px" href ="deleteComment.php?appname=' . $_GET["appname"] . '&c_id=' . $comment_row["c_id"] . '"><button type="button" class="btn btn-link" style="padding:0px">Delete Comment</button></a>';
                                                    }

                                                    echo '<div class="row mx-auto d-flex d-flex justify-content-center">';

                                                    $replies_info_query = "SELECT dev_id, text, app_id FROM replies WHERE c_id = " . $comment_row["c_id"];
                                                    if ($reply_data = mysqli_query($db, $replies_info_query)) {
                                                        if (mysqli_num_rows($reply_data) > 0) {
                                                            $reply_row = mysqli_fetch_assoc($reply_data);

                                                            $dev_info_query = "SELECT u_name FROM users WHERE u_id =" . $reply_row["dev_id"];
                                                            $dev_data = mysqli_query($db, $dev_info_query);
                                                            $dev_row = mysqli_fetch_assoc($dev_data);

                                                            echo '<div class="media-body" style="padding-top:35px;">
                                                            <a href="viewProfile.php?u_id=' . $reply_row["dev_id"] . '" class="pull-left">
                                                                <img src="images/profile_photos/default_pic.png" alt="" class="img-circle">
                                                            </a>
                                                                <strong class="text-success">(Developer) ' . $dev_row["u_name"] . '</strong>
                                                                <div class="row mx-auto d-flex justify-content-center" style="padding-right:70px">
                                                                    <p>' . $reply_row["text"] . '
                                                                    </p>
                                                                </div>';
                                                            echo '<a style="padding:0px" href ="deleteReply.php?appname=' . $_GET["appname"] . '&app_id=' . $reply_row["app_id"] .'&c_id=' . $comment_row["c_id"] .'&u_id=' . $user_row["u_id"] . '"><button type="button" class="btn btn-link" style="padding:0px">Delete Reply</button></a>';
                                                            echo '</div>';
                                                        }
                                                    }

                                                    if ($_SESSION["u_type"] == "developer" && mysqli_num_rows($reply_data) == 0) {
                                                        $dev_check_query = "SELECT * from develops WHERE app_id= " . $app_id . " AND dev_id=" . $_SESSION["u_id"];
                                                        $dev_exists = mysqli_query($db, $dev_check_query);
                                                        $dev_id_exist = mysqli_num_rows($dev_exists);
                                                        if ($dev_id_exist > 0) {
                                                            echo '<form method="post" action="addComment.php?appname=' . $_GET["appname"] . '&app_id=' . $app_id . '&u_id=' . $user_row["u_id"] . '&c_id=' . $comment_row["c_id"] . '" class="shadow-none" style="padding:10px;margin:0px;height:90%;width:90%;max-width:90%;max-height:90%">

                                                            <textarea required="" style="max-height:200px" class="form-control" name="description" placeholder="write a reply..." rows="3"></textarea>
                                                            <br>
                                                            <button class="button" type="submit" name="addreply" value="1" class="btn btn-info pull-right">Reply</button>
                                                            <div class="clearfix"></div>
                                                            <hr>
                                                            </form>';
                                                        }
                                                    }

                                                    echo '</div></div></li></ul>';
                                                }
                                            }
                                            ?>
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
    <section class="portfolio-block website gradient" style="background-image: url(&quot;assets/img/2018-06-04-21-40-16.jpeg&quot;);background-size: contain;"></section>
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
    <script src="assets/js/theme.js"></script>;
</body>

</html>;
}