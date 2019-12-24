<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['u_username'];
   
   $ses_sql = mysqli_query($db,"SELECT u_id, u_username FROM users WHERE u_username = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['u_username'];
   $login_session_id = $row['u_id'];

   if(!isset($_SESSION['u_username'])){
      header("location:errorDirect.php");
      die();
   }
?>