<?php 
session_start();
include "../../act/net.php";
if (!isset($_SESSION['admin'])) 
{
  echo "<script>location='../login.php'</script>";
  header('location:../login.php');
  exit();
 } ?>
<!DOCTYPE html>
<html>
<head>
  <title>PLNkita</title>

  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="../../css/datatables.css">
  <link rel="stylesheet" type="text/css" href="../../css/sidebar.css">
  <script src="../../js/Chart.js"></script>
</head>
<body>
<div id="container">
<div id="sidebar">
    <ul class="sidebar-nav">
        <li>
          <h2><a href="#"><strong>Admin</strong></a></h2>
        </li>
        <li>
            <a href="../index.php">Beranda</a>
        </li>
        <li>
            <a href="../pengguna.php">Pengguna</a>
        </li>
        <li>
            <a href="../tagihan.php">Tagihan</a>
        </li>
        <li>
            <a href="../staf-bank.php">Staf Bank</a>
        </li>
        <li>
            <a href="../pembayaran.php">Pembayaran</a>
        </li>
        <li>
          <a href="../keluar.php"><small>Keluar</small></a>
        </li>
    </ul>
</div>

<div id="page-content-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
              <?php $upeg=$_GET['idpeng']; ?>
                <a href="#menu" class="btn btn-primary" id="menu">Menu</a>
                <a href="../data-pengguna.php?id=<?php echo $upeg; ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span> Kembali</a>
            </div>
        </div>
    </div>
</div>
  <section class="container-fluid"> 
    <div class="">
      <div class="text-center">
        <h2>Edit Data Penggunaan</h2>
        <hr>
      </div>
<div class="row contact-wrap">
        <div class="col-md-8 col-md-offset-2">
          <?php
          $data=$conn->query("SELECT * FROM Penggunaan WHERE`id_penggunaan`='$_GET[id]' AND `id_pelanggan`='$_GET[idpeng]'");
          $up =$data->fetch_assoc();
           ?>
          <form action="" method="post" role="form" id="stafForm">
            
            <div class="form-group"> 
              <input type="number" name="meter" class="form-control" id="meter1" placeholder="Bayak Meter Kw/h" onblur="validate('meter',this.value)" required value="<?php echo $up['meter']; ?>" />
              <div id="meter"></div>
            </div>

            <div class="form-group">
              <input type="number" name="tahun" class="form-control" id="tahun1" placeholder="Tahun" onblur="validate('tahun',this.value)" required value="<?php echo $up['tahun']; ?>"/>
              <div id="tahun1"></div>
            </div>

            <div class="form-group">
              <label>Bulan</label>
              <select name="bulan" class="form-control" id="bulan1" required>
                <option value="<?php echo $up['bulan']; ?>">
                  <?php if ($up['bulan']==1): ?> 
                    Januari
                  <?php elseif ($up['bulan']==2):?>
                          Februari
                  <?php elseif ($up['bulan']==3):?>
                          Maret
                  <?php elseif ($up['bulan']==4):?>
                            April
                  <?php elseif ($up['bulan']==5):?>
                            Mei
                  <?php elseif ($up['bulan']==6):?>
                            Juni
                  <?php elseif ($up['bulan']==7):?>
                          Juli 
                  <?php elseif ($up['bulan']==8):?>
                          Agustus
                  <?php elseif ($up['bulan']==9):?>
                            September
                  <?php elseif ($up['bulan']==10):?>
                            Oktober
                  <?php elseif ($up['bulan']==11):?>
                            November
                   <?php elseif ($up['bulan']==12):?>
                            Desember
                  <?php endif ?>
                </option>
                <?php 
                $bulan =$conn->query("SELECT * FROM bulan ORDER BY id_bulan ASC");
                while ($b =$bulan->fetch_assoc()) {?>
                <option value="<?php echo $b['id_bulan']; ?>"><?php echo $b['bulan']; ?></option>
              <?php } ?>
              </select>
            </div>

            <div class="text-center"><button type="submit" name="submit" onclick="checkForm()" class="btn btn-primary">Ubah</button></div>
          </form>
          <?php 
          if (isset($_POST['submit'])) {
            $uid=$_GET['id'];
            $upeg=$_GET['idpeng'];
            $meter =$_POST['meter'];
            $tahun=$_POST['tahun'];
            $bulan=$_POST['bulan'];
              
            $conn->query("UPDATE `penggunaan` SET `bulan`='$bulan',`tahun`='$tahun',`meter`='$meter' WHERE `id_penggunaan`='$uid' AND `id_pelanggan`='$upeg'");
            // header('locaton:data-pengguna.php?id='.$uid);
             echo "<script>location='../data-pengguna.php?id=".$upeg."';</script>";
          }
           ?>
        </div>
      </div>
    </div>
  </section>
   <script src="../../js/jquery-2.1.1.min.js"></script>

  <script src="../../js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#menu").click(function(e) {
          e.preventDefault();
        $("#container").toggleClass("toggled");
        });
      });
  </script>


</body>
</html>