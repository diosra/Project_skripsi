<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detail P2TL 1 Phasa</title>

    <?php
    $pageSkr = 'p2tl1phasa';
    include_once '../header.php';
    ?>
</head>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Detail Biaya Pelanggan P2TL 1 Phasa</u></h1>
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
                            <th colspan="11" class="text-center">Detail Biaya</th>
                            <th rowspan="2">Total Biaya</th>
                        </tr>
                        <tr>
                            <th class="text-center">Detail 1 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="kWh Meter Prabayar Fase Tunggal"></i></th>
                            <th class="text-center">Detail 2 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="NFA2X;2X10mm2;0,6/1kV;OH"></i></th>
                            <th class="text-center">Detail 3 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Segel Plastik"></i></th>
                            <th class="text-center">Detail 4 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="CCO 1T1 (10/16 sqmm - 10/16 sqmm)"></i></th>
                            <th class="text-center">Detail 5 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="CCO 3T1 (16/35 sqmm - 10/16 sqmm)"></i></th>
                            <th class="text-center">Detail 6 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Isolasi Scotch / Rubber Tape 1 KV ( Dimension : 19 mm x 20,1 m x 0.177 mm )"></i></th>
                            <th class="text-center">Detail 7 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Service Wedge Clamp 1 Phasa (Dua Sampit) ; Type SWC 616 ; 6. 10, 16 sqmm"></i></th>
                            <th class="text-center">Detail 8 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Pasang Kwh Meter Satu Phase + Wiring"></i></th>
                            <th class="text-center">Detail 9 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Penarikan SR 1 Phase"></i></th>
                            <th class="text-center">Detail 10 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Pengepresan CCO / Connector 10-25 mm²"></i></th>
                            <th class="text-center">Detail 11 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Survey"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "SELECT a.*, b.*, c.* FROM tb_p2tl a JOIN tb_detail_p2tl_1phs c ON a.id_p2tl = c.id_p2tl JOIN tb_pelanggan b ON a.id_pelanggan=b.id_pelanggan WHERE a.fasa_baru = '1 FASA'");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['pekerjaan_rab']; ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya1_p2tl1'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya2_p2tl1'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya3_p2tl1'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya4_p2tl1'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya5_p2tl1'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya6_p2tl1'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya7_p2tl1'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya8_p2tl1'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya9_p2tl1'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya10_p2tl1'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['uraianbiaya11_p2tl1'], 0, ',', '.') ?></td>
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
<a href="p2tl1phs.php" class="btn btn-danger" class="mb-2 ml-3"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
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
            "targets": [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
        }]
    });
</script>

</html>