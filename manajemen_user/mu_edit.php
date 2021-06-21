<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit User</title>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Ubah Data User</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data User</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <!-- PHP - Query Tombol Ubah dan SweetAlert -->
            <?php
            if (isset($_POST['ubah'])) {
                $id = $_POST['id'];
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $posisi = $_POST['posisi'];
                $t_check = $_POST['t_check'];

                $update = "UPDATE tb_data_user SET nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', email='$email', username='$username', password='$password', level='$posisi', t_check='$t_check' WHERE id=$id";
                $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));

                if ($query) {
            ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses.',
                            text: 'Sukses Mengubah Data User'
                        }).then((result) => {
                            window.location = "header.php?page=user";
                        })
                    </script>
            <?php
                }
            }
            ?>

            <!-- PHP - Query Select untuk data ditampilkan di form -->
            <?php
            $nama = '';
            $alamat = '';
            $jenis_kelamin = '';
            $email = '';
            $username = '';
            $password = '';
            $posisi = '';
            $t_check = '';
            if (isset($_GET['edit'])) {
                $id = $_GET['edit'];
                $result = $mysqli->query("SELECT * FROM tb_data_user WHERE id=$id") or die($mysqli->error);

                if ($result->num_rows) {
                    $row = $result->fetch_array();
                    $nama = $row['nama'];
                    $alamat = $row['alamat'];
                    $jenis_kelamin = $row['jenis_kelamin'];
                    $email = $row['email'];
                    $username = $row['username'];
                    $password = $row['password'];
                    $posisi = $row['level'];
                    $t_check = $row['t_check'];
                }
            }
            ?>

            <form action="header.php?page=edituser&edit=<?php echo $row['id'] ?>" method="post" name="form1">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $nama ?>">
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" placeholder="Masukkan alamat" class="form-control" cols="10" rows="3"><?php echo $alamat ?></textarea>
                </div>

                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option value="<?php echo $jenis_kelamin; ?>" disabled>Pilihan Sebelum nya : <?php echo $jenis_kelamin ?></option>
                        <option>Pria</option>
                        <option>Wanita</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $email ?>" placeholder="Masukkan Email" required>
                </div>

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username ?>" placeholder="Masukkan username" required>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password" class="form-control" value="<?php echo $password ?>" placeholder="Masukkan Password" required>
                </div>

                <div class="form-group">
                    <label for="">Posisi</label>
                    <select name="posisi" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option value="<?php echo $posisi; ?>" disabled>Pilihan Sebelum nya : <?php echo $posisi ?></option>
                        <option value="1">Admin</option>
                        <option value="2">Pegawai</option>
                        <option value="3">Operator</option>
                        <option value="5">Petugas Survey</option>
                        <option value="4">Teknisi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Teknisi Check</label>
                    <select name="t_check" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option value="<?php echo $t_check; ?>" disabled>Pilihan Sebelum nya : <?php echo $t_check ?></option>
                        <option value="0">Bukan Teknisi</option>
                        <option value="1">Teknisi Pelayanan Penyambungan</option>
                        <option value="2">Teknisi Pelayanan Pengaduan</option>
                    </select>
                </div>

                <div class="form-group row float-right">
                    <div class="col">
                        <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>
                        <button type="submit" class="btn btn-primary" name="ubah"><i class="fas fa-save"></i> Ubah</button>
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

</html>