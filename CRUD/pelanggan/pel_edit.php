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
            <a class="sidebar-brand d-flex align-items-center justify-content-center mt-2 mb-3" href="../../index.php">
                <div class="img-responsive">
                    <img class="img-thumbnail" src="../../img/logo.png">
                </div>
            </a>
            <!-- Logo end -->

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../../index.php">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Dashboard end -->

            <hr class="sidebar-divider">

            <!-- Nav Item - Menu Pelanggan -->
            <li class="nav-item active">
                <a class="nav-link" href="../../pelanggan/pelanggan.php">
                    <i class="fas fa-user-friends"></i></i>
                    <span>Menu Data Pelanggan</span></a>
            </li>

            <!-- Nav Item Sidebar - Menu Pelayanan Penyambungan -->
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
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Ubah Data Pasang Baru</u></h1>
                    </div>

                    <!-- Card untuk Form -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data Pelanggan Pasang Baru</h6>
                        </div>
                        <!-- Form Utama -->
                        <div class="card-body">
                            <!-- PHP - Query Tombol Ubah dan SweetAlert -->
                            <?php
                            if (isset($_POST['ubah'])) {
                                $id = $_POST['id_pelanggan'];
                                $nama = $_POST['nama'];
                                $alamat = $_POST['alamat'];
                                $no_telpon = $_POST['no_telpon'];

                                $update = "UPDATE tb_pelanggan SET  
                                nama='$nama', alamat='$alamat', no_telp='$no_telpon' 
                                WHERE id_pelanggan=$id";
                                $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));

                                if ($query) {
                            ?>
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Sukses.',
                                            text: 'Sukses Mengubah Data Pelanggan'
                                        }).then((result) => {
                                            window.location = "../../pelanggan/pelanggan.php";
                                        })
                                    </script>
                            <?php
                                }
                            }
                            ?>

                            <!-- PHP - Query Select untuk data ditampilkan di form -->
                            <?php
                            $no_registrasi = '';
                            $tgl_mohon = '';
                            $nama = '';
                            $alamat = '';
                            $no_telpon = '';
                            $asalmohon = '';
                            $nama = '';
                            if (isset($_GET['edit'])) {
                                $id = $_GET['edit'];
                                $result =
                                    $mysqli->query("SELECT * FROM tb_pelanggan WHERE id_pelanggan=$id") or die($mysqli->error);

                                if ($result->num_rows) {
                                    $row = $result->fetch_array();
                                    $no_registrasi = $row['no_registrasi'];
                                    $nama = $row['nama'];
                                    $alamat = $row['alamat'];
                                    $no_telpon = $row['no_telp'];
                                }
                            }
                            ?>

                            <form action="pel_edit.php?edit=<?php echo $row['id_pelanggan'] ?>" method="post" name="form1">
                                <input type="hidden" name="id_pelanggan" value="<?php echo $id; ?>">

                                <div class="form-group">
                                    <label for="">Nomor Registrasi Pelanggan</label>
                                    <input type="text" name="no_registrasi" class="form-control" placeholder="Masukkan Nomor Registrasi" value="<?php echo $no_registrasi; ?>" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Pelanggan</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Pelanggan" value="<?php echo $nama; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" placeholder="Masukkan alamat pelanggan" class="form-control" cols="10" rows="3" value="<?php echo $alamat; ?>" required><?php echo $alamat; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Nomor Telpon Pelanggan</label>
                                    <input type="text" name="no_telpon" class="form-control" placeholder="Masukkan Nomor Telpon pelanggan" value="<?php echo $no_telpon; ?>" required>
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

</body>

</html>