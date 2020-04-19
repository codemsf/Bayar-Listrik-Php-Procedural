<?php 
session_start();
session_destroy();
echo "<script>alert('Anda Telah Logout !');location='login.php'</script>";
 ?>