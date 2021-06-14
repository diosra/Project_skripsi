<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php
include '../../koneksi.php';
if (!isset($_SESSION['username'])) {
    echo "<script> alert('Silahkan login Terlebih dahulu');</script>";
    echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
} else {
?>

    <head>
        <!-- Custom fonts for this template -->
        <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template -->
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

                <!-- Sidebar - Logo -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center mt-2 mb-3" href="../../index.php">
                    <div class="img-responsive">
                        <img src="../../img/logo.png" width="100%">
                    </div>
                </a>

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

                <!-- Nav Item - Menu Pelanggan -->
                <li class="nav-item">
                    <a class="nav-link" href="../../pelanggan/pelanggan.php">
                        <i class="fas fa-user-friends"></i></i>
                        <span>Menu Data Pelanggan</span></a>
                </li>

                <!-- Nav Item - Menu Pelayanan Penyambungan -->
                <li class="nav-item">
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
                                            <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/pasang_baru/pb1phasa.php">Pasang Baru 1
                                                <br> Phasa</a>
                                            <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/pasang_baru/pb3phasa.php">Pasang Baru 3
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
                                            <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/perubahan_daya/pd1phasa.php">Perubahan
                                                Daya 1 <br> Phasa</a>
                                            <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/perubahan_daya/pd3phasa.php">Perubahan
                                                Daya 3 <br> Phasa</a>
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
                                            <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/migrasi/migrasi1phs.php">Migrasi 1
                                                Phasa</a>
                                            <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/migrasi/migrasi3phs.php">Migrasi 3
                                                Phasa</a>
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
                                            <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/multiguna/multiguna1phs.php">Multiguna 1
                                                Phasa</a>
                                            <a class="collapse-item font-weight-bold" href="../../pelayananpenyambungan/multiguna/multiguna3phs.php">Multiguna 3
                                                Phasa</a>
                                        </div>
                                    </div>
                                </li>

                                <!-- <hr style="margin-left: 20px; margin-right: 20px;"> -->

                                <!-- Link Menu Halaman P2TL -->
                                <!-- <li class="nav-item">
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
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Menu Cetak -->
                <li class="nav-item active">
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
                                            <a class="collapse-item font-weight-bold 
                                            <?php if ($pageSkr == 'mcpb1phasa') {
                                                echo 'active';
                                            } ?>" href="../pasang_baru/mcpb1phasa.php">Pasang Baru 1 Phasa</a>
                                            <a class="collapse-item font-weight-bold 
                                            <?php if ($pageSkr == 'mcpb3phasa') {
                                                echo 'active';
                                            } ?>" href="../pasang_baru/mcpb3phasa.php">Pasang Baru 3 Phasa</a>
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
                                            <a class="collapse-item font-weight-bold 
                                            <?php if ($pageSkr == 'mcpd1phasa') {
                                                echo 'active';
                                            } ?>" href="../perubahan_daya/mcpd1phasa.php">Perubahan Daya 1 <br> Phasa</a>
                                            <a class="collapse-item font-weight-bold 
                                            <?php if ($pageSkr == 'mcpd1ke3phasa') {
                                                echo 'active';
                                            } ?>" href="../perubahan_daya/mcpd1ke3phasa.php">Perubahan Daya 1 <br> Phasa ke 3 Phasa</a>
                                            <a class="collapse-item font-weight-bold 
                                            <?php if ($pageSkr == 'mcpd3phasa') {
                                                echo 'active';
                                            } ?>" href="../perubahan_daya/mcpd3phasa.php">Perubahan Daya 3 <br> Phasa</a>
                                            <a class="collapse-item font-weight-bold 
                                            <?php if ($pageSkr == 'mcpd3ke1phasa') {
                                                echo 'active';
                                            } ?>" href="../perubahan_daya/mcpd3ke1phasa.php">Perubahan Daya 3 <br> Phasa ke 1 Phasa</a>
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
                                            <a class="collapse-item font-weight-bold 
                                            <?php if ($pageSkr == 'mcmigrasi1phasa') {
                                                echo 'active';
                                            } ?>" href="../migrasi/mcmigrasi1phasa.php">Migrasi 1 Phasa</a>
                                            <a class="collapse-item font-weight-bold 
                                            <?php if ($pageSkr == 'mcmigrasi3phasa') {
                                                echo 'active';
                                            } ?>" href="../migrasi/mcmigrasi3phasa.php">Migrasi 3 Phasa</a>
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
                                            <a class="collapse-item font-weight-bold 
                                            <?php if ($pageSkr == 'mcmultiguna1phasa') {
                                                echo 'active';
                                            } ?>" href="../multiguna/mcmultiguna1phasa.php">Multiguna 1 Phasa</a>
                                            <a class="collapse-item font-weight-bold 
                                            <?php if ($pageSkr == 'mcmultiguna3phasa') {
                                                echo 'active';
                                            } ?>" href="../multiguna/mcmultiguna3phasa.php">Multiguna 3 Phasa</a>
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
                                            <a class="collapse-item font-weight-bold 
                                            <?php if ($pageSkr == 'mcp2tl1phasa') {
                                                echo 'active';
                                            } ?>" href="../p2tl/mcp2tl1phasa.php">P2TL 1 Phasa</a>
                                            <a class="collapse-item font-weight-bold 
                                            <?php if ($pageSkr == 'mcp2tl3phasa') {
                                                echo 'active';
                                            } ?>" href="../p2tl/mcp2tl3phasa.php">P2TL 3 Phasa</a>
                                        </div>
                                    </div>
                                </li> -->

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
                        <form class="form-inline">
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-3 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama'] ?></span>
                                    <i class="fas fa-user-alt fa-2x"></i>
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
    </body>

</html>


<?php } ?>