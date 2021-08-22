<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Biaya</title>
</head>

</html>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Biaya Penyambungan</u></h1>
    </div>

    <!-- Tabel Biaya Penyambungan -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Navigasi</h4>
            <a class="btn btn-primary p-2 mr-2" href="header.php?page=inputhargamanajer"><i class="fas fa-plus-circle"></i> Tambah</a>
        </div> -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Deskripsi / Jenis Biaya</th>
                            <th class="text-center">Nilai / Harga</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "SELECT * FROM tb_harga_penyambungan");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no++ ?></td>
                                    <td class="align-middle text-center"><?php echo $row['kode'] ?></td>
                                    <td class="align-middle"><?php echo $row['jenis'] ?></td>
                                    <?php
                                    if ($row['kode'] == "PPN" || $row['kode'] == "PPJ") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['harga'] ?>%</td>
                                    <?php
                                    } elseif ($row['kode'] == "UJL" || $row['id_harga_penyambungan'] == "5" || $row['id_harga_penyambungan'] == "6" || $row['id_harga_penyambungan'] == "7") {
                                    ?>
                                        <td class="align-middle">Rp. <?php echo number_format($row['harga'], 0, ',', '.') ?> / VA</td>
                                    <?php
                                    } else {
                                    ?>
                                        <td class="align-middle">Rp. <?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                                    <?php
                                    }
                                    ?>
                                    <td class="align-middle text-center">
                                        <div class="col">
                                            <a href="header.php?page=edithargamanajer&edit=<?php echo $row['id_harga_penyambungan'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col mt-2">
                                            <a href="header.php?page=hapushargamanajer&hapus=<?php echo $row['id_harga_penyambungan'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data" id="remove"><i class="fas fa-minus-square"></i></a>
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

    <hr>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Biaya RAB</u></h1>
    </div>

    <!-- Tabel RAB -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Navigasi</h4>
            <a class="btn btn-primary p-2 mr-2" href="header.php?page=inputharga"><i class="fas fa-plus-circle"></i> Tambah</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered text-gray-900" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Uraian</th>
                            <!-- <th class="text-center">Tipe</th> -->
                            <th class="text-center">Satuan</th>
                            <th class="text-center">Harga Satuan</th>
                            <!-- <th class="text-center">Status Petugas Survey</th>
                            <th class="text-center">Status Petugas Teknisi</th> -->
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "SELECT * FROM tb_harga ORDER BY id_harga ASC");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['KODE']; ?></td>
                                    <td class="align-middle"><?php echo $row['URAIAN']; ?></td>
                                    <!-- <td class="align-middle"><?php echo $row['TIPE']; ?></td> -->
                                    <td class="align-middle"><?php echo $row['SATUAN']; ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['HARGA_SATUAN'], 0, ',', '.') ?></td>
                                    <td class="align-middle text-center">
                                        <div class="col">
                                            <a href="header.php?page=editharga&edit=<?php echo $row['id_harga'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col mt-2">
                                            <a href="header.php?page=hapusharga&hapus=<?php echo $row['id_harga'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data" id="remove"><i class="fas fa-minus-square"></i></a>
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

<?php
include_once 'footer.php';
?>

</div>
<!-- End of Main Content -->

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
            "targets": [1, 2, 3, 4]
        }]
    });
</script>
<!-- Script buat menghilangkan beberapa fitur sorting di datatables -->
<script>
    $('#dataTable2').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [1, 2, 3, 4, 5]
        }]
    });
</script>