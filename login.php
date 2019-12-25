<?php

require("config.php");
session_start();

$username = $password = $userType = $u_id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if ($_POST["newLogin"]) {
      setcookie("member_login", "");
      header("location: loginScreen.php");
   } else if ($_POST["quickLogin"]) {

      $username = mysqli_real_escape_string($db, $_POST['username']);
      $error = "Username or Password Incorrect";

      if (isset($_COOKIE['member_login'])) {

         $sql = "SELECT u_id FROM users WHERE BINARY u_username = '$username'";
         $result = mysqli_query($db, $sql);
         $rowUserId = mysqli_fetch_array($result, MYSQLI_ASSOC);

         $countId = mysqli_num_rows($result);
      } else {
         $password = mysqli_real_escape_string($db, $_POST['password']);
         $error = "Username or Password Incorrect";

         $sql = "SELECT u_id FROM users WHERE BINARY u_username = '$username' and u_password = '$password'";
         $result = mysqli_query($db, $sql);
         $rowUserId = mysqli_fetch_array($result, MYSQLI_ASSOC);

         $countId = mysqli_num_rows($result);
      }

      if ($countId == 1) {

         $u_id = $rowUserId["u_id"];

         $check_queries = array();
         $check_queries[0] = "SELECT u_id FROM regularuser WHERE u_id = '$u_id'";
         $check_queries[1] = "SELECT u_id FROM developer WHERE u_id = '$u_id'";
         $check_queries[2] = "SELECT u_id FROM editor WHERE u_id = '$u_id'";
         $i = 0;

         foreach ($check_queries as $query) {
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $count = mysqli_num_rows($result);

            if ($count == 1 && $i == 0) {
               $userType = "regular";
            } else if ($count == 1 && $i == 1) {
               $userType = "developer";
            } else if ($count == 1 && $i == 2) {
               $userType = "editor";
            }
            $i++;
         }

         $_SESSION["u_username"] = $username;
         $_SESSION["loggedin"] = true;
         $_SESSION["u_type"] = $userType;
         $_SESSION["u_id"] = $rowUserId["u_id"];

         if (!empty($_POST["remember"])) {
            setcookie("member_login", $_POST["username"], time() + (10 * 365 * 24 * 60 * 60));
         } else {
            if (isset($_COOKIE["member_login"])) {
               setcookie("member_login", "");
            }
         }

         header("location: index.php");
      } else {
         $_SESSION["error"] = $error;
         header("location: loginScreen.php"); //send user back to the login page.
      }
   }
}
