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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Ubah Data Pasang Baru</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Pelanggan Pasang Baru</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <!-- PHP - Query Tombol Ubah dan SweetAlert -->
            <?php
            if (isset($_POST['ubah'])) {
                $id = $_POST['id_pasang_baru'];
                $tgl_mohon = $_POST['tgl_mohon'];
                $tarif_baru = $_POST['tarif_baru'];
                $daya_baru = $_POST['daya_baru'];
                $fasa_baru = $_POST['fasa_baru'];

                $update = "UPDATE tb_pasang_baru SET tgl_mohon='$tgl_mohon',
                                tarif_baru='$tarif_baru', daya_baru='$daya_baru', fasa_baru='$fasa_baru' WHERE id_pasang_baru=$id";
                $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));

                if ($fasa_baru == "1 FASA") {
                    $ambil1 = "PB 1 FASA";
                } elseif ($fasa_baru == "3 FASA") {
                    $ambil2 = "PB 3 FASA";
                }

                if ($query) {
                    if ($fasa_baru == "3 FASA") {
                        $hapusData = mysqli_query($mysqli, "DELETE FROM tb_detail_pb_1phs WHERE id_pasang_baru=$id");
                        $insertDataPerubahan = "INSERT INTO tb_detail_pb_3phs (id_pasang_baru,pekerjaan_rab, uraianbiaya1_pb3,uraianbiaya2_pb3,uraianbiaya3_pb3,uraianbiaya4_pb3,uraianbiaya5_pb3,uraianbiaya6_pb3,uraianbiaya7_pb3,uraianbiaya8_pb3,uraianbiaya9_pb3,uraianbiaya10_pb3,uraianbiaya11_pb3,uraianbiaya12_pb3,uraianbiaya13_pb3, total_biaya)
                        VALUES 
                        ('$id', '$ambil2', '1348000', '2400000', '2724', '29360', '12110','4433', '11722', '39400', '5615', '46811', '3482', '31339', '20856', '3990852')";
                        $query2 = mysqli_query($mysqli, $insertDataPerubahan) or die(mysqli_error($mysqli));
            ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses.',
                                text: 'Sukses Mengubah Data'
                            }).then((result) => {
                                window.location = "header.php?page=pb3phasa";
                            })
                        </script>
                    <?php
                    } elseif ($fasa_baru == "1 FASA") {
                        $hapusData = mysqli_query($mysqli, "DELETE FROM tb_detail_pb_3phs WHERE id_pasang_baru=$id");
                        $insertDataPerubahan = "INSERT INTO tb_detail_pb_1phs (id_pasang_baru, pekerjaan_rab, uraianbiaya1_pb1,uraianbiaya2_pb1,uraianbiaya3_pb1,uraianbiaya4_pb1,uraianbiaya5_pb1,uraianbiaya6_pb1,uraianbiaya7_pb1,uraianbiaya8_pb1,uraianbiaya9_pb1,uraianbiaya10_pb1,uraianbiaya11_pb1 ,total_biaya)
                        VALUES 
                        ('$id', '$ambil1', '243040', '4210', '2724','6895', '9358','5615', '3842', '41008', '33625', '22982', '20856', '394155')";
                        $query2 = mysqli_query($mysqli, $insertDataPerubahan) or die(mysqli_error($mysqli));
                    ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses.',
                                text: 'Sukses Mengubah Data'
                            }).then((result) => {
                                window.location = "header.php?page=pb1phasa";
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
            $tarif_baru = '';
            $daya_baru = '';
            $fasa_baru = '';
            $nama = '';
            if (isset($_GET['edit'])) {
                $id = $_GET['edit'];
                $result = $mysqli->query("SELECT a.no_registrasi, a.identitas, a.nama, a.alamat ,b.id_pasang_baru, b.id_pelanggan, b.jenis_transaksi, b.tgl_mohon, b.tarif_baru, b.daya_baru, b.fasa_baru FROM tb_pasang_baru b JOIN tb_pelanggan a ON b.id_pelanggan = a.id_pelanggan WHERE id_pasang_baru=$id") or die($mysqli->error);

                if ($result->num_rows) {
                    $row = $result->fetch_array();
                    $id_p = $row['id_pelanggan'];
                    $id_pelanggan = $row['no_registrasi'];
                    $identitas = $row['identitas'];
                    $nama = $row['nama'];
                    $alamat = $row['alamat'];
                    $jenis_transaksi = $row['jenis_transaksi'];
                    $tgl_mohon = $row['tgl_mohon'];
                    $tarif_baru = $row['tarif_baru'];
                    $daya_baru = $row['daya_baru'];
                    $fasa_baru = $row['fasa_baru'];
                }
            }
            ?>

            <form action="header.php?page=editpb&edit=<?php echo $row['id_pasang_baru'] ?>" method="post" name="form1">
                <input type="hidden" name="id_pasang_baru" value="<?php echo $id; ?>">

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
                    <input type="text" name="jenis_transaksi" class="form-control" value="Pasang Baru" disabled>
                </div>

                <div class="form-group">
                    <label for="">Tanggal Permohonan</label>
                    <input type="date" name="tgl_mohon" class="form-control" value="<?php echo $tgl_mohon ?>" required>
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