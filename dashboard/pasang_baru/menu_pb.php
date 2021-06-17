<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pasang Baru</title>

    <?php
    $pageSkr = 'pb';
    include_once '../header.php';

    $queryambil = mysqli_query($mysqli, "SELECT max(no_registrasi) as RegTerbesar FROM tb_tes_input_pb");
    $dataambil = mysqli_fetch_array($queryambil);
    $noRegistrasi = @$dataambil['RegTerbesar'];

    $urutan = (int) substr($noRegistrasi, 3, 3);
    $urutan++;

    $huruf = "NRG";
    $noRegistrasi = $huruf . sprintf("%03s", $urutan);
    ?>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Permohonan Pasang Baru</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <!-- Form Utama -->
        <div class="card-body">
            <form action="menu_pb.php" method="post" name="form1">

                <h3 class="mb-4"><u>Data Pemohon</u></h3>

                <div class="form-group">
                    <label for="">No Registrasi</label>
                    <input type="text" name="no_registrasi" value="<?php echo $noRegistrasi ?>" class="form-control" disabled readonly>
                </div>

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" required>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" placeholder="Masukkan alamat pelanggan" class="form-control" cols="10" rows="3" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">No. HP</label>
                            <input type="number" name="nohp" class="form-control" placeholder="Masukkan No Handphone" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">No. Telp</label>
                            <input type="number" name="notelp" placeholder="Masukkan No Telpon" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                </div>

                <div class="form-group">
                    <label for="">Identitas (KTP)</label>
                    <input type="text" name="identitas" class="form-control" placeholder="Masukkan Nomor KTP" required>
                </div>

                <hr class="font-weight-bolder my-4">

                <h3 class="mb-4"><u>Tarif / Daya Baru</u></h3>

                <div class="form-group">
                    <label for="">Produk Layanan</label>
                    <select name="produk_layanan" class="form-control" required>
                        <option disabled selected>Pilih</option>
                        <option>PASCABAYAR</option>
                        <option>PRABAYAR</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Daya</label>
                    <select name="daya" class="form-control" required>
                        <option disabled selected>Pilih</option>
                        <option>450</option>
                        <option>900</option>
                        <option>1300</option>
                        <option>2200</option>
                        <option>3500</option>
                        <option>4400</option>
                        <option>5500</option>
                        <option>6600</option>
                        <option>7700</option>
                    </select>
                </div>

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
    $no_registrasi = $_POST['no_registrasi'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $identitas = $_POST['identitas'];
    $produk_layanan = $_POST['produk_layanan'];
    $daya = $_POST['daya'];

    $insert = "INSERT INTO tb_tes_input_pb (no_registrasi, nama,alamat, nohp, notelp, email,identitas,produk_layanan,daya) VALUES ('$noRegistrasi', '$nama', '$alamat', '$nohp','$notelp', '$email','$identitas','$produk_layanan','$daya')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($query) {
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Sukses Menambahkan Data Mohon Pasang Baru!'
            }).then((result) => {
                window.location = "menu_pb.php";
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal Menambahkan Data Mohon Pasang Baru!'
            }).then((result) => {
                window.location = "menu_pb.php";
            })
        </script>
<?php
    }
}
?>


</html>