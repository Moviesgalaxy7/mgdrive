<?php 

include 'session.php';

include "header.php" ;

include "../app/xmin.php";



if(isset($_POST['generate_link_btn'])){

  

$sql = "SELECT * FROM file";

$result = $conn->query($sql); 



$rows = $result->fetch_assoc();



while($row = $result->fetch_assoc()){

    

    $temp_link_id = md5($row['nm'] . rand(10,100));

    

    $update_sql = "UPDATE file SET turl='".$temp_link_id."' WHERE id='".$row['id']."'";

    $conn->query($update_sql); 

}

}



else if(isset($_POST['replace-btn'])){

    

    $on = $_POST['old-name'];

    $nn = $_POST['new-name'];

    

    // Define the UPDATE query

$sql = "UPDATE file SET nm = REPLACE(nm, '$on', '$nn')";



// Execute the UPDATE query and get the number of affected rows

if (mysqli_query($conn, $sql)) {

    $rwf = mysqli_affected_rows($conn);

    

    echo '<div id="alert-border-2" class="flex p-4 mx-8 mt-4 border-t-4 text-red-400 bg-gray-800 border-red-800" role="alert">

    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>

    <div class="ml-3 text-sm font-medium">

      '. $rwf . ' - Renamed Successfully.

    </div>

    <button type="button" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 inline-flex h-8 w-8 bg-gray-800 text-red-400 hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">

      <span class="sr-only">Dismiss</span>

      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>

    </button>

</div>';

// header('Location: /setting');

} else {

    echo "Error executing query: " . mysqli_error($conn);

}

    

}



else if(isset($_POST['update-crd'])){

    $ncl = $_POST['cl'];

    $ncs = $_POST['cs'];

    $ncl2 = $_POST['cl2'];

    $ncs2 = $_POST['cs2'];

    $ncl3 = $_POST['cl3'];

    $ncs3 = $_POST['cs3'];

    $sname = $_POST['sname'];

    $smail = $_POST['smail'];

    

    

   $sql = "UPDATE `sc` SET `CL` = '$ncl', `CS` = '$ncs', `CL2` = '$ncl', `CS2` = '$ncs2', `CL3` = '$ncl3', `CS3` = '$ncs3', `sname` = '$sname', `smail` = '$smail' WHERE 1";

            if ($conn->query($sql) === TRUE) {

                 echo '

                 <div class="mt-5 px-20">

                 <div id="alert-3" class="flex p-4 rounded-lg bg-gray-800 text-green-400" role="alert">

  <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>

  <span class="sr-only">Info</span>

  <div class="ml-3 text-sm font-medium">

    Credentials Updated Successfully.

  </div>

  <button type="button" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 inline-flex h-8 w-8 bg-gray-800 text-green-400 hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">

    <span class="sr-only">Close</span>

    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>

  </button>

</div></div>';

                // header('Location: /setting');

            } else {

                print_r("Query Faild");

            }

    

}

else if(isset($_POST['save_adv'])){

    $sess = $_POST['sessional'];

    $pub = $_POST['public'];

    

    if($sess == '1'){

        $_SESSION['sess'] = '1';

    } else

    {

        $_SESSION['sess'] = '0';

    }



    if($pub == '1'){

        $sql = "UPDATE `sc` SET `php_err` = '1' WHERE 1";

            $conn->query($sql);

    } 

    else {

                $sql = "UPDATE `sc` SET `php_err` = '0' WHERE 1";

                $conn->query($sql);

            }

            echo '

            <script>

            window.location.href= "/setting";

            </script>';

    }

    

else if (isset($_POST['save_ref'])){

    if(isset($_POST['ref_status']) == '1'){

        $ref_st = $_POST['ref_status'] = '1';

    }

    else {

        $ref_st = '0';

    }

    $val = $_POST['ref_val'];

    $val2 = preg_replace('#\s+#',',',trim($val));

    $values = mysqli_real_escape_string($conn, $val2);

    // echo $values;

    $sql = "UPDATE `sc` SET `ref_val` = '$values', `ref_status` = '$ref_st' WHERE 1";

    if($conn->query($sql) == TRUE){

        // echo 'Refreal Updated';

    }

    else {

        //  echo 'Refreal Updated Failed';

    }

    

    

}

else if (isset($_POST['s_ad_n'])){

        $cun = mysqli_real_escape_string($conn,$_POST['c_ad_un']);

        $cpw = mysqli_real_escape_string($conn,$_POST['c_ad_pw']);

        $sql = "INSERT INTO ad (un, pw, ed) VALUES ('$cun', '$cpw', '1')";

        if($conn->query($sql) == TRUE){

            // echo 'User Created';

        }else {

            // echo 'Error: '. mysqli_error($conn);

        }

}

else if (isset($_POST['up_ad'])){

        $id = $_POST['up_ad'];

        $upw = $_POST['ups'];

        $sql = "UPDATE ad SET pw = '$upw' WHERE id=$id";

        if($conn->query($sql) == TRUE){

            // echo 'User PWD Updated';

        }else {

            // echo 'Error: '. mysqli_error($conn);

        }

}

else if (isset($_POST['del_ad'])){

        $id = $_POST['del_ad'];

        $sql = "DELETE from ad WHERE id=$id";

        if($conn->query($sql) == TRUE){

            // echo 'User Deleted';

        }else {

            // echo 'Error: '. mysqli_error($conn);

        }

}

else{



        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $wkd = $_POST['wkd'];

            $wkds = preg_split('/[\n,]/', $_POST['wkd']);
            $wkds = array_map('trim', $wkds);

            foreach ($wkds as $wkd) {

            $sql = "INSERT INTO `worker` (`wk`, `st`) VALUES ('$wkd', 'online')";

            if ($conn->query($sql) === TRUE) {

                header('Location: /setting');

            } else {

                print_r("Query Faild");

            }

            }

        }

}

if($pub == '1'){

        $p_c = "checked";

    } 

    else {

         $p_c = "unchecked";

            }

            if(isset($_SESSION['sess']) && $_SESSION['sess'] == '1'){

        $s_c = "checked";

    } 

    else {

         $s_c = "unchecked";

            }

            $ref_c = " ";

            // echo $_SESSION['user'];

?>

<title><?php echo $site_name . ' - All Settings' ?></title>

</head>

<body class="bg-gray-900">

     <div class="container mx-auto py-10 sm:py-10 px-4">

<div class="w-full bg-white border rounded-lg shadow-md bg-gray-800 border-gray-700">

    <ul class="flex flex-wrap bg-gray-800 text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg border-gray-700 " id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">

        <li class="mr-2">

            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 rounded-tl-lg hover:text-gray-600 hover:bg-gray-900 hover:text-gray-300">Google Accounts</button>

        </li>

        <li class="mr-2">

            <button id="shared-tab" data-tabs-target="#shared" type="button" role="tab" aria-controls="shared" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-900 hover:text-gray-300">Team Drives</button>

        </li>

        <!--<li class="mr-2">-->

        <!--    <button id="backup-tab" data-tabs-target="#backup" type="button" role="tab" aria-controls="backup" aria-selected="false" class="inline-block p-4 text-blue-600 rounded-tl-lg bg-gray-800 hover:bg-gray-900 text-blue-500">Backup Accunts</button>-->

        <!--</li>-->

        <li class="mr-2">

            <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-900 hover:text-gray-300">Cloudflare Workers</button>

        </li>

        <li class="mr-2">

            <button id="templink-tab" data-tabs-target="#templink" type="button" role="tab" aria-controls="templink" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-900 hover:text-gray-300">Generate Temp Link</button>

        </li>

        <li class="mr-2">

            <button id="find-replace" data-tabs-target="#find-rep" type="button" role="tab" aria-controls="find-rep" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-900 hover:text-gray-300">Find / Replace</button>

        </li>

        <li class="mr-2">

                    <button id="sc-setting" data-tabs-target="#sc-set" type="button" role="tab" aria-controls="sc-set" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-900 hover:text-gray-300">Advanced</button>

                </li>

        

        

    </ul>

    <div id="defaultTabContent">

        <div class="hidden p-4 bg-white rounded-lg md:p-8 bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">

            <h3 class="text-2xl font-semibold  text-white mb-5">Google Drive Clone Account</h3>

            <ul role="list" class="space-y-4 text-gray-500 text-gray-400">

                <li class="flex items-center space-x-2">

                    <!-- Icon -->

                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>

                    <span class="leading-tight">Must Have Team Drive Added (You can't share files if Team Drive is missing.)</span>

                </li>

            </ul>

            <a href="<?php echo signup() ?>" class="mt-4  bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center focus:ring-gray-800 bg-white border-gray-700  hover:bg-gray-200 mr-2 mb-2">

              <svg viewBox="0 0 48 48" class="mr-2 -ml-1 w-6 h-6"> <clipPath id="g"> <path d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/> </clipPath> <g class="colors" clip-path="url(#g)"> <path fill="#FBBC05" d="M0 37V11l17 13z"/> <path fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/> <path fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/> <path fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/> </g> </svg>

              Add Clone Account

            </a>

        </div>

        <div class="hidden p-4 bg-white rounded-lg md:p-8 bg-gray-800" id="shared" role="tabpanel" aria-labelledby="shared-tab">

            <h3 class="text-2xl font-semibold  text-white mb-5">Team Drive Clone Account</h3>

            <ul role="list" class="space-y-4 text-gray-500 text-gray-400">

                <li class="flex items-center space-x-2">

                    <!-- Icon -->

                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>

                    <span class="leading-tight">Extend Download functionality with Team Drive (Worker won't work without it.)</span>

                </li>

            </ul>

            <a href="<?php echo signup2() ?>" class="mt-4  bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center focus:ring-gray-800 bg-white border-gray-700  hover:bg-gray-200 mr-2 mb-2">

              <svg viewBox="0 0 48 48" class="mr-2 -ml-1 w-6 h-6"> <clipPath id="g"> <path d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/> </clipPath> <g class="colors" clip-path="url(#g)"> <path fill="#FBBC05" d="M0 37V11l17 13z"/> <path fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/> <path fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/> <path fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/> </g> </svg>

              Add Shared Drive

            </a>

        </div>

        <!--<div class="hidden p-4 bg-white rounded-lg md:p-8 bg-gray-800" id="backup" role="tabpanel" aria-labelledby="backup-tab">-->

        <!--    <h3 class="text-2xl font-semibold  text-white mb-5">Add Backup Account</h3>-->

        <!--    <a href="<?php echo signup3() ?>" class="mt-4  bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center focus:ring-gray-800 bg-white border-gray-700  hover:bg-gray-200 mr-2 mb-2">-->

        <!--      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">-->

        <!--          <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />-->

        <!--        </svg> Add Backup Mail-->

        <!--    </a>-->

        <!--</div>-->

        <div class="hidden p-4 bg-white rounded-lg md:p-8 bg-gray-800" id="services" role="tabpanel" aria-labelledby="services-tab">

            <h3 class="text-2xl font-semibold  text-white mb-5">Add Cloudflare Workers Account</h3>

            <!-- List -->

            <form action = "" method = "post">

            <div class="form-group">

                <!--<input class="form-control block w-full px-3 py-1.5 text-base font-normal bg-gray-600 text-gray-300 bg-clip-padding border border-solid border-gray-600 rounded transition ease-in-out m-0 focus:focus:border-blue-600 focus:outline-none" name="wkd" placeholder="Enter Cloudflare Workers Link" required >-->

                <textarea name="wkd" rows="10" class="form-control block w-full px-3 py-1.5 text-base font-normal bg-gray-600 text-gray-300 bg-clip-padding border border-solid border-gray-600 rounded transition ease-in-out m-0 focus:focus:border-blue-600 focus:outline-none"  placeholder="Integrate Multiple Cloudflare Worker (/n)" required ></textarea>

                <ul role="list" class="space-y-4 text-gray-500 text-gray-400">

                <li class="flex items-center my-4 space-x-2">

                    <!-- Icon -->

                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>

                    <span class="leading-tight">Workers Deployed with Given Code will only work.</span>

                </li>

            </ul>

            </div>

            <button type="submit" class=" bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center focus:ring-gray-800 bg-white border-gray-700  hover:bg-gray-200 mr-2 mb-2">

              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="mr-2 -ml-1 w-6 h-6"><path d="M8.16 23h21.177v-5.86l-4.023-2.307-.694-.3-16.46.113z" fill="#fff"/><path d="M22.012 22.222c.197-.675.122-1.294-.206-1.754-.3-.422-.807-.666-1.416-.694l-11.545-.15c-.075 0-.14-.038-.178-.094s-.047-.13-.028-.206c.038-.113.15-.197.272-.206l11.648-.15c1.38-.066 2.88-1.182 3.404-2.55l.666-1.735a.38.38 0 0 0 .02-.225c-.75-3.395-3.78-5.927-7.4-5.927-3.34 0-6.17 2.157-7.184 5.15-.657-.488-1.5-.75-2.392-.666-1.604.16-2.9 1.444-3.048 3.048a3.58 3.58 0 0 0 .084 1.191A4.84 4.84 0 0 0 0 22.1c0 .234.02.47.047.703.02.113.113.197.225.197H21.58a.29.29 0 0 0 .272-.206l.16-.572z" fill="#f38020"/><path d="M25.688 14.803l-.32.01c-.075 0-.14.056-.17.13l-.45 1.566c-.197.675-.122 1.294.206 1.754.3.422.807.666 1.416.694l2.457.15c.075 0 .14.038.178.094s.047.14.028.206c-.038.113-.15.197-.272.206l-2.56.15c-1.388.066-2.88 1.182-3.404 2.55l-.188.478c-.038.094.028.188.13.188h8.797a.23.23 0 0 0 .225-.169A6.41 6.41 0 0 0 32 21.106a6.32 6.32 0 0 0-6.312-6.302" fill="#faae40"/></svg>

              Add Cloudflare Workers

            </button>

          </form>

        </div>

        

        <div class="hidden p-4 bg-white rounded-lg md:p-8 bg-gray-800" id="templink" role="tabpanel" aria-labelledby="templink-tab">

            <h3 class="text-2xl font-semibold  text-white mb-5">Generate New Temporary Link</h3>

            <ul role="list" class="space-y-4 text-gray-500 text-gray-400">

                <li class="flex items-center my-4 space-x-2">

                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>

                    <span class="leading-tight">Revoke all previously generated Temp Links. <span class="italic">(Revoked Temp Links results as 404)</span></span>

                </li>

            </ul>

            <form action = "" method = "post">

           

            

            <button type="submit" class=" bg-white border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center focus:ring-gray-800 bg-white border-gray-700  hover:bg-gray-200 mr-2 mb-2" name="generate_link_btn">

            <img class="w-[26px] mr-2" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEYUlEQVR4nO2ZzY8URRTAa2GTNbI7XdWzM69mJS5Zu98blgCLqwiJCZqYqBhvRPRGgn+BHhGOJGwC+xeA4SgbEj8uepYQvBATPWgwMYCE7HJYLiaw647k9fTs9sz2R1V3LzMoL6lMJ1NV/X5V77169VqI5/I/EAn4g9L0b1yTgN+LZ0Uk0N0kEAV4WzwL4rpeRWlqJYJoanEfMejigv9GCkTQXPAP9k3BSm3akxovjmqvltbPATqRBcJ90ubYAVN1pfFSpea9UiqEA7RLafwzVGRRgf9BUl+pcS4LRGo6lzTerfvvSI332oGB7vIClrcTm523JYEuCM8b6QJ+ea9SQD9mgXAf7tv1Is8bUUDzvf5VCkwCRLT97GpvOvALwKsK8HEmxEb0esxjeCzPwXOpxJBdAMYAImy4Yqx8gTlkXhgTW3/aTab4VqI0GrMvSsDf+q282ti1W7Xa9KjII06jOVuO6RSGWGVfEkVEajzTbxCp6QtRXI4MS43X+weB14UQ20sAaUew/pgYrpR2ILKoevNw30yrgW+WB6LxO0sFFqWmU86EPwOwbwc3Z8I7wLYepDh2u/JNKRBhArdq4ZhXqlUaS5qP/5OACzbmNZqRqMaKUlOOW28eUnX8VAKdl5p+soEQQgwZvGbIBkZqusG6sE6BbmrKSZyZr6AS6E4Be15M24nYCxjQUt73SaA7sdfmjFudyaqdMoVYXzyNpwsGg1b5IDV/vy0IB4CBA6nlyIPYFAcOpGrhHz2FisECcSb8mf+EackciV0JCWlrMwjQZQV00+q6WiD88lmggB7kehfwNZl1pcsprzgyrGD3HgV4XGk8K4GuGe8K4ILpgRjc8Y3npWusC+vE93vWUWx5igK4kFZJbO+EOYTiFKWB49aKl5I0Ai3xYec0mq9yWObGz4FP2JvT16VA9D2NrzcPlwbSrjuZm5eBs952NR3j4MCNn+NLT/htaRBBBTCleJYHorJz2u19zdhEs9oFA7Tk7vRfSlKLy7YS6K/2GHw/kyMsY5ZnKuB/nKSIAvwo7PdPlnJRaM6E0yEa9G7Rg7InCDzqRKA4Rdzw24oLeDJjfYcU0LIRCIddqfF+mRCdVeYbX7SYIQH/npycfCGAMahf8ZUhCqE0vpe8Gxq/3AqIcIF+CZ2ZYdYChTR9JYTYlgWhtH80HLPGz1n9BX9kMSpiB0om/Y+32O47nxCiEPwbHLZ12qs0PQznmk/TaWx8t98xKauLXFZFnotnDFzR9FpwB+/O0/6IFg3iIDr/OUBvRRbk88SihcZfw8h31TAVyoLBVT65e3OeIP2oNz/hT3QS6MNodOr4RC/E+tggt6O2yYSRLS43Y5g8d59NMBLw96rG103Hdi8CrsRBrMNo/Kxjrg7Q25ucG2iZzSsXRBeMxjkuttmMs4r3Iuh/Iez/sO0/ls69VcLRimEyw+SGbOMIFsIEEc3auQdGPG+Ez5ZIZFy2du5BEWlpkgMryt4kn4sYJHkC6GC+/6uQ7bAAAAAASUVORK5CYII=">

            Generate

            </button>

              

            

          </form>

        </div>

        <div class="hidden p-4 bg-white rounded-lg md:p-8 bg-gray-800" id="find-rep" role="tabpanel" aria-labelledby="find-replace">

            <h3 class="text-2xl font-semibold  text-white mb-5">Change Files Name (Batch)</h3>

        <ul role="list" class="space-y-4 text-gray-500 text-gray-400">

                <li class="flex items-center my-4 space-x-2">

                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>

                    <span class="leading-tight">Usage: Existing file name - New.Arrivals.2008.Thunder.com -> New file - New.Arrivals.2008.Hub.com <span class="italic">(Replaced Thunder.com to Hub.com in all files name)</span></span>

                </li>

            </ul>

            

            <form method="POST" action="">

    <div class="grid items-center md:mt-6 gap-6 mb-6 md:grid-cols-3">

        <div>

            <label for="old-name" class="block mb-2 text-sm font-medium text-white">Existing Name</label>

            <input type="text" name="old-name" id="old-name" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Old file name" required>

        </div>

        <div>

            <label for="new-name" class="block mb-2 text-sm font-medium text-white">New Name</label>

            <input type="text" name="new-name" id="new-name" class="border text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 " placeholder="Enter New file name" required>

        </div>

        <div class="md:mt-6">

            <button type="submit" name="replace-btn" class="text-white focus:ring-4 focus:outline-none ffont-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Replace</button>

</div>

        </form>

            

        </div>

        

    </div>

<div class="hidden p-4 bg-white rounded-lg md:p-8 bg-gray-800" id="sc-set" role="tabpanel" aria-labelledby="secret-setting">

           <div class="flex flex-col lg:flex-row">

               <div class="px-2 w-full">

            <div class="flex justify-between items-center mb-5"><h3 class="text-xl lg:text-2xl font-semibold  text-white">Site Credentials</h3>

            <label for="editable" class="lg:ml-10 relative inline-flex items-center cursor-pointer">

  <input id="editable" type="checkbox" value="" class="sr-only peer">

  <div class="w-11 h-6 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all border-gray-600 peer-checked:bg-blue-600"></div>

  <span class="ml-3 text-sm font-medium text-gray-300">Edit</span>

</label></div>

            <form id="form-creds" action="" method="POST">

        <fieldset class="mb-2 p-6 border-2 border-blue-900 rounded-lg shadow bg-gray-900"><legend><code class="rounded-md bg-gray-800 text-xs lg:text-sm text-pink-500 italic px-2 py-1.5"><?php echo $ru; ?></code></legend>

    <div class="grid gap-6 mb-6 md:grid-cols-2">

        <div>

            <label for="cl" class="block mb-2 text-sm font-medium text-white">Cliend ID</label>

            <input disabled value="<?php echo $cl; ?>" autocomplete="off" type="text" name="cl" id="cl" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Client ID" required>

        </div>

        <div>

            <label for="cs" class="block mb-2 text-sm font-medium text-white">Client Secret</label>

            <input disabled value="<?php echo $cs; ?>" autocomplete="off" type="text" name="cs" id="cs" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Client Secret" required>

        </div>

        </div>

        </fieldset>

        <fieldset class="mb-2 p-6 border-2 border-blue-900 rounded-lg shadow bg-gray-900" ><legend><code class="rounded-md bg-gray-800 text-xs lg:text-sm text-pink-500 italic px-2 py-1.5"><?php echo $ru2; ?></code></legend>

        <div class="grid gap-6 mb-6 md:grid-cols-2">

        <div>

            <label for="cl2" class="block mb-2 text-sm font-medium text-white">Cliend ID 2</label>

            <input disabled value="<?php echo $cl2; ?>" autocomplete="off" type="text" name="cl2" id="cl2" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Client ID" required>

        </div>

        <div>

            <label for="cs2" class="block mb-2 text-sm font-medium text-white">Client Secret 2</label>

            <input disabled value="<?php echo $cs2; ?>" autocomplete="off" type="text" name="cs2" id="cs2" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Client Secret" required>

        </div></div>

            </fieldset>

            <fieldset class="mb-2 p-6 border-2 border-blue-900 rounded-lg shadow bg-gray-900" ><legend><code class="rounded-md bg-gray-800 text-xs lg:text-sm text-pink-500 italic px-2 py-1.5"><?php echo $ru3; ?></code></legend>

        <div class="grid gap-6 mb-6 md:grid-cols-2">

        <div>

            <label for="cl3" class="block mb-2 text-sm font-medium text-white">Cliend ID 3</label>

            <input disabled value="<?php echo $cl3; ?>" autocomplete="off" type="text" name="cl3" id="cl3" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Client ID" required>

        </div>

        <div>

            <label for="cs3" class="block mb-2 text-sm font-medium text-white">Client Secret 3</label>

            <input disabled value="<?php echo $cs; ?>" autocomplete="off" type="text" name="cs3" id="cs3" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Client Secret" required>

        </div>

        </div>

        </fieldset>

        <div class="grid gap-6 my-6 md:grid-cols-2">

            <div class="grid gap-6 md:grid-cols-2">

        <div>

            <label for="sname" class="block mb-2 text-sm font-medium text-white">Site Name</label>

            <input disabled value="<?php echo $site_name; ?>" autocomplete="off" type="text" name="sname" id="sname" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Website Name" required>

        </div>

        <div>

            <label for="smail" class="block mb-2 text-sm font-medium text-white">Support @mail</label>

            <input disabled value="<?php echo $sup_mail; ?>" autocomplete="off" type="text" name="smail" id="smail" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Support Mail" required>

        </div>

        </div>

        <div class="grid items-end">

            <button disabled type="submit" id="update-crd" name="update-crd" class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Update</button>

        </div>

        </div>

        </form>

            </div>

            <!--2nd right sec-->

            <div class="px-2 w-full">

            <div class="flex justify-around items-center mb-5"><h3 class="text-xl lg:text-2xl font-semibold  text-white">Advanced Settings</h3>

            </div>

            <form id="advance" action="" method="POST">

        <fieldset class="mb-2 p-6 border-2 border-blue-900 rounded-lg shadow bg-gray-900"><legend><code class="rounded-md bg-gray-800 text-xs lg:text-sm text-pink-500 italic px-2 py-1.5">Php Error</code></legend>

    <div class="flex flex-col lg:flex-row justify-between">

        <div class="flex lg:mb-0 mb-2 flex-row items-center justify-between">

        <div>

            <label for="sessional" class="relative inline-flex items-center cursor-pointer">

  <input id="sessional" name="sessional" type="checkbox" value="1" class="sr-only peer" <?php echo $s_c; ?>>

  <div class="w-11 h-6 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all border-gray-600 peer-checked:bg-blue-600"></div>

  <span class="ml-3 text-sm font-medium text-gray-300">Sessional</span>

</label>

        </div>

        <div>

            <label for="public" class="lg:ml-4 relative inline-flex items-center cursor-pointer">

  <input id="public" name="public" type="checkbox" value="1" class="sr-only peer" <?php echo $p_c;?> >

  <div class="w-11 h-6 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all border-gray-600 peer-checked:bg-blue-600"></div>

  <span class="ml-3 text-sm font-medium text-gray-300">Public</span>

</label>

        </div>

        </div>

        <div class="grid items-end">

            <button type="submit" name="save_adv" class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Save</button>

        </div>

        </div>

        

        </fieldset>

        </form>

        <!--refrer field-->

        <form method="POST" action="" id="ref_form">

        <fieldset class="mb-2 p-6 border-2 border-blue-900 rounded-lg shadow bg-gray-900"><legend><code class="rounded-md bg-gray-800 text-xs lg:text-sm text-pink-500 italic px-2 py-1.5">Allowed Only</code></legend>

    <div class="flex flex-col lg:flex-row justify-between">

        <div class="flex w-full lg:mb-0 mb-2 flex-row items-center justify-between">

        <div class="w-full">

<textarea required id="message" rows="4" name="ref_val" class="p-2.5 w-full text-sm bg-gray-900 rounded-lg border focus:ring-blue-500 focus:border-blue-500 border-gray-600 placeholder-gray-400 text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Values should be seperated by (/n)"><?php echo $rfv; ?>

</textarea>



        </div>

        </div>

        <div class="flex md:flex-col md:ml-4 items-center justify-around">

            <label for="ref_status" class="relative inline-flex items-center cursor-pointer">

  <input id="ref_status" name="ref_status" type="checkbox" value="1" <?php echo $rfs  == '1' ? 'checked' : 'unchecked'; ?> class="sr-only peer" <?php echo $ref_c;?> >

  <div class="w-11 h-6 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all border-gray-600 peer-checked:bg-blue-600"></div>

</label>

            <button type="submit" name="save_ref" class="text-white md:ml-0 ml-4 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Save</button>

        </div>

        </div>

        

        </fieldset>

        </form>

        <!--users field-->

        <form method="POST" action="" id="user_form" class="overflow-x-auto">

        <fieldset class="mb-2 p-6 border-2 border-blue-900 rounded-lg shadow bg-gray-900"><legend><code class="rounded-md bg-gray-800 text-xs lg:text-sm text-pink-500 italic px-2 py-1.5">Users</code></legend>

    

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">

    <table class="w-full text-sm text-left text-gray-400">

        <thead class="text-xs uppercase bg-gray-800 text-gray-400">

            <tr>

                <th scope="col" class="min-w-[150px] px-6 py-3">

                    User

                </th>

                <th scope="col" class="min-w-[150px] px-6 py-3">

                    Pass

                </th>

                <th scope="col" class="px-6 py-3">

                    Update

                </th>

                <th scope="col" class="px-6 py-3">

                    Delete

                </th>

            </tr>

        </thead>

        <tbody>

            <?php

            $sqlv = "SELECT * from ad";

            $rsv = $conn->query($sqlv);

            

            while ($drs = $rsv->fetch_assoc()) {

            ?>

            <tr class="bg-gray-900 border-gray-700 border-b">

                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">

                    <?php echo $drs['un'] ?>

                </th>

                <td class="px-6 py-4">

                <input <?php echo $drs['ed'] == '0' ? 'disabled' : '' ?> value="<?php echo $drs['ed'] == '0' ? '•••••••••••••••••' : $drs['pw'] ?>" autocomplete="off" type="text" name="ups" id="ups" class="<?php echo $drs['ed'] == '0' ? 'cursor-no-drop' : '' ?> border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" required>

                </td>

                <td class="px-6 py-4 text-right">

                    <button <?php echo $drs['ed'] == '0' ? 'disabled' : '' ?> type="submit" name="up_ad" value="<?php echo $drs['id'] ?>" class="<?php echo $drs['ed'] == '0' ? 'cursor-no-drop' : '' ?> text-white md:ml-0 ml-4 focus:ring-2 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Update</button>

                </td>

                <td class="px-6 py-4 text-right">

                    <button <?php echo $drs['ed'] == '0' ? 'disabled' : '' ?> type="submit" name="del_ad" value="<?php echo $drs['id'] ?>" class="<?php echo $drs['ed'] == '0' ? 'cursor-no-drop' : '' ?> text-white md:ml-0 ml-4 focus:ring-2 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-2 text-center bg-red-600 hover:bg-red-700 focus:ring-red-800">Delete</button>

                </td>

                </tr>

                </form>

            <?php } ?>

            <form method="POST" action="" id="new_user_form">

            <tr class="bg-gray-900 border-gray-700">

                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">

                    <input placeholder="Username" autocomplete="off" type="text" name="c_ad_un" id="c_ad_un" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" required>

                </th>

                <td class="px-6 py-4">

                <input placeholder="Password" autocomplete="off" type="text" name="c_ad_pw" id="c_ad_pw" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" required>

                </td>

                <td colspan="2" class="px-6 py-4 text-right">

                    <button type="submit" name="s_ad_n" class="text-white lg:w-full md:ml-0 ml-4 focus:ring-2 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Create</button>

                </td>

                </tr>

                </form>

        </tbody>

    </table>

</div>



        </fieldset>

        </form>

            </div>

        </div><!--E flex-->

        </div>  

        

    </div>

</div>

</div>

<script>

    if ( window.history.replaceState ) {

  window.history.replaceState( null, null, window.location.href );

}

</script>

</body>

<?php include "footer.php" ?>