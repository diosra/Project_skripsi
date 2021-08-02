<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Menu Cetak Laporan Pengaduan Pelanggan</title>

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bold"><u>Menu Cetak Data Laporan Pengaduan Pelanggan</u></h1>

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
            <a class="btn btn-warning p-2 mr-auto" href="header.php?page=cetakpengaduan"><i class="fas fa-redo-alt"></i></a>

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

                                <input type="hidden" name="page" value="cetakpengaduan">

                                <label>Filter Berdasarkan</label><br>
                                <select name="filter" id="filter" class="form-control">
                                    <option value="" disabled selected>
                                        <-- Pilih -->
                                    </option>
                                    <option value="4">Per Tanggal Laporan Masuk</option>
                                    <option value="1">Per Bulan Laporan Masuk</option>
                                    <option value="2">Per Tahun Laporan Masuk</option>
                                    <option value="3">Per Jenis Gangguan</option>
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
                                        $query = "SELECT YEAR(tgl_masuk_laporan) AS tahun FROM tb_pengaduan WHERE status = 'selesai' GROUP BY YEAR(tgl_masuk_laporan)"; // Tampilkan tahun sesuai di tabel transaksi
                                        $sql = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
                                        while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                            echo '<option value="' . $data['tahun'] . '">' . $data['tahun'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div id="form-gangguan">
                                    <label>Jenis Gangguan</label><br>
                                    <select name="gangguan" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="TETANGGA TURUT PADAM">Tetangga Turut Padam</option>
                                        <option value="TETANGGA TIDAK TURUT PADAM">Tetangga Tidak Turut Padam</option>
                                        <option value="TIDAK TAHU TETANGGA PADAM ATAU TIDAK">Tidak Tahu Tetangga Padam atau Tidak</option>
                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-search"></i> Tampilkan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
                        <a type="submit" href="pelayanan_pengaduan/lpengaduan.php?filter=1&bulan=<?= $_GET["bulan"] ?>&tahun=<?= $_GET["tahun"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 2) : ?>
                    <form action="POST">
                        <?php
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        ?>
                        <a type="submit" href="pelayanan_pengaduan/lpengaduan.php?filter=2&tahun=<?= $_GET["tahun"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 3) : ?>
                    <form action="POST">
                        <?php
                        $gangguan = $_GET['gangguan'];
                        ?>
                        <a type="submit" href="pelayanan_pengaduan/lpengaduan.php?filter=3&gangguan=<?= $_GET["gangguan"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php elseif ($filter == 4) : ?>
                    <form action="POST">
                        <?php
                        $gangguan = $_GET['gangguan'];
                        ?>
                        <a type="submit" href="pelayanan_pengaduan/lpengaduan.php?filter=4&tanggal=<?= $_GET["tanggal"] ?>&sampaitanggal=<?= $_GET["tanggal2"] ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </form>
                <?php endif ?>
            <?php else : ?>
                <div>
                    <a type="submit" href="pelayanan_pengaduan/lpengaduan.php" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
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
                            <th class="text-center">No Laporan</th>
                            <th class="text-center">Identitas (KTP)</th>
                            <th class="text-center">Nama Pelapor</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Tanggal Masuk Pengaduan</th>
                            <th class="text-center">Deskripsi Lengkap</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // Kode untuk isi Filter - Start
                        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
                            $filter = $_GET['filter'];
                            if ($filter == '1') {
                                echo '<a href="header.php?page=cetakpengaduan&filter=1&bulan=' . $_GET['bulan'] . '&tahun=' . $_GET['tahun'] . '"></a>';
                                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_pengaduan a JOIN tb_laporan_tekpen b ON a.id_pengaduan = b.id_pengaduan JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan WHERE a.status = 'Selesai' AND MONTH(tgl_masuk_laporan)='" . $_GET['bulan'] . "' AND YEAR(tgl_masuk_laporan)='" . $_GET['tahun'] . "'") or die($mysqli->error);
                            } elseif ($filter == '2') {
                                echo '<a href="header.php?page=cetakpengaduan&filter=2&tahun=' . $_GET['tahun'] . '"></a>';
                                $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_pengaduan a JOIN tb_laporan_tekpen b ON a.id_pengaduan = b.id_pengaduan JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan WHERE a.status = 'Selesai' AND YEAR(tgl_masuk_laporan)='" . $_GET['tahun'] . "'") or die($mysqli->error);
                            } elseif ($filter == '3') {
                                // echo '<a href="header.php?page=cetakpengaduan&filter=3&gangguan=' . $_GET['gangguan'] . '"></a>';
                                $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_pengaduan a JOIN tb_laporan_tekpen b ON a.id_pengaduan = b.id_pengaduan JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan WHERE a.status = 'Selesai' AND gangguan ='" . $_GET['gangguan'] . "'") or die($mysqli->error);
                            } elseif ($filter == '4') {
                                $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_pengaduan a JOIN tb_laporan_tekpen b ON a.id_pengaduan = b.id_pengaduan JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan WHERE a.status = 'Selesai' AND DATE(tgl_masuk_laporan) BETWEEN '" . $_GET['tanggal'] . "' AND '" . $_GET['tanggal2'] . "'") or die($mysqli->error);
                            }
                        } else {
                            echo '<a href="header.php?page=cetakpengaduan"></a>';
                            $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_pengaduan a JOIN tb_laporan_tekpen b ON a.id_pengaduan = b.id_pengaduan JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan WHERE a.status = 'Selesai'") or die($mysqli->error);
                        }
                        // kode untuk isi Filter - END

                        $no = 1;
                        $hitungrow = mysqli_num_rows($result);
                        if ($hitungrow > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_laporan']; ?></td>
                                    <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td>
                                    <td class="align-middle"><?php echo date("d-M-Y", strtotime($row['tgl_masuk_laporan'])); ?></td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_pengaduan'] ?>" class="open-modal btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
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
            $.post('pelayanan_pengaduan/view_data_laporan.php', {
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
    $(document).ready(function() {
        $('#form-bulan, #form-tahun, #form-gangguan, #form-tanggal').hide();
        $('#filter').change(function() {
            if ($(this).val() == '1') {
                $('#form-bulan, #form-tahun').show();
                $('#form-gangguan').hide();
                $('#form-tanggal').hide();
            } else if ($(this).val() == '2') {
                $('#form-bulan').hide();
                $('#form-gangguan').hide();
                $('#form-tanggal').hide();
                $('#form-tahun').show();
            } else if ($(this).val() == '3') {
                $('#form-bulan, #form-tahun').hide();
                $('#form-tanggal').hide();
                $('#form-gangguan').show();
            } else {
                $('#form-bulan, #form-tahun').hide();
                $('#form-gangguan').hide();
                $('#form-tanggal').show();
            }
            $('#form-bulan select, #form-tahun select, #form-gangguan select, #form-tanggal input').val('');
        })
    })
</script>



</html>