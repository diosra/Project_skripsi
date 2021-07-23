<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pilih Petugas Survey</title>

    <script src="pelayanan_penyambungan/pelayananpenyambungan/process.js"></script> <!-- Load file process.js -->

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Pilih Petugas Survey</u></h1>
    </div>

    <!-- PHP - Query Select untuk data ditampilkan di form -->
    <?php
    if (isset($_GET['idsurveypb']) && isset($_GET['fasa'])) {
        $id = $_GET['idsurveypb'];
        $fasa = $_GET['fasa'];
        $idmohon = $_GET['idm'];

        $noreg_exp = explode("-", $idmohon);
        $noreg_imp = implode("", $noreg_exp);

        if ($fasa == "1 Fasa") {
            $result = $mysqli->query("SELECT a.*, b.* FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon WHERE a.fasa_baru = '1 FASA' && b.status_pembayaran = '1' && b.no_registrasi = '$idmohon'") or die($mysqli->error);
        } else {
            $result = $mysqli->query("SELECT a.*, b.* FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon WHERE a.fasa_baru = '3 FASA' && b.status_pembayaran = '1' && b.no_registrasi = '$idmohon'") or die($mysqli->error);
        }

        if ($result->num_rows) {
            $row = $result->fetch_array();
            $email = $row['email'];
        }
    } elseif (isset($_GET['idsurveypd']) && isset($_GET['fasa']) && isset($_GET['idm'])) {
        $id = $_GET['idsurveypd'];
        $fasa = $_GET['fasa'];
        $idmohon = $_GET['idm'];

        $noreg_exp = explode("-", $idmohon);
        $noreg_imp = implode("", $noreg_exp);

        if ($fasa == "1 Fasa") {
            $result = $mysqli->query("SELECT a.* , b.*, c.* FROM tb_perubahan_daya b JOIN tb_mohon_pd a ON b.id_mohon = a.id_mohon JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan WHERE fasa_lama = '1 FASA' && a.status_pembayaran = '1' && a.no_registrasi = '$idmohon'") or die($mysqli->error);
        } else {
            $result = $mysqli->query("SELECT a.* , b.*, c.* FROM tb_perubahan_daya b JOIN tb_mohon_pd a ON b.id_mohon = a.id_mohon JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan WHERE fasa_lama = '3 FASA' && a.status_pembayaran = '1' && a.no_registrasi = '$idmohon'") or die($mysqli->error);
        }

        if ($result->num_rows) {
            $row = $result->fetch_array();
            $email = $row['email'];
        }
    } elseif (isset($_GET['idsurveymlta']) && isset($_GET['fasa'])) {
        $id = $_GET['idsurveymlta'];
        $fasa = $_GET['fasa'];
        $idmohon = $_GET['idm'];

        $noreg_exp = explode("-", $idmohon);
        $noreg_imp = implode("", $noreg_exp);

        if ($fasa == "1 Fasa") {
            $result = $mysqli->query("SELECT a.* , b.*, c.* FROM tb_multiguna b JOIN tb_mohon_multiguna a ON b.id_mohon = a.id_mohon JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan WHERE fasa = '1 FASA' && a.status_pembayaran = '1' && a.no_registrasi = '$idmohon'") or die($mysqli->error);
        } else {
            $result = $mysqli->query("SELECT a.* , b.*, c.* FROM tb_multiguna b JOIN tb_mohon_multiguna a ON b.id_mohon = a.id_mohon JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan WHERE fasa = '3 FASA' && a.status_pembayaran = '1' && a.no_registrasi = '$idmohon'") or die($mysqli->error);
        }

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
            <form action="header.php?page=sendemailsurvey&id=<?php echo $id ?>&fasa=<?php echo $fasa ?>" method="post" name="form1">
                <!-- <input type="text" name="id" value="<?php echo $id; ?>"> -->

                <div class="form-group">
                    <label for="">Cari Data Petugas Survey</label>
                    <input type="text" id="petsur" class="form-control" required>
                    <button type="button" id="btn-search" class="btn btn-primary mt-2">Cari</button>
                </div>

                <input type="hidden" name="id_petugas_survey" id="id_petugas_survey">

                <?php
                if (isset($_GET['idsurveypb'])) {
                ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="noreg" value="<?php echo $noreg_imp; ?>">
                <?php
                } elseif (isset($_GET['idsurveypd'])) {
                ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="noreg" value="<?php echo $noreg_imp; ?>">
                <?php
                } elseif (isset($_GET['idsurveymlta'])) {
                ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="noreg" value="<?php echo $noreg_imp; ?>">
                <?php
                }
                ?>

                <div class="form-group">
                    <label for="">Nama Petugas Survey</label>
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
                        if (isset($_GET['idsurveypb'])) {
                        ?>
                            <button type="submit" class="btn btn-primary" name="savepb"><i class="fas fa-save"></i> Simpan PB</button>
                        <?php
                        } elseif (isset($_GET['idsurveypd'])) {
                        ?>
                            <button type="submit" class="btn btn-primary" name="savepd"><i class="fas fa-save"></i> Simpan</button>
                        <?php
                        } elseif (isset($_GET['idsurveymlta'])) {
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