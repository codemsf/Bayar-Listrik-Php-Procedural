<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>

</body>
</html>
<?php 
session_start();
include "net.php";

$username  = $_POST['username'];
$password  = $_POST['password'];
$pwd       = md5($password);

$sesi = $conn->query("SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$pwd'");
$isi = $sesi->fetch_assoc();
$confirm = $sesi->num_rows; 

if ($isi['level'] == 1) {
	if ($confirm == 1) {
		
		$data = array('nama'    => $isi['nama'],
                      'akses'   => $isi['level'],
                      'id'      => $isi['id'],
                      'nopeg'   => $isi['noPegawai'],
                      'status'  => "Administrator");
		$_SESSION['admin'] =$data;
		
        echo "<meta http-equiv='refresh' content='1;url=../admin'>";

	}else{
		
        echo "<meta http-equiv='refresh' content='1;url=../login.php'>"; 
	}
}
else if ($isi['level'] == 2) {
	if ($confirm == 1) {
		
		$data = array('nama'    => $isi['nama'],
                      'akses'   => $isi['level'],
                      'id'      => $isi['id'],
                      'nopeg'   => $isi['noPegawai'],
                      'status'  => "Bankir");
		$_SESSION['bankir'] =$data;
		
        echo "<meta http-equiv='refresh' content='1;url=../bank'>";

	}else{
		
        echo "<meta http-equiv='refresh' content='1;url=../login.php'>"; 
	}
}
else{
	echo "<script>alert('Username Dan Password Salah !');location='../admin/login.php'</script>";
}
 

 ?>