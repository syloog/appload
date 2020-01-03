<?php

require("config.php");
session_start();

$editPassword_1 = $editPassword_2 = $editEmail = $editAge = $editName = "";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $editType = mysqli_real_escape_string($db, $_POST['editType']);

    if ($editType == "regular") {
        $u_id = $_SESSION["u_id"];
        $editName = mysqli_real_escape_string($db, $_POST['name']);
        $editAge = mysqli_real_escape_string($db, $_POST['age']);
        $editPassword_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $editPassword_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        if (!mb_detect_encoding($editPassword_1, 'ASCII', true)) {
            array_push($errors, "Please enter valid characters for Password.");
        }

        if ($editPassword_1 != $editPassword_2) {
            array_push($errors, "The two passwords do not match");
        }

        if (count($errors) == 0) {
            if ($editName != NULL) {
                $user_update_name_query = "UPDATE users SET u_name = '$editName' WHERE u_id = '$u_id'";
                if (mysqli_query($db, $user_update_name_query) || die(mysqli_error($db)));
            }
            if ($editAge != NULL) {
                $user_update_age_query = "UPDATE users SET u_age = '$editAge' WHERE u_id = '$u_id'";
                if (mysqli_query($db, $user_update_age_query) || die(mysqli_error($db)));
            }
            if ($editPassword_1 != NULL) {
                $user_update_password_query = "UPDATE users SET u_password = '$editPassword_1' WHERE u_id = '$u_id'";
                if (mysqli_query($db, $user_update_password_query) || die(mysqli_error($db)));
            }
            $photoName;
            if ($_FILES['avatar-file']['error'] === UPLOAD_ERR_OK) {
                $photo = $_FILES['avatar-file']['tmp_name'];
                $photoName =  $_FILES['avatar-file']['name'];
                move_uploaded_file($photo, "./images/profile_photos/$photoName");
                $user_update_pic_query = "UPDATE users SET u_picture = '$photoName' WHERE u_id = '$u_id'";
                mysqli_query($db, $user_update_pic_query);
                header("location: profileUser.php");
            }
            if ($editName == NULL && $editAge == NULL && $editPassword_1 == NULL && $editPassword_2 == NULL && $photoName == NULL) {
                array_push($errors, "No profile information has changed.");
                $_SESSION["error"] = $errors;
                header("location: profileUser.php");
            }
            header("location: profileUser.php");
        } else {
            $_SESSION["error"] = $errors;
            header("location: profileUser.php");
        }
    } else if ($editType == "developer") {
        $u_id = $_SESSION["u_id"];
        $editName = mysqli_real_escape_string($db, $_POST['name']);
        $editAge = mysqli_real_escape_string($db, $_POST['age']);
        $editPassword_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $editPassword_2 = mysqli_real_escape_string($db, $_POST['password_2']);
        $edit_dev_info = mysqli_real_escape_string($db, $_POST['dev_info']);
        $edit_dev_website = mysqli_real_escape_string($db, $_POST['dev_website']);

        if (!mb_detect_encoding($editPassword_1, 'ASCII', true)) {
            array_push($errors, "Please enter valid characters for Password.");
        }

        if ($editPassword_1 != $editPassword_2) {
            array_push($errors, "The two passwords do not match");
        }

        if (count($errors) == 0) {
            if ($editName != NULL) {
                $user_update_name_query = "UPDATE users SET u_name = '$editName' WHERE u_id = '$u_id'";
                if (mysqli_query($db, $user_update_name_query) || die(mysqli_error($db)));
            }
            if ($editAge != NULL) {
                $user_update_age_query = "UPDATE users SET u_age = '$editAge' WHERE u_id = '$u_id'";
                if (mysqli_query($db, $user_update_age_query) || die(mysqli_error($db)));
            }
            if ($editPassword_1 != NULL) {
                $user_update_password_query = "UPDATE users SET u_password = '$editPassword_1' WHERE u_id = '$u_id'";
                if (mysqli_query($db, $user_update_password_query) || die(mysqli_error($db)));
            }
            if ($edit_dev_info != NULL) {
                $user_update_info_query = "UPDATE developer SET dev_info = '$edit_dev_info' WHERE u_id = '$u_id'";
                if (mysqli_query($db, $user_update_info_query) || die(mysqli_error($db)));
            }
            if ($edit_dev_website != NULL) {
                $user_update_website_query = "UPDATE developer SET dev_website = '$edit_dev_website' WHERE u_id = '$u_id'";
                if (mysqli_query($db, $user_update_website_query) || die(mysqli_error($db)));
            }
            if ($editName == NULL && $editAge == NULL && $editPassword_1 == NULL && $editPassword_2 == NULL && $edit_dev_info == NULL && $edit_dev_website == NULL) {
                array_push($errors, "No profile information has changed.");
                $_SESSION["error"] = $errors;
                header("location: profileDev.php");
            }
            $photoName;
            if ($_FILES['avatar-file']['error'] === UPLOAD_ERR_OK) {
                $photo = $_FILES['avatar-file']['tmp_name'];
                $photoName =  $_FILES['avatar-file']['name'];
                move_uploaded_file($photo, "./images/profile_photos/$photoName");
                $user_update_pic_query = "UPDATE users SET u_picture = '$photoName' WHERE u_id = '$u_id'";
                mysqli_query($db, $user_update_pic_query);
                header("location: profileUser.php");
            }
            header("location: profileDev.php");
        } else {
            $_SESSION["error"] = $errors;
            header("location: profileDev.php");
        }
    } else if ($editType == "editor") {
        $u_id = $_SESSION["u_id"];
        $editName = mysqli_real_escape_string($db, $_POST['name']);
        $editAge = mysqli_real_escape_string($db, $_POST['age']);
        $editPassword_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $editPassword_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        if (!mb_detect_encoding($editPassword_1, 'ASCII', true)) {
            array_push($errors, "Please enter valid characters for Password.");
        }

        if ($editPassword_1 != $editPassword_2) {
            array_push($errors, "The two passwords do not match");
        }

        if (count($errors) == 0) {
            if ($editName != NULL) {
                $user_update_name_query = "UPDATE users SET u_name = '$editName' WHERE u_id = '$u_id'";
                if (mysqli_query($db, $user_update_name_query) || die(mysqli_error($db)));
            }
            if ($editAge != NULL) {
                $user_update_age_query = "UPDATE users SET u_age = '$editAge' WHERE u_id = '$u_id'";
                if (mysqli_query($db, $user_update_age_query) || die(mysqli_error($db)));
            }
            if ($editPassword_1 != NULL) {
                $user_update_password_query = "UPDATE users SET u_password = '$editPassword_1' WHERE u_id = '$u_id'";
                if (mysqli_query($db, $user_update_password_query) || die(mysqli_error($db)));
            }
            $photoName;
            if ($_FILES['avatar-file']['error'] === UPLOAD_ERR_OK) {
                $photo = $_FILES['avatar-file']['tmp_name'];
                $photoName =  $_FILES['avatar-file']['name'];
                move_uploaded_file($photo, "./images/profile_photos/$photoName");
                $user_update_pic_query = "UPDATE users SET u_picture = '$photoName' WHERE u_id = '$u_id'";
                mysqli_query($db, $user_update_pic_query);
                header("location: profileUser.php");
            }
            header("location: profileEditor.php");
        } else {
            $_SESSION["error"] = $errors;
            header("location: profileEditor.php");
        }
    }
}
