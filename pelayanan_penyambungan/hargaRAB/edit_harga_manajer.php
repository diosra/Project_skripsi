<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Biaya Penyambungan</title>

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Ubah Data Biaya Penyambungan</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Biaya Penyambungan</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <!-- PHP - Query Tombol Ubah dan SweetAlert -->
            <?php
            if (isset($_POST['ubah'])) {
                $id = $_POST['id_harga_penyambungan'];
                $kode = $_POST['kode'];
                $jenis = $_POST['jenis'];
                $harga = $_POST['nilai'];

                $update = "UPDATE tb_harga_penyambungan SET kode='$kode', jenis='$jenis',  harga='$harga' WHERE id_harga_penyambungan='$id'";
                $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
                // var_dump($update);

                if ($query) {
            ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses.',
                            text: 'Sukses Mengubah Data Biaya Penyambungan'
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
                            title: 'Gagal',
                            text: 'Gagal Mengubah Data Biaya Penyambungan'
                        }).then((result) => {
                            window.location = "header.php?page=harga_manajer";
                        })
                    </script>
            <?php
                }
            }
            ?>

            <!-- PHP - Query Select untuk data ditampilkan di form -->
            <?php
            $kode = '';
            $uraian = '';
            $satuan = '';
            $harga_satuan = '';
            if (isset($_GET['edit'])) {
                $id = $_GET['edit'];
                $result = $mysqli->query("SELECT * FROM tb_harga_penyambungan WHERE id_harga_penyambungan='$id'") or die($mysqli->error);

                if ($result->num_rows) {
                    $row = $result->fetch_array();
                    $kode = $row['kode'];
                    $jenis = $row['jenis'];
                    $harga = $row['harga'];
                }
            }
            ?>

            <form action="header.php?page=edithargamanajer&edit=<?php echo $row['id_harga_penyambungan'] ?>" method="post" name="form1">
                <input type="hidden" name="id_harga_penyambungan" value="<?php echo $id; ?>">

                <div class="form-group">
                    <label for="">Kode</label>
                    <select name="kode" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <?php
                        if ($kode == "PB") {
                            $pilih1 = 'selected';
                            $pilih2 = '';
                            $pilih3 = '';
                            $pilih4 = '';
                            $pilih5 = '';
                            $pilih6 = '';
                            $pilih7 = '';
                        } elseif ($kode == "PD") {
                            $pilih2 = 'selected';
                            $pilih1 = '';
                            $pilih3 = '';
                            $pilih4 = '';
                            $pilih5 = '';
                            $pilih6 = '';
                            $pilih7 = '';
                        } elseif ($kode == "MLTA") {
                            $pilih3 = 'selected';
                            $pilih1 = '';
                            $pilih2 = '';
                            $pilih4 = '';
                            $pilih5 = '';
                            $pilih6 = '';
                            $pilih7 = '';
                        } elseif ($kode == "UJL") {
                            $pilih4 = 'selected';
                            $pilih1 = '';
                            $pilih2 = '';
                            $pilih3 = '';
                            $pilih5 = '';
                            $pilih6 = '';
                            $pilih7 = '';
                        } elseif ($kode == "PPN") {
                            $pilih5 = 'selected';
                            $pilih1 = '';
                            $pilih2 = '';
                            $pilih3 = '';
                            $pilih4 = '';
                            $pilih6 = '';
                            $pilih7 = '';
                        } elseif ($kode == "PPJ") {
                            $pilih6 = 'selected';
                            $pilih1 = '';
                            $pilih2 = '';
                            $pilih3 = '';
                            $pilih4 = '';
                            $pilih5 = '';
                            $pilih7 = '';
                        } elseif ($kode == "MATERAI") {
                            $pilih7 = 'selected';
                            $pilih1 = '';
                            $pilih2 = '';
                            $pilih3 = '';
                            $pilih4 = '';
                            $pilih5 = '';
                            $pilih6 = '';
                        } else {
                            $pilih1 = '';
                            $pilih2 = '';
                            $pilih3 = '';
                            $pilih4 = '';
                            $pilih5 = '';
                            $pilih6 = '';
                            $pilih7 = '';
                        }
                        ?>
                        <option <?php echo $pilih1; ?>>PB</option>
                        <option <?php echo $pilih2; ?>>PD</option>
                        <option <?php echo $pilih3; ?>>MLTA</option>
                        <option <?php echo $pilih4; ?>>UJL</option>
                        <option <?php echo $pilih5; ?>>PPN</option>
                        <option <?php echo $pilih6; ?>>PPJ</option>
                        <option <?php echo $pilih7; ?>>MATERAI</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Deskripsi / Jenis Penyambungan</label>
                    <input type="text" name="jenis" value="<?php echo $jenis ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Nilai / Harga</label>
                    <input type="text" name="nilai" value="<?php echo $harga ?>" class="form-control" required>
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

<script>
    $(document).ready(function() {
        $('.action').change(function() {
            if ($(this).val() != '') {
                var action = $(this).attr("id");
                var query = $(this).val();
                var result = '';
                if (action == "id_pelanggan") {
                    result = 'nama';
                } else {
                    result = 'tidak ada';
                }
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {
                        action: action,
                        query: query
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                })
            }
        });
    });
</script>



</html>