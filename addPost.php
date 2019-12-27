<?php

require("config.php");
session_start();
$errors = array();
$success = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if ($_POST['sharepost'] == 1) {
      $titleArea = mysqli_real_escape_string($db, $_POST['title']);
      $decriptionArea = mysqli_real_escape_string($db, $_POST['description']);

      $post_id = rand(10000000, 20000000);

      $post_check_query = "SELECT post_id FROM post WHERE post_id = '$post_id'";
      $result = mysqli_query($db, $post_check_query);
      $post_id_exist = mysqli_num_rows($result);

      if ($post_id_exist == 0) {
         if ($titleArea != NULL && $decriptionArea != NULL) {

            $post_title_check_query = "SELECT post_id FROM post WHERE title = '$titleArea'";
            $result = mysqli_query($db, $post_title_check_query);
            $post_title_exist = mysqli_num_rows($result);

            if ($post_title_exist == 0) {

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
               } else {
                  array_push($errors, "Something went wrong. Please try again.");
                  $_SESSION["error"] = $errors;
                  header("location: forum.php?sort=lastest&pageno=1");
               }
            } else {
               array_push($errors, "Title already exists. Try to enter a different title for your thread.");
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
   } else if ($_POST['answerpost'] == 1) {
      $decriptionArea = mysqli_real_escape_string($db, $_POST['description']);

      $answer_id = rand(10000000, 20000000);

      $post_check_query = "SELECT post_id FROM answersposts WHERE answer_id = '$answer_id'";
      $result = mysqli_query($db, $post_check_query);
      $post_id_exist = mysqli_num_rows($result);

      if ($post_id_exist == 0) {
         $main_post_id = $_POST["post_id"];
         $u_id = $_SESSION["u_id"];

         $insert_answer_post_query = "INSERT INTO answersposts VALUES('" . $main_post_id . "', '" . $u_id . "', '" . $decriptionArea . "', current_timestamp(), '" . $answer_id . "')";
         if ((mysqli_query($db, $insert_answer_post_query))) {
            array_push($success, "Answer is created.");
            $_SESSION["success"] = $success;
            header("location: forum.php?sort=lastest&pageno=1");
         } else {
            array_push($errors, "Cannot create the post.");
            $_SESSION["error"] = $errors;
            header("location: forum.php?sort=lastest&pageno=1");
         }
      } else {
         array_push($errors, "Post ID already is in the system.");
         $_SESSION["error"] = $errors;
         header("location: forum.php?sort=lastest&pageno=1");
      }
   }
}
