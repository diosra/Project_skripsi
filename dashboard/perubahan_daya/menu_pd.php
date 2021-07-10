<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perubahan Daya</title>

    <?php
    $pageSkr = 'pd';
    include_once '../header.php';
    ?>

    <script src="process.js"></script> <!-- Load file process.js -->
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Permohonan Perubahan Daya</u></h1>
    </div>

    <!-- Card untuk Form -->

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <label for="">Cari ID Pelanggan</label>
                    <input type="text" id="id_pelanggan" name="id_pelanggan" class="form-control">
                    <button type="button" id="btn-search" class="btn btn-primary mt-2">Cari</button>
                    <a href="menu_pd.php" class="btn btn-warning mt-2">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <!-- Form Utama -->
        <div class="card-body">
            <form action="menu_pd.php" method="post" name="form1">

                <h3 class="mb-4"><u>Data Pemohon</u></h3>

                <!-- <div class="form-group">
                    <label for="">No Registrasi</label>
                    <input type="text" id="noregtampil" name="no_registrasi" class="form-control" required readonly="readonly">
                </div> -->

                <div class="form-group">
                    <label for="">Identitas (No KTP)</label> <br>
                    <input type="text" class="form-control" value="" id="ktp" required readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" readonly="readonly" required>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" cols="10" rows="3" required readonly="readonly"></textarea>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">No. HP</label>
                            <input type="number" name="nohp" id="nohp" class="form-control" value="" required readonly="readonly">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">No. Telp</label>
                            <input type="number" name="notelp" id="notelp" class="form-control" value="" required readonly="readonly">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="">Daya Lama</label>
                    <input type="text" name="daya_lama" id="daya" class="form-control" value="" required readonly="readonly">
                </div>

                <hr class="font-weight-bolder my-4">

                <h3 class="mb-4"><u>Daya Baru</u></h3>

                <div class="form-group">
                    <label for="">Produk Layanan</label>
                    <select name="produk" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>PASCABAYAR</option>
                        <option>PRABAYAR</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Daya</label>
                    <select name="daya_baru" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
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

<script type="text/javascript">
    <?php echo $jsArray ?>

    function changeValueNama(x) {
        document.getElementById('nama').value = prdName[x].nama;
    }
</script>

<!-- PHP - Query Tombol Save dan SweetAlert -->
<?php
if (isset($_POST['save'])) {
    $no_registrasi = $_POST['no_registrasi'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $dayalama = $_POST['daya_lama'];
    $filename = $_FILES['identitas']['name'];
    $produk_layanan = $_POST['produk'];
    $daya = $_POST['daya_baru'];
    $getId = mysqli_fetch_row(mysqli_query($mysqli, "SELECT max(id_mohon) from tb_mohon_pd"));

    if (!empty($_FILES['foto']['tmp_name'])) {
        $ext = strtolower(substr($_FILES['foto']['name'], -3));
        if ($ext == 'gif') {
            $ext = ".gif";
        } elseif ($ext == 'jpg') {
            $ext = ".jpg";
        } elseif ($ext == 'jpeg') {
            $ext = ".jpeg";
        } else {
            $ext = ".png";
        }
        // proses upload file ke folder gambar 
        move_uploaded_file($_FILES['foto']['tmp_name'], "../../gambar/" . basename(($getId[0] + 1) . $ext));
    }

    $insert = "INSERT INTO tb_mohon_pd (no_registrasi, nama,alamat, nohp, notelp, email, daya_lama, identitas, produk, daya_baru) VALUES ('$no_registrasi', '$nama', '$alamat', '$nohp','$notelp', '$email', '$dayalama', '" . ($getId[0] + 1) . $ext . "','$produk_layanan','$daya')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($query) {
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Sukses Menambahkan Data Mohon Perubahan Daya!'
            }).then((result) => {
                window.location = "menu_pd.php";
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal Menambahkan Data Mohon Perubahan Daya!'
            }).then((result) => {
                window.location = "menu_pd.php";
            })
        </script>
<?php
    }
}
?>


</html>