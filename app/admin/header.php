<?php 
session_start();
include "../act/net.php"; 
if (!isset($_SESSION['admin'])) 
{
  echo "<script>location='login.php'</script>";
  header('location:login.php');
  exit();
 }?>
<!DOCTYPE html>
<html>
<head>
  <title>BAYARLISTRIK.COM</title>

  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="../css/datatables.css">
  <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
  <script src="../js/Chart.js"></script>
</head>
<body>
<div id="container">
<div id="sidebar">
    <ul class="sidebar-nav">
        <li>
          <h2><a href="index.php"><strong>Admin</strong></a></h2>
        </li>
        <li>
            <a href="index.php">Beranda</a>
        </li>
        <li>
            <a href="pengguna.php">Pengguna</a>
        </li>
        <li>
            <a href="tagihan.php">Tagihan</a>
        </li>
        <li>
            <a href="staf-bank.php">Staf Bank</a>
        </li>
        <li>
            <a href="pembayaran.php">Pembayaran</a>
        </li>
       <div class="tag">
        <?php $jum = $conn->query("SELECT * FROM pesan WHERE status ='0'"); $display = mysqli_num_rows($jum); ?>
        <li><b><a href="pesan.php">Pesan <span class="bubble">(<?php echo $display; ?>)</span></a> </b></li>
        <li><b>No.Akses :<i><?php echo $_SESSION['admin']['nopeg']; ?></i></b></li>
        <li><b>Status :<i><?php echo $_SESSION['admin']['status']; ?></i></b></li>
        <li>
          <a href="logout.php"><small>Keluar</small></a>
        </li>
       </div>
    </ul>
</div>
