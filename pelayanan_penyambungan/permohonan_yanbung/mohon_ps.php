<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Permohonan Penerangan Sementara</title>
</head>

</html>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Data Permohonan Pelanggan mengajukan Penerangan Sementara</u></h1>
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

    <!-- Tabel Utama -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Navigasi</h4>
            <a class="btn btn-primary p-2 mr-2" href="header.php?page=pelinput"><i class="fas fa-plus-circle"></i> Tambah</a>
        </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Registrasi</th>
                            <th class="text-center">Identitas (KTP)</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Tanggal Masuk</th>
                            <th class="text-center">Deskripsi Lengkap Data Pengajuan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "select a.*, b.idpel, b.identitas,b.nama,b.alamat from tb_mohon_multiguna a JOIN tb_pelanggan b ON a.id_pelanggan = b.idpel");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                    <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td>
                                    <td class="align-middle"><?php echo date('d-M-Y', strtotime($row['tgl_masuk'])); ?></td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_mohon'] ?>" class="open-modal btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="row">
                                            <!-- <div class="col">
                                                <a href="header.php?page=peledit&edit=<?php echo $row['id_pelanggan'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            </div> -->
                                            <div class="col mt-2">
                                                <a href="header.php?page=hapusmohonyanbung&hapusps=<?php echo $row['id_mohon'] ?>&noreg=<?php echo $row['no_registrasi'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data" id="remove"><i class="fas fa-user-minus"></i></a>
                                            </div>
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
            $.post('pelayanan_penyambungan/permohonan_yanbung/view_ps.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi").html(html);
                });
        });
    })
</script>

<?php
include_once 'footer.php';
?>

<!-- Script buat menghilangkan beberapa fitur sorting di datatables -->
<script>
    $('#dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [1, 3, 4, 6, 7]
        }]
    });
</script>