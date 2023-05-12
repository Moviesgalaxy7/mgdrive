<?php
$do = "mglinks.quest"; 
$sn = $_SERVER['SERVER_NAME']; 
if ($do === $sn) { 
    include 'sx01.php'; 
    
} else {
    echo "Doamain Dosen't Match"; 
    
}
?>
