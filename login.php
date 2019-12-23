<?php

require("config.php");
session_start();

$username = $password = $userType = $u_id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $username = mysqli_real_escape_string($db, $_POST['username']);
   $password = mysqli_real_escape_string($db, $_POST['password']);
   $error = "Username, Password or Account Type Incorrect";
   $error3 = "Please, don't forget to choose an account type";

   $sql = "SELECT u_id FROM users WHERE u_username = '$username' and u_password = '$password'";
   $result = mysqli_query($db, $sql);
   $rowUserId = mysqli_fetch_array($result, MYSQLI_ASSOC);

   $countId = mysqli_num_rows($result);

   if ($countId == 1) {

      $u_id = $rowUserId["u_id"];

      $check_queries = array();
      $check_queries[0] = "SELECT u_id FROM regularuser WHERE u_id = '$u_id'";
      $check_queries[1] = "SELECT u_id FROM developer WHERE u_id = '$u_id'";
      $check_queries[2] = "SELECT u_id FROM editor WHERE u_id = '$u_id'";
      $i = 0;

      foreach($check_queries as $query) {
         $result = mysqli_query($db, $query);
         $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

         $count = mysqli_num_rows($result);

         if ($count == 1 && $i == 0) {
            $userType = "regular";
         }
         else if ($count == 1 && $i == 1) {
            $userType = "developer";
         }
         else if ($count == 1 && $i == 2) {
            $userType = "editor";
         }
         $i++;
      }

      $_SESSION["u_username"] = $username;
      $_SESSION["loggedin"] = true;
      $_SESSION["u_type"] = $userType;
      $_SESSION["u_id"] = $rowUserId["u_id"];

      header("location: index.php");
   } else {
      $_SESSION["error"] = $error;
      header("location: loginScreen.php"); //send user back to the login page.
   }
}
