<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage User</title>
</head>

</html>
<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Tabel Manajemen User</u></h1>
    </div>

    <!-- Tabel Utama -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Navigasi</h4>
            <a class="btn btn-primary p-2 mr-2" href="header.php?page=inputuser"><i class="fas fa-plus-circle"></i> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Status User</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "SELECT * FROM tb_data_user");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) {
                                if ($row['level'] == 1 && $row['t_check'] == 0) {
                                    $posisi = "Admin";
                                } elseif ($row['level'] == 2 && $row['t_check'] == 0) {
                                    $posisi = "Pegawai";
                                } elseif ($row['level'] == 3 && $row['t_check'] == 0) {
                                    $posisi = "Operator";
                                } elseif ($row['level'] == 4 && $row['t_check'] == 1) {
                                    $posisi = "Teknisi Pelayanan Penyambungan";
                                } elseif ($row['level'] == 4 && $row['t_check'] == 2) {
                                    $posisi = "Teknisi Pelayanan Pengaduan";
                                } elseif ($row['level'] == 5 && $row['t_check'] == 0) {
                                    $posisi = "Petugas Survey";
                                }
                        ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['alamat']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $posisi ?></td>
                                    <td class="row text-center">
                                        <div class="col">
                                            <a href="header.php?page=edituser&edit=<?php echo $row['id'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col">
                                            <a href="header.php?page=hapususer&hapus=<?php echo $row['id'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data" id="remove"><i class="fas fa-user-minus"></i></a>
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

<!-- Script buat menghilangkan beberapa fitur sorting di datatables -->
<script>
    $('#dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [6]
        }]
    });
</script>