<?php

require("config.php");
session_start();

$editPassword_1 = $editPassword_2 = $editEmail = $editAge = $editName = "";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $editType = mysqli_real_escape_string($db, $_POST['editType']);

   if ($editType == "regular") {

      $done = 0;

      $editName = mysqli_real_escape_string($db, $_POST['name']);
      $editAge = mysqli_real_escape_string($db, $_POST['age']);
      $editEmail = mysqli_real_escape_string($db, $_POST['email']);
      $editPassword_1 = mysqli_real_escape_string($db, $_POST['password_1']);
      $editPassword_2 = mysqli_real_escape_string($db, $_POST['password_2']);

      if (!mb_detect_encoding($editUsername, 'ASCII', true)) {
         array_push($errors, "Please enter valid characters for Username.");
      }

      if (!mb_detect_encoding($password_1, 'ASCII', true)) {
         array_push($errors, "Please enter valid characters for Password.");
      }

      if (!mb_detect_encoding($email, 'ASCII', true)) {
         array_push($errors, "Please enter valid characters for Email.");
      }

      if ($password_1 != $password_2) {
         array_push($errors, "The two passwords do not match");
      }

      $user_check_query = "SELECT u_username,u_mail FROM users WHERE u_username = '$username' OR u_mail = '$email'";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);

      if ($user) {
         if ($user['u_username'] === $username) {
            array_push($errors, "Username already exists");
         }

         if ($user['u_mail'] === $email) {
            array_push($errors, "Email already exists");
         }
      }

      if (count($errors) == 0) {
         while ($done == 0) {
            $id = rand(21900000, 21999999);
            $sql = "SELECT u_id FROM users WHERE u_id = '$id'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $count = mysqli_num_rows($result);

            if ($count == 0) {
               $done = 1;

               $insert_user_query = "INSERT INTO users VALUES('" . $id . "', '" . $username . "', '" . $password_1 . "', '" . $name . "', '" . $email . "', NULL , '" . $age . "', current_timestamp())";
               $insert_regular_user_query = "INSERT INTO regularuser VALUES('" . $id . "', '" . $area . "')";

               if ((mysqli_query($db, $insert_user_query) || die(mysqli_error($db))) && (mysqli_query($db, $insert_regular_user_query) || die(mysqli_error($db)))) {
                  header("location: loginScreen.php");
               } else {
                  array_push($errors, "Cannot create account.");
                  $_SESSION["error"] = $errors;
                  header("location: registerUser.php");
               }
            }
         }
      } else {
         $_SESSION["error"] = $errors;
         header("location: registerUser.php"); //send user back to the login page.
      }
   } else if ($editType == "developer") {
      $done = 0;

      $username = mysqli_real_escape_string($db, $_POST['username']);
      $name = mysqli_real_escape_string($db, $_POST['name']);
      $age = mysqli_real_escape_string($db, $_POST['age']);
      $website = mysqli_real_escape_string($db, $_POST['dev_website']);
      $information = mysqli_real_escape_string($db, $_POST['dev_info']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
      $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

      if (!mb_detect_encoding($username, 'ASCII', true)) {
         array_push($errors, "Please enter valid characters for Username.");
      }

      if (!mb_detect_encoding($password_1, 'ASCII', true)) {
         array_push($errors, "Please enter valid characters for Password.");
      }

      if (!mb_detect_encoding($email, 'ASCII', true)) {
         array_push($errors, "Please enter valid characters for Email.");
      }

      if ($password_1 != $password_2) {
         array_push($errors, "The two passwords do not match");
      }

      $user_check_query = "SELECT u_username,u_mail FROM users WHERE u_username = '$username' OR u_mail = '$email'";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);

      if ($user) {
         if ($user['u_username'] === $username) {
            array_push($errors, "Username already exists");
         }

         if ($user['u_mail'] === $email) {
            array_push($errors, "Email already exists");
         }
      }

      if (count($errors) == 0) {
         while ($done == 0) {
            $id = rand(21900000, 21999999);
            $sql = "SELECT u_id FROM users WHERE u_id = '$id'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $count = mysqli_num_rows($result);

            if ($count == 0) {
               $done = 1;

               $insert_user_query = "INSERT INTO users VALUES('" . $id . "', '" . $username . "', '" . $password_1 . "', '" . $name . "', '" . $email . "', NULL , '" . $age . "', current_timestamp())";
               $insert_regular_user_query = "INSERT INTO developer VALUES('" . $id . "', '" . $information . "', '" . $website . "')";

               if ((mysqli_query($db, $insert_user_query) || die(mysqli_error($db))) && (mysqli_query($db, $insert_regular_user_query) || die(mysqli_error($db)))) {
                  header("location: loginScreen.php");
               } else {
                  array_push($errors, "Cannot create account.");
                  $_SESSION["error"] = $errors;
                  header("location: registerDev.php");
               }
            }
         }
      } else {
         $_SESSION["error"] = $errors;
         header("location: registerDev.php"); //send user back to the login page.
      }
   } else if ($editType == "editor") {

      $done = 0;

      $username = mysqli_real_escape_string($db, $_POST['username']);
      $name = mysqli_real_escape_string($db, $_POST['name']);
      $age = mysqli_real_escape_string($db, $_POST['age']);
      $area = mysqli_real_escape_string($db, $_POST['area']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
      $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

      if (!mb_detect_encoding($username, 'ASCII', true)) {
         array_push($errors, "Please enter valid characters for Username.");
      }

      if (!mb_detect_encoding($password_1, 'ASCII', true)) {
         array_push($errors, "Please enter valid characters for Password.");
      }

      if (!mb_detect_encoding($email, 'ASCII', true)) {
         array_push($errors, "Please enter valid characters for Email.");
      }

      if ($password_1 != $password_2) {
         array_push($errors, "The two passwords do not match");
      }

      $user_check_query = "SELECT u_username,u_mail FROM users WHERE u_username = '$username' OR u_mail = '$email'";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);

      if ($user) {
         if ($user['u_username'] === $username) {
            array_push($errors, "Username already exists");
         }

         if ($user['u_mail'] === $email) {
            array_push($errors, "Email already exists");
         }
      }

      if (count($errors) == 0) {
         while ($done == 0) {
            $id = rand(21900000, 21999999);
            $sql = "SELECT u_id FROM users WHERE u_id = '$id'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $count = mysqli_num_rows($result);

            if ($count == 0) {
               $done = 1;

               $insert_user_query = "INSERT INTO users VALUES('" . $id . "', '" . $username . "', '" . $password_1 . "', '" . $name . "', '" . $email . "', NULL , '" . $age . "', current_timestamp())";
               $insert_regular_user_query = "INSERT INTO editor VALUES('" . $id . "')";

               if ((mysqli_query($db, $insert_user_query) || die(mysqli_error($db))) && (mysqli_query($db, $insert_regular_user_query) || die(mysqli_error($db)))) {
                  header("location: loginScreen.php");
               } else {
                  array_push($errors, "Cannot create account.");
                  $_SESSION["error"] = $errors;
                  header("location: registerEditor.php");
               }
            }
         }
      } else {
         $_SESSION["error"] = $errors;
         header("location: registerEditor.php"); //send user back to the login page.
      }
   } else {
      $_SESSION["error"] = "Cannot post the information to the server. Please try again.";
      header("location: register.php"); //send user back to the login page.
   }
}
