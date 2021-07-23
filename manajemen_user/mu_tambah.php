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

    <?php
    //No Teknisi Pengaduan
    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_teknisi) as TekTerbesar FROM tb_teknisi_pengaduan");
    $dataambil = mysqli_fetch_array($queryambil);
    $no_teknisi = @$dataambil['TekTerbesar'];

    $urutan = (int) substr($no_teknisi, 6, 3);
    $urutan++;

    $huruf = "TekPen";
    $no_teknisi = $huruf . sprintf("%03s", $urutan);

    //No Teknisi Penyambungan
    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_teknisi) as Tek2Terbesar FROM tb_teknisi_penyambungan");
    $dataambil = mysqli_fetch_array($queryambil);
    $no_teknisi2 = @$dataambil['Tek2Terbesar'];

    $urutan = (int) substr($no_teknisi2, 6, 3);
    $urutan++;

    $huruf = "TekYan";
    $no_teknisi2 = $huruf . sprintf("%03s", $urutan);

    // No Petugas Survey
    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_petugas_survey) as SurTerbesar FROM tb_petugas_survey");
    $dataambil = mysqli_fetch_array($queryambil);
    $no_survey = @$dataambil['SurTerbesar'];

    $urutan = (int) substr($no_survey, 8, 3);
    $urutan++;

    $huruf = "P_survey";
    $no_survey = $huruf . sprintf("%03s", $urutan);
    ?>

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
            <form action="header.php?page=inputuser" method="post" name="form1" enctype="multipart/form-data">

                <input type="hidden" value="<?php echo $no_teknisi ?>">
                <input type="hidden" value="<?php echo $no_teknisi2 ?>">
                <input type="hidden" value="<?php echo $no_survey ?>">

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                </div>

                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" required>
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

                <hr class="my-12 mt-5 mb-2" />

                <h3 class="mb-3"><u><b>Input Akun User</b></u></h3>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                        </div>
                    </div>
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

    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $t_check = $_POST['t_check'];
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
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($query) {
        if ($level == 4 && $t_check == 2) {
            $insert2 = "INSERT INTO tb_teknisi_pengaduan (id, no_teknisi,nama, alamat, tgl_lahir) VALUES ('" . mysqli_insert_id($mysqli) . "', '$no_teknisi', '$nama', '$alamat','$tgl_lahir')";
            $namaPosisi = "Teknisi Pelayanan Pengaduan";
        } elseif ($level == 4 && $t_check == 1) {
            $insert2 = "INSERT INTO tb_teknisi_penyambungan (id, no_teknisi,nama, alamat, tgl_lahir) VALUES ('" . mysqli_insert_id($mysqli) . "', '$no_teknisi2', '$nama', '$alamat','$tgl_lahir')";
            $namaPosisi = "Teknisi Pelayanan Penyambungan";
        } elseif ($level == 5) {
            $insert2 = "INSERT INTO tb_petugas_survey (id, no_petugas_survey, nama, alamat, tgl_lahir) VALUES ('" . mysqli_insert_id($mysqli) . "', '$no_survey', '$nama', '$alamat','$tgl_lahir')";
            $namaPosisi = "Petugas Survey";
        } elseif ($level == "1") {
            $namaPosisi = "Admin";
        } elseif ($level == "2") {
            $namaPosisi = "Pegawai";
        } elseif ($level == "3") {
            $namaPosisi = "Operator";
        }
        $query = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Data User <?php echo $namaPosisi ?>'
            }).then((result) => {
                window.location = "header.php?page=user";
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal Menambahkan Data User, Log : <?php die(mysqli_error($mysqli)) ?>'
            }).then((result) => {
                window.location = "header.php?page=user";
            })
        </script>
<?php
    }
}
?>


</html>