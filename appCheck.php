<?php

require("config.php");
session_start();
$errors = array();
$success = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['approve'])) {
        $approve_status_app_query = 'UPDATE application SET app_status = "APPROVED" WHERE appname = "' . $_GET["appname"] . '"';
        if (mysqli_query($db, $approve_status_app_query)) {
            array_push($success, "Application is approved.");
            $_SESSION["success"] = $success;
            header("location: appList.php");
        } else if (mysqli_error($db)) {
            array_push($errors, "An error occured.");
            $_SESSION["error"] = $errors;
            header("location: appList.php");
        }
    } else if (isset($_POST['disapprove'])) {
        $disapprove_status_app_query = 'DELETE FROM application WHERE appname = "' . $_GET["appname"] . '"';
        if (mysqli_query($db, $disapprove_status_app_query)) {
            array_push($success, "Application is disapproved.");
            $_SESSION["success"] = $success;
            header("location: appList.php");
        } else if (mysqli_error($db)) {
            array_push($errors, "An error occured.");
            $_SESSION["error"] = $errors;
            header("location: appList.php");
        }
    }
}
