<?php

require("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $cpuArea = mysqli_real_escape_string($db, $_POST['cpuField']);
   $ramArea = mysqli_real_escape_string($db, $_POST['ramField']);
   $storageArea = mysqli_real_escape_string($db, $_POST['storageField']);
   $osArea = mysqli_real_escape_string($db, $_POST['osField']);

   $u_id = $_SESSION["u_id"];
   $device_id = rand(10000000, 20000000);

   $sql = "SELECT u_id FROM users WHERE dev_id = '$device_id'";
   $result = mysqli_query($db, $sql);
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

   $count = mysqli_num_rows($result);

   if ($count == 0) {
      if ($cpuArea != NULL && $ramArea != NULL && $storageArea != NULL && $osArea != NULL && $u_id != NULL) {
         $insert_device_query = "INSERT INTO device VALUES('" . $device_id . "', '" . $osArea . "', '" . $ramArea . "', '" . $cpuArea . "', '" . $storageArea . "')";
         $insert_regular_user_device_query = "INSERT INTO regularuserdevice VALUES('" . $device_id . "', '" . $u_id . "')";

         if ((mysqli_query($db, $insert_device_query) || die(mysqli_error($db))) && (mysqli_query($db, $insert_regular_user_device_query) || die(mysqli_error($db)))) {
            header("location: deviceList.php");
         } else {
            array_push($errors, "Cannot create device.");
            $_SESSION["error"] = $errors;
            header("location: createDevice.php");
         }
      } else {
         array_push($errors, "Please, fill all the boxes to create a device.");
         $_SESSION["error"] = $errors;
         header("location: createDevice.php");
      }
   }
   else {
      array_push($errors, "Can't perform the action right now. Please try again later.");
         $_SESSION["error"] = $errors;
         header("location: deviceList.php");
   }
}
