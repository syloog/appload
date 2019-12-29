
    <?php
    include ('session.php');
    #check if name of the application is in db or not
    #file 4gb <
    $photo;
    if(isset($_POST['photoUpload']))
    {
        if ($_FILES['files']['error'] === UPLOAD_ERR_OK) {
            
          #  $addrees = file_get_contents($_FILES["files"]["tmp_name"]);
          #  echo '<script type="text/javascript"> alert(" '.$addrees.' "); </script>'; 
          #  $photo = addslashes(file_get_contents($_FILES["files"]["tmp_name"]));
          #  $image = addslashes($_FILES["files"]['name']);
            #echo '<img src="data:image/jpg; base64,'.base64_encode( $image ).'"/>';
            #header("Content-type: image/jpg"); 
            $photo  = $_FILES['files']['tmp_name'];            
            $name =   $_FILES['files']['name'];
            move_uploaded_file($photo, "./images/application_photos/$name" );
            $_SESSION['appPhoto'] = $name;
        }
        else
        {   
            echo '<script type="text/javascript">alert("an error occured while uploading image please try agian"); </script>';
        }
    }
    #photo hatalı 
    if(isset($_POST['a']))
    {
       
       #$username = $_POST['username'];
        #$password = $_POST['password'];
        #echo $username;
        #echo $password;
        #$query = "Select * from student where sname = " . "'".$username . "'"." AND sid=" . "'".$password. "'".";";
        #$result = mysqli_query($connection, $query);
        #$count= mysqli_num_rows($result);   
        $currentDir = getcwd();
        $uploadDirectory = "/uploads/";
        $errors = []; // Store all foreseen and unforseen errors here
        $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

       

      #  $uploadPath = $currentDir . $uploadDirectory . basename($fileName)
        $appName = $_POST['appname'];
        $version = $_POST['version'];
        $category = $_POST['category'];
        $date = $_POST['date'];
        $minAge = $_POST['minAge'];
     
        if (isset($_FILES['file'])) {
            if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $fileName = $_FILES['file']['name'];
                $fileSize = $_FILES['file']['size'];
                $fileTmpName  = $_FILES['file']['tmp_name'];
                $fileType = $_FILES['file']['type'];
                #$fileExtension = strtolower(end(explode('.',$fileName)));
                echo '<script type="text/javascript"> alert("4 gb"); </script>';
                echo "file name " . $fileName . "\n";
                echo "file size " . $fileSize. "\n";
                echo "file tmp name " . $fileTmpName. "\n";
                echo "type ". $fileType. "\n";
                 #echo "ext ". $fileExtension. "\n";
                
                
                if($_FILES['file']['size'] > 4294967295 )
                {
                     echo '<script type="text/javascript">alert("Your upload file should be smaller than 4 gb"); </script>';
                }
                else
                {
                    $fileName = basename($_FILES["file"]["name"]);
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
                    move_uploaded_file($fileTmpName, "./uploads/$fileName" );
                    #unset($_SESSION[""]);
                    #$image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
                    #$image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
                    header("Location: ./appUpload2.php");         
                }

            }
            else
            {
               echo '<script type="text/javascript">alert("Please try again to upload the file again"); </script>';
            }
        }
        else
        {
             echo '<script type="text/javascript">alert("Please try again to upload the file again"); </script>';
        }

    }  

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Application</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Button-Change-Text-on-Hover.css">
    <link rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="assets/css/ebs-contact-form.css">
    <link rel="stylesheet" href="assets/css/Features-Blue.css">
    <link rel="stylesheet" href="assets/css/Forum---Thread-listing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="assets/css/Lista-Productos-Canito.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Search-Form.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Search-Field-With-Icon.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/User-Information-Panel---Lite--Secondary-User-Panel-Footer.css">

</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient" style="font-family: Roboto, sans-serif;opacity: 1;background-image: url(&quot;assets/img/Rectangle%201.png&quot;);">
        <div class="container"><a class="navbar-brand logo" href="home.html">AppLoad</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="profileDev.php">My Profile</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="forum.html">Forum</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="store.html">Store</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link visible" href="login.html">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page lanidng-page">
       
        <section class="portfolio-block block-intro" style="padding-bottom: 30px;">
           
            <div class="container" id="info-container">
               
                <div class="row">
                    <div class="col-md-12" style="padding-bottom: 25px;padding-top: 25px;">
                        <h2 class="text-center text-info">Application Publish Form</h2>
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col relative">
                        <div class="container border rounded border-dark shadow-lg" style="background-color: #00c993;padding: 20px;">
                            <div>
                                <p>Upload an Application</p>
                            </div>
                            <div class="d-xl-flex justify-content-xl-end avatar">
                                <div class="avatar-bg center" style="width: 160px;height: 160px;background-image: url(&quot;assets/img/Upload-Information-icon.png&quot;);"></div>
                                <!-- put an form tag here -->

                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-xl-6 offset-xl-0 align-self-center" id="contact-box">
                        <div class="row" style="padding-bottom: 20px;">
                            <div class="col">
                                <div class="dashed_upload"><div class="wrapper">
                                    <div class="drop">
                                        <div class="cont">
                                              <i class="fa fa-cloud-upload"></i>
                                                  <div class="tit">
                                                        Upload An Icon
                                                  </div>
                                                  <div class="desc">
                                                        or 
                                                  </div>
                                                  <div class="browse">
                                                        click here to browse
                                                  </div>
                                        </div>
                                        <output id="list"></output>
                                        <form name="form2" action="appUpload1.php" method="post" enctype="multipart/form-data" >
                                            <input id="files" name="files" type="file" >
                                            <br/>
                                            <div class="col"><button class="button" name="photoUpload"type="submit" ><span>upload an image</span></button></div>
                                        </form>
                                    </div>
                                </div>
                                <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

                                <script src="js/index.js"></script></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-xl-6 offset-xl-0 site-form">
                        <form id="my-form" name="form3" action="appUpload1.php" method="post" enctype="multipart/form-data">
                          
                            <div class="form-group"><label class="sr-only" for="appname">First Name</label><input class="form-control" type="text" id="appname" name="appname" required="" placeholder="Name of the Application" autofocus=""></div>
                            <div class="form-group"><label class="sr-only" for="version">Last Name</label><input class="form-control" type="text" id="version" name="version" required="" placeholder="Version"></div>
                            <div class="form-group"><label class="sr-only" for="date">Email Address</label><input class="form-control" type="text" id="date" name="date" required="" placeholder="Date"></div>
                            <div class="form-group"><label class="sr-only" for="age">Email Address</label><input class="form-control" type="text" id="age" name="minAge" required="" placeholder="Minimal Age"></div>
                            
                            <div class="form-group"><input type="file" class="form-control" name="file" style="font-size: 10px;" placeholder="select the app from computer" required=""></div> 
                            
                            <div class="row" style="padding: 34px;">
                            <div class="col"><button class="button" name="a"type="submit" ><span>Continue to System Requirements</span></button></div>
                            </div>
                        </form>
                    </div>
                </div>
                

                    
                </div>
                </div>
            </div>
        </section>
        <section class="portfolio-block block-intro" style="padding-bottom: 30px;"></section>
   
    </main>
    <section class="portfolio-block website gradient" style="background-image: url(&quot;assets/img/2018-06-04-21-40-16.jpeg&quot;);background-size: contain;"></section>
    <footer class="page-footer">
        <div class="container">
            <div class="links"><a href="#">About us</a><a href="contact.html">Contact us</a><a href="store.html">Store</a></div>
            <div class="social-icons"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-instagram-outline"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a></div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/not_empty.js"></script>
</body>

</html>