<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php
include '../../koneksi.php';
?>

<head>
    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="page-top" class="text-gray-900">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #1B6C89;">

            <div class="nav-item text-center mt-3 mb-3">
                <a class="btn" href="../../login.php">
                    <span style="color: white;"><i class="fas fa-user-alt fa-2x"></i></span> <br>
                    <span class="text-success">Login</span>
                </a>
            </div>

            <!-- Divider -->
            <hr class=" sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../../dashboard.php">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Menu Pelayanan Penyambungan -->
            <li class="nav-item 
            <?php if ($pageSkr == 'pb' || 'pd' || 'mg') {
                echo 'active';
            } ?>">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-list-ul"></i>
                    <span>Menu Layanan Penyambungan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <ul class="navbar-nav bg-white accordion" id="accordionSidebar">

                            <!-- Link Menu Halaman Pasang Baru -->
                            <li class="nav-item">
                                <a class="collapse-item 
                                <?php if ($pageSkr == 'pb') {
                                    echo 'active';
                                } ?>" href="../pasang_baru/menu_pb.php">
                                    <span class="font-weight-bolder text-capitalize">Pasang Baru</span>
                                </a>
                            </li>

                            <hr style="margin-left: 20px; margin-right: 20px;">

                            <!-- Link Menu Halaman Perubahan Daya -->
                            <li class="nav-item">
                                <a class="collapse-item 
                                <?php if ($pageSkr == 'pd') {
                                    echo 'active';
                                } ?>" href="../perubahan_daya/menu_pd.php">
                                    <span class="font-weight-bolder text-capitalize">Perubahan Daya</span>
                                </a>
                            </li>

                            <hr style="margin-left: 20px; margin-right: 20px;">

                            <!-- Link Menu Halaman Multiguna -->
                            <li class="nav-item">
                                <a class="collapse-item 
                                <?php if ($pageSkr == 'mg') {
                                    echo 'active';
                                } ?>" href="../multiguna/menu_mg.php">
                                    <span class="font-weight-bolder text-capitalize">Multiguna</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Layanan Pengaduan -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <span>Layanan Pengaduan</span></a>
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

                        <div class="d-flex justify-content-center">
                            <!-- Header - Logo & Judul -->
                            <div class="img-responsive">
                                <a href="index.php" class="mr-3"><img src="../../img/logo.png" width="15%" class="mr-3"></a>
                            </div>
                        </div>

                    </ul>
                </nav>
                <!-- End of Topbar -->
</body>

</html>