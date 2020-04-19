<?php include "nav.php"; ?>

<div id="page-content-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3>Detil Pembayaran Selengkapnya</h3>
                <a href="#menu" class="btn btn-primary" id="menu">Menu</a>
            </div>
        </div>
    </div>
</div>
<section class="container-fluid">
	<div class="content">
		<table class="table table-striped " style="width: 50%;margin-left: 25%;">
			<?php 
			$idpem = $_GET['idpem'];
			$data =$conn->query("SELECT * FROM pembayaran , pelanggan WHERE pembayaran.id_pelanggan = pelanggan.id_pelanggan AND `id_pembayaran`= '$idpem'");
			$r =$data->fetch_assoc();
			 ?>
			<thead>
				<tr>
					<td colspan="2"><h3>Detil Pembayaran & Konfirmasi</h3></td>
				</tr>
			</thead>
			<tbody>
				<tr>
				<td><strong>Nama :</strong> <?php echo ucwords($r['nama']); ?></td>
				<td><strong>Tahun :</strong> <?php echo $r['tahun_bayar']; ?></td>
			</tr>
			<tr>
				<td><strong>Bulan :</strong> <?php if ($r['bulan_bayar']==1): ?>Januari
	            <?php elseif ($r['bulan_bayar']==2):?>Februari
	            <?php elseif ($r['bulan_bayar']==3):?>Maret
	            <?php elseif ($r['bulan_bayar']==4):?>April
	            <?php elseif ($r['bulan_bayar']==5):?>Mei
	            <?php elseif ($r['bulan_bayar']==6):?>Juni
	            <?php elseif ($r['bulan_bayar']==7):?>Juli 
	            <?php elseif ($r['bulan_bayar']==8):?>Agustus
	            <?php elseif ($r['bulan_bayar']==9):?>September
	            <?php elseif ($r['bulan_bayar']==10):?>Oktober
	            <?php elseif ($r['bulan_bayar']==11):?>November
	            <?php elseif ($r['bulan_bayar']==12):?>Desember
	            <?php endif ?>
				</td>
				<td><strong>Tanggal Bayar :</strong> <?php echo date('d F Y', strtotime($r['tanggal_pembayaran'])); ?></td>
			</tr>
			<tr>
				<td><strong>Biaya Admin :</strong> Rp.<?php echo number_format($r['biaya_admin']); ?></td>
				<td><strong>Biaya Tagihan:</strong> Rp.<?php echo number_format($r['total_bayar']-$r['biaya_admin']); ?></td>
			</tr>
			<tr>
				<td><strong>Total :</strong></td>
				<td>Rp.<?php echo number_format($r['total_bayar']); ?></td>
			</tr>
			<tr>
				<td><strong>Nomor Kartu kredit :</strong></td>
				<td><?php echo $r['noKk']; ?></td>
			</tr>
			<tr>
				<td colspan="2" style="padding-top: 20px;">
					<form method="post">
					<button type="submit" name="submit" value="submit" class="btn btn-success" style="float: right;">Konfirmasi Pembayaran</button>
					</form>
				</td>
			</tr>
			<?php 
			$ipet =$_SESSION['bankir']['id'];
			$st2=2;
			$itag =$r['id_tagihan'];
			if (isset($_POST['submit'])) {
				$conn->query("UPDATE `pembayaran` SET `id_admin`=$ipet,`status`='$st2' WHERE `id_pembayaran`= '$idpem'");
				$conn->query("UPDATE `tagihan` SET `status`='$st2' WHERE `id_tagihan`='$itag'");

				echo "<script>alert('Berhasil Dikonfirmasi');location='riwayat.php'</script>";
			}
			 ?>
			</tbody>
		</table>
	</div>
</section>

<?php include "footer.php"; ?>