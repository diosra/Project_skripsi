<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Data Pelanggan</title>

    <?php
    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_registrasi) as RegTerbesar FROM tb_pelanggan");
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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Tambah Data Pelanggan</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data Pelanggan</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <form action="header.php?page=pelinput" method="post" name="form1">

                <div class="form-group">
                    <label for="">Nomor Registrasi</label>
                    <input type="text" name="no_registrasi" class="form-control" value="<?php echo $noRegistrasi ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama Pelanggan</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Pelanggan" required>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" placeholder="Masukkan alamat pelanggan" class="form-control" cols="10" rows="3" required></textarea>
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
                            <label for="">No. Telpon</label>
                            <input type="text" name="no_telpon" class="form-control" placeholder="Masukkan Nomor Telpon pelanggan">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                </div>

                <!-- <div class="form-group">
                    <label for="">No. KTP</label>
                    <input type="text" name="identitas" class="form-control" placeholder="Masukkan Nomor KTP" required>
                </div> -->

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
include_once 'footer.php';
?>

<!-- PHP - Query Tombol Save dan SweetAlert -->
<?php
if (isset($_POST['save'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];

    $insert = "INSERT INTO tb_pelanggan (no_registrasi, nama, alamat, nohp, no_telp,email) VALUES ('$noRegistrasi','$nama', '$alamat','$nohp','$no_telpon', '$email')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($query) {
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Data Pelanggan'
            }).then((result) => {
                window.location = "header.php?page=pelanggan";
            })
        </script>
<?php
    }
}
?>
</body>

</html>