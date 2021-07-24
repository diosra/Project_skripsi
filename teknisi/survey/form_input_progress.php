<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Progress</title>

    <script type="text/javascript">
        function show1() {
            document.getElementById('tgl_cek').style.display = 'block';
            document.getElementById("tgl_cek2").required = true;
            document.getElementById('form_tolak').style.display = 'none';
            document.getElementById('kotak_tolak').required = false;
            document.getElementById('form_laporan').style.display = 'block';
            document.getElementById("kotak_laporan").required = true;
        }
    </script>
    <script type="text/javascript">
        function show2() {
            document.getElementById('tgl_cek').style.display = 'none';
            document.getElementById('tgl_cek_a').style.display = 'block';
            document.getElementById("tgl_cek2").required = false;
            document.getElementById("tgl_cek3").required = true;
            document.getElementById('form_tolak').style.display = 'none';
            document.getElementById('kotak_tolak').required = false;
            document.getElementById('form_laporan').style.display = 'block';
            document.getElementById("kotak_laporan").required = true;
        }
    </script>
    <script type="text/javascript">
        function show3() {
            document.getElementById('tgl_cek').style.display = 'block';
            document.getElementById('tgl_cek_a').style.display = 'none';
            document.getElementById('form_tolak').style.display = 'block';
            document.getElementById('form_laporan').style.display = 'none';
            document.getElementById('kotak_tolak').required = true;
            document.getElementById("tgl_cek2").required = true;
            document.getElementById("tgl_cek3").required = false;
            document.getElementById("kotak_laporan").required = false;
        }
    </script>

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- PHP - Query Select untuk data ditampilkan di form -->
    <?php
    if (isset($_GET['id']) && isset($_GET['status']) && isset($_GET['jt'])) {
        $status = $_GET['status'];
        $jentra = $_GET['jt'];

        if ($jentra == "Pasang Baru") {
            if ($status == "1") {
    ?>
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Tambah Laporan Progres Petugas Survey Pasang Baru</u></h1>
                </div>
                <?php
                $id = $_GET['id'];
                $result = $mysqli->query("SELECT a.* , b.* , c.*  FROM tb_survey_lap_masuk a JOIN tb_mohon_pb b ON a.id_mohon_survey = b.id_mohon JOIN tb_pasang_baru c ON c.id_mohon = b.id_mohon WHERE id_survey_lap = $id && jenis_transaksi = 'Pasang Baru'") or die($mysqli->error);

                if ($result->num_rows) {
                    $row = $result->fetch_array();
                    $id_p = $row['id_survey_lap'];
                    $id_pen1 = $row['id_mohon'];
                    $no_registrasi = $row['no_registrasi'];
                    $identitas = $row['identitas'];
                    $nama = $row['nama'];
                    $alamat = $row['alamat'];
                    $daya = $row['daya'];
                    $peruntukan = $row['peruntukan'];
                    $produk = $row['produk_layanan'];
                    $token = $row['token'];
                    $fasa = $row['fasa_baru'];
                    $tarif = $row['tarif'];
                }
            } else {
                ?>
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Edit Laporan Progres Sementara Petugas Survey Pasang Baru</u></h1>
                </div>
                <?php
                $id = $_GET['id'];
                $result = $mysqli->query("SELECT a.* , b.* , c.* , d.*  FROM tb_survey_lap_masuk a JOIN tb_mohon_pb b ON a.id_mohon_survey = b.id_mohon JOIN tb_pasang_baru c ON c.id_mohon = b.id_mohon JOIN tb_laporan_survey d ON d.id_mohon_survey = b.id_mohon WHERE a.id_survey_lap = $id") or die($mysqli->error);

                if ($result->num_rows) {
                    $row = $result->fetch_array();
                    $id_p = $row['id_survey_lap'];
                    $id_mohon = $row['id_mohon'];
                    $no_registrasi = $row['no_registrasi'];
                    $identitas = $row['identitas'];
                    $nama = $row['nama'];
                    $alamat = $row['alamat'];
                    $daya = $row['daya'];
                    $peruntukan = $row['peruntukan'];
                    $produk = $row['produk_layanan'];
                    $token = $row['token'];
                    $fasa = $row['fasa_baru'];
                    $tarif = $row['tarif'];
                    $laporan = $row['laporan'];
                    $tgl_mulai = $row['tgl_mulai'];
                    $id_laporan = $row['id_laporan'];
                }
            }
        } elseif ($jentra == "Perubahan Daya") {
            if ($status == "1") {
                ?>
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Tambah Laporan Progres Petugas Survey Perubahan Daya</u></h1>
                </div>
                <?php
                $id = $_GET['id'];
                $result = $mysqli->query("SELECT a.* , b.* , c.*, d.idpel, d.identitas, d.nama, d.alamat FROM tb_survey_lap_masuk a JOIN tb_mohon_pd b ON a.id_mohon_survey = b.id_mohon JOIN tb_perubahan_daya c ON c.id_mohon = b.id_mohon JOIN tb_pelanggan d ON b.id_pelanggan=d.idpel WHERE id_survey_lap = $id && jenis_transaksi = 'Perubahan Daya'") or die($mysqli->error);

                if ($result->num_rows) {
                    $row = $result->fetch_array();
                    $id_p = $row['id_survey_lap'];
                    $id_pen2 = $row['id_mohon'];
                    $no_registrasi = $row['no_registrasi'];
                    $identitas = $row['identitas'];
                    $nama = $row['nama'];
                    $alamat = $row['alamat'];
                    $dayalama = $row['daya_lama'];
                    $dayabaru = $row['daya_baru'];
                    $peruntukan = $row['peruntukan'];
                    $produk = $row['produk_layanan'];
                    $token = $row['token'];
                    $fasalama = $row['fasa_lama'];
                    $fasabaru = $row['fasa_baru'];
                    $tariflama = $row['tarif_lama'];
                    $tarifbaru = $row['tarif_baru'];
                }
            } else {
                ?>
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Edit Laporan Progres Sementara Petugas Survey Perubahan Daya</u></h1>
                </div>
                <?php
                $id = $_GET['id'];
                $result = $mysqli->query("SELECT a.* , b.* , c.*, d.idpel, d.identitas, d.nama, d.alamat, e.* FROM tb_survey_lap_masuk a JOIN tb_mohon_pd b ON a.id_mohon_survey = b.id_mohon JOIN tb_perubahan_daya c ON c.id_mohon = b.id_mohon JOIN tb_pelanggan d ON b.id_pelanggan=d.idpel JOIN tb_laporan_survey e ON e.id_mohon_survey = b.id_mohon WHERE a.id_survey_lap = $id") or die($mysqli->error);

                if ($result->num_rows) {
                    $row = $result->fetch_array();
                    $id_p = $row['id_survey_lap'];
                    $id_mohon = $row['id_mohon'];
                    $no_registrasi = $row['no_registrasi'];
                    $identitas = $row['identitas'];
                    $nama = $row['nama'];
                    $alamat = $row['alamat'];
                    $dayalama = $row['daya_lama'];
                    $dayabaru = $row['daya_baru'];
                    $peruntukan = $row['peruntukan'];
                    $produk = $row['produk_layanan'];
                    $token = $row['token'];
                    $fasalama = $row['fasa_lama'];
                    $fasabaru = $row['fasa_baru'];
                    $tariflama = $row['tarif_lama'];
                    $tarifbaru = $row['tarif_baru'];
                    $laporan = $row['laporan'];
                    $tgl_mulai = $row['tgl_mulai'];
                    $id_laporan = $row['id_laporan'];
                }
            }
        } elseif ($jentra == "Sambung Sementara") {
            if ($status == "1") {
                ?>
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Tambah Laporan Progres Petugas Survey Sambung Sementara</u></h1>
                </div>
                <?php
                $id = $_GET['id'];
                $result = $mysqli->query("SELECT a.* , b.* , c.*, d.idpel, d.identitas, d.nama, d.alamat FROM tb_survey_lap_masuk a JOIN tb_mohon_multiguna b ON a.id_mohon_survey = b.id_mohon JOIN tb_multiguna c ON c.id_mohon = b.id_mohon JOIN tb_pelanggan d ON b.id_pelanggan=d.idpel WHERE id_survey_lap = $id") or die($mysqli->error);

                if ($result->num_rows) {
                    $row = $result->fetch_array();
                    $id_p = $row['id_survey_lap'];
                    $id_pen3 = $row['id_mohon'];
                    $no_registrasi = $row['no_registrasi'];
                    $identitas = $row['identitas'];
                    $nama = $row['nama'];
                    $alamat = $row['alamat'];
                    $daya = $row['daya'];
                    $tglmulai = $row['tgl_mulai_pemakaian'];
                    $tglselesai = $row['tgl_selesai_pemakaian'];
                    $pemakaian = $row['pemakaian'];
                    $lamahari = $row['lamahari'];
                    $peruntukan = $row['peruntukan'];
                    $fasa = $row['fasa'];
                }
            } else {
                ?>
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Edit Laporan Progres Sementara Petugas Survey Sambung Sementara</u></h1>
                </div>
    <?php
                $id = $_GET['id'];
                $result = $mysqli->query("SELECT a.* , b.* , c.*, d.idpel, d.identitas, d.nama, d.alamat, e.*  FROM tb_survey_lap_masuk a JOIN tb_mohon_multiguna b ON a.id_mohon_survey = b.id_mohon JOIN tb_multiguna c ON c.id_mohon = b.id_mohon JOIN tb_pelanggan d ON b.id_pelanggan=d.idpel JOIN tb_laporan_survey e ON e.id_mohon_survey = b.id_mohon WHERE a.id_survey_lap = $id") or die($mysqli->error);

                if ($result->num_rows) {
                    $row = $result->fetch_array();
                    $id_p = $row['id_survey_lap'];
                    $id_mohon = $row['id_mohon'];
                    $no_registrasi = $row['no_registrasi'];
                    $identitas = $row['identitas'];
                    $nama = $row['nama'];
                    $alamat = $row['alamat'];
                    $daya = $row['daya'];
                    $tglmulai = $row['tgl_mulai_pemakaian'];
                    $tglselesai = $row['tgl_selesai_pemakaian'];
                    $pemakaian = $row['pemakaian'];
                    $lamahari = $row['lamahari'];
                    $peruntukan = $row['peruntukan'];
                    $fasa = $row['fasa'];
                    $laporan = $row['laporan'];
                    $tgl_mulai = $row['tgl_mulai'];
                    $id_laporan = $row['id_laporan'];
                }
            }
        }
    }
    ?>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <!-- TAG FORM DIHAPUS , APABILA ADA ERROR MAKA TAMBAHKAN TAG FORM DISINI -->

            <?php
            if ($jentra == "Pasang Baru") {
            ?>
                <div class="form-group">
                    <label for="">Nomor Registrasi</label>
                    <input type="text" class="form-control" value="<?php echo $no_registrasi ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="">Identitas KTP</label>
                    <input type="text" value="<?php echo $identitas ?>" class="form-control" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" value="<?php echo $nama ?>" class="form-control" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea class="form-control" cols="10" rows="3" required readonly><?php echo $alamat ?></textarea>
                </div>

                <?php
                if ($produk == "PASCABAYAR") {
                ?>
                    <div class="form-group">
                        <label for="">Produk Layanan</label>
                        <input type="text" value="<?php echo $produk ?>" class="form-control" required readonly>
                    </div>
                <?php
                } else {
                ?>
                    <div class="form-group">
                        <label for="">Produk Layanan</label>
                        <input type="text" value="<?php echo $produk ?>" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Token</label>
                        <input type="text" value="<?php echo $token ?>" class="form-control" required readonly>
                    </div>
                <?php
                }
                ?>

                <div class="form-group">
                    <label for="">Peruntukan</label>
                    <input type="text" value="<?php echo $peruntukan ?>" class="form-control" required readonly>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Daya</label>
                            <input type="text" value="<?php echo $daya ?>" class="form-control" required readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tarif</label>
                            <input type="text" value="<?php echo $tarif ?>" class="form-control" required readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Fasa</label>
                    <input type="text" value="<?php echo $fasa ?>" class="form-control" required readonly>
                </div>
            <?php
            } elseif ($jentra == "Perubahan Daya") {
            ?>
                <div class="form-group">
                    <label for="">Nomor Registrasi</label>
                    <input type="text" class="form-control" value="<?php echo $no_registrasi ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="">Identitas KTP</label>
                    <input type="text" value="<?php echo $identitas ?>" class="form-control" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" value="<?php echo $nama ?>" class="form-control" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea class="form-control" cols="10" rows="3" required readonly><?php echo $alamat ?></textarea>
                </div>

                <?php
                if ($produk == "PASCABAYAR") {
                ?>
                    <div class="form-group">
                        <label for="">Produk Layanan</label>
                        <input type="text" value="<?php echo $produk ?>" class="form-control" required readonly>
                    </div>
                <?php
                } else {
                ?>
                    <div class="form-group">
                        <label for="">Produk Layanan</label>
                        <input type="text" value="<?php echo $produk ?>" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Token</label>
                        <input type="text" value="<?php echo $token ?>" class="form-control" required readonly>
                    </div>
                <?php
                }
                ?>

                <div class="form-group">
                    <label for="">Peruntukan</label>
                    <input type="text" value="<?php echo $peruntukan ?>" class="form-control" required readonly>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Daya Lama</label>
                            <input type="text" value="<?php echo $dayalama ?>" class="form-control" required readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tarif Lama</label>
                            <input type="text" value="<?php echo $tariflama ?>" class="form-control" required readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Daya Baru</label>
                            <input type="text" value="<?php echo $dayabaru ?>" class="form-control" required readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tarif Baru</label>
                            <input type="text" value="<?php echo $tarifbaru ?>" class="form-control" required readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Fasa Lama</label>
                    <input type="text" value="<?php echo $fasalama ?>" class="form-control" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Fasa Baru</label>
                    <input type="text" value="<?php echo $fasabaru ?>" class="form-control" required readonly>
                </div>
            <?php
            } elseif ($jentra == "Sambung Sementara") {
            ?>
                <div class="form-group">
                    <label for="">Nomor Registrasi</label>
                    <input type="text" class="form-control" value="<?php echo $no_registrasi ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="">Identitas KTP</label>
                    <input type="text" value="<?php echo $identitas ?>" class="form-control" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" value="<?php echo $nama ?>" class="form-control" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea class="form-control" cols="10" rows="3" required readonly><?php echo $alamat ?></textarea>
                </div>

                <div class="form-group">
                    <label for="">Peruntukan</label>
                    <input type="text" value="<?php echo $peruntukan ?>" class="form-control" required readonly>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tanggal Mulai</label>
                            <input type="text" value="<?php echo date('d-M-Y', strtotime($tglmulai)) ?>" class="form-control" required readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tanggal Selesai</label>
                            <input type="text" value="<?php echo date('d-M-Y', strtotime($tglselesai)) ?>" class="form-control" required readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Lama Hari</label>
                    <input type="text" value="<?php echo $lamahari ?>" class="form-control" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Daya yang dibutuhkan</label>
                    <input type="text" value="<?php echo $daya ?>" class="form-control" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Fasa</label>
                    <input type="text" value="<?php echo $fasa ?>" class="form-control" required readonly>
                </div>
            <?php
            } else {
            ?>
                <h1>Terjadi suatu Kesalahan</h1>
            <?php
            }
            ?>

        </div>
        <!-- Form Utama end -->
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Input Progres</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <form action="header.php?page=progressurvey&status=<?php echo $status ?>&id=<?php echo $id ?>&jt=<?php echo $jentra ?>" method="post" name="form1">

                <?php
                if (isset($_GET['status'])) {
                    $ambilstatus = $_GET['status'];
                    if ($ambilstatus == "2") {
                ?>
                        <input type="hidden" name="id_lap" value="<?php echo $id_laporan; ?>">
                        <input type="hidden" name="id_mohon" value="<?php echo $id_mohon; ?>">

                        <div class="form-group">
                            <label for="">Status</label> <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="selesai" onclick="show1();" required>
                                <label class="form-check-label" id="exampleRadios1">
                                    Selesai
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="tolak" onclick="show3();">
                                <label class="form-check-label" id="exampleRadios2">
                                    Tolak
                                </label>
                            </div>
                        </div>

                        <div class="form-group" id="form_laporan">
                            <label for="">Laporan Progres</label>
                            <textarea name="laporan" id="kotak_laporan" placeholder="Masukkan Laporan Progres" class="form-control" cols="10" rows="3" required><?php echo $laporan ?></textarea>
                        </div>

                        <div class="form-group" style="display: none;" id="form_tolak">
                            <label for="">Alasan Penolakan</label>
                            <textarea name="alasan_tolak" id="kotak_tolak" placeholder="Masukkan Alasan Penolakan" class="form-control" cols="10" rows="3" required></textarea>
                        </div>

                        <div class="form-group" id="tgl_cek_a" style="display: none;">
                            <label for="">Tanggal Mulai Survey</label>
                            <input type="date" id="tgl_cek3" name="tgl_mulai2" class="form-control">
                        </div>

                        <div class="form-group row" id="tgl_cek" style="display: none;">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tanggal Mulai Survey</label>
                                    <input type="date" value="<?php echo $tgl_mulai ?>" id="tgl_cek2" name="tgl_mulai" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tanggal Selesai Survey</label>
                                    <input type="date" id="tgl_cek2" name="tgl_selesai" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="">Laporan Progres Sementara</label>
                            <textarea name="laporan" placeholder="Masukkan Laporan Progres" class="form-control" cols="10" rows="3" required><?php echo $laporan ?></textarea>
                        </div> -->

                        <!-- <div class="form-group row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tanggal Mulai Survey</label>
                                    <input type="date" value="<?php echo $tgl_mulai ?>" name="tgl_mulai" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tanggal Selesai Survey</label>
                                    <input type="date" name="tgl_selesai" class="form-control">
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row float-right">
                            <div class="col">
                                <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>

                                <button type="submit" class="btn btn-primary tesboot" name="save2"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    <?php
                    } elseif ($ambilstatus == "1") {
                    ?>
                        <input type="hidden" name="id_surveylap" value="<?php echo $id_p; ?>">

                        <?php
                        if ($jentra == "Pasang Baru") {
                        ?>
                            <input type="hidden" name="id_ms" value="<?php echo $id_pen1; ?>">
                        <?php
                        } elseif ($jentra == "Perubahan Daya") {
                        ?>
                            <input type="hidden" name="id_ms" value="<?php echo $id_pen2; ?>">
                        <?php
                        } elseif ($jentra == "Sambung Sementara") {
                        ?>
                            <input type="hidden" name="id_ms" value="<?php echo $id_pen3; ?>">
                        <?php
                        }
                        ?>

                        <div class="form-group">
                            <label for="">Status</label> <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="selesai" onclick="show1();" required>
                                <label class="form-check-label" id="exampleRadios1">
                                    Selesai
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="belum selesai" onclick="show2();">
                                <label class="form-check-label" id="exampleRadios2">
                                    Belum Selesai
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="tolak" onclick="show3();">
                                <label class="form-check-label" id="exampleRadios2">
                                    Tolak
                                </label>
                            </div>
                        </div>

                        <div class="form-group" id="form_laporan">
                            <label for="">Laporan Progres</label>
                            <textarea name="laporan" id="kotak_laporan" placeholder="Masukkan Laporan Progres" class="form-control" cols="10" rows="3" required></textarea>
                        </div>

                        <div class="form-group" style="display: none;" id="form_tolak">
                            <label for="">Alasan Penolakan</label>
                            <textarea name="alasan_tolak" id="kotak_tolak" placeholder="Masukkan Alasan Penolakan" class="form-control" cols="10" rows="3" required></textarea>
                        </div>

                        <div class="form-group" id="tgl_cek_a" style="display: none;">
                            <label for="">Tanggal Mulai Survey</label>
                            <input type="date" id="tgl_cek3" name="tgl_mulai2" class="form-control">
                        </div>

                        <div class="form-group row" id="tgl_cek" style="display: none;">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tanggal Mulai Survey</label>
                                    <input type="date" id="tgl_cek2" name="tgl_mulai" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tanggal Selesai Survey</label>
                                    <input type="date" id="tgl_cek2" name="tgl_selesai" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row float-right">
                            <div class="col">
                                <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>

                                <button type="submit" class="btn btn-primary tesboot" name="save"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </form>

        </div>
        <!-- Form Utama end -->
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include_once 'footer.php';
?>

<!-- PHP - Query Tombol Save dan SweetAlert -->
<?php
if (isset($_POST['save'])) {
    $id_surveylap = $_POST['id_surveylap'];
    $id_ms = $_POST['id_ms'];
    $laporan = $_POST['laporan'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_mulai2 = $_POST['tgl_mulai2'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $status = $_POST['status'];
    $alasantolak = $_POST['alasan_tolak'];

    if ($status == "selesai") {
        $statuskonversi = 3;
    } elseif ($status == "belum selesai") {
        $statuskonversi = 2;
    } elseif ($status == "tolak") {
        $statuskonversi = 4;
    }

    if ($status == "selesai") {
        $insert = "INSERT INTO tb_laporan_survey (id_survey_lap,id_mohon_survey, laporan,tgl_mulai, tgl_selesai, status) VALUES ('$id_surveylap','$id_ms','$laporan','$tgl_mulai','$tgl_selesai', '$statuskonversi')";
        $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
        // var_dump($insert);

        $jentra = $_GET['jt'];

        //tambahkan tag query dalam kurung
        if ($query && $jentra == "Pasang Baru") {
            $update = "UPDATE tb_mohon_pb SET status_survey='$statuskonversi' WHERE id_mohon = $id_ms";
        } elseif ($query && $jentra == "Perubahan Daya") {
            $update = "UPDATE tb_mohon_pd SET status_survey='$statuskonversi' WHERE id_mohon = $id_ms";
        } elseif ($query && $jentra == "Sambung Sementara") {
            $update = "UPDATE tb_mohon_multiguna SET status_survey='$statuskonversi' WHERE id_mohon = $id_ms";
        }

        $query2 = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
        // var_dump($update);
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Laporan yang sudah selesai!'
            }).then((result) => {
                window.location = "header.php?page=laporansurveyselesai";
            })
        </script>
    <?php
    } elseif ($status == "belum selesai") {
        $insert = "INSERT INTO tb_laporan_survey (id_survey_lap,id_mohon_survey, laporan,tgl_mulai, status) VALUES ('$id_surveylap','$id_ms','$laporan','$tgl_mulai2', '$statuskonversi')";
        $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
        // var_dump($insert);

        $jentra = $_GET['jt'];

        //tambahkan tag query dalam kurung
        if ($query && $jentra == "Pasang Baru") {
            $update = "UPDATE tb_mohon_pb SET status_survey='$statuskonversi' WHERE id_mohon = $id_ms";
        } elseif ($query && $jentra == "Perubahan Daya") {
            $update = "UPDATE tb_mohon_pd SET status_survey='$statuskonversi' WHERE id_mohon = $id_ms";
        } elseif ($query && $jentra == "Sambung Sementara") {
            $update = "UPDATE tb_mohon_multiguna SET status_survey='$statuskonversi' WHERE id_mohon = $id_ms";
        }

        $query2 = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
        // var_dump($update);
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Laporan yang masih dalam tahap progres!'
            }).then((result) => {
                window.location = "header.php?page=laporansurvey";
            })
        </script>
    <?php
    } elseif ($status == "tolak") {
        $insert = "INSERT INTO tb_laporan_survey (id_survey_lap,id_mohon_survey,tgl_mulai, tgl_selesai, status,alasan_penolakan) VALUES ('$id_surveylap','$id_ms','$tgl_mulai','$tgl_selesai', '$statuskonversi', '$alasantolak')";
        $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
        // var_dump($insert);

        $jentra = $_GET['jt'];

        //tambahkan tag query dalam kurung
        if ($query && $jentra == "Pasang Baru") {
            $update = "UPDATE tb_mohon_pb SET status_survey='$statuskonversi' WHERE id_mohon = $id_ms";
        } elseif ($query && $jentra == "Perubahan Daya") {
            $update = "UPDATE tb_mohon_pd SET status_survey='$statuskonversi' WHERE id_mohon = $id_ms";
        } elseif ($query && $jentra == "Sambung Sementara") {
            $update = "UPDATE tb_mohon_multiguna SET status_survey='$statuskonversi' WHERE id_mohon = $id_ms";
        }

        $query2 = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
        // var_dump($update);
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Laporan yang ditolak!'
            }).then((result) => {
                window.location = "header.php?page=laporansurvey";
            })
        </script>
    <?php
    }
} elseif (isset($_POST['save2'])) {
    $id_laporan = $_POST['id_lap'];
    $id_mohon = $_POST['id_mohon'];
    $laporan = $_POST['laporan'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $status = $_POST['status'];
    $alasantolak = $_POST['alasan_tolak'];

    if ($status == "selesai") {
        $statuskonversi = 3;
    } elseif ($status == "tolak") {
        $statuskonversi = 4;
    }

    if ($status == "selesai") {
        $update = "UPDATE tb_laporan_survey SET laporan='$laporan', tgl_selesai = '$tgl_selesai', status = '$statuskonversi' , alasan_penolakan = 'Diterima' WHERE id_laporan = $id_laporan";
        $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
        // var_dump($update);

        $jentra = $_GET['jt'];

        //tambahkan tag query dalam kurung
        if ($query && $jentra == "Pasang Baru") {
            $update2 = "UPDATE tb_mohon_pb SET status_survey='$statuskonversi' WHERE id_mohon = $id_mohon";
        } elseif ($query && $jentra == "Perubahan Daya") {
            $update2 = "UPDATE tb_mohon_pd SET status_survey='$statuskonversi' WHERE id_mohon = $id_mohon";
        } elseif ($query && $jentra == "Sambung Sementara") {
            $update2 = "UPDATE tb_mohon_multiguna SET status_survey='$statuskonversi' WHERE id_mohon = $id_mohon";
        }

        $query2 = mysqli_query($mysqli, $update2) or die(mysqli_error($mysqli));
        // var_dump($update2);
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Laporan yang sudah selesai!'
            }).then((result) => {
                window.location = "header.php?page=laporansurveyselesai";
            })
        </script>
    <?php
    } elseif ($status == "tolak") {
        $update = "UPDATE tb_laporan_survey SET laporan='Ditolak', tgl_selesai = '$tgl_selesai', status = '$statuskonversi', alasan_penolakan = '$alasantolak' WHERE id_laporan = $id_laporan";
        $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
        // var_dump($update);

        $jentra = $_GET['jt'];

        //tambahkan tag query dalam kurung
        if ($query && $jentra == "Pasang Baru") {
            $update2 = "UPDATE tb_mohon_pb SET status_survey='$statuskonversi' WHERE id_mohon = $id_mohon";
        } elseif ($query && $jentra == "Perubahan Daya") {
            $update2 = "UPDATE tb_mohon_pd SET status_survey='$statuskonversi' WHERE id_mohon = $id_mohon";
        } elseif ($query && $jentra == "Sambung Sementara") {
            $update2 = "UPDATE tb_mohon_multiguna SET status_survey='$statuskonversi' WHERE id_mohon = $id_mohon";
        }

        $query2 = mysqli_query($mysqli, $update2) or die(mysqli_error($mysqli));
        // var_dump($update2);
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Laporan yang ditolak!'
            }).then((result) => {
                window.location = "header.php?page=laporansurvey";
            })
        </script>
<?php
    }
}
?>

<?php  ?>
</body>

</html>