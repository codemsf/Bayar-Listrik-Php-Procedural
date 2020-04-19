<?php include"header.php"; ?> 

  

  <section id="contact-page" style="margin-top: 12%; margin-bottom: 6%;">
    <div class="container">
      <div class="text-center">
        <h2>Masuk ke Akun Anda</h2>
        <p>Untuk mendapatkan akses layanan kami</p>
      </div>
      <div class="row contact-wrap">
        <div class="col-md-8 col-md-offset-2">
           <!-- <div id="sendmessage">Anda Telah Berhasil Mendaftar</div>
          <div id="errormessage"></div> -->
          <div id="error"></div>
          
          <form action="P-u-log.php" method="post" role="form" class="contactForm" id="Login">
            
            <div class="form-group">
              <input type="text" name="username" class="form-control" id="username" placeholder="Username" data-rule="minlen:4" style="width: 50%;margin-left: 25% ;" />
              <div class="username"></div>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" data-rule="minlen:6" style="width: 50%;margin-left: 25% ;"/>
              <div class="password"></div>
            </div>
            <div class="text-right">
              <a href="register.php" style="margin-right: 25%;"><i>Belum memiliki akun ?</i></a>
            </div>
    
            <div class="text-center"><button type="submit" class="btn btn-primary btn-lg " id="btn-login" name="btn-login">Masuk</button></div>
          </form>
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.container-->
  </section>

  
  <script src="js/jquery-2.1.1.min.js"></script>
  
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
 

</body>

</html>
