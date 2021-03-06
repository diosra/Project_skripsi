<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pasang Baru 1 Fasa</title>
</head>

</html>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Pasang Baru 1 Fasa</u></h1>
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
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Biaya RAB</h4>
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

    <!-- Modal dialog untuk Dalam Proses (belum ada progres dari petugas)Survey-->
    <div id="get-data5" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Teknisi Pelayanan Penyambungan</h4>
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

    <!-- Modal dialog untuk Dalam Proses Pengerjaan Survey-->
    <div id="get-data3" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Laporan Progres Sementara Teknisi</h4>
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
                    <h4 class="modal-title">Laporan Hasil Teknisi</h4>
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

    <!-- Tabel Utama -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Navigasi</h4>
            <a class="btn btn-primary p-2 mr-2" href="header.php?page=inputpb"><i class="fas fa-plus-circle"></i> Tambah</a>
            <a class="btn btn-success p-2" href="header.php?page=detailpb1"><i class="fas fa-file-alt"></i> Detail Biaya</a>
        </div> -->

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
                            <th class="text-center">Detail Pekerjaan RAB</th>
                            <th class="text-center">Status Petugas Teknisi</th>
                            <!-- <th class="text-center">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "SELECT a.*, b.*, c.*,d.*, e.no_teknisi FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon LEFT JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_pasang_baru LEFT JOIN tb_tekyan_lap_masuk d ON d.id_yanbung = a.id_pasang_baru LEFT JOIN tb_teknisi_penyambungan e ON e.no_teknisi = d.id_teknisi WHERE a.fasa_baru = '1 FASA' && b.status_pembayaran = '1' && b.status_survey = '3' ORDER BY b.id_mohon ASC");
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
                                        <a data-toggle="modal" data-id="<?php echo $row['id_pasang_baru'] ?>" class="open-modal btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_pasang_baru'] ?>" class="open-modal2 btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>

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
                                                <a class="open-modal5 btn btn-warning rounded" data-toggle="modal" data-id="<?php echo $row['id_tekyanlap'] ?>" href="#">
                                                    Dalam Proses
                                                </a>
                                            </td>
                                        <?php
                                        } elseif ($row['status_teknisi'] == "2") {
                                        ?>
                                            <td class="align-middle text-center">
                                                <a class="open-modal3 btn btn-info rounded" data-toggle="modal" data-id="<?php echo $row['id_pasang_baru'] ?>" href="#">
                                                    Belum Selesai
                                                </a>
                                            </td>
                                        <?php
                                        } elseif ($row['status_teknisi'] == "3") {
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
                                                <a class="btn btn-primary rounded" href="header.php?page=teknisitambah&idteknisipb=<?php echo $row['id_pasang_baru'] ?>&fasa=<?php echo $row['fasa_baru'] ?>">
                                                    Pilih Petugas
                                                </a>
                                            </td>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <!-- <td class="align-middle text-center">
                                        <div class="col">
                                            <a href="header.php?page=editpb&edit=<?php echo $row['id_pasang_baru'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col mt-2">
                                            <a href="header.php?page=hapuspb&hapus=<?php echo $row['id_pasang_baru'] ?>&fasa_baru=<?php echo $row['fasa_baru'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data" id="remove"><i class="fas fa-user-minus"></i></a>
                                        </div>
                                    </td> -->
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
            $.post('pelayanan_penyambungan/pelayananpenyambungan/pasang_baru/view.php', {
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
            $.post('pelayanan_penyambungan/pelayananpenyambungan/pasang_baru/view_biaya.php', {
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
            $.post('pelayanan_penyambungan/pelayananpenyambungan/pasang_baru/view_proses_survey.php', {
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
            $.post('pelayanan_penyambungan/pelayananpenyambungan/pasang_baru/view_survey_selesai.php', {
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
            $.post('pelayanan_penyambungan/pelayananpenyambungan/pasang_baru/view_petugas.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi_petugas").html(html);
                });
        });
    })
</script>

<?php
include_once 'footer.php';
?>

</div>
<!-- End of Main Content -->


<!-- Script buat menghilangkan beberapa fitur sorting di datatables -->
<script>
    $('#dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [1, 3, 5, 6, 7]
        }]
    });
</script>