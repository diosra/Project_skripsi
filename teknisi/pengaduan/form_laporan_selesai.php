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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Data Laporan Pengaduan Selesai</u></h1>
    </div>

    <!-- Modal dialog untuk deskripsi -->
    <div id="get-data" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data & Deskripsi Pengaduan</h4>
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
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Laporan Progres Teknisi</h4>
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Laporan</th>
                            <th class="text-center">Identitas</th>
                            <th class="text-center">Nama Pelapor</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Data dan Deskripsi Pengaduan Pelapor</th>
                            <th class="text-center">Laporan Teknisi</th>
                            <th class="text-center">Progres</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nama = $_SESSION['nama'];
                        $data = mysqli_query($mysqli, "SELECT a.* , b.* , c.id_teknisi, d.* FROM tb_tekpen_lap_masuk a JOIN tb_pengaduan b ON a.id_pengaduan = b.id_pengaduan JOIN tb_teknisi_pengaduan c ON a.id_teknisi = c.id_teknisi JOIN tb_laporan_tekpen d ON a.id_tekpenlap = d.id_tekpenlap  WHERE a.op_acc = 1 && c.nama = '$nama' && b.status = 'selesai'");
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
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_pengaduan'] ?>" class="open-modal btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_laporan'] ?>" class="open-modal2 btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>

                                    <?php
                                    if ($row['status'] == "selesai") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <p class="font-weight-bold btn btn-success rounded">
                                                Selesai
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

<!-- Script Modal Deskripsi -->
<script>
    $(function() {
        $(document).on('click', '.open-modal', function(e) {
            e.preventDefault();
            $("#get-data").modal('show');
            $.post('teknisi/pengaduan/view.php', {
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
            $.post('teknisi/pengaduan/view_laporan_selesai.php', {
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

<!-- Script buat menghilangkan beberapa fitur sorting di datatables -->
<script>
    $('#dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [4, 5, 6, 7]
        }]
    });
</script>