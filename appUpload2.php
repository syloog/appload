
<?php
include ('session.php');
#$image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
#$image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    #take datas
if(isset($_POST["button"]))
   {
     $appPhoto = $_SESSION['appPhoto'];
     $appName = $_SESSION['appName'];
     $version = $_SESSION['version'];
     
     $file = $_SESSION['file'];
     $date = $_SESSION['date'];
     $minage = $_SESSION['minage'];
     $ram = $_POST["ramField"];
     $storage = $_POST["storageField"];
     $cpu =  $_POST[ "cpuField"];
     $os = $_POST["osField"];
     $category = $_POST["category"];
     $descripton = $_POST["description"];
     $apploadName = $appName . " (".$os.")";
     #check if given app is already exists or not
     $queryToCheck ="Select * from application where appname= '$apploadName';"
     $check =  mysqli_query($db,$queryToCheck);
     $count= mysqli_num_rows($check);
    
        if($count == 0)
        {
             #add the file to db
            $queryCategory = "Select cat_id from category where cat_name= '$category';";
            $res = mysqli_query($db,$queryCategory);
            
            $query = "insert into applivation() values()";
            echo $appPhoto ."\n";
            echo $ram ." - ". $storage."-" . $cpu."-" . $os ."-\n"; 
            print_r($category);
            
        }
    else
    {
         echo '<script type="text/javascript">'.
                'alert ("The given name is on database please try another name "); location= "./appUpload1.php";'.
                '</script>';
    }
   }
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
    <main>
    <section class="portfolio-block block-intro" style="padding-bottom: 30px;">
    <div class="row">
        <div class="col">
            <p class="text-center" id="contact-text" style="padding: 40px;">Please fill all the areas to get your app published. Otherwise our editors will not be accepting the requests for applications. Some restrictions may be applied after the release and it will be announced to you. Good luck developer
                            !</p>
        </div>
    </div>
       <form action="appUpload2.php" method="post">
        <div class="col" style="padding-top: 50px;">
            <div class="row">
                <div class="col">
                    <fieldset style="padding: 0px;padding-bottom: 20px;padding-top: 10px;">
                        <legend>Describe your application in a few sentences</legend><textarea style="background-color: rgb(138,239,212);min-height: 50px;max-height: 200px;height: 100px;width: 80%;" placeholder="Write here" name="description"></textarea></fieldset>
                </div>
            </div>
        <div>
          
           <fieldset id="ramField">
               <legend>Choose a RAM amount for <?php 
                   $p =  $_SESSION['appName'];
                  echo $p;
                   ?></legend>
               <div class="custom-control custom-radio"><input type="radio" value="512MB" id="ram512" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram512">512 MB or less</label></div>
               <div class="custom-control custom-radio"><input type="radio" value="1GB" id="ram1GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram1GB">1 GB</label></div>
               <div class="custom-control custom-radio"><input type="radio" value="2GB" id="ram2GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram2GB">2 GB</label></div>
               <div class="custom-control custom-radio"><input type="radio" value="4GB" id="ram4GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram4GB">4 GB</label></div>
               <div class="custom-control custom-radio"><input type="radio" value="8GB" id="ram8GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram8GB">8 GB</label></div>
                <div class="custom-control custom-radio"><input type="radio" value="16GB" id="ram16GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram16GB">16 GB or more</label></div>
             </fieldset>
             <fieldset id="storageField">
               <legend>Choose a RAM amount for
                  <?php 
                   $p =  $_SESSION['appName'];
                  echo $p;
                   ?></legend>
               <div class="custom-control custom-radio"><input type="radio" value="512MB" id="storage512" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage512">512 MB or less</label></div>
               <div class="custom-control custom-radio"><input type="radio" value="1GB" id="storage1GB" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage1GB">2 GB</label></div>
               <div class="custom-control custom-radio"><input type="radio" value="4GB" id="storage5GB" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage5GB">4 GB</label></div>
               <div class="custom-control custom-radio"><input type="radio" value="8GB" id="storage10GB" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage10GB">8 GB</label></div>
               <div class="custom-control custom-radio"><input type="radio" value="16GB" id="storage25GB" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage25GB">16 GB or more</label></div>
             </fieldset>
              <fieldset id="cpuField">
                 <legend>Choose CPU types for <?php 
                   $p =  $_SESSION['appName'];
                  echo $p;
                   ?></legend>
                 <div class="custom-control custom-radio"><input type="radio" value="AMD" id="amdCheck" class="custom-control-input" name="cpuField"><label class="custom-control-label" for="amdCheck">AMD</label></div>
                 <div class="custom-control custom-radio"><input type="radio" value="Intel" id="intelCheck" class="custom-control-input" name="cpuField"><label class="custom-control-label" for="intelCheck">Intel</label></div>
               </fieldset>
               <fieldset id = "osField">
                   <legend>Choose Operating Systems for <?php 
                   $p =  $_SESSION['appName'];
                  echo $p;
                   ?></legend>
                    <div class="custom-control custom-radio"><input type="radio" value="MacOS" id="macCheck" class="custom-control-input" name="osField"><label class="custom-control-label" for="macCheck">MacOS</label></div>
                    <div class="custom-control custom-radio"><input type="radio" value="Windows" id="winCheck" class="custom-control-input" name="osField"><label class="custom-control-label" for="winCheck">Windows</label></div>
                    <div class="custom-control custom-radio"><input type="radio" value="Linux" id="linuxCheck" class="custom-control-input" name="osField"><label class="custom-control-label" for="linuxCheck">Linux</label></div>
                 </fieldset>
                 <fieldset requried="" id="categoryField">
                    <legend>Choose Category for <?php 
                   $p =  $_SESSION['appName'];
                  echo $p;
                   ?></legend>
                         <div class="row">
                             <div class="col">
                                 <div class="custom-control custom-radio"><input type"radio" value="Music" name="categoryField" id="musicCheck" class="custom-control-input"><label class="custom-control-label" for="musicCheck">Music</label></div>
                            </div>
                            <div class="col">
                                 <div class="custom-control custom-radio"><input type="radio" value="Software" name="categoryField" id="softwareCheck" class="custom-control-input" checked=""><label class="custom-control-label" for="softwareCheck">Software</label></div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-radio"><input type="radio" value="Application" name="categoryField" id="appCheck" class="custom-control-input" checked=""><label class="custom-control-label" for="appCheck">Application</label></div>
                            </div>
                         </div>
                            <div class="row">
                                <div class="col">
                                   <div class="custom-control custom-radio"><input type="radio"  value="Gaming" name="categoryField" id="gamingCheck" class="custom-control-input"><label class="custom-control-label" for="gamingCheck">Gaming</label></div>
                                </div>
                                <div class="col">
                                   <div class="custom-control custom-radio"><input type="radio" value="Coding" name="categoryField" id="codingCheck" class="custom-control-input" checked=""><label class="custom-control-label" for="codingCheck">Coding</label></div>
                                </div>
                                <div class="col">
                                    <div class="custom-control custom-radio"><input type="radio"  value="Picturing"name="categoryField" id="pictureCheck" class="custom-control-input"><label class="custom-control-label" for="pictureCheck">Picturing</label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="custom-control custom-radio"><input type="radio"  value="Security" name="categoryField" id="securityCheck" class="custom-control-input"><label class="custom-control-label" for="securityCheck">Security</label></div>
                                </div>
                                <div class="col">
                                    <div class="custom-control custom-radio"><input type="radio"  value="health" name="categoryField" id="healthCheck" class="custom-control-input"><label class="custom-control-label" for="healthCheck">Health</label></div>
                                </div>
                                <div class="col">
                                    <div class="custom-control custom-radio"><input type="radio" value="Browser" name="categoryField" id="browserCheck" class="custom-control-input"><label class="custom-control-label" for="browserCheck">Browser</label></div>
                                </div>
                            </div>
                    </fieldset>
                        <div class="row" style="padding: 34px;">
                        <div class="col"><button class="button" name="button" type="submit" ><span>Submit</span></button></div>
                    </div>
                </form>
            </div>
        </div>
        </section>
        </main>
        </body>

</html>