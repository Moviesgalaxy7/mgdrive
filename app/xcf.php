<?php

date_default_timezone_set("Asia/Kolkata");
$domain = 'https://'.$_SERVER['SERVER_NAME'];

// Database Connection
$servername = "localhost";
$username   = "moviesga_mgdrive";
$password   = "&^{0l0BMfHzd";
$dbname     = "moviesga_mgdrive";

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM sc";
$result = $conn->query($sql); 
$rows = $result->fetch_assoc();
    
// Google Config Credentials 1
$cl = $rows['CL'];
$cs = $rows['CS'];
$ru = $domain."/gdcbk";

// Google Config Credentials 2
$cl2 = $rows['CL2'];
$cs2 = $rows['CS2'];
$ru2 = $domain."/tdcbk";

// Google Config Credentials 3
$cl3 = $rows['CL3'];
$cs3 = $rows['CS3'];
$ru3 = $domain."/bkcbk";

$site_name = $rows['sname'];
$sup_mail = $rows['smail'];
$pub = $rows['php_err'];
$rfs = $rows['ref_status'];
$rfv = $rows['ref_val'];
$rfv = str_replace(',',' ',trim($rfv));
$rfv2 = explode(" ",$rfv);
?>
