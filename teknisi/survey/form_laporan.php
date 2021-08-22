<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Petugas Survey</title>
</head>

</html>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Data Masuk dan Progres</u></h1>
    </div>

    <!-- Modal dialog untuk deskripsi -->
    <div id="get-data" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deskripsi Pengajuan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup Deskripsi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk deskripsi -->
    <div id="get-data" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deskripsi Pengajuan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup Deskripsi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk deskripsi -->
    <div id="get-data2" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Laporan Sementara Survey</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup Deskripsi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk deskripsi -->
    <div id="get-data3" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Laporan Sementara Survey</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi3">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup Deskripsi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk deskripsi -->
    <div id="get-data4" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Laporan Sementara Survey</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi4">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup Deskripsi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Pasang Baru -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Pasang Baru</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Registrasi</th>
                            <th class="text-center">Identitas</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Tanggal Permohonan Masuk</th>
                            <th class="text-center">Tipe Survey</th>
                            <th class="text-center">Deskripsi Pengajuan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nama = $_SESSION['nama'];
                        $data = mysqli_query($mysqli, "SELECT a.* , b.* , c.id_petugas_survey, d.id_mohon, d.jenis_transaksi FROM 
                        tb_survey_lap_masuk a 
                        JOIN tb_mohon_pb b ON a.id_mohon_survey = b.id_mohon 
                        JOIN tb_petugas_survey c ON a.id_petugas = c.no_petugas_survey
                        JOIN tb_pasang_baru d ON b.id_mohon = d.id_mohon 
                        WHERE a.pegawai_acc = 2 && c.nama = '$nama' && (b.status_survey = '1' || b.status_survey = '2')");

                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);

                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                    <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td>
                                    <td class="align-middle"><?php echo date('d-M-Y', strtotime($row['tgl_masuk'])); ?></td>
                                    <td class="align-middle"><?php echo $row['tipe']; ?></td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_mohon_survey'] ?>" class="open-modal btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>
                                    <?php
                                    if ($row['status_survey'] == "1") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-danger rounded" href="header.php?page=progressurvey&status=<?php echo $row['status_survey'] ?>&id=<?php echo $row['id_survey_lap'] ?>&jt=<?php echo $row['jenis_transaksi'] ?>">
                                                Belum di Proses
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "2") {
                                    ?>
                                        <td class=" align-middle text-center">
                                            <a class="open-modal4 btn btn-warning rounded" data-toggle="modal" data-id="<?php echo $row['id_survey_lap'] ?>" href="#">
                                                Survey Masih Dalam Proses
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "3") {
                                    ?>
                                        <td class=" align-middle text-center">
                                            <a class="btn btn-success rounded">
                                                Selesai
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "4") {
                                    ?>
                                        <td class=" align-middle text-center">
                                            <a class="btn btn-danger rounded">
                                                Ditolak
                                            </a>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-danger rounded">
                                                Error
                                            </a>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr style="border-top: 1px solid #8c8b8b; border-bottom: 1px solid #fff;">

    <!-- Tabel Perubahan Daya -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Perubahan Daya</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered text-gray-900" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Registrasi</th>
                            <th class="text-center">Identitas</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Tanggal Permohonan Masuk</th>
                            <th class="text-center">Tipe Survey</th>
                            <th class="text-center">Deskripsi Pengajuan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nama = $_SESSION['nama'];

                        $data2 = mysqli_query($mysqli, "SELECT a.* , b.* , c.id_petugas_survey, d.*, e.* FROM 
                        tb_survey_lap_masuk a 
                        JOIN tb_mohon_pd b ON a.id_mohon_survey = b.id_mohon 
                        JOIN tb_petugas_survey c ON a.id_petugas = c.no_petugas_survey 
                        JOIN tb_perubahan_daya d ON b.id_mohon = d.id_mohon
                        JOIN tb_pelanggan e ON b.id_pelanggan = e.idpel
                        WHERE a.pegawai_acc = 1 && c.nama = '$nama' && (b.status_survey = '1' || b.status_survey = '2')");

                        $no = 1;
                        $hitungrow2 = mysqli_num_rows($data2);

                        if ($hitungrow2 > 0) {
                            while ($row = $data2->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                    <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td>
                                    <td class="align-middle"><?php echo date('d-M-Y', strtotime($row['tgl_masuk'])); ?></td>
                                    <td class="align-middle"><?php echo $row['tipe']; ?></td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_mohon_survey'] ?>" class="open-modal2 btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>
                                    <?php
                                    if ($row['status_survey'] == "1") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-danger rounded" href="header.php?page=progressurvey&status=<?php echo $row['status_survey'] ?>&id=<?php echo $row['id_survey_lap'] ?>&jt=<?php echo $row['jenis_transaksi'] ?>">
                                                Belum di Proses
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "2") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal5 btn btn-warning rounded" data-toggle="modal" data-id="<?php echo $row['id_survey_lap'] ?>" href="#">
                                                Survey Masih Dalam Proses
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "3") {
                                    ?>
                                        <td class=" align-middle text-center">
                                            <a class="btn btn-success rounded">
                                                Selesai
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "4") {
                                    ?>
                                        <td class=" align-middle text-center">
                                            <a class="btn btn-danger rounded">
                                                Ditolak
                                            </a>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-danger rounded">
                                                Error
                                            </a>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr style="border-top: 1px solid #8c8b8b; border-bottom: 1px solid #fff;">

    <!-- Tabel Multiguna -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Multiguna / Sambung Sementara</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered text-gray-900" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Registrasi</th>
                            <th class="text-center">Identitas</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Tanggal Permohonan Masuk</th>
                            <th class="text-center">Tipe Survey</th>
                            <th class="text-center">Deskripsi Pengajuan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nama = $_SESSION['nama'];

                        $data3 = mysqli_query($mysqli, "SELECT a.* , b.* , c.id_petugas_survey, d.*, e.* FROM 
                        tb_survey_lap_masuk a 
                        JOIN tb_mohon_multiguna b ON a.id_mohon_survey = b.id_mohon 
                        JOIN tb_petugas_survey c ON a.id_petugas = c.no_petugas_survey 
                        JOIN tb_multiguna d ON b.id_mohon = d.id_mohon
                        JOIN tb_pelanggan e ON b.id_pelanggan = e.idpel
                        WHERE a.pegawai_acc = 1 && c.nama = '$nama' && (b.status_survey = '1' || b.status_survey = '2')");

                        $no = 1;
                        $hitungrow3 = mysqli_num_rows($data3);

                        if ($hitungrow3 > 0) {
                            while ($row3 = $data3->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row3['no_registrasi']; ?></td>
                                    <td class="align-middle"><?php echo $row3['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row3['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row3['alamat']; ?></td>
                                    <td class="align-middle"><?php echo date('d-M-Y', strtotime($row3['tgl_masuk'])); ?></td>
                                    <td class="align-middle"><?php echo $row3['tipe']; ?></td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row3['id_mohon_survey'] ?>" class="open-modal3 btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>
                                    <?php
                                    if ($row3['status_survey'] == "1") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-danger rounded" href="header.php?page=progressurvey&status=<?php echo $row3['status_survey'] ?>&id=<?php echo $row3['id_survey_lap'] ?>&jt=<?php echo $row3['jenis_transaksi'] ?>">
                                                Belum di Proses
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row3['status_survey'] == "2") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal6 btn btn-warning rounded" data-toggle="modal" data-id="<?php echo $row3['id_survey_lap'] ?>" href="#">
                                                Survey Masih Dalam Proses
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row3['status_survey'] == "3") {
                                    ?>
                                        <td class=" align-middle text-center">
                                            <a class="btn btn-success rounded">
                                                Selesai
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row3['status_survey'] == "4") {
                                    ?>
                                        <td class=" align-middle text-center">
                                            <a class="btn btn-danger rounded">
                                                Ditolak
                                            </a>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-danger rounded">
                                                Error
                                            </a>
                                        </td>
                                    <?php
                                    }
                                    ?>
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
<!-- End of Main Content -->

<!-- Script Modal Deskripsi Pasang Baru -->
<script>
    $(function() {
        $(document).on('click', '.open-modal', function(e) {
            e.preventDefault();
            $("#get-data").modal('show');
            $.post('teknisi/survey/view.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi").html(html);
                });
        });
    })
</script>

<!-- Script Modal Deskripsi Perubahan Daya -->
<script>
    $(function() {
        $(document).on('click', '.open-modal2', function(e) {
            e.preventDefault();
            $("#get-data").modal('show');
            $.post('teknisi/survey/view_pd.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi").html(html);
                });
        });
    })
</script>

<!-- Script Modal Deskripsi Multiguna -->
<script>
    $(function() {
        $(document).on('click', '.open-modal3', function(e) {
            e.preventDefault();
            $("#get-data").modal('show');
            $.post('teknisi/survey/view_mlta.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi").html(html);
                });
        });
    })
</script>

<!-- Script Modal Deskripsi Sementara PB -->
<script>
    $(function() {
        $(document).on('click', '.open-modal4', function(e) {
            e.preventDefault();
            $("#get-data2").modal('show');
            $.post('teknisi/survey/view_laporan_pb.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi2").html(html);
                });
        });
    })
</script>

<!-- Script Modal Deskripsi Sementara PD -->
<script>
    $(function() {
        $(document).on('click', '.open-modal5', function(e) {
            e.preventDefault();
            $("#get-data3").modal('show');
            $.post('teknisi/survey/view_laporan_pd.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi3").html(html);
                });
        });
    })
</script>

<!-- Script Modal Deskripsi Sementara MLTA -->
<script>
    $(function() {
        $(document).on('click', '.open-modal6', function(e) {
            e.preventDefault();
            $("#get-data4").modal('show');
            $.post('teknisi/survey/view_laporan_mlta.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi4").html(html);
                });
        });
    })
</script>


<?php
include_once 'footer.php';
?>

<!-- Script untuk Menampilkan 2 Tabel di 1 halaman -->
<script>
    $(document).ready(function() {
        $('table.display').DataTable();
    });
</script>


<!-- Script buat menghilangkan beberapa fitur sorting di datatables -->
<script>
    $('#dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [4, 6, 7, 8]
        }]
    });
</script>

<!-- Script buat menghilangkan beberapa fitur sorting di datatables - Tabel 2 -->
<script>
    $('#dataTable2').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [4, 6, 7, 8]
        }]
    });
</script>

<!-- Script buat menghilangkan beberapa fitur sorting di datatables - Tabel 2 -->
<script>
    $('#dataTable3').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [4, 6, 7, 8]
        }]
    });
</script>