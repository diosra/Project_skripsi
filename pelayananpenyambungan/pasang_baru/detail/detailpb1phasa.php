<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pasang Baru 1 Phasa</title>

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

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../../index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PLN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../../../index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
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

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Menu Cetak</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- Link Cetak Menu Pasang Baru -->
                        <h6 class="collapse-header">Cetak Pasang Baru</h6>
                        <a class="collapse-item" href="../../laporancetak/pasang_baru/mcpb1phasa.php">Menu Cetak <br> Pasang Baru 1 Phasa</a>
                        <a class="collapse-item" href="../../laporancetak/pasang_baru/mcpb3phasa.php">Menu Cetak <br> Pasang Baru 3 Phasa</a>

                        <hr style="margin-left: 20px; margin-right: 20px;">

                        <!-- Link Cetak Menu Perubahan Daya -->
                        <h6 class="collapse-header">Cetak Perubahan Daya</h6>
                        <a class="collapse-item" href="../../laporancetak/perubahan_daya/mcpd1phasa.php">Menu Cetak <br> Perubahan Daya 1 Phasa</a>
                        <a class="collapse-item" href="../../laporancetak/perubahan_daya/mcpd3phasa.php">Menu Cetak <br> Perubahan Daya 3 Phasa</a>

                        <hr style="margin-left: 20px; margin-right: 20px;">

                        <!-- Link Cetak Menu Migrasi -->
                        <h6 class="collapse-header">Cetak Migrasi</h6>
                        <a class="collapse-item" href="../../laporancetak/migrasi/mcmigrasi1phasa.php">Menu Cetak <br> Migrasi 1 Phasa</a>
                        <a class="collapse-item" href="../../laporancetak/migrasi/mcmigrasi3phasa.php">Menu Cetak <br> Migrasi 3 Phasa</a>

                        <hr style="margin-left: 20px; margin-right: 20px;">

                        <!-- Link Cetak Menu Multiguna -->
                        <h6 class="collapse-header">Cetak Multiguna</h6>
                        <a class="collapse-item" href="../../laporancetak/multiguna/mcmultiguna1phasa.php">Menu Cetak <br> Multiguna 1 Phasa</a>
                        <a class="collapse-item" href="../../laporancetak/multiguna/mcmultiguna3phasa.php">Menu Cetak <br> Multiguna 3 Phasa</a>

                        <hr style="margin-left: 20px; margin-right: 20px;">

                        <!-- Link Cetak Menu P2TL -->
                        <h6 class="collapse-header">Cetak P2TL</h6>
                        <a class="collapse-item" href="../../laporancetak/p2tl/mcp2tl1phasa.php">Menu Cetak P2TL 1 Phasa</a>
                        <a class="collapse-item" href="../../laporancetak/p2tl/mcp2tl3phasa.php">Menu Cetak P2TL 3 Phasa</a>
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Detail Biaya Pelanggan Pasang Baru 1 Phasa</u></h1>
                    </div>

                    <!-- Tabel Utama -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">No Registrasi</th>
                                            <th rowspan="2">Nama Pelanggan</th>
                                            <th rowspan="2">Pekerjaan RAB</th>
                                            <th colspan="11" class="text-center">Detail Biaya</th>
                                            <th rowspan="2">Total Biaya</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Detail 1 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="kWh Meter 3 Phase Pengukuran langsung kelas 1"></i></th>
                                            <th class="text-center">Detail 2 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="NFA2X;2X10mm2;0,6/1kV;OH"></i></th>
                                            <th class="text-center">Detail 3 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Segel Plastik"></i></th>
                                            <th class="text-center">Detail 4 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="CCO 1T1 (10/16 sqmm - 10/16 sqmm)"></i></th>
                                            <th class="text-center">Detail 5 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="CCO 3T1 (16/35 sqmm - 10/16 sqmm)"></i></th>
                                            <th class="text-center">Detail 6 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Isolasi Scotch / Rubber Tape 1 KV ( Dimension : 19 mm x 20,1 m x 0.177 mm )"></i></th>
                                            <th class="text-center">Detail 7 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Service Wedge Clamp 1 Phasa (Dua Sampit) ; Type SWC 616 ; 6. 10, 16 sqmm"></i></th>
                                            <th class="text-center">Detail 8 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Pasang Kwh Meter Satu Phase + Wiring"></i></th>
                                            <th class="text-center">Detail 9 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Penarikan SR 1 Phase"></i></th>
                                            <th class="text-center">Detail 10 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Pengepresan CCO / Connector 10-25 mm²"></i></th>
                                            <th class="text-center">Detail 11 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Survey"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = mysqli_query($mysqli, "SELECT a.*, b.*, c.* FROM tb_pasang_baru a JOIN tb_hasil_perhitungan_pb_1phs c ON a.id_pasang_baru = c.id_pasang_baru JOIN tb_pelanggan b ON a.id_pelanggan=b.id_pelanggan WHERE a.fasa_baru = '1 FASA'");
                                        $no = 1;
                                        $hitungrow = mysqli_num_rows($data);
                                        if ($hitungrow > 0) {
                                            while ($row = $data->fetch_assoc()) { ?>
                                                <tr>
                                                    <td style="text-align:center;"><?php echo $no++ ?></td>
                                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                                    <td class="align-middle"><?php echo $row['pekerjaan_rab']; ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['kwh_meter_prabayar_fase_tunggal'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['nfa_2X'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['segel_plastik'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['cco_1T1'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['cco_3T1'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['isolasi_scotch'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['service_wedge_clamp_1phs'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['pasang_kwh_meter_satu_phasa_wiring'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['penarikan_sr_1_phasa'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['pengepresan_cco'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">Rp. <?php echo number_format($row['survey'], 0, ',', '.') ?></td>
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
            <a href="../pb1phasa.php" class="btn btn-danger" class="mb-2 ml-3"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
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

    <!-- Script untuk Menampilkan Popover -->
    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        })
    </script>

    <!-- Script buat menghilangkan beberapa fitur sorting di datatables -->
    <script>
        $('#dataTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
            }]
        });
    </script>
</body>

</html>