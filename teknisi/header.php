<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php
require '../../koneksi.php';

if (!isset($_SESSION['username'])) {
    echo "<script> alert('Silahkan login Terlebih dahulu');</script>";
    echo "<meta http-equiv='refresh' content='0; url=login.php'>";
} else {
?>

    <head>
        <!-- Custom fonts for this template-->
        <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </head>

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
                            <i class="fas fa-user-alt fa-2x"></i> <br>
                            <span>Akun</span>
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
                            <i class="fas fa-user-alt fa-2x"></i> <br>
                            <span>Akun</span>
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
                            <i class="fas fa-user-alt fa-2x"></i> <br>
                            <span>Akun</span>
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
                            <i class="fas fa-user-alt fa-2x"></i> <br>
                            <span>Akun</span>
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
                            <i class="fas fa-user-alt fa-2x"></i> <br>
                            <span>Akun</span>
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
                }
                ?>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="../../index.php">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <?php
                //Menu Hak akses Teknisi Yanbung
                if ($level == 4 && $tekcheck == 1) {
                ?>
                    <!-- Nav Item - Menu Teknisi Yanbung -->
                    <li class="nav-item active">
                        <a class="nav-link" href="form_laporan.php">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Menu Data Teknisi Yanbung</span></a>
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
                                    <a href="../../index.php" class="mr-3"><img src="../../img/logo.png" width="15%" class="mr-3"></a>
                                </div>
                            </div>

                        </ul>
                    </nav>
                    <!-- End of Topbar -->
    </body>

</html>

<?php } ?>