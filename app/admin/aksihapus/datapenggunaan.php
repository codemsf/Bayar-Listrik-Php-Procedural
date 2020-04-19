<?php
include'../../act/net.php';

$upeg=$_GET['idpeng'];
$id =$_GET['id'];
$conn->query("DELETE FROM `penggunaan` WHERE `id_penggunaan`='$id'");
echo "<script>alert('Data Terhapus');</script>";
echo "<script>location='../data-pengguna.php?id=".$upeg."';</script>";
  ?>
 