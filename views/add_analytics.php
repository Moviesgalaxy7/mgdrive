<?php 

include "../app/xmin.php";

if (isset($_GET['token'])) {

    $token = $_GET['token'];

    $tokenCheck = "SELECT `clicks` FROM `counters` WHERE `name`='$token'";
    $tokenFire = mysqli_query($conn, $tokenCheck);

    if (mysqli_num_rows($tokenFire) > 0) {

        $row = mysqli_fetch_assoc($tokenFire);
        $clicks = $row['clicks'];
        $clicks += 1;
        
        $q = "UPDATE `counters` SET `clicks`='$clicks' WHERE `name`='$token'";
        
        $result = mysqli_query($conn, $q);
        
        if ($result) {
            echo "1";
        } else {
            echo "0";
        }
        
    } else {

        $insert = "INSERT INTO `counters`(`name`,`clicks`) VALUES ('$token','1')";
        $insertnew = mysqli_query($conn, $insert);
        
        if ($insertnew) {
            echo "1";
        } else {
            echo "0";
        }
    }
}
if (isset($_GET['turl'])) {
    
    $turl = $_GET['turl'];
    if (!empty($token)){
        $dlc = 1;
    }
    $fdlc = "SELECT `dl` FROM `file` WHERE `turl`='$turl'";
    $res = mysqli_query($conn, $fdlc);
    $row = mysqli_fetch_assoc($res);
    $dl = $row['dl'];
    $dlc2 = $dlc + $dl;
    $q = "UPDATE `file` SET `dl`='$dlc2' WHERE `turl`='$turl'";
        
        $result = mysqli_query($conn, $q);
    
}
?>
