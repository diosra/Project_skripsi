<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Biaya RAB</title>

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Ubah Data Biaya RAB</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Biaya RAB</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <!-- PHP - Query Tombol Ubah dan SweetAlert -->
            <?php
            if (isset($_POST['ubah'])) {
                $id = $_POST['id_harga'];
                $kode = $_POST['kode'];
                $uraian = $_POST['uraian'];
                $satuan = $_POST['satuan'];
                $harga_satuan = $_POST['harga_satuan'];

                $update = "UPDATE tb_harga SET KODE='$kode',
                                URAIAN='$uraian', SATUAN='$satuan', HARGA_SATUAN='$harga_satuan' WHERE id_harga=$id";
                $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
                // var_dump($update);

                if ($query) {
            ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses.',
                            text: 'Sukses Mengubah Data Biaya RAB'
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
                            title: 'Gagal',
                            text: 'Gagal Mengubah Data Biaya RAB'
                        }).then((result) => {
                            window.location = "header.php?page=harga";
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
                $result = $mysqli->query("SELECT * FROM tb_harga WHERE id_harga=$id") or die($mysqli->error);

                if ($result->num_rows) {
                    $row = $result->fetch_array();
                    $kode = $row['KODE'];
                    $uraian = $row['URAIAN'];
                    $satuan = $row['SATUAN'];
                    $harga_satuan = $row['HARGA_SATUAN'];
                }
            }
            ?>

            <form action="header.php?page=editharga&edit=<?php echo $row['id_harga'] ?>" method="post" name="form1">
                <input type="hidden" name="id_harga" value="<?php echo $id; ?>">

                <div class="form-group">
                    <label for="">Kode</label>
                    <select name="kode" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>Pilihan sebelumnya : <?php echo $kode ?></option>
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
                    <input type="text" name="uraian" value="<?php echo $uraian ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Satuan</label>
                    <input type="text" name="satuan" value="<?php echo $satuan ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Harga Satuan</label>
                    <input type="text" name="harga_satuan" value="<?php echo $harga_satuan ?>" class="form-control" required>
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