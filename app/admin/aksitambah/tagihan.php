<?php 
include "headerdalam.php";
//ambil data kunci
$id_penggunaan =$_GET['id'];//id penggunaan pada database
$id_pelanggan  =$_GET['idpeng'];//id pelanggan pada database

//ambil data dari tabbel penggunaan
$data =$conn->query("SELECT * FROM `penggunaan` WHERE `id_penggunaan`= '$id_penggunaan' AND `id_pelanggan`= '$id_pelanggan'");
//konfersi ke array
$row =$data->fetch_assoc();
//status kunci proses pertama
$status =0;
$tahun  = $row['tahun'];
$bulan  = $row['bulan'];
$meter  = $row['meter'];

$query ="INSERT INTO `tagihan`(`id_pelanggan`, `id_penggunaan`, `bulan`, `tahun`, `meter`, `status`) VALUES ('$id_pelanggan','$id_penggunaan','$bulan','$tahun','$meter','$status')";


/*var_dump($query);*/

if (mysqli_query($conn,$query)) {
   $e = 1;
   $event ="UPDATE `penggunaan` SET `event`= '$e' WHERE `id_penggunaan`= '$id_penggunaan' AND `id_pelanggan`= '$id_pelanggan'";
   
   mysqli_query($conn , $event);

   echo "<script>alert('Tagihan Telah Di Proses');location='../data-pengguna.php?id=".$id_pelanggan."';</script>";
 }else{
   echo "gagal";
 }
// echo print_r($row);


 ?>