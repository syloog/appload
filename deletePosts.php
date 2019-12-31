<?php
include('session.php');
    $errors = array();
    $success = array();
    if(isset($_GET['post_id']) && isset($_GET['u_id'])){

        $delete_user_query = "DELETE FROM sharesposts WHERE u_id = ".$_GET['u_id']." and post_id = ".$_GET['post_id'];
        if (mysqli_query($db, $delete_user_query)) {
            array_push($success, "Your post is deleted.");
            $_SESSION["success"] = $success;
            header("location: forum.php?sort=lastest&pageno=1");
        } else {
            array_push($errors, "Something went wrong. Please try again.");
            $_SESSION["error"] = $errors;
            header("location: forum.php?sort=lastest&pageno=1");
        }
    }
?> 