<?php

require("config.php");
session_start();
$errors = array();
$success = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $photoName;
    $fileName;

    if (isset($_POST['continue'])) {

        if ($_FILES['photo_file']['error'] === UPLOAD_ERR_OK) {

            #  $addrees = file_get_contents($_FILES["files"]["tmp_name"]);
            #  echo '<script type="text/javascript"> alert(" '.$addrees.' "); </script>'; 
            #  $photo = addslashes(file_get_contents($_FILES["files"]["tmp_name"]));
            #  $image = addslashes($_FILES["files"]['name']);
            #echo '<img src="data:image/jpg; base64,'.base64_encode( $image ).'"/>';
            #header("Content-type: image/jpg"); 

            $photo = $_FILES['photo_file']['tmp_name'];
            $photoName =  $_FILES['photo_file']['name'];

            if (empty($photo)) {
                $photoName = "default_pic.png";
            }

            move_uploaded_file($photo, "./images/application_photos/$photoName");
        } else {
            echo '<script type="text/javascript">alert("an error occured while uploading image please try again"); </script>';
        }

        $appName = $_POST['appname'];
        $version = $_POST['version'];
        $category = $_POST['category'];
        $date = $_POST['date'];
        $minage = $_POST['minAge'];
        $ram = $_POST["ramField"];
        $storage = $_POST["storageField"];
        $cpu =  $_POST["cpuField"];
        $os = $_POST["osField"];
        $category = $_POST["categoryField"];
        $description = $_POST["description"];

        if (isset($_FILES['app_file'])) {
            if ($_FILES['app_file']['error'] === UPLOAD_ERR_OK) {
                $fileName = $_FILES['app_file']['name'];
                $fileSize = $_FILES['app_file']['size'];
                $fileTmpName  = $_FILES['app_file']['tmp_name'];

                if ($_FILES['app_file']['size'] > 4294967295) {
                    echo '<script type="text/javascript">alert("Your upload file should be smaller than 4 gb"); </script>';
                } else {
                    $fileName = basename($_FILES["app_file"]["name"]);
                    move_uploaded_file($fileTmpName, "./uploads/$fileName");
                }
            }

            $apploadName = $appName . " (" . $os . ")";
            #check if given app is already exists or not
            $queryToCheck = "Select * from application where appname= '$apploadName';";
            $check =  mysqli_query($db, $queryToCheck);
            $count = mysqli_num_rows($check);
            if ($count === 0) {

                #add the file to db
                $queryCategory = "Select cat_id from category where cat_name= '$category';";

                $cat_id;
                $resultCat;

                if (($resultCat = mysqli_query($db, $queryCategory))) {
                    while ($resultQ = mysqli_fetch_array($resultCat,  MYSQLI_BOTH)) {
                        $cat_id = $resultQ['cat_id'];
                    }
                } else {
                    array_push($errors, "Cannot create application ID.");
                    $_SESSION["error"] = $errors;
                    header("location: appUpload1.php");
                }

                $queryForID = "Select * From application";

                $result1 = mysqli_query($db, $queryForID);
                $countApp = mysqli_num_rows($result1);
                $app_id = $countApp + 1;


                $queryForReqID = "Select * From minimum_requirement";

                $result2 = mysqli_query($db, $queryForReqID);
                $countReq = mysqli_num_rows($result2);
                $reqID = $countReq + 1;

                $cat_id = $cat_id + 0;
                $minage = $minage + 0;
                $version = $version + 0.0;

                $u_id = $_SESSION["u_id"];
                $u_id = $u_id + 0;

                $queryToMinReq = "INSERT INTO minimum_requirement (req_id, os_version, ram, cpu, storage) VALUES ( '$reqID', '$os', '$ram' , '$cpu' ,'$storage')";
                if ((mysqli_query($db, $queryToMinReq))) {
                } else {
                    array_push($errors, "Cannot create requirement.");
                    $_SESSION["error"] = $errors;
                    header("location: appUpload1.php");
                }

                $queryToApp = "INSERT INTO application values( '$app_id', '$appName', '$description' , '$version', '$minage', '$photoName',  'current_timestamp()', '$cat_id' , 'WAITING' , '$fileName' );";

                if ((mysqli_query($db, $queryToApp))) {
                } else {
                    array_push($errors, "Cannot create application.");
                    $_SESSION["error"] = $errors;
                    header("location: appUpload1.php");
                }

                $queryToDevelops = "INSERT INTO develops (dev_id, app_id) VALUES ($u_id, $app_id);";

                if ((mysqli_query($db, $queryToDevelops))) {
                    array_push($success, "Application created.");
                    $_SESSION["success"] = $success;
                    header("location: devApps.php");
                } else {
                    array_push($errors, "Cannot create develops.");
                    $_SESSION["error"] = $errors;
                    header("location: appUpload1.php");
                }
            } else {
                echo '<script type="text/javascript">alert("Please try again to upload the file again"); </script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Please try again to upload the file again"); </script>';
        }
    }
}
