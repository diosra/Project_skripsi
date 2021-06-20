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
                            <th class="text-center">No Registrasi Pelanggan</th>
                            <th class="text-center">Nama Pelanggan</th>
                            <th class="text-center">Laporan</th>
                            <th class="text-center">Progress</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "SELECT a.* , b.* FROM tb_laporan_teknisi_yanbung a JOIN tb_pelanggan b ON a.id_pelanggan = b.id_pelanggan");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="text-center">
                                        <a href="tekyan_lihat.php?lihat=<?php echo $row['id_laporan'] ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Lihat Laporan"><i class="fas fa-sticky-note"></i></a>
                                    </td>
                                    <td class="align-middle"><?php echo $row['status']; ?></td>
                                    <td class="row text-center">
                                        <div class="col">
                                            <a href="tekyan_lihat.php?edit=<?php echo $row['id_laporan'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col">
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

<?php
include_once 'footer.php';
?>