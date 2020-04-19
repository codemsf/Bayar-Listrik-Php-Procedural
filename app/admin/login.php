<?php 
session_start();
if (isset($_SESSION['admin'])) 
{
  echo "<script>location='index.php'</script>";
 }
 else if (isset($_SESSION['bankir'])) {
  echo "<script>location='../bank/index.php'</script>";
 }
 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>BAYARLISTRIK.COM</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="../css/font-awesome.css">
  	<style type="text/css">
  		body{
  			background-color: #23dea6;
  		}
  		.thumbnail , .isikanan{
  			padding: 6%;
  			margin-top: 12%;
  		}
  	</style>
</head>
<body>
	<div class="container" >
		<div class="content">
			<div class="row">
				<div class="thumbnail col-md-4 shadow-lg p-3 mb-5 rounded">
					<div class="text-center">
						<h2>Login Administrator</h2><hr>
					</div>
					<form class="form-login" method="POST" id="Login" action="../act/P-log-Admin.php">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" id="username1" placeholder="Masukkan disini .." onblur="validate('username',this.value)" required>
							<div id="username" class="text-center"></div>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" id="password1" placeholder="Masukkan disini .." onblur="validate('password',this.value)" required>
							<div id="password" class="text-center"></div>
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-lg form-control" style="margin-top:8%;height: 4%;" onclick="checkForm()">Masuk</button>
						</div>
					</form>
				</div>
				<div class="col-md-8 isikanan text-center" style="color: #fff;">
					<h2>SILAHKAN LOGIN SEBAGAI</h2>
          <h2> Admin / Para Staff Bank</h2>
					<span class="fa fa-user" style="font-size: 300px;"></span>
				</div>
			</div>
		</div>
	</div>

	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript">
	
	function checkForm(){
    //mengambil niai
    var username = document.getElementById("username1").value;
    var password = document.getElementById("password1").value;

    if (username==''||password=='') {
      alert("Isi Semua Kolom");
    }
    else{
      //notifikasi error
      var username1 = document.getElementById("username").value;
      var password1 = document.getElementById("password").value;
      //periksa semua Nilai
          if (username1.innerHTML == 'Harus Lebih Dari tiga Huruf' || password1.innerHTML == 'Password Terlalu Pendek') {
            alert("Masukkan Data Valid");
          }else{
            //submit semua form bila sudah valid
            document.getElementById("Login").submit();
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
    document.getElementById(field).innerHTML = "Error Occurred. <a href='login.php'>Reload Or Try Again</a> the page.";
    }
    }
    xmlhttp.open("GET", "validasi-login.php?field=" + field + "&query=" + query, false);
    xmlhttp.send();
  }

	</script>
</body>
</html>