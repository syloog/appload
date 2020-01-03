<?php
include('session.php');


    $errors = array();
    if($db === false){
        echo "error?";
       die("ERROR: Could not connect. " . mysqli_connect_error());
    } 
    if(isset($_GET['device_id'])){
        // sql to delete a record
        $delete_user_query =  "DELETE FROM regularuserdevice WHERE device_id = '$_GET[device_id]' ";

        if (mysqli_query($db, $delete_user_query)) {
            echo "Record deleted successfully";
            header("location: deviceList.php");
        } else {
            echo "Error deleting record: " . $db->error;
            $_SESSION["error"] = $errors;
            header("location: deviceList.php");
        }
    }
    
?> 