<?php include "nav.php"; ?>

  <section id="contact-page" style="margin-top: 5%;">
    <div class="container">
      <div class="text-center">
        <h2>Halaman Pembayaran</h2>
        <p>Isi Formulir di bawah Untuk Melakukan Pembayaran</p>
      </div>
      <div class="row contact-wrap">
        <div class="col-md-8 col-md-offset-2">
           <!-- <?php print_r($_SESSION['user']); ?> -->
          
          <form action="" method="post" role="form" class="contactForm" id="payForm">
            <?php
            //pengambilan data 
            $idtag =$_GET['id'];
            $tarif =$_SESSION['user']['tarif'];
            $uid   =$_SESSION['user']['id'];
            $biayaAdmin =2000; 
            //data harga
            $data2 =$conn->query("SELECT * FROM `tarif` WHERE `id_tarif`='$tarif'");
            $t =$data2->fetch_assoc();
            // print_r($t);
            $tarifperkwh = $t['tarifperkwh'];
            //data tagihan
            $data = $conn->query("SELECT * FROM `tagihan` WHERE `id_tagihan`='$idtag'");
            $r =$data->fetch_assoc();
            // print_r($r);
            $meter =$r['meter'];
            //penjumlahan
            $jum = $meter * $tarifperkwh;
            $total =$jum + $biayaAdmin;

             ?>
            <div class="form-group">
              <input type="text" class="form-control" id="name" value="<?php if ($r['bulan']==1): ?>Januari<?php elseif ($r['bulan']==2):?>Februari<?php elseif ($r['bulan']==3):?>Maret<?php elseif ($r['bulan']==4):?>April<?php elseif ($r['bulan']==5):?>Mei<?php elseif ($r['bulan']==6):?>Juni<?php elseif ($r['bulan']==7):?>Juli<?php elseif ($r['bulan']==8):?>Agustus<?php elseif ($r['bulan']==9):?>September<?php elseif ($r['bulan']==10):?>Oktober<?php elseif ($r['bulan']==11):?>November
<?php elseif ($r['bulan']==12):?>Desember<?php endif ?>" data-rule="minlen:4" disabled />


              <input type="hidden" name="bulan" value="<?php echo $r['bulan']; ?>">
              <div class="validation"></div>
            </div>
             <div class=" form-group">
              <input type="text" name="tahun" class="form-control" id="tahun" value="<?php echo $r['tahun']; ?>"  maxlength="4" disabled />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  id="harga" value="Rp.<?php echo number_format($total);?>"  data-rule="minlen:4" disabled />
              <div class="text-center"><small>Sudah Termasuk Biaya Admin</small></div>
            </div>
            <div class="form-group">
              <input type="text" name="kredit" class="form-control" id="kredit" placeholder="Nomor Kartu Kredit anda Anda" onkeyup="checkNumber()" maxlength="12" minlength="12" required />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="checkbox" name="" required><p style="margin-top: -5%;">Saya setuju dengan <a href="#">Syarat</a> dan <a href="">Ketentuan</a> yang berlaku.</p>
              
            </div>
           
            <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg">Bayar</button></div>
          </form>
          <?php 
            if (isset($_POST['submit'])) {
              $bln =$_POST['bulan'];
              $thn =$r['tahun'];
              $kk  =$_POST['kredit'];
              $sts =1;

              $query="INSERT INTO `pembayaran`(`id_tagihan`, `id_pelanggan`, `bulan_bayar`, `tahun_bayar`, `biaya_admin`, `total_bayar`, `noKk`, `status`) VALUES ('$idtag','$uid','$bln','$thn','$biayaAdmin',$total,'$kk','$sts')";
              /*echo var_dump($query);*/
              if (mysqli_query($conn,$query)) {
                $satu =1;
                $up1 ="UPDATE `tagihan` SET `status`='$satu' WHERE `id_tagihan`='$idtag'";
                mysqli_query($conn,$up1);
                echo "<script>alert('Anda Berhasil Membayar , Tunggu Konfirmasi Pembayaran');location='riwayat.php';</script>";
              }
            }
           ?>
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.container-->
  </section>

  
  <script src="../js/jquery-2.1.1.min.js"></script>
  
  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript">
      $(document).ready (function() {
       $('#payForm').formValidation({
       framework: 'bootstrap',
       excluded: 'disabled',
       icon: {
       valid: 'glyphicon glyphicon-ok',
       invalid: 'glyphicon glyphicon-remove',
       validating: 'glyphicon glyphicon-refresh'
       },
       fields: {
       kredit: {
       validators: {
       notEmpty: {
       message: 'Kartu Kredit Tidak Boleh Kosong'
       }
       }
       }
       }
       })
      });
      function checkNumber()
       {
       var validasiAngka = /^[0-9]+$/;
       var numbs = document.getElementById("kredit");
       
       if (numbs.value.match(validasiAngka)) {
       
       } else {
       alert("Masukkan Format Wajib Angka!");
       numbs.focus();
       return false;
       }
       }

  </script>

</body>

</html>
