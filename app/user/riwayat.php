<?php include "nav.php"; ?>

  <section class="" style="margin-top: 10%">
    <div class="container">
      <div class="text-center">
          <h2>Riwayat Pembayaran</h2>
          <p>Data pembayaran terbaru anda</p>
          <h4>Note</h4>
          <span class=" btn-warning fa fa-spinner btn-lg" style="border-radius: 50%;"></span> <small>menunggu konfirmasi</small>&nbsp;<span class="btn-success fa fa-check btn-lg" style="border-radius: 50%;"></span><small>Terkonfirmasi</small>
        </div>
        <hr>
      <div>
        <table class="table table-bordered text-center">
          <thead>
          <tr>
            <td style="width: 1%"><strong>No</strong></td>
            <td style="width: 9%"><strong>Tahun</strong></td>
            <td style="width: 20%"><strong>Bulan</strong></td>
            <td style="width: 40%"><strong>Biaya</strong></td>
            <td style="width: 30%"><strong>Tanggal Bayar</strong></td>
          </tr>    
          </thead>
          <tbody>
            <?php 
            $no=1;
            $uid=$_SESSION['user']['id'];
            $ambil=$conn->query("SELECT * FROM `pembayaran` WHERE id_pelanggan='$uid'");
            while ($r=$ambil->fetch_assoc()) {?>
            <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $r['tahun_bayar']; ?></td>
            <td><?php if ($r['bulan_bayar']==1): ?> 
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
            <?php endif ?></td>
            <td>Rp.<?php echo number_format($r['total_bayar']); ?> (<small>Termasuk Biaya Administrasi</small>)</td>
            <td><?php echo date('d F Y', strtotime($r['tanggal_pembayaran'])); ?> 
            <?php if ($r['status']==1): ?>
            <span class="btn-warning fa fa-spinner "style="border-radius: 50%;"></span> 
            <?php elseif ($r['status']==2):?>
            <span class="btn-success fa fa-check "style="border-radius: 50%;"></span>
            <?php endif ?>
            </td>
            </tr>
            <?php $no++;
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  
  <script src="js/jquery-2.1.1.min.js"></script>
  

  <script src="js/bootstrap.min.js"></script>
  

</body>

</html>