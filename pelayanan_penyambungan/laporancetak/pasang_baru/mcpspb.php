<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Menu Cetak Hasil Survey Pasang Baru</title>

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bold"><u>Menu Cetak Laporan Hasil Survey</u></h1>

    <!-- Modal dialog untuk deskripsi -->
    <div id="get-data" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deskripsi Laporan</h4>
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
        <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-2">Navigasi</h4>
            <button class="btn btn-secondary p-2 mr-1" data-toggle="modal" data-target="#modalku"><i class="fas fa-filter"></i></i> Filter</button>
            <a class="btn btn-warning p-2 mr-auto" href="header.php?page=clpetugassurveypb"><i class="fas fa-redo-alt"></i></a>

            <!-- Modal untuk Filter di Halaman Cetak -->
            <div class="modal fade" id="modalku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="GET" action="">

                                <input type="hidden" name="page" value="clpetugassurveypb">

                                <label>Filter Berdasarkan</label><br>
                                <select name="filter" id="filter" class="form-control">
                                    <option value="" disabled selected>
                                        <-- Pilih -->
                                    </option>
                                    <option value="4">Per Tanggal Selesai Survey</option>
                                    <option value="1">Per Bulan Selesai Survey</option>
                                    <option value="2">Per Tahun Selesai Survey</option>
                                    <option value="5">Per Jenis Survey</option>
                                </select> <br>

                                <div id="form-tanggal">
                                    <label>Dari Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" placeholder="Input Tanggal" />
                                    <label>Sampai Tanggal</label>
                                    <input type="date" name="tanggal2" class="form-control" placeholder="Input Tanggal" />
                                </div>

                                <div id="form-bulan">
                                    <label>Bulan</label><br>
                                    <select name="bulan" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>

                                <div id="form-tahun">
                                    <label>Tahun</label><br>
                                    <select name="tahun" class="form-control">
                                        <option value="">Pilih</option>
                                        <?php
                                        $query = "SELECT YEAR(tgl_selesai) AS tahun FROM tb_laporan_survey WHERE status = '3' GROUP BY YEAR(tgl_selesai)"; // Tampilkan tahun sesuai di tabel transaksi
                                        $sql = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
                                        while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                            echo '<option value="' . $data['tahun'] . '">' . $data['tahun'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div id="form-jenis">
                                    <label>Jenis Survey</label><br>
                                    <select name="jenis_survey" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="SURVEY PASANG BARU">Pasang Baru</option>
                                        <option value="SURVEY PERUBAHAN DAYA">Perubahan Daya</option>
                                        <option value="SURVEY PENYAMBUNGAN SEMENTARA">Penyambungan Sementara</option>
                                    </select>
                                </div>

                                <br>
                                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-search"></i> Tampilkan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kode PHP untuk tombol cetak mengirim link href sesuai Filter - Start -->
            <?php
            if (isset($_GET['filter']) && !empty($_GET['filter'])) :
                $filter = $_GET['filter'];
                if ($filter == 1) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpspb.php?filter=1&bulan=<?= $_GET["bulan"] ?>&tahun=<?= $_GET["tahun"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 2) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpspb.php?filter=2&tahun=<?= $_GET["tahun"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 3) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpspb.php?filter=3&produk=<?= $_GET["produk"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 4) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpspb.php?filter=4&tanggal=<?= $_GET["tanggal"] ?>&sampaitanggal=<?= $_GET["tanggal2"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 5) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpspb.php?filter=5&jenis=<?= $_GET["jenis_survey"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php endif ?>
            <?php else : ?>
                <div>
                    <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpspb.php" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                </div>
            <?php endif ?>
            <!-- Kode PHP untuk mengirim link href sesuai Filter - End -->

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center">No</th>
                            <th rowspan="2" class="text-center">No Registrasi</th>
                            <!-- <th rowspan="2" class="text-center">Identitas</th>
                            <th rowspan="2" class="text-center">Nama Pelanggan</th>
                            <th rowspan="2" class="text-center">Alamat</th> -->
                            <th rowspan="2" class="text-center">Jenis Survey</th>
                            <th rowspan="2" class="text-center">ID Petugas</th>
                            <th rowspan="2" class="text-center">Petugas Survey</th>
                            <th colspan="2" class="text-center">Tanggal Survey</th>
                            <th rowspan="2" class="text-center">Deskripsi Laporan</th>
                        </tr>
                        <tr>
                            <th>Mulai</th>
                            <th>Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // Kode untuk isi Filter - Start
                        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
                            $filter = $_GET['filter'];
                            if ($filter == '1') {
                                echo '<a href="header.php?page=cpb1phasa&filter=1&bulan=' . $_GET['bulan'] . '&tahun=' . $_GET['tahun'] . '"></a>';
                                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                                $result = $mysqli->query("SELECT a.*,b.id_survey_lap,b.id_laporan,b.laporan,b.tgl_mulai,b.tgl_selesai,b.status,c.no_petugas_survey, c.nama AS nama_petugas, d.id_mohon,d.no_registrasi AS noreg_pb, e.id_mohon,e.no_registrasi AS noreg_pd, f.id_mohon,f.no_registrasi AS noreg_ps FROM tb_survey_lap_masuk a JOIN tb_laporan_survey b ON a.id_survey_lap = b.id_survey_lap JOIN tb_petugas_survey c ON c.no_petugas_survey = a.id_petugas LEFT JOIN tb_mohon_pb d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_mohon_pd e ON a.id_mohon_survey = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon WHERE a.pegawai_acc = '1' AND b.status = '3' AND MONTH(tgl_selesai)='" . $_GET['bulan'] . "' AND YEAR(tgl_selesai)='" . $_GET['tahun'] . "' ORDER BY b.tgl_selesai ASC") or die($mysqli->error);
                            } elseif ($filter == '2') {
                                echo '<a href="header.php?page=cpb1phasa&filter=2&tahun=' . $_GET['tahun'] . '"></a>';

                                $result = $mysqli->query("SELECT a.*,b.id_survey_lap,b.id_laporan,b.laporan,b.tgl_mulai,b.tgl_selesai,b.status,c.no_petugas_survey, c.nama AS nama_petugas, d.id_mohon,d.no_registrasi AS noreg_pb, e.id_mohon,e.no_registrasi AS noreg_pd, f.id_mohon,f.no_registrasi AS noreg_ps FROM tb_survey_lap_masuk a JOIN tb_laporan_survey b ON a.id_survey_lap = b.id_survey_lap JOIN tb_petugas_survey c ON c.no_petugas_survey = a.id_petugas LEFT JOIN tb_mohon_pb d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_mohon_pd e ON a.id_mohon_survey = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon WHERE a.pegawai_acc = '1' AND b.status = '3' AND YEAR(tgl_selesai)='" . $_GET['tahun'] . "' ORDER BY b.tgl_selesai ASC") or die($mysqli->error);
                            } elseif ($filter == '4') {
                                $result = $mysqli->query("SELECT a.*,b.id_survey_lap,b.id_laporan,b.laporan,b.tgl_mulai,b.tgl_selesai,b.status,c.no_petugas_survey, c.nama AS nama_petugas, d.id_mohon,d.no_registrasi AS noreg_pb, e.id_mohon,e.no_registrasi AS noreg_pd, f.id_mohon,f.no_registrasi AS noreg_ps FROM tb_survey_lap_masuk a JOIN tb_laporan_survey b ON a.id_survey_lap = b.id_survey_lap JOIN tb_petugas_survey c ON c.no_petugas_survey = a.id_petugas LEFT JOIN tb_mohon_pb d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_mohon_pd e ON a.id_mohon_survey = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon WHERE a.pegawai_acc = '1' AND b.status = '3' AND DATE(tgl_selesai) BETWEEN '" . $_GET['tanggal'] . "' AND '" . $_GET['tanggal2'] . "' ORDER BY b.tgl_selesai ASC") or die($mysqli->error);
                            } elseif ($filter == '5') {
                                $result = $mysqli->query("SELECT a.*,b.id_survey_lap,b.id_laporan,b.laporan,b.tgl_mulai,b.tgl_selesai,b.status,c.no_petugas_survey, c.nama AS nama_petugas, d.id_mohon,d.no_registrasi AS noreg_pb, e.id_mohon,e.no_registrasi AS noreg_pd, f.id_mohon,f.no_registrasi AS noreg_ps FROM tb_survey_lap_masuk a JOIN tb_laporan_survey b ON a.id_survey_lap = b.id_survey_lap JOIN tb_petugas_survey c ON c.no_petugas_survey = a.id_petugas LEFT JOIN tb_mohon_pb d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_mohon_pd e ON a.id_mohon_survey = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon WHERE a.pegawai_acc = '1' AND b.status = '3' AND a.tipe='" . $_GET['jenis_survey'] . "' ORDER BY b.tgl_selesai ASC") or die($mysqli->error);
                            }
                        } else {
                            echo '<a href="header.php?page=cpb1phasa&filter=0"></a>';

                            // $result = $mysqli->query("SELECT a.*,b.*,c.*,d.no_petugas_survey, d.nama AS nama_petugas FROM tb_survey_lap_masuk a JOIN tb_laporan_survey b ON a.id_survey_lap = b.id_survey_lap JOIN tb_mohon_pb c ON a.id_mohon_survey = c.id_mohon JOIN tb_petugas_survey d ON d.no_petugas_survey = a.id_petugas WHERE a.pegawai_acc = '1' AND b.status = '3' AND a.tipe = 'Survey Pasang Baru' ORDER BY b.tgl_selesai ASC") or die($mysqli->error);

                            $result = $mysqli->query("SELECT a.*,b.id_survey_lap,b.id_laporan,b.laporan,b.tgl_mulai,b.tgl_selesai,b.status,c.no_petugas_survey, c.nama AS nama_petugas, d.id_mohon,d.no_registrasi AS noreg_pb, e.id_mohon,e.no_registrasi AS noreg_pd, f.id_mohon,f.no_registrasi AS noreg_ps FROM tb_survey_lap_masuk a JOIN tb_laporan_survey b ON a.id_survey_lap = b.id_survey_lap JOIN tb_petugas_survey c ON c.no_petugas_survey = a.id_petugas LEFT JOIN tb_mohon_pb d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_mohon_pd e ON a.id_mohon_survey = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon WHERE a.pegawai_acc = '1' AND b.status = '3' ORDER BY b.tgl_selesai ASC") or die($mysqli->error);
                        }
                        // kode untuk isi Filter - END

                        $no = 1;

                        // $harga = mysqli_query($mysqli, "SELECT HARGA_SATUAN FROM tb_harga WHERE KODE = 'PB 1 FASA'");
                        // $hargaB = "";
                        // $n = 0;
                        // while ($hargaambil = $harga->fetch_array()) {
                        //     $n = $n + $hargaambil[0];
                        // }
                        // $hargaB = $hargaB .
                        //     "<td class='align-middle'>Rp." . number_format($n, 0, ',', '.') . "</td>";

                        $hitungrow = mysqli_num_rows($result);
                        if ($hitungrow > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $tipe = $row['tipe'];
                        ?>
                                <tr>
                                    <td class="align-middle"><?php echo $no++ ?></td>
                                    <?php
                                    if ($tipe == "Survey Pasang Baru") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['noreg_pb']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Survey Perubahan Daya") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['noreg_pd']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Survey Penyambungan Sementara") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['noreg_ps']; ?></td>
                                    <?php
                                    }
                                    ?>
                                    <!-- <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td> -->
                                    <td class="align-middle"><?php echo $row['tipe']; ?></td>
                                    <td class="align-middle"><?php echo $row['no_petugas_survey']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama_petugas']; ?></td>
                                    <td class="align-middle"><?php echo date("d-M-Y", strtotime($row['tgl_mulai'])); ?></td>
                                    <td class="align-middle"><?php echo date("d-M-Y", strtotime($row['tgl_selesai'])); ?></td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_laporan'] ?>" class="open-modal btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>
                                    <?php
                                    // echo $hargaB;
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

<script>
    $(function() {
        $(document).on('click', '.open-modal', function(e) {
            e.preventDefault();
            $("#get-data").modal('show');
            $.post('pelayanan_penyambungan/laporancetak/pasang_baru/view.php', {
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
            "targets": [2, 3, 4, 5, 7]
        }]
    });
</script>

<!-- Script untuk filter toggle filter berdasarkan pilihan -->
<script>
    $(document).ready(function() { // Ketika halaman selesai di load
        $('#form-bulan, #form-tahun,  #form-tanggal, #form-jenis').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function() { // Ketika user memilih filter
            if ($(this).val() == '1') { // Jika filter nya 2 (per bulan)
                $('#form-bulan, #form-tahun').show();
                $('#form-tanggal').hide();
                $('#form-jenis').hide();
            } else if ($(this).val() == '2') { // Jika filternya 3 (per tahun)
                $('#form-bulan').hide();
                $('#form-tanggal').hide();
                $('#form-jenis').hide();
                $('#form-tahun').show();
            } else if ($(this).val() == '4') {
                $('#form-bulan, #form-tahun').hide();
                $('#form-jenis').hide();
                $('#form-tanggal').show();
            } else if ($(this).val() == '5') {
                $('#form-bulan, #form-tahun').hide();
                $('#form-tanggal').hide();
                $('#form-jenis').show();
            }
            $('#form-bulan select, #form-tahun select, #form-tanggal input, #form-jenis select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
</script>



</html>