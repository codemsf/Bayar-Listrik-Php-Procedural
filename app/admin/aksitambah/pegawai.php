<?php include "headerdalam.php"; ?>

<div id="page-content-container">
</div>
  <section class="container-fluid"> 
    <div class="">
      <div class="text-center">
        <h2>Pendaftaran Staf Bank Baru</h2>
        <p><i><small>Pastikan Pendaftaran pegawai baru yang sudah mengkontak admin untuk mengelola pembayaran dari aplikasi ini.</small></i></p>
        <hr>
      </div>
<div class="row contact-wrap">
        <div class="col-md-8 col-md-offset-2">
          <form action="../../act/P-add-staf.php" method="post" role="form" id="stafForm" class="contactForm">
            
            <div class="form-group"> 
              <input type="text" name="name" class="form-control" id="name1" placeholder="Nama" onblur="validate('name',this.value)" required />
              <div id="name"></div>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" name="email" id="email1" placeholder="Email" onblur="validate('email',this.value)" required />
              <div id="email"></div>
            </div>

            <div class="form-group">
              <input type="text" name="username" class="form-control" id="username1" placeholder="Username" onblur="validate('username',this.value)" required />
              <div id="username"></div>
            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password1" placeholder="Password" onblur="validate('password',this.value)" required />
              <div id="password"></div>
            </div>

            <div class="form-group">
              <input type="number" name="nopeg" class="form-control" id="nopeg1" placeholder="Nomor Pegawai" onblur="validate('nopeg',this.value)" required />
              <div id="nopeg"></div>
            </div>

            <div class="text-center"><button type="submit" value="submit" onclick="checkForm()" class="btn btn-primary">Daftar</button></div>
          </form>
        </div>
      </div>
    </div>
  </section>
   <script src="../js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
  function checkForm(){
    //mengambil niai
    var name = document.getElementById("name1").value;
    var email = document.getElementById("email1").value;
    var username = document.getElementById("username1").value;
    var password = document.getElementById("password1").value;
    var nopeg = document.getElementById("nopeg1").value;

    if (name ==''|| email==''||username==''||password==''||nopeg=='') {
      alert("Isi Semua Kolom");
    }
    else{
      //notifikasi error
      var name1 = document.getElementById("name").value;
      var email1 = document.getElementById("email").value;
      var username1 = document.getElementById("username").value;
      var password1 = document.getElementById("password").value;
      var nopeg1 = document.getElementById("nopeg").value;
      //periksa semua Nilai
          if (name1.innerHTML == 'Harus Lebih Dari tiga Huruf' || email1.innerHTML == 'Email Tak Valid' || username1.innerHTML == 'Harus Lebih Dari tiga Huruf' || password1.innerHTML == 'Password Terlalu Pendek') {
            alert("Masukkan Data Valid");
          }else{
            //submit semua form bila sudah valid
            document.getElementById("stafForm").submit();
          }

    }
  }
  //AJAX
  function validate(field ,query ){
    var xmlhttp;
        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
        }
        else{
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
    document.getElementById(field).innerHTML = "Validating..";
      } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    document.getElementById(field).innerHTML = xmlhttp.responseText;
      } else {
    document.getElementById(field).innerHTML = "Error Occurred. <a href='pegawai.php'>Reload Or Try Again</a> the page.";
    }
    }
    xmlhttp.open("GET", "../validasi-staf-bank.php?field=" + field + "&query=" + query, false);
    xmlhttp.send();
  }
  
</script>

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