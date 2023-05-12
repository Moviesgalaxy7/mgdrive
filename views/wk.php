<?php 
if (
    strpos($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) !== false
   )
{
include "../app/xmin.php";

$sid = $_SERVER['REQUEST_URI'];
$sid = substr($sid,4);
$flk = fdb2($sid);
$fid = $flk->gd;
$fnm = $flk->nm;
$atk = rud2();
$drv = td($atk);
$tds = array_rand($drv['drives']);
$utd = $drv['drives'][$tds]['id'];
$cfi = fc($fid, $utd, $atk);
$gdu = $cfi->id;
$fpa = fp($gdu,'anyone',$atk);
$rwk = rwk();
$hv = $gdu."/".$atk;
$hv = base64_encode($hv);
$hv = base64_encode($hv);
$hv = base64_encode($hv);
$hv = base64_encode($hv);
$chv = base64_encode($hv);

$url = $rwk.$chv.'/'.$fnm;
// header('Location: '.$url);
echo '
<script>
window.location.href="'.$url.'"
</script>
';
// echo $url
}
else {
        header('Location: /404');
        exit;
    }
?>