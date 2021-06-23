<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detail Perubahan Daya 3 Phasa</title>

</head>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading 1 -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Detail Biaya Pelanggan Perubahan Daya 3 Phasa</u></h1>
    </div>

    <!-- Tabel Utama 1 -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Registrasi</th>
                            <th>Identitas (KTP)</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Pekerjaan RAB</th>
                            <th class="text-center">Detail 1 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Penggantian MCB / MCCB 3 Phasa"></i></th>
                            <th>Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "SELECT a.*, b.*, c.* FROM tb_perubahan_daya a JOIN tb_hasil_perhitungan_pd_3phs c ON a.id_perubahan_daya = c.id_perubahan_daya JOIN tb_pelanggan b ON a.id_pelanggan=b.id_pelanggan WHERE a.fasa_lama = '3 FASA'");
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
                                    <td class="align-middle"><?php echo $row['pekerjaan_rab']; ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['penggantian_mccb_3phs'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['total_biaya'], 0, ',', '.') ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr style="border-top: 1px solid #8c8b8b; border-bottom: 1px solid #fff;">

    <!-- Page Heading 2 -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Detail Biaya Pelanggan Perubahan Daya 3 Phasa ke 1 Phasa</u></h1>
    </div>

    <!-- Tabel Utama 2 -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered text-gray-900" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">No Registrasi</th>
                            <th rowspan="2">Identitas (KTP)</th>
                            <th rowspan="2">Nama Pelanggan</th>
                            <th rowspan="2">Alamat</th>
                            <th rowspan="2">Pekerjaan RAB</th>
                            <th colspan="12" class="text-center">Detail Biaya</th>
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
                            <th class="text-center">Detail 12 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Bongkar Kwh Meter Tiga Phase Tanpa Wiring"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($mysqli, "SELECT a.*, b.*, c.* FROM tb_perubahan_daya a JOIN tb_hasil_perhitungan_pd_3phs_ke_1phs c ON a.id_perubahan_daya = c.id_perubahan_daya JOIN tb_pelanggan b ON a.id_pelanggan=b.id_pelanggan WHERE a.fasa_lama = '3 FASA'");
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
                                    <td class="align-middle"><?php echo $row['pekerjaan_rab']; ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['kwh_meter_tunggal'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['nfa2x_2x10'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['segel_plastik'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['cco_1t1'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['cco_3t1'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['isolasi_scotch'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['service_wedge'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['pasang_kwh'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['penarikan_sr'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['pengepresan'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['survey'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['bongkar_kwh_meter'], 0, ',', '.') ?></td>
                                    <td class="align-middle">Rp. <?php echo number_format($row['total_biaya'], 0, ',', '.') ?></td>
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
<a href="header.php?page=pd3phasa" class="btn btn-danger" class="mb-2 ml-3"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
<!-- End of Main Content -->

<?php
include_once 'footer.php';
?>

<!-- Script untuk Menampilkan 2 Tabel di 1 halaman -->
<script>
    $(document).ready(function() {
        $('table.display').DataTable();
    });
</script>

<!-- Script untuk Menampilkan Popover -->
<script>
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
</script>

<!-- Script buat menghilangkan beberapa fitur sorting di datatables - Tabel 1 -->
<script>
    $('#dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [5, 6, 7]
        }]
    });
</script>

<!-- Script buat menghilangkan beberapa fitur sorting di datatables - Tabel 2 -->
<script>
    $('#dataTable2').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
        }]
    });
</script>


</html>