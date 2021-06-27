<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pilih Teknisi</title>

    <script src="pelayanan_pengaduan/process.js"></script> <!-- Load file process.js -->

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Pilih Teknisi</u></h1>
    </div>

    <!-- PHP - Query Tombol Save dan SweetAlert -->
    <?php
    if (isset($_POST['save'])) {
        $id = $_POST['id_pengaduan'];
        $nama = $_POST['nama'];
        $id_teknisi = $_POST['id_teknisi'];

        $insert = "UPDATE tb_pengaduan SET teknisi='$nama', status='Dalam Proses' WHERE id_pengaduan = $id";
        $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

        if ($query) {
            $update = "UPDATE tb_tekpen_lap_masuk SET id_teknisi='$id_teknisi', op_acc='1' WHERE id_pengaduan = $id";
            $query2 = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
    ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Teknisi'
                }).then((result) => {
                    window.location = "header.php?page=pengaduanproses";
                })
            </script>
    <?php
        }
    }
    ?>

    <!-- PHP - Query Select untuk data ditampilkan di form -->
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $mysqli->query("SELECT * FROM tb_pengaduan WHERE id_pengaduan=$id") or die($mysqli->error);

        if ($result->num_rows) {
            $row = $result->fetch_array();
        }
    }
    ?>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <!-- Form Utama -->
        <div class="card-body">
            <form action="header.php?page=pengtambah&id=<?php echo $row['id_pengaduan'] ?>" method="post" name="form1">
                <input type="hidden" name="id_pengaduan" value="<?php echo $id; ?>">

                <div class="form-group">
                    <label for="">Cari Data Petugas Teknisi Pelayanan Pengaduan</label>
                    <input type="text" id="tekpen" class="form-control" required>
                    <button type="button" id="btn-search" class="btn btn-primary mt-2">Cari</button>
                </div>

                <input type="hidden" name="id_teknisi" id="id_teknisi">

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" required readonly>
                </div>

                <div class="form-group row float-right">
                    <div class="col">
                        <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>

                        <button type="submit" class="btn btn-primary" name="save"><i class="fas fa-save"></i> Simpan</button>
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