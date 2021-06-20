<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Pasang Baru</title>

    <?php
    include_once 'header.php';
    ?>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Ubah Data Pasang Baru</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Pelanggan Pasang Baru</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <!-- PHP - Query Tombol Ubah dan SweetAlert -->
            <?php
            if (isset($_POST['ubah'])) {
                $id = $_POST['id_pelanggan'];
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $no_telpon = $_POST['no_telpon'];

                $update = "UPDATE tb_pelanggan SET  
                                nama='$nama', alamat='$alamat', no_telp='$no_telpon' 
                                WHERE id_pelanggan=$id";
                $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));

                if ($query) {
            ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses.',
                            text: 'Sukses Mengubah Data Pelanggan'
                        }).then((result) => {
                            window.location = "pelanggan.php";
                        })
                    </script>
            <?php
                }
            }
            ?>

            <!-- PHP - Query Select untuk data ditampilkan di form -->
            <?php
            $no_registrasi = '';
            $tgl_mohon = '';
            $nama = '';
            $alamat = '';
            $no_telpon = '';
            $asalmohon = '';
            $nama = '';
            if (isset($_GET['edit'])) {
                $id = $_GET['edit'];
                $result =
                    $mysqli->query("SELECT * FROM tb_pelanggan WHERE id_pelanggan=$id") or die($mysqli->error);

                if ($result->num_rows) {
                    $row = $result->fetch_array();
                    $no_registrasi = $row['no_registrasi'];
                    $nama = $row['nama'];
                    $alamat = $row['alamat'];
                    $no_telpon = $row['no_telp'];
                }
            }
            ?>

            <form action="pel_edit.php?edit=<?php echo $row['id_pelanggan'] ?>" method="post" name="form1">
                <input type="hidden" name="id_pelanggan" value="<?php echo $id; ?>">

                <div class="form-group">
                    <label for="">Nomor Registrasi Pelanggan</label>
                    <input type="text" name="no_registrasi" class="form-control" placeholder="Masukkan Nomor Registrasi" value="<?php echo $no_registrasi; ?>" required disabled>
                </div>
                <div class="form-group">
                    <label for="">Nama Pelanggan</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Pelanggan" value="<?php echo $nama; ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" placeholder="Masukkan alamat pelanggan" class="form-control" cols="10" rows="3" value="<?php echo $alamat; ?>" required><?php echo $alamat; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="">Nomor Telpon Pelanggan</label>
                    <input type="text" name="no_telpon" class="form-control" placeholder="Masukkan Nomor Telpon pelanggan" value="<?php echo $no_telpon; ?>" required>
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