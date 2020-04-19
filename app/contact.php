<?php include"header.php"; ?>

  

  <section id="contact-page" style="margin-top: 5%;">
    <div class="container">
      <div class="text-center">
        <h2>Tinggalkan Pesan</h2>
        <p>Anda dapat meninggallkan pesan pada kolom dibawah</p>
      </div>
      <div class="row contact-wrap">
        <div class="col-md-8 col-md-offset-2">
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-group">
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" data-rule="minlen:4" data-msg="Masukkan setidaknya 4 huruf" required />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Tolong masukkan email valid" required />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" data-rule="minlen:4" data-msg="Masukkan setidaknya 8 huruf subjek" required />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Tuliskan sesuatu untuk kami" placeholder="Pesan" required></textarea>
              <div class="validation"></div>
            </div>

            <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg">Kirim Pesan</button></div>
          </form>

          <?php 
          if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $sub = $_POST['subject'];
            $pesan =$_POST['message'];

            $conn->query("INSERT INTO `pesan`(`nama`, `email`, `subjek`, `pesan`) VALUES ('$nama','$email','$sub','$pesan')");
            echo "<script>alert('Pesan Anda Telah Terkirim');location='index.php';</script>";
          }
           ?>
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.container-->
  </section>

  

  
  <script src="js/jquery-2.1.1.min.js"></script>
  
  <script src="js/bootstrap.min.js"></script>

</body>

</html>
