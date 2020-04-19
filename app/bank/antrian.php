<?php include "nav.php"; ?>

<div id="page-content-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3>Antrian Pembayaran</h3>
                <a href="#menu" class="btn btn-primary" id="menu">Menu</a>
            </div>
        </div>
    </div>
</div>

  <section class="container-fluid">
    <div class="text-center">
     <table class="table table-bordered " width="100%" id="MyTable">
      <thead class="">
        <tr>
        <td style="width: 1%;"><strong>No.</strong></td>
        <td style="width: 19%;"><strong>Nama.</strong></td>
        <td style="width: 40%;"><strong>Bulan</strong></td>
        <td style="width: 40%;"><strong>Aksi</strong></td>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no=1;
        $take =$conn->query("SELECT * FROM pembayaran , pelanggan WHERE pembayaran.id_pelanggan = pelanggan.id_pelanggan AND `status`= '1'");
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
        <td><a href="detil.php?idpem=<?php echo $r['id_pembayaran']; ?>" class="btn btn-info">Detil Pembayaran</a></td>
        </tr>
        <?php $no++;
        } ?>
      </tbody>
    </table>
    </div>
  </section>


<?php include "footer.php"; ?>