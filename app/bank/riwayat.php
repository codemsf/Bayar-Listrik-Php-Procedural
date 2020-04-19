<?php include "nav.php"; ?>

<div id="page-content-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3>Riwayat</h3>
                <a href="#menu" class="btn btn-primary" id="menu">Menu</a>
            </div>
        </div>
    </div>
</div>
	
	<section class="container-fluid">
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
        $take =$conn->query("SELECT * FROM pembayaran , pelanggan WHERE pembayaran.id_pelanggan = pelanggan.id_pelanggan && pembayaran.status ='2' && pembayaran.id_admin ='$ipet'");
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
  </section>

<?php include "footer.php"; ?>