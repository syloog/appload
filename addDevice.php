<?php

require("config.php");
session_start();
$errors = array();
$success = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $cpuArea = mysqli_real_escape_string($db, $_POST['cpuField']);
   $ramArea = mysqli_real_escape_string($db, $_POST['ramField']);
   $storageArea = mysqli_real_escape_string($db, $_POST['storageField']);
   $osArea = mysqli_real_escape_string($db, $_POST['osField']);

   $device_id = rand(10000000, 20000000);

   $sql = "SELECT device_id FROM device WHERE device_id = '$device_id'";
   $result = mysqli_query($db, $sql);
   $count = mysqli_num_rows($result);

   if ($count == 0) {
      if ($cpuArea != NULL && $ramArea != NULL && $storageArea != NULL && $osArea != NULL) {

         $u_id = $_SESSION["u_id"];

         $select_device_query = "SELECT device_id FROM device WHERE d_os='" . $osArea . "' AND d_ram='" . $ramArea . "' AND d_cpu='" . $cpuArea . "' AND d_storage='" . $storageArea . "'";
         $result_query_device = mysqli_query($db, $select_device_query);
         $countDevice = mysqli_num_rows($result_query_device);
         $deviceRow = mysqli_fetch_array($result_query_device);

         if ($countDevice == 0) {

            $insert_device_query = "INSERT INTO device VALUES('" . $device_id . "', '" . $osArea . "', '" . $ramArea . "', '" . $cpuArea . "', '" . $storageArea . "')";

            if ((mysqli_query($db, $insert_device_query)) || die(mysqli_error($db))) {
            } else {
               array_push($errors, "Cannot create device.");
               $_SESSION["error"] = $errors;
               header("location: createDevice.php");
            }

            $insert_regular_user_device_query = "INSERT INTO regularuserdevice VALUES('" . $device_id . "', '" . $u_id . "')";
            if ((mysqli_query($db, $insert_regular_user_device_query))) {
               array_push($success, "Device created.");
               $_SESSION["success"] = $success;
               header("location: deviceList.php");
            } else {
               array_push($errors, "Cannot create device.");
               $_SESSION["error"] = $errors;
               header("location: createDevice.php");
            }
         } else {
            $device_id = $deviceRow["device_id"];

            $user_device_check_query = "SELECT device_id FROM regularuserdevice WHERE device_id = '" . $device_id . "' AND u_id = '" . $u_id . "'";
            $deviceCheckResult = mysqli_query($db, $user_device_check_query);
            $deviceCheck = mysqli_fetch_array($deviceCheckResult);

            if ($deviceCheck["device_id"] == $device_id) {
               array_push($errors, "Device already exists");
               $_SESSION["error"] = $errors;
               header("location: deviceList.php");
            } else {
               $insert_regular_user_device_query = "INSERT INTO regularuserdevice VALUES('" . $device_id . "', '" . $u_id . "')";
               if ((mysqli_query($db, $insert_regular_user_device_query))) {
                  array_push($success, "Device created.");
                  $_SESSION["success"] = $success;
                  header("location: deviceList.php");
               } else {
                  array_push($errors, "Cannot create device.");
                  $_SESSION["error"] = $errors;
                  header("location: createDevice.php");
               }
            }
         }
      } else {
         array_push($errors, "Please, fill all the boxes to create a device.");
         $_SESSION["error"] = $errors;
         header("location: createDevice.php");
      }
   } else {
      array_push($errors, "Device ID already is in the system.");
      $_SESSION["error"] = $errors;
      header("location: deviceList.php");
   }
}
