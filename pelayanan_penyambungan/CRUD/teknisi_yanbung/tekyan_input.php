<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Laporan</title>

    <?php
    include_once '../header.php';
    ?>

    <style>
        .target.hidden {
            display: none;
        }
    </style>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Tambah Data Laporan Teknisi Pelayanan Penyambungan</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data Pelanggan Laporan Teknisi Pelayanan Penyambungan</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <form action="tekyan_input.php" method="post" name="form1">

                <?php
                $pelanggan = '';
                $query = "SELECT id_pelanggan, no_registrasi, nama FROM tb_pelanggan GROUP BY id_pelanggan ORDER BY id_pelanggan ASC";
                $result = mysqli_query($mysqli, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $pelanggan .= '<option value="' . $row["id_pelanggan"] . ' ' . $row["no_registrasi"] . '"> ' . $row["no_registrasi"] . ' - ' . $row["nama"] . '</option>';
                }
                ?>
                <div class="form-group">
                    <label for="">Nomor Registrasi Pelanggan</label>
                    <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                        <option value="<?php echo $id_pelanggan ?>" disabled selected> Pilih </option>
                        <?php echo $pelanggan ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Laporan</label>
                    <textarea name="laporan" class="form-control" cols="10" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="" selected>Pilih</option>
                        <option data-targets="t1">Pemasangan Selesai</option>
                        <option data-targets="">Pemasangan Belum Selesai</option>
                    </select>
                </div>

                <div class="form-group target hidden" id="t1">
                    <label for="">Tanggal selesai pemasangan</label>
                    <input type="date" name="tgl_pemasangan" class="form-control" value="">
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
include_once '../footer.php';
?>

<!-- PHP - Query Tombol Save dan SweetAlert -->
<?php
if (isset($_POST['save'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $laporan = $_POST['laporan'];
    $status = $_POST['status'];

    $insert = "INSERT INTO tb_laporan_teknisi_yanbung (id_pelanggan, laporan, status) VALUES ('$id_pelanggan', '$laporan', '$status')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($query) {
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Data Laporan!'
            }).then((result) => {
                window.location = "../../teknisi/yanbung/form_laporan.php";
            })
        </script>
<?php
    }
}
?>

<!-- Script untuk toggle berdasarkan select status -->
<script>
    var filter = document.getElementById('status');

    filter.addEventListener('change', function() {
        var option = this.options[this.selectedIndex];
        var targets = option.dataset.targets.split(/(\s+)/);
        for (var target of document.getElementsByClassName('target')) {
            if (targets.indexOf(target.id) >= 0)
                target.classList.remove('hidden');
            else
                target.classList.add('hidden');
        }
    });
</script>


</html>