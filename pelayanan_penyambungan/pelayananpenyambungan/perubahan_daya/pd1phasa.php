<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perubahan Daya 1 Phasa</title>
    <?php
    $pageSkr = 'pd1phasa';
    ?>
</head>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Perubahan Daya 1 Phasa</u></h1>
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
                    <h4 class="modal-title">Detail Biaya RAB Perubahan Daya 1 Fasa dan Perubahan Daya 1 Fasa ke 3 Fasa</h4>
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
                        $data = mysqli_query($mysqli, "SELECT a.* , b.*, c.* FROM tb_perubahan_daya b JOIN tb_mohon_pd a ON b.id_mohon = a.id_mohon JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan WHERE fasa_lama = '1 FASA' && a.status_pembayaran = '1'");
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
                                            <a class="btn btn-warning rounded">
                                                Dalam Proses
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "2") {
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
                                    ?>

                                    <?php
                                    if ($row['status_survey'] == "0" || $row['status_survey'] == "1") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <button class="btn btn-secondary rounded" disabled>
                                                Survey Belum selesai
                                            </button>
                                        </td>
                                        <?php
                                    } elseif ($row['status_survey'] == "2") {
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