<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Biaya Penyambungan</title>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Tambah Data Biaya Penyambungan</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data Biaya Penyambungan</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <form action="header.php?page=inputhargamanajer" method="post" name="form1">

                <div class="form-group">
                    <label for="">Kode</label>
                    <select name="kode" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>PB</option>
                        <option>PD</option>
                        <option>MLTA</option>
                        <option>UJL</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Deskripsi / Jenis Penyambungan</label>
                    <input type="text" name="jenis" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Nilai / Harga</label>
                    <input type="text" name="nilai" class="form-control" required>
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
    $kode = $_POST['kode'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['nilai'];

    $insert = "INSERT INTO tb_harga_penyambungan (kode, jenis, harga) VALUES ('$kode', '$jenis', '$harga')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
    // var_dump($insert);

    if ($query) {
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Data Biaya Penyambungan'
            }).then((result) => {
                window.location = "header.php?page=harga_manajer";
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gaga;',
                text: 'Gagal Menambahkan Data Biaya Penyambungan'
            }).then((result) => {
                window.location = "header.php?page=harga_manajer";
            })
        </script>
<?php
    }
}
?>


</html>