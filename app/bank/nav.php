<?php 
session_start();
include "../act/net.php";
if (!isset($_SESSION['bankir'])) 
{
  echo "<script>location='../admin/login.php'</script>";
  header('location:../admin/login.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>BAYARLISTRIK.COM</title>

  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
  <script src="../js/Chart.js"></script>
</head>
<body>
<div id="container">
<div id="sidebar">
    <ul class="sidebar-nav">
        <li>
          <h2><a href="#"><strong>Manajer Bank</strong></a></h2>
        </li>
        <li>
            <a href="index.php">Beranda</a>
        </li>
        <li>
            <a href="antrian.php">Antrian Pembayaran</a>
        </li>
        <li>
            <a href="riwayat.php">Riwayat Pembayaran</a>
        </li>
        <br><br><br>
        <div class="tag">
        <li><b>Nama       : <?php echo ucwords($_SESSION['bankir']['nama']); ?></b></li>
        <li><b>No.Pegawai : <?php echo $_SESSION['bankir']['nopeg']; ?></b></li>
        <li><b>Status     : <i><?php echo $_SESSION['bankir']['status']; ?></i></b></li>
        <li>
          <a href="logout.php"><small>Keluar</small></a>
        </li>
       </div>
    </ul>
</div>