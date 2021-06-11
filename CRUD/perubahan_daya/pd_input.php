<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Perubahan Daya</title>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Logo -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PLN</div>
            </a>
            <!-- Logo end -->

            <hr class="sidebar-divider my-0">

            <!-- Nav Item Sidebar - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../../index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
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

            <!-- Nav Item Sidebar - Menu Cetak -->
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
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Tambah Data Perubahan Daya</u></h1>
                    </div>

                    <!-- Card untuk Form -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Input Data Pelanggan Perubahan Daya</h6>
                        </div>
                        <!-- Form Utama -->
                        <div class="card-body">
                            <form action="pd_input.php" method="post" name="form1">

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
                                        <select name="id_pelanggan" id="id_pelanggan" class="action form-control" required>
                                            <option value="<?php echo $id_pelanggan ?>" disabled selected> Pilih </option>
                                            <?php echo $pelanggan ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="">Nama Pelanggan</label>
                                        <p name="nama" id="nama"></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Jenis Transaksi</label>
                                    <input type="text" name="jenis_transaksi" class="form-control" value="Pasang Baru" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="">Tanggal Mohon</label>
                                    <input type="date" name="tgl_mohon" class="form-control" value="tgl_mohon" required>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <label for="">Tarif Lama</label>
                                        <input type="text" name="tarif_lama" class="form-control" value="" placeholder="Masukkan Tarif Lama Pelanggan" required>
                                    </div>
                                    <div class="col">
                                        <label for="">Daya Lama</label>
                                        <input type="text" name="daya_lama" class="form-control" value="" placeholder="Masukkan Daya Lama Pelanggan" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <label for="">Tarif Baru</label>
                                        <input type="text" name="tarif_baru" class="form-control" value="" placeholder="Masukkan Tarif Baru Pelanggan" required>
                                    </div>
                                    <div class="col">
                                        <label for="">Daya Baru</label>
                                        <input type="text" name="daya_baru" class="form-control" value="" placeholder="Masukkan Daya Baru Pelanggan" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Fasa Lama</label>
                                    <select name="fasa_lama" class="form-control" required>
                                        <option value="" disabled selected>Pilih</option>
                                        <option>1 FASA</option>
                                        <option>3 FASA</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Fasa Baru</label>
                                    <select name="fasa_baru" class="form-control" required>
                                        <option value="" disabled selected>Pilih</option>
                                        <option>1 FASA</option>
                                        <option>3 FASA</option>
                                    </select>
                                </div>

                                <div class="form-group row float-right">
                                    <div class="col">
                                        <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>

                                        <button type="submit" class="btn btn-primary tesboot" name="save"><i class="fas fa-save"></i> Simpan</button>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    <!-- PHP - Query Tombol Save dan SweetAlert -->
    <?php
    if (isset($_POST['save'])) {
        $id_pelanggan = $_POST['id_pelanggan'];
        $tgl_mohon = $_POST['tgl_mohon'];
        $tarif_lama = $_POST['tarif_lama'];
        $daya_lama = $_POST['daya_lama'];
        $tarif_baru = $_POST['tarif_baru'];
        $daya_baru = $_POST['daya_baru'];
        $fasa_lama = $_POST['fasa_lama'];
        $fasa_baru = $_POST['fasa_baru'];

        $insert = "INSERT INTO tb_perubahan_daya (id_pelanggan, jenis_transaksi, tgl_mohon, tarif_lama, daya_lama, tarif_baru, daya_baru, fasa_lama, fasa_baru) 
        VALUES ('$id_pelanggan', 'Perubahan Daya', '$tgl_mohon', '$tarif_lama','$daya_lama', '$tarif_baru','$daya_baru', '$fasa_lama', '$fasa_baru')";
        $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

        if ($query) {
            if (($fasa_lama == "1 FASA") && ($fasa_baru == "1 FASA")) {
                $insert2 = "INSERT INTO tb_hasil_perhitungan_pd_1phs (id_perubahan_daya, pekerjaan_rab, MCB, segel_plastik, penggatian_mcb_1phs, total_biaya)
                    VALUES 
                    ('" . mysqli_insert_id($mysqli) . "', 'PD 1 FASA', '30840', '2724', '46706', '80270')";
                $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
    ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses.',
                        text: 'Sukses Menambahkan Data Pelanggan Perubahan Daya 1 Phasa dan Detail Biaya Pelanggan Perubahan Daya 1 Phasa'
                    }).then((result) => {
                        window.location = "../../pelayananpenyambungan/perubahan_daya/pd1phasa.php";
                    })
                </script>
            <?php
            } elseif (($fasa_lama == "1 FASA") && ($fasa_baru == "3 FASA")) {
                $insert2 = "INSERT INTO tb_hasil_perhitungan_pd_1phs_ke_3phs (id_perubahan_daya, pekerjaan_rab, 
                kwh_meter_3phs_pengukuran_langsung_kelas_1, segel_plastik, nfa2x_3x35, nfa2x_4x16, service_wedge_clamp, 
                    cco_3t3, skat_3, isolasi_scotch, pemas_kwh_meter_3phs, penarikan_sr3phs, pengepresan, penggantian_mcb, 
                    bongkar_kwh_meter_1phs, total_biaya)
                    VALUES 
                    ('" . mysqli_insert_id($mysqli) . "', 'PD 1 FASA KE 3 FASA', '1348000', '2724', '29360', '12110', '4433', '11722',
                    '39400', '5615', '46811', '38482', '31339', '40800', '24606', '1635402')";
                $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
            ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses.',
                        text: 'Sukses Menambahkan Data Pelanggan Perubahan Daya 1 Phasa dan Detail Biaya Pelanggan Perubahan Daya 1 Phasa ke 3 Phasa'
                    }).then((result) => {
                        window.location = "../../pelayananpenyambungan/perubahan_daya/pd1phasa.php";
                    })
                </script>
            <?php
            } elseif (($fasa_lama == "3 FASA") && ($fasa_baru == "3 FASA")) {
                $insert2 = "INSERT INTO tb_hasil_perhitungan_pd_3phs (id_perubahan_daya,pekerjaan_rab, penggantian_mccb_3phs, total_biaya)
                    VALUES 
                    ('" . mysqli_insert_id($mysqli) . "','PD 3 FASA', '40800', '40800')";
                $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
            ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses.',
                        text: 'Sukses Menambahkan Data Pelanggan Perubahan Daya 3 Phasa dan Detail Biaya Pelanggan Perubahan Daya 3 Phasa'
                    }).then((result) => {
                        window.location = "../../pelayananpenyambungan/perubahan_daya/pd3phasa.php";
                    })
                </script>
            <?php
            } elseif (($fasa_lama == "3 FASA") && ($fasa_baru == "1 FASA")) {
                $insert2 = "INSERT INTO tb_hasil_perhitungan_pd_3phs_ke_1phs (id_perubahan_daya, pekerjaan_rab,
                    kwh_meter_tunggal,nfa2x_2x10,segel_plastik, cco_1t1, cco_3t1,isolasi_scotch,
                    service_wedge, pasang_kwh, penarikan_sr, pengepresan, survey, bongkar_kwh_meter, total_biaya)
                    VALUES 
                    ('" . mysqli_insert_id($mysqli) . "', 'PD 3 FASA KE 1 FASA', '243040', '4210', '2724', '6895', '9358', 
                    '5615', '3842', '41008', '33625', '22982', '20856', '28086', '422241')";
                $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
            ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses.',
                        text: 'Sukses Menambahkan Data Pelanggan Perubahan Daya 3 Phasa dan Detail Biaya Pelanggan Perubahan Daya 3 Phasa ke 1 Phasa'
                    }).then((result) => {
                        window.location = "../../pelayananpenyambungan/perubahan_daya/pd3phasa.php";
                    })
                </script>
    <?php
            }
        }
    }
    ?>
</body>

</html>