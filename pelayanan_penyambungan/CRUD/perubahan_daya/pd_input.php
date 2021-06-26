<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Perubahan Daya</title>

    <script src="pelayanan_penyambungan/CRUD/process.js"></script> <!-- Load file process.js -->
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Tambah Data Perubahan Daya</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data Pelanggan Perubahan Daya</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <form action="header.php?page=inputpd" method="post" name="form1">

                <?php
                $pelanggan = '';
                $query = "SELECT id_pelanggan, no_registrasi, nama FROM tb_pelanggan GROUP BY id_pelanggan ORDER BY id_pelanggan ASC";
                $result = mysqli_query($mysqli, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $pelanggan .= '<option value="' . $row["id_pelanggan"] . ' ' . $row["no_registrasi"] . '"> ' . $row["no_registrasi"] . ' - ' . $row["nama"] . '</option>';
                }
                ?>

                <div class="form-group">
                    <label for="">Cari No Registrasi</label>
                    <input type="text" id="no_registrasi" name="id_pelanggan" class="form-control" required>
                    <button type="button" id="btn-search" class="btn btn-primary mt-2">Cari</button>
                </div>

                <input type="text" id="no_reg" name="id_pelanggan" class="form-control" required hidden>

                <div class="form-group">
                    <label for="">Identitas (No. KTP)</label>
                    <input type="text" id="identitas" name="identitas" class="form-control" required readonly="readonly" required>
                </div>

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" required readonly="readonly" required>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" cols="10" rows="3" required readonly="readonly"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Jenis Transaksi</label>
                    <input type="text" name="jenis_transaksi" class="form-control" value="Perubahan Daya" disabled>
                </div>

                <div class="form-group">
                    <label for="">Tanggal Permohonan</label>
                    <input type="date" name="tgl_mohon" class="form-control" value="" required>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label for="">Tarif Lama</label>
                        <input type="text" name="tarif_lama" class="form-control" value="" placeholder="Masukkan Tarif Lama Pelanggan" required>
                    </div>
                    <div class="col">
                        <label for="">Daya Lama</label>
                        <input type="text" name="daya_lama" class="form-control" value="" placeholder="Masukkan Daya Lama Pelanggan" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label for="">Tarif Baru</label>
                        <input type="text" name="tarif_baru" class="form-control" value="" placeholder="Masukkan Tarif Baru Pelanggan" required>
                    </div>
                    <div class="col">
                        <label for="">Daya Baru</label>
                        <input type="text" name="daya_baru" class="form-control" value="" placeholder="Masukkan Daya Baru Pelanggan" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Fasa Lama</label>
                    <select name="fasa_lama" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>1 FASA</option>
                        <option>3 FASA</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Fasa Baru</label>
                    <select name="fasa_baru" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>1 FASA</option>
                        <option>3 FASA</option>
                    </select>
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
                    url: "pelayanan_penyambungan/CRUD/perubahan_daya/fetch.php",
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

<!-- PHP - Query Tombol Save dan SweetAlert -->
<?php
if (isset($_POST['save'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $tgl_mohon = $_POST['tgl_mohon'];
    $tarif_lama = $_POST['tarif_lama'];
    $daya_lama = $_POST['daya_lama'];
    $tarif_baru = $_POST['tarif_baru'];
    $daya_baru = $_POST['daya_baru'];
    $fasa_lama = $_POST['fasa_lama'];
    $fasa_baru = $_POST['fasa_baru'];

    $insert = "INSERT INTO tb_perubahan_daya (id_pelanggan, jenis_transaksi, tgl_mohon, tarif_lama, daya_lama, tarif_baru, daya_baru, fasa_lama, fasa_baru) 
        VALUES ('$id_pelanggan', 'Perubahan Daya', '$tgl_mohon', '$tarif_lama','$daya_lama', '$tarif_baru','$daya_baru', '$fasa_lama', '$fasa_baru')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($query) {
        if (($fasa_lama == "1 FASA") && ($fasa_baru == "1 FASA")) {
            $insert2 = "INSERT INTO tb_detail_pd_1phs (id_perubahan_daya, pekerjaan_rab, uraianbiaya1_pd1, uraianbiaya2_pd1, uraianbiaya3_pd1, total_biaya)
                    VALUES 
                    ('" . mysqli_insert_id($mysqli) . "', 'PD 1 FASA', '30840', '2724', '46706', '80270')";
            $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Data Pelanggan Perubahan Daya 1 Phasa dan Detail Biaya Pelanggan Perubahan Daya 1 Phasa'
                }).then((result) => {
                    window.location = "header.php?page=pd1phasa";
                })
            </script>
        <?php
        } elseif (($fasa_lama == "1 FASA") && ($fasa_baru == "3 FASA")) {
            $insert2 = "INSERT INTO tb_detail_pd_1ke3phs (id_perubahan_daya, pekerjaan_rab, 
                uraianbiaya1_pd_1ke3phs,uraianbiaya2_pd_1ke3phs,uraianbiaya3_pd_1ke3phs,uraianbiaya4_pd_1ke3phs,uraianbiaya5_pd_1ke3phs,uraianbiaya6_pd_1ke3phs,uraianbiaya7_pd_1ke3phs,uraianbiaya8_pd_1ke3phs,uraianbiaya9_pd_1ke3phs,uraianbiaya10_pd_1ke3phs,uraianbiaya11_pd_1ke3phs,uraianbiaya12_pd_1ke3phs,uraianbiaya13_pd_1ke3phs, total_biaya)
                VALUES 
                ('" . mysqli_insert_id($mysqli) . "', 'PD 1 FASA KE 3 FASA', '1348000','2724', '29360', '12110', '4433', '11722','39400', '5615', '46811', '38482', '31339', '40800', '24606', '1635402')";
            $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Data Pelanggan Perubahan Daya 1 Phasa dan Detail Biaya Pelanggan Perubahan Daya 1 Phasa ke 3 Phasa'
                }).then((result) => {
                    window.location = "header.php?page=pd1phasa";
                })
            </script>
        <?php
        } elseif (($fasa_lama == "3 FASA") && ($fasa_baru == "3 FASA")) {
            $insert2 = "INSERT INTO tb_detail_pd_3phs (id_perubahan_daya,pekerjaan_rab, uraianbiaya1_pd3, total_biaya)
            VALUES 
            ('" . mysqli_insert_id($mysqli) . "','PD 3 FASA', '40800', '40800')";
            $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Data Pelanggan Perubahan Daya 3 Phasa dan Detail Biaya Pelanggan Perubahan Daya 3 Phasa'
                }).then((result) => {
                    window.location = "header.php?page=pd3phasa";
                })
            </script>
        <?php
        } elseif (($fasa_lama == "3 FASA") && ($fasa_baru == "1 FASA")) {
            $insert2 = "INSERT INTO tb_detail_pd_3ke1phs (id_perubahan_daya, pekerjaan_rab,uraianbiaya1_pd_3ke1phs,uraianbiaya2_pd_3ke1phs,uraianbiaya3_pd_3ke1phs,uraianbiaya4_pd_3ke1phs,uraianbiaya5_pd_3ke1phs,uraianbiaya6_pd_3ke1phs,uraianbiaya7_pd_3ke1phs,uraianbiaya8_pd_3ke1phs,uraianbiaya9_pd_3ke1phs,uraianbiaya10_pd_3ke1phs,uraianbiaya11_pd_3ke1phs,uraianbiaya12_pd_3ke1phs, total_biaya)
            VALUES 
            ('" . mysqli_insert_id($mysqli) . "', 'PD 3 FASA KE 1 FASA', '243040', '4210', '2724', '6895', '9358', '5615', '3842', '41008', '33625', '22982', '20856', '28086', '422241')";
            $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Data Pelanggan Perubahan Daya 3 Phasa dan Detail Biaya Pelanggan Perubahan Daya 3 Phasa ke 1 Phasa'
                }).then((result) => {
                    window.location = "header.php?page=pd3phasa";
                })
            </script>
<?php
        }
    }
}
?>


</html>