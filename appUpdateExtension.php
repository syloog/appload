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
            <div class="container" id="info-container">
                <div class="row">
                    <div class="col-md-12" style="padding-bottom: 25px;padding-top: 25px;">
                        <h2 class="text-center">Application Request</h2>
                    </div>
                    <div class="col site-form">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Application Name</td>
                                        <td>GitHub</td>
                                    </tr>
                                    <tr>
                                        <td>Version</td>
                                        <td>2.4b</td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td>30.11.2019</td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td>Software, Application, Coding</td>
                                    </tr>
                                    <tr>
                                        <td>Request</td>
                                        <td>UPDATE</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3>Requirements</h3>
                        <p>Only works on Windows, &nbsp;4 GB RAM and 128 MB or less storage needed. AMD CPUs are not supported.</p>
                        <div class="row" style="padding-top: 25px;">
                            <div class="col"><button class="button" type="button" style="background-color:rgb(255, 204, 39)" data-hover="CONFIRM ?"><span>APPROVE APPLICATION</span></button></div>
                            <div class="col"><button class="button" type="button" data-hover="CONFIRM ?" style="background-color:rgb(209, 50, 82)"><span>DISAPPROVE APPLICATION</span></button></div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding: 15px;">
                    <div class="col">
                        <div class="form-group">
                            <h3 style="padding: 15px;">You can override requirements and send feedback to the developer.<br>To override, please fill the form below.</h3>
                            <div class="row no-gutters justify-content-xl-center">
                                <div class="col">
                                    <fieldset><label class="sr-only" for="description">Last Name</label><textarea id="description" name="description" required="" placeholder="Please describe the reasons of override to provide a better feedback." rows="4" style="width: 75%;min-height: 102px;max-height: 240px;"></textarea></fieldset>
                                </div>
                            </div>
                            <div>
                                <fieldset id="ramField">
                                    <legend>Choose a RAM amount for GitHub</legend>
                                    <div class="custom-control custom-radio"><input type="radio" id="ram512" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram512">512 MB or less</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="ram1GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram1GB">1 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="ram2GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram2GB">2 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="ram4GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram4GB">4 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="ram8GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram8GB">8 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="ram16GB" class="custom-control-input" name="ramField"><label class="custom-control-label" for="ram16GB">16 GB or more</label></div>
                                </fieldset>
                                <fieldset id="storageField">
                                    <legend>Choose a RAM amount for GitHub</legend>
                                    <div class="custom-control custom-radio"><input type="radio" id="storage512" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage512">512 MB or less</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="storage1GB" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage1GB">1 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="storage5GB" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage5GB">5 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="storage10GB" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage10GB">10 GB</label></div>
                                    <div class="custom-control custom-radio"><input type="radio" id="storage25GB" class="custom-control-input" name="storageField"><label class="custom-control-label" for="storage25GB">25 GB or more</label></div>
                                </fieldset>
                                <fieldset>
                                    <legend>Choose CPU types for GitHub</legend>
                                    <div class="custom-control custom-checkbox"><input type="checkbox" id="amdCheck" class="custom-control-input" name="amdField"><label class="custom-control-label" for="amdCheck">AMD</label></div>
                                    <div class="custom-control custom-checkbox"><input type="checkbox" id="intelCheck" class="custom-control-input" name="intelField"><label class="custom-control-label" for="intelCheck">Intel</label></div>
                                </fieldset>
                                <fieldset>
                                    <legend>Choose Operating Systems for GitHub</legend>
                                    <div class="custom-control custom-checkbox"><input type="checkbox" id="macCheck" class="custom-control-input" name="macOsField"><label class="custom-control-label" for="macCheck">MacOS</label></div>
                                    <div class="custom-control custom-checkbox"><input type="checkbox" id="winCheck" class="custom-control-input" name="winOsField"><label class="custom-control-label" for="winCheck">Windows</label></div>
                                    <div class="custom-control custom-checkbox"><input type="checkbox" id="linuxCheck" class="custom-control-input" name="linuxOsField"><label class="custom-control-label" for="linuxCheck">Linux</label></div>
                                </fieldset>
                                <fieldset id="categoryField">
                                    <legend>Choose Category types for GitHub</legend>
                                    <div class="row">
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" id="musicCheck" class="custom-control-input"><label class="custom-control-label" for="musicCheck">Music</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" id="softwareCheck" class="custom-control-input" checked=""><label class="custom-control-label" for="softwareCheck">Software</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" id="appCheck" class="custom-control-input" checked=""><label class="custom-control-label" for="appCheck">Application</label></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" id="gamingCheck" class="custom-control-input"><label class="custom-control-label" for="gamingCheck">Gaming</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" id="codingCheck" class="custom-control-input" checked=""><label class="custom-control-label" for="codingCheck">Coding</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" id="pictureCheck" class="custom-control-input"><label class="custom-control-label" for="pictureCheck">Picturing</label></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" id="securityCheck" class="custom-control-input"><label class="custom-control-label" for="securityCheck">Security</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" id="healthCheck" class="custom-control-input"><label class="custom-control-label" for="healthCheck">Health</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox"><input type="checkbox" id="browserCheck" class="custom-control-input"><label class="custom-control-label" for="browserCheck">Browser</label></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 25px;">
                    <div class="col"><button class="button" type="button" data-hover="CONFIRM ?"><span>SEND FEEDBACK</span></button></div>
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
</body>

</html>