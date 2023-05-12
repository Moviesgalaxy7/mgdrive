<?php 
include "../app/xmin.php";
$sid = $_SERVER['REQUEST_URI'];
$sid = substr($sid,6);
$fil = fdb($sid);
include "header.php";
if (!isset($fil)) {
    header('Location: 404');
}
if(isset($_SESSION['user'])){
    $rfs = '0';
}
  else  if ($rfs == '1') {
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'Err';
    foreach ($rfv2 as $rfv3){
        
    if (strpos($referer, $rfv3) !== false )
    {
        $rft = 'true';
        header('Location: '. 'https://' . $_SERVER['SERVER_NAME'] .'/download/?id='.$fil->turl);
        break;
    }else 
    {
        $rft = 'false';
        header('Location: /404');
        exit;
    }
}
}
//header('Location: '. 'https://' . $_SERVER['SERVER_NAME'] .'/download/?id='.$fil->turl);
$url = 'https://' . $_SERVER['SERVER_NAME'] .'/download/?id='.$fil->turl;

echo '<script>window.location.href="'.$url.'"</script>';
?> 
<title><?php echo $site_name .' - '. $fil->nm ?></title>
</head>
<body class="bg-gray-900">
  <div class="container mx-auto py-10 sm:py-20 px-4">
    <div class="py-4 sm:px-6 px-4  bg-white rounded-lg shadow-md bg-gray-800">
      <div class="mt-2">
        <p class="text-2xl font-semiboldtext-gray-700 text-white hover:text-gray-600 hover:text-gray-200 " style="display:inline; white-space:nowrap;" tabindex="0">
          <svg xmlns="http://www.w3.org/2000/svg" style="display:inline; margin-bottom:6px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
          </svg> File Information
        </p>
        <hr class="my-5 h-px bg-gray-200 border-0 bg-gray-700">
        <div class="m-2">
          <h1 class="mt-2 break-words font-medium text-gray-300">Name : <?php echo $fil->nm ?></h1>
          <hr class="my-3 h-px bg-gray-200 border-0 bg-gray-700">
          <h2 class="mt-2 font-medium text-gray-300">Size : <?php echo fb($fil->sz) ?></h2>
          <hr class="my-3 h-px bg-gray-200 border-0 bg-gray-700">
          <h2 class="mt-2 font-medium text-gray-300">Format : <?php echo $fil->mt ?></h2>
          <hr class="my-3 h-px bg-gray-200 border-0 bg-gray-700">
          <h2 class="mt-2 font-medium text-gray-300">Added : <?php echo tms($fil->tm) ?></h2>
        </div>
        <hr class="my-6 h-1 bg-gray-200 rounded border-0 bg-gray-700">
        <div class="mx-auto">
          <center>
            
            
            <button type="button" onclick="location.href='../wk/<?php echo $sid ?>'; analytics('Cloud Direct')" class="text-base text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 focus:ring-red-400 font-medium rounded-md text-sm px-2.5 py-1.5 text-center mr-2 mb-2">
              <svg xmlns="http://www.w3.org/2000/svg" style="display:inline" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
            </svg> Cloud Direct </button>
          
          
            <button type="button" onclick="location.href='../dl/<?php echo $sid ?>'; analytics('Google Drive Direct')" class="text-white text-base bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 focus:ring-blue-800 font-medium rounded-md text-sm px-3 py-1.5 text-center m-2 mb-2">
              <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="IconChangeColor" style="display:inline" class="w-6 h-6">
                <title>Google Drive</title>
                <path d="M12.01 1.485c-2.082 0-3.754.02-3.743.047.01.02 1.708 3.001 3.774 6.62l3.76 6.574h3.76c2.081 0 3.753-.02 3.742-.047-.005-.02-1.708-3.001-3.775-6.62l-3.76-6.574zm-4.76 1.73a789.828 789.861 0 0 0-3.63 6.319L0 15.868l1.89 3.298 1.885 3.297 3.62-6.335 3.618-6.33-1.88-3.287C8.1 4.704 7.255 3.22 7.25 3.214zm2.259 12.653-.203.348c-.114.198-.96 1.672-1.88 3.287a423.93 423.948 0 0 1-1.698 2.97c-.01.026 3.24.042 7.222.042h7.244l1.796-3.157c.992-1.734 1.85-3.23 1.906-3.323l.104-.167h-7.249z" id="mainIconPathAttribute" stroke-width="0" stroke="#ff0000" fill="#ffffff" filter="url(#shadow)"></path>
                <filter id="shadow">
                  <feDropShadow id="shadowValue" stdDeviation=".5" dx="0" dy="0" flood-color="black"></feDropShadow>
                </filter>
                <filter id="shadow">
                  <feDropShadow id="shadowValue" stdDeviation=".5" dx="0" dy="0" flood-color="black"></feDropShadow>
                </filter>
            </svg> Google Drive Direct </button>
              
              
              
              <button type="button" onclick="location.href='../gdl/<?php echo $sid ?>'; analytics('Google Drive Direct 2')" class="text-white text-base bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 focus:ring-blue-800 font-medium rounded-md text-sm px-3 py-1.5 text-center m-2 mb-2">
              <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="IconChangeColor" style="display:inline" class="w-6 h-6">
                <title>Google Drive</title>
                <path d="M12.01 1.485c-2.082 0-3.754.02-3.743.047.01.02 1.708 3.001 3.774 6.62l3.76 6.574h3.76c2.081 0 3.753-.02 3.742-.047-.005-.02-1.708-3.001-3.775-6.62l-3.76-6.574zm-4.76 1.73a789.828 789.861 0 0 0-3.63 6.319L0 15.868l1.89 3.298 1.885 3.297 3.62-6.335 3.618-6.33-1.88-3.287C8.1 4.704 7.255 3.22 7.25 3.214zm2.259 12.653-.203.348c-.114.198-.96 1.672-1.88 3.287a423.93 423.948 0 0 1-1.698 2.97c-.01.026 3.24.042 7.222.042h7.244l1.796-3.157c.992-1.734 1.85-3.23 1.906-3.323l.104-.167h-7.249z" id="mainIconPathAttribute" stroke-width="0" stroke="#ff0000" fill="#ffffff" filter="url(#shadow)"></path>
                <filter id="shadow">
                  <feDropShadow id="shadowValue" stdDeviation=".5" dx="0" dy="0" flood-color="black"></feDropShadow>
                </filter>
                <filter id="shadow">
                  <feDropShadow id="shadowValue" stdDeviation=".5" dx="0" dy="0" flood-color="black"></feDropShadow>
                </filter>
              </svg> Google Drive Direct 2</button>
              
              
              
          </center>
        </div>
      </div>
    </div>
  </div>
  
  
  <script>
  
    function analytics(token){
        
        console.log("start");
        
         var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(xhttp.responseText);
                }
            };
            let url = "../add_analytics.php?token=" + token;
            xhttp.open("GET", url, true);
            xhttp.send();
        
    }
    
  </script>
  
  
  
</body> <?php include "footer.php" ?>