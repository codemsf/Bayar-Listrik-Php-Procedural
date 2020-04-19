
  <?php 
    session_start();
    if ($_SESSION['id_level']=="") {
      echo "<script>alert('Anda belum login,'); window.location = '../../index.php'</script>";
       } 
     ?>
  <?php 
    include "navbar.php"; 
  ?>

      <div class="bd-content p-5"><br>
        <h1 class="text-center">Table Pegawai</h1><br>

    <div class="row">
      <!--kiri-->
      <div class="col-8">
        <div class="table-responsive">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>

        <?php 
        include "koneksi.php";
        $update = mysqli_query($koneksi, "SELECT * FROM pegawai");
        $nomor = 1;
        while ($data = mysqli_fetch_array($update)) {
        ?>

        <tbody>
          <tr>
            <td scope="row"><?php echo $nomor++; ?></td>
            <td><?php echo $data['nama_pegawai']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['alamat']; ?></td>

              <td>
                <?php 
                include "koneksi.php";
                $update = mysqli_query($koneksi, "SELECT pegawai.id_pegawai,peminjaman.status_peminjaman FROM  pegawai,peminjaman WHERE pegawai.id_pegawai=peminjaman.id_pegawai ");
                while ($data = mysqli_fetch_array($update)) {

                        $stok = $data['status_peminjaman'] == '2';

                        if ($stok) {
                        ?>

            <a href="form-edit-pegawai.php?id_pegawai=<?php echo $data['id_pegawai']; ?>" class="btn btn-success"><i class="fas fa-user-edit"></i></a> 
            <a href="hapus-pegawai.php?id_pegawai=<?php echo $data['id_pegawai']; ?>" class="btn btn-warning"><i class="fas fa-trash-alt"></i></a>
            <?php } else { ?>
            <a href="form-edit-pegawai.php?id_pegawai=<?php echo $data['id_pegawai']; ?>" class="btn btn-success"><i class="fas fa-user-edit"></i></a> 
            <a href="hapus-pegawai.php?id_pegawai=<?php echo $data['id_pegawai']; ?>" class="btn btn-warning disabled"><i class="fas fa-trash-alt"></i></a>
          <?php }}?>
            </td>
          </tr>
         <?php }?>
        </tbody>
      </table>
    </div>
    </div>

    <!---Kanan-->
      <div class="col-4">
        <a href="form-tambah-pegawai.php" role="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
      </div>

    </div>
  </div>

  <!-------->
<?php
include "footer.php";
  ?>

</body>;

