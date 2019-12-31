<?php
    include('session.php');
    $var = $_GET["app_id"];
    $query = "delete from application where app_id= ".$var;
    if(mysqli_query($db,$query))
    {
        array_push($success, "Application is deleted.");
        $_SESSION["success"] = $success;
        header("location: devApps.php");
    }
    else
    {
        array_push($errors, "Cannot delete the app.");
        $_SESSION["error"] = $errors;
        header("location: manageApplication.php");
    }
