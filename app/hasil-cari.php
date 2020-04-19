<?php include"header.php"; ?>

  <section id="" style="margin-top: 10%; margin-bottom: 2%;"></section>

  <section id="contact-page">
    <div class="container">
      <div class="text-center">
        <h2>Hasil Pencarian</h2><hr>
      </div>
      <?php
        if (!$_POST['pencarian']=='') {
        $cari = $_POST['pencarian'];

        $hasil = $conn->query("SELECT * FROM pelanggan WHERE nomor_kwh LIKE '%".$cari."%' ");
        $res = $hasil->fetch_assoc();
        $tarif =$res['id_tarif'];
        $hrg =$conn->query("SELECT * FROM `tarif` WHERE id_tarif = '$tarif'");
        $prc = $hrg->fetch_assoc();
       ?>
      <div style="text-align: left;margin-left: 17%">
        <strong>Nama Pemilik: <?php echo ucwords($res['nama']); ?></strong><br>
        <i>No.Kwh :<?php echo $res['nomor_kwh']; ?></i>
      </div>
      <div class="row contact-wrap">
        <div class="col-md-8 col-md-offset-2 text-center">
          <table class="table table-bordered" style="margin-bottom:10%;">
            <thead>
              <tr>
                <td><strong>No.</strong></td>
                <td><strong>Bulan</strong></td>
                <td><strong>Tahun</strong></td>
                <td><strong>tagihan</strong></td>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;
              $ipel = $res['id_pelanggan'];
              $tampil = $conn->query("SELECT * FROM `tagihan` WHERE id_pelanggan ='$ipel' AND status ='0' ORDER BY tahun , bulan ASC");
              while ($r=$tampil->fetch_assoc()) {?>
              <tr>
                <td><?php echo $no; ?></td>
                <td>
                  <?php if ($r['bulan']==1): ?> 
                    Januari
                  <?php elseif ($r['bulan']==2):?>
                          Februari
                  <?php elseif ($r['bulan']==3):?>
                          Maret
                  <?php elseif ($r['bulan']==4):?>
                            April
                  <?php elseif ($r['bulan']==5):?>
                            Mei
                  <?php elseif ($r['bulan']==6):?>
                            Juni
                  <?php elseif ($r['bulan']==7):?>
                          Juli 
                  <?php elseif ($r['bulan']==8):?>
                          Agustus
                  <?php elseif ($r['bulan']==9):?>
                            September
                  <?php elseif ($r['bulan']==10):?>
                            Oktober
                  <?php elseif ($r['bulan']==11):?>
                            November
                   <?php elseif ($r['bulan']==12):?>
                            Desember
                  <?php endif ?>
                </td>
                <td><?php echo $r['tahun']; ?></td>
                <td>Rp.<?php echo number_format($r['meter'] * $prc['tarifperkwh']); ?></td>
              </tr>
              <?php $no++;} ?>
            </tbody>
          </table>
          <a href="login-user.php" class="btn btn-primary btn-lg">Bayar Sekarang</a>
        </div>
      </div>
      <?php }
      else{?>
        <div class="container text-center" style="margin-top: 8%;margin-bottom:13%; ">
          <h1>Tak ada hasil</h1>
        </div>
      <?php } ?>
    </div>
    
  </section>

 <script src="js/jquery-2.1.1.min.js"></script>
  
  <script src="js/bootstrap.min.js"></script>

</body>

</html>
