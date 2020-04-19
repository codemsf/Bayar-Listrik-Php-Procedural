<?php session_start();
include "../act/net.php";
if (!isset($_SESSION['user'])) {
   header('location:../login-user.php');
 } ?>
<!DOCTYPE html>
<html>
<head>
  <title>BAYARLISTRIK.COM</title>

  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="../stylesheet" href="css/font-awesome.css">
  <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><span>BAYARLISTRIK.COM</span></a>
      </div>
      <div class="navbar-collapse collapse">
        <div class="menu">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="index.php">Beranda</a></li>
            <li role="presentation"><a href="tagihan.php">Tagihan</a></li>
            <li role="presentation"><a href="riwayat.php">Riwayat</a></li>
            <li role="presentation"><a href="keluar.php">Keluar</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>