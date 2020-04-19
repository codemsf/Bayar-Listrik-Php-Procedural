<?php 
include "net.php";
 ?>

 <?php 
$nama       = $_POST['name'];
$email      = $_POST['email'];
$username   = $_POST['username'];
$password   = $_POST['password'];
$pass       = md5($password);
$nopeg      = $_POST['nopeg'];
$level      = 2;

$conn->query("INSERT INTO `admin`(`nama`, `email`, `noPegawai`, `username`, `password`, `level`) VALUES 
  ('$nama','$email','$nopeg','$username','$pass','$level')");

header('location:../admin/staf-bank.php');

 ?>