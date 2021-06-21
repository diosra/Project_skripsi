<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input User</title>

    <script type="text/javascript">
        $(function() {
            $("#posisi").change(function() {
                if ($(this).val() == "4") {
                    $("#t_check").show();
                } else {
                    $("#t_check").hide();
                }
            });
        });
    </script>

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Tambah User Baru</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data User</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <form action="header.php?page=inputuser" method="post" name="form1">

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" placeholder="Masukkan alamat" class="form-control" cols="10" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>Pria</option>
                        <option>Wanita</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email User" required>
                </div>

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                </div>

                <div class="form-group">
                    <label for="">Posisi</label>
                    <select name="level" id="posisi" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option value="1">Admin</option>
                        <option value="2">Pegawai</option>
                        <option value="3">Operator</option>
                        <option value="5">Petugas Survey</option>
                        <option value="4">Teknisi</option>
                    </select>
                </div>

                <div class="form-group" id="t_check" style="display: none;">
                    <label for="">Teknisi Check</label>
                    <select name="t_check" class="form-control">
                        <option value="" disabled selected>Pilih</option>s
                        <option value="1">Teknisi Pelayanan Penyambungan</option>
                        <option value="2">Teknisi Pelayanan Pengaduan</option>
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
include_once 'footer.php';
?>

<!-- PHP - Query Tombol Save dan SweetAlert -->
<?php
if (isset($_POST['save'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $t_check = $_POST['t_check'];

    $insert = "INSERT INTO tb_data_user (nama, alamat,jenis_kelamin, email, username, password, level, t_check) VALUES ('$nama', '$alamat', '$jenis_kelamin', '$email','$username', '$password', '$level', '$t_check')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($query) {
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Data User'
            }).then((result) => {
                window.location = "header.php?page=user";
            })
        </script>
<?php
    }
}
?>


</html>