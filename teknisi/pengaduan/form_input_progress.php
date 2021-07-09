<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Progress</title>

    <script type="text/javascript">
        function show1() {
            document.getElementById('tgl_cek').style.display = 'block';
            document.getElementById("tgl_cek2").required = true;
        }
    </script>
    <script type="text/javascript">
        function show2() {
            document.getElementById('tgl_cek').style.display = 'none';
            document.getElementById('tgl_cek_a').style.display = 'block';
            document.getElementById("tgl_cek2").required = false;
            document.getElementById("tgl_cek3").required = true;
        }
    </script>



</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Tambah Laporan Progres Teknisi Pelayanan Pengaduan</u></h1>
    </div>

    <!-- PHP - Query Select untuk data ditampilkan di form -->
    <?php
    if (isset($_GET['id']) && isset($_GET['status'])) {
        $id = $_GET['id'];
        $status = $_GET['status'];

        if ($status == "Dalam Proses") {
            $result = $mysqli->query("SELECT a.* , b.*  FROM tb_tekpen_lap_masuk a JOIN tb_pengaduan b ON a.id_pengaduan = b.id_pengaduan WHERE id_tekpenlap = $id") or die($mysqli->error);

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
        } elseif ($status == "belum selesai") {
            $result = $mysqli->query("SELECT a.* , b.* , c.* FROM tb_tekpen_lap_masuk a JOIN tb_pengaduan b ON a.id_pengaduan = b.id_pengaduan JOIN tb_laporan_tekpen c ON a.id_pengaduan = c.id_pengaduan WHERE a.id_tekpenlap = $id") or die($mysqli->error);

            if ($result->num_rows) {
                $row = $result->fetch_array();
                $id_p = $row['id_tekpenlap'];
                $id_pen = $row['id_pengaduan'];
                $no_laporan = $row['no_laporan'];
                $identitas = $row['identitas'];
                $nama = $row['nama'];
                $alamat = $row['alamat'];
                $deskripsi = $row['deskripsi'];
                $id_laporan = $row['id_laporan'];
                $laporan = $row['laporan'];
                $tgl_mulai = $row['tgl_mulai'];
            }
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
            <!-- TAG FORM DIHAPUS , APABILA ADA ERROR MAKA TAMBAHKAN TAG FORM DISINI -->
            <div class="form-group">
                <label for="">Nomor Laporan</label>
                <input type="text" class="form-control" value="<?php echo $no_laporan ?>" readonly>
            </div>

            <div class="form-group">
                <label for="">Identitas KTP</label>
                <input type="text" value="<?php echo $identitas ?>" class="form-control" required readonly>
            </div>

            <div class="form-group">
                <label for="">Nama Pelanggan</label>
                <input type="text" value="<?php echo $nama ?>" class="form-control" required readonly>
            </div>

            <div class="form-group">
                <label for="">Alamat</label>
                <textarea class="form-control" cols="10" rows="3" required readonly><?php echo $alamat ?></textarea>
            </div>

            <div class="form-group">
                <label for="">Deskripsi Laporan Pelanggan</label>
                <textarea class="form-control" cols="10" rows="3" required readonly><?php echo $deskripsi ?></textarea>
            </div>
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

                <?php
                if (isset($_GET['status'])) {
                    $ambilstatus = $_GET['status'];
                    if ($ambilstatus == "belum selesai") {
                ?>
                        <input type="hidden" name="id_pen" value="<?php echo $id_pen; ?>">
                        <input type="hidden" name="id_lap" value="<?php echo $id_laporan; ?>">

                        <div class="form-group">
                            <label for="">Laporan Progres</label>
                            <textarea name="laporan" placeholder="Masukkan Laporan Progres" class="form-control" cols="10" rows="3" required><?php echo $laporan ?></textarea>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tanggal Mulai Perbaikan</label>
                                    <input type="date" value="<?php echo $tgl_mulai ?>" name="tgl_mulai" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tanggal Selesai Perbaikan</label>
                                    <input type="date" name="tgl_selesai" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Status</label> <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="selesai" required>
                                <label class="form-check-label" id="exampleRadios1">
                                    Selesai
                                </label>
                            </div>
                        </div>

                        <div class="form-group row float-right">
                            <div class="col">
                                <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>

                                <button type="submit" class="btn btn-primary tesboot" name="save2"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    <?php
                    } elseif ($ambilstatus == "Dalam Proses") {
                    ?>
                        <input type="hidden" name="id_tekpenlap" value="<?php echo $id_p; ?>">
                        <input type="hidden" name="id_pen" value="<?php echo $id_pen; ?>">

                        <div class="form-group">
                            <label for="">Laporan Progres</label>
                            <textarea name="laporan" placeholder="Masukkan Laporan Progres" class="form-control" cols="10" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Status</label> <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="selesai" onclick="show1();" required>
                                <label class="form-check-label" id="exampleRadios1">
                                    Selesai
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="belum selesai" onclick="show2();">
                                <label class="form-check-label" id="exampleRadios2">
                                    Belum Selesai
                                </label>
                            </div>
                        </div>

                        <div class="form-group" id="tgl_cek_a" style="display: none;">
                            <label for="">Tanggal Mulai Perbaikan</label>
                            <input type="date" id="tgl_cek3" name="tgl_mulai2" class="form-control">
                        </div>

                        <div class="form-group row" id="tgl_cek" style="display: none;">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tanggal Mulai Perbaikan</label>
                                    <input type="date" id="tgl_cek2" name="tgl_mulai" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tanggal Selesai Perbaikan</label>
                                    <input type="date" id="tgl_cek2" name="tgl_selesai" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row float-right">
                            <div class="col">
                                <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>

                                <button type="submit" class="btn btn-primary tesboot" name="save"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
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
    $tgl_mulai2 = $_POST['tgl_mulai2'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $status = $_POST['status'];

    if ($status == "selesai") {
        $insert = "INSERT INTO tb_laporan_tekpen (id_tekpenlap,id_pengaduan, laporan,tgl_mulai, tgl_selesai, status) VALUES ('$id_tekpenlap','$id_pen','$laporan','$tgl_mulai','$tgl_selesai', '$status')";
        $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
        if ($query) {
            $update = "UPDATE tb_pengaduan SET status='$status' WHERE id_pengaduan = $id_pen";
            $query2 = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
        }
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Laporan yang sudah selesai!'
            }).then((result) => {
                window.location = "header.php?page=laporanpen";
            })
        </script>
    <?php
    } elseif ($status == "belum selesai") {
        $insert = "INSERT INTO tb_laporan_tekpen (id_tekpenlap,id_pengaduan, laporan,tgl_mulai, status) VALUES ('$id_tekpenlap','$id_pen','$laporan','$tgl_mulai2', '$status')";
        $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
        if ($query) {
            $update = "UPDATE tb_pengaduan SET status='$status' WHERE id_pengaduan = $id_pen";
            $query2 = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
        }
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Laporan yang masih dalam tahap progres!'
            }).then((result) => {
                window.location = "header.php?page=laporanpen";
            })
        </script>
    <?php
    }
} elseif (isset($_POST['save2'])) {
    $id_laporan = $_POST['id_lap'];
    $id_pen = $_POST['id_pen'];
    $laporan = $_POST['laporan'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $status = $_POST['status'];

    $update = "UPDATE tb_laporan_tekpen SET laporan = '$laporan', tgl_mulai='$tgl_mulai', tgl_selesai='$tgl_selesai', status='$status' WHERE id_laporan = $id_laporan";
    $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));

    if ($query && $status == "selesai") {
        $update2 = "UPDATE tb_pengaduan SET status='$status' WHERE id_pengaduan = $id_pen";
        $query2 = mysqli_query($mysqli, $update2) or die(mysqli_error($mysqli));
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Laporan yang sudah selesai!'
            }).then((result) => {
                window.location = "header.php?page=laporanpen";
            })
        </script>
<?php
    }
}
?>

<?php  ?>
</body>

</html>