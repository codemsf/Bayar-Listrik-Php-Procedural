<?php 
session_start();
session_destroy();
echo "<script>alert('Anda Telah Logout !');location='../admin/login.php'</script>";
 ?>