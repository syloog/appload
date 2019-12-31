<?php

require("config.php");
session_start();
$errors = array();
$success = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['continue'])) {

        $photoName = "default_pic.png";
        $fileName;

        if ($_FILES['photo_file']['error'] == UPLOAD_ERR_OK) {

            #  $addrees = file_get_contents($_FILES["files"]["tmp_name"]);
            #  echo '<script type="text/javascript"> alert(" '.$addrees.' "); </script>'; 
            #  $photo = addslashes(file_get_contents($_FILES["files"]["tmp_name"]));
            #  $image = addslashes($_FILES["files"]['name']);
            #echo '<img src="data:image/jpg; base64,'.base64_encode( $image ).'"/>';
            #header("Content-type: image/jpg"); 

            $photo = $_FILES['photo_file']['tmp_name'];
            $photoName = $_FILES['photo_file']['name'];

            move_uploaded_file($photo, "./images/application_photos/$photoName");
        } else {
            echo '<script type="text/javascript">alert("an error occured while uploading image please try again"); </script>';
        }

        $appName = $_POST['appname'];
        $version = $_POST['version'];
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

                if ($fileSize > 4294967295) {
                    echo '<script type="text/javascript">alert("Your upload file should be smaller than 4 gb"); </script>';
                } else {
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
                    header("location: uploadAnApp.php");
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

                $queryToMinReq = "INSERT INTO minimum_requirement VALUES ('$reqID', '$os', '$ram' , '$cpu' ,'$storage')";
                if ((mysqli_query($db, $queryToMinReq))) {
                } else {
                    array_push($errors, "Cannot create requirement.");
                    $_SESSION["error"] = $errors;
                    header("location: uploadAnApp.php");
                }

                $queryToApp = "INSERT INTO application values('$app_id', '" . $apploadName . "', '" . $description . "', '$version', '$minage','" . $photoName . "',current_timestamp(), '$cat_id' , 'WAITING' , '" . $fileName . "');";

                if ((mysqli_query($db, $queryToApp))) {
                } else {
                    array_push($errors, "Cannot create application.");
                    $_SESSION["error"] = $errors;
                    header("location: uploadAnApp.php");
                }

                foreach ($_POST['areaField'] as $selected) {
                    $queryToCheckArea = "Select area_id from area where area_name= '$selected';";
                    $checkArea = mysqli_query($db, $queryToCheckArea);
                    $resultArea = mysqli_fetch_assoc($checkArea);
                    $areaId = $resultArea["area_id"];
                    $queryToRestricts = "INSERT INTO restricts VALUES ($areaId, $app_id)";
                    mysqli_query($db, $queryToRestricts);
                }

                $queryToDevelops = "INSERT INTO develops (dev_id, app_id) VALUES ($u_id, $app_id);";

                if ((mysqli_query($db, $queryToDevelops))) {
                } else {
                    array_push($errors, "Cannot create develops.");
                    $_SESSION["error"] = $errors;
                    header("location: uploadAnApp.php");
                }

                $queryToReq_restricts = "INSERT INTO req_restricts values( $app_id, $reqID)";
                 if ((mysqli_query($db, $queryToReq_restricts))) {
                    array_push($success, "Application created.");
                    $_SESSION["success"] = $success;
                    header("location: devApps.php");
                } else {
                    array_push($errors, "Cannot create Req_restricts.");
                    $_SESSION["error"] = $errors;
                    header("location: uploadAnApp.php");
                }

            } else {
                echo '<script type="text/javascript">alert("Please try again to upload the file again"); </script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Please try again to upload the file again"); </script>';
        }
    }
}
