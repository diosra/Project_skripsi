<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan Pengaduan</title>
</head>

</html>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Data Laporan Pengaduan Selesai</u></h1>
    </div>

    <!-- Modal dialog untuk deskripsi -->
    <div id="get-data" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deskripsi Laporan Pengaduan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup Laporan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk laporan -->
    <div id="get-data2" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deskripsi Laporan Teknisi</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="laporan">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup Laporan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Utama -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Navigasi</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Laporan Pengaduan</th>
                            <th class="text-center">Gangguan</th>
                            <th class="text-center">Identitas (No. KTP)</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">No HP</th>
                            <th class="text-center">Email Pelapor</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Kabupaten</th>
                            <th class="text-center">Kecamatan</th>
                            <th class="text-center">Kelurahan</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Tanggal Masuk</th>
                            <th class="text-center">Teknisi</th>
                            <th class="text-center">Laporan Teknisi</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "select * from tb_pengaduan WHERE status='selesai'");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_laporan']; ?></td>
                                    <td class="align-middle"><?php echo $row['gangguan']; ?></td>
                                    <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['nohp']; ?></td>
                                    <td class="align-middle"><?php echo $row['email']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td>
                                    <td class="align-middle"><?php echo $row['kabupaten']; ?></td>
                                    <td class="align-middle"><?php echo $row['kecamatan']; ?></td>
                                    <td class="align-middle"><?php echo $row['kelurahan']; ?></td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_pengaduan'] ?>" class="open-modal btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>
                                    <td class="align-middle"><?php echo date("d-M-Y", strtotime($row['tgl_masuk_laporan'])); ?></td>
                                    <td class="align-middle"><?php echo $row['teknisi']; ?></td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_pengaduan'] ?>" class="open-modal2 btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>
                                    <?php
                                    if ($row['status'] == "selesai") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <p class="btn btn-success rounded">
                                                <?php echo $row['status']; ?>
                                            </p>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td class="align-middle text-center">
                                            <p class="btn btn-danger rounded">
                                                <?php echo $row['status']; ?>
                                            </p>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- <td class="text-center">
                                        <div class="row">
                                            <div class="col">
                                                <a href="header.php?page=pengtambah&id=<?php echo $row['id_pengaduan'] ?>" class="btn btn-primary btn-block">Detail</a>
                                            </div>
                                            <div class="col mt-2">
                                                <a href="header.php?page=pengedit&edit=<?php echo $row['id_pengaduan'] ?>" class="btn btn-warning btn-block" data-toggle="tooltip" data-placement="top" title="Edit Data">Edit</a>
                                            </div>
                                            <div class="col mt-2">
                                                <a href="header.php?page=penghapus&hapus=<?php echo $row['id_pengaduan'] ?>" class="btn btn-danger btn-block" id="remove">Hapus</a>
                                            </div>
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

</div>
<!-- End of Main Content -->

<script>
    $(function() {
        $(document).on('click', '.open-modal', function(e) {
            e.preventDefault();
            $("#get-data").modal('show');
            $.post('pelayanan_pengaduan/view.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi").html(html);
                });
        });
    })
</script>

<!-- Script Modal Laporan -->
<script>
    $(function() {
        $(document).on('click', '.open-modal2', function(e) {
            e.preventDefault();
            $("#get-data2").modal('show');
            $.post('teknisi/pengaduan/view_laporan.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#laporan").html(html);
                });
        });
    })
</script>

<?php
include_once 'footer.php';
?>