<?php 
session_start();

if(isset($_SESSION['user'])){
  header("location: upload");
  die();
}
include "header.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $un = mysqli_real_escape_string($conn,$_POST['username']);
    $pw = mysqli_real_escape_string($conn,$_POST['password']);
    $sql = "SELECT * FROM ad WHERE un = '$un' and pw = '$pw'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
    $cou = mysqli_num_rows($res);
    if($cou == 1) {
        $_SESSION['user'] = $un;
        // header("location: upload");
        echo '<script>window.location.href="/upload"</script>';
    } else {
        
                $error = error('! Incrorrect Username Or Password. ', 'Try again.', '/signin');
            }
}
?> 
<title><?php echo $site_name . ' - Login' ?></title>
</head>
<body class="bg-gray-900">
  <div class="container px-4 mx-auto py-24 mt-3 max-w-sm ">
    <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm p-4 sm:p-6 lg:p-8 bg-gray-800 border-gray-700">
      <form class="space-y-6" action = "" method = "post">
        <h3 class="text-xl font-medium text-white">Sign in to our platform</h3>
        <div>
          <label for="email" class="text-sm font-medium text-gray-900 block mb-2 text-gray-300 uppercase">Username</label>
          <input name="username" placeholder="name@company.com" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required="">
        </div>
        <div>
          <label for="password" class="text-sm font-medium text-gray-900 block mb-2 text-gray-300 uppercase">password</label>
          <input type="password" name="password" placeholder="••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required="">
        </div>
        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Login to your account</button>
      </form>
    <?php if (isset($error) && !empty($error)) { echo $error; }  ?>
    </div>
  </div>
</body>

<?php include "footer.php" ?> 
