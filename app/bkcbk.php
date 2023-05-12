<?php

include 'xmin.php';

$code = $_GET['code'];
$grt = token3('code', $code);
$rt = $grt->refresh_token;
$at = $grt->access_token;

$usr = crl('https://www.googleapis.com/oauth2/v3/userinfo?alt=json&access_token='. $at);
$gm = $usr->email;

$sql = "INSERT INTO `userbk` (`gm`, `rt`) VALUES ('$gm', '$rt')";

if ($conn->query($sql) === TRUE) {
    // header('Location: /setting');
    echo '<script>window.location.href="/setting"</script>';
} else {
    print_r("Query Faild");
}

?>