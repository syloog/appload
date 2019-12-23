<?php
include('session.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Homepage</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="assets/css/Button-Change-Text-on-Hover.css">
</head>

<body style="background: linear-gradient(rgba(47, 23, 15, 0.65), rgba(47, 23, 15, 0.65)), url('bg.jpg');background-image: url(&quot;assets/img/1175459.png&quot;);background-repeat: round;background-size: cover;">
    <nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-4" id="mainNav">
        <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#">Brand</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav mx-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="welcome.php">HOMEPAGE</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="applyControl.php">APPLICATION</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">SIGN OUT</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <h1 class="text-center text-white d-none d-lg-block site-heading" style="padding-bottom: 30px;"><span class="text-primary site-heading-upper mb-3">BILKENT UNIVERSITY&nbsp;</span><span class="site-heading-lower" style="color: rgb(255,255,255);">SUMMER INTERNSHIPS</span></h1>
        <div class="container d-xl-flex justify-content-xl-center" style="">
            <div class="col">
                <div class="intro-text left-0 text-centerfaded p-5 rounded bg-faded text-center" style="margin: 30px;background-color: rgb(248,184,26);">
                    <div class="row justify-content-center" style="padding:10px">
                        <?php
                        if (isset($_SESSION["error"])) {
                            $error = $_SESSION["error"];
                            echo "<h2 class='bg-danger border rounded border-danger' style='padding:10px'> $error </h2>";
                            unset($_SESSION["error"]);
                        }
                        ?>
                    </div>
                    <h2 class="section-heading mb-4"><span class="section-heading-lower">Welcome</span></h2>
                    <h2 class="section-heading mb-4"><span class="section-heading-upper"><?php echo $login_session; ?></span></h2>
                    <p class="mb-3">Every student should have the opportunity to apply a traning once in their education. We offer, as Bilkent University, to our students more than just the opportunity; we set the conditions and all you have to do is to choose where
                        do you want to train from the application table below !</p>
                </div>
                <div class="intro-text left-0 text-centerfaded p-5 rounded bg-faded text-center" style="margin: 30px;background-color: rgb(248,184,26);">
                    <h2 class="section-heading mb-4"><span class="section-heading-upper"></span><span class="section-heading-lower">Applıcation table</span></h2>
                    <div class="table-responsive">
                        <?php
                        $result = mysqli_query($db, "SELECT * FROM company");
                        $applications = mysqli_query($db, "SELECT cid FROM apply a WHERE " . $login_session_id . "= a.sid");
                        $array = array();
                        while ($row = mysqli_fetch_array($applications)) {
                            $array[] = $row["cid"];
                        }
                        echo "<table class='table'>
                        <thead>
                        <tr>
                        <th>Company ID</th>
                        <th>Company Name</th>
                        <th>Quota</th>
                        <th>Action</th>
                        </tr>
                        </thead>";
                        echo "<tbody>";
                        
                        while ($row = mysqli_fetch_array($result)) {
                            if (in_array($row["cid"], $array)) {
                                echo "<tr>";
                                echo "<td>" . $row['cid'] . "</td>";
                                echo "<td>" . $row['cname'] . "</td>";
                                if ($row['quota'] == 0) {
                                    echo "<td>Full</td>";
                                } else {
                                    echo "<td>" . $row['quota'] . " Left" . "</td>";
                                }
                                echo "<td><form method='post' action='apply.php'><button class='btn btn-primary' name='cancelButton' type='submit' value=" . $row['cid'] . " style='background-color:rgb(106,64,10)'>Cancel</button></form></td>";
                                echo "</tr>";
                            }
                        }
                        echo "</tbody></table>";
                        ?>
                    </div>
                    <button class="button" type="button" data-hover="Apply?" name="apply_student" onclick="location.href='applyControl.php'"><span>Apply for a New Internship</span></button>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer text-faded text-center py-5">
        <div class="container">
            <p class="m-0 small">Copyright&nbsp;©&nbsp;Bilkent University 2019</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>