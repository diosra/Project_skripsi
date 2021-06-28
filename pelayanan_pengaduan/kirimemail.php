<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kirim Email</title>

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Kirim Email</u></h1>
    </div>

    <!-- PHP - Query Select untuk data ditampilkan di form -->
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $mysqli->query("SELECT * FROM tb_pengaduan WHERE id_pengaduan=$id") or die($mysqli->error);

        if ($result->num_rows) {
            $row = $result->fetch_array();
            $email = $row['email'];
        }
    }
    ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="header.php?page=sendemail" method="POST">

                <div class="form-group">
                    <label>Kepada</label>
                    <input type="email" name="email_penerima" placeholder="Email Penerima" class="form-control" value="<?php echo $email ?>" readonly />
                </div>
                <div class="form-group">
                    <label>Subjek</label>
                    <input type="text" name="subjek" placeholder="Isi Subjek" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Pesan</label>
                    <textarea name="pesan" placeholder="Isi Pesan" rows="8" class="form-control"></textarea>
                </div>

                <div class="form-group row float-right">
                    <div class="col">
                        <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>

                        <button type="submit" class="btn btn-primary" name="save"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include_once 'footer.php';
?>

</html>