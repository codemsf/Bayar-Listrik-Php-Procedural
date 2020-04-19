<?php include "nav.php"; ?>

  <section class="" style="margin-top: 10%">
  	<div class="container">
      <div class="text-center">
          <h2>Antrian Tagihan</h2>
          <p>Data tagihan anda terdahulu</p>
        </div>
  		<div>
  			<table class="table table-bordered text-center">
  				<thead>
          <tr>
            <td style="width: 1%;"><strong>No</strong></td>
            <td style="width: 9%;"><strong>Tahun</strong></td>
            <td style="width: 20%;"><strong>Bulan</strong></td>
            <td style="width: 10%;"><strong>Meteran</strong></td>
            <td style="width: 40%;"><strong>Biaya</strong></td>
            <td style="width: 20%;"><strong>Aksi</strong></td>
          </tr>    
          </thead>
          <tbody>

            <?php 
            $no=1;
            $tarif =$_SESSION['user']['tarif'];
            $duit = $conn->query("SELECT * FROM `tarif` WHERE `id_tarif`='$tarif'");
            $isi =$duit->fetch_assoc();
            $hrg =$isi['tarifperkwh'];
            $uid=$_SESSION['user']['id'];
            $data=$conn->query("SELECT * FROM `tagihan` LEFT OUTER JOIN pelanggan ON tagihan.id_pelanggan = pelanggan.id_pelanggan WHERE tagihan.id_pelanggan = '$uid' AND status = '0' ORDER BY tagihan.tahun , tagihan.bulan ASC LIMIT 2");
            while ($row =$data->fetch_assoc()) { ?>
            <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['tahun']; ?></td>
            <td>
              <?php if ($row['bulan']==1): ?> 
                    Januari
            <?php elseif ($row['bulan']==2):?>
                    Februari
            <?php elseif ($row['bulan']==3):?>
                    Maret
            <?php elseif ($row['bulan']==4):?>
                      April
            <?php elseif ($row['bulan']==5):?>
                      Mei
            <?php elseif ($row['bulan']==6):?>
                      Juni
            <?php elseif ($row['bulan']==7):?>
                    Juli 
            <?php elseif ($row['bulan']==8):?>
                    Agustus
            <?php elseif ($row['bulan']==9):?>
                      September
            <?php elseif ($row['bulan']==10):?>
                      Oktober
            <?php elseif ($row['bulan']==11):?>
                      November
             <?php elseif ($row['bulan']==12):?>
                      Desember
            <?php endif ?>
            </td>
            <td><?php echo $row['meter']; ?> Kw/h</td>
            <td>Rp.<?php echo number_format($hrg * $row['meter']); ?>  (<small>Belum Termasuk Biaya Admin</small>)</td>
            <td><a href="bayar.php?id=<?php echo $row['id_tagihan']; ?>" class="btn btn-primary">Bayar</a></td>
            </tr>
            <?php $no++;
            } ?>
          </tbody>
  			</table>
        <div class="text-center"><a href="tagihan.php" class="btn btn-primary btn-lg"> Selengkapnya</a></div>
  		</div>
  	</div>
  </section>

  
  <script src="js/jquery-2.1.1.min.js"></script>
  

  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script type="text/javascript" src="js/fliplightbox.min.js"></script>
  <script src="js/functions.js"></script>
  <script type="text/javascript">
    $('.portfolio').flipLightBox()
  </script>

</body>

</html>