<?php 
include 'session.php';
include "header.php" ;
include "../app/xmin.php";
if(isset($_GET['id'])){
$id = $_GET['id'];
}

if(isset($id)) {
    $sql = "DELETE FROM user WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: /gmail');
    }
}
// $date = date("d-M-Y H:i");
$sql1 = "SELECT * FROM user ORDER BY id DESC";
            $result1 = $conn->query($sql1);
            $num_rows = mysqli_num_rows($result1);
?>
<title><?php echo $site_name . ' - Add My-Drive' ?></title>
</head>
<body class="bg-gray-900">
     <div class="container mx-auto py-10 sm:py-10 px-4">
         <h3 class="text-2xl font-semibold  text-white mb-5">Goolge Drive Account <span style="border: 2px solid #1f2937; padding: 0px 20px; background: linear-gradient(268deg, #3f83f8, #06b6d4); text-align: center; display: inline-block; border-radius: 8px; font-size: smaller;">
             <?php 
             echo $num_rows;
             ?>
             </span></h3>
<div class="overflow-x-auto relative rounded">
    <table class="w-full text-sm text-left text-gray-500 text-gray-400">
        <thead class="text-xs bg-gray-50 bg-gray-700 text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Gmail ID
                </th>
                <!--<th scope="col" class="py-3 px-6 text-center">-->
                <!--    Status-->
                <!--</th>-->
                <th scope="col" class="py-3 px-6 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM user ORDER BY id DESC";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $x = "'";
                echo '<tr class="bg-white border-b bg-gray-800 border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium  whitespace-nowrap text-white">'. $row["gm"] . '</th>
                <td class="py-4 px-2 text-center"><button onclick="location.href='. $x .'?id='. $row["id"] . $x .'" class="text-white bg-blue-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded text-sm px-2 py-1 bg-red-600 hover:bg-red-700 focus:ring-red-800">Delete</button></td>';                    }
                $conn->close(); ?>
            </tr>
        </tbody>
    </table>
</div>
    </div>
</body>
<?php include "footer.php" ?>