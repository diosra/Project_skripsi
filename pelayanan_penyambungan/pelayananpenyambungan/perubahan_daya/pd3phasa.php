<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perubahan Daya 3 Phasa</title>
    <?php
    $pageSkr = 'pd1phasa';
    ?>
</head>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Perubahan Daya 3 Phasa</u></h1>
    </div>

    <!-- Modal dialog untuk deskripsi -->
    <div id="get-data" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deskripsi Lengkap Data Pengajuan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk detail biaya -->
    <div id="get-data2" class="modal fade" role="dialog">
        <div class="modal-dialog mw-100 modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Biaya RAB Perubahan Daya 3 Fasa dan Perubahan Daya 3 Fasa ke 1 Fasa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi_biaya">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk Dalam Proses Survey-->
    <div id="get-data3" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Laporan Progres Sementara Petugas</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi_proses">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk Selesai Survey-->
    <div id="get-data4" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Laporan Hasil Survey</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi_selesai">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk Dalam Proses (belum ada progres dari petugas)Survey-->
    <div id="get-data5" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Petugas Survey</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi_petugas">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Utama -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Identitas (KTP)</th>
                            <th class="text-center">Nama Pelanggan</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Tanggal Permohonan Masuk</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Detail Biaya RAB</th>
                            <th class="text-center">Status Petugas Survey</th>
                            <th class="text-center">Status Petugas Teknisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "SELECT a.* , b.*, c.*, d.*, e.*, f.no_petugas_survey FROM tb_perubahan_daya b JOIN tb_mohon_pd a ON b.id_mohon = a.id_mohon JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan LEFT JOIN tb_laporan_survey d ON d.id_yanbung = b.id_perubahan_daya LEFT JOIN tb_survey_lap_masuk e ON e.id_yanbung = b.id_perubahan_daya LEFT JOIN tb_petugas_survey f ON f.no_petugas_survey = e.id_petugas WHERE fasa_lama = '3 FASA' && a.status_pembayaran = '1'");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td>
                                    <td class="align-middle"><?php echo date('d-M-Y', strtotime($row['tgl_masuk'])); ?></td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_perubahan_daya'] ?>" class="open-modal btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_perubahan_daya'] ?>" class="open-modal2 btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>

                                    <?php
                                    if ($row['status_survey'] == "1") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal5 btn btn-warning rounded" data-toggle="modal" data-id="<?php echo $row['id_survey_lap'] ?>">
                                                Dalam Proses
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "2") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal3 btn btn-warning rounded" data-toggle="modal" data-id="<?php echo $row['id_perubahan_daya'] ?>" href="#">
                                                Survey Masih Dalam Proses
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "3") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal4 btn btn-success rounded" data-toggle="modal" data-id="<?php echo $row['id_laporan'] ?>" href="#">
                                                Selesai
                                            </a>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-danger rounded" href="header.php?page=surveytambah&idsurveypd=<?php echo $row['id_perubahan_daya'] ?>&fasa=<?php echo $row['fasa_lama'] ?>&idm=<?php echo $row['no_registrasi'] ?>">
                                                Pilih Petugas
                                            </a>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($row['status_survey'] == "0" || $row['status_survey'] == "1" || $row['status_survey'] == "2") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <button class="btn btn-secondary rounded" disabled>
                                                Survey Belum selesai
                                            </button>
                                        </td>
                                        <?php
                                    } elseif ($row['status_survey'] == "3") {
                                        if ($row['status_teknisi'] == "1") {
                                        ?>
                                            <td class="align-middle text-center">
                                                <a class="btn btn-warning rounded">
                                                    Dalam Proses
                                                </a>
                                            </td>
                                        <?php
                                        } elseif ($row['status_teknisi'] == "2") {
                                        ?>
                                            <td class="align-middle text-center">
                                                <a class="btn btn-success rounded">
                                                    Selesai
                                                </a>
                                            </td>
                                        <?php
                                        } else {
                                        ?>
                                            <td class="align-middle text-center">
                                                <a class="btn btn-danger rounded">
                                                    Pilih Petugas
                                                </a>
                                            </td>
                                    <?php
                                        }
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

<script>
    $(function() {
        $(document).on('click', '.open-modal', function(e) {
            e.preventDefault();
            $("#get-data").modal('show');
            $.post('pelayanan_penyambungan/pelayananpenyambungan/perubahan_daya/view.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi").html(html);
                });
        });
    })
</script>

<script>
    $(function() {
        $(document).on('click', '.open-modal2', function(e) {
            e.preventDefault();
            $("#get-data2").modal('show');
            $.post('pelayanan_penyambungan/pelayananpenyambungan/perubahan_daya/view_biaya.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi_biaya").html(html);
                });
        });
    })
</script>

<script>
    $(function() {
        $(document).on('click', '.open-modal3', function(e) {
            e.preventDefault();
            $("#get-data3").modal('show');
            $.post('pelayanan_penyambungan/pelayananpenyambungan/perubahan_daya/view_proses_survey.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi_proses").html(html);
                });
        });
    })
</script>

<script>
    $(function() {
        $(document).on('click', '.open-modal4', function(e) {
            e.preventDefault();
            $("#get-data4").modal('show');
            $.post('pelayanan_penyambungan/pelayananpenyambungan/perubahan_daya/view_survey_selesai.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi_selesai").html(html);
                });
        });
    })
</script>

<script>
    $(function() {
        $(document).on('click', '.open-modal5', function(e) {
            e.preventDefault();
            $("#get-data5").modal('show');
            $.post('pelayanan_penyambungan/pelayananpenyambungan/perubahan_daya/view_petugas.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi_petugas").html(html);
                });
        });
    })
</script>

</div>
<!-- End of Main Content -->

<?php
include_once 'footer.php';
?>

<!-- Script buat menghilangkan beberapa fitur sorting di datatables -->
<script>
    $('#dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [1, 3, 5, 6, 7, 8]
        }]
    });
</script>



</html>