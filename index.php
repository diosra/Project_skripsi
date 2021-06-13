<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <?php
    include_once 'header.php';
    ?>
</head>

</html>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Selamat Datang ke website PLN</h1>
    </div>

    <!-- Card - Nampilkan Jumlah Data -->
    <div class="row">

        <!-- Jumlah Data Pelanggan -->
        <?php
        $data = mysqli_query($mysqli, "select * from tb_pelanggan");
        $hitungrow = mysqli_num_rows($data);
        ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Data Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hitungrow ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Data Pasang Baru -->
        <?php
        $data = mysqli_query($mysqli, "select * from tb_pasang_baru");
        $hitungrow2 = mysqli_num_rows($data);
        ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Data Pasang Baru</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hitungrow2 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-database fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Data Perubahan Daya -->
        <?php
        $data = mysqli_query($mysqli, "select * from tb_perubahan_daya");
        $hitungrow3 = mysqli_num_rows($data);
        ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Data Perubahan Daya</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hitungrow3 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-database fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <img class="shadow mb-2 img-fluid" src="img/Dashboard.jpg" alt="">
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include_once 'footer.php';
?>