<?php include"header.php"; ?> 

  

  <section id="contact-page" style="margin-top: 5%;">
    <div class="container">
      <div class="text-center">
        <h2>Halaman Pendaftaran</h2>
        <p>Isi Formulir di bawah Untuk Melakukan Pendaftaran</p>
      </div>
      <div class="row contact-wrap">
        <div class="col-md-8 col-md-offset-2">
          
          <form action="act/userreg.php" method="post" role="form" id="RegForm" class="contactForm">
            
            <div class="form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Nama" minlength="3" data-fv-stringlength-message="Nama harus lebih dari 3 Karakter" required />
              <div class="name"></div>
            </div>

            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email" onchange="ValidateEmail()" required />
              <div id="result"></div>
            </div>

            <div class="form-group">
              <input type="text" name="username" class="form-control" id="username" placeholder="Username" minlength="5" data-fv-stringlength-message="Username harus lebih dari 5 Karakter" required />
              <div class="username"></div>
            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" minlength="5" data-fv-stringlength-message="Username harus lebih dari 5 huruf" required />
              <div class="password"></div>
            </div>

            <div class="form-group">
              <input type="text" name="nokwh" class="form-control" id="nokwh" placeholder="Nomor Kwh Anda" onkeyup="checkNumber()" maxlength="6" data-fv-stringlength-message="Telepon minimal 11 Karakter" required />
              <div class="nokwh"></div>
            </div>

            <div class="form-group">
              <label><small>Daya Listrik Anda</small></label>
              <select name="tarif" class="form-control" id="tarif" data-rule="value>0" required="value">
                <option value="">- Pilih Salah Satu -</option>
                <?php 
                $take =$conn->query("SELECT * FROM `tarif`");
                 while ($s=$take->fetch_assoc()) {
                 ?>
                <option value="<?php echo $s['id_tarif']; ?>"><?php echo $s['daya']; ?> watt</option>
              <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <textarea class="form-control" rows="5" name="alamat" id="alamat" placeholder="alamat" class="form-control" minlength="10" required placeholder="Alamat Lengkap"></textarea>
              <div class="alamat"></div>
            </div>
    
            <div class="text-center"><button type="submit" value="submit" id="validate" onclick="checkForm()" class="btn btn-primary btn-lg">Daftar</button></div>
          </form>
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.container-->
  </section>
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
      $(document).ready (function() {
       $('#RegForm').formValidation({
       framework: 'bootstrap',
       excluded: 'disabled',
       icon: {
       valid: 'glyphicon glyphicon-ok',
       invalid: 'glyphicon glyphicon-remove',
       validating: 'glyphicon glyphicon-refresh'
       },
       fields: {
       name: {
       validators: {
       notEmpty: {
       message: 'Username Tidak Boleh Kosong'
       }
       }
       },
       username: {
       validators: {
       notEmpty: {
       message: 'Username Tidak Boleh Kosong'
       }
       }
       },
       password: {
       validators: {
       notEmpty: {
       message: 'Password Tidak Boleh Kosong'
       } 
       }
       },
       nokwh: {
       validators: {
       notEmpty: {
       message: 'Kwh Tidak Boleh Kosong'
       }
       }
       },
       alamat: {
       validators: {
       notEmpty: {
       message: 'alamat Tidak Boleh Kosong'
       }
       }
       }
       }
       })
      });
      function checkNumber()
       {
       var validasiAngka = /^[0-9]+$/;
       var numbs = document.getElementById("nokwh");
       
       if (numbs.value.match(validasiAngka)) {
       
       } else {
       alert("Masukkan Format Wajib Angka!");
       numbs.focus();
       return false;
       }
       }

  </script>

</body>

</html>
