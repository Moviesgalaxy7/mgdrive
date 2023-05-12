<?php 
include 'session.php';
include "header.php" ;
include "../app/xmin.php";

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }
        
        if(isset($_GET['item'])){
            $_SESSION['item'] = $_GET['item'];
            $total_records_per_page = $_SESSION['item'];
        }
        
        if(isset($_SESSION['item']) AND is_numeric($_SESSION['item']))
        {
            $total_records_per_page = $_SESSION['item'];
        }
        else {
            $total_records_per_page = $_SESSION['item'] = 50;
        }
//         else {
// //  Total result per page       
// $total_records_per_page = $_SESSION['item'];
// $total_records_per_page = 50;   
            
//         }
//calc variales here
$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

$result_count = mysqli_query(
$conn,
"SELECT COUNT(*) As total_records FROM `file`"
);
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1

if(isset($_POST['del'])) {
    $id = $_POST['del'];
    $sql_nm = "SELECT nm FROM file WHERE id=$id";
    $d_nm = $conn->query($sql_nm);
    $row_nm = $d_nm->fetch_assoc();
    $d_nm2 = $row_nm['nm'];
    $sql = "DELETE FROM file WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        
        echo '<div id="alert-border-2" class="flex p-4 mx-8 mt-4 border-t-4 text-red-400 bg-gray-800 border-red-800" role="alert">
    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <div class="ml-3 text-sm font-medium">
      '. $d_nm2 . ' - Deleted Successfully.
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 inline-flex h-8 w-8 bg-gray-800 text-red-400 hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>';
header('Location: /all-files');
    }
}

if(isset($_POST['alldel_btn'])) {
    $Del_ids = $_POST['del_chk'];
    $e_ids = implode(',' , $Del_ids);
    // echo '<pre>';
    // var_dump($e_ids);
    // echo '</pre>';
    
    $sql = "DELETE FROM file WHERE id IN($e_ids)";
    if ($conn->query($sql) === TRUE) {
        echo '<div id="alert-border-2" class="flex p-4 mx-8 mt-4 border-t-4 text-red-400 bg-gray-800 border-red-800" role="alert">
    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <div class="ml-3 text-sm font-medium">
      Selected Files Deleted Successfully.
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 inline-flex h-8 w-8 bg-gray-800 text-red-400 hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>';
        header('Location: /all-files');
    }
}
if (isset($_POST['reload'])){
    $r_id = $_POST['reload'];
    $sql_ref = "SELECT gd FROM file WHERE id=$r_id";
    $f_gd = $conn->query($sql_ref);
    $f_id2 = $f_gd->fetch_assoc();
    $ref_id = $f_id2['gd'];
    // echo $ref_id;
    
    reload_id ($ref_id, $r_id);
    // header('Location: /all-files');
}
?>
<title><?php echo $site_name . ' - Shared Files' ?></title>
</head>
<body class="bg-gray-900">
    <!--search box here-->
   <div class="container mx-auto py-5 sm:py-5 px-4">
            <div id="form-search1" style="margin-bottom: 10px; text-align: right;">
                <!--<form method="get" action="">-->
                <!--    <input type="text" name="s" class="form-control" placeholder="Search..." value="" style="background-color: #111827; border-color: #374151; border-radius: 5px; color: #2563eb;">-->
                <!--    <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-2 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800" name="search_btn" value="Search" style="cursor: pointer;">-->
                <!--</form>-->
                
<form method="POST" action="">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="search" name="s" class="block w-full p-3 pl-10 text-sm border rounded-lg bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search..." required>
        <button type="submit" name="search_btn" class="text-white absolute right-2.5 bottom-[5px] focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Search</button>
    </div>
</form>

            </div>
             <?php 
                  
                  $sql = "SELECT * FROM file ORDER BY id DESC";
                  $result = $conn->query($sql);
                  $num_rows = mysqli_num_rows($result);
                  echo '
                  <div id="m_controls" class="mb-2">
                  <button type="submit" name="alldel_btn" method="POST" form="del_all_form" type="button" class="text-white font-medium border-2 p-[7px] hover:bg-black border-red-900 rounded-[5px] text-sm bg-transparent">
                  <img class="w-[20px]" src="/asset/delete_Sel.svg">
                  </button>
                  <div class="flex items-center">
                  <form id="item_per" method="GET" action="">
                  <input type="number" placeholder="Results: '.$_SESSION['item'].'" name="item" class="block w-full p-2 border rounded-sm mx-2 sm:text-xs bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" >
                  
                  </form>
                  <div class="py-1 bg-gray-800 text-white font-medium rounded-lg text-lg px-2 bg-grey-900" id="sh_count">
<img src="/asset/sh_cnt.svg" class="mr-2 w-[22px] h-[22px]"> '. $num_rows . ' </div>
                  </div>
                  </div>'
                  ?>
                  
                  
                  

    <div class="overflow-x-auto relative rounded">
        <form id="del_all_form" method="POST">
    <table class="w-full text-sm text-left text-gray-500 text-gray-400">
        <thead class="text-xs bg-gray-700 text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    <input name="all_del" id="all_del" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                </th>
                <th scope="col" class="py-3 pl-0 pr-6">
                    File Name
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Size
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Time
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    <a href="/all-files?dl=dl">Dl</a>
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Link
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Reload
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // FOR SEARCH FILTER WE NEED TO USE THIS QUERY
            
           if (isset($_POST['search_btn'])) {
    $search_term = $_POST['s'];

    // Split search term into individual words
    $search_words = explode(' ', $search_term);

    // Construct SQL query with multiple LIKE conditions
    $sql = "SELECT * FROM file WHERE 1=1";
    foreach ($search_words as $word) {
        $word = trim($word);
        if (!empty($word)) {
            $sql .= " AND (nm LIKE '%$word%' OR sr LIKE '%$word%')";
        }
    }
    $sql .= " ORDER BY id DESC";
    
    $result = $conn->query($sql); 
}

            
            else{
            if(isset($_GET['dl'])){
                $dl = $_GET['dl'];
            }else {
                $dl = 'id';
            }
            
            $sql = "SELECT * FROM file ORDER BY CAST($dl AS UNSIGNED) DESC LIMIT $offset, $total_records_per_page";
            $result = $conn->query($sql);
            
            }
            
            while ($row = $result->fetch_assoc()) {
                $x = "'";
                echo '<tr class="bg-white border-b bg-gray-800 border-gray-700">
                <td class="py-0 px-6"><input id="del_chk" name="del_chk[]" type="checkbox" value="'. $row["id"] .'" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"></td>
                <th scope="row" class="py-0 pl-0 pr-6 font-medium  whitespace-nowrap text-white"><a class="myLink font-medium text-gray-400 hover:underline hover:text-white" target="_blank" href="'.$domain.'/file/'. $row["sr"] .'">'. $row["nm"] . '</a></th>
                <td class="py-0 px-6 text-center">'. fb($row["sz"]) . '</td>
                <td class="py-0 px-7 text-center">'. $row["tm"] . '</td>
                <td class="py-4 px-6 text-center">'. $row["dl"] . '</td>
                <td class="py-4 px-2 text-center">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-2 py-1 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800" onclick="copy_lnk('.$x.$domain.'/file/'. $row["sr"] . $x . ')">Copy</button></td>
                <td class="py-4 px-2 text-center">
                <button type ="submit" name="reload" value="'. $row["id"] . '" class="text-white hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-1 py-1 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABuElEQVR4nO2Wv0oDQRCHk0JBBLWx8E/EF1BQn0I0wU58BWO0FESNjWJrGdTGUkkVohYqvoVnZaeiIMbYmfDJyhwssru3dwlokR8chJub/TKzOzObSnX03wSMAQXgEgiAT3kCebcCZNoJHAFKQINoNYFTYLxV6AJQJ74+gFxS6JpEkFTKdzVJpM0WoDrcL3Jg1JHeZ2ADmAC6gS5gEtgUmy3twz7gY0cEWYdfH3Bm8Tv0KRnX6X0AloBb4Al4AyrhHwLSQNng11CZdIFVnSbVrhb5q8Ged4EvDA478vhoTtYpGmxVF/j+N1Sz+cCv5NsZgy1wgfXTXDTY1yPA7/LdgMFW9wWH6hdbLQK6b1hPz1ItTqqVpsR2TbRcWxPEPVzbYst6gH/glvNQdYHVaPutF1UiYt8juZZd4IylgaimkNYir0jzeARugEVpLjZ9ORuILHxkcS6HkVv8XFtRckK1wa8au0mqI20B00Av0KMNCdVCTVLVMBQJFvis543DZyxaB4tRaoi34SJQSCURkHOk3SWV3vlE0FDAIHAgJ9MnyhPvPY1xM8kD58CdtNe6/K6qOo0smY5Sf6Bvoma7SeB/7EsAAAAASUVORK5CYII=" style="max-width: 20px;">
                </button></td>
                <td class="py-4 px-2 text-center">
                <button type ="submit" name="del" value="'. $row["id"] . '" class="text-white hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded text-sm px-2 py-1 bg-red-600 hover:bg-red-700 focus:ring-red-800">Delete</button></td>
                ';                    
                
            }
                $conn->close(); 
                ?>
            </tr>
        </tbody>
    </table>
    </form>
</div>
    <!--pagination starts here-->
<!--    <div class="container text-white mx-auto px-4">-->
<!--<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>-->
<!--</div>-->
<!--pag buttons-->
<div id="pagination1" class="container mx-auto my-4">
<nav id="navpagli">
<ul id="pag_li">
<?php if($page_no > 1){
echo "<li class='norli'><a  href='?page_no=1'>&lsaquo;&lsaquo;</a></li>";
} ?>
    
<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
<a <?php if($page_no > 1){
echo "href='?page_no=$previous_page'";
} ?>>Previous</a>
</li>
    <?php

if ($total_no_of_pages <= 10){  	 
	for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
	if ($counter == $page_no) {
	echo "<li class='active'><a>$counter</a></li>";	
	        }else{
        echo "<li class='norli'><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
}

elseif ($total_no_of_pages > 10){
// Here we will add further conditions
if($page_no <= 4) {			
 for ($counter = 1; $counter < 8; $counter++){		 
	if ($counter == $page_no) {
	   echo "<li class='active'><a>$counter</a></li>";	
		}else{
           echo "<li class='norli'><a href='?page_no=$counter'>$counter</a></li>";
                }
}
echo "<li class='norli'><a>...</a></li>";
echo "<li class='norli'><a href='?page_no=$second_last'>$second_last</a></li>";
echo "<li class='norli'><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
}

elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
echo "<li class='norli'><a href='?page_no=1'>1</a></li>";
echo "<li class='norli'><a href='?page_no=2'>2</a></li>";
echo "<li class='norli'><a>...</a></li>";
for (
     $counter = $page_no - $adjacents;
     $counter <= $page_no + $adjacents;
     $counter++
     ) {		
     if ($counter == $page_no) {
	echo "<li class='active'><a>$counter</a></li>";	
	}else{
        echo "<li class='norli'><a href='?page_no=$counter'>$counter</a></li>";
          }                  
       }
echo "<li class='norli'><a>...</a></li>";
echo "<li class='norli'><a href='?page_no=$second_last'>$second_last</a></li>";
echo "<li class='norli'><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
}

else {
echo "<li class='norli'><a href='?page_no=1'>1</a></li>";
echo "<li class='norli'><a href='?page_no=2'>2</a></li>";
echo "<li class='norli'><a>...</a></li>";
for (
     $counter = $total_no_of_pages - 6;
     $counter <= $total_no_of_pages;
     $counter++
     ) {
     if ($counter == $page_no) {
	echo "<li class='active'><a>$counter</a></li>";	
	}else{
        echo "<li class='norli'><a href='?page_no=$counter'>$counter</a></li>";
	}                   
     }
}

}

?>
<li <?php if($page_no >= $total_no_of_pages){
echo "class='disabled'";
} ?>>
<a <?php if($page_no < $total_no_of_pages) {
echo "href='?page_no=$next_page'";
} ?>>Next</a>
</li>

<?php if($page_no < $total_no_of_pages){
echo "<li class='norli'><a href='?page_no=$total_no_of_pages'>&rsaquo;&rsaquo;</a></li>";
} ?>
</ul>
</nav>
<!--pagination ends here-->
</div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">  
            $('#all_del').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});            
        </script>
        <script>
//shift+click chekbox
  var firstCheckbox = null;

  var checkboxes = document.querySelectorAll('input[type=checkbox]');
  checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('click', function(event) {
      if (event.shiftKey && firstCheckbox) {
        var start = Math.min(Array.from(checkboxes).indexOf(firstCheckbox), Array.from(checkboxes).indexOf(checkbox));
        var end = Math.max(Array.from(checkboxes).indexOf(firstCheckbox), Array.from(checkboxes).indexOf(checkbox));
        for (var i = start; i <= end; i++) {
          checkboxes[i].checked = true;
        }
      } else {
        firstCheckbox = checkbox;
      }
    });
  });
</script>
<!--click and double click event-->
<script>
  var links = document.querySelectorAll(".myLink");

  links.forEach(function(link) {
    link.addEventListener("click", function(event) {
      // Prevent the default link behavior
      event.preventDefault();
      link.style.color = "green";
      // Copy the link to the clipboard
      navigator.clipboard.writeText(link.href)
        .then(function() {
          console.log("Link copied to clipboard!");
        })
        .catch(function(error) {
          console.error("Error copying link to clipboard:", error);
        });
        
    });

    link.addEventListener("dblclick", function(event) {
      // Open the link in a new window
      window.open(link.href, "_blank");
    });
  });
</script>
</body>
<?php include "footer.php" ?>