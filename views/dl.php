<?php 
// ini_set('display_errors', 1);
//     ini_set('display_startup_errors', 1);
//     error_reporting(E_ALL);
die('ee');
if (
    strpos($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) !== false
   )
{
include "../app/xmin.php";

$sid = $_SERVER['REQUEST_URI'];
$sid = substr($sid,4);
$flk = fdb2($sid);
$fid = $flk->gd;
$atk = rud2();
$drv = td($atk);
$tds = array_rand($drv['drives']);
$utd = $drv['drives'][$tds]['id'];
$cfi = fc($fid, $utd, $atk);
$gdu = $cfi->id;
$fpa = fp($gdu,'anyone',$atk);
$url23 = "https://drive.google.com/uc?id=".$gdu;
header('Location: '.$url23);
// echo '
// <script>
// window.location.href="'.$url23.'"
// </script>
// ';
// var_dump($atk);
}
else {
        header('Location: /404');
        exit;
    }
?>