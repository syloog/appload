<?php

require("config.php");
session_start();

$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $username = mysqli_real_escape_string($db, $_POST['username']);
   $password = mysqli_real_escape_string($db, $_POST['password']);
   $userType = mysqli_real_escape_string($db, $_POST['loginRadio']);
   $error = "Username, Password or Account Type Incorrect";
   $error3 = "Please, don't forget to choose an account type";
   if ($userType != NULL) {
      $sql = "SELECT u_id FROM users WHERE u_username = '$username' and u_password = '$password'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      if ($count == 1) {
         $_SESSION["u_username"] = $username;
         $_SESSION["loggedin"] = true;
         $_SESSION["u_type"] = $userType;
         $_SESSION["u_id"] = $row[0];
         header("location: index.php");
      } else {
         $_SESSION["error"] = $error;
         header("location: loginScreen.php"); //send user back to the login page.
      }
   }
   else {
      $_SESSION["error"] = $error3;
      header("location: loginScreen.php"); //send user back to the login page.
   }
}
