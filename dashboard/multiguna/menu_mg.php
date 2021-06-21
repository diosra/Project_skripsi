<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Multiguna / Penyambungan Sementara</title>

    <?php
    $pageSkr = 'mg';
    include_once '../header.php';
    ?>

    <script src="process.js"></script> <!-- Load file process.js -->
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Permohonan Multiguna / Sambung Sementara</u></h1>
    </div>

    <!-- Card untuk Form -->

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <label for="">Cari ID Pelanggan</label>
                    <input type="text" id="id_pelanggan" name="id_pelanggan" class="form-control">
                    <button type="button" id="btn-search" class="btn btn-primary mt-2">Cari</button>
                    <a href="menu_mg.php" class="btn btn-warning mt-2">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <!-- Form Utama -->
        <div class="card-body">
            <form action="menu_mg.php" method="post" name="form1">

                <h3 class="mb-4"><u>Data Pemohon</u></h3>

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" required readonly="readonly" required>
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
                    <label for="">Upload Foto / Scan KTP</label> <br>
                    <input type="file" accept="image/*" name="foto" required>
                </div>

                <hr class="font-weight-bolder my-4">

                <h3 class="mb-4"><u>Data Sambung Sementara</u></h3>

                <div class="form-group">
                    <label for="">Daya yang dibutuhkan</label>
                    <select name="daya" class="form-control" required>
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

                <div class="form-group row">
                    <div class="col">
                        <label for="">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tgl_mulai">
                    </div>
                    <div class="col">
                        <label for="">Tanggal Selesai</label>
                        <input type="date" class="form-control" name="tgl_selesai">
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Pemakaian</label>
                    <select name="pemakaian" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>Setengah Hari (12 Jam)</option>
                        <option>Sehari (24 Jam)</option>
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
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $filename = $_FILES['identitas']['name'];
    $daya = $_POST['daya'];
    $tglmulai = $_POST['tgl_mulai'];
    $tglselesai = $_POST['tgl_selesai'];
    $pemakaian = $_POST['pemakaian'];
    $getId = mysqli_fetch_row(mysqli_query($mysqli, "SELECT max(id_mohon) from tb_mohon_multiguna"));

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

    $insert = "INSERT INTO tb_mohon_multiguna (nama, alamat,nohp, notelp, email, identitas, daya, tgl_mulai, tgl_selesai, pemakaian) VALUES ('$nama', '$alamat', '$nohp', '$notelp','$email', '" . ($getId[0] + 1) . $ext . "', '$daya', '$tglmulai', '$tglselesai', '$pemakaian')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($query) {
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Sukses Menambahkan Data Mohon Multiguna / Penyambungan Sementara!'
            }).then((result) => {
                window.location = "menu_mg.php";
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal Menambahkan Data Mohon Multiguna / Penyambungan Sementara!'
            }).then((result) => {
                window.location = "menu_mg.php";
            })
        </script>
<?php
    }
}

?>


</html>