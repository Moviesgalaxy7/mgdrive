//Edit toogle
$(document).ready(function(){
            // Handle toggle switch change event
            $('#editable').change(function(){
                var editable = $(this).prop('checked');
                if (editable) {
                    $('#cl').prop('disabled', false);
                    $('#cs').prop('disabled', false);
                    $('#cl2').prop('disabled', false);
                    $('#cs2').prop('disabled', false);
                    $('#cl3').prop('disabled', false);
                    $('#cs3').prop('disabled', false);
                    $('#sname').prop('disabled', false);
                    $('#smail').prop('disabled', false);
                    $('#update-crd').prop('disabled', false);
                } else {
                    $('#cl').prop('disabled', true);
                    $('#cs').prop('disabled', true);
                    $('#cl2').prop('disabled', true);
                    $('#cs2').prop('disabled', true);
                    $('#cl3').prop('disabled', true);
                    $('#cs3').prop('disabled', true);
                    $('#sname').prop('disabled', true);
                    $('#smail').prop('disabled', true);
                    $('#update-crd').prop('disabled', true);
                }
            });
});
//btn-count
function analytics(token)
    {
        console.log("start");
        
         var xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
                    console.log(xhttp.responseText);
                }
            };
            let url = "../add_analytics.php?token=" + token + "&turl=" + turl;
            xhttp.open("GET", url, true);
            xhttp.send();
    }
    function downloadFile(sid) {
         
    var downloadBtn = document.getElementById("download-btn");
    var originalText = downloadBtn.innerHTML;
    downloadBtn.innerHTML = "Getting link...";

    var secondsLeft = 5;

  var timerInterval = setInterval(function() {
    secondsLeft--;
    if (secondsLeft === 0) {
      clearInterval(timerInterval);
      downloadBtn.innerHTML = "Downloading..";
      setTimeout(function() {
        downloadBtn.innerHTML = originalText;
      }, 5000);
      location.href = "../wk/" + sid;
    } else {
      downloadBtn.innerHTML = "Wait.. " + secondsLeft + "";
    }
  }, 1000);
  }
  
  function downloadFile2(sid) {
         
    var downloadBtn = document.getElementById("download-btn2");
    var originalText = downloadBtn.innerHTML;
    downloadBtn.innerHTML = "Getting link...";

    var secondsLeft = 5;

  var timerInterval = setInterval(function() {
    secondsLeft--;
    if (secondsLeft === 0) {
      clearInterval(timerInterval);
      downloadBtn.innerHTML = "Downloading..";
      setTimeout(function() {
        downloadBtn.innerHTML = originalText;
      }, 5000);
      location.href = "../wk/" + sid;
    } else {
      downloadBtn.innerHTML = "Wait.. " + secondsLeft + "";
    }
  }, 1000);
  }
