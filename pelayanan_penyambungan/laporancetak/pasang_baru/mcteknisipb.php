<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Menu Cetak Hasil Laporan Teknisi Pasang Baru</title>

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bold"><u>Menu Cetak Data Hasil Laporan Teknisi Pelayanan Penyambungan</u></h1>

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
            <a class="btn btn-warning p-2 mr-auto" href="header.php?page=clteknisipb"><i class="fas fa-redo-alt"></i></a>

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

                                <input type="hidden" name="page" value="clteknisipb">

                                <label>Filter Berdasarkan</label><br>
                                <select name="filter" id="filter" class="form-control">
                                    <option value="" disabled selected>
                                        <-- Pilih -->
                                    </option>
                                    <option value="4">Per Tanggal Selesai</option>
                                    <option value="1">Per Bulan Selesai</option>
                                    <option value="2">Per Tahun Selesai</option>
                                    <option value="5">Per Jenis Pengajuan</option>
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
                                        $query = "SELECT YEAR(tgl_selesai) AS tahun FROM tb_laporan_tekyan WHERE status = '3' GROUP BY YEAR(tgl_selesai)"; // Tampilkan tahun sesuai di tabel transaksi
                                        $sql = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
                                        while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                            echo '<option value="' . $data['tahun'] . '">' . $data['tahun'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div id="form-pengajuan">
                                    <label>Pengajuan</label><br>
                                    <select name="pengajuan" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="PASANG BARU">Pasang Baru</option>
                                        <option value="PERUBAHAN DAYA">Perubahan Daya</option>
                                        <option value="PENYAMBUNGAN SEMENTARA">Penyambungan Sementara</option>
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
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lteknisipb.php?filter=1&bulan=<?= $_GET["bulan"] ?>&tahun=<?= $_GET["tahun"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 2) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lteknisipb.php?filter=2&tahun=<?= $_GET["tahun"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 3) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lteknisipb.php?filter=3&produk=<?= $_GET["produk"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 4) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lteknisipb.php?filter=4&tanggal=<?= $_GET["tanggal"] ?>&sampaitanggal=<?= $_GET["tanggal2"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 5) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lteknisipb.php?filter=5&pengajuan=<?= $_GET["pengajuan"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php endif ?>
            <?php else : ?>
                <div>
                    <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lteknisipb.php" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
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
                            <th rowspan="2" class="text-center">Pengajuan</th>
                            <th rowspan="2" class="text-center">Pekerjaan RAB</th>
                            <th rowspan="2" class="text-center">ID Teknisi</th>
                            <th rowspan="2" class="text-center">Nama Teknisi</th>
                            <th colspan="2" class="text-center">Tanggal Pengerjaan</th>
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

                                $result = $mysqli->query("SELECT a.*,b.*,d.no_teknisi, d.nama AS nama_teknisi, e.id_pasang_baru,e.id_mohon, e.pekerjaan_rab AS pb_rab, f.id_perubahan_daya,f.id_mohon, f.pekerjaan_rab AS pd_rab, g.id_mlta, g.id_mohon,g.pekerjaan_rab AS mlta_rab, h.id_mohon,h.id_pelanggan, h.no_registrasi AS noreg_pb, i.id_mohon,i.id_pelanggan,i.no_registrasi AS noreg_pd, j.id_mohon,j.id_pelanggan,j.no_registrasi AS noreg_ps, k.* FROM tb_tekyan_lap_masuk a JOIN tb_laporan_tekyan b ON a.id_tekyanlap = b.id_tekyanlap JOIN tb_teknisi_penyambungan d ON a.id_teknisi = d.no_teknisi LEFT JOIN tb_pasang_baru e ON e.id_pasang_baru = a.id_yanbung LEFT JOIN tb_perubahan_daya f ON f.id_perubahan_daya = a.id_yanbung LEFT JOIN tb_multiguna g ON g.id_mlta = a.id_yanbung LEFT JOIN tb_mohon_pb h ON h.id_mohon = e.id_mohon LEFT JOIN tb_mohon_pd i ON i.id_mohon = f.id_mohon LEFT JOIN tb_mohon_multiguna j ON j.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan k ON k.idpel = h.id_pelanggan OR k.idpel = i.id_pelanggan OR k.idpel = j.id_pelanggan WHERE a.pegawai_acc = '1' AND b.status = '3' AND MONTH(tgl_selesai)='" . $_GET['bulan'] . "' AND YEAR(tgl_selesai)='" . $_GET['tahun'] . "' ORDER BY b.tgl_selesai ASC") or die($mysqli->error);
                            } elseif ($filter == '2') {
                                echo '<a href="header.php?page=cpb1phasa&filter=2&tahun=' . $_GET['tahun'] . '"></a>';

                                $result = $mysqli->query("SELECT a.*,b.*,d.no_teknisi, d.nama AS nama_teknisi, e.id_pasang_baru,e.id_mohon, e.pekerjaan_rab AS pb_rab, f.id_perubahan_daya,f.id_mohon, f.pekerjaan_rab AS pd_rab, g.id_mlta, g.id_mohon,g.pekerjaan_rab AS mlta_rab, h.id_mohon,h.id_pelanggan, h.no_registrasi AS noreg_pb, i.id_mohon,i.id_pelanggan,i.no_registrasi AS noreg_pd, j.id_mohon,j.id_pelanggan,j.no_registrasi AS noreg_ps, k.* FROM tb_tekyan_lap_masuk a JOIN tb_laporan_tekyan b ON a.id_tekyanlap = b.id_tekyanlap JOIN tb_teknisi_penyambungan d ON a.id_teknisi = d.no_teknisi LEFT JOIN tb_pasang_baru e ON e.id_pasang_baru = a.id_yanbung LEFT JOIN tb_perubahan_daya f ON f.id_perubahan_daya = a.id_yanbung LEFT JOIN tb_multiguna g ON g.id_mlta = a.id_yanbung LEFT JOIN tb_mohon_pb h ON h.id_mohon = e.id_mohon LEFT JOIN tb_mohon_pd i ON i.id_mohon = f.id_mohon LEFT JOIN tb_mohon_multiguna j ON j.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan k ON k.idpel = h.id_pelanggan OR k.idpel = i.id_pelanggan OR k.idpel = j.id_pelanggan WHERE a.pegawai_acc = '1' AND b.status = '3' AND YEAR(tgl_selesai)='" . $_GET['tahun'] . "' ORDER BY b.tgl_selesai ASC") or die($mysqli->error);
                            } elseif ($filter == '4') {
                                $result = $mysqli->query("SELECT a.*,b.*,d.no_teknisi, d.nama AS nama_teknisi, e.id_pasang_baru,e.id_mohon, e.pekerjaan_rab AS pb_rab, f.id_perubahan_daya,f.id_mohon, f.pekerjaan_rab AS pd_rab, g.id_mlta, g.id_mohon,g.pekerjaan_rab AS mlta_rab, h.id_mohon,h.id_pelanggan, h.no_registrasi AS noreg_pb, i.id_mohon,i.id_pelanggan,i.no_registrasi AS noreg_pd, j.id_mohon,j.id_pelanggan,j.no_registrasi AS noreg_ps, k.* FROM tb_tekyan_lap_masuk a JOIN tb_laporan_tekyan b ON a.id_tekyanlap = b.id_tekyanlap JOIN tb_teknisi_penyambungan d ON a.id_teknisi = d.no_teknisi LEFT JOIN tb_pasang_baru e ON e.id_pasang_baru = a.id_yanbung LEFT JOIN tb_perubahan_daya f ON f.id_perubahan_daya = a.id_yanbung LEFT JOIN tb_multiguna g ON g.id_mlta = a.id_yanbung LEFT JOIN tb_mohon_pb h ON h.id_mohon = e.id_mohon LEFT JOIN tb_mohon_pd i ON i.id_mohon = f.id_mohon LEFT JOIN tb_mohon_multiguna j ON j.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan k ON k.idpel = h.id_pelanggan OR k.idpel = i.id_pelanggan OR k.idpel = j.id_pelanggan WHERE a.pegawai_acc = '1' AND b.status = '3' AND DATE(tgl_selesai) BETWEEN '" . $_GET['tanggal'] . "' AND '" . $_GET['tanggal2'] . "' ORDER BY b.tgl_selesai ASC") or die($mysqli->error);
                            } elseif ($filter == '5') {
                                $result = $mysqli->query("SELECT a.*,b.*,d.no_teknisi, d.nama AS nama_teknisi, e.id_pasang_baru,e.id_mohon, e.pekerjaan_rab AS pb_rab, f.id_perubahan_daya,f.id_mohon, f.pekerjaan_rab AS pd_rab, g.id_mlta, g.id_mohon,g.pekerjaan_rab AS mlta_rab, h.id_mohon,h.id_pelanggan, h.no_registrasi AS noreg_pb, i.id_mohon,i.id_pelanggan,i.no_registrasi AS noreg_pd, j.id_mohon,j.id_pelanggan,j.no_registrasi AS noreg_ps, k.* FROM tb_tekyan_lap_masuk a JOIN tb_laporan_tekyan b ON a.id_tekyanlap = b.id_tekyanlap JOIN tb_teknisi_penyambungan d ON a.id_teknisi = d.no_teknisi LEFT JOIN tb_pasang_baru e ON e.id_pasang_baru = a.id_yanbung LEFT JOIN tb_perubahan_daya f ON f.id_perubahan_daya = a.id_yanbung LEFT JOIN tb_multiguna g ON g.id_mlta = a.id_yanbung LEFT JOIN tb_mohon_pb h ON h.id_mohon = e.id_mohon LEFT JOIN tb_mohon_pd i ON i.id_mohon = f.id_mohon LEFT JOIN tb_mohon_multiguna j ON j.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan k ON k.idpel = h.id_pelanggan OR k.idpel = i.id_pelanggan OR k.idpel = j.id_pelanggan WHERE a.pegawai_acc = '1' AND b.status = '3' AND a.tipe='" . $_GET['pengajuan'] . "' ORDER BY b.tgl_selesai ASC") or die($mysqli->error);
                            }
                        } else {
                            echo '<a href="header.php?page=cpb1phasa&filter=0"></a>';

                            // $result = $mysqli->query("SELECT a.*,b.*,c.*,d.no_teknisi, d.nama AS nama_teknisi, e.* FROM tb_tekyan_lap_masuk a JOIN tb_laporan_tekyan b ON a.id_tekyanlap = b.id_tekyanlap JOIN tb_pasang_baru c ON a.id_yanbung = c.id_pasang_baru JOIN tb_teknisi_penyambungan d ON a.id_teknisi = d.no_teknisi JOIN tb_mohon_pb e ON c.id_mohon = e.id_mohon  WHERE a.pegawai_acc = '1' AND b.status = '3' AND a.tipe = 'Pasang Baru' ORDER BY b.tgl_selesai ASC") or die($mysqli->error);

                            $result = $mysqli->query("SELECT a.*,b.*,d.no_teknisi, d.nama AS nama_teknisi, e.id_pasang_baru,e.id_mohon, e.pekerjaan_rab AS pb_rab, f.id_perubahan_daya,f.id_mohon, f.pekerjaan_rab AS pd_rab, g.id_mlta, g.id_mohon,g.pekerjaan_rab AS mlta_rab, h.id_mohon,h.id_pelanggan, h.no_registrasi AS noreg_pb, i.id_mohon,i.id_pelanggan,i.no_registrasi AS noreg_pd, j.id_mohon,j.id_pelanggan,j.no_registrasi AS noreg_ps, k.* FROM tb_tekyan_lap_masuk a JOIN tb_laporan_tekyan b ON a.id_tekyanlap = b.id_tekyanlap JOIN tb_teknisi_penyambungan d ON a.id_teknisi = d.no_teknisi LEFT JOIN tb_pasang_baru e ON e.id_pasang_baru = a.id_yanbung LEFT JOIN tb_perubahan_daya f ON f.id_perubahan_daya = a.id_yanbung LEFT JOIN tb_multiguna g ON g.id_mlta = a.id_yanbung LEFT JOIN tb_mohon_pb h ON h.id_mohon = e.id_mohon LEFT JOIN tb_mohon_pd i ON i.id_mohon = f.id_mohon LEFT JOIN tb_mohon_multiguna j ON j.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan k ON k.idpel = h.id_pelanggan OR k.idpel = i.id_pelanggan OR k.idpel = j.id_pelanggan WHERE a.pegawai_acc = '1' AND b.status = '3' ORDER BY b.tgl_selesai ASC") or die($mysqli->error);
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
                                    if ($tipe == "Pasang Baru") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['noreg_pb']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Perubahan Daya") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['noreg_pd']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Penyambungan Sementara") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['noreg_ps']; ?></td>
                                    <?php
                                    }
                                    ?>
                                    <!-- <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td> -->
                                    <td class="align-middle"><?php echo $row['tipe']; ?></td>
                                    <?php
                                    if ($tipe == "Pasang Baru") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['pb_rab']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Perubahan Daya") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['pd_rab']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Penyambungan Sementara") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['mlta_rab']; ?></td>
                                    <?php
                                    }
                                    ?>
                                    <td class="align-middle"><?php echo $row['no_teknisi']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama_teknisi']; ?></td>
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
            $.post('pelayanan_penyambungan/laporancetak/pasang_baru/view_teknisi.php', {
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
            "targets": [3, 4, 5, 6, 8]
        }]
    });
</script>

<!-- Script untuk filter toggle filter berdasarkan pilihan -->
<script>
    $(document).ready(function() { // Ketika halaman selesai di load
        $('#form-bulan, #form-tahun, #form-tanggal, #form-pengajuan').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function() { // Ketika user memilih filter
            if ($(this).val() == '1') { // Jika filter nya 2 (per bulan)
                $('#form-bulan, #form-tahun').show();
                $('#form-tanggal').hide();
                $('#form-pengajuan').hide();
            } else if ($(this).val() == '2') { // Jika filternya 3 (per tahun)
                $('#form-bulan').hide();
                $('#form-tanggal').hide();
                $('#form-pengajuan').hide();
                $('#form-tahun').show();
            } else if ($(this).val() == '4') {
                $('#form-bulan, #form-tahun').hide();
                $('#form-pengajuan').hide();
                $('#form-tanggal').show();
            } else {
                $('#form-bulan, #form-tahun').hide();
                $('#form-tanggal').hide();
                $('#form-pengajuan').show();
            }
            $('#form-bulan select, #form-tahun select,  #form-tanggal input, #form-pengajuan select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
</script>



</html>