<?php 

include 'header.php';
include 'session.php';
include "../app/xmin.php";
?>
<title><?php echo $site_name . ' - Share Folder' ?></title>
</head>
<body class="bg-gray-900">
    <div class="container mx-auto py-10 sm:py-10 px-4">
        <h3 class="text-2xl font-semibold  text-white mb-5">Add Drive Folder to System</h3>
        <div class="py-4 sm:px-6 px-4  bg-white rounded-lg shadow-md bg-gray-800">
          <form action = "" method = "post">
            <div class="form-group">
                <h3 class="text-2xl font-semibold  text-white mb-5">Google Drive Folder Link</h3>
                <input class="form-control block w-full px-3 py-1.5 text-base font-normal bg-gray-600 text-gray-300 bg-clip-padding border border-solid border-gray-600 rounded transition ease-in-out m-0 focus:focus:border-blue-600 focus:outline-none" name="folder" id="folder" placeholder="Enter Google Drive Folder Link" required >
                <small class="block mt-1 text-gray-400 py-5">Always add link in <b>https://drive.google.com/drive/folders/xxxx</b> format.</small>
            </div>
            <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
          </form>
        </div>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $flk = $_POST["folder"];
        $mf = folder_id($flk);
        $mf = rtrim($mf, "?");
        $ac = rud2();
        $fl = fls($mf,$ac);
        foreach ($fl->files as $key => $value) {
            $id = $value->id;
            $idb = idb2($id);
            $nm = $idb['nm'];
            $sz = $idb['sz'];
            $sr = $idb['sr'];
            $x = "'";
            
            $sql = "SELECT * FROM file ORDER BY id DESC LIMIT 1";
            $result = $conn->query($sql); 
            
            $rows = $result->fetch_assoc();
                
            $last_id = $rows['id'];
                
            $rdm = rand(50,200) . $rows['nm'] . rand(10,100);
            $temp_link_id = md5($rdm);
                
            $update_sql = "UPDATE file SET turl='".$temp_link_id."' WHERE id='".$last_id."'";
            $conn->query($update_sql); 
            
            
            
            echo '<br>
        <div class="py-4 sm:px-6 px-4  bg-white rounded-lg shadow-md bg-gray-800">
            <h3 class="text-xl font-semibold  text-white mb-2">File Added Sucesfully</h3>
            <p class="text-gray-200 py-1">Name : '.$nm.'</p>
            <p class="text-gray-200 py-1">Size : '.fb($sz).'</p>
            <div class="relative mt-2">
                <input type="text" id="link" value="'.$domain.'/file/'.$sr.'" class="block w-full p-2 text-l  border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                <button type="button" onclick="copy_lnk('.$x.$domain.'/file/'. $sr . $x . ')" class="text-white absolute right-2 bottom-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-2 py-1 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Copy</button>
            </div>
        </div>';
        }
        // var_dump($fl);
        }
        ?>
    </div>
</body>

<?php include 'footer.php'; ?>