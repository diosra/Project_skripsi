<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* table {
            margin: 0 auto;
            width: 100%;
            clear: both;
            border-collapse: collapse;
            table-layout: fixed;
            word-wrap: break-word;
        } */

        table.table-bordered {
            border: 1px solid black;
            margin-top: 20px;
        }

        table.table-bordered>thead>tr>th {
            border: 1px solid black;
        }

        table.table-bordered>tbody>tr>td {
            border: 1px solid black;
        }
    </style>

    <?php
    $level = $_SESSION['level'];
    $tekcheck = $_SESSION['t_check'];
    $foto = $_SESSION['foto'];
    $jk = $_SESSION['jenis_kelamin'];

    if ($jk == "Pria") {
    ?>
        <script>
            function gambarerror(obj) {
                var noimg = "img/undraw_profile.svg";
                obj.src = noimg;
            }
        </script>
    <?php
    } else {
    ?>
        <script>
            function gambarerror(obj) {
                var noimg = "img/undraw_profile_3.svg";
                obj.src = noimg;
            }
        </script>
    <?php
    }

    ?>


</head>

<?php
require 'koneksi.php';

if (!isset($_SESSION['username'])) {
    echo "<script> alert('Silahkan login Terlebih dahulu');</script>";
    echo "<meta http-equiv='refresh' content='0; url=login.php'>";
} else {
?>

    <body id="page-top" class="text-gray-900">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #1B6C89;">

                <!-- Nav Item - Akun User -->
                <?php
                $id = $_SESSION['id'];

                if ($level == 1) {
                ?>
                    <div class="nav-item text-center mt-3 mb-3">
                        <button role="button" type="button" class="btn" data-toggle="dropdown">
                            <span>
                                <img class="img-profile rounded-circle" width="45%" src="gambar/<?php echo $_SESSION['foto']; ?>" onerror="this.onerror=null;gambarerror(this);">
                            </span>
                        </button>
                        <p class="text-success small font-weight-bold">Admin</p>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <span class="d-none d-lg-inline text-gray-900 small">
                                <div class="text-center">
                                    <p style="font-size: medium;"><b>Nama</b> : <br> <?php echo $_SESSION['nama'] ?></p>
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
                            <span>
                                <img class="img-profile rounded-circle" width="45%" src="gambar/<?php echo $_SESSION['foto']; ?>" onerror="this.onerror=null;gambarerror(this);">
                            </span>
                        </button>
                        <p class="text-success small font-weight-bold">Pegawai</p>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <span class="d-none d-lg-inline text-gray-900 small">
                                <div class="text-center">
                                    <p style="font-size: medium;"><b>Nama</b> : <br> <?php echo $_SESSION['nama'] ?></p>
                                </div>
                            </span>
                            <!-- <hr>
                            <a style="color: black;" class="dropdown-item text-center" href="header.php?page=foto&id=<?php echo $_SESSION['id'] ?>">
                                <i class="fas fa-portrait mr-1 text-gray-900 fa-1x"></i>
                                Foto Profile
                            </a> -->
                            <hr>
                            <a style="color: red;" class="dropdown-item text-center" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-1 text-gray-900 fa-1x"></i>
                                Log Out
                            </a>
                        </div>
                    </div>
                <?php
                } elseif ($level == 3) {
                ?>
                    <div class="nav-item text-center mt-3 mb-3">
                        <button role="button" type="button" class="btn" data-toggle="dropdown">
                            <span>
                                <img class="img-profile rounded-circle" width="45%" src="gambar/<?php echo $_SESSION['foto']; ?>" onerror="this.onerror=null;gambarerror(this);">
                            </span>
                        </button>
                        <p class="text-success small font-weight-bold">Operator</p>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <span class="d-none d-lg-inline text-gray-900 small">
                                <div class="text-center">
                                    <p style="font-size: medium;"><b>Nama</b> : <br> <?php echo $_SESSION['nama'] ?></p>
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
                            <span>
                                <img class="img-profile rounded-circle text-center" width="45%" src="gambar/<?php echo $_SESSION['foto']; ?>" onerror="this.onerror=null;gambarerror(this);">
                            </span>
                        </button>
                        <p class="text-success small font-weight-bold">Teknisi Pelayanan Penyambungan</p>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <span class="d-none d-lg-inline text-gray-900 small">
                                <div class="text-center">
                                    <p style="font-size: medium;"><b>Nama</b> : <br> <?php echo $_SESSION['nama'] ?></p>
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
                            <span>
                                <img class="img-profile rounded-circle text-center" width="45%" src="gambar/<?php echo $_SESSION['foto']; ?>" onerror="this.onerror=null;gambarerror(this);">
                            </span>
                        </button>
                        <p class="text-success small font-weight-bold">Teknisi Pelayanan Pengaduan</p>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <span class="d-none d-lg-inline text-gray-900 small">
                                <div class="text-center">
                                    <p style="font-size: medium;"><b>Nama</b> : <br> <?php echo $_SESSION['nama'] ?></p>
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
                } elseif ($level == 5) {
                ?>
                    <div class="nav-item text-center mt-3 mb-3">
                        <button role="button" type="button" class="btn" data-toggle="dropdown">
                            <span>
                                <img class="img-profile rounded-circle" width="45%" src="gambar/<?php echo $_SESSION['foto']; ?>" onerror="this.onerror=null;gambarerror(this);">
                            </span>
                        </button>
                        <p class="text-success small font-weight-bold">Petugas Survey</p>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <span class="d-none d-lg-inline text-gray-900 small">
                                <div class="text-center">
                                    <p style="font-size: medium;"><b>Nama</b> : <br> <?php echo $_SESSION['nama'] ?></p>
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
                <hr class=" sidebar-divider my-0">

                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                ?>

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <?php
                //Menu Hak akses Admin
                if ($level == 1) {
                ?>
                    <!-- Nav Item - Menu Data Manajemen User -->
                    <li class="nav-item">
                        <a class="nav-link" href="header.php?page=user">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Manajemen User</span></a>
                    </li>

                    <!-- Nav Item - Menu Data Teknisi Pelayanan Pengaduan -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="header.php?page=tekpen">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Data Teknisi Pelayanan Pengaduan</span></a>
                    </li> -->
                <?php
                    //Menu Hak akses Pegawai
                } elseif ($level == 2) {
                ?>
                    <!-- Nav Item - Menu Pelanggan -->
                    <li class="nav-item">
                        <a class="nav-link" href="header.php?page=pelanggan">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Menu Data Pelanggan</span></a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="header.php?page=harga">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <span>Menu Data Biaya RAB</span></a>
                    </li> -->

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Nav Item - Menu Permohonan Pelayanan Penyambungan -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="header.php?page=mohonyanbung">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Menu Data Permohonan <br> Pelayanan Penyambungan </span></a>
                    </li> -->

                    <!-- Nav Item - Menu Data Permohonan Pelayanan Penyambungan -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            <i class="fas fa-list-ul"></i>
                            <span>Menu Permohonan Pelayanan Penyambungan</span>
                        </a>
                        <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <ul class="navbar-nav bg-white accordion" id="accordionSidebar">

                                    <!-- Link Menu Halaman Pasang Baru -->
                                    <li class="nav-item">
                                        <a class="collapse-item" href="header.php?page=mohonyanbungpb">
                                            <i class="fas fa-user-friends"></i></i>
                                            <span class="font-weight-bolder text-capitalize">
                                                Menu Data <br> Permohonan Pasang <br> Baru
                                            </span>
                                        </a>
                                    </li>

                                    <hr style="margin-left: 20px; margin-right: 20px;">

                                    <!-- Link Menu Halaman Perubahan Daya -->
                                    <li class="nav-item">
                                        <a class="collapse-item" href="header.php?page=mohonyanbungpd">
                                            <i class="fas fa-user-friends"></i></i>
                                            <span class="font-weight-bolder text-capitalize">
                                                Menu Data <br> Permohonan Perubahan <br> Daya
                                            </span>
                                        </a>
                                    </li>

                                    <hr style="margin-left: 20px; margin-right: 20px;">

                                    <!-- Link Menu Halaman Multiguna -->
                                    <li class="nav-item">
                                        <a class="collapse-item" href="header.php?page=mohonyanbungps">
                                            <i class="fas fa-user-friends"></i></i>
                                            <span class="font-weight-bolder text-capitalize">
                                                Menu Data <br> Permohonan Penerangan <br> Sementara
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Menu Pelayanan Penyambungan -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-list-ul"></i>
                            <span>Menu Status Pelayanan Penyambungan</span>
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
                                                <?php if ($page == 'pb1phasa') {
                                                    echo 'active';
                                                } ?>" href="header.php?page=pb1phasa">Pasang Baru 1
                                                    <br> Phasa</a>
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($page == 'pb3phasa') {
                                                    echo 'active';
                                                } ?>" href="header.php?page=pb3phasa">Pasang Baru 3
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
                                                <?php if ($page == 'pd1phasa') {
                                                    echo 'active';
                                                } ?>" href="header.php?page=pd1phasa">Perubahan
                                                    Daya 1 <br> Phasa</a>
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($page == 'pd3phasa') {
                                                    echo 'active';
                                                } ?>" href="header.php?page=pd3phasa">Perubahan
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
                                                <?php if ($page == 'multiguna1phasa') {
                                                    echo 'active';
                                                } ?>" href="header.php?page=multiguna1phasa">Multiguna 1
                                                    Phasa</a>
                                                <a class="collapse-item font-weight-bold 
                                                <?php if ($page == 'multiguna3phasa') {
                                                    echo 'active';
                                                } ?>" href="header.php?page=multiguna3phasa">Multiguna 3
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
                                                <a class="collapse-item font-weight-bold" href="header.php?page=cpb1phasa">Pasang Baru 1
                                                    Phasa</a>
                                                <a class="collapse-item font-weight-bold" href="header.php?page=cpb3phasa">Pasang Baru 3
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
                                                <a class="collapse-item font-weight-bold" href="header.php?page=cpd1phasa">Perubahan
                                                    Daya 1 <br> Phasa</a>
                                                <a class="collapse-item font-weight-bold" href="header.php?page=cpd1ke3phasa">Perubahan
                                                    Daya 1 <br> Phasa ke 3 Phasa</a>
                                                <a class="collapse-item font-weight-bold" href="header.php?page=cpd3phasa">Perubahan Daya 3 <br>
                                                    Phasa</a>
                                                <a class="collapse-item font-weight-bold" href="header.php?page=cpd3ke1phasa">Perubahan
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
                                                <a class="collapse-item font-weight-bold" href="header.php?page=cmlta1phasa">Multiguna 1
                                                    Phasa</a>
                                                <a class="collapse-item font-weight-bold" href="header.php?page=cmlta3phasa">Multiguna 3
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
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="header.php?page=pengaduan">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Menu Data Pengaduan</span></a>
                    </li> -->

                    <!-- Nav Item - Menu Pengaduan -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseA" aria-expanded="true" aria-controls="collapseA">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span>Menu Data Pengaduan Masuk</span>
                        </a>
                        <div id="collapseA" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <ul class="navbar-nav bg-white accordion" id="accordionSidebar">
                                    <!-- Link Menu Data Pengaduan Masuk -->
                                    <li class="nav-item">
                                        <a class="collapse-item" href="header.php?page=pengaduanmasuk">
                                            <i class="fas fa-user-friends"></i></i>
                                            <span class="font-weight-bolder text-capitalize">Data Pengaduan <br> Masuk</span>
                                        </a>
                                    </li>

                                    <hr style="margin-left: 20px; margin-right: 20px;">

                                    <!-- Link Menu Data Pengaduan proses -->
                                    <li class="nav-item">
                                        <a class="collapse-item" href="header.php?page=pengaduanproses">
                                            <i class="fas fa-user-friends"></i></i>
                                            <span class="font-weight-bolder text-capitalize">Data Pengaduan <br> Proses
                                        </a>
                                    </li>

                                    <hr style="margin-left: 20px; margin-right: 20px;">

                                    <!-- Link Menu Data Pengaduan Selesai -->
                                    <li class="nav-item">
                                        <a class="collapse-item" href="header.php?page=pengaduanselesai">
                                            <i class="fas fa-user-friends"></i></i>
                                            <span class="font-weight-bolder text-capitalize">Data Pengaduan <br> Selesai
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Nav Item - Menu Cetak -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseB" aria-expanded="true" aria-controls="collapseB">
                            <i class="fas fa-print"></i>
                            <span>Menu Cetak</span>
                        </a>
                        <div id="collapseB" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <ul class="navbar-nav bg-white accordion" id="accordionSidebar">
                                    <!-- Link Menu Data Pengaduan Masuk -->
                                    <li class="nav-item">
                                        <a class="collapse-item" href="header.php?page=cetakpengaduan">
                                            <i class="fas fa-copy"></i>
                                            <span class="font-weight-bolder text-capitalize">Cetak Laporan <br> Pengaduan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                <?php
                    //Menu Hak akses Teknisi Yanbung
                } elseif ($level == 4 && $tekcheck == 1) {
                ?>
                    <!-- Nav Item - Menu Teknisi Yanbung -->
                    <li class="nav-item">
                        <a class="nav-link" href="header.php?page=laporanyan">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Menu Data Teknisi Yanbung</span></a>
                    </li>

                    <!-- Nav Item - Menu Teknisi Pengaduan -->
                    <li class="nav-item">
                        <a class="nav-link" href="header.php?page=laporanteknisiselesai">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Menu Data Pemasangan Selesai</span></a>
                    </li>
                <?php
                    //Menu Hak akses Teknisi Pelayanan Pengaduan
                } elseif ($level == 4 && $tekcheck == 2) {
                ?>
                    <!-- Nav Item - Menu Selesai -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseA" aria-expanded="true" aria-controls="collapseA">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span>Menu Pengaduan</span>
                        </a>
                        <div id="collapseA" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <ul class="navbar-nav bg-white accordion" id="accordionSidebar">
                                    <!-- Link Menu Data Pengaduan Masuk -->
                                    <li class="nav-item">
                                        <a class="collapse-item" href="header.php?page=laporanpen">
                                            <i class="fas fa-user-friends"></i></i>
                                            <span class="font-weight-bolder text-capitalize">Data Pengaduan <br> Masuk</span>
                                        </a>
                                    </li>

                                    <hr style="margin-left: 20px; margin-right: 20px;">

                                    <!-- Link Menu Data Pengaduan Masuk -->
                                    <li class="nav-item">
                                        <a class="collapse-item" href="header.php?page=laporanpenprogres">
                                            <i class="fas fa-user-friends"></i></i>
                                            <span class="font-weight-bolder text-capitalize">Data Pengaduan <br> Dalam Progres</span>
                                        </a>
                                    </li>

                                    <hr style="margin-left: 20px; margin-right: 20px;">

                                    <!-- Link Menu Data Pengaduan Selesai -->
                                    <li class="nav-item">
                                        <a class="collapse-item" href="header.php?page=laporanpenselesai">
                                            <i class="fas fa-user-friends"></i></i>
                                            <span class="font-weight-bolder text-capitalize">Data Pengaduan <br> Selesai
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                <?php
                } elseif ($level == 5) {
                ?>
                    <!-- Nav Item - Menu Teknisi Pengaduan -->
                    <li class="nav-item">
                        <a class="nav-link" href="header.php?page=laporansurvey">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Menu Data Survey Masuk dan Progres</span></a>
                    </li>

                    <!-- Nav Item - Menu Teknisi Pengaduan -->
                    <li class="nav-item">
                        <a class="nav-link" href="header.php?page=laporansurveyselesai">
                            <i class="fas fa-user-friends"></i></i>
                            <span>Menu Data Survey Selesai</span></a>
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

                    <!-- Topbar / Judul di Header Web -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <?php
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                                if ($page == 'pb1phasa' || 'pb3phasa' || 'pd1phasa' || 'pd3phasa' || 'multiguna1phs' || 'multiguna3phs') {
                            ?>
                                    <div class="d-flex justify-content-center">
                                        <!-- Header - Logo & Judul -->
                                        <div class="img-responsive">
                                            <a href="index.php" class="mr-3">
                                                <img src="img/logo.png" width="15%" class="mr-3">
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="d-flex justify-content-center">
                                    <!-- Header - Logo & Judul -->
                                    <div class="img-responsive">
                                        <h4 class="text-center mt-2 text-dark font-weight-bold text-sm-left text-md-left text-lg-left text-xl-left">
                                            <a href="index.php" class="border-right mr-3">
                                                <img src="img/logo.png" width="15%" class="mr-3">
                                            </a>
                                            Selamat Datang ke Aplikasi Pelayanan Penyambungan dan Pengaduan
                                        </h4>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </ul>
                    </nav>
                    <!-- End of Topbar -->

                    <?php
                    //Halaman Web Dinamis
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];

                        switch ($page) {
                                // Case untuk halaman pelanggan
                            case 'pelanggan':
                                include "pelayanan_penyambungan/pelanggan/pelanggan.php";
                                break;
                            case 'harga':
                                include "pelayanan_penyambungan/hargaRAB/halamanharga.php";
                                break;
                            case 'inputharga':
                                include "pelayanan_penyambungan/hargaRAB/tambah.php";
                                break;
                            case 'editharga':
                                include "pelayanan_penyambungan/hargaRAB/edit.php";
                                break;
                            case 'hapusharga':
                                include "pelayanan_penyambungan/hargaRAB/hapus.php";
                                break;

                            case 'mohonyanbungpb':
                                include "pelayanan_penyambungan/permohonan_yanbung/mohon.php";
                                break;
                            case 'mohonyanbungpd':
                                include "pelayanan_penyambungan/permohonan_yanbung/mohon_pd.php";
                                break;
                            case 'mohonyanbungps':
                                include "pelayanan_penyambungan/permohonan_yanbung/mohon_ps.php";
                                break;
                            case 'hapusmohonyanbung':
                                include "pelayanan_penyambungan/permohonan_yanbung/hapus.php";
                                break;
                            case 'up_pem':
                                include "pelayanan_penyambungan/permohonan_yanbung/update.php";
                                break;

                            case 'foto':
                                include "manajemen_user/editfoto.php";
                                break;

                                // Case untuk halaman Manajemen User dan CRUD nya
                            case 'user':
                                include "manajemen_user/mu_tabel.php";
                                break;
                            case 'inputuser':
                                include "manajemen_user/mu_tambah.php";
                                break;
                            case 'edituser':
                                include "manajemen_user/mu_edit.php";
                                break;
                            case 'hapususer':
                                include "manajemen_user/mu_hapus.php";
                                break;

                                // Case untuk Halaman Yanbung
                            case 'pb1phasa':
                                include "pelayanan_penyambungan/pelayananpenyambungan/pasang_baru/pb1phasa.php";
                                break;
                            case 'pb3phasa':
                                include "pelayanan_penyambungan/pelayananpenyambungan/pasang_baru/pb3phasa.php";
                                break;
                            case 'pd1phasa':
                                include "pelayanan_penyambungan/pelayananpenyambungan/perubahan_daya/pd1phasa.php";
                                break;
                            case 'pd3phasa':
                                include "pelayanan_penyambungan/pelayananpenyambungan/perubahan_daya/pd3phasa.php";
                                break;
                            case 'multiguna1phasa':
                                include "pelayanan_penyambungan/pelayananpenyambungan/multiguna/multiguna1phs.php";
                                break;
                            case 'multiguna3phasa':
                                include "pelayanan_penyambungan/pelayananpenyambungan/multiguna/multiguna3phs.php";
                                break;
                            case 'teknisitambah':
                                include "pelayanan_penyambungan/pelayananpenyambungan/input_teknisi.php";
                                break;
                            case 'sendemailteknisi':
                                include "pelayanan_penyambungan/pelayananpenyambungan/send.php";
                                break;
                            case 'progresteknisi':
                                include "teknisi/yanbung/form_input_progress.php";
                                break;
                            case 'laporanteknisiselesai':
                                include "teknisi/yanbung/form_laporan_selesai.php";
                                break;

                                //Case untuk Halaman Cetak
                            case 'cpb1phasa':
                                include "pelayanan_penyambungan/laporancetak/pasang_baru/mcpb1phasa.php";
                                break;
                            case 'cpb3phasa':
                                include "pelayanan_penyambungan/laporancetak/pasang_baru/mcpb3phasa.php";
                                break;
                            case 'cpd1phasa':
                                include "pelayanan_penyambungan/laporancetak/perubahan_daya/mcpd1phasa.php";
                                break;
                            case 'cpd1ke3phasa':
                                include "pelayanan_penyambungan/laporancetak/perubahan_daya/mcpd1ke3phasa.php";
                                break;
                            case 'cpd3phasa':
                                include "pelayanan_penyambungan/laporancetak/perubahan_daya/mcpd3phasa.php";
                                break;
                            case 'cpd3ke1phasa':
                                include "pelayanan_penyambungan/laporancetak/perubahan_daya/mcpd3ke1phasa.php";
                                break;
                            case 'cmlta1phasa':
                                include "pelayanan_penyambungan/laporancetak/multiguna/mcmultiguna1phasa.php";
                                break;
                            case 'cmlta3phasa':
                                include "pelayanan_penyambungan/laporancetak/multiguna/mcmultiguna3phasa.php";
                                break;

                                //case untuk input progress petugas survey
                            case 'progressurvey':
                                include "teknisi/survey/form_input_progress.php";
                                break;

                                //case untuk halaman laporan teknisi yanbung
                            case 'laporanyan':
                                include "teknisi/yanbung/form_laporan.php";
                                break;

                                //case untuk halaman laporan teknisi pengaduan
                            case 'laporanpen':
                                include "teknisi/pengaduan/form_laporan.php";
                                break;
                            case 'progres':
                                include "teknisi/pengaduan/form_input_progress.php";
                                break;
                            case 'laporanpenprogres':
                                include "teknisi/pengaduan/form_laporan_progres.php";
                                break;
                            case 'laporanpenselesai':
                                include "teknisi/pengaduan/form_laporan_selesai.php";
                                break;

                                //case untuk halaman operator
                            case 'pengaduanmasuk':
                                include "pelayanan_pengaduan/pengaduan_masuk.php";
                                break;
                            case 'pengaduanproses':
                                include "pelayanan_pengaduan/pengaduan_proses.php";
                                break;
                            case 'pengaduanselesai':
                                include "pelayanan_pengaduan/pengaduan_selesai.php";
                                break;
                            case 'cetakpengaduan':
                                include "pelayanan_pengaduan/mcpengaduan.php";
                                break;
                            case 'pengtambah':
                                include "pelayanan_pengaduan/input.php";
                                break;
                            case 'kirimemail':
                                include "pelayanan_pengaduan/kirimemail.php";
                                break;
                            case 'sendemail':
                                include "pelayanan_pengaduan/send.php";
                                break;

                                //case untuk halaman laporan Petugas Survey
                            case 'laporansurvey':
                                include "teknisi/survey/form_laporan.php";
                                break;
                            case 'laporansurveyselesai':
                                include "teknisi/survey/form_laporan_selesai.php";
                                break;

                            case 'surveytambah':
                                include "pelayanan_penyambungan/permohonan_yanbung/input_survey.php";
                                break;
                            case 'sendemailsurvey':
                                include "pelayanan_penyambungan/permohonan_yanbung/send.php";
                                break;
                            case 'kirimkonfirmasi':
                                include "pelayanan_penyambungan/permohonan_yanbung/input_kirim_email.php";
                                break;
                            case 'sendemailkonfirmasi':
                                include "pelayanan_penyambungan/permohonan_yanbung/send_konfirmasi.php";
                                break;

                                //case untuk halaman CRUD
                            case 'pelinput':
                                include "pelayanan_penyambungan/pelanggan/pel_input.php";
                                break;
                            case 'peledit':
                                include "pelayanan_penyambungan/pelanggan/pel_edit.php";
                                break;
                            case 'pelhapus':
                                include "pelayanan_penyambungan/pelanggan/pel_hapus.php";
                                break;
                            case 'inputpb':
                                include "pelayanan_penyambungan/CRUD/pasang_baru/pb_input.php";
                                break;
                            case 'sendcrud':
                                include "pelayanan_penyambungan/CRUD/send.php";
                                break;
                            case 'editpb':
                                include "pelayanan_penyambungan/CRUD/pasang_baru/pb_edit.php";
                                break;
                            case 'hapuspb':
                                include "pelayanan_penyambungan/CRUD/pasang_baru/pb_hapus.php";
                                break;
                            case 'inputpd':
                                include "pelayanan_penyambungan/CRUD/perubahan_daya/pd_input.php";
                                break;
                            case 'editpd':
                                include "pelayanan_penyambungan/CRUD/perubahan_daya/pd_edit.php";
                                break;
                            case 'hapuspd':
                                include "pelayanan_penyambungan/CRUD/perubahan_daya/pd_hapus.php";
                                break;
                            case 'inputmlta':
                                include "pelayanan_penyambungan/CRUD/multiguna/multiguna_input.php";
                                break;
                            case 'editmlta':
                                include "pelayanan_penyambungan/CRUD/multiguna/multiguna_edit.php";
                                break;
                            case 'hapusmlta':
                                include "pelayanan_penyambungan/CRUD/multiguna/multiguna_hapus.php";
                                break;

                                //case untuk detail biaya
                            case 'detailpb1':
                                include "pelayanan_penyambungan/pelayananpenyambungan/pasang_baru/detailpb1phasa.php";
                                break;
                            case 'detailpb3':
                                include "pelayanan_penyambungan/pelayananpenyambungan/pasang_baru/detailpb3phasa.php";
                                break;
                            case 'detailpd1':
                                include "pelayanan_penyambungan/pelayananpenyambungan/perubahan_daya/detailpd1phasa.php";
                                break;
                            case 'detailpd3':
                                include "pelayanan_penyambungan/pelayananpenyambungan/perubahan_daya/detailpd3phasa.php";
                                break;
                            case 'detailmlta1':
                                include "pelayanan_penyambungan/pelayananpenyambungan/multiguna/detailmultiguna1phasa.php";
                                break;
                            case 'detailmlta3':
                                include "pelayanan_penyambungan/pelayananpenyambungan/multiguna/detailmultiguna3phasa.php";
                                break;

                            case 'fetchdata':
                                include "pelayanan_penyambungan/CRUD/pasang_baru/fetch.php";
                                break;
                            case 'prosescari':
                                include "pelayanan_penyambungan/CRUD/process.js";
                                break;

                                //Else dari switch
                            default:
                                include "404.php";
                                break;
                        }
                    }
                    ?>


    </body>

</html>

<?php } ?>