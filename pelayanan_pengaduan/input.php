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

    <!-- PHP - Query Select untuk data ditampilkan di form -->
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $mysqli->query("SELECT a.*, b.* FROM tb_pengaduan a JOIN tb_pelanggan b ON a.id_pelanggan = b.idpel WHERE id_pengaduan=$id") or die($mysqli->error);

        if ($result->num_rows) {
            $row = $result->fetch_array();
            $email = $row['email'];
        }
    }
    ?>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <!-- Form Utama -->
        <div class="card-body">
            <form action="header.php?page=sendemail&id=<?php echo $row['id_pengaduan'] ?>" method="post" name="form1">
                <input type="hidden" name="id_pengaduan" value="<?php echo $id; ?>">

                <div class="form-group">
                    <label for="">Cari Data Petugas Teknisi</label>
                    <input type="text" id="tekpen" class="form-control" required>
                    <button type="button" id="btn-search" class="btn btn-primary mt-2">Cari</button>
                </div>

                <input type="hidden" name="id_teknisi" id="id_teknisi">

                <div class="form-group">
                    <label for="">Nama Teknisi</label>
                    <input type="text" id="nama" name="nama" class="form-control" required readonly>
                </div>

                <hr class="my-3">
                <h2 class="mb-3"><u>Kirim Pesan Email</u></h2>


                <div class="form-group">
                    <label>Email Pelanggan</label>
                    <input type="email" name="email_penerima" placeholder="Email Penerima" class="form-control" value="<?php echo $email ?>" readonly />
                </div>
                <div class="form-group">
                    <label>Subjek</label>
                    <input type="text" name="subjek" placeholder="Isi Subjek" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Pesan</label>
                    <textarea required name="pesan" placeholder="Isi Pesan" rows="8" class="form-control"></textarea>
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