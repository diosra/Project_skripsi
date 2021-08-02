<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pelayanan Pengaduan</title>
    <?php
    include_once '../header.php';
    ?>
    <script src="../process.js"></script> <!-- Load file process.js -->

    <?php
    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_laporan) as LapTerbesar FROM tb_pengaduan");
    $dataambil = mysqli_fetch_array($queryambil);
    $noLaporan = @$dataambil['LapTerbesar'];

    $urutan = (int) substr($noLaporan, 8, 8);
    $urutan++;

    $huruf = "NLP";
    $noLaporan = $huruf . sprintf("%08s", $urutan);

    ?>


    <script src="process.js"></script> <!-- Load file process.js -->
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Layanan Pengaduan</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <label for="">Cari ID Pelanggan</label>
                    <input type="text" id="id_pelanggan" name="id_pelanggan" class="form-control">
                    <button type="button" id="btn-search" class="btn btn-primary mt-2">Cari</button>
                    <!-- <a href="menu_mg.php" class="btn btn-warning mt-2">Reset</a> -->
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data Pengaduan</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">

            <form action="send.php" method="post" name="form1">

                <input type="text" name="no_registrasi" class="form-control" value="<?php echo $noLaporan ?>" hidden readonly>

                <input type="hidden" id="idpel" name="idpel" class="form-control" required readonly>

                <div class="form-group">
                    <label for="">No KTP</label>
                    <input type="text" id="ktp" name="identitas" class="form-control" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" id="email" name="email" class="form-control" required readonly>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">No Handphone</label>
                            <input type="number" id="nohp" name="nohp" class="form-control" required readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">No Telpon</label>
                            <input type="number" id="notelpon" name="no_telp" class="form-control" required readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" id="alamat" cols="10" rows="3" required readonly></textarea>
                </div>

                <!-- <div class="row form-group">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Kabupaten/Kota</label>
                            <input type="text" name="kabupaten" class="form-control" required required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" required required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Desa/Kelurahan</label>
                            <input type="text" name="kelurahan" class="form-control" required required>
                        </div>
                    </div>
                </div> -->

                <div class="form-group">
                    <label for="">Jenis Gangguan</label>
                    <select name="gangguan" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>Tetangga Turut Padam</option>
                        <option>Tetangga Tidak Turut Padam</option>
                        <option>Tidak Tahu Tetangga Padam atau Tidak</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Deskripsi Laporan</label>
                    <textarea name="deskripsi" class="form-control" cols="10" rows="3" required></textarea>
                </div>

                <input type="hidden" name="tgl_masuk_laporan" value="<?php echo date("Y-m-d"); ?>">

                <div class="form-group row float-right">
                    <div class="col">
                        <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>

                        <button type="submit" class="btn btn-primary tesboot" name="save"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Form Utama end -->
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include_once '../footer.php';
?>

</html>