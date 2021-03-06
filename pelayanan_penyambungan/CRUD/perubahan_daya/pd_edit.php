<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Pasang Baru</title>

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Ubah Data Perubahan Daya</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Pelanggan Perubahan Daya</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <!-- PHP - Query Tombol Ubah dan SweetAlert -->
            <?php
            if (isset($_POST['ubah'])) {
                $id = $_POST['id_perubahan_daya'];
                $tgl_mohon = $_POST['tgl_mohon'];
                $tarif_lama = $_POST['tarif_lama'];
                $daya_lama = $_POST['daya_lama'];
                $tarif_baru = $_POST['tarif_baru'];
                $daya_baru = $_POST['daya_baru'];
                $fasa_lama = $_POST['fasa_lama'];
                $fasa_baru = $_POST['fasa_baru'];
                $ambilIdPelanggan = $mysqli->query("SELECT a.no_registrasi , b.* FROM tb_perubahan_daya b JOIN tb_pelanggan a ON b.id_pelanggan = a.id_pelanggan WHERE id_perubahan_daya=$id");
                $ambilQuery = $ambilIdPelanggan->fetch_array();

                $update = "UPDATE tb_perubahan_daya SET tgl_mohon='$tgl_mohon', tarif_lama='$tarif_lama', daya_lama='$daya_lama', tarif_baru='$tarif_baru', daya_baru='$daya_baru', fasa_lama='$fasa_lama' ,fasa_baru='$fasa_baru' WHERE id_perubahan_daya=$id";
                $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));

                if ($query) {
                    if (($fasa_lama == "1 FASA") && ($fasa_baru == "1 FASA")) {
                        $hapusData = mysqli_query($mysqli, "DELETE FROM tb_detail_pd_1ke3phs WHERE id_perubahan_daya=$id");
                        $hapusData2 = mysqli_query($mysqli, "DELETE FROM tb_detail_pd_1phs WHERE id_perubahan_daya=$id");
                        $insertDataPerubahan = "INSERT INTO tb_detail_pd_1phs (id_perubahan_daya, pekerjaan_rab, uraianbiaya1_pd1, uraianbiaya2_pd1, uraianbiaya3_pd1, total_biaya) 
                        VALUES 
                        ('$id', 'PD 1 FASA', '30840', '2724', '46706', '80270')";
                        $queryInsertDataPerubahan = mysqli_query($mysqli, $insertDataPerubahan);
            ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses.',
                                text: 'Data dengan Nomor Registrasi : <?php echo $ambilQuery['no_registrasi'] ?> di-update dengan pekerjaan RAB menjadi "PD 1 Phasa" dan berhasil di update!'
                            }).then((result) => {
                                window.location = "header.php?page=pd1phasa";
                            })
                        </script>
                    <?php
                    } elseif (($fasa_lama == "1 FASA") && ($fasa_baru == "3 FASA")) {
                        $hapusData = mysqli_query($mysqli, "DELETE FROM tb_detail_pd_1phs WHERE id_perubahan_daya=$id");
                        $hapusData2 = mysqli_query($mysqli, "DELETE FROM tb_detail_pd_1ke3phs WHERE id_perubahan_daya=$id");
                        $insertDataPerubahan = "INSERT INTO tb_detail_pd_1ke3phs (id_perubahan_daya, pekerjaan_rab, uraianbiaya1_pd_1ke3phs, uraianbiaya2_pd_1ke3phs,uraianbiaya3_pd_1ke3phs,uraianbiaya4_pd_1ke3phs,uraianbiaya5_pd_1ke3phs,uraianbiaya6_pd_1ke3phs,uraianbiaya7_pd_1ke3phs,uraianbiaya8_pd_1ke3phs,uraianbiaya9_pd_1ke3phs,uraianbiaya10_pd_1ke3phs,uraianbiaya11_pd_1ke3phs,uraianbiaya12_pd_1ke3phs,uraianbiaya13_pd_1ke3phs, total_biaya)
                        VALUES 
                        ('$id', 'PD 1 FASA KE 3 FASA', '1348000', '2724', '29360', '12110', '4433', '11722','39400', '5615', '46811', '38482', '31339', '40800', '24606', '1635402')";
                        $queryInsertDataPerubahan = mysqli_query($mysqli, $insertDataPerubahan);
                    ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses.',
                                text: 'Data dengan Nomor Registrasi : <?php echo $ambilQuery['no_registrasi'] ?> di-update dengan pekerjaan RAB menjadi "PD 1 Phasa ke 3 Phasa" dan berhasil di update!'
                            }).then((result) => {
                                window.location = "header.php?page=pd1phasa";
                            })
                        </script>
                    <?php
                    } elseif (($fasa_lama == "3 FASA") && ($fasa_baru == "3 FASA")) {
                        $hapusData = mysqli_query($mysqli, "DELETE FROM tb_detail_pd_3ke1phs WHERE id_perubahan_daya=$id");
                        $hapusData2 = mysqli_query($mysqli, "DELETE FROM tb_detail_pd_3phs WHERE id_perubahan_daya=$id");
                        $insertDataPerubahan = "INSERT INTO tb_detail_pd_3phs (id_perubahan_daya,pekerjaan_rab, uraianbiaya1_pd3, total_biaya)
                        VALUES 
                        ('$id','PD 3 FASA', '40800', '40800')";
                        $queryInsertDataPerubahan = mysqli_query($mysqli, $insertDataPerubahan);
                    ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses.',
                                text: 'Data dengan Nomor Registrasi : <?php echo $ambilQuery['no_registrasi'] ?> di-update dengan pekerjaan RAB menjadi "PD 3 Phasa" dan berhasil di update!'
                            }).then((result) => {
                                window.location = "header.php?page=pd3phasa";
                            })
                        </script>
                    <?php
                    } elseif (($fasa_lama == "3 FASA") && ($fasa_baru == "1 FASA")) {
                        $hapusData = mysqli_query($mysqli, "DELETE FROM tb_detail_pd_3phs WHERE id_perubahan_daya=$id");
                        $hapusData2 = mysqli_query($mysqli, "DELETE FROM tb_detail_pd_3ke1phs WHERE id_perubahan_daya=$id");
                        $insertDataPerubahan = "INSERT INTO tb_detail_pd_3ke1phs (id_perubahan_daya, pekerjaan_rab,uraianbiaya1_pd_3ke1phs,uraianbiaya2_pd_3ke1phs,uraianbiaya3_pd_3ke1phs,uraianbiaya4_pd_3ke1phs,uraianbiaya5_pd_3ke1phs,uraianbiaya6_pd_3ke1phs,uraianbiaya7_pd_3ke1phs,uraianbiaya8_pd_3ke1phs,uraianbiaya9_pd_3ke1phs,uraianbiaya10_pd_3ke1phs,uraianbiaya11_pd_3ke1phs,uraianbiaya12_pd_3ke1phs, total_biaya)
                        VALUES 
                        ('$id', 'PD 3 FASA KE 1 FASA', '243040', '4210', '2724', '6895', '9358', '5615', '3842', '41008', '33625', '22982', '20856', '28086', '422241')";
                        $queryInsertDataPerubahan = mysqli_query($mysqli, $insertDataPerubahan);
                    ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses.',
                                text: 'Data dengan Nomor Registrasi : <?php echo $ambilQuery['no_registrasi'] ?> di-update dengan pekerjaan RAB menjadi "PD 3 Phasa ke 1 Phasa" dan berhasil di update!'
                            }).then((result) => {
                                window.location = "header.php?page=pd3phasa";
                            })
                        </script>
            <?php
                    }
                }
            }
            ?>

            <!-- PHP - Query Select untuk data ditampilkan di form -->
            <?php
            $id_pelanggan = '';
            $jenis_transaksi = '';
            $tgl_mohon = '';
            $tarif_lama = '';
            $daya_lama = '';
            $tarif_baru = '';
            $daya_baru = '';
            $fasa_lama = '';
            $fasa_baru = '';
            $nama = '';
            if (isset($_GET['edit'])) {
                $id = $_GET['edit'];
                $result = $mysqli->query("SELECT a.* , b.* FROM tb_perubahan_daya b JOIN tb_pelanggan a ON b.id_pelanggan = a.id_pelanggan WHERE id_perubahan_daya=$id") or die($mysqli->error);

                if ($result->num_rows) {
                    $row = $result->fetch_array();
                    $id_p = $row['id_pelanggan'];
                    $id_pelanggan = $row['no_registrasi'];
                    $identitas = $row['identitas'];
                    $nama = $row['nama'];
                    $alamat = $row['alamat'];
                    $jenis_transaksi = $row['jenis_transaksi'];
                    $tgl_mohon = $row['tgl_mohon'];
                    $tarif_lama = $row['tarif_lama'];
                    $daya_lama = $row['daya_lama'];
                    $tarif_baru = $row['tarif_baru'];
                    $daya_baru = $row['daya_baru'];
                    $fasa_lama = $row['fasa_lama'];
                    $fasa_baru = $row['fasa_baru'];
                }
            }
            ?>

            <form action="header.php?page=editpd&edit=<?php echo $row['id_perubahan_daya'] ?>" method="post" name="form1">
                <input type="hidden" name="id_perubahan_daya" value="<?php echo $id; ?>">


                <div class="form-group row">
                    <div class="col">
                        <label for="">Nomor Registrasi Pelanggan</label>
                        <input type="text" name="id_pelanggan" id="id_pelanggan" class="form-control" value="<?php echo $id_pelanggan ?>" disabled>
                    </div>
                    <?php
                    $ambilNama = $mysqli->query("SELECT nama FROM tb_pelanggan WHERE id_pelanggan = $id_p") or die($mysqli->error);
                    $hasilAmbil = $ambilNama->fetch_array();
                    ?>
                    <div class="col">
                        <label for="">Nama Pelanggan</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $hasilAmbil['nama'] ?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Identitas (Nomor KTP)</label>
                    <input type="text" name="identitas" class="form-control" value="<?php echo $identitas ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" cols="10" rows="3" required readonly="readonly"><?php echo $alamat ?></textarea>
                </div>

                <div class="form-group">
                    <label for="">Jenis Transaksi</label>
                    <input type="text" name="jenis_transaksi" class="form-control" value="Perubahan Daya" disabled>
                </div>

                <div class="form-group">
                    <label for="">Tanggal Permohonan</label>
                    <input type="date" name="tgl_mohon" class="form-control" value="<?php echo $tgl_mohon ?>" required>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label for="">Tarif Lama</label>
                        <input type="text" name="tarif_lama" class="form-control" value="<?php echo $tarif_lama ?>" placeholder="Masukkan Tarif Lama Pelanggan" required>
                    </div>
                    <div class="col">
                        <label for="">Daya Lama</label>
                        <input type="text" name="daya_lama" class="form-control" value="<?php echo $daya_lama ?>" placeholder="Masukkan Daya Lama Pelanggan" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label for="">Tarif Baru</label>
                        <input type="text" name="tarif_baru" class="form-control" value="<?php echo $tarif_baru ?>" placeholder="Masukkan Tarif Baru Pelanggan" required>
                    </div>
                    <div class="col">
                        <label for="">Daya Baru</label>
                        <input type="text" name="daya_baru" class="form-control" value="<?php echo $daya_baru ?>" placeholder="Masukkan Daya Baru Pelanggan" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Fasa Lama</label>
                    <select name="fasa_lama" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option value="<?php echo $fasa_lama; ?>" disabled>Pilihan Sebelum nya : <?php echo $fasa_lama ?></option>
                        <option>1 FASA</option>
                        <option>3 FASA</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Fasa Baru</label>
                    <select name="fasa_baru" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option value="<?php echo $fasa_baru; ?>" disabled>Pilihan Sebelum nya : <?php echo $fasa_baru ?></option>
                        <option>1 FASA</option>
                        <option>3 FASA</option>
                    </select>
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