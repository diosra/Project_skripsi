<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teknisi Pelayanan Pengaduan</title>
</head>

</html>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Data Laporan</u></h1>
    </div>

    <!-- Modal dialog untuk deskripsi -->
    <div id="get-data" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deskripsi Laporan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
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
            <a class="btn btn-primary p-2 mr-2" href="../../CRUD/teknisi_yanbung/tekyan_input.php"><i class="fas fa-plus-circle"></i> Tambah Laporan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Laporan</th>
                            <th class="text-center">Identitas</th>
                            <th class="text-center">Nama Pelanggan</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">No Handphone</th>
                            <th class="text-center">Laporan</th>
                            <th class="text-center">Progress</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nama = $_SESSION['nama'];
                        $data = mysqli_query($mysqli, "SELECT a.* , b.* , c.id, c.t_check FROM tb_tekpen_lap_masuk a JOIN tb_pengaduan b ON a.id_pengaduan = b.id_pengaduan JOIN tb_data_user c ON c.id = a.id WHERE a.op_acc = 1 && c.t_check = 2 && c.nama = '$nama'");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_laporan']; ?></td>
                                    <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td>
                                    <td class="align-middle"><?php echo $row['nohp']; ?></td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_pengaduan'] ?>" class="open-modal btn" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="btn-danger rounded">
                                            <?php echo $row['status']; ?>
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <div class="col">
                                            <a href="tekyan_lihat.php?edit=<?php echo $row['id_laporan'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col mt-2">
                                            <a href="tekyan_lihat.php?hapus=<?php echo $row['id_laporan'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data" id="remove"><i class="fas fa-user-minus"></i></a>
                                        </div>
                                    </td>
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
            $.post('teknisi/pengaduan/view.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $(".modal-body").html(html);
                });
        });
    })
</script>

<?php
include_once 'footer.php';
?>