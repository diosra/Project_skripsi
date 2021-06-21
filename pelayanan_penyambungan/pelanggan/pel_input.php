<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Data Pelanggan</title>

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
            <form action="pel_input.php" method="post" name="form1">

                <div class="form-group">
                    <label for="">Nomor Registrasi Pelanggan</label>
                    <input type="text" name="no_registrasi" class="form-control" placeholder="Masukkan Nomor Registrasi" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Pelanggan</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Pelanggan" required>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" placeholder="Masukkan alamat pelanggan" class="form-control" cols="10" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="">Nomor Telpon Pelanggan</label>
                    <input type="text" name="no_telpon" class="form-control" placeholder="Masukkan Nomor Telpon pelanggan" required>
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
include_once 'footer.php';
?>

<!-- PHP - Query Tombol Save dan SweetAlert -->
<?php
if (isset($_POST['save'])) {
    $no_registrasi = $_POST['no_registrasi'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telpon = $_POST['no_telpon'];

    $insert = "INSERT INTO tb_pelanggan (no_registrasi, nama, alamat, no_telp) 
        VALUES ('$no_registrasi','$nama', '$alamat','$no_telpon')";
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