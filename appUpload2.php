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
     $category = $_POST["categoryField"];
     $descripton = $_POST["description"];
     $apploadName = $appName . " (".$os.")";
     #check if given app is already exists or not
     $queryToCheck ="Select * from application where appname= '$apploadName';";
     $check =  mysqli_query($db,$queryToCheck);
     $count= mysqli_num_rows($check);   
     if($count === 0)
     {
        
             #add the file to db
            $queryCategory = "Select cat_id from category where cat_name= '$category';";
            
            $cat_id;
            $res = mysqli_query($db,$queryCategory);
            while($result7 = mysqli_fetch_array($res,  MYSQLI_BOTH))
            {
    
                $cat_id = $result7['cat_id'];
            }
         
            #300000
            $queryForID = "Select * From application;";
            $queryForReqID = "Select * From minimum_requirement;";
            $result1 = mysqli_query($db,$queryForID);
            $count2 = mysqli_num_rows($result1);
        
            $result2 = mysqli_query($db, $queryForReqID);
            $count3 = mysqli_num_rows($result2);
            
            $reqID = $count3 +1;
            
            $app_id = $count2 + 1;
            #echo "req_id type " . gettype($reqID) ."\n";
            #echo "app_id type " . gettype($app_id) ."\n";
            #echo "os type " . gettype($os) ."\n";
            #echo "ram type " . gettype($ram) ."\n";
            #echo "cpu type " . gettype($cpu) ."\n";
            #echo "storage type " . gettype($storage) ."\n";
                
            #echo $reqID ."\n";
            #echo $app_id ."\n";
            #echo $os ."\n";
            #echo $ram ."\n";
            #echo $cpu ."\n";
            #echo $storage ."\n";

            $description = "a";
            $cat_id = $cat_id + 0;
            $minage = $minage + 0;
            $version = $version + 0.0;
            #echo "---------------------\n";
            #echo "appLogo type " . gettype($appPhoto) ."\n";
            #echo "appname type " . gettype($appName) ."\n";
            ##echo "app_date type " . gettype($app_date) ."\n";
            #echo "app_id type " . gettype($app_id) ."\n";
            #echo "appStatus type " . gettype('WAITING') ."\n";
            #echo "app_version type " . gettype($version) ."\n";
            #echo "cat_id type " . gettype($cat_id) ."\n";
            #echo "description type " . gettype($description) ."\n";
            #echo "file type " . gettype($file) ."\n";
            #echo "MinimumAge type " . gettype($minage) ."\n";
            #echo "req_id type " . gettype($reqID) ."\n";
            
                
            #echo $appPhoto ." app photo \n";
            #echo $appName ." app name \n";
            #echo $app_id ." app id \n";
            #echo $version ." version \n";
            #echo $cat_id ." cat id \n";
            #echo $description ." description \n";
            #echo $file . " file \n";
            #echo $minage ." minage\n";
            #echo $reqID ." reqId\n";
         
            $u_id = $_SESSION["u_id"];
            $u_id = $u_id + 0;
            #echo current_timestamp();
            #echo gettype($u_id) ."asdasd\n";
             $r = $_POST['description'];
             echo gettype($r);
            $queryToMinReq = "INSERT INTO minimum_requirement (req_id, app_id, os_version, ram, cpu, storage) VALUES ( '$reqID',  '$app_id' , '$os', '$ram' , '$cpu' ,'$storage')";
            mysqli_query($db, $queryToMinReq);
         #    if(mysqli_query($db, $queryToMinReq))
           # {
          #      echo "trueeee";
         #   }
        # else{
        #     echo "trueeee degil";
         #}
                 

         #if(mysqli_query($db, $queryToApp))
            #{
             #   echo "hey hey";
            #}
           # else
          #  {
         #       echo "*****";
        #    }
         
            $queryToDevelops = "INSERT INTO develops (dev_id, app_id ) VALUES ($u_id, $app_id);";
            mysqli_query($db, $queryToDevelops);   
         
            $queryToApp = "INSERT INTO application (app_id, appname, description, app_version, minimumAge, appLogo, app_date, req_id, cat_id, app_status,file) values( '$app_id', '$appName', '$r' , '$version', '$minage', '$appPhoto',  'current_timestamp()', '$reqID' ,'$cat_id' , 'WAITING' , '$file' );";
            mysqli_query($db, $queryToApp);
         #if(mysqli_query($db, $queryToDevelops))
            #{
            #    echo "as";
            #}
            #else
            #{
            #    echo "\n sa \n";
            #}

            #echo $appPhoto ."\n";
            #echo $ram ." - ". $storage."-" . $cpu."-" . $os ."-\n"; 
            #print_r($category);
           #  header("Location: ./appUpload1.php");   
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
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
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
                                 <div class="custom-control custom-radio"><input type="radio" value="Music" name="categoryField" id="musicCheck" class="custom-control-input"><label class="custom-control-label" for="musicCheck">Music</label></div>
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
                       
                       
                       
                 <fieldset requried="" id="areaField">
                    <legend>Choose Allowed areas for <?php 
                   $p =  $_SESSION['appName'];
                  echo $p;
                   ?></legend>
                         <div class="row">
                             <div class="col">
                                 <div class="custom-control custom-checkbox"><input type="checkbox" value="North America" name="areaField[]" id="northAmericaCheck" class="custom-control-input"><label class="custom-control-label" for="northAmericaCheck">North America</label></div>
                            </div>
                            <div class="col">
                                 <div class="custom-control custom-checkbox"><input type="checkbox" value="Europe" name="areaField[]" id="europeCheck" class="custom-control-input"><label class="custom-control-label" for="europeCheck">Europe</label></div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-checkbox"><input type="checkbox" value="Asia" name="areaField[]" id="assiaCheck" class="custom-control-input" ><label class="custom-control-label" for="assiaCheck">Asia</label></div>
                            </div>
                         </div>
                            <div class="row">
                                <div class="col">
                                   <div class="custom-control custom-checkbox"><input type="checkbox"  value="Russia" name="areaField[]" id="russiaCheck" class="custom-control-input"><label class="custom-control-label" for="russiaCheck">Russia</label></div>
                                </div>
                                <div class="col">
                                   <div class="custom-control custom-checkbox"><input type="checkbox" value="South America" name="areaField[]" id="SouhAmericaCheck" class="custom-control-input"><label class="custom-control-label" for="SouhAmericaCheck">South America</label></div>
                                </div>
                                <div class="col">
                                    <div class="custom-control custom-checkbox"><input type="checkbox"  value="Oceania" name="areaField[]" id="ocenciaCheck" class="custom-control-input"><label class="custom-control-label" for="ocenciaCheck">Oceania</label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="custom-control custom-checkbox"><input type="checkbox"  value="Middle East and Turkey" name="areaField[]" id="metCheck" class="custom-control-input"><label class="custom-control-label" for="metCheck">Middle East and Turkey</label></div>
                                </div>
                                <div class="col">
                                    <div class="custom-control custom-checkbox"><input type="checkbox"  value="Africa" name="areaField[]" id="africaCheck" class="custom-control-input"><label class="custom-control-label" for="africaCheck">Africa</label></div>
                                </div>
                                <div class="col">
                                    <div class="custom-control custom-checkbox"><input type="checkbox" value="Central America" name="areaField[]" id="centeralAmericaCheck" class="custom-control-input" ><label class="custom-control-label" for="centeralAmericaCheck">Central America</label></div>
                                </div>
                            </div>
                    </fieldset>
                       
                        <div class="row" style="padding: 34px;">
                        <div class="col"><button class="button" name="button" type="submit" id="submitButton"><span>Submit</span></button></div>
                    </div>
                </form>
            </div>
        </div>
        </section>
        </main>
        <script type="text/javascript">
            $(document).ready(function () {
             $('#submitButton').click(function() {
            checked = $("input[type=checkbox]:checked").length;

            if(!checked) {
                alert("You must choose at least one allowed area.");
                return false;
            }

    });
});

</script>
        </body>

</html>