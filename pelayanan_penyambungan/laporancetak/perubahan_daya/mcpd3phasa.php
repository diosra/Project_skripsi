<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Menu Cetak PD 3 Phasa</title>

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bold"><u>Menu Cetak Data Detail Pelanggan Perubahan Daya 3 Phasa</u></h1>

    <!-- Tabel Utama -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-2">Navigasi</h4>
            <button class="btn btn-secondary p-2 mr-1" data-toggle="modal" data-target="#modalku"><i class="fas fa-filter"></i></i> Filter</button>
            <a class="btn btn-warning p-2 mr-auto" href="mcpd3phasa.php"><i class="fas fa-redo-alt"></i></a>

            <!-- Kode PHP untuk mengirim link href sesuai Filter - Start -->
            <?php
            if (isset($_GET['filter']) && !empty($_GET['filter'])) :
                $filter = $_GET['filter'];
                if ($filter == 1) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="laporan/lpd3phasa.php?filter=1&bulan=<?= $_GET["bulan"] ?>&tahun=<?= $_GET["tahun"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 2) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="laporan/lpd3phasa.php?filter=2&tahun=<?= $_GET["tahun"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php endif ?>
            <?php else : ?>
                <div>
                    <a type="submit" href="laporan/lpd3phasa.php" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                </div>
            <?php endif ?>
            <!-- Kode PHP untuk mengirim link href sesuai Filter - End -->

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No.Registrasi</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Jenis Transaksi</th>
                            <th class="text-center">Tanggal Mohon</th>
                            <th class="text-center">Tarif Lama</th>
                            <th class="text-center">Daya Lama</th>
                            <th class="text-center">Tarif Baru</th>
                            <th class="text-center">Daya Baru</th>
                            <th class="text-center">Fasa Lama</th>
                            <th class="text-center">Fasa Baru</th>
                            <th class="text-center">Pekerjaan RAB</th>
                            <th class="text-center">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // Kode untuk isi Filter - Start
                        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
                            $filter = $_GET['filter'];
                            if ($filter == '1') {
                                echo '<a href="mcpd3phasa.php?filter=1&bulan=' . $_GET['bulan'] . '&tahun=' . $_GET['tahun'] . '"></a>';
                                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_perubahan_daya a JOIN tb_pelanggan b ON a.id_pelanggan = b.id_pelanggan JOIN tb_hasil_perhitungan_pd_3phs c ON a.id_perubahan_daya = c.id_perubahan_daya WHERE a.fasa_lama = '3 FASA' AND MONTH(tgl_mohon)='" . $_GET['bulan'] . "' AND YEAR(tgl_mohon)='" . $_GET['tahun'] . "'") or die($mysqli->error);
                            } else {
                                echo '<a href="mcpd3phasa.php.php?filter=2&tahun=' . $_GET['tahun'] . '"></a>';
                                $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_perubahan_daya a JOIN tb_pelanggan b ON a.id_pelanggan = b.id_pelanggan JOIN tb_hasil_perhitungan_pd_3phs c ON a.id_perubahan_daya = c.id_perubahan_daya WHERE a.fasa_lama = '3 FASA' AND YEAR(tgl_mohon)='" . $_GET['tahun'] . "'") or die($mysqli->error);
                            }
                        } else {
                            echo '<a href="mcpd3phasa.php"></a>';
                            $result = $mysqli->query("SELECT b.no_registrasi, b.nama,a.tgl_mohon, a.tarif_lama, a.daya_lama, a.tarif_baru, a.daya_baru, a.fasa_lama, a.fasa_baru, c.pekerjaan_rab, c.total_biaya FROM tb_perubahan_daya a JOIN tb_pelanggan b ON a.id_pelanggan = b.id_pelanggan JOIN tb_hasil_perhitungan_pd_3phs c ON a.id_perubahan_daya = c.id_perubahan_daya WHERE a.fasa_lama = '3 FASA'") or die($mysqli->error);
                        }
                        // kode untuk isi Filter - END

                        $no = 1;
                        $hitungrow = mysqli_num_rows($result);
                        if ($hitungrow > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle">Perubahan Daya</td>
                                    <td class="align-middle"><?php echo date("d-M-Y", strtotime($row['tgl_mohon'])); ?></td>
                                    <td class="align-middle"><?php echo $row['tarif_lama']; ?></td>
                                    <td class="align-middle"><?php echo $row['daya_lama']; ?></td>
                                    <td class="align-middle"><?php echo $row['tarif_baru']; ?></td>
                                    <td class="align-middle"><?php echo $row['daya_baru']; ?></td>
                                    <td class="align-middle"><?php echo $row['fasa_lama']; ?></td>
                                    <td class="align-middle"><?php echo $row['fasa_baru']; ?></td>
                                    <td class="align-middle"><?php echo $row['pekerjaan_rab']; ?></td>
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
<!-- End of Main Content -->

<?php
include_once 'footer.php';
?>

<!-- Script buat menghilangkan beberapa fitur sorting di datatables -->
<script>
    $('#dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [3, 7, 8, 9]
        }]
    });
</script>

<!-- Script untuk filter toggle filter berdasarkan pilihan -->
<script>
    $(document).ready(function() { // Ketika halaman selesai di load
        $('#form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function() { // Ketika user memilih filter
            if ($(this).val() == '1') { // Jika filter nya 2 (per bulan)
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            } else { // Jika filternya 3 (per tahun)
                $('#form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }
            $('#form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
</script>

</html>