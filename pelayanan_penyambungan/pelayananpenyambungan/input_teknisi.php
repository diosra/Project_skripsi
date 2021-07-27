<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pilih Teknisi</title>

    <script src="pelayanan_penyambungan/pelayananpenyambungan/process.js"></script> <!-- Load file process.js -->

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Pilih Teknisi Pelayanan Penyambungan</u></h1>
    </div>

    <!-- PHP - Query Select untuk data ditampilkan di form -->
    <?php
    if (isset($_GET['idteknisipb']) && isset($_GET['fasa'])) {
        $id = $_GET['idteknisipb'];
        $fasa = $_GET['fasa'];

        // $result = $mysqli->query("SELECT email FROM tb_mohon_pb WHERE id_mohon = '$id'") or die($mysqli->error);
        $result = $mysqli->query("SELECT a.*, b.*, c.idpel, c.email FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon JOIN tb_pelanggan c ON b.id_pelanggan = c.idpel WHERE a.id_pasang_baru = '$id'") or die($mysqli->error);

        // if ($fasa == "1 Fasa") {
        //     $result = $mysqli->query("SELECT a.*, b.* FROM tb_mohon_pb a JOIN tb_pasang_baru b ON a.id_mohon = b.id_mohon WHERE a.id_mohon = '$id'") or die($mysqli->error);
        // } else {
        //     $result = $mysqli->query("SELECT a.*, b.* FROM tb_mohon_pb a JOIN tb_pasang_baru b ON a.id_mohon = b.id_mohon WHERE a.id_mohon = '$id'") or die($mysqli->error);
        // }

        if ($result->num_rows) {
            $row = $result->fetch_array();
            $email = $row['email'];
        }
    } elseif (isset($_GET['idteknisipd']) && isset($_GET['fasa'])) {
        $id = $_GET['idteknisipd'];
        $fasa = $_GET['fasa'];

        $result = $mysqli->query("SELECT a.*, b.*, c.idpel, c.email FROM tb_perubahan_daya a JOIN tb_mohon_pd b ON a.id_mohon = b.id_mohon JOIN tb_pelanggan c ON b.id_pelanggan = c.idpel WHERE a.id_perubahan_daya = '$id'") or die($mysqli->error);

        if ($result->num_rows) {
            $row = $result->fetch_array();
            $email = $row['email'];
        }
    } elseif (isset($_GET['idteknisimlta']) && isset($_GET['fasa'])) {
        $id = $_GET['idteknisimlta'];
        $fasa = $_GET['fasa'];

        $result = $mysqli->query("SELECT a.*, b.*, c.idpel, c.email FROM tb_multiguna a JOIN tb_mohon_multiguna b ON a.id_mohon = b.id_mohon JOIN tb_pelanggan c ON b.id_pelanggan = c.idpel WHERE a.id_mlta = '$id'") or die($mysqli->error);

        // $result = $mysqli->query("SELECT a.* , b.*, c.* FROM tb_multiguna b JOIN tb_mohon_multiguna a ON b.id_mohon = a.id_mohon JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan WHERE fasa = '1 FASA' && a.status_pembayaran = '1'") or die($mysqli->error);

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
            <form action="header.php?page=sendemailteknisi&id=<?php echo $id ?>&fasa=<?php echo $fasa ?>" method="post" name="form1">
                <!-- <input type="text" name="id" value="<?php echo $id; ?>"> -->

                <div class="form-group">
                    <label for="">Cari Data Teknisi Pelayanan Penyambungan</label>
                    <input type="text" id="tekyan" class="form-control" required>
                    <button type="button" id="btn-search" class="btn btn-primary mt-2">Cari</button>
                </div>

                <input type="hidden" name="id_teknisi" id="id_teknisi">

                <?php
                if (isset($_GET['idteknisipb'])) {
                ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php
                } elseif (isset($_GET['idteknisipd'])) {
                ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php
                } elseif (isset($_GET['idteknisimlta'])) {
                ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php
                }
                ?>

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

                        <?php
                        if (isset($_GET['idteknisipb'])) {
                        ?>
                            <button type="submit" class="btn btn-primary" name="savepb"><i class="fas fa-save"></i> Simpan</button>
                        <?php
                        } elseif (isset($_GET['idteknisipd'])) {
                        ?>
                            <button type="submit" class="btn btn-primary" name="savepd"><i class="fas fa-save"></i> Simpan</button>
                        <?php
                        } elseif (isset($_GET['idteknisimlta'])) {
                        ?>
                            <button type="submit" class="btn btn-primary" name="savemlta"><i class="fas fa-save"></i> Simpan</button>
                        <?php
                        }
                        ?>

                        <!-- <button type="submit" class="btn btn-primary" name="save"><i class="fas fa-save"></i> Simpan</button> -->
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