<?php include "headerdalam.php"; ?>

<div id="page-content-container">
    <div class="container-fluid">
    </div>
</div>
  <section class="container-fluid"> 
    <div class="">
      <div class="text-center">
        <h2>Tambah Penggunaan </h2>
        <hr>
      </div>
<div class="row contact-wrap">
        <div class="col-md-8 col-md-offset-2">
          <form action="" method="post" role="form" id="stafForm">
            
            <div class="form-group"> 
              <input type="number" name="meter" class="form-control" id="meter1" placeholder="Bayak Meter Kw/h" onblur="validate('meter',this.value)" required />
              <div id="meter"></div>
            </div>

            <div class="form-group">
              <input type="number" name="tahun" class="form-control" id="tahun1" placeholder="Tahun" onblur="validate('tahun',this.value)" maxlength="4" required />
              <div id="tahun1"></div>
            </div>

            <div class="form-group">
              <label>Bulan</label>
              <select name="bulan" class="form-control" id="bulan1" required>
                <option value="">- Pilih Salah Satu -</option>
                <?php 
                $bulan =$conn->query("SELECT * FROM bulan ORDER BY id_bulan ASC");
                while ($b =$bulan->fetch_assoc()) {?>
                <option value="<?php echo $b['id_bulan']; ?>"><?php echo $b['bulan']; ?></option>
              <?php } ?>
              </select>
            </div>

            <div class="text-center"><button type="submit" name="submit" onclick="checkForm()" class="btn btn-primary">Tambah</button></div>
          </form>
          <?php 
          if (isset($_POST['submit'])) {
            $uid=$_GET['id'];
            $meter =$_POST['meter'];
            $tahun=$_POST['tahun'];
            $bulan=$_POST['bulan'];
            $event=0;

            $conn->query("INSERT INTO `penggunaan`(`id_pelanggan`, `bulan`, `tahun`, `meter`,`event`) VALUES ('$uid','$bulan','$tahun','$meter','$event')");
            // header('locaton:data-pengguna.php?id='.$uid);
             echo "<script>location='../data-pengguna.php?id=".$_GET['id']."';</script>";
          }
           ?>
        </div>
      </div>
    </div>
  </section>
   <script src="../js/jquery-2.1.1.min.js"></script>


  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#menu").click(function(e) {
          e.preventDefault();
        $("#container").toggleClass("toggled");
        });
      });
  </script>


</body>
</html>