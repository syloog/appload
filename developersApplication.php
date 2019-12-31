<?php
include('session.php');
if(isset($_GET["appname"]) != 0)
{
    #echo "here";
    $var = $_GET['appname'];
    #echo $var;
    $query = "Select * from application where appname = '$var'";
    
    #echo $query;
    if($result  = mysqli_query($db, $query))
    {
        #echo "basarılı";
    }
    else
    {
        #echo "basaırızı";
    }
    
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
        $app_id = $row["app_id"];
        $description = $row["description"];
        $app_version = $row["app_version"];
        $minimumAge = $row["minimumAge"];
        $appLogo = $row["appLogo"];
       # echo $appLogo;
       # $appDate = $row["appDate"];
        $cat_id = $row["cat_id"];
        $app_status = $row["app_status"];
        $file = $row["file"];
    }
    echo $file;
    $query2 = "Select * from req_restricts where app_id = $app_id";
    $reqId;
    if($result3 = mysqli_query($db,$query2))
    {
    
        while($row = mysqli_fetch_array($result3, MYSQLI_BOTH))
        {
            $req_Id = $row["req_id"];
        }
    }
    else
    {
        echo "basaırızı";
    }


   $req_Id = $req_Id + 0;
    $query3 = "Select * from minimum_requirement where req_id = $req_Id";
    
    
    if($result2  = mysqli_query($db, $query3))
    {
     #   echo "basarılı";
    }
    else
    {
      #  echo "basaırızı";
    }
    
    while($row = mysqli_fetch_array($result2, MYSQLI_BOTH))
    {
        $os_version = $row["os_version"];
        $ram = $row["ram"];
        $cpu = $row["cpu"];
        $storage = $row["storage"];
    }
    
            #areaları al 
    $areaString="";
    $queryForTakingAreas = " Select * from restricts where app_id = $app_id";
    if($result4 = mysqli_query($db,$queryForTakingAreas ))
    {
        while($row = mysqli_fetch_array($result4))
        {
                $temp = $row['area_id'];
                $queryForArea = "Select * from area where area_id= $temp";
                if($result5 = mysqli_query($db,$queryForArea ))
                {
                    while($row2 = mysqli_fetch_array($result5))
                    {
                        $temp2 = $row2["area_name"];
                        $areaString = $areaString .", " . $temp2;     
                    }
                }
                    
         }
    }
    $len =strlen($areaString);
    $areaString= substr($areaString,1,$len);
    
    
    $var2 ='<main class="page lanidng-page">
            <section class="portfolio-block block-intro" style="padding-bottom: 30px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 d-xl-flex align-items-xl-center item zoom-on-hover" style="background-color: rgb(255,255,255);"><a href="#" style="padding: 63px;"><img class="img-fluid image" src="images/application_photos/"'.$appLogo .'></a></div>
                    <div class="col">
                        <h4>'.$var.'<br></h4>
                        <div class="row d-sm-flex d-xl-flex justify-content-sm-center justify-content-xl-center align-items-xl-center">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col">
                                       <a href="manageApplication.php?file='.$file.'"> <button class="button" type="button" data-hover="NOW!"><span>Update or Delete the App</span> </button> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="portfolio-block block-intro" style="padding-bottom: 30px;">
            <div class="container">
                <div>
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Details</a></li>
                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Comments</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" role="tabpanel" id="tab-1">
                            <div class="col">
                                <p><br>'.$description.'<br><br></p>
                            </div>
                            <div class="col-6 mx-auto" style="padding-bottom: 15px;padding-top: 15px;"><img class="img-fluid" src="assets/img/bee164f5ac22ee6299ee7e993135b42c.png"></div>
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>App Requirements</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Age</td>
                                                <td>+'. $minimumAge .'</td>
                                            </tr>
                                            <tr>
                                                <td>Supported Areas</td>
                                                <td>Europe, &nbsp;America, Asia</td>
                                            </tr>
                                            <tr>
                                                <td>Operating System</td>
                                                <td>'.$os_version.'</td>
                                            </tr>
                                            <tr>
                                                <td>RAM</td>
                                                <td>'.$ram.'</td>
                                            </tr>
                                            <tr>
                                                <td>Storage</td>
                                                <td>'.$storage.'</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="tab-2">
                            <div class="col" style="padding: 35px;">';
    
    
    
    echo '<!DOCTYPE html>
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

<body>';
    
    
    
echo ' <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient" style="font-family: Roboto, sans-serif;opacity: 1;background-image: url(&quot;assets/img/Rectangle%201.png&quot;);">
        <div class="container"><a class="navbar-brand logo" href="home.html">AppLoad</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="profileUser.html">My Profile</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="forum.html">Forum</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="store.html">Store</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link visible" href="login.html">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page lanidng-page">
        <section class="portfolio-block block-intro" style="padding-bottom: 30px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 d-xl-flex align-items-xl-center item zoom-on-hover" style="background-color: rgb(255,255,255);"><a href="#" style="padding: 63px;"><img class="img-fluid image"  src="./images/application_photos/'.$appLogo .'"/></a></div>
                    <div class="col">
                         <h4>'.$var.'<br></h4>
                        <div class="row d-sm-flex d-xl-flex justify-content-sm-center justify-content-xl-center align-items-xl-center">
                            <div class="col-4">
                                <div class="row">
                                    <a href="manageApplication.php?app_id='.$app_id.'"> <button class="button" type="button" data-hover="NOW!"><span>Update or Delete the App</span> </button> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="portfolio-block block-intro" style="padding-bottom: 30px;">
            <div class="container">
                <div>
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Details</a></li>
                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Comments</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" role="tabpanel" id="tab-1">
                            <div class="col">
                                <p><br><br>'.$description.'<br><br></p>
                            </div>
                            <div class="col-6 mx-auto" style="padding-bottom: 15px;padding-top: 15px;"><img class="img-fluid" src="assets/img/bee164f5ac22ee6299ee7e993135b42c.png"></div>
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>App Requirements</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Age</td>
                                                 <td>+'. $minimumAge .'</td>
                                            </tr>
                                            <tr>
                                                <td>Supported Areas</td>
                                                <td>'. $areaString .'</td>
                                            </tr>
                                            <tr>
                                                <td>Operating System</td>
                                              <td>'.$os_version.'</td>
                                            </tr>
                                            <tr>
                                                <td>RAM</td>
                                                <td>'.$ram.'</td>
                                            </tr>
                                            <tr>
                                                <td>Storage</td>
                                                <td>'.$storage.'</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="tab-2">
                            <div class="col" style="padding: 35px;">
        <div class="comment-wrapper">
            <div class="panel panel-info">
                <div class="panel-body" style="padding-top: 15px">
                    Rate this app <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                    <textarea class="form-control" placeholder="write a comment..." rows="3"></textarea>
                    <br>
                    <button type="button" class="btn btn-info pull-right">Post</button>
                    <div class="clearfix"></div>
                    <hr>
                    <ul class="media-list">
                        <li class="media">
                            <a href="#" class="pull-left">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <div class ="row mx-auto d-flex justify-content-center justify-content-top">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>
                                </div> 
                                <strong class="text-success">@MartinoMont</strong>
                                <div class ="row mx-auto d-flex justify-content-center">
                                <p>
                                    Such a nice application !
                                </p>
                                </div>
                                <div class ="row mx-auto d-flex d-flex justify-content-center">
                                <button type="button" class="btn btn-link pull-right" >Edit Comment</button>
                                <button type="button" class="btn btn-link pull-right">Delete Comment</button>
                                </div>
                            </div>
                            
                        </li>
                        <li class="media">
                            <a href="#" class="pull-left">
                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <div class ="row mx-auto d-flex justify-content-center justify-content-top">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>
                                </div> 
                                <strong class="text-success">@LaurenceCorreil</strong>
                                <p>
                                    Works better in Windows. In Linux, it sometimes crashes. But still the best that I can find.
                                </p>
                            </div>
                        </li>
                        <li class="media">
                            <a href="#" class="pull-left">
                                <img src="https://bootdey.com/img/Content/user_3.jpg" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <div class ="row mx-auto d-flex justify-content-center justify-content-top">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </div> 
                                <strong class="text-success">@JohnNida</strong>
                                <p>
                                    This a must-to-get application if you are working with team for a project. We are constantly using GitHub to comminucate and also discuss about the implementation. Nice job developers!
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    <script src="assets/js/theme.js"></script>';
    
    
    echo '</body>

</html>';  
}
?>
