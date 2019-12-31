<?php
include('session.php');
    $errors = array();
    $success = array();
    if(isset($_GET['c_id']) && isset($_GET["appname"]) && isset($_GET["u_id"]) && isset($_GET["app_id"])){
        $c_id = $_GET['c_id'];
        $app_id = $_GET["app_id"];
        $u_id = $_GET["u_id"];

        $delete_reply_query = "DELETE FROM replies WHERE c_id =" . $c_id . " AND app_id =" . $app_id . " AND u_id =" . $u_id . " AND dev_id =" . $_SESSION["u_id"];
        if (mysqli_query($db, $delete_reply_query)) {
            array_push($success, "Reply successfully deleted.");
            $_SESSION["success"] = $success;
            header("location: appPage.php?appname=" . $_GET["appname"] ."");
        } else {
            array_push($errors, "Reply not deleted.");
            $_SESSION["error"] = $errors;
            header("location: appPage.php?appname=" . $_GET["appname"] ."");
        }
    }
