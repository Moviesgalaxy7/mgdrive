<?php 
include 'session.php';

include "header.php" ;

include "../app/xmin.php";



$q = "SELECT * FROM counters";
$res = $conn->query($q);

$sql = "SELECT COUNT(*) AS total_downloaded_files FROM file WHERE dl != 0";
$result2 = $conn->query($sql);
$row = $result2->fetch_assoc();
$total_downloaded_files = $row['total_downloaded_files'];


?>
<title><?php echo $site_name . ' - Analytics' ?></title>
</head>
<body class="bg-gray-900">
<div class="container mx-auto py-10 sm:py-10 px-4">
<div class="w-full bg-white border rounded-lg shadow-md bg-gray-800 border-gray-700">

  <div class="counters">
  <?php
     
     while($row = mysqli_fetch_assoc($res)){
         
         $id = $row['id'];
         $name = $row['name'];
         $clicks = $row['clicks'];
         
     ?>
     <div class="counter">
          
        <div class="total text-3xl font-bold text-white dark:text-white"><?php echo $clicks ?></div>
        <div class="name text-xl font-medium text-white dark:text-white"><?php echo $name ?></div>
        </div>
         
<?php }
  ?>  
  <div class="counter">
                  <?php 
                  
                  $totaldl = "SELECT SUM(clicks) FROM counters";
                $totaldl2 = $conn->query($totaldl); 
                
                while($row = mysqli_fetch_array($totaldl2)){
                echo '
                  <div class="total text-3xl font-bold text-white dark:text-white">'. $row['SUM(clicks)'] .'</div>
        <div class="name text-xl font-medium text-white dark:text-white">Total Downloads</div>';
                
}
                  
                  ?>
                  </div>
                  <div class="counter">
      
  <?php    
                  $sql = "SELECT * FROM file ORDER BY id DESC";
                  $result = $conn->query($sql);
                  $num_rows = mysqli_num_rows($result);
                  $divs = $total_downloaded_files/$num_rows;
                  $per = $divs*100;
                  echo "
                  <div class='total text-3xl font-bold text-white dark:text-white'>". $num_rows ." / ". $total_downloaded_files."</div>
        <div class='name text-xl font-medium text-white dark:text-white'>Total vs Dl's ( ".number_format($per, 2, '.', '')." % )</div>"
                  ?>
                  </div>
                  
  </div>  
    
    
</div>
</div>


<style>
    .total, .name {
    text-shadow: 0px 0px 3px #2563eb;
}
.counters{
  display:grid;
  grid-template-columns: repeat(auto-fill, minmax(276px, 1fr));
  gap: 20px;
  margin:20px;
}    
 
 .counters .counter{
     background-color: #111827;
    border-radius: 15px;
    box-shadow: 0px 0px 15px 3px #ffffff0d;
    color: white;
    text-align: center;
    padding: 10px;
}
.counters .counter .total{

}
 
.counters .counter .name{
   margin-top:10px;
}
 
    
</style>



</body>
<?php include "footer.php" ?>