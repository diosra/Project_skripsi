<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Biaya RAB</title>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Tambah Data Biaya RAB</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data Biaya RAB</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <form action="header.php?page=inputharga" method="post" name="form1">

                <div class="form-group">
                    <label for="">Kode</label>
                    <select name="kode" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>PB 1 FASA</option>
                        <option>PB 3 FASA</option>
                        <option>PD 1 FASA</option>
                        <option>PD 3 FASA</option>
                        <option>PD 1 FASA KE 3 FASA</option>
                        <option>PD 3 FASA KE 1 FASA</option>
                        <option>MULTIGUNA PELANGGAN 1 FASA</option>
                        <option>MULTIGUNA PELANGGAN 3 FASA</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Uraian</label>
                    <input type="text" name="uraian" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Satuan</label>
                    <input type="text" name="satuan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Harga Satuan</label>
                    <input type="text" name="harga_satuan" class="form-control" required>
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
    $uraian = $_POST['uraian'];
    $satuan = $_POST['satuan'];
    $harga_satuan = $_POST['harga_satuan'];

    $insert = "INSERT INTO tb_harga (KODE, URAIAN, SATUAN, HARGA_SATUAN) 
        VALUES ('$kode', '$uraian', '$satuan', '$harga_satuan')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
    // var_dump($insert);

    if ($query) {
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Data Biaya RAB'
            }).then((result) => {
                window.location = "header.php?page=harga";
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gaga;',
                text: 'Gagal Menambahkan Data Biaya RAB'
            }).then((result) => {
                window.location = "header.php?page=harga";
            })
        </script>
<?php
    }
}
?>


</html>