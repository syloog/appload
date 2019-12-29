<?php
include('session.php');
    $errors = array();
    if($db === false){
        echo "error?";
       die("ERROR: Could not connect. " . mysqli_connect_error());
    } 
 
    if(isset($_SESSION['u_id'])){

        $delete_user_query = "DELETE FROM users WHERE u_id = '$_SESSION[u_id]'";
        if (mysqli_query($db, $delete_user_query)) {
            session_destroy();
            header("location: index.php");
        } else {
            header("location: profileUser.php");
        }
    }
?> 