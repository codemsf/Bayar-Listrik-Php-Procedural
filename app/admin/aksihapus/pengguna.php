<?php
include'../../act/net.php';

$conn->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");

echo "<script>alert('Member Terhapus');</script>";
echo "<script>location='../pengguna.php';</script>";
  ?>
 