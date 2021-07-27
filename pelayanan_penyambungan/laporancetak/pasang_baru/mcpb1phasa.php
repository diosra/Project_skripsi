<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Menu Cetak PB 1 Phasa</title>

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bold"><u>Menu Cetak Data Pelanggan Mengajukan Pasang Baru 1 Phasa</u></h1>

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
            <a class="btn btn-warning p-2 mr-auto" href="header.php?page=cpb1phasa"><i class="fas fa-redo-alt"></i></a>

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

                                <input type="hidden" name="page" value="cpb1phasa">

                                <label>Filter Berdasarkan</label><br>
                                <select name="filter" id="filter" class="form-control">
                                    <option value="" disabled selected>
                                        <-- Pilih -->
                                    </option>
                                    <option value="4">Per Tanggal Pengajuan</option>
                                    <option value="1">Per Bulan Pengajuan</option>
                                    <option value="2">Per Tahun Pengajuan</option>
                                    <option value="3">Produk Layanan</option>
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
                                        $query = "SELECT a.id_mohon, YEAR(tgl_masuk) AS tahun, b.* FROM tb_mohon_pb a JOIN tb_pasang_baru b ON a.id_mohon = b.id_mohon WHERE fasa_baru = '1 FASA' GROUP BY YEAR(tgl_masuk)"; // Tampilkan tahun sesuai di tabel transaksi
                                        $sql = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
                                        while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                            echo '<option value="' . $data['tahun'] . '">' . $data['tahun'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div id="form-produk">
                                    <label>Produk Layanan</label><br>
                                    <select name="produk" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="PASCABAYAR">Pascabayar</option>
                                        <option value="PRABAYAR">Prabayar</option>
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
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpb1phasa.php?filter=1&bulan=<?= $_GET["bulan"] ?>&tahun=<?= $_GET["tahun"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 2) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpb1phasa.php?filter=2&tahun=<?= $_GET["tahun"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 3) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpb1phasa.php?filter=3&produk=<?= $_GET["produk"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 4) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpb1phasa.php?filter=4&tanggal=<?= $_GET["tanggal"] ?>&sampaitanggal=<?= $_GET["tanggal2"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php endif ?>
            <?php else : ?>
                <div>
                    <a type="submit" href="pelayanan_penyambungan/laporancetak/pasang_baru/laporan/lpb1phasa.php" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                </div>
            <?php endif ?>
            <!-- Kode PHP untuk mengirim link href sesuai Filter - End -->

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No.Registrasi</th>
                            <th class="text-center">Identitas (KTP)</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Data Lengkap Laporan</th>
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

                                $result = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_pasang_baru WHERE a.fasa_baru = '1 FASA' AND a.status_teknisi = '3' AND MONTH(tgl_masuk)='" . $_GET['bulan'] . "' AND YEAR(tgl_masuk)='" . $_GET['tahun'] . "'") or die($mysqli->error);
                            } elseif ($filter == '2') {
                                echo '<a href="header.php?page=cpb1phasa&filter=2&tahun=' . $_GET['tahun'] . '"></a>';

                                $result = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_pasang_baru WHERE a.fasa_baru = '1 FASA' AND a.status_teknisi = '3' AND YEAR(tgl_masuk)='" . $_GET['tahun'] . "'") or die($mysqli->error);
                            } elseif ($filter == '3') {
                                $result = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_pasang_baru WHERE a.fasa_baru = '1 FASA' AND a.status_teknisi = '3' AND b.produk_layanan='" . $_GET['produk'] . "'") or die($mysqli->error);
                            } else {
                                $result = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_pasang_baru WHERE a.fasa_baru = '1 FASA' AND a.status_teknisi = '3' AND DATE(tgl_masuk) BETWEEN '" . $_GET['tanggal'] . "' AND '" . $_GET['tanggal2'] . "'") or die($mysqli->error);
                            }
                        } else {
                            echo '<a href="header.php?page=cpb1phasa&filter=0"></a>';

                            $result = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_pasang_baru WHERE a.fasa_baru = '1 FASA' AND a.status_teknisi = '3'") or die($mysqli->error);
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
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                    <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td>
                                    <td class="align-middle"><?php echo date("d-M-Y", strtotime($row['tgl_masuk'])); ?></td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_pasang_baru'] ?>" class="open-modal btn btn-primary" href="#">
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
            $.post('pelayanan_penyambungan/laporancetak/pasang_baru/view_data_laporan.php', {
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
            "targets": [2, 3, 4, 6]
        }]
    });
</script>

<!-- Script untuk filter toggle filter berdasarkan pilihan -->
<script>
    $(document).ready(function() { // Ketika halaman selesai di load
        $('#form-bulan, #form-tahun, #form-produk, #form-tanggal').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function() { // Ketika user memilih filter
            if ($(this).val() == '1') { // Jika filter nya 2 (per bulan)
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
                $('#form-produk').hide();
                $('#form-tanggal').hide();
            } else if ($(this).val() == '2') { // Jika filternya 3 (per tahun)
                $('#form-bulan').hide();
                $('#form-produk').hide();
                $('#form-tanggal').hide();
                $('#form-tahun').show();
            } else if ($(this).val() == '3') {
                $('#form-bulan').hide();
                $('#form-tahun').hide();
                $('#form-tanggal').hide();
                $('#form-produk').show();
            } else {
                $('#form-bulan, #form-tahun').hide();
                $('#form-produk').hide();
                $('#form-tanggal').show();
            }
            $('#form-bulan select, #form-tahun select, #form-produk select, #form-tanggal input').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
</script>



</html>