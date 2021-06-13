<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pasang Baru 1 Phasa</title>

    <?php
    $pageSkr = 'pb1phasa';
    include_once '../header.php';
    ?>
</head>

</html>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Pasang Baru 1 Phasa</u></h1>
    </div>

    <!-- Tabel Utama -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Navigasi</h4>
            <a class="btn btn-primary p-2 mr-2" href="../../CRUD/pasang_baru/pb_input.php"><i class="fas fa-plus-circle"></i> Tambah</a>
            <a class="btn btn-success p-2" href="detailpb1phasa.php"><i class="fas fa-file-alt"></i> Detail Biaya</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Registrasi</th>
                            <th class="text-center">Jenis Transaksi</th>
                            <th class="text-center">Tanggal Mohon</th>
                            <th class="text-center">Tarif Baru</th>
                            <th class="text-center">Daya Baru</th>
                            <th class="text-center">Fasa Baru</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "SELECT a.no_registrasi ,b.id_pasang_baru, b.id_pelanggan, b.jenis_transaksi, b.tgl_mohon, b.tarif_baru, b.daya_baru, b.fasa_baru FROM tb_pasang_baru b JOIN tb_pelanggan a ON b.id_pelanggan = a.id_pelanggan WHERE fasa_baru = '1 FASA'");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['no_registrasi']; ?></td>
                                    <td><?php echo $row['jenis_transaksi']; ?></td>
                                    <td><?php echo date("d-M-Y", strtotime($row['tgl_mohon'])); ?></td>
                                    <td><?php echo $row['tarif_baru']; ?></td>
                                    <td><?php echo $row['daya_baru']; ?></td>
                                    <td><?php echo $row['fasa_baru']; ?></td>
                                    <td class="row text-center">
                                        <div class="col">
                                            <a href="../../CRUD/pasang_baru/pb_edit.php?edit=<?php echo $row['id_pasang_baru'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col">
                                            <a href="../../CRUD/pasang_baru/pb_hapus.php?hapus=<?php echo $row['id_pasang_baru'] ?>&fasa_baru=<?php echo $row['fasa_baru'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data" id="remove"><i class="fas fa-user-minus"></i></a>
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
include_once '../footer.php';
?>

<!-- Script buat menghilangkan beberapa fitur sorting di datatables -->
<script>
    $('#dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [2, 6, 7]
        }]
    });
</script>