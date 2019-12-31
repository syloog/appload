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
            $photo = $_FILES['photo_file']['tmp_name'];
            $photoName =  $_FILES['photo_file']['name'];
        #    if (empty($photo)) {
           #     $photoName = "default_pic.png";
          #  }
            move_uploaded_file($photo, "./images/application_photos/$photoName");
        } 
        
        $version = $_POST['version'];
        $minage = $_POST['minAge'];
        $ram = $_POST['ramField'];
        $description = $_POST['description'];
      
        $storage = $_POST["storageField"];
        $cpu =  $_POST["cpuField"];
      
        $category = $_POST["categoryField"];
        $category = $category +0;
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
    
            #check if fields are changed or not
            
            $app_id = $_POST["continue"];
            $app_id = $app_id +0;
            
            $queryToCheck = "Select * from application where app_id= $app_id";
            $tempAppVersion;
            $tempMinAge;
            $tempFile;
            $tempPhoto;
            $tempDescription;
            $tempCatId;
            if (($res = mysqli_query($db, $queryToCheck))) {
                while($row = mysqli_fetch_array($res))
                {
                        $tempAppVersion = $row["app_version"];
                        $tempMinAge = $row["minimumAge"];
                        $tempFile= $row["file"];
                        $tempPhoto = $row["appLogo"];
                        $tempDescription = $row["description"];
                        $tempCatId = $row["cat_id"];
                }

            } else {
                array_push($errors, "Cannot create requirement.");
                $_SESSION["error"] = $errors;
            #        header("location: uploadAnApp.php");
               # header("location: profileDev.php");
              }
            echo $tempPhoto;
            if(empty($version))
            {
                $version = $tempAppVersion;
            }
            if(empty($fileName))
            {
               $fileName = $tempFile;
            }

            if(empty($minage))
            {
               $minage = $tempMinAge;
            }
    
            if(empty($photoName))
            {
                echo "\n?*\n";
               $photoName =  $tempPhoto;
               # echo "----- ".$photo;
            }
            if(empty($description))
            {
               $description =  $tempDescription;
            }
            if(empty($category))
            {
                $category = $tempCatId;
            }
            
            #if categories did not changed than do not alter anything

            #else update categories
 
            $req_id;
            $tempRam;
            $tempStorage;
            $tempCPU;
            $queryForReq = "Select * from minimum_requirement where req_id = (select req_id from req_restricts where app_id = $app_id )";
            #update minimumrequirements 
            if (($res = mysqli_query($db, $queryForReq))) {
                while($row = mysqli_fetch_array($res))
                {
                        $req_id = $row["req_id"];
                        $tempRam = $row["ram"];
                        $tempStorage = $row["storage"];
                        $tempCPU= $row["cpu"];
                        
                }

            } else {
             #   array_push($errors, "Cannot create requirement.");
            #    $_SESSION["error"] = $errors;
            #        header("location: uploadAnApp.php");
              #  header("location: profileDev.php");
              }
            if(empty($ram))
            {
               $ram = $tempRam;
            }
            if(empty($storage))
            {
                $storage = $tempStorage;
            }
            
            if(empty($cpu))
            {
                $cpu = $tempCPU;
            }
     
            

                #update minimum requirements
                $queryToMinReq = "update minimum_requirement
                                set ram = '$ram', cpu = '$cpu', storage= '$storage'
                                where req_id = $req_id";
                               
                if ((mysqli_query($db, $queryToMinReq))) {
                } else {
                 #   array_push($errors, "Cannot update requirement.");
                #    $_SESSION["error"] = $errors;
            #        header("location: uploadAnApp.php");
               #    header("location: profileDev.php");
                }
            
            
                echo $photoName;
                #update application
                $queryToApp = "update application
                               set description= '$description', minimumAge = $minage, appLogo= '$photoName', file= '$fileName', app_status= 'WAITING', cat_id= $category, app_version = $version
                               where app_id = $app_id";                
                if ((mysqli_query($db, $queryToApp))) {
                } else {
                  #  array_push($errors, "Cannot create application.");
                   # $_SESSION["error"] = $errors;
              #      header("location: uploadAnApp.php");
                    #header("location: profileDev.php");
                }
            
                $queryToErase = "delete from restricts where app_id= $app_id";
                mysqli_query($db,$queryToErase);
            
                foreach ($_POST['areaField'] as $selected) {
                    $queryToCheckArea = "Select area_id from area where area_name= '$selected';";
                    $checkArea = mysqli_query($db, $queryToCheckArea);
                    $resultArea = mysqli_fetch_assoc($checkArea);
                    $areaId = $resultArea["area_id"];
                    $queryToRestricts = "INSERT INTO restricts VALUES ($areaId, $app_id)";
                    mysqli_query($db, $queryToRestricts);
                }
          
                #editor icin eklenti gelecek
            $queryForRandEditor = "SELECT u_id
                                   FROM editor
                                   ORDER BY RAND()  
                                   LIMIT 1";
            if($res = mysqli_query($db, $queryForRandEditor))
            {
                while( $row = mysqli_fetch_array($res))
                {
                    $e_id = $row["u_id"];
                }
            }
            
            $queryForControls ="insert into controls( app_id, e_id) values ($app_id,$e_id)";
             if ((mysqli_query($db, $queryForControls))) {
                } else {
                    #array_push($errors, "Cannot add controls.");
                    #$_SESSION["error"] = $errors;
                    #header("location: profileDev.php");
                }    
            header("location: profileDev.php");
                

            } else {
                echo '<script type="text/javascript">alert("Please try again to upload the file again"); </script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Please try again to upload the file again"); </script>';
        }
    }

?>