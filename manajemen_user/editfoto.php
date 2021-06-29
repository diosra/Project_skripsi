<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Upload Foto</title>

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- PHP - Query Select untuk data ditampilkan di form -->
    <?php
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $result = $mysqli->query("SELECT * FROM tb_data_user WHERE id=$id") or die($mysqli->error);
    }
    ?>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Upload Foto</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <form action="header.php?page=foto" method="post" name="form1" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Upload Photo</label> <br>
                    <input type="file" name="foto" accept="image/*" required>
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

    $getId = mysqli_fetch_row(mysqli_query($mysqli, "SELECT max(id) from tb_data_user"));

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
        move_uploaded_file($_FILES['foto']['tmp_name'], "gambar/" . basename(($getId[0] + 1) . $ext));
    }

    $insert = "INSERT INTO tb_data_user (nama, tgl_lahir, alamat,jenis_kelamin, email, username, password, level, t_check, foto) VALUES ('$nama','$tgl_lahir' ,'$alamat', '$jenis_kelamin', '$email','$username', '$password', '$level', '$t_check', '" . ($getId[0] + 1) . $ext . "')";

    "UPDATE tb_data_user SET foto='" . ($getId[0] + 1) . $ext . "' WHERE id = $id";

    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($query) {
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Foto!'
            }).then((result) => {
                x
                window.location = "header.php?page=user";
            })
        </script>
<?php
    }
}
?>


</html>