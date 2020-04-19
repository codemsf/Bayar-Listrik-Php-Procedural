<?php 
include "net.php";

$name     = $_POST['name'];
$email    = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$pass     = md5($password);
$nokwh    = $_POST['nokwh'];
$tarif    = $_POST['tarif'];
$alamat   = $_POST['alamat'];

$conn->query("INSERT INTO `pelanggan`(`username`, `password`, `nama`, `email`, `alamat`, `nomor_kwh`, `id_tarif`) VALUES ('$username','$pass','$name','$email','$alamat','$nokwh','$tarif')");

echo "<script>alert('Proses Berhasil,')";
header('location:../login-user.php');
 ?>