<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perubahan Daya 1 Phasa</title>

    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <?php
    include '../../../koneksi.php';
    ?>
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Logo -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mt-2 mb-3" href="../../../index.php">
                <div class="img-responsive">
                    <img class="img-thumbnail" src="../../../img/logo.png">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../../../index.php">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Menu Pelanggan -->
            <li class="nav-item">
                <a class="nav-link" href="../../../pelanggan/pelanggan.php">
                    <i class="fas fa-user-friends"></i></i>
                    <span>Menu Data Pelanggan</span></a>
            </li>

            <!-- Nav Item - Pelayanan Penyambungan -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
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
                                        <a class="collapse-item active font-weight-bold" href="../pb1phasa.php">Pasang Baru 1 <br> Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../pb3phasa.php">Pasang Baru 3 <br> Phasa</a>
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
                                        <a class="collapse-item font-weight-bold" href="../../perubahan_daya/pd1phasa.php">Perubahan Daya 1 <br> Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../perubahan_daya/pd3phasa.php">Perubahan Daya 3 <br> Phasa</a>
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
                                        <a class="collapse-item font-weight-bold" href="../../migrasi/migrasi1phs.php">Migrasi 1 Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../migrasi/migrasi3phs.php">Migrasi 3 Phasa</a>
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
                                        <a class="collapse-item font-weight-bold" href="../../multiguna/multiguna1phs.php">Multiguna 1 Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../multiguna/multiguna3phs.php">Multiguna 3 Phasa</a>
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
                                        <a class="collapse-item font-weight-bold" href="../../p2tl/p2tl1phs.php">P2TL 1 Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../p2tl/p2tl3phs.php">P2TL 3 Phasa</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <!-- Divider -->
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
                                        <a class="collapse-item font-weight-bold" href="../../../laporancetak/pasang_baru/mcpb1phasa.php">Pasang Baru 1
                                            Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../../laporancetak/pasang_baru/mcpb3phasa.php">Pasang Baru 3
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
                                        <a class="collapse-item font-weight-bold" href="../../../laporancetak/perubahan_daya/mcpd1phasa.php">Perubahan
                                            Daya 1 <br> Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../../laporancetak/perubahan_daya/mcpd1ke3phasa.php">Perubahan
                                            Daya 1 <br> Phasa ke 3 Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../../laporancetak/perubahan_daya/mcpd3phasa.php">Perubahan Daya 3 <br>
                                            Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../../laporancetak/perubahan_daya/mcpd3ke1phasa.php">Perubahan
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
                                        <a class="collapse-item font-weight-bold" href="../../../laporancetak/migrasi/mcmigrasi1phasa.php">Migrasi 1
                                            Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../../laporancetak/migrasi/mcmigrasi3phasa.php">Migrasi 3
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
                                        <a class="collapse-item font-weight-bold" href="../../../laporancetak/multiguna/mcmultiguna1phasa.php">Multiguna 1
                                            Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../../laporancetak/multiguna/mcmultiguna3phasa.php">Multiguna 3
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
                                        <a class="collapse-item font-weight-bold" href="../../../laporancetak/p2tl/mcp2tl1phasa.php">P2TL 1 Phasa</a>
                                        <a class="collapse-item font-weight-bold" href="../../../laporancetak/p2tl/mcp2tl3phasa.php">P2TL 3 Phasa</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="../../../img/undraw_profile.svg">
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

                <!-- Begin Page Content - konten halaman -->
                <div class="container-fluid">

                    <!-- Page Heading 1 -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Detail Biaya Pelanggan Perubahan Daya 1 Phasa</u></h1>
                    </div>

                    <!-- Tabel Utama 1 -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">No Registrasi</th>
                                            <th rowspan="2">Nama Pelanggan</th>
                                            <th rowspan="2">Pekerjaan RAB</th>
                                            <th colspan="3" class="text-center">Detail Biaya</th>
                                            <th rowspan="2">Total Biaya</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Detail 1 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="MCB"></i></th>
                                            <th class="text-center">Detail 2 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Segel Plastik"></i></th>
                                            <th class="text-center">Detail 3 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Penggantian MCB 1 Phasa"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = mysqli_query($mysqli, "SELECT a.*, b.*, c.* FROM tb_perubahan_daya a JOIN tb_hasil_perhitungan_pd_1phs c ON a.id_perubahan_daya = c.id_perubahan_daya JOIN tb_pelanggan b ON a.id_pelanggan=b.id_pelanggan");
                                        $no = 1;
                                        $hitungrow = mysqli_num_rows($data);
                                        if ($hitungrow > 0) {
                                            while ($row = $data->fetch_assoc()) { ?>
                                                <tr>
                                                    <td style="text-align:center;"><?php echo $no++ ?></td>
                                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                                    <td class="align-middle"><?php echo $row['pekerjaan_rab']; ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['MCB'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['segel_plastik'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['penggatian_mcb_1phs'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['total_biaya'], 0, ',', '.') ?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <hr style="border-top: 1px solid #8c8b8b; border-bottom: 1px solid #fff;">

                    <!-- Page Heading 2 -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Detail Biaya Pelanggan Perubahan Daya 1 Phasa ke 3 Phasa</u></h1>
                    </div>

                    <!-- Tabel Utama 2 -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">No Registrasi</th>
                                            <th rowspan="2">Nama Pelanggan</th>
                                            <th rowspan="2">Pekerjaan RAB</th>
                                            <th colspan="13" class="text-center">Detail Biaya</th>
                                            <th rowspan="2">Total Biaya</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Detail 1 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="kWh Meter 3 Phase Pengukuran langsung kelas 1"></i></th>
                                            <th class="text-center">Detail 2 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Segel Plastik"></i></th>
                                            <th class="text-center">Detail 3 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="NFA2X-T;3X35+1X35;0,6/1kV;OH"></i></th>
                                            <th class="text-center">Detail 4 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="NFA2X;4X16mm2;0,6/1kV;OH"></i></th>
                                            <th class="text-center">Detail 5 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Service Wedge Clamp 3 Phasa ; Type SWC 625 ; 6, 10, 16, 25 sqmm"></i></th>
                                            <th class="text-center">Detail 6 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="CCO 3T3 (16/35 sqmm - 16/35 sqmm)"></i></th>
                                            <th class="text-center">Detail 7 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="SKAT 3 ( 35 sqmm ) ; L1"></i></th>
                                            <th class="text-center">Detail 8 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Isolasi Scotch / Rubber Tape 1 KV ( Dimension : 19 mm x 20,1 m x 0.177 mm )"></i></th>
                                            <th class="text-center">Detail 9 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Pemas. Kwh Meter Tiga Phase Tanpa Wiring"></i></th>
                                            <th class="text-center">Detail 10 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Penarikan SR 3 Phase"></i></th>
                                            <th class="text-center">Detail 11 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Pengepresan CCO / Connector 30-70 mm²"></i></th>
                                            <th class="text-center">Detail 12 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Penggantian MCB / MCCB 3 Phasa"></i></th>
                                            <th class="text-center">Detail 13 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Bongkar Kwh Meter Satu Phase + Wiring"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = mysqli_query($mysqli, "SELECT a.*, b.*, c.* FROM tb_perubahan_daya a JOIN tb_hasil_perhitungan_pd_1phs_ke_3phs c ON a.id_perubahan_daya = c.id_perubahan_daya JOIN tb_pelanggan b ON a.id_pelanggan=b.id_pelanggan WHERE a.fasa_lama = '1 FASA'");
                                        $no = 1;
                                        $hitungrow = mysqli_num_rows($data);
                                        if ($hitungrow > 0) {
                                            while ($row = $data->fetch_assoc()) { ?>
                                                <tr>
                                                    <td style="text-align:center;"><?php echo $no++ ?></td>
                                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                                    <td class="align-middle"><?php echo $row['pekerjaan_rab']; ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['kwh_meter_3phs_pengukuran_langsung_kelas_1'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['segel_plastik'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['nfa2x_3x35'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['nfa2x_4x16'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['service_wedge_clamp'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['cco_3t3'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['skat_3'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['isolasi_scotch'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['pemas_kwh_meter_3phs'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['penarikan_sr3phs'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['pengepresan'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['penggantian_mcb'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['bongkar_kwh_meter_1phs'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['total_biaya'], 0, ',', '.') ?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <a href="../pd1phasa.php" class="btn btn-danger" class="mb-2 ml-3"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
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
                    <a class="btn btn-primary" href="../../../login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Core plugin JavaScript-->
    <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../js/demo/datatables-demo.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script untuk Menampilkan 2 Tabel di 1 halaman -->
    <script>
        $(document).ready(function() {
            $('table.display').DataTable();
        });
    </script>

    <!-- Script untuk Menampilkan Popover -->
    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        })
    </script>

    <!-- Script buat menghilangkan beberapa fitur sorting di datatables - Tabel 1 -->
    <script>
        $('#dataTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [3, 4, 5, 6, 7]
            }]
        });
    </script>

    <!-- Script buat menghilangkan beberapa fitur sorting di datatables - Tabel 2 -->
    <script>
        $('#dataTable2').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17]
            }]
        });
    </script>
</body>

</html>