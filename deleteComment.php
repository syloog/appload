<?php
include('session.php');
    $errors = array();
    $success = array();
    if(isset($_GET['c_id']) && isset($_GET["appname"])){
        $c_id = $_GET['c_id'];
        $delete_user_query = "DELETE FROM comment WHERE c_id =" . $c_id;
        if (mysqli_query($db, $delete_user_query)) {
            array_push($success, "Comment successfully deleted.");
            $_SESSION["success"] = $success;
            header("location: appPage.php?appname=" . $_GET["appname"] ."");
        } else {
            header("location: profileUser.php");
        }
    }