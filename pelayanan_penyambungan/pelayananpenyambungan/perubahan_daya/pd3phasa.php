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
    $pageSkr = 'pd3phasa';
    ?>
</head>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Perubahan Daya 3 Phasa</u></h1>
    </div>

    <!-- Tabel Utama -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Navigasi</h4>
            <a class="btn btn-primary p-2 mr-2" href="header.php?page=inputpd"><i class="fas fa-plus-circle"></i> Tambah</a>
            <a class="btn btn-success p-2" href="header.php?page=detailpd3"><i class="fas fa-file-alt"></i> Detail Biaya</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">No Registrasi</th>
                            <th rowspan="2">Jenis Transaksi</th>
                            <th rowspan="2">Tanggal Mohon</th>
                            <th colspan="2">Tarif & Daya Lama</th>
                            <th colspan="2">Tarif & Daya Baru</th>
                            <th rowspan="2">Fasa Lama</th>
                            <th rowspan="2">Fasa Baru</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>Tarif</th>
                            <th>Daya</th>
                            <th>Tarif</th>
                            <th>Daya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "SELECT a.no_registrasi , b.* FROM tb_perubahan_daya b JOIN tb_pelanggan a ON b.id_pelanggan = a.id_pelanggan WHERE fasa_lama = '3 FASA'");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                    <td class="align-middle"><?php echo $row['jenis_transaksi']; ?></td>
                                    <td class="align-middle"><?php echo date("d-M-Y", strtotime($row['tgl_mohon'])); ?></td>
                                    <td class="align-middle"><?php echo $row['tarif_lama']; ?></td>
                                    <td class="align-middle"><?php echo $row['daya_lama']; ?></td>
                                    <td class="align-middle"><?php echo $row['tarif_baru']; ?></td>
                                    <td class="align-middle"><?php echo $row['daya_baru']; ?></td>
                                    <td class="align-middle"><?php echo $row['fasa_lama']; ?></td>
                                    <td class="align-middle"><?php echo $row['fasa_baru']; ?></td>
                                    <td class="row text-center">
                                        <div class="col">
                                            <a href="header.php?page=editpd&edit=<?php echo $row['id_perubahan_daya'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col">
                                            <a href="header.php?page=hapuspd&hapus=<?php echo $row['id_perubahan_daya'] ?>&fasa_lama=<?php echo $row['fasa_lama'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data" id="remove"><i class="fas fa-user-minus"></i></a>
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
            "targets": [2, 4, 5, 6, 7, 8, 10]
        }]
    });
</script>


</html>