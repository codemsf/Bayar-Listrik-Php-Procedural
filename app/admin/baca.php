<?php include "header.php"; ?>

<?php 
$ipes =$_GET['id'];
$conn->query("UPDATE `pesan` SET `status`='1' WHERE `id_pesan`='$ipes'");
 ?>
<div id="page-content-container">
    <div class="container-fluid">
        <div class="row">
                 <a href="#menu" class="btn btn-primary" id="menu">></a> 
            <div class="col-lg-12">
                <h1>Baca Pesan </h1>
                <a href="pesan.php" class="btn btn-info">Kembali <span class="fa fa-arrow-left"></span></a>
            </div>
        </div>
    </div>
</div>
	<div class=" col-md-6">
		<form>
			<?php $tahe =$conn->query("SELECT * FROM `pesan` WHERE `id_pesan`='$ipes'");
			$isi = $tahe->fetch_assoc(); ?>
			<div class="form-group">
				<input type="text" class="form-control disabled" value="<?php echo ucwords($isi['nama']); ?>"disabled>
			</div>
			<div class="form-group">
				<input type="text" class="form-control disabled" value="<?php echo ucwords($isi['subjek']); ?>" disabled>
			</div>
			<div class="form-group">
				<textarea class="form-control disabled" rows="5" value="" disabled><?php echo $isi['pesan']; ?></textarea>
			</div>
		</form>
	</div>


<?php include"footer.php" ?>