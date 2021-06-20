<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<?php
require '../../../koneksi.php';
if (!isset($_SESSION['username'])) {
    echo "<script> alert('Silahkan login Terlebih dahulu');</script>";
    echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
} else {
?>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #1B6C89;">

                <!-- Nav Item - Akun User -->
                <?php
                $level = $_SESSION['level'];
                $tekcheck = $_SESSION['t_check'];

                if ($level == 1) {
                ?>
                    <div class="nav-item text-center mt-3 mb-3">
                        <button role="button" type="button" class="btn" data-toggle="dropdown">
                            <span style="color: white;"><i class="fas fa-user-alt fa-2x"></i></span> <br>
                            <span class="text-success">Akun</span>
                        </button>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <span class="d-none d-lg-inline text-gray-600 small">
                                <div class="text-center">
                                    <p style="font-size: medium;"><b>Nama</b> : <br> <?php echo $_SESSION['nama'] ?></p> <br>
                                    <p style="font-size: medium;"><b>Posisi</b> : <br> Admin </p>
                                </div>
                            </span>
                            <hr>
                            <a style="color: red;" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                LOGOUT
                            </a>
                        </div>
                    </div>
                <?php
                } elseif ($level == 2) {
                ?>
                    <div class="nav-item text-center mt-3 mb-3">
                        <button role="button" type="button" class="btn" data-toggle="dropdown">
                            <span style="color: white;"><i class="fas fa-user-alt fa-2x"></i></span> <br>
                            <span class="text-success">Akun</span>
                        </button>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <span class="d-none d-lg-inline text-gray-600 small">
                                <div class="text-center">
                                    <p style="font-size: medium;"><b>Nama</b> : <br> <?php echo $_SESSION['nama'] ?></p> <br>
                                    <p style="font-size: medium;"><b>Posisi</b> : <br> Pegawai </p>
                                </div>
                            </span>
                            <hr>
                            <a style="color: red;" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                LOGOUT
                            </a>
                        </div>
                    </div>
                <?php
                } elseif ($level == 3) {
                ?>
                    <div class="nav-item text-center mt-3 mb-3">
                        <button role="button" type="button" class="btn" data-toggle="dropdown">
                            <span style="color: white;"><i class="fas fa-user-alt fa-2x"></i></span> <br>
                            <span class="text-success">Akun</span>
                        </button>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <span class="d-none d-lg-inline text-gray-600 small">
                                <div class="text-center">
                                    <p style="font-size: medium;"><b>Nama</b> : <br> <?php echo $_SESSION['nama'] ?></p> <br>
                                    <p style="font-size: medium;"><b>Posisi</b> : <br> Operator </p>
                                </div>
                            </span>
                            <hr>
                            <a style="color: red;" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                LOGOUT
                            </a>
                        </div>
                    </div>
                <?php
                } elseif ($level == 4 && $tekcheck == 1) {
                ?>
                    <div class="nav-item text-center mt-3 mb-3">
                        <button role="button" type="button" class="btn" data-toggle="dropdown">
                            <span style="color: white;"><i class="fas fa-user-alt fa-2x"></i></span> <br>
                            <span class="text-success">Akun</span>
                        </button>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <span class="d-none d-lg-inline text-gray-600 small">
                                <div class="text-center">
                                    <p style="font-size: medium;"><b>Nama</b> : <br> <?php echo $_SESSION['nama'] ?></p> <br>
                                    <p style="font-size: medium;"><b>Posisi</b> : <br> Teknisi Pelayanan <br> Penyambungan </p>
                                </div>
                            </span>
                            <hr>
                            <a style="color: red;" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                LOGOUT
                            </a>
                        </div>
                    </div>
                <?php
                } elseif ($level == 4 && $tekcheck == 2) {
                ?>
                    <div class="nav-item text-center mt-3 mb-3">
                        <button role="button" type="button" class="btn" data-toggle="dropdown">
                            <span style="color: white;"><i class="fas fa-user-alt fa-2x"></i></span> <br>
                            <span class="text-success">Akun</span>
                        </button>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <span class="d-none d-lg-inline text-gray-600 small">
                                <div class="text-center">
                                    <p style="font-size: medium;"><b>Nama</b> : <br> <?php echo $_SESSION['nama'] ?></p> <br>
                                    <p style="font-size: medium;"><b>Posisi</b> : <br> Teknisi Pelayanan <br> Pengaduan </p>
                                </div>
                            </span>
                            <hr>
                            <a style="color: red;" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                LOGOUT
                            </a>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="nav-item text-center mt-3 mb-3">
                        <button role="button" type="button" class="btn" data-toggle="dropdown">
                            <i class="fas fa-user-alt fa-2x"></i> <br>
                            <span>Login</span>
                        </button>
                    </div>
                <?php
                }
                ?>

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

                <?php

                //Menu Hak akses Admin
                if ($level == 1) {
                ?>

                    <!-- Nav Item - Menu Pelanggan -->
                    <li class="nav-item">
                        <a class="nav-link" href="../../pelanggan/pelanggan.php">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Menu Data Pelanggan</span></a>
                    </li>

                    <!-- Nav Item - Menu Pelayanan Penyambungan -->
                    <li class="nav-item 
                    <?php if ($pageSkr == 'pb1phasa' || 'pb3phasa' || 'pd1phasa' || 'pd3phasa' || 'multiguna1phasa' || 'multiguna3phasa') {
                        echo 'active';
                    } ?>">
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
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($pageSkr == 'pb1phasa') {
                                                    echo 'active';
                                                } ?>" href="index.php?page=pb1phasa">Pasang Baru 1
                                                    <br> Phasa</a>
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($pageSkr == 'pb3phasa') {
                                                    echo 'active';
                                                } ?>" href="index.php?page=pb3phasa">Pasang Baru 3
                                                    <br> Phasa</a>
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
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($pageSkr == 'pd1phasa') {
                                                    echo 'active';
                                                } ?>" href="pelayananpenyambungan/perubahan_daya/pd1phasa.php">Perubahan
                                                    Daya 1 <br> Phasa</a>
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($pageSkr == 'pd3phasa') {
                                                    echo 'active';
                                                } ?>" href="pelayananpenyambungan/perubahan_daya/pd3phasa.php">Perubahan
                                                    Daya 3 <br> Phasa</a>
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
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($pageSkr == 'multiguna1phasa') {
                                                    echo 'active';
                                                } ?>" href="pelayananpenyambungan/multiguna/multiguna1phs.php">Multiguna 1
                                                    Phasa</a>
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($pageSkr == 'multiguna3phasa') {
                                                    echo 'active';
                                                } ?>" href="pelayananpenyambungan/multiguna/multiguna3phs.php">Multiguna 3
                                                    Phasa</a>
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
                            <i class="fas fa-print"></i>
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
                                                <a class="collapse-item font-weight-bold" href="laporancetak/pasang_baru/mcpb1phasa.php">Pasang Baru 1
                                                    Phasa</a>
                                                <a class="collapse-item font-weight-bold" href="laporancetak/pasang_baru/mcpb3phasa.php">Pasang Baru 3
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
                                                <a class="collapse-item font-weight-bold" href="laporancetak/perubahan_daya/mcpd1phasa.php">Perubahan
                                                    Daya 1 <br> Phasa</a>
                                                <a class="collapse-item font-weight-bold" href="laporancetak/perubahan_daya/mcpd1ke3phasa.php">Perubahan
                                                    Daya 1 <br> Phasa ke 3 Phasa</a>
                                                <a class="collapse-item font-weight-bold" href="laporancetak/perubahan_daya/mcpd3phasa.php">Perubahan Daya 3 <br>
                                                    Phasa</a>
                                                <a class="collapse-item font-weight-bold" href="laporancetak/perubahan_daya/mcpd3ke1phasa.php">Perubahan
                                                    Daya 3 <br> Phasa ke 1 Phasa</a>
                                            </div>
                                        </div>
                                    </li>

                                    <hr style="margin-left: 20px; margin-right: 20px;">

                                    <!-- Link Menu Halaman Cetak Migrasi -->
                                    <!-- <li class="nav-item">
                                    <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseD" aria-expanded="true" aria-controls="collapseD">
                                        <i class="fas fa-chevron-circle-right"></i>
                                        <span class="font-weight-bolder text-capitalize">Menu Cetak <br> Migrasi</span>
                                    </a>
                                    <div id="collapseD" class="collapse" aria-labelledby="headingFour">
                                        <div class="bg-light py-2 collapse-inner rounded">
                                            <a class="collapse-item font-weight-bold" href="laporancetak/migrasi/mcmigrasi1phasa.php">Migrasi 1
                                                Phasa</a>
                                            <a class="collapse-item font-weight-bold" href="laporancetak/migrasi/mcmigrasi3phasa.php">Migrasi 3
                                                Phasa</a>
                                        </div>
                                    </div>
                                </li> -->

                                    <!-- <hr style="margin-left: 20px; margin-right: 20px;"> -->

                                    <!-- Link Menu Halaman Cetak Multiguna -->
                                    <li class="nav-item">
                                        <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseE" aria-expanded="true" aria-controls="collapseE">
                                            <i class="fas fa-chevron-circle-right"></i>
                                            <span class="font-weight-bolder text-capitalize">Menu Cetak <br> Multiguna</span>
                                        </a>
                                        <div id="collapseE" class="collapse" aria-labelledby="headingFour">
                                            <div class="bg-light py-2 collapse-inner rounded">
                                                <a class="collapse-item font-weight-bold" href="laporancetak/multiguna/mcmultiguna1phasa.php">Multiguna 1
                                                    Phasa</a>
                                                <a class="collapse-item font-weight-bold" href="laporancetak/multiguna/mcmultiguna3phasa.php">Multiguna 3
                                                    Phasa</a>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- <hr style="margin-left: 20px; margin-right: 20px;"> -->

                                    <!-- Link Menu Halaman Cetak P2TL -->
                                    <!-- <li class="nav-item">
                                    <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseF" aria-expanded="true" aria-controls="collapseF">
                                        <i class="fas fa-chevron-circle-right"></i>
                                        <span class="font-weight-bolder text-capitalize">Menu Cetak <br> P2TL</span>
                                    </a>
                                    <div id="collapseF" class="collapse" aria-labelledby="headingFour">
                                        <div class="bg-light py-2 collapse-inner rounded">
                                            <a class="collapse-item font-weight-bold" href="laporancetak/p2tl/mcp2tl1phasa.php">P2TL 1 Phasa</a>
                                            <a class="collapse-item font-weight-bold" href="laporancetak/p2tl/mcp2tl3phasa.php">P2TL 3 Phasa</a>
                                        </div>
                                    </div>
                                </li> -->
                                </ul>
                            </div>
                        </div>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Nav Item - Menu Data User -->
                    <li class="nav-item">
                        <a class="nav-link" href="pelanggan/pelanggan.php">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Manajemen User</span></a>
                    </li>
                <?php
                    //Menu Hak akses Pegawai
                } elseif ($level == 2) {
                ?>
                    <!-- Nav Item - Menu Pelanggan -->
                    <li class="nav-item">
                        <a class="nav-link" href="../../pelanggan/pelanggan.php">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Menu Data Pelanggan</span></a>
                    </li>

                    <!-- Nav Item - Menu Pelayanan Penyambungan -->
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
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($pageSkr == 'pb1phasa') {
                                                    echo 'active';
                                                } ?>" href="../../pelayananpenyambungan/pasang_baru/pb1phasa.php">Pasang Baru 1
                                                    <br> Phasa</a>
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($pageSkr == 'pb3phasa') {
                                                    echo 'active';
                                                } ?>" href="../../pelayananpenyambungan/pasang_baru/pb3phasa.php">Pasang Baru 3
                                                    <br> Phasa</a>
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
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($pageSkr == 'pd1phasa') {
                                                    echo 'active';
                                                } ?>" href="../../pelayananpenyambungan/perubahan_daya/pd1phasa.php">Perubahan
                                                    Daya 1 <br> Phasa</a>
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($pageSkr == 'pd3phasa') {
                                                    echo 'active';
                                                } ?>" href="../../pelayananpenyambungan/perubahan_daya/pd3phasa.php">Perubahan
                                                    Daya 3 <br> Phasa</a>
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
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($pageSkr == 'multiguna1phasa') {
                                                    echo 'active';
                                                } ?>" href="../../pelayananpenyambungan/multiguna/multiguna1phs.php">Multiguna 1
                                                    Phasa</a>
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($pageSkr == 'multiguna3phasa') {
                                                    echo 'active';
                                                } ?>" href="../../pelayananpenyambungan/multiguna/multiguna3phs.php">Multiguna 3
                                                    Phasa</a>
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
                            <i class="fas fa-print"></i>
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
                                </ul>
                            </div>
                        </div>
                    </li>

                <?php
                    //Menu Hak akses Operator
                } elseif ($level == 3) {
                ?>
                    <!-- Nav Item - Menu Operator -->
                    <li class="nav-item">
                        <a class="nav-link" href="pelanggan/pelanggan.php">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Menu Data Operator</span></a>
                    </li>
                <?php
                    //Menu Hak akses Teknisi Yanbung
                } elseif ($level == 4 && $tekcheck == 1) {
                ?>
                    <!-- Nav Item - Menu Teknisi Yanbung -->
                    <li class="nav-item">
                        <a class="nav-link" href="teknisi/yanbung/form_laporan.php">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Menu Data Teknisi Yanbung</span></a>
                    </li>
                <?php
                    //Menu Hak akses Teknisi Pelayanan Pengaduan
                } elseif ($level == 4 && $tekcheck == 2) {
                ?>
                    <!-- Nav Item - Menu Teknisi Pengaduan -->
                    <li class="nav-item">
                        <a class="nav-link" href="teknisi/pengaduan/form_laporan.php">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Menu Data Pengaduan</span></a>
                    </li>
                <?php
                }
                ?>

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

                            <div class="d-flex justify-content-center">
                                <!-- Header - Logo & Judul -->
                                <div class="img-responsive">
                                    <a href="../../../index.php" class="mr-3"><img src="../../../img/logo.png" width="15%" class="mr-3"></a>
                                </div>
                            </div>

                        </ul>
                    </nav>
                    <!-- End of Topbar -->
    </body>

</html>


<?php } ?>