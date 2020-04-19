<?php include "header.php"; ?>

<div id="page-content-container">
    <div class="container-fluid">
        <div class="row">
          <a href="#menu" class="btn btn-primary" id="menu">></a> 
            <div class="col-lg-12">
                <h1>Halaman Tagihan (Bill)</h1>
            </div>
        </div>
    </div>
</div>

  <section class="container-fluid">
    <div class="text-center">
     <table class="table table-bordered ">
      <thead>
        <tr>
        <td style="width: 1%;"><strong>No.</strong></td>
        <td style="width: 19%;"><strong>Nama</strong></td>
        <td style="width: 15%;"><strong>Tahun</strong></td>
        <td style="width: 15%;"><strong>Bulan</strong></td>
        <td style="width: 10%;"><strong>Kw/h Meter</strong></td>
        <td style="width: 40%;"><strong>Status</strong></td>
        </tr>
      </thead>
      <tbody>
        <?php 
        $data =$conn->query("SELECT * FROM `tagihan` LEFT OUTER JOIN pelanggan ON tagihan.id_pelanggan = pelanggan.id_pelanggan");
        $no=1;
        while ($row =$data->fetch_assoc()) {?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo ucwords($row['nama']); ?></td>
        <td><?php echo $row['tahun']; ?></td>
        <td>
            <?php if ($row['bulan']==1): ?> 
                    Januari
            <?php elseif ($row['bulan']==2):?>
                    Februari
            <?php elseif ($row['bulan']==3):?>
                    Maret
            <?php elseif ($row['bulan']==4):?>
                      April
            <?php elseif ($row['bulan']==5):?>
                      Mei
            <?php elseif ($row['bulan']==6):?>
                      Juni
            <?php elseif ($row['bulan']==7):?>
                    Juli 
            <?php elseif ($row['bulan']==8):?>
                    Agustus
            <?php elseif ($row['bulan']==9):?>
                      September
            <?php elseif ($row['bulan']==10):?>
                      Oktober
            <?php elseif ($row['bulan']==11):?>
                      November
             <?php elseif ($row['bulan']==12):?>
                      Desember
            <?php endif ?>
        </td>
        <td><?php echo $row['meter']; ?></td>
        <td><div class="">
             <?php if ($row['status']==0): ?> 
                <a href="#" class="btn btn-danger disabled">Belum Dibayar</a>
            <?php elseif ($row['status']==1):?>
                <a href="#" class="btn btn-warning disabled">Menunggu Konfirmasi Bank</a>
            <?php elseif ($row['status']==2):?>
                <a href="#" class="btn btn-success disabled">Terbayar Dan Terkonfirmasi</a>
            <?php endif ?>
        </div></td>
        </tr>
        <?php $no++;
        }?>
      </tbody>
    </table>
    </div>
  </section>

<?php include "footer.php"; ?>