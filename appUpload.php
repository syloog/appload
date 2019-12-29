<?php

require("config.php");
session_start();
$errors = array();
$success = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $photo;

    if (isset($_POST['continue'])) {

        $photo;

        if ($_FILES['photo_file']['error'] === UPLOAD_ERR_OK) {

            #  $addrees = file_get_contents($_FILES["files"]["tmp_name"]);
            #  echo '<script type="text/javascript"> alert(" '.$addrees.' "); </script>'; 
            #  $photo = addslashes(file_get_contents($_FILES["files"]["tmp_name"]));
            #  $image = addslashes($_FILES["files"]['name']);
            #echo '<img src="data:image/jpg; base64,'.base64_encode( $image ).'"/>';
            #header("Content-type: image/jpg"); 
            $photo  = $_FILES['photo_file']['tmp_name'];
            $name =   $_FILES['photo_file']['name'];
            move_uploaded_file($photo, "./images/application_photos/$name");
            $_SESSION['appPhoto'] = $name;
        } else {
            echo '<script type="text/javascript">alert("an error occured while uploading image please try again"); </script>';
        }

        $currentDir = getcwd();
        $uploadDirectory = "/uploads/";
        $fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions

        #  $uploadPath = $currentDir . $uploadDirectory . basename($fileName)
        $appName = $_POST['appname'];
        $version = $_POST['version'];
        $category = $_POST['category'];
        $date = $_POST['date'];
        $minAge = $_POST['minAge'];

        if (isset($_FILES['app_file'])) {
            if ($_FILES['app_file']['error'] === UPLOAD_ERR_OK) {
                $fileName = $_FILES['app_file']['name'];
                $fileSize = $_FILES['app_file']['size'];
                $fileTmpName  = $_FILES['app_file']['tmp_name'];
                $fileType = $_FILES['app_file']['type'];
                #$fileExtension = strtolower(end(explode('.',$fileName)));
                echo '<script type="text/javascript"> alert("4 gb"); </script>';
                echo "file name " . $fileName . "\n";
                echo "file size " . $fileSize . "\n";
                echo "file tmp name " . $fileTmpName . "\n";
                echo "type " . $fileType . "\n";
                #echo "ext ". $fileExtension. "\n";


                if ($_FILES['app_file']['size'] > 4294967295) {
                    echo '<script type="text/javascript">alert("Your upload file should be smaller than 4 gb"); </script>';
                } else {
                    $fileName = basename($_FILES["app_file"]["name"]);
                    $appName = $_POST['appname'];
                    $version = $_POST['version'];
                    $category = $_POST['category'];
                    $date = $_POST['date'];
                    $minAge = $_POST['minAge'];
                    #start_session();
                    $_SESSION['appName'] = $appName;
                    $_SESSION['version'] = $version;
                    $_SESSION['category'] = $category;
                    $_SESSION['file'] = $fileName;
                    $_SESSION['date'] = $date;
                    $_SESSION['minage'] = $minAge;
                    if (empty($photo)) {
                        $_SESSION['appPhoto'] = "default_pic.png";
                    }
                    move_uploaded_file($fileTmpName, "./uploads/$fileName");
                    #unset($_SESSION[""]);
                    #$image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
                    #$image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
                    header("Location: ./appUpload2.php");
                }
            } else {
                echo '<script type="text/javascript">alert("Please try again to upload the file again"); </script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Please try again to upload the file again"); </script>';
        }
    }
}
