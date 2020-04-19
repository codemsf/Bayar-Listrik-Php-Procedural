<?php 
include "header.php";
 ?>


<div id="page-content-container">
    <div class="container-fluid">
        <div class="row">
                 <a href="#menu" class="btn btn-primary" id="menu">></a> 
        </div>
    </div>
</div>

  <div class="container-fluid" >
    <div class="row">
      <div class="col-md-6" style="width: 50%;" >
    <canvas id="tagihan"></canvas>
  </div>
  <div class="col-md-6" style="width: 50%;" >
    <canvas id="DayaPengguna"></canvas>
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
            <td colspan="3"><strong>Terkonfirmasi</strong></td>
            <td colspan="3"><?php $belumbayar = mysqli_query($conn ,"SELECT * FROM `tagihan` WHERE status = '2'");
          echo mysqli_num_rows($belumbayar); ?></td>
          </tr>
          <tr>
            <td colspan="6" style="text-align: center;"><strong>Data Pengguna Berdasarkan Daya</strong></td>
          </tr>
          <tr style="text-align: center;">
            <td><strong>450 Watt</strong></td>
            <td><strong>750 Watt</strong></td>
            <td><strong>900 Watt</strong></td>
            <td><strong>2200 Watt</strong></td>
            <td><strong>4400 Watt</strong></td>
            <td><strong>6600 Watt</strong></td>
          </tr>
          <tr style="text-align: center;">
            <td><?php $pelangganDaya = mysqli_query($conn ,"SELECT * FROM `pelanggan` WHERE id_tarif = '1'");
          echo mysqli_num_rows($pelangganDaya); ?></td>
            <td><?php $pelangganDaya = mysqli_query($conn ,"SELECT * FROM `pelanggan` WHERE id_tarif = '2'");
          echo mysqli_num_rows($pelangganDaya); ?></td>
            <td><?php $pelangganDaya = mysqli_query($conn ,"SELECT * FROM `pelanggan` WHERE id_tarif = '3'");
          echo mysqli_num_rows($pelangganDaya); ?></td>
            <td><?php $pelangganDaya = mysqli_query($conn ,"SELECT * FROM `pelanggan` WHERE id_tarif = '4'");
          echo mysqli_num_rows($pelangganDaya); ?></td>
            <td><?php $pelangganDaya = mysqli_query($conn ,"SELECT * FROM `pelanggan` WHERE id_tarif = '5'");
          echo mysqli_num_rows($pelangganDaya); ?></td>
            <td><?php $pelangganDaya = mysqli_query($conn ,"SELECT * FROM `pelanggan` WHERE id_tarif = '6'");
          echo mysqli_num_rows($pelangganDaya); ?></td>
          </tr>
          <tr>
            <td colspan="3"><strong>Jumlah Dana Pembayaran Kotor</strong></td>
            <?php $data = $conn->query("SELECT `total_bayar`,SUM(`total_bayar`) AS total FROM pembayaran  WHERE `status` = '2'");
            $njay = $data->fetch_assoc(); ?>
            <td colspan="3">Rp.<?php echo number_format($njay['total']) ; ?></td>
          </tr>
          <tr>
            <td colspan="3"><strong>Jumlah Biaya Admin</strong></td>
            <?php $data = $conn->query("SELECT SUM(`biaya_admin`) AS total_ad FROM pembayaran  WHERE `status` = '2'");
            $njay = $data->fetch_assoc(); ?>
            <td colspan="3">Rp.<?php echo number_format($njay['total_ad']); ?></td>
          </tr>
          <tr>
            <td colspan="3"><strong>Jumlah Dana Pembayaran Bersih</strong></td>
            <?php $data = $conn->query("SELECT `total_bayar`,SUM(`total_bayar`) AS total FROM pembayaran  WHERE `status` = '2'");
            $njay = $data->fetch_assoc(); ?>
            <?php $data = $conn->query("SELECT SUM(`biaya_admin`) AS total_ad FROM pembayaran  WHERE `status` = '2'");
            $njay1 = $data->fetch_assoc(); ?>
            <td colspan="3">Rp.<?php echo number_format($njay['total'] - $njay1['total_ad']);?></td>
          </tr>        
      </table>
    </div>
  </div>
  <div class="container-fluid" style="margin-bottom: 4%;">
    <center>
      <button type="submit" onclick="printContent('cetak')" class="btn btn-default btn-lg"> Print Laporan <span class="fa fa-print"></span></button>
    </center>
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
    var ctx = document.getElementById("DayaPengguna").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
       labels: ["450 Watt", "750 Watt", "900 Watt", "2200 Watt", "4400 Watt", "6600 Watt"],
        datasets: [{
          label: ' Data Daya Pengguna',
          data: [<?php $pelangganDaya = mysqli_query($conn ,"SELECT * FROM `pelanggan` WHERE id_tarif = '1'");
          echo mysqli_num_rows($pelangganDaya); ?>,

           <?php $pelangganDaya = mysqli_query($conn ,"SELECT * FROM `pelanggan` WHERE id_tarif = '2'");
          echo mysqli_num_rows($pelangganDaya); ?>,

           <?php $pelangganDaya = mysqli_query($conn ,"SELECT * FROM `pelanggan` WHERE id_tarif = '3'");
          echo mysqli_num_rows($pelangganDaya); ?>,

           <?php $pelangganDaya = mysqli_query($conn ,"SELECT * FROM `pelanggan` WHERE id_tarif = '4'");
          echo mysqli_num_rows($pelangganDaya); ?>,

           <?php $pelangganDaya = mysqli_query($conn ,"SELECT * FROM `pelanggan` WHERE id_tarif = '5'");
          echo mysqli_num_rows($pelangganDaya); ?>,

           <?php $pelangganDaya = mysqli_query($conn ,"SELECT * FROM `pelanggan` WHERE id_tarif = '6'");
          echo mysqli_num_rows($pelangganDaya); ?>],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
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
    <script type="text/javascript">
    function printContent(el){
      var restorepage  = document.body.innerHTML;
      var printContent = document.getElementById(el).innerHTML;

      document.body.innerHTML = printContent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>




<?php include "footer.php"; ?>