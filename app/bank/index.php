<?php include "nav.php"; ?>

<div id="page-content-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Halaman Staff Bank (<?php echo ucwords($_SESSION['bankir']['nama']); ?>)</h1>
                <a href="#menu" class="btn btn-primary" id="menu">Menu</a>
            </div>
        </div>
    </div>
</div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6" style="width: 50%;" >
        <canvas id="tagihan"></canvas>
      </div>
      <div class="col-md-6" style="width: 50%;" >
        <canvas id="KerjaPeg"></canvas>
      </div>
    </div>
    <div class="thumbnail" style="margin-top: 3%;"id="cetak">
      <table class="table table-bordered">
          <tr>
            <td colspan="3"><strong>Belum Bayar</strong></td>
            <td colspan="3"><?php $belumbayar = mysqli_query($conn ,"SELECT * FROM `tagihan` WHERE status = '0'");
          echo mysqli_num_rows($belumbayar); ?></td>
          </tr>
          <tr>
            <td colspan="3"><strong>Menunggu Konfirmasi</strong></td>
            <td colspan="3"><?php $belumbayar = mysqli_query($conn ,"SELECT * FROM `tagihan` WHERE status = '1'");
          echo mysqli_num_rows($belumbayar); ?></td>
          </tr>
          <tr>
            <td colspan="3"><strong>Terkonfirmasi Oleh <?php echo ucwords($_SESSION['bankir']['nama']); ?></strong></td>
            <td colspan="3"><?php $petid =$_SESSION['bankir']['id']; $belumbayar = mysqli_query($conn ,"SELECT * FROM `pembayaran` WHERE status = '2' && id_admin ='$petid'");
          echo mysqli_num_rows($belumbayar); ?></td>
          </tr>
          <tr>
            <td colspan="3"><strong>Jumlah Dana Pembayaran Kotor</strong></td>
            <?php $data = $conn->query("SELECT `total_bayar`,SUM(`total_bayar`) AS total FROM pembayaran  WHERE `status` = '2' && id_admin ='$petid'");
            $njay = $data->fetch_assoc(); ?>
            <td colspan="3">Rp.<?php echo number_format($njay['total']) ; ?></td>
          </tr>
          <tr>
            <td colspan="3"><strong>Jumlah Biaya Admin</strong></td>
            <?php $data = $conn->query("SELECT SUM(`biaya_admin`) AS total_ad FROM pembayaran  WHERE `status` = '2' && id_admin ='$petid'");
            $njay = $data->fetch_assoc(); ?>
            <td colspan="3">Rp.<?php echo number_format($njay['total_ad']); ?></td>
          </tr>
          <tr>
            <td colspan="3"><strong>Jumlah Dana Pembayaran Bersih</strong></td>
            <?php $data = $conn->query("SELECT `total_bayar`,SUM(`total_bayar`) AS total FROM pembayaran  WHERE `status` = '2'&& id_admin ='$petid'");
            $njay = $data->fetch_assoc(); ?>
            <?php $data = $conn->query("SELECT SUM(`biaya_admin`) AS total_ad FROM pembayaran  WHERE `status` = '2' && id_admin ='$petid'");
            $njay1 = $data->fetch_assoc(); ?>
            <td colspan="3">Rp.<?php echo number_format($njay['total'] - $njay1['total_ad']);?></td>
          </tr>        
      </table>
      <div class="text-center">
        <h4><strong>Data Riwayat <?php echo ucwords($_SESSION['bankir']['nama']); ?></strong></h4>
      </div>
      <div class="text-center">
     <table class="table table-bordered ">
      <thead>
        <tr>
        <td style="width: 1%;"><strong>No.</strong></td>
        <td style="width: 15%;"><strong>Nama.</strong></td>
        <td style="width: 10%;"><strong>Bulan</strong></td>
        <td style="width: 10%;"><strong>Tahun</strong></td>
        <td style="width: 20%;"><strong>Biaya Admin</strong></td>
        <td style="width: 20%;"><strong>Total Bayar</strong></td>
        <td style="width: 24%;"><strong>Tanggal Bayar</strong></td>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no=1;
        $ipet =$_SESSION['bankir']['id'];
        $take =$conn->query("SELECT * FROM pembayaran , pelanggan WHERE pembayaran.id_pelanggan = pelanggan.id_pelanggan && pembayaran.status ='2' && pembayaran.id_admin ='$ipet' ORDER BY tahun_bayar , bulan_bayar ASC");
        while ($r =$take->fetch_assoc()) {?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo ucwords($r['nama']); ?></td>
        <td>
            <?php if ($r['bulan_bayar']==1): ?> 
                    Januari
            <?php elseif ($r['bulan_bayar']==2):?>
                    Februari
            <?php elseif ($r['bulan_bayar']==3):?>
                    Maret
            <?php elseif ($r['bulan_bayar']==4):?>
                      April
            <?php elseif ($r['bulan_bayar']==5):?>
                      Mei
            <?php elseif ($r['bulan_bayar']==6):?>
                      Juni
            <?php elseif ($r['bulan_bayar']==7):?>
                    Juli 
            <?php elseif ($r['bulan_bayar']==8):?>
                    Agustus
            <?php elseif ($r['bulan_bayar']==9):?>
                      September
            <?php elseif ($r['bulan_bayar']==10):?>
                      Oktober
            <?php elseif ($r['bulan_bayar']==11):?>
                      November
             <?php elseif ($r['bulan_bayar']==12):?>
                      Desember
            <?php endif ?>
        </td>
        <td><?php echo $r['tahun_bayar']; ?></td>
        <td>Rp.<?php echo number_format($r['biaya_admin']); ?></td>
        <td>Rp.<?php echo number_format($r['total_bayar']); ?></td>
        <td><?php echo date('d F Y', strtotime($r['tanggal_pembayaran'])); ?> 
        <?php if ($r['status']==1): ?>
         
        <?php elseif ($r['status']==2):?>
        <span class="fa fa-check btn-success" style="border-radius: 100%;"></span>
        <?php endif ?>
        </td>
        </tr>
        <?php $no++;
        } ?>
      </tbody>
    </table>
    </div>
    </div>
  </div>
  <div class="container-fluid" style="margin-bottom: 4%;">
    <center>
      <button type="submit" onclick="printContent('cetak')" class="btn btn-default btn-lg"> Print Laporan <span class="fa fa-print"></span></button>
    </center>
  </div>
  </div>
 
 
  <script>
    var ctx = document.getElementById("tagihan").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Belum Bayar","Menunggu Konfirmasi","Terkonfirmasi"],
        // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
          label: ' Data Tagihan Terbaru',
          data: [<?php $belumbayar = mysqli_query($conn ,"SELECT * FROM `tagihan` WHERE status = '0'");
          echo mysqli_num_rows($belumbayar); ?>,

           <?php $belumbayar = mysqli_query($conn ,"SELECT * FROM `tagihan` WHERE status = '1'");
          echo mysqli_num_rows($belumbayar); ?>,

            <?php $belumbayar = mysqli_query($conn ,"SELECT * FROM `tagihan` WHERE status = '2'");
          echo mysqli_num_rows($belumbayar); ?>,],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
  <script>
    var ctx = document.getElementById("KerjaPeg").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Menunggu Konfirmasi","Dikonfirmasi oleh <?php echo ucwords($_SESSION['bankir']['nama']);?> "],
        // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
          label: ' Data Tagihan Terbaru',
          data: [<?php $belumbayar = mysqli_query($conn ,"SELECT * FROM `tagihan` WHERE status = '1'");
          echo mysqli_num_rows($belumbayar); ?>,

            <?php $idbank = $_SESSION['bankir']['id']; $belumbayar = mysqli_query($conn ,"SELECT * FROM `pembayaran` WHERE status = '2' && pembayaran.id_admin ='$idbank'");
          echo mysqli_num_rows($belumbayar); ?>,],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
  </script>
    <script type="text/javascript">
    function printContent(el){
      var restorepage  = document.body.innerHTML;
      var printContent = document.getElementById(el).innerHTML;

      document.body.innerHTML = printContent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>


  <script src="../js/jquery-2.1.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
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