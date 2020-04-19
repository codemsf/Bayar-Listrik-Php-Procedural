<?php include "header.php"; ?>
<div id="page-content-container">
    <div class="container-fluid">
        <div class="row"><a href="#menu" class="btn btn-primary" id="menu">></a> 
            <div class="col-lg-12">
                <h1>Halaman Pegawai Bank (Bank Staff)</h1>
                <a href="aksitambah/pegawai.php" class="btn btn-info"><span class="fa fa-plus"></span> Tambah Pegawai</a>
            </div>
        </div>
    </div>
</div>

  <section class="container-fluid">
    <div class="text-center">
     <table class="table table-bordered " width="100%">
      <thead>
        <tr>
        <td style="width: 1%;"><strong>No.</strong></td>
        <td style="width: 19%;"><strong>Nama</strong></td>
        <td style="width: 30%;"><strong>Email</strong></td>
        <td style="width: 15%;"><strong>Kode Pegawai</strong></td>
        <td style="width: 10%;"><strong>Kode Akses</strong></td>
        <td style="width: 25%;"><strong>Aksi</strong></td>
        </tr>
      </thead>

      <?php 
      $no=1;
      $take =$conn->query("SELECT * FROM admin WHERE level ='2'");
      while ($s=$take->fetch_assoc()) {
       ?>

      <tbody>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo ucwords($s['nama']); ?></td>
        <td><?php echo $s['email']; ?></td>
        <td><?php echo $s['noPegawai']; ?></td>
        <td><?php echo $s['level']; ?></td>
        <td><div class="btn-group">
          <a href="#<?php echo $s['id']; ?>" class="btn btn-danger">Hapus</a>
        </div></td>
        </tr>

      </tbody>
      <?php $no++;
      } ?>
    </table>
    </div>
  </section>
  <?php include "footer.php"; ?>