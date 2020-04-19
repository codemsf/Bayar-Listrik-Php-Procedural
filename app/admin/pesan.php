<?php include "header.php"; ?>
<div id="page-content-container">
    <div class="container-fluid">
        <div class="row">
           <a href="#menu" class="btn btn-primary" id="menu">></a> 
        </div>
    </div>
</div>
	<div class="container-fluid">
		<div class="col-md-6">
			<table class="table table-striped ">
				<thead>
					<tr>
						<td style="width: 1%;"><strong>No.</strong></td>
						<td style="width: 24%;"><strong>Nama</strong></td>
						<td style="width: 40%;"><strong>Email</strong></td>
						<td style="width: 40%;"><strong>Aksi</strong></td>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no =1;
					$ambil = $conn->query("SELECT * FROM `pesan` ORDER BY id_pesan DESC");
					while ($r =$ambil->fetch_assoc()) {?>
					<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo ucwords($r['nama']); ?></td>
					<td><a href="<?php echo $r['email']; ?>"><?php echo $r['email']; ?></a></td>
					<td><a href="baca.php?id=<?php echo $r['id_pesan'];?>" class="btn btn-info">Baca</a></td>
					</tr>
					<?php $no++;} ?>
				</tbody>
			</table>
		</div>
	</div>


<?php include"footer.php" ?>