<?php

require("config.php");
session_start();
$errors = array();
$success = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['addcomment'] == 1) {
        $c_id = rand(10000000, 20000000);

        $comment_check_query = "SELECT c_id FROM comment WHERE c_id = '$c_id'";
        $result = mysqli_query($db, $comment_check_query);
        $comment_id_exist = mysqli_num_rows($result);

        if ($comment_id_exist == 0) {
            $description = $_POST["description"];
            $rating = $_POST["rating"];
            $u_id = $_SESSION["u_id"];
            $app_id = $_GET["app_id"];
            $insert_comment_query = "INSERT INTO comment VALUES('" . $c_id . "', '" . $description . "')";

            if ((mysqli_query($db, $insert_comment_query))) {
                
                $insert_comment_on_query = "INSERT INTO commentson VALUES('" . $c_id . "', '" . $u_id . "', $rating)";
                
                if ((mysqli_query($db, $insert_comment_on_query))) {

                    $insert_about_query = "INSERT INTO about VALUES('" . $c_id . "', '" . $u_id . "', $app_id)";

                    if ((mysqli_query($db, $insert_about_query))) {
                        array_push($success, "Comment is created.");
                        $_SESSION["success"] = $success;
                        header("location: appPage.php?appname=" . $_GET["appname"]);
                    } else {
                        array_push($errors, "Cannot add the comment.");
                        $_SESSION["error"] = $errors;
                        header("location: appPage.php?appname=" . $_GET["appname"]);
                    }
                } else {
                    array_push($errors, "Cannot add the comment.");
                    $_SESSION["error"] = $errors;
                    header("location: appPage.php?appname=" . $_GET["appname"]);
                }
            } else {
                array_push($errors, "Something went wrong. Please try again.");
                $_SESSION["error"] = $errors;
                header("location: appPage.php?appname=" . $_GET["appname"]);
            }
        } else {
        }
    } else if ($_POST['replycomment'] == 1) {
    }
}
