<?php
setcookie("username", "", time()-3600);
setcookie("password", "", time()-3600);
echo "<script>window.location=document.referrer;</script>";
?>