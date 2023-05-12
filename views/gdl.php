<?php 
if (
    strpos($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) !== false
   )
{
include "../app/xmin.php";

$sid = $_SERVER['REQUEST_URI'];
$sid = substr($sid,5);
$flk = fdb2($sid);
$fid = $flk->gd;
$atk = rud('access');
$cfi = fc2($fid, $atk);
$cfu = $cfi->id;
$fpa = fp($cfu,'anyone',$atk);
$url = "https://drive.google.com/uc?id=".$cfu;
// header('Location: '.$url);
echo '
<script>
window.location.href="'.$url.'"
</script>
';

// var_dump($url);

// print_r($cfi);
}
else {
        header('Location: /404');
        exit;
    }
?>