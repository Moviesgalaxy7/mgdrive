<?php 

include 'header.php';
//include 'session.php';
include "../app/xmin.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $gdl = preg_split('/[\n,]/', $_POST['gdl']);
}
if (isset($_POST['copy_selected'])) {
  $selected_links = $_POST['selected_part'];
  $link_string = implode("\n", $selected_links);
  echo '<script>copyToClipboard("' . $link_string . '")</script>';
}
?>
<title><?php echo $site_name . ' - Upload Files' ?></title>
</head>
<body class="bg-gray-900">
    <div class="container mx-auto py-10 sm:py-10 px-4">
        <h3 class="text-2xl font-semibold  text-white mb-5">Add Drive File to System</h3>
        <div class="py-4 sm:px-6 px-4  bg-white rounded-lg shadow-md bg-gray-800">
          <form action = "" method = "post">
            <div class="form-group">
                <h3 class="text-2xl font-semibold  text-white mb-5">Google Drive Link
                <!-- Show tooltip on right -->
                    <i style="font-size:20px;" data-tooltip-target="tooltip-right" data-tooltip-placement="right" class="fa fa-info-circle" aria-hidden="true"></i>
                    <div id="tooltip-right" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Avoid Blank Spaces!
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </h3>
                <textarea name="gdl" id="drive" rows="10" class="form-control block w-full px-3 py-1.5 text-base font-normal bg-gray-600 text-gray-300 bg-clip-padding border border-solid border-gray-600 rounded transition ease-in-out m-0 focus:focus:border-blue-600 focus:outline-none"  placeholder="Enter Multiple Google Drive File Link" required ></textarea>
                <small class="block mt-1 text-gray-400 py-5">Always add link in <b>https://drive.google.com/file/d/xxx/view?usp=sharing</b> format.</small>
            </div>
            <input style="cursor:pointer;" type="submit" class="px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" value="Submit">
        <button id="copy-all-links-btn" class=" my-6 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Copy All</button>
          </form>
        </div>
        <div id="card-body2" style="display: flex;flex-direction: column;" class="py-4 sm:px-6 px-4 mt-5 bg-white rounded-lg shadow-md bg-gray-800">
        <?php
        echo '<div id="draggable-div" draggable="true" style="top:66.5%;display: flex;background: rgba(13, 13, 13, 0.78);border-radius: 5px;padding: 5px;left:50%;backdrop-filter: blur(1px);position: fixed;flex-direction: row-reverse;align-items: center;">';
                            echo '<button form="form1" type="button" class=" px-6 ml-2 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" name="copy_selected" onclick="copySelected()">S</button>
                            <form id="form1" method="POST">
                            <input style="width: 25px; height: 25px;" name="all_del" id="all_del" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </form>
                            </div>';
        
       if (isset($gdl) && !empty($gdl)) {
       
        foreach ($gdl as $gdl2){
    $idb = idb($gdl2);
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

                            
                    echo    '<div id="covered-bx" style="display: inline-flex;align-items: center;">
                            <form>
                            <input id="del_chk" name="selected_part[]" type="checkbox" value="'.$domain.'/file/'.$sr.'" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </form>
                            '.
                            //  <h3 class="text-xl font-semibold  text-white mb-2">File Added Sucesfully</h3>
                            '<div style="margin-left: 15px;"><p class="text-gray-200 py-1">'.$nm.' - '.fb($sz).'</p>'.
                            // <p class="text-gray-200 py-1">Size : '.fb($sz).'</p>
                            '<div class="relative mb-1">'.
                                // <input readonly type="text" id="link" value="'.$domain.'/file/'.$sr.'" class="block w-full p-2 text-l  border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                '<a class="myLink links-col block py-2 pl-3 pr-4  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent" target="_blank" href="'.$domain.'/file/'.$sr.'">'.$domain.'/file/'.$sr.'</a>' .
                                // <button type="button" onclick="copy_lnk('.$x.$domain.'/file/'. $sr . $x . ')" class="text-white absolute right-2 bottom-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-2 py-1 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Copy</button>
                            '</div></div></div><hr style="border: #0507087a solid 1px;">';
    }
    }
        
      ?>  
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    //copy-all-btn-top
  const copyAllLinksBtn = document.querySelector("#copy-all-links-btn");
  const linksCol = document.querySelectorAll(".links-col");
  let allLinks = "";
  
  linksCol.forEach((linkCol) => {
    const link = linkCol.innerText.trim();
    if (link) {
      allLinks += link + "\n";
    }
  });

  copyAllLinksBtn.addEventListener("click", () => {
    navigator.clipboard.writeText(allLinks)
      .then(() => {
        
      })
      .catch((error) => {
        console.error("Failed to copy links: ", error);
      });
  });
  
  //copy-selected
  //copy selected
  function copySelected() {
  var selectedLinks = [];
  var checkboxes = document.getElementsByName('selected_part[]');
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      selectedLinks.push(checkboxes[i].value);
    }
  }
  var linkString = selectedLinks.join('\n');
  copyToClipboard(linkString);
}

function copyToClipboard(text) {
  var textarea = document.createElement('textarea');
  textarea.value = text;
  textarea.setAttribute('readonly', '');
  textarea.style.position = 'absolute';
  textarea.style.left = '-9999px';
  document.body.appendChild(textarea);
  textarea.select();
  document.execCommand('copy');
  document.body.removeChild(textarea);
}
//drag events
const draggableDiv = document.getElementById('draggable-div');
let isDragging = false;
let currentX;
let currentY;
let initialX;
let initialY;
let xOffset = 0;
let yOffset = 0;

draggableDiv.addEventListener('mousedown', dragStart);
draggableDiv.addEventListener('mouseup', dragEnd);
draggableDiv.addEventListener('mousemove', drag);

function dragStart(e) {
  initialX = e.clientX - xOffset;
  initialY = e.clientY - yOffset;
  if (e.target === draggableDiv) {
    isDragging = true;
  }
}

function dragEnd(e) {
  initialX = currentX;
  initialY = currentY;
  isDragging = false;
}

function drag(e) {
  if (isDragging) {
    e.preventDefault();
    currentX = e.clientX - initialX;
    currentY = e.clientY - initialY;

    xOffset = currentX;
    yOffset = currentY;

    setTranslate(currentX, currentY, draggableDiv);
  }
}

function setTranslate(xPos, yPos, el) {
  el.style.transform = `translate3d(${xPos}px, ${yPos}px, 0)`;
}

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
  
//   shift+click
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

</body>

<?php include 'footer.php'; ?>