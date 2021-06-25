<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Progress</title>

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Tambah Laporan Progres Teknisi Pelayanan Pengaduan</u></h1>
    </div>

    <!-- PHP - Query Select untuk data ditampilkan di form -->
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $mysqli->query("SELECT a.* , b.* FROM tb_tekpen_lap_masuk a JOIN tb_pengaduan b ON a.id_pengaduan = b.id_pengaduan WHERE id_tekpenlap = $id") or die($mysqli->error);

        if ($result->num_rows) {
            $row = $result->fetch_array();
            $id_p = $row['id_tekpenlap'];
            $id_pen = $row['id_pengaduan'];
            $no_laporan = $row['no_laporan'];
            $identitas = $row['identitas'];
            $nama = $row['nama'];
            $alamat = $row['alamat'];
            $deskripsi = $row['deskripsi'];
        }
    }
    ?>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pelapor</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <form name="form1">
                <div class="form-group">
                    <label for="">Nomor Laporan</label>
                    <input type="text" name="no_laporan" class="form-control" value="<?php echo $no_laporan ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="">Identitas KTP</label>
                    <input type="text" name="identitas" value="<?php echo $identitas ?>" class="form-control" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Nama Pelanggan</label>
                    <input type="text" name="nama" value="<?php echo $nama ?>" class="form-control" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" class="form-control" cols="10" rows="3" required readonly><?php echo $alamat ?></textarea>
                </div>

                <div class="form-group">
                    <label for="">Deskripsi Laporan Pelanggan</label>
                    <textarea name="deskripsi" class="form-control" cols="10" rows="3" required readonly><?php echo $deskripsi ?></textarea>
                </div>
            </form>


        </div>
        <!-- Form Utama end -->
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Input Progres</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <form action="header.php?page=progres" method="post" name="form1">

                <input type="hidden" name="id_tekpenlap" value="<?php echo $id_p; ?>">
                <input type="hidden" name="id_pen" value="<?php echo $id_pen; ?>">

                <div class="form-group">
                    <label for="">Laporan Progres</label>
                    <textarea name="laporan" placeholder="Masukkan Laporan Progres" class="form-control" cols="10" rows="3" required></textarea>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tanggal Selesai</label>
                            <input type="date" name="tgl_selesai" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check form-group">
                        <label for="">Status</label> <br>
                        <input class="form-check-input ml-2" type="checkbox" id="gridCheck" name="status" value="selesai">
                        <label class="form-check-label ml-4" for="gridCheck">
                            Selesai
                        </label>
                    </div>
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
    $id_tekpenlap = $_POST['id_tekpenlap'];
    $id_pen = $_POST['id_pen'];
    $laporan = $_POST['laporan'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $status = $_POST['status'];

    $insert = "INSERT INTO tb_laporan_tekpen (id_tekpenlap, laporan,tgl_mulai, tgl_selesai, status) VALUES ('$id_tekpenlap','$laporan','$tgl_mulai','$tgl_selesai', '$status')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($query && $status == "selesai") {
        $update = "UPDATE tb_pengaduan SET status='$status' WHERE id_pengaduan = $id_pen";
        $query2 = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Laporan!'
            }).then((result) => {
                window.location = "header.php?page=laporanpen";
            })
        </script>
<?php
    }
}
?>
</body>

</html>