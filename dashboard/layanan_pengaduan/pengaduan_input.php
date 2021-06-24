<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Pasang Baru</title>
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

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Layanan Pengaduan</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data Pengaduan</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">

            <form action="pengaduan_input.php" method="post" name="form1">

                <input type="text" name="no_registrasi" class="form-control" value="<?php echo $noLaporan ?>" hidden readonly>

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
                    <label for="">No KTP</label>
                    <input type="text" id="nama" name="identitas" class="form-control" required required>
                </div>

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" required required>
                </div>

                <div class="form-group">
                    <label for="">No Handphone</label>
                    <input type="number" id="nohp" name="nohp" class="form-control" required required>
                </div>

                <div class="form-group">
                    <label for="">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" id="alamat" cols="10" rows="3" required></textarea>
                </div>

                <div class="row form-group">
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

<!-- PHP - Query Tombol Save dan SweetAlert -->
<?php
if (isset($_POST['save'])) {
    $gangguan = $_POST['gangguan'];
    $identitas = $_POST['identitas'];
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $kabupaten = $_POST['kabupaten'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_masuk_laporan = $_POST['tgl_masuk_laporan'];

    $insert = "INSERT INTO tb_pengaduan (gangguan,no_laporan,identitas, nama,nohp, alamat, kabupaten,kecamatan,kelurahan, deskripsi, tgl_masuk_laporan) VALUES ('$gangguan','$noLaporan','$identitas', '$nama', '$nohp', '$alamat','$kabupaten', '$kecamatan', '$kelurahan', '$deskripsi', '$tgl_masuk_laporan')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($query) {
        $insert2 = "INSERT INTO tb_tekpen_lap_masuk (id_pengaduan,op_acc) values ('" . mysqli_insert_id($mysqli) . "', '0')";
        $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Data Laporan anda berhasil terkirim! anda akan segera dihubungi oleh operator kami dengan nomor handphone yang sudah anda masukkan'
            }).then((result) => {
                window.location = "pengaduan_input.php";
            })
        </script>
<?php
    }
}
?>


</html>