<?php include "header.php"; ?>

<div id="page-content-container">
    <div class="container-fluid">
        <div class="row">
                 <a href="#menu" class="btn btn-primary" id="menu">></a> 
            <div class="col-lg-12">
              <?php 
              $userid =$_GET['id'];
              $data =$conn->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$userid'");
              $user =$data->fetch_assoc();
               ?>
                <h3><strong>Nama :<?php echo ucwords($user['nama']); ?></strong></h3>
                <p><b>NO Kw/h:</b><a href="#"><u><?php echo $user['nomor_kwh']; ?></u></a></p>
                <div class="btn-group">
                  <a href="aksitambah/penggunaan.php?id=<?php echo $user['id_pelanggan']; ?>" class="btn btn-info"> <span class="fa fa-plus"> Tambah Penggunaan</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

  <section class="container-fluid">
    <div class="text-center">
     <table class="table table-bordered " width="100%" id="MyTable">
      <thead>
        <tr>
        <td style="width: 1%;"><strong>No.</strong></td>
        <td style="width: 20%;"><strong>Tahun</strong></td>
        <td style="width: 20%;"><strong>Bulan</strong></td>
        <td style="width: 20%;"><strong>Meter Digunakan</strong></td>
        <td style="width: 39%;"><strong>Aksi</strong></td>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no=1;
        $take =$conn->query("SELECT * FROM penggunaan WHERE id_pelanggan = '$userid' ORDER BY penggunaan.tahun , penggunaan.bulan ASC");
        while ($r =$take->fetch_assoc()) {
         ?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $r['tahun']; ?></td>
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
        <td><?php echo $r['meter']; ?> Kw/h</td>
        <td>
          <?php if ($r['event']==0): ?>
          <a href="aksihapus/datapenggunaan.php?id=<?php echo $r['id_penggunaan']; ?>&idpeng=<?php echo $userid; ?>" class="btn btn-danger">Hapus</a>
          
          <a href="aksiedit/datapengguna.php?id=<?php echo $r['id_penggunaan']; ?>&idpeng=<?php echo $userid; ?>" class="btn btn-info">Ubah Data</a>
          
          <a href="aksitambah/tagihan.php?id=<?php echo $r['id_penggunaan']; ?>&idpeng=<?php echo $userid; ?>" class="btn btn-primary">Proses Tagihan</a>

        <?php elseif ($r['event']==1):?>
          
          <a href="aksiedit/datapengguna.php?id=<?php echo $r['id_penggunaan']; ?>&idpeng=<?php echo $userid; ?>" class="btn btn-info" disabled>Ubah Data</a>
          
          <a href="aksitambah/tagihan.php?id=<?php echo $r['id_penggunaan']; ?>&idpeng=<?php echo $userid; ?>" class="btn btn-success" disabled>Tagihan <span class="fa fa-check"></span></a>
          <?php endif ?></td>
        </tr>
        <?php 
        $no++;
            }
         ?>
        
      </tbody>
    </table>
    </div>
  </section>


<?php include "footer.php"; ?>