<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detail Multiguna 3 Phasa</title>

    <?php
    $pageSkr = 'multiguna3phasa';
    include_once '../header.php';
    ?>
</head>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Detail Biaya Pelanggan Multiguna 3 Phasa</u></h1>
    </div>

    <!-- Tabel Utama -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">No Registrasi</th>
                            <th rowspan="2">Nama Pelanggan</th>
                            <th rowspan="2">Pekerjaan RAB</th>
                            <th colspan="8" class="text-center">Detail Biaya</th>
                            <th rowspan="2">Total Biaya</th>
                        </tr>
                        <tr>
                            <th class="text-center">Detail 1 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="MCB"></i></th>
                            <th class="text-center">Detail 2 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Segel Plastik"></i></th>
                            <th class="text-center">Detail 3 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="NFA2X-T;3X35+1X35;0,6/1kV;OH"></i></th>
                            <th class="text-center">Detail 4 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Material Adjustable Dead End Assembly (25 - 35 sqmm) : Non Steinles Steel Strip +Yorke"></i></th>
                            <th class="text-center">Detail 5 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="CCO 3T3 (16/35 sqmm - 16/35 sqmm)"></i></th>
                            <th class="text-center">Detail 6 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Isolasi Scotch / Rubber Tape 1 KV ( Dimension : 19 mm x 20,1 m x 0.177 mm )"></i></th>
                            <th class="text-center">Detail 7 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Penarikan SR 3 Phase"></i></th>
                            <th class="text-center">Detail 8 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Pasang Kotak APP Langsung + Pipa Perlengkapan"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "SELECT a.*, b.*, c.* FROM tb_multiguna a JOIN tb_detail_multiguna_3phs c ON a.id_mlta = c.id_mlta JOIN tb_pelanggan b ON a.id_pelanggan=b.id_pelanggan WHERE a.fasa_baru = '3 FASA'");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['pekerjaan_rab']; ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya1_mlta3'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya2_mlta3'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya3_mlta3'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya4_mlta3'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya5_mlta3'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya6_mlta3'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya7_mlta3'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya8_mlta3'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['total'], 0, ',', '.') ?></td>
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
<a href="multiguna3phs.php" class="btn btn-danger" class="mb-2 ml-3"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
<!-- End of Main Content -->

<?php
include_once '../footer.php';
?>

<!-- Script untuk Menampilkan Popover -->
<script>
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
</script>

<!-- Script buat menghilangkan beberapa fitur sorting di datatables -->
<script>
    $('#dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
        }]
    });
</script>

</html>