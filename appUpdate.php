<?php
include('session.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
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
        <div class="container"><a class="navbar-brand logo" href="index.php">AppLoad</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" <?php
                                                                                    if (isset($_SESSION["loggedin"])) {
                                                                                        if ($_SESSION["u_type"] == "regular") {
                                                                                            echo "href='profileUser.php'";
                                                                                        } else if ($_SESSION["u_type"] == "developer") {
                                                                                            echo "href='profileDev.php'";
                                                                                        } else if ($_SESSION["u_type"] == "editor") {
                                                                                            echo "href='profileEditor.php'";
                                                                                        }
                                                                                    ?>> My Profile</a></li>
                <?php
                                                                                    } else {
                                                                                        echo "></a></li>";
                                                                                    }
                ?>
                <li class="nav-item" role="presentation"><a class="nav-link" <?php
                                                                                if (isset($_SESSION["loggedin"])) {
                                                                                ?> href='forum.php?sort=lastest&pageno=1'>Forum</a></li>
            <?php
                                                                                } else {
                                                                                    echo "></a></li>";
                                                                                }
            ?>
            <li class="nav-item" role="presentation"><a class="nav-link" <?php
                                                                            if (isset($_SESSION["loggedin"])) {
                                                                            ?> href='store.php'>Store</a></li>
        <?php
                                                                            } else {
                                                                                echo "></a></li>";
                                                                            }
        ?>
        <li class="nav-item" role="presentation"><a class="nav-link" <?php
                                                                        if (isset($_SESSION["loggedin"])) {
                                                                        ?> href='logout.php'>Logout</a></li>
    <?php
                                                                        } else {
                                                                            echo "href='loginScreen.php'>Login</a></li>";
                                                                        }
    ?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page lanidng-page" style="background-color: #0c0f18">
        <section class="portfolio-block block-intro" style="padding-bottom: 0px;">
            <div class="container" id="info-container">
                <form action="updateApp.php" method=post enctype="multipart/form-data" class="shadow-none border rounded" style="background-color: #eeeeee;padding: 20px;margin: 0px;width: 100%;max-width: 100%;">
                    <div class="col relative">
                        <div class="row">
                            <div class="col-md-12" style="padding-bottom: 25px;padding-top: 25px;">
                                <h2 class="text-center">Application Update Form</h2>
                            </div>
                        </div>
                        <div class="row d-xl-flex align-self-center align-items-xl-center">
                            <div class="col" style="height:400px;width:400px;max-width:400px;max-height:400px">
                                <a>
                                    <img class="img-thumbnail" style="width:400px;height:400px;background-size:cover;
                                <?php echo 'background-image:url(&quot;/images/application_photos/';
                                $app_id = $_GET["app_id"];
                                $app_id = $app_id + 0;
                                $query1 = "Select appLogo from application where app_id= " . $app_id;
                                if ($result = mysqli_query($db, $query1)) {
                                    $row =  mysqli_fetch_assoc($result);
                                    echo $row["appLogo"];
                                    echo  '&quot;);"';
                                }
                                ?>
                                ">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" id="contact-box" style="padding-top: 0px;padding-left: 0px;padding-bottom: 0px;">
                                <div class=" row">
                                    <div class="col-auto">
                                        <p class="text-center" id="contact-text" style="padding-top: 15px;">Please fill all the areas to get your app updated. Otherwise our editors will not be accepting the requests for applications. Some restrictions may be applied after the release and it will be announced to you. Good luck
                                            developer !</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col site-form" style="padding-right: 10px;">
                                <div class="row">
                                    <div class="col" style="padding-top: 50px;">
                                        <div class="dashed_upload">
                                            <div class="wrapper">
                                                <div class="drop">
                                                    <div class="cont">
                                                        <i class="fa fa-cloud-upload"></i>
                                                        <div class="tit">
                                                            update the icon
                                                        </div>
                                                        <div class="desc">
                                                            or
                                                        </div>
                                                        <div class="browse">
                                                            click here to browse
                                                        </div>
                                                    </div>
                                                    <output id="list"></output>

                                                    <div class="cont">
                                                        <input id="files" name="photo_file" type="file">
                                                        <i class="fa fa-cloud-upload"></i>
                                                        <div class="tit">

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                                            <script src="js/index.js"></script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 site-form">
                                <div class="form-group"><input class="form-control" type="text" id="version" name="version" placeholder="Version"></div>
                                <div class="form-group"><select name="minAge" class="form-control" placheholder="Minimal Age">
                                        <option value="3">Minimal Age: 3</option>
                                        <option value="8">Minimal Age: 8</option>
                                        <option value="13">Minimal Age: 13</option>
                                        <option value="15">Minimal Age: 15</option>
                                        <option value="18">Minimal Age: 18</option>
                                </div>
                                <div class="form-group">
                                    <div class="col" class="form-control border rounded">
                                        <input type="file" name="app_file" style="padding-top:25px" placeholder="select the app from computer">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col" style="padding-top: 50px;">
                            <div>
                                <div class="row">
                                    <div class="col">
                                        <fieldset style="padding: 0px;padding-bottom: 20px;padding-top: 10px;">
                                            <legend>Describe your application in a few sentences</legend><input style="background-color: rgb(138,239,212);min-height: 50px;max-height: 200px;height: 100px;width: 80%;" placeholder="Write here" name="description">
                                        </fieldset>
                                    </div>
                                </div>

                                <fieldset id="ramField">
                                    <legend>Choose a RAM amount for application</legend>
                                    <div class="custom-control custom-radio"><input type="radio" value="512MB" id="ram512" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram512">512 MB or less</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" value="1GB" id="ram1GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram1GB">1 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" value="2GB" id="ram2GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram2GB">2 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" value="4GB" id="ram4GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram4GB">4 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" value="8GB" id="ram8GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram8GB">8 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" value="16GB" id="ram16GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram16GB">16 GB or more</label></div>
                                </fieldset>


                                <fieldset id="storageField">
                                    <legend>Choose a Storage amount for application</legend>
                                    <div class="custom-control custom-radio"><input type="radio" value="512MB" id="storage512" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage512">512 MB or less</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" value="1GB" id="storage1GB" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage1GB">2 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" value="4GB" id="storage5GB" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage5GB">4 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" value="8GB" id="storage10GB" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage10GB">8 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" value="16GB" id="storage25GB" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage25GB">16 GB or more</label></div>
                                </fieldset>

                                <fieldset id="cpuField">
                                    <legend>Choose CPU types for application </legend>
                                    <div class="custom-control custom-radio"><input type="radio" value="AMD" id="amdCheck" class="custom-control-input" name="cpuField"><label class="custom-control-label" for="amdCheck">AMD</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" value="Intel" id="intelCheck" class="custom-control-input" name="cpuField"><label class="custom-control-label" for="intelCheck">Intel</label></div>
                                </fieldset>
                                <fieldset id="categoryField">
                                    <legend>Choose Category for application
                                        <div class="row">
                                            <div class="col">
                                                <div class="custom-control custom-radio"><input type="radio" value="1" name="categoryField" id="musicCheck" class="custom-control-input"><label class="custom-control-label" for="musicCheck">Music</label></div>
                                            </div>
                                            <div class="col">
                                                <div class="custom-control custom-radio"><input type="radio" value="2" name="categoryField" id="softwareCheck" class="custom-control-input" checked=""><label class="custom-control-label" for="softwareCheck">Software</label></div>
                                            </div>
                                            <div class="col">
                                                <div class="custom-control custom-radio"><input type="radio" value="3" name="categoryField" id="appCheck" class="custom-control-input" checked=""><label class="custom-control-label" for="appCheck">Application</label></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="custom-control custom-radio"><input type="radio" value="4" name="categoryField" id="gamingCheck" class="custom-control-input"><label class="custom-control-label" for="gamingCheck">Gaming</label></div>
                                            </div>
                                            <div class="col">
                                                <div class="custom-control custom-radio"><input type="radio" value="5" name="categoryField" id="codingCheck" class="custom-control-input" checked=""><label class="custom-control-label" for="codingCheck">Coding</label></div>
                                            </div>
                                            <div class="col">
                                                <div class="custom-control custom-radio"><input type="radio" value="6" name="categoryField" id="pictureCheck" class="custom-control-input"><label class="custom-control-label" for="pictureCheck">Picturing</label></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="custom-control custom-radio"><input type="radio" value="7" name="categoryField" id="securityCheck" class="custom-control-input"><label class="custom-control-label" for="securityCheck">Security</label></div>
                                            </div>
                                            <div class="col">
                                                <div class="custom-control custom-radio"><input type="radio" value="8" name="categoryField" id="healthCheck" class="custom-control-input"><label class="custom-control-label" for="healthCheck">Health</label></div>
                                            </div>
                                            <div class="col">
                                                <div class="custom-control custom-radio"><input type="radio" value="9" name="categoryField" id="browserCheck" class="custom-control-input"><label class="custom-control-label" for="browserCheck">Browser</label></div>
                                            </div>
                                        </div>
                                </fieldset>
                                <fieldset id="areaField">
                                    <legend>Choose Allowed areas for application</legend>
                                    <div class="row">
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" value="North America" name="areaField[]" id="northAmericaCheck" class="custom-control-input"><label class="custom-control-label" for="northAmericaCheck">North America</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" value="Europe" name="areaField[]" id="europeCheck" class="custom-control-input"><label class="custom-control-label" for="europeCheck">Europe</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" value="Asia" name="areaField[]" id="assiaCheck" class="custom-control-input"><label class="custom-control-label" for="assiaCheck">Asia</label></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" value="Russia" name="areaField[]" id="russiaCheck" class="custom-control-input"><label class="custom-control-label" for="russiaCheck">Russia</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" value="South America" name="areaField[]" id="SouhAmericaCheck" class="custom-control-input"><label class="custom-control-label" for="SouhAmericaCheck">South America</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" value="Oceania" name="areaField[]" id="oceniaCheck" class="custom-control-input"><label class="custom-control-label" for="oceniaCheck">Oceania</label></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" value="Middle East and Turkey" name="areaField[]" id="metCheck" class="custom-control-input"><label class="custom-control-label" for="metCheck">Middle East and Turkey</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" value="Africa" name="areaField[]" id="africaCheck" class="custom-control-input"><label class="custom-control-label" for="africaCheck">Africa</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" value="Central America" name="areaField[]" id="centeralAmericaCheck" class="custom-control-input"><label class="custom-control-label" for="centeralAmericaCheck">Central America</label></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="row" style="padding: 34px;">
                                <div class="col"><button class="button" type="submit" name="continue" value=<?php $app_id = $_GET["app_id"];
                                                                                                            echo $app_id; ?> data-hover="CONFIRM ?"><span>SEND REQUEST</span></button></div>
                            </div>
                        </div>
                    </div>
                </form>
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
</body>

</html>