<?php 

// include 'session.php';
include $_SERVER["DOCUMENT_ROOT"]."/app/xcf.php";
include $_SERVER["DOCUMENT_ROOT"]."/app/pre.php";
if(!isset($_SESSION)){
session_start(); 
}
if($pub == '1' or $_SESSION['sess'] == '1'){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$sql = "SELECT * FROM contact_form WHERE r='0' ";
$sql1 = "SELECT * FROM contact_form";
$result = $conn->query($sql); 
$result1 = $conn->query($sql1); 
// $rows = $result->fetch_assoc();
$u_mssg = mysqli_num_rows($result);
$t_mssg = mysqli_num_rows($result1);
if (empty($t_mssg)){
    $t_mssg = '0';
}

?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="/asset/web/favicon-16.png">
  <link rel="icon" type="image/x-icon" href="/asset/web/favicon-32.png">
  <link rel="stylesheet" href="../asset/tw.css">
  <link rel="stylesheet" href="../asset/fa.css">
  <link rel="stylesheet" href="../asset/style_v11.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="../asset/scriptjs_v5.js"></script>
  <script src="../asset/tw.js"></script>
  <script src="../asset/fb.js"></script>
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZGDGN85RRT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZGDGN85RRT');
</script>
<body>
<nav class="bg-white border-gray-200 rounded-lg mx-auto mt-4 px-2 sm:px-5 py-2.5 bg-gray-800" style="max-width: 95.0095%;">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href="/" class="flex items-center">
        <img src="../asset/main_logo.svg" class="h-6 mr-3 sm:h-9"/>
        <span class="self-center text-xl font-semibold whitespace-nowrap text-white"><?php echo $site_name; ?></span>
    </a>
    <div>
        <?php if(!empty($_SESSION['user'])):?>
        <button type="button" onclick="window.location.href='/messages'" class="relative md:hidden inline-flex items-center p-3 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none bg-gray-900 hover:bg-gray-700 focus:ring-gray-900">
  <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
  <span class="sr-only">Notifications</span>
  <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 rounded-full -top-2 -right-2 border-gray-800"><?php echo $u_mssg; ?></div>
</button>
    <?php endif; ?>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 text-gray-400 hover:bg-gray-700 focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    </div>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <?php if(!empty($_SESSION['user'])):?>
      <ul class="flex flex-col p-4 lg:p-0 lg:items-center mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white bg-gray-900 md:bg-gray-800 border-gray-700">
        <li>
          <a href="../upload" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent" aria-current="page">Upload</a>
        </li>
        <li>
          <a href="../folder" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent" aria-current="page">Folder Upload</a>
        </li>
        <li>
          <a href="../all-files" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent">All Files</a>
        </li>
        <li>
          <a href="../gmail" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Gmail Ac.</a>
        </li>
        <li>
          <a href="../team-drive" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Team Drive</a>
        </li>
        <!--<li>-->
        <!--  <a href="../backup" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Backup Ac.</a>-->
        <!--</li>-->
        
        <li>
          <a href="../analytics" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Analytics</a>
        </li>
        
    
        <li>
          <a href="../worker" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Workers</a>
        </li>
        <li>
          <a href="../setting" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Setting</a>
        </li>
        <li>
          <a href="../signout" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Sign Out</a>
        </li>
        <li class="hidden md:block">
        <button type="button" onclick="window.location.href='/messages'" class="relative inline-flex items-center p-3 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none bg-gray-900 hover:bg-gray-700 focus:ring-gray-900">
  <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
  <span class="sr-only">Notifications</span>
  <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 rounded-full -top-2 -right-2 border-gray-800"><?php echo $u_mssg; ?></div>
</button></li>
</ul>
        <?php else:?>
<ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white bg-gray-900 md:bg-gray-800 border-gray-700">
        <li>
          <a href="../signin" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent" aria-current="page">Sign in</a>
        </li>
        <li>
          <a href="../about" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent">About Us</a>
        </li>
        <li>
          <a href="../privacy" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Privacy Policy</a>
        </li>
        <li>
          <a href="../term" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Term & Condition</a>
        </li>
        <li>
          <a href="../contact" class="block py-2 pl-3 pr-4  rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Contact</a>
        </li>
        <?php endif;?>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>