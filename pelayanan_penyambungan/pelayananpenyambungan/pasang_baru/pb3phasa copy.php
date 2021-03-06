<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pasang Baru 3 Phasa</title>
</head>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Pasang Baru 3 Phasa</u></h1>
    </div>

    <!-- Tabel Utama -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Navigasi</h4>
            <a class="btn btn-primary p-2 mr-2" href="header.php?page=inputpb"><i class="fas fa-plus-circle"></i> Tambah</a>
            <a class="btn btn-success p-2" href="header.php?page=detailpb3"><i class="fas fa-file-alt"></i> Detail Biaya</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Registrasi</th>
                            <th class="text-center">Identitas (KTP)</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Email Pelanggan</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Jenis Transaksi</th>
                            <th class="text-center">Tanggal Permohonan</th>
                            <th class="text-center">Tarif Baru</th>
                            <th class="text-center">Daya Baru (VA)</th>
                            <th class="text-center">Fasa Baru</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "SELECT a.*, b.* FROM tb_pasang_baru b JOIN tb_pelanggan a ON b.id_pelanggan = a.id_pelanggan WHERE fasa_baru = '3 FASA'");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                    <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['email']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td>
                                    <td class="align-middle"><?php echo $row['jenis_transaksi']; ?></td>
                                    <td class="align-middle"><?php echo date("d-M-Y", strtotime($row['tgl_mohon'])); ?></td>
                                    <td class="align-middle"><?php echo $row['tarif_baru']; ?></td>
                                    <td class="align-middle"><?php echo $row['daya_baru']; ?></td>
                                    <td class="align-middle"><?php echo $row['fasa_baru']; ?></td>
                                    <td class="text-center">
                                        <div class="col">
                                            <a href="header.php?page=editpb&edit=<?php echo $row['id_pasang_baru'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col mt-2">
                                            <a href="header.php?page=hapuspb&hapus=<?php echo $row['id_pasang_baru'] ?>&fasa_baru=<?php echo $row['fasa_baru'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data" id="remove"><i class="fas fa-user-minus"></i></a>
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

<!-- Script buat menghilangkan beberapa fitur sorting di datatables -->
<script>
    $('#dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [5, 6, 9, 10]
        }]
    });
</script>

</body>

</html>