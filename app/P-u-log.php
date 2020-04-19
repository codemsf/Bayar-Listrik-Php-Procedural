<?php 

session_start();

include "act/net.php";

 if(isset($_POST['btn-login']))
 {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $pass     = md5($password);

  $log = $conn->query("SELECT * FROM pelanggan WHERE username='$username' AND password='$pass'");
  $r =$log->fetch_assoc();
  $masuk =$log->num_rows;

  if ($masuk ==1) {
      $data = array('nama'    => $r['nama'],
                    'email'   => $r['email'],
                    'norek'   => $r['nomor_kwh'],
                    'id'      => $r['id_pelanggan'],
                    'tarif'   => $r['id_tarif'],
                    'status'  => "masuk" );
      $_SESSION['user'] = $data;
      echo "<script>location='user';</script>"; 
  }
  else{
    echo "<script>alert('Maaf Username Dan Password Salah');location='login-user.php';</script>";
  }

 }

 ?>