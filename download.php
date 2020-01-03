<?php
include('session.php');
$errors = array();
$success = array();
$file = $_GET["file"];
$u_id = $_SESSION["u_id"];
$query = "Select * 
         from device
          where device_id = (select device_id
                             from regularuserdevice
                             where u_id = $u_id)";

$os;
$ram;
$cpu;
$storage;
if ($result = mysqli_query($db, $query)) {
  while ($row = mysqli_fetch_array($result)) {
    $os = $row["d_os"];
    $ram = $row["d_ram"];
    $cpu = $row["d_cpu"];
    $storage = $row["d_storage"];
  }
}
$app_id = $_GET["app_id"];
$query2 = "select * 
          from minimum_requirement
          where req_id = (select req_id 
                          from req_restricts 
                          where app_id = $app_id)";

                
$osR;
$ramR;
$cpuR;
$storageR;
if ($result2 = mysqli_query($db, $query2) || die(mysqli_error($db))) {
  while ($row2 = mysqli_fetch_array($result2)) {
    $osR = $row2["os_version"];
    $ramR = $row2["ram"];
    $cpuR = $row2["cpu"];
    $storageR = $row2["storage"];
  }
}

$lenram = strlen($ram);
$lenstorage = strlen($storage);

$lenramR = strlen($ramR);
$lenstorageR = strlen($storageR);
$ram = substr($ram, 0, $lenram - 2);
$storage = substr($storage, 0, $lenstorage - 2);
$ramR = substr($ram, 0, $lenramR - 2);
$storageR = substr($storage, 0, $lenstorageR - 2);
$ram = $ram + 0;
$ramR = $ramR + 0;
$storage = $storage + 0;
$storageR = $storageR + 0;

if ($ramR >= $ram) {
  if ($ramR != 512) {
    array_push($errors, "Application's minimum ram is higher than specified ram.");
    $_SESSION["error"] = $errors;
    header("location: profileUser.php");
  }
}

if ($storageR >= $storage) {
  if ($storageR != 512) {
    array_push($errors, "Application's minimum storage is higher than specified storage.");
    $_SESSION["error"] = $errors;
    header("location: profileUser.php");
  }
}
/*
if ($osR != $os) {
  array_push($errors, "Application's operating system is different than specified operating system.");
  $_SESSION["error"] = $errors;
  header("location: profileUser.php");
}

if ($cpu != $cpuR) {
  array_push($errors, "Application's cpu is different than specified cpu.");
  $_SESSION["error"] = $errors;
  header("location: profileUser.php");
}
*/

$query3 = "insert into downloads(u_id, app_id) values($u_id,$app_id)";
$result4 = mysqli_query($db, $query3);

$fullPath = "./uploads/" . $file;
#echo $fullPath;
download_file($fullPath);
function download_file($fullPath)
{
  if (headers_sent())
    die('Headers Sent');


  if (ini_get('zlib.output_compression'))
    ini_set('zlib.output_compression', 'Off');


  if (file_exists($fullPath)) {

    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);

    switch ($ext) {
      case "pdf":
        $ctype = "application/pdf";
        break;
      case "exe":
        $ctype = "application/octet-stream";
        break;
      case "zip":
        $ctype = "application/zip";
        break;
      case "doc":
        $ctype = "application/msword";
        break;
      case "xls":
        $ctype = "application/vnd.ms-excel";
        break;
      case "ppt":
        $ctype = "application/vnd.ms-powerpoint";
        break;
      case "gif":
        $ctype = "image/gif";
        break;
      case "png":
        $ctype = "image/png";
        break;
      case "jpeg":
      case "jpg":
        $ctype = "image/jpg";
        break;
      default:
        $ctype = "application/force-download";
    }

    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private", false);
    header("Content-Type: $ctype");
    header("Content-Disposition: attachment; filename=\"" . basename($fullPath) . "\";");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . $fsize);
    ob_clean();
    flush();
    readfile($fullPath);
    header("location: appPage.php");
  } else
    die('File Not Found');
}
