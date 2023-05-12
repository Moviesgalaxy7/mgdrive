<?php 

include 'session.php';
include 'header.php';
include "../app/xmin.php";

if(isset($_GET['d'])){
    $id = $_GET['d'];
    $sql = "DELETE from contact_form WHERE id=$id";
    if($res = $conn->query($sql) == TRUE){
        
    }
    else {
        echo 'Query Failed';
    }
}
if(isset($_GET['r'])){
    $r = $_GET['r'];

    $sql = "UPDATE contact_form SET `r`= '1' WHERE id=$r";
    if($res = $conn->query($sql) == TRUE){
        
    }
    else {
        echo 'Query Failed';
    }
    
}
if(isset($_GET['u'])){
    $u = $_GET['u'];

    $sql = "UPDATE contact_form SET `r`= '0' WHERE id=$u";
    if($res = $conn->query($sql) == TRUE){
        
    }
    else {
        echo 'Query Failed';
    }
    
}
if(isset($_POST['ra'])){
    $chk = $_POST['chk'];
    $chki = implode(',' , $chk);

    $sql = "UPDATE contact_form SET `r` = '1' WHERE id IN($chki)";
    $conn->query($sql);
    
}

if(isset($_POST['ua'])){
    $chk = $_POST['chk'];
    $chki = implode(',' , $chk);

    $sql = "UPDATE contact_form SET `r` = '0' WHERE id IN($chki)";
    $conn->query($sql);
}
if(isset($_POST['da'])){
    $chk = $_POST['chk'];
    $chki = implode(',' , $chk);

    $sql = "DELETE from contact_form WHERE id IN($chki)";
    $conn->query($sql);
}
if(isset($_POST['s_mssg'])){
                    $smssg = $_POST['s_mssg'];
}
?>
<title><?php echo $site_name . ' - Messages' ?></title>
</head>
<body class="bg-gray-900">
    <div class="container mx-auto py-10 sm:py-10 px-4">
        <h3 class="text-2xl font-semibold  text-white mb-5">Messages</h3>
        
    <?php 
      if($t_mssg == '0'){
          ?>
          <div style="min-height: 60vh;" class="flex">
          <div class="flex p-5 rounded-lg flex-col lg:flex-row lg:items-center max-w-lg m-auto justify-center bg-gradient-to-b from-gray-900 via-blue-900 to-gray-900">
        <img class="max-w-1 p-20 lg:p-10 h-full" src="data:image/png;base64,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">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 lg:text-2xl text-xl lg:text-left text-center font-bold tracking-tight text-white">No Message to display</h5>
        <p class="mb-3 lg:text-left text-center font-normal text-gray-400">Maybe you just deleted or you haven't any message yet.</p>
    </div>
</div>
</div>
          <?php
      }else{
      ?>
    <div class="flex flex-wrap items-center justify-between pb-4 bg-gray-900">
        <div>
            <form method="POST" action="">
            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-3 py-1.5 bg-gray-800 text-gray-400 border-gray-600 hover:bg-gray-700 hover:border-gray-600 focus:ring-gray-700" type="button">
                <span class="sr-only">Action button</span>
                Action
                <svg class="w-3 h-3 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownAction" class="z-10 hidden divide-y rounded-lg shadow w-44 bg-gray-700 divide-gray-600">
                <ul class="py-1 text-sm text-gray-200" aria-labelledby="dropdownActionButton">
                    <li>
                        <button type="submit" method="POST" name="ra" class="block w-full text-left px-4 py-2 hover:bg-gray-600 hover:text-white">Read</button>
                    </li>
                    <li>
                        <button type="submit" method="POST" name="ua" class="block w-full text-left px-4 py-2 hover:bg-gray-600 hover:text-white">Unread</button>
                    </li>
                </ul>
                <div class="py-1">
                    <button type="submit" method="POST" name="da" class="w-full text-white text-left px-4 py-2 hover:bg-gray-600 hover:text-white">Delete</button>
                </div>
            </div>
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-2">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search-users" autocomplete="off" name="s_mssg" class="block p-2 pl-10 text-sm border rounded-lg w-80 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" value="<?php echo $smssg ?>" placeholder="Wanna Search">
        </div>
    </div>
<div style="min-height:446px;" class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-400">
        <thead class="text-xs uppercase bg-gray-700 dtext-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Name / Mail
                </th>
                <th scope="col" class="px-6 py-3">
                    Subject
                </th>
                <th scope="col" class="px-6 py-3">
                    Message
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Read
                </th>
                <th scope="col" class="px-6 py-3">
                    Delete
                </th>
            </tr>
        </thead>
          <tbody>
            <?php 
                if(isset($_POST['s_mssg'])){
                    $smssg = $_POST['s_mssg'];
                    $sql = "SELECT * FROM contact_form WHERE name LIKE '%$smssg%' OR message LIKE '%$smssg%' OR subject LIKE '%$smssg%' ";
            $result = $conn->query($sql); 
                }
                else {
            $sql = "SELECT * FROM contact_form";
            $result = $conn->query($sql); 
                }
            while ($rows = $result->fetch_assoc()){
            $idr = $rows['id'];
            ?>
            <tr class="border-b <?php echo $rows['r'] == '0' ? 'bg-gray-800' : 'bg-gray-900'; ?> border-gray-700 hover:bg-gray-800">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="chk" name="chk[]" type="checkbox" value="<?php echo $rows['id'] ?>" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                        <label for="chk" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-6 py-4 whitespace-nowrap text-white">
                    <div class="pl-3">
                        <div class="text-base font-semibold"><?php echo $rows['name'] ?></div>
                        <div class="font-normal text-gray-500"><?php echo $rows['email'] ?></div>
                    </div>  
                </th>
                <td class="px-6 py-4">
                    <?php echo $rows['subject'] ?>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <?php echo $rows['message'] ?>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <?php echo $rows['date'] ?>
                </td>
                <td class="px-6 py-4">
                     <a href="<?php echo $rows['r'] == '0' ? '?r='.$idr."" : '?u='.$idr."" ; ?>" class="font-medium text-blue-500 hover:underline">
                         <?php echo $rows['r'] == '0' ?
                         '<img class="m-auto w-7" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABgElEQVR4nO2XXS5DURRGL+KR9qnEE2IYIszBAJAwGq25aCodghA06ncKGABelpzYD1finh853T2JvR5vVm/2l/Z83aeqDMMwDMMoD2AROAeuc7qqAHPAgG+ugJlYtyoJoCuDvQEbuVxVgD0Z7BPYyeWqAmwC7zLcUS5XFWAVeJHBjnO5qgALwK0MNnQHOIerCjALnMpgD0Arh6sO0EtoqJ411KSwhioFaZ1xQkONS22ofkJD9a2hJoXtUP92hwIugRGw/NehG25u9zLYINBQ0a4XCeF4zBFGbm5n8s47N2gONwjQkZc4noGV8Ke87ztJ2KGiXdUwwH7CLS/aVQ0jO9RHwi0vylUNA6wlNFS0qxqm6B2KyDDSOrE7VLSbFVfFUsmN1VxrnVdgHZgHdoF2yK00wRMGOJTn7tBuyTMXAvn5dHyuOvwSBtiW2nQc1Nx27Qy4f+ulJreEME/yB+boBs6X150K/BzQ2zop7jS/mRFwEdqLxL2JcQ3DMAzDqPLwBbBv1Mq2+Y/wAAAAAElFTkSuQmCC">'
                         : '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0,0,256,256" style="fill:#000000;" class="m-auto w-7">
<g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M12,2c-5.511,0 -10,4.489 -10,10c0,5.511 4.489,10 10,10c5.511,0 10,-4.489 10,-10c0,-5.511 -4.489,-10 -10,-10zM12,4c4.43012,0 8,3.56988 8,8c0,4.43012 -3.56988,8 -8,8c-4.43012,0 -8,-3.56988 -8,-8c0,-4.43012 3.56988,-8 8,-8zM8.70703,7.29297l-1.41406,1.41406l3.29297,3.29297l-3.29297,3.29297l1.41406,1.41406l3.29297,-3.29297l3.29297,3.29297l1.41406,-1.41406l-3.29297,-3.29297l3.29297,-3.29297l-1.41406,-1.41406l-3.29297,3.29297z"></path></g></g>
</svg>'; ?>
                         
                     </a>
                </td>
                <td class="px-6 py-4">
                     <a href="/messages?d=<?php echo $rows['id'] ?>" class="font-medium text-blue-500 hover:underline">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </form>
    <?php } ?>
</div>

    </div>
</body>

<?php include 'footer.php'; ?>