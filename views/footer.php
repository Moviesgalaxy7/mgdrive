<script type="text/javascript">

function copy() {
  var copyText = document.getElementById("link");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
}

function copy_lnk(a) {
    var b = document.createElement("textarea");
    b.innerHTML = a;
    document.body.appendChild(b);
    b.select();
    var c = document.execCommand("copy");
    document.body.removeChild(b);
}

</script>

<!--<footer class="mt-auto bottom-5">-->
<!--    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700" />-->
<!--    <span class="block text-sm text-center text-gray-400">© 2023 <?php $site_name; ?> | All Rights Reserved.-->
<!--    </span>-->
<!--</footer>-->
<footer class="rounded-lg shadow bg-gray-800" style="max-width: 95.0095%;margin:auto;margin-bottom:10px;">
    <div class="w-full mx-auto max-w-screen-xl p-6 md:flex md:items-center md:justify-between">
      <span class="text-sm sm:text-center text-gray-400">© <?php echo date('Y'); ?> <a href="/" class="hover:underline"><?php echo $site_name; ?>™</a>. All Rights Reserved.
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-400 sm:mt-0">
        <li>
            <a href="/about" class="mr-4 hover:underline md:mr-6 ">About</a>
        </li>
        <li>
            <a href="/privacy" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
        </li>
        <li>
            <a href="/term" class="mr-4 hover:underline md:mr-6">Terms & Cond.</a>
        </li>
        <li>
            <a href="/contact" class="hover:underline">Contact</a>
        </li>
    </ul>
    </div>
</footer>