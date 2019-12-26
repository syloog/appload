<?php

require("config.php");
session_start();
$errors = array();
$success = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $titleArea = mysqli_real_escape_string($db, $_POST['title']);
   $decriptionArea = mysqli_real_escape_string($db, $_POST['description']);

   $post_id = rand(10000000, 20000000);

   $post_check_query = "SELECT post_id FROM post WHERE post_id = '$post_id'";
   $result = mysqli_query($db, $post_check_query);
   $count = mysqli_num_rows($result);

   if ($count == 0) {
      if ($titleArea != NULL && $decriptionArea != NULL) {
         $u_id = $_SESSION["u_id"];

         $insert_post_query = "INSERT INTO post VALUES('" . $post_id . "', '" . $decriptionArea . "', '" . $titleArea . "', current_timestamp())";

         if ((mysqli_query($db, $insert_post_query))) {
            $insert_share_post_query = "INSERT INTO sharesposts VALUES('" . $post_id . "', '" . $u_id . "', 0)";
            if ((mysqli_query($db, $insert_share_post_query))) {
               array_push($success, "Post is created.");
               $_SESSION["success"] = $success;
               header("location: forum.php?sort=lastest&pageno=1");
            } else {
               array_push($errors, "Cannot create the post.");
               $_SESSION["error"] = $errors;
               header("location: forum.php?sort=lastest&pageno=1");
            }
         } else if (mysqli_errno($db) == 1062) {
            array_push($errors, "Title already exists. Please enter a different title.");
            $_SESSION["error"] = $errors;
            header("location: forum.php?sort=lastest&pageno=1");
         }
      } else {
         array_push($errors, "Please, fill all the boxes to create a post.");
         $_SESSION["error"] = $errors;
         header("location: forum.php?sort=lastest&pageno=1");
      }
   } else {
      array_push($errors, "Post ID already is in the system.");
      $_SESSION["error"] = $errors;
      header("location: forum.php?sort=lastest&pageno=1");
   }
}
