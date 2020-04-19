<?php include "header.php"; ?>

<div id="page-content-container">
    <div class="container-fluid">
        <div class="row">
          <a href="#menu" class="btn btn-primary" id="menu">></a> 
            <div class="col-lg-12">
            <h1>Halaman Pengguna (User)</h1>
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
        <td style="width: 19%;"><strong>Nama</strong></td>
        <td style="width: 30%;"><strong>Email</strong></td>
        <td style="width: 15%;"><strong>No.Kw/h</strong></td>
        <td style="width: 10%;"><strong>Daya Watt</strong></td>
        <td style="width: 25%;"><strong>Aksi</strong></td>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no=1;
        $take =$conn->query("SELECT * FROM pelanggan");
        while ($r =$take->fetch_assoc()) {
         ?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo ucwords($r['nama']); ?></td>
        <td><?php echo $r['email']; ?></td>
        <td><?php echo $r['nomor_kwh']; ?></td>
        <td>
            <?php if ($r['id_tarif']==1): ?> 
             <strong> 450 Watt</strong>
            <?php elseif ($r['id_tarif']==2):?>
             <strong> 750 Watt</strong>
            <?php elseif ($r['id_tarif']==3):?>
             <strong> 900 Watt</strong>
            <?php elseif ($r['id_tarif']==4):?>
             <strong> 2200 Watt</strong>
            <?php elseif ($r['id_tarif']==5):?>
             <strong> 4400 Watt</strong>
            <?php elseif ($r['id_tarif']==6):?>
             <strong> 6600 Watt</strong>
            <?php endif ?>
        </td>
        <td>
          <a href="aksihapus/pengguna.php?id=<?php echo $r['id_pelanggan']; ?>" class="btn btn-danger">Hapus</a> | 
          <a href="data-pengguna.php?id=<?php echo $r['id_pelanggan']; ?>" class="btn btn-primary">Data Penggunaan</a></td>
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