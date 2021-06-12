<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Pasang Baru</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <?php
    include '../../koneksi.php';
    ?>
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Logo -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mt-2 mb-3" href="../../index.html">
                <div class="img-responsive">
                    <img class="img-thumbnail" src="../../img/logo.png">
                </div>
            </a>
            <!-- Logo end -->

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../../index.html">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Dashboard end -->

            <hr class="sidebar-divider">

            <!-- Nav Item - Menu Pelanggan -->
            <li class="nav-item">
                <a class="nav-link" href="../../pelanggan/pelanggan.php">
                    <i class="fas fa-user-friends"></i></i>
                    <span>Menu Data Pelanggan</span></a>
            </li>

            <!-- Nav Item Sidebar - Menu Pelayanan Penyambungan -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-list-ul"></i>
                    <span>Menu Pelayanan Penyambungan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <ul class="navbar-nav bg-white accordion" id="accordionSidebar">
                            <!-- Link Menu Halaman Pasang Baru -->
                            <li class="nav-item">
                                <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    <i class="fas fa-chevron-circle-right"></i>
                                    <span class="font-weight-bolder text-capitalize">Pasang Baru</span>
                                </a>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree">
                                    <div class="bg-light py-2 collapse-inner rounded">
                                        <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/pasang_baru/pb1phasa.php">Pasang Baru 1 <br> Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/pasang_baru/pb3phasa.php">Pasang Baru 3 <br> Phasa</a>
                                    </div>
                                </div>
                            </li>

                            <hr style="margin-left: 20px; margin-right: 20px;">

                            <!-- Link Menu Halaman Perubahan Daya -->
                            <li class="nav-item">
                                <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    <i class="fas fa-chevron-circle-right"></i>
                                    <span class="font-weight-bolder text-capitalize">Perubahan Daya</span>
                                </a>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour">
                                    <div class="bg-light py-2 collapse-inner rounded">
                                        <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/perubahan_daya/pd1phasa.php">Perubahan Daya 1 <br> Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/perubahan_daya/pd3phasa.php">Perubahan Daya 3 <br> Phasa</a>
                                    </div>
                                </div>
                            </li>

                            <hr style="margin-left: 20px; margin-right: 20px;">

                            <!-- Link Menu Halaman Migrasi -->
                            <li class="nav-item">
                                <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                    <i class="fas fa-chevron-circle-right"></i>
                                    <span class="font-weight-bolder text-capitalize">Migrasi</span>
                                </a>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFour">
                                    <div class="bg-light py-2 collapse-inner rounded">
                                        <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/migrasi/migrasi1phs.php">Migrasi 1 Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/migrasi/migrasi3phs.php">Migrasi 3 Phasa</a>
                                    </div>
                                </div>
                            </li>

                            <hr style="margin-left: 20px; margin-right: 20px;">

                            <!-- Link Menu Halaman Multiguna -->
                            <li class="nav-item">
                                <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                    <i class="fas fa-chevron-circle-right"></i>
                                    <span class="font-weight-bolder text-capitalize">Multiguna</span>
                                </a>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingFour">
                                    <div class="bg-light py-2 collapse-inner rounded">
                                        <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/multiguna/multiguna1phs.php">Multiguna 1 Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/multiguna/multiguna3phs.php">Multiguna 3 Phasa</a>
                                    </div>
                                </div>
                            </li>

                            <hr style="margin-left: 20px; margin-right: 20px;">

                            <!-- Link Menu Halaman P2TL -->
                            <li class="nav-item">
                                <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                    <i class="fas fa-chevron-circle-right"></i>
                                    <span class="font-weight-bolder text-capitalize">P2TL</span>
                                </a>
                                <div id="collapseSeven" class="collapse" aria-labelledby="headingFour">
                                    <div class="bg-light py-2 collapse-inner rounded">
                                        <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/p2tl/p2tl1phs.php">P2TL 1 Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/p2tl/p2tl3phs.php">P2TL 3 Phasa</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <!-- Menu Pelayanan Penyambungan end -->

            <hr class="sidebar-divider">

            <!-- Nav Item - Menu Cetak -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseA" aria-expanded="true" aria-controls="collapseA">
                    <i class="fas fa-list-ul"></i>
                    <span>Menu Cetak</span>
                </a>
                <div id="collapseA" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <ul class="navbar-nav bg-white accordion" id="accordionSidebar">
                            <!-- Link Menu Halaman Cetak Pasang Baru -->
                            <li class="nav-item">
                                <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseB" aria-expanded="true" aria-controls="collapseB">
                                    <i class="fas fa-chevron-circle-right"></i>
                                    <span class="font-weight-bolder text-capitalize">Menu Cetak <br> Pasang Baru</span>
                                </a>
                                <div id="collapseB" class="collapse" aria-labelledby="headingThree">
                                    <div class="bg-light py-2 collapse-inner rounded">
                                        <a class="collapse-item font-weight-bold" href="../../laporancetak/pasang_baru/mcpb1phasa.php">Pasang Baru 1
                                            Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../laporancetak/pasang_baru/mcpb3phasa.php">Pasang Baru 3
                                            Phasa</a>
                                    </div>
                                </div>
                            </li>

                            <hr style="margin-left: 20px; margin-right: 20px;">

                            <!-- Link Menu Halaman Cetak Perubahan Daya -->
                            <li class="nav-item">
                                <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseC" aria-expanded="true" aria-controls="collapseC">
                                    <i class="fas fa-chevron-circle-right"></i>
                                    <span class="font-weight-bolder text-capitalize">Menu Cetak <br> Perubahan
                                        Daya</span>
                                </a>
                                <div id="collapseC" class="collapse" aria-labelledby="headingFour">
                                    <div class="bg-light py-2 collapse-inner rounded">
                                        <a class="collapse-item font-weight-bold" href="../../laporancetak/perubahan_daya/mcpd1phasa.php">Perubahan
                                            Daya 1 <br> Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../laporancetak/perubahan_daya/mcpd1ke3phasa.php">Perubahan
                                            Daya 1 <br> Phasa ke 3 Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../laporancetak/perubahan_daya/mcpd3phasa.php">Perubahan Daya 3 <br>
                                            Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../laporancetak/perubahan_daya/mcpd3ke1phasa.php">Perubahan
                                            Daya 3 <br> Phasa ke 1 Phasa</a>
                                    </div>
                                </div>
                            </li>

                            <hr style="margin-left: 20px; margin-right: 20px;">

                            <!-- Link Menu Halaman Cetak Migrasi -->
                            <li class="nav-item">
                                <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseD" aria-expanded="true" aria-controls="collapseD">
                                    <i class="fas fa-chevron-circle-right"></i>
                                    <span class="font-weight-bolder text-capitalize">Menu Cetak <br> Migrasi</span>
                                </a>
                                <div id="collapseD" class="collapse" aria-labelledby="headingFour">
                                    <div class="bg-light py-2 collapse-inner rounded">
                                        <a class="collapse-item font-weight-bold" href="../../laporancetak/migrasi/mcmigrasi1phasa.php">Migrasi 1
                                            Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../laporancetak/migrasi/mcmigrasi3phasa.php">Migrasi 3
                                            Phasa</a>
                                    </div>
                                </div>
                            </li>

                            <hr style="margin-left: 20px; margin-right: 20px;">

                            <!-- Link Menu Halaman Cetak Multiguna -->
                            <li class="nav-item">
                                <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseE" aria-expanded="true" aria-controls="collapseE">
                                    <i class="fas fa-chevron-circle-right"></i>
                                    <span class="font-weight-bolder text-capitalize">Menu Cetak <br> Multiguna</span>
                                </a>
                                <div id="collapseE" class="collapse" aria-labelledby="headingFour">
                                    <div class="bg-light py-2 collapse-inner rounded">
                                        <a class="collapse-item font-weight-bold" href="../../laporancetak/multiguna/mcmultiguna1phasa.php">Multiguna 1
                                            Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../laporancetak/multiguna/mcmultiguna3phasa.php">Multiguna 3
                                            Phasa</a>
                                    </div>
                                </div>
                            </li>

                            <hr style="margin-left: 20px; margin-right: 20px;">

                            <!-- Link Menu Halaman Cetak P2TL -->
                            <li class="nav-item">
                                <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseF" aria-expanded="true" aria-controls="collapseF">
                                    <i class="fas fa-chevron-circle-right"></i>
                                    <span class="font-weight-bolder text-capitalize">Menu Cetak <br> P2TL</span>
                                </a>
                                <div id="collapseF" class="collapse" aria-labelledby="headingFour">
                                    <div class="bg-light py-2 collapse-inner rounded">
                                        <a class="collapse-item font-weight-bold" href="../../laporancetak/p2tl/mcp2tl1phasa.php">P2TL 1 Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../laporancetak/p2tl/mcp2tl3phasa.php">P2TL 3 Phasa</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <!-- Menu Cetak end -->

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <!-- Sidebar Toggler end -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar - User Information top right -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Ubah Data Perubahan Daya</u></h1>
                    </div>

                    <!-- Card untuk Form -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data Pelanggan Perubahan Daya</h6>
                        </div>
                        <!-- Form Utama -->
                        <div class="card-body">
                            <!-- PHP - Query Tombol Ubah dan SweetAlert -->
                            <?php
                            if (isset($_POST['ubah'])) {
                                $id = $_POST['id_perubahan_daya'];
                                $tgl_mohon = $_POST['tgl_mohon'];
                                $tarif_lama = $_POST['tarif_lama'];
                                $daya_lama = $_POST['daya_lama'];
                                $tarif_baru = $_POST['tarif_baru'];
                                $daya_baru = $_POST['daya_baru'];
                                $fasa_lama = $_POST['fasa_lama'];
                                $fasa_baru = $_POST['fasa_baru'];
                                $ambilIdPelanggan = $mysqli->query("SELECT a.no_registrasi , b.* FROM tb_perubahan_daya b JOIN tb_pelanggan a ON b.id_pelanggan = a.id_pelanggan WHERE id_perubahan_daya=$id");
                                $ambilQuery = $ambilIdPelanggan->fetch_array();

                                $update = "UPDATE tb_perubahan_daya SET tgl_mohon='$tgl_mohon', tarif_lama='$tarif_lama', daya_lama='$daya_lama', tarif_baru='$tarif_baru', daya_baru='$daya_baru', fasa_lama='$fasa_lama' ,fasa_baru='$fasa_baru'
                                WHERE id_perubahan_daya=$id";
                                $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));

                                if ($query) {
                                    if (($fasa_lama == "1 FASA") && ($fasa_baru == "1 FASA")) {
                                        $hapusData = mysqli_query($mysqli, "DELETE FROM tb_hasil_perhitungan_pd_1phs_ke_3phs WHERE id_perubahan_daya=$id");
                                        $hapusData2 = mysqli_query($mysqli, "DELETE FROM tb_hasil_perhitungan_pd_1phs WHERE id_perubahan_daya=$id");
                                        $insertDataPerubahan = "INSERT INTO tb_hasil_perhitungan_pd_1phs (id_perubahan_daya, pekerjaan_rab, MCB, segel_plastik, penggatian_mcb_1phs, total_biaya)
                                        VALUES 
                                        ('$id', 'PD 1 FASA', '30840', '2724', '46706', '80270')";
                                        $queryInsertDataPerubahan = mysqli_query($mysqli, $insertDataPerubahan);
                            ?>
                                        <script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Sukses.',
                                                text: 'Data dengan Nomor Registrasi : <?php echo $ambilQuery['no_registrasi'] ?> di-update dengan pekerjaan RAB menjadi "PD 1 Phasa" dan berhasil di update!'
                                            }).then((result) => {
                                                window.location = "../../pelayananpenyambungan/perubahan_daya/pd1phasa.php";
                                            })
                                        </script>
                                    <?php
                                    } elseif (($fasa_lama == "1 FASA") && ($fasa_baru == "3 FASA")) {
                                        $hapusData = mysqli_query($mysqli, "DELETE FROM tb_hasil_perhitungan_pd_1phs WHERE id_perubahan_daya=$id");
                                        $hapusData2 = mysqli_query($mysqli, "DELETE FROM tb_hasil_perhitungan_pd_1phs_ke_3phs WHERE id_perubahan_daya=$id");
                                        $insertDataPerubahan = "INSERT INTO tb_hasil_perhitungan_pd_1phs_ke_3phs (id_perubahan_daya, pekerjaan_rab, 
                                        kwh_meter_3phs_pengukuran_langsung_kelas_1, segel_plastik, nfa2x_3x35, nfa2x_4x16, service_wedge_clamp, 
                                        cco_3t3, skat_3, isolasi_scotch, pemas_kwh_meter_3phs, penarikan_sr3phs, pengepresan, penggantian_mcb, 
                                        bongkar_kwh_meter_1phs, total_biaya)
                                        VALUES 
                                        ('$id', 'PD 1 FASA KE 3 FASA', '1348000', '2724', '29360', '12110', '4433', '11722',
                                        '39400', '5615', '46811', '38482', '31339', '40800', '24606', '1635402')";
                                        $queryInsertDataPerubahan = mysqli_query($mysqli, $insertDataPerubahan);
                                    ?>
                                        <script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Sukses.',
                                                text: 'Data dengan Nomor Registrasi : <?php echo $ambilQuery['no_registrasi'] ?> di-update dengan pekerjaan RAB menjadi "PD 1 Phasa ke 3 Phasa" dan berhasil di update!'
                                            }).then((result) => {
                                                window.location = "../../pelayananpenyambungan/perubahan_daya/pd1phasa.php";
                                            })
                                        </script>
                                    <?php
                                    } elseif (($fasa_lama == "3 FASA") && ($fasa_baru == "3 FASA")) {
                                        $hapusData = mysqli_query($mysqli, "DELETE FROM tb_hasil_perhitungan_pd_3phs_ke_1phs WHERE id_perubahan_daya=$id");
                                        $hapusData2 = mysqli_query($mysqli, "DELETE FROM tb_hasil_perhitungan_pd_3phs WHERE id_perubahan_daya=$id");
                                        $insertDataPerubahan = "INSERT INTO tb_hasil_perhitungan_pd_3phs (id_perubahan_daya,pekerjaan_rab, penggantian_mccb_3phs, total_biaya)
                                        VALUES 
                                        ('$id','PD 3 FASA', '40800', '40800')";
                                        $queryInsertDataPerubahan = mysqli_query($mysqli, $insertDataPerubahan);
                                    ?>
                                        <script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Sukses.',
                                                text: 'Data dengan Nomor Registrasi : <?php echo $ambilQuery['no_registrasi'] ?> di-update dengan pekerjaan RAB menjadi "PD 3 Phasa" dan berhasil di update!'
                                            }).then((result) => {
                                                window.location = "../../pelayananpenyambungan/perubahan_daya/pd3phasa.php";
                                            })
                                        </script>
                                    <?php
                                    } elseif (($fasa_lama == "3 FASA") && ($fasa_baru == "1 FASA")) {
                                        $hapusData = mysqli_query($mysqli, "DELETE FROM tb_hasil_perhitungan_pd_3phs WHERE id_perubahan_daya=$id");
                                        $hapusData2 = mysqli_query($mysqli, "DELETE FROM tb_hasil_perhitungan_pd_3phs_ke_1phs WHERE id_perubahan_daya=$id");
                                        $insertDataPerubahan = "INSERT INTO tb_hasil_perhitungan_pd_3phs_ke_1phs (id_perubahan_daya, pekerjaan_rab,
                                        kwh_meter_tunggal,nfa2x_2x10,segel_plastik, cco_1t1, cco_3t1,isolasi_scotch,
                                        service_wedge, pasang_kwh, penarikan_sr, pengepresan, survey, bongkar_kwh_meter, total_biaya)
                                        VALUES 
                                        ('$id', 'PD 3 FASA KE 1 FASA', '243040', '4210', '2724', '6895', '9358', '5615', '3842', '41008', '33625', '22982', '20856', '28086', '422241')";
                                        $queryInsertDataPerubahan = mysqli_query($mysqli, $insertDataPerubahan);
                                    ?>
                                        <script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Sukses.',
                                                text: 'Data dengan Nomor Registrasi : <?php echo $ambilQuery['no_registrasi'] ?> di-update dengan pekerjaan RAB menjadi "PD 3 Phasa ke 1 Phasa" dan berhasil di update!'
                                            }).then((result) => {
                                                window.location = "../../pelayananpenyambungan/perubahan_daya/pd3phasa.php";
                                            })
                                        </script>
                            <?php
                                    }
                                }
                            }
                            ?>

                            <!-- PHP - Query Select untuk data ditampilkan di form -->
                            <?php
                            $id_pelanggan = '';
                            $jenis_transaksi = '';
                            $tgl_mohon = '';
                            $tarif_lama = '';
                            $daya_lama = '';
                            $tarif_baru = '';
                            $daya_baru = '';
                            $fasa_lama = '';
                            $fasa_baru = '';
                            $nama = '';
                            if (isset($_GET['edit'])) {
                                $id = $_GET['edit'];
                                $result = $mysqli->query("SELECT a.no_registrasi , b.* FROM tb_perubahan_daya b JOIN tb_pelanggan a ON b.id_pelanggan = a.id_pelanggan WHERE id_perubahan_daya=$id") or die($mysqli->error);

                                if ($result->num_rows) {
                                    $row = $result->fetch_array();
                                    $id_pelanggan = $row['no_registrasi'];
                                    $jenis_transaksi = $row['jenis_transaksi'];
                                    $tgl_mohon = $row['tgl_mohon'];
                                    $tarif_lama = $row['tarif_lama'];
                                    $daya_lama = $row['daya_lama'];
                                    $tarif_baru = $row['tarif_baru'];
                                    $daya_baru = $row['daya_baru'];
                                    $fasa_lama = $row['fasa_lama'];
                                    $fasa_baru = $row['fasa_baru'];
                                }
                            }
                            ?>

                            <form action="pd_edit.php?edit=<?php echo $row['id_perubahan_daya'] ?>" method="post" name="form1">
                                <input type="hidden" name="id_perubahan_daya" value="<?php echo $id; ?>">
                                <?php
                                $pelanggan = '';
                                $query = "SELECT id_pelanggan, no_registrasi FROM tb_pelanggan GROUP BY id_pelanggan ORDER BY id_pelanggan ASC";
                                $result = mysqli_query($mysqli, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    $pelanggan .= '<option value="' . $row["id_pelanggan"] . ' ' . $row["no_registrasi"] . '"> ' . $row["no_registrasi"] . '</option>';
                                }
                                ?>

                                <div class="form-group row">
                                    <div class="col">
                                        <label for="">Nomor Registrasi Pelanggan</label>
                                        <input type="text" name="id_pelanggan" id="id_pelanggan" class="form-control" value="<?php echo $id_pelanggan ?>" disabled>
                                    </div>
                                    <?php
                                    $ambilNama = $mysqli->query("SELECT nama FROM tb_pelanggan WHERE no_registrasi = $id_pelanggan") or die($mysqli->error);
                                    $hasilAmbil = $ambilNama->fetch_array();
                                    ?>
                                    <div class="col">
                                        <label for="">Nama Pelanggan</label>
                                        <input type="text" name="nama" class="form-control" value="<?php echo $hasilAmbil['nama'] ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Jenis Transaksi</label>
                                    <input type="text" name="jenis_transaksi" class="form-control" value="Pasang Baru" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="">Tanggal Mohon</label>
                                    <input type="date" name="tgl_mohon" class="form-control" value="<?php echo $tgl_mohon ?>" required>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <label for="">Tarif Lama</label>
                                        <input type="text" name="tarif_lama" class="form-control" value="<?php echo $tarif_lama ?>" placeholder="Masukkan Tarif Lama Pelanggan" required>
                                    </div>
                                    <div class="col">
                                        <label for="">Daya Lama</label>
                                        <input type="text" name="daya_lama" class="form-control" value="<?php echo $daya_lama ?>" placeholder="Masukkan Daya Lama Pelanggan" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <label for="">Tarif Baru</label>
                                        <input type="text" name="tarif_baru" class="form-control" value="<?php echo $tarif_baru ?>" placeholder="Masukkan Tarif Baru Pelanggan" required>
                                    </div>
                                    <div class="col">
                                        <label for="">Daya Baru</label>
                                        <input type="text" name="daya_baru" class="form-control" value="<?php echo $daya_baru ?>" placeholder="Masukkan Daya Baru Pelanggan" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Fasa Lama</label>
                                    <select name="fasa_lama" class="form-control" required>
                                        <option value="" disabled selected>Pilih</option>
                                        <option value="<?php echo $fasa_lama; ?>" disabled>Pilihan Sebelum nya : <?php echo $fasa_lama ?></option>
                                        <option>1 FASA</option>
                                        <option>3 FASA</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Fasa Baru</label>
                                    <select name="fasa_baru" class="form-control" required>
                                        <option value="" disabled selected>Pilih</option>
                                        <option value="<?php echo $fasa_baru; ?>" disabled>Pilihan Sebelum nya : <?php echo $fasa_baru ?></option>
                                        <option>1 FASA</option>
                                        <option>3 FASA</option>
                                    </select>
                                </div>

                                <div class="form-group row float-right">
                                    <div class="col">
                                        <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>
                                        <button type="submit" class="btn btn-primary" name="ubah"><i class="fas fa-save"></i> Ubah</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                        <!-- Form Utama end -->
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Muhammad Dio Syahputra 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingin Log out?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik Tombol "Logout" dibawah untuk kembali ke menu login</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="../../login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.action').change(function() {
                if ($(this).val() != '') {
                    var action = $(this).attr("id");
                    var query = $(this).val();
                    var result = '';
                    if (action == "id_pelanggan") {
                        result = 'nama';
                    } else {
                        result = 'tidak ada';
                    }
                    $.ajax({
                        url: "fetch.php",
                        method: "POST",
                        data: {
                            action: action,
                            query: query
                        },
                        success: function(data) {
                            $('#' + result).html(data);
                        }
                    })
                }
            });
        });
    </script>

</body>

</html>