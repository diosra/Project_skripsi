<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Menu Cetak Pengajuan Ditolak</title>

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bold"><u>Menu Cetak Data Pengajuan Ditolak</u></h1>

    <!-- Modal dialog untuk deskripsi -->
    <div id="get-data" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deskripsi Lengkap Laporan</h4>
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
            <a class="btn btn-warning p-2 mr-auto" href="header.php?page=clpbtolak"><i class="fas fa-redo-alt"></i></a>

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

                                <input type="hidden" name="page" value="clpbtolak">

                                <label>Filter Berdasarkan</label><br>
                                <select name="filter" id="filter" class="form-control">
                                    <option value="" disabled selected>
                                        <-- Pilih -->
                                    </option>
                                    <option value="4">Per Tanggal Ditolak</option>
                                    <option value="1">Per Bulan Ditolak</option>
                                    <option value="2">Per Tahun Ditolak</option>
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
                                        $query = "SELECT YEAR(tgl_selesai) AS tahun FROM tb_laporan_survey WHERE status = '4' GROUP BY YEAR(tgl_selesai)"; // Tampilkan tahun sesuai di tabel transaksi
                                        $sql = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
                                        while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                            echo '<option value="' . $data['tahun'] . '">' . $data['tahun'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div id="form-jenis">
                                    <label>Jenis Transaksi</label><br>
                                    <select name="jenis_transaksi" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="PASANG BARU">Pasang Baru</option>
                                        <option value="PERUBAHAN DAYA">Perubahan Daya</option>
                                        <option value="SAMBUNG SEMENTARA">Sambung Sementara</option>
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
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpbtolak.php?filter=1&bulan=<?= $_GET["bulan"] ?>&tahun=<?= $_GET["tahun"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 2) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpbtolak.php?filter=2&tahun=<?= $_GET["tahun"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 3) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpbtolak.php?filter=3&produk=<?= $_GET["produk"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 4) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpbtolak.php?filter=4&tanggal=<?= $_GET["tanggal"] ?>&sampaitanggal=<?= $_GET["tanggal2"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 5) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpbtolak.php?filter=5&jenis=<?= $_GET["jenis_transaksi"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php endif ?>
            <?php else : ?>
                <div>
                    <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpbtolak.php" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
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
                            <th rowspan="2" class="text-center">No.Registrasi</th>
                            <th rowspan="2" class="text-center">Identitas (KTP)</th>
                            <th rowspan="2" class="text-center">Nama Pemohon</th>
                            <th rowspan="2" class="text-center">Alamat</th>
                            <th rowspan="2" class="text-center">Jenis Pengajuan</th>
                            <th colspan="2" class="text-center">Tanggal</th>
                            <th rowspan="2" class="text-center">Alasan Penolakan</th>
                        </tr>
                        <tr>
                            <th>Pengajuan</th>
                            <th>Ditolak</th>
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

                                $result = $mysqli->query("SELECT a.*,b.id_mohon AS pb_mohon,c.id_mohon AS tbpb_mohon,b.no_registrasi AS jt_pb,b.tgl_masuk AS tgl_pb,d.id_mohon AS pd_mohon,e.id_mohon AS tbpd_mohon,d.no_registrasi AS jt_pd,d.tgl_masuk AS tgl_pd,f.id_mohon AS ps_mohon,g.id_mohon AS tbps_mohon,f.tgl_masuk AS tgl_ps,f.no_registrasi AS jt_ps,h.idpel,h.identitas,h.nama,h.alamat,i.* , c.jenis_transaksi AS jt_pb2, e.jenis_transaksi AS jt_pd2, g.jenis_transaksi AS jt_ps2 FROM tb_laporan_survey a JOIN tb_survey_lap_masuk i ON a.id_survey_lap = i.id_survey_lap LEFT JOIN tb_mohon_pb b ON a.id_mohon_survey = b.id_mohon LEFT JOIN tb_pasang_baru c ON b.id_mohon = c.id_mohon LEFT JOIN tb_mohon_pd d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_perubahan_daya e ON d.id_mohon = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon LEFT JOIN tb_multiguna g ON f.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan h ON h.idpel = b.id_pelanggan OR h.idpel = d.id_pelanggan OR h.idpel = f.id_pelanggan WHERE a.status = '4' AND MONTH(tgl_selesai)='" . $_GET['bulan'] . "' AND YEAR(tgl_selesai)='" . $_GET['tahun'] . "' ORDER BY a.tgl_selesai ASC") or die($mysqli->error);
                            } elseif ($filter == '2') {
                                echo '<a href="header.php?page=cpb1phasa&filter=2&tahun=' . $_GET['tahun'] . '"></a>';

                                $result = $mysqli->query("SELECT a.*,b.id_mohon AS pb_mohon,c.id_mohon AS tbpb_mohon,b.no_registrasi AS jt_pb,b.tgl_masuk AS tgl_pb,d.id_mohon AS pd_mohon,e.id_mohon AS tbpd_mohon,d.no_registrasi AS jt_pd,d.tgl_masuk AS tgl_pd,f.id_mohon AS ps_mohon,g.id_mohon AS tbps_mohon,f.tgl_masuk AS tgl_ps,f.no_registrasi AS jt_ps,h.idpel,h.identitas,h.nama,h.alamat,i.* , c.jenis_transaksi AS jt_pb2, e.jenis_transaksi AS jt_pd2, g.jenis_transaksi AS jt_ps2 FROM tb_laporan_survey a JOIN tb_survey_lap_masuk i ON a.id_survey_lap = i.id_survey_lap LEFT JOIN tb_mohon_pb b ON a.id_mohon_survey = b.id_mohon LEFT JOIN tb_pasang_baru c ON b.id_mohon = c.id_mohon LEFT JOIN tb_mohon_pd d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_perubahan_daya e ON d.id_mohon = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon LEFT JOIN tb_multiguna g ON f.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan h ON h.idpel = b.id_pelanggan OR h.idpel = d.id_pelanggan OR h.idpel = f.id_pelanggan WHERE a.status = '4' AND YEAR(tgl_selesai)='" . $_GET['tahun'] . "' ORDER BY a.tgl_selesai ASC") or die($mysqli->error);
                            } elseif ($filter == '4') {
                                $result = $mysqli->query("SELECT a.*,b.id_mohon AS pb_mohon,c.id_mohon AS tbpb_mohon,b.no_registrasi AS jt_pb,b.tgl_masuk AS tgl_pb,d.id_mohon AS pd_mohon,e.id_mohon AS tbpd_mohon,d.no_registrasi AS jt_pd,d.tgl_masuk AS tgl_pd,f.id_mohon AS ps_mohon,g.id_mohon AS tbps_mohon,f.tgl_masuk AS tgl_ps,f.no_registrasi AS jt_ps,h.idpel,h.identitas,h.nama,h.alamat,i.* , c.jenis_transaksi AS jt_pb2, e.jenis_transaksi AS jt_pd2, g.jenis_transaksi AS jt_ps2 FROM tb_laporan_survey a JOIN tb_survey_lap_masuk i ON a.id_survey_lap = i.id_survey_lap LEFT JOIN tb_mohon_pb b ON a.id_mohon_survey = b.id_mohon LEFT JOIN tb_pasang_baru c ON b.id_mohon = c.id_mohon LEFT JOIN tb_mohon_pd d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_perubahan_daya e ON d.id_mohon = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon LEFT JOIN tb_multiguna g ON f.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan h ON h.idpel = b.id_pelanggan OR h.idpel = d.id_pelanggan OR h.idpel = f.id_pelanggan WHERE a.status = '4' AND DATE(tgl_selesai) BETWEEN '" . $_GET['tanggal'] . "' AND '" . $_GET['tanggal2'] . "' ORDER BY a.tgl_selesai ASC") or die($mysqli->error);
                            } elseif ($filter == '5') {
                                $result = $mysqli->query("SELECT a.*,b.id_mohon AS pb_mohon,c.id_mohon AS tbpb_mohon,b.no_registrasi AS jt_pb,b.tgl_masuk AS tgl_pb,d.id_mohon AS pd_mohon,e.id_mohon AS tbpd_mohon,d.no_registrasi AS jt_pd,d.tgl_masuk AS tgl_pd,f.id_mohon AS ps_mohon,g.id_mohon AS tbps_mohon,f.tgl_masuk AS tgl_ps,f.no_registrasi AS jt_ps,h.idpel,h.identitas,h.nama,h.alamat,i.* , c.jenis_transaksi AS jt_pb2, e.jenis_transaksi AS jt_pd2, g.jenis_transaksi AS jt_ps2 FROM tb_laporan_survey a JOIN tb_survey_lap_masuk i ON a.id_survey_lap = i.id_survey_lap LEFT JOIN tb_mohon_pb b ON a.id_mohon_survey = b.id_mohon LEFT JOIN tb_pasang_baru c ON b.id_mohon = c.id_mohon LEFT JOIN tb_mohon_pd d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_perubahan_daya e ON d.id_mohon = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon LEFT JOIN tb_multiguna g ON f.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan h ON h.idpel = b.id_pelanggan OR h.idpel = d.id_pelanggan OR h.idpel = f.id_pelanggan WHERE a.status = '4' AND (c.jenis_transaksi='" . $_GET['jenis_transaksi'] . "' OR e.jenis_transaksi ='" . $_GET['jenis_transaksi'] . "' OR g.jenis_transaksi ='" . $_GET['jenis_transaksi'] . "')ORDER BY a.tgl_selesai ASC") or die($mysqli->error);
                            }
                        } else {
                            echo '<a href="header.php?page=cpb1phasa&filter=0"></a>';

                            $result = $mysqli->query("SELECT a.*,b.id_mohon AS pb_mohon,c.id_mohon AS tbpb_mohon,b.no_registrasi AS jt_pb,b.tgl_masuk AS tgl_pb,d.id_mohon AS pd_mohon,e.id_mohon AS tbpd_mohon,d.no_registrasi AS jt_pd,d.tgl_masuk AS tgl_pd,f.id_mohon AS ps_mohon,g.id_mohon AS tbps_mohon,f.tgl_masuk AS tgl_ps,f.no_registrasi AS jt_ps,h.idpel,h.identitas,h.nama,h.alamat,i.* , c.jenis_transaksi AS jt_pb2, e.jenis_transaksi AS jt_pd2, g.jenis_transaksi AS jt_ps2 FROM tb_laporan_survey a JOIN tb_survey_lap_masuk i ON a.id_survey_lap = i.id_survey_lap LEFT JOIN tb_mohon_pb b ON a.id_mohon_survey = b.id_mohon LEFT JOIN tb_pasang_baru c ON b.id_mohon = c.id_mohon LEFT JOIN tb_mohon_pd d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_perubahan_daya e ON d.id_mohon = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon LEFT JOIN tb_multiguna g ON f.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan h ON h.idpel = b.id_pelanggan OR h.idpel = d.id_pelanggan OR h.idpel = f.id_pelanggan WHERE a.status = '4' ORDER BY a.tgl_selesai ASC") or die($mysqli->error);
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
                                        <td class="align-middle"><?php echo $row['jt_pb']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Survey Perubahan Daya") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['jt_pd']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Survey Penyambungan Sementara") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['jt_ps']; ?></td>
                                    <?php
                                    }
                                    ?>
                                    <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td>
                                    <?php
                                    if ($tipe == "Survey Pasang Baru") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['jt_pb2']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Survey Perubahan Daya") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['jt_pd2']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Survey Penyambungan Sementara") {
                                    ?>
                                        <td class="align-middle"><?php echo $row['jt_ps2']; ?></td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($tipe == "Survey Pasang Baru") {
                                    ?>
                                        <td class="align-middle"><?php echo date("d-M-Y", strtotime($row['tgl_pb'])); ?></td>
                                    <?php
                                    } elseif ($tipe == "Survey Perubahan Daya") {
                                    ?>
                                        <td class="align-middle"><?php echo date("d-M-Y", strtotime($row['tgl_pd'])); ?></td>
                                    <?php
                                    } elseif ($tipe == "Survey Penyambungan Sementara") {
                                    ?>
                                        <td class="align-middle"><?php echo date("d-M-Y", strtotime($row['tgl_ps'])); ?></td>
                                    <?php
                                    }
                                    ?>
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
            $.post('pelayanan_penyambungan/laporancetak/pasang_baru/view_tolak.php', {
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
            "targets": [2, 3, 4, 5, 6, 8]
        }]
    });
</script>

<!-- Script untuk filter toggle filter berdasarkan pilihan -->
<script>
    $(document).ready(function() { // Ketika halaman selesai di load
        $('#form-bulan, #form-tahun, #form-produk, #form-tanggal, #form-jenis').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
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
            $('#form-bulan select, #form-tahun select, #form-jenis select, #form-tanggal input').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
</script>



</html>