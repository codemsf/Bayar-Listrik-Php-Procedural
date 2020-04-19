<?php include"header.php"; ?>

  <section id="" style="margin-top: 5%; margin-bottom: 6%;">
      <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="blogs">
          <div class="text-center">
            <h2>Pencarian Tagihan</h2>
            <p>Anda dapat Menemukan Tagihan Anda Dengan Mencari Berdasarkan Nomor kwh anda</p>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <form class="form-search" action="hasil-cari.php" method="post">        
    <div class="row">
      <div class="col-md-8">
        <div class="">
          <div class="form-group">
             <input type="number" name="pencarian" class="form-control" id="cari" placeholder="Nomer rekening KWh Anda" data-rule="minlen:6" data-msg="Masukkan setidaknya 6 angka" style="padding:2%;height: 6%;" />
              <div class="validation"></div>
          </div>
        </div>
      
      </div>
      <div class="col-md-4">
        <button type="submit" name="cari" class="btn btn-primary btn-lg" style="width: 80%;padding: 4%;margin-top: 13%;">Cari</button>
      </div>
    </div>
    </form>
  </div>
  </section>

 <script src="js/jquery-2.1.1.min.js"></script>
  
  <script src="js/bootstrap.min.js"></script>

</body>

</html>
