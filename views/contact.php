<?php include "header.php"; 
include "../app/xcf.php";

if(isset($_POST['contact-sub'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mail = mysqli_real_escape_string($conn, $_POST['email']);
    $sub = mysqli_real_escape_string($conn, $_POST['subject']);
    $mssg = mysqli_real_escape_string($conn, $_POST['message']);
    $date = date('d-m-Y (h:iA)');
    
    $sql = "INSERT INTO `contact_form` (`name`, `email`, `subject`, `message`, `date`) VALUES ('$name', '$mail', '$sub', '$mssg', '$date')";

if ($conn->query($sql) === TRUE) {
  echo '
  <div id="alert-3" class="max-w-[95%] flex p-4 mt-4 mx-auto rounded-lg bg-gray-800 text-green-400" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium">
     Your form has been successfully submited, once reviewed we will reply as soon as possible.
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 inline-flex h-8 w-8 bg-gray-800 text-green-400 hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </div>
  ';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    
}

?>
<title><?php echo $site_name . ' - Contact Us' ?></title>
</head>
<body class="bg-gray-900">
     <div class="flex flex-col lg:flex-row container mx-auto py-10 sm:py-10 px-4">
         <div>
        <center>
<h3 class="text-3xl mb-5 tracking-tight font-extrabold text-left text-white"> File Reporting</h3>
</center>
<div class="max-w-3xl p-6 mt-10 lg:my-0 border rounded-lg shadow bg-gray-800 border-gray-700">
<h2 class="mb-5 text-lg font-semibold text-gray-500">Please note that we deal only with messages that meet the following requirements:</h2>
<ul class="list-none space-y-3 text-gray-500 list-inside dark:text-gray-400">
    <li><svg class="w-6 float-left mr-2 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
</svg>
        Explain which copyrighted material is affected.
    </li>
    <li><svg class="w-6 float-left mr-2 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
</svg>
        Please provide the exact and complete URL link.
    </li>
    <li><svg class="w-6 float-left mr-2 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
</svg>
        If it a case of files with illegal contents, please describe the contents briefly in two or three points.
    </li>
    <li><svg class="w-6 float-left mr-2 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
</svg>
        Please write to us only in English
    </li>
</ul>
</div>
<div class="flex flex-col max-w-3xl lg:items-center lg:flex-row lg:justify-between mx-auto py-5 sm:py-10 px-4">
<img class="rounded-xl mb-5 lg:mb-0 opacity-70 lg:max-w-[50%]" src="./asset/contact-page.jpg">
<div class="lg:ml-3 border p-3 rounded-lg shadow bg-gray-800 border-gray-700"><p class="mb-3 text-gray-400">Please provide the file URL when filing a DMCA complain: e.g:</p>
<strong class="text-white"><?php echo $domain ?>/download/?id=XxXxXxXxXxX </strong><br><br><p class="mb-3 text-gray-400">
Written notice should be sent to our designated agent as follows: - via email: </p><strong class="text-white"><?php echo $sup_mail; ?></strong>
</div></p>
</div>
</div>
<section class="bg-gray-900">
  <div class="max-w-3xl p-6 mt-5 lg:mx-4 lg:my-0 border rounded-lg shadow bg-gray-800 border-gray-700">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-white">Contact Us</h2>
      <p class="mb-8 lg:mb-16 font-light text-center text-gray-400 sm:text-xl">Got a technical issue? Want to send feedback about a feature? Need details about our Business plan? Let us know.</p>
      <form method="POST" action="" class="space-y-8">
    <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-300">Full Name</label>
        <input type="name" id="name" name="name" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500 shadow-sm-light" placeholder="Erwick Salaviya" required>
    </div>
    <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Your email</label>
        <input type="email" id="email" name="email" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500 shadow-sm-light" placeholder="name@mail.com" required>
    </div>
    
    <div>
        <label for="subject" class="block mb-2 text-sm font-medium text-gray-300">Subject</label>
        <input type="text" id="subject" name="subject" class="block p-3 w-full text-sm rounded-lg border focus:border-primary-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500 shadow-sm-light" placeholder="Let us know how we can help you" required>
    </div>
    <div class="sm:col-span-2">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-400">Your message</label>
        <textarea id="message" name="message" rows="6" class="block p-2.5 w-full text-sm rounded-lg shadow-sm border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Leave a comment..."></textarea>
    </div>
    <button type="submit" name="contact-sub" class="text-white focus:ring-2 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Send message</button>
</form>
  </div>
</section>
    </div>
</body>

<?php include "footer.php"; ?>