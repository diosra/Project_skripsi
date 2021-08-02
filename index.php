<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <?php
    include_once 'header.php';
    $pageskr = 'dashboard';
    ?>
</head>

</html>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Tampilan Card total data hanya untuk admin dan pegawai -->
    <?php
    $level = $_SESSION['level'];
    $tekcheck = $_SESSION['t_check'];
    if ($level == 2) {
    ?>
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
            $data = mysqli_query($mysqli, "select * from tb_mohon_pb WHERE status_survey = '0'");
            $hitungrow2 = mysqli_num_rows($data);
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Masuk Permohonan Pasang Baru</div>
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
            $data = mysqli_query($mysqli, "select * from tb_mohon_pd WHERE status_survey = '0'");
            $hitungrow3 = mysqli_num_rows($data);
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Masuk Permohonan Perubahan Daya</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hitungrow3 ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jumlah Data Multiguna -->
            <?php
            $data = mysqli_query($mysqli, "select * from tb_mohon_multiguna WHERE status_survey = '0'");
            $hitungrow2 = mysqli_num_rows($data);
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Masuk Permohonan Sambung Sementara</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hitungrow2 ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr style="border-top: 1px solid #8c8b8b; border-bottom: 1px solid #fff;">
    <?php
    } elseif ($level == 1) {
    ?>
        <!-- Jumlah Data User -->
        <?php
        $data = mysqli_query($mysqli, "select * from tb_data_user");
        $hitungrow2 = mysqli_num_rows($data);
        ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Data User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hitungrow2 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-database fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr style="border-top: 1px solid #8c8b8b; border-bottom: 1px solid #fff;">
    <?php
    } elseif ($level == 4 && $tekcheck == 2) {
    ?>
        <!-- Jumlah Data Pengaduan Masuk untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data = mysqli_query($mysqli, "SELECT a.* , b.* , c.id_teknisi FROM tb_tekpen_lap_masuk a JOIN tb_pengaduan b ON a.id_pengaduan = b.id_pengaduan JOIN tb_teknisi_pengaduan c ON a.id_teknisi = c.id_teknisi  WHERE a.op_acc = 1 && c.nama = '$nama' && b.status = 'Dalam Proses'");
        $hitungrow2 = mysqli_num_rows($data);
        ?>

        <!-- Jumlah Data Pengaduan Progres untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data2 = mysqli_query($mysqli, "SELECT a.* , b.* , c.id_teknisi FROM tb_tekpen_lap_masuk a JOIN tb_pengaduan b ON a.id_pengaduan = b.id_pengaduan JOIN tb_teknisi_pengaduan c ON a.id_teknisi = c.id_teknisi  WHERE a.op_acc = 1 && c.nama = '$nama' && b.status = 'belum selesai'");
        $hitungrow3 = mysqli_num_rows($data2);
        ?>

        <!-- Jumlah Data Pengaduan Selesai untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data3 = mysqli_query($mysqli, "SELECT a.* , b.* , c.id_teknisi FROM tb_tekpen_lap_masuk a JOIN tb_pengaduan b ON a.id_pengaduan = b.id_pengaduan JOIN tb_teknisi_pengaduan c ON a.id_teknisi = c.id_teknisi  WHERE c.nama = '$nama' && b.status = 'selesai'");
        $hitungrow4 = mysqli_num_rows($data3);
        ?>

        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Pengaduan Masuk
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow2 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Pengaduan yang masih dalam proses
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow3 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Pengaduan yang sudah diselesaikan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow4 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <hr style="border-top: 1px solid #8c8b8b; border-bottom: 1px solid #fff;">
    <?php
    } elseif ($level == 3) {
    ?>
        <div class="row">
            <!-- Jumlah Data Pengaduan Masuk -->
            <?php
            $data = mysqli_query($mysqli, "SELECT * FROM tb_pengaduan WHERE teknisi='' && status=''");
            $hitungrow2 = mysqli_num_rows($data);
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Laporan Pengaduan yang masuk
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow2 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jumlah Data Pengaduan Proses -->
            <?php
            $data = mysqli_query($mysqli, "select * from tb_pengaduan WHERE status='Dalam Proses' || status='belum selesai'");
            $hitungrow2 = mysqli_num_rows($data);
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Laporan Pengaduan yang masih Dalam Proses
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow2 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jumlah Data Pengaduan Selesai -->
            <?php
            $data = mysqli_query($mysqli, "select * from tb_pengaduan WHERE status='selesai'");
            $hitungrow2 = mysqli_num_rows($data);
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Laporan Pengaduan yang Selesai
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow2 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr style="border-top: 1px solid #8c8b8b; border-bottom: 1px solid #fff;">
    <?php
    } elseif ($level == 5) {
    ?>
        <!-- Jumlah Data Pengaduan Masuk untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_mohon_pb a JOIN tb_survey_lap_masuk b ON a.id_mohon = b.id_mohon_survey JOIN tb_petugas_survey c ON c.no_petugas_survey = b.id_petugas WHERE b.pegawai_acc = 1 && b.tipe = 'Survey Pasang Baru' && c.nama = '$nama' && a.status_survey = 1");
        $hitungrow2 = mysqli_num_rows($data);
        ?>

        <!-- Jumlah Data Pengaduan Progres untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data2 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_mohon_pb a JOIN tb_survey_lap_masuk b ON a.id_mohon = b.id_mohon_survey JOIN tb_petugas_survey c ON c.no_petugas_survey = b.id_petugas WHERE b.pegawai_acc = 1 && b.tipe = 'Survey Pasang Baru' && c.nama = '$nama' && a.status_survey = 2");
        $hitungrow3 = mysqli_num_rows($data2);
        ?>

        <!-- Jumlah Data Pengaduan Selesai untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data3 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_mohon_pb a JOIN tb_survey_lap_masuk b ON a.id_mohon = b.id_mohon_survey JOIN tb_petugas_survey c ON c.no_petugas_survey = b.id_petugas WHERE b.pegawai_acc = 1 && b.tipe = 'Survey Pasang Baru' && c.nama = '$nama' && a.status_survey = 3");
        $hitungrow4 = mysqli_num_rows($data3);
        ?>

        <!-- Jumlah Data Pengaduan Selesai untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data4 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_mohon_pb a JOIN tb_survey_lap_masuk b ON a.id_mohon = b.id_mohon_survey JOIN tb_petugas_survey c ON c.no_petugas_survey = b.id_petugas WHERE b.pegawai_acc = 1 && b.tipe = 'Survey Pasang Baru' && c.nama = '$nama' && a.status_survey = 4");
        $hitungrow5 = mysqli_num_rows($data4);
        ?>

        <!-- Baris Pasang Baru -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Survey Pasang Baru Masuk
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow2 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Survey Pasang Baru yang masih dalam proses
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow3 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Survey Pasang Baru yang sudah diselesaikan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow4 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Survey Pasang Baru yang Ditolak
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow5 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Jumlah Data Pengaduan Masuk untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_mohon_pd a JOIN tb_survey_lap_masuk b ON a.id_mohon = b.id_mohon_survey JOIN tb_petugas_survey c ON c.no_petugas_survey = b.id_petugas WHERE b.pegawai_acc = 1 && b.tipe = 'Survey Perubahan Daya' && c.nama = '$nama' && a.status_survey = 1");
        $hitungrow2 = mysqli_num_rows($data);
        ?>

        <!-- Jumlah Data Pengaduan Progres untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data2 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_mohon_pd a JOIN tb_survey_lap_masuk b ON a.id_mohon = b.id_mohon_survey JOIN tb_petugas_survey c ON c.no_petugas_survey = b.id_petugas WHERE b.pegawai_acc = 1 && b.tipe = 'Survey Perubahan Daya' && c.nama = '$nama' && a.status_survey = 2");
        $hitungrow3 = mysqli_num_rows($data2);
        ?>

        <!-- Jumlah Data Pengaduan Selesai untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data3 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_mohon_pd a JOIN tb_survey_lap_masuk b ON a.id_mohon = b.id_mohon_survey JOIN tb_petugas_survey c ON c.no_petugas_survey = b.id_petugas WHERE b.pegawai_acc = 1 && b.tipe = 'Survey Perubahan Daya' && c.nama = '$nama' && a.status_survey = 3");
        $hitungrow4 = mysqli_num_rows($data3);
        ?>

        <!-- Jumlah Data Pengaduan Selesai untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data4 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_mohon_pd a JOIN tb_survey_lap_masuk b ON a.id_mohon = b.id_mohon_survey JOIN tb_petugas_survey c ON c.no_petugas_survey = b.id_petugas WHERE b.pegawai_acc = 1 && b.tipe = 'Survey Perubahan Daya' && c.nama = '$nama' && a.status_survey = 4");
        $hitungrow5 = mysqli_num_rows($data4);
        ?>



        <!-- Baris Perubahan Daya -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Survey Perubahan Daya Masuk
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow2 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Survey Perubahan Daya yang masih dalam proses
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow3 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Survey Perubahan Daya yang sudah diselesaikan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow4 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Survey Perubahan Daya yang Ditolak
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow5 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Data Pengaduan Masuk untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_mohon_multiguna a JOIN tb_survey_lap_masuk b ON a.id_mohon = b.id_mohon_survey JOIN tb_petugas_survey c ON c.no_petugas_survey = b.id_petugas WHERE b.pegawai_acc = 1 && b.tipe = 'Survey Penyambungan Sementara' && c.nama = '$nama' && a.status_survey = 1");
        $hitungrow2 = mysqli_num_rows($data);
        ?>

        <!-- Jumlah Data Pengaduan Progres untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data2 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_mohon_multiguna a JOIN tb_survey_lap_masuk b ON a.id_mohon = b.id_mohon_survey JOIN tb_petugas_survey c ON c.no_petugas_survey = b.id_petugas WHERE b.pegawai_acc = 1 && b.tipe = 'Survey Penyambungan Sementara' && c.nama = '$nama' && a.status_survey = 2");
        $hitungrow3 = mysqli_num_rows($data2);
        ?>

        <!-- Jumlah Data Pengaduan Selesai untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data3 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_mohon_multiguna a JOIN tb_survey_lap_masuk b ON a.id_mohon = b.id_mohon_survey JOIN tb_petugas_survey c ON c.no_petugas_survey = b.id_petugas WHERE b.pegawai_acc = 1 && b.tipe = 'Survey Penyambungan Sementara' && c.nama = '$nama' && a.status_survey = 3");
        $hitungrow4 = mysqli_num_rows($data3);
        ?>

        <!-- Jumlah Data Pengaduan Selesai untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data4 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_mohon_multiguna a JOIN tb_survey_lap_masuk b ON a.id_mohon = b.id_mohon_survey JOIN tb_petugas_survey c ON c.no_petugas_survey = b.id_petugas WHERE b.pegawai_acc = 1 && b.tipe = 'Survey Penyambungan Sementara' && c.nama = '$nama' && a.status_survey = 4");
        $hitungrow5 = mysqli_num_rows($data4);
        ?>

        <!-- Baris Multiguna -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Survey Sambung Sementara Masuk
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow2 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Survey Sambung Sementara yang masih dalam proses
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow3 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Survey Sambung Sementara yang sudah diselesaikan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow4 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Survey Sambung Sementara yang Ditolak
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow5 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr style="border-top: 1px solid #8c8b8b; border-bottom: 1px solid #fff;">
    <?php
    } elseif ($level == 4 && $tekcheck == 1) {
    ?>
        <!-- Jumlah Data Pengaduan Masuk untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_pasang_baru a JOIN tb_tekyan_lap_masuk b ON a.id_pasang_baru = b.id_yanbung JOIN tb_teknisi_penyambungan c ON c.no_teknisi = b.id_teknisi WHERE b.pegawai_acc = 1 && b.tipe = 'Pasang Baru' && c.nama = '$nama' && a.status_teknisi = 1");
        $hitungrow2 = mysqli_num_rows($data);
        ?>

        <!-- Jumlah Data Pengaduan Progres untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data2 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_pasang_baru a JOIN tb_tekyan_lap_masuk b ON a.id_pasang_baru = b.id_yanbung JOIN tb_teknisi_penyambungan c ON c.no_teknisi = b.id_teknisi WHERE b.pegawai_acc = 1 && b.tipe = 'Pasang Baru' && c.nama = '$nama' && a.status_teknisi = 2");
        $hitungrow3 = mysqli_num_rows($data2);
        ?>

        <!-- Jumlah Data Pengaduan Selesai untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data3 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_pasang_baru a JOIN tb_tekyan_lap_masuk b ON a.id_pasang_baru = b.id_yanbung JOIN tb_teknisi_penyambungan c ON c.no_teknisi = b.id_teknisi WHERE b.pegawai_acc = 1 && b.tipe = 'Pasang Baru' && c.nama = '$nama' && a.status_teknisi = 3");
        $hitungrow4 = mysqli_num_rows($data3);
        ?>

        <!-- Baris Pasang Baru -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Tugas Pasang Baru Masuk
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow2 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Tugas Pasang Baru yang masih dalam proses
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow3 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Tugas Pasang Baru yang sudah diselesaikan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow4 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Jumlah Data Pengaduan Masuk untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_perubahan_daya a JOIN tb_tekyan_lap_masuk b ON a.id_perubahan_daya = b.id_yanbung JOIN tb_teknisi_penyambungan c ON c.no_teknisi = b.id_teknisi WHERE b.pegawai_acc = 1 && b.tipe = 'Perubahan Daya' && c.nama = '$nama' && a.status_teknisi = 1");
        $hitungrow2 = mysqli_num_rows($data);
        ?>

        <!-- Jumlah Data Pengaduan Progres untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data2 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_perubahan_daya a JOIN tb_tekyan_lap_masuk b ON a.id_perubahan_daya = b.id_yanbung JOIN tb_teknisi_penyambungan c ON c.no_teknisi = b.id_teknisi WHERE b.pegawai_acc = 1 && b.tipe = 'Perubahan Daya' && c.nama = '$nama' && a.status_teknisi = 2");
        $hitungrow3 = mysqli_num_rows($data2);
        ?>

        <!-- Jumlah Data Pengaduan Selesai untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data3 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_perubahan_daya a JOIN tb_tekyan_lap_masuk b ON a.id_perubahan_daya = b.id_yanbung JOIN tb_teknisi_penyambungan c ON c.no_teknisi = b.id_teknisi WHERE b.pegawai_acc = 1 && b.tipe = 'Perubahan Daya' && c.nama = '$nama' && a.status_teknisi = 3");
        $hitungrow4 = mysqli_num_rows($data3);
        ?>

        <!-- Baris Perubahan Daya -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Tugas Perubahan Daya Masuk
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow2 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Tugas Perubahan Daya yang masih dalam proses
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow3 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Tugas Perubahan Daya yang sudah diselesaikan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow4 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Data Pengaduan Masuk untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_multiguna a JOIN tb_tekyan_lap_masuk b ON a.id_mlta = b.id_yanbung JOIN tb_teknisi_penyambungan c ON c.no_teknisi = b.id_teknisi WHERE b.pegawai_acc = 1 && b.tipe = 'Penyambungan Sementara' && c.nama = '$nama' && a.status_teknisi = 1");
        $hitungrow2 = mysqli_num_rows($data);
        ?>

        <!-- Jumlah Data Pengaduan Progres untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data2 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_multiguna a JOIN tb_tekyan_lap_masuk b ON a.id_mlta = b.id_yanbung JOIN tb_teknisi_penyambungan c ON c.no_teknisi = b.id_teknisi WHERE b.pegawai_acc = 1 && b.tipe = 'Penyambungan Sementara' && c.nama = '$nama' && a.status_teknisi = 2");
        $hitungrow3 = mysqli_num_rows($data2);
        ?>

        <!-- Jumlah Data Pengaduan Selesai untuk teknisi pengaduan -->
        <?php
        $nama = $_SESSION['nama'];
        $data3 = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_multiguna a JOIN tb_tekyan_lap_masuk b ON a.id_mlta = b.id_yanbung JOIN tb_teknisi_penyambungan c ON c.no_teknisi = b.id_teknisi WHERE b.pegawai_acc = 1 && b.tipe = 'Penyambungan Sementara' && c.nama = '$nama' && a.status_teknisi = 3");
        $hitungrow4 = mysqli_num_rows($data3);
        ?>

        <!-- Baris Multiguna -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Tugas Sambung Sementara Masuk
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow2 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Tugas Sambung Sementara yang masih dalam proses
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow3 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Tugas Sambung Sementara yang sudah diselesaikan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $hitungrow4 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr style="border-top: 1px solid #8c8b8b; border-bottom: 1px solid #fff;">
    <?php
    } elseif ($level == 6) {
    ?>
    <?php
    }
    ?>

    <!-- Profil Perusahaan -->
    <div class="text-center mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Profil Perusahaan</h1>

        <!-- Riwayat Singkat -->
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary text-center">Riwayat Singkat PLN</h3>
            </div>
            <div class="card-body">
                <p>Berawal di akhir abad 19, bidang pabrik gula dan pabrik ketenagalistrikan di Indonesia mulai ditingkatkan saat beberapa perusahaan asal Belanda yang bergerak di bidang pabrik gula dan pebrik teh mendirikan pembangkit tenaga lisrik untuk keperluan sendiri</p>

                <p>Antara tahun 1942-1945 terjadi peralihan pengelolaan perusahaan-perusahaan Belanda tersebut oleh Jepang, setelah Belanda menyerah kepada pasukan tentara Jepang di awal Perang Dunia II</p>

                <p>Proses peralihan kekuasaan kembali terjadi di akhir Perang Dunia II pada Agustus 1945, saat Jepang menyerah kepada Sekutu. Kesempatan ini dimanfaatkan oleh para pemuda dan buruh listrik melalui delagasi Buruh/Pegawai Listrik dan Gas yang bersama-sama dengan Pemimpin KNI Pusat berinisiatif menghadap Presiden Soekarno untuk menyerahkan perusahaan-perusahaan tersebut kepada Pemerintah Republik Indonesia. Pada 27 Oktober 1945, Presiden Soekarno membentuk Jawatan Listrik dan Gas di bawah Departemen Pekerjaan Umum dan Tenaga dengan kapasitas pembangkit tenaga listrik sebesar 157,5 MW.</p>

                <p>Pada tanggal 1 januari 1961, Jawatan Listrik dan Gas diubah menjadi BPU-PLN (Bada Pemimpin Umum Perusahaan Listrik Negara) yang bergerak di bidang listrik, gas dan kokas yang dibubarkan pada tanggal 1 Januari 1965. Pada saat yang sama, 2 (dua) perusahaan negara yaitu Perusahaan Listrik Negara (PLN) sebagai pengelola tenaga listrik milik negara dan Perusahaan Gas Negara (PGN) sebagai pengelola gas diresmikan.</p>

                <p>Pada tahun 1972, sesuai dengan Peraturan Pemerintah No. 17, status Perusahaan Listrik Negara (PLN) ditetapkan sebagai Perusahaan Umum Listrik Negara dan sebagai Pemegang Kuasa Usaha Ketenagalistrikan (PKUK) dengan tugas menyediakan tenaga listrik bagi kepentingan umum.</p>

                <p>Seiring dengan kebijakan Pemerintah yang memberikan kesempatan kepada sektor swasta untuk bergerak dalam bisnis penyediaan listrik, maka sejak tahun 1994 status PLN beralih dari Perusahaan Umum menjadi Perusahaan Perseroan (Persero) dan juga sebagai PKUK dalam menyediakan listrik bagi kepentingan umum hingga sekarang</p>
            </div>
        </div>

        <!-- Visi dan Misi -->
        <div class="row">
            <!-- Visi -->
            <div class="card shadow col mr-2">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-primary text-center">Visi</h3>
                </div>
                <div class="card-body">
                    Menjadi Perusahaan Listrik Terkemuka se-Asia Tenggara dan #1 Pilihan Pelanggan untuk Solusi Energi.
                </div>
            </div>

            <!-- Misi -->
            <div class="card shadow col">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-primary text-center">Misi</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <li>
                            Menjalankan bisnis kelistrikan dan bidang lain yang terkait, berorientasi pada kepuasan pelanggan, anggota perusahaan dan pemegang saham.
                        </li>
                        <li>
                            Menjadikan tenaga listrik sebagai media untuk meningkatkan kualitas kehidupan masyarakat.
                        </li>
                        <li>
                            Mengupayakan agar tenaga listrik menjadi pendorong kegiatan ekonomi.
                        </li>
                        <li>
                            Menjalankan kegiatan usaha yang berwawasan lingkungan.
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <h1 class="h3 mt-4 mb-2 text-gray-800 font-weight-bold">Struktur Organisasi</h1>

        <!-- STRUKTUR ORGANISASI -->
        <div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;resize&quot;:true,&quot;toolbar&quot;:&quot;zoom layers lightbox&quot;,&quot;edit&quot;:&quot;_blank&quot;,&quot;xml&quot;:&quot;&lt;mxfile host=\&quot;app.diagrams.net\&quot; modified=\&quot;2021-06-23T05:18:32.138Z\&quot; agent=\&quot;5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36\&quot; etag=\&quot;3KUM-FBaLilYTwqfS5ag\&quot; version=\&quot;14.8.0\&quot; type=\&quot;device\&quot;&gt;&lt;diagram name=\&quot;Page-1\&quot; id=\&quot;b98fa263-6416-c6ec-5b7d-78bf54ef71d0\&quot;&gt;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&lt;/diagram&gt;&lt;/mxfile&gt;&quot;}">
        </div>
        <script type="text/javascript" src="https://viewer.diagrams.net/js/viewer-static.min.js"></script>
    </div>

</div>
<!-- /.container-fluid -->
<?php
include_once 'footer.php';
?>
</div>
<!-- End of Main Content -->