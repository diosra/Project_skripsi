<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Migrasi</title>

    <?php
    include_once '../header.php';
    ?>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Tambah Data Migrasi</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data Pelanggan Migrasi</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <form action="migrasi_input.php" method="post" name="form1">

                <?php
                $pelangganpd = '';
                $query = "SELECT * FROM tb_perubahan_daya WHERE SUBSTRING(tarif_lama,3)";
                $result = mysqli_query($mysqli, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $pelangganpd .= '<option value=""> ' . $row["tarif_lama"] . '</option>';
                }
                ?>

                <div class="form-group row">
                    <div class="col">
                        <label for="">Nomor Registrasi Pelanggan</label>
                        <select name="id_pelanggan" id="id_pelanggan" class="action form-control" required>
                            <option value="<?php echo $id_pelanggan ?>" disabled selected> Pilih </option>
                            <?php echo $pelangganpd ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Nama Pelanggan</label>
                        <p name="nama" id="nama"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Jenis Transaksi</label>
                    <input type="text" name="jenis_transaksi" class="form-control" value="Migrasi" disabled>
                </div>

                <div class="form-group">
                    <label for="">Tanggal Mohon</label>
                    <input type="date" name="tgl_mohon" class="form-control" value="tgl_mohon" required>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label for="">Tarif Lama</label>
                        <input type="text" name="tarif_lama" class="form-control" value="" placeholder="Masukkan Tarif lama Pelanggan" required>
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
                    <label for="">Cek Migrasi</label>
                    <input type="text" name="cek_migrasi" class="form-control" value="" disabled>
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
include_once '../footer.php';
?>

<!-- Script mengambil nama pelanggan sesuai nomor registrasi yang kita pilih -->
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

<!-- PHP - Query Tombol Save dan SweetAlert -->
<?php
if (isset($_POST['save'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $tgl_mohon = $_POST['tgl_mohon'];
    $tarif_baru = $_POST['tarif_baru'];
    $daya_baru = $_POST['daya_baru'];
    $fasa_baru = $_POST['fasa_baru'];

    $insert = "INSERT INTO tb_pasang_baru (id_pelanggan, jenis_transaksi,tgl_mohon, tarif_baru, daya_baru, fasa_baru) VALUES ('$id_pelanggan', 'Pasang Baru', '$tgl_mohon', '$tarif_baru','$daya_baru', '$fasa_baru')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($fasa_baru == "1 FASA") {
        $ambil1 = "PB 1 FASA";
    } elseif ($fasa_baru == "3 FASA") {
        $ambil2 = "PB 3 FASA";
    }

    if ($query) {
        if ($fasa_baru == "1 FASA") {
            $insert2 = "INSERT INTO tb_hasil_perhitungan_pb_1phs (id_pasang_baru, pekerjaan_rab, kwh_meter_prabayar_fase_tunggal, nfa_2X, segel_plastik, 
                cco_1T1, cco_3T1, isolasi_scotch, service_wedge_clamp_1phs, pasang_kwh_meter_satu_phasa_wiring, penarikan_sr_1_phasa,
                pengepresan_cco, survey, total_biaya)
                VALUES 
                ('" . mysqli_insert_id($mysqli) . "', '$ambil1', '243040', '4210', '2724','6895', '9358','5615', '3842', '41008', '33625', '22982', '20856', '394155')";
            $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Data Pelanggan Pasang Baru 1 Phasa'
                }).then((result) => {
                    window.location = "../../pelayananpenyambungan/pasang_baru/pb1phasa.php";
                })
            </script>
        <?php
        } elseif ($fasa_baru == "3 FASA") {
            $insert2 = "INSERT INTO tb_hasil_perhitungan_pb_3phs (id_pasang_baru,pekerjaan_rab, kwh_meter_3phs_pengukuran_langsung, box_app_1_pintu_pengukuran_langsung,
                segel_plastik, nfa_2x_3x35, nfa_2x_4x16, service_wedge_clamp_3phs, cco_3T3, skat_3, 
                isolasi_scotch, pemas_kwh_meter_3phs_tanpa_wiring, penarikan_sr_3phs, pengepresan_cco, survey, total_biaya)
                VALUES 
                ('" . mysqli_insert_id($mysqli) . "', '$ambil2', '1348000', '2400000', '2724', '29360', '12110','4433', '11722', '39400', '5615', '46811', '3482', '31339', '20856', '3990852')";
            $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Data Pelanggan Pasang Baru 3 Phasa'
                }).then((result) => {
                    window.location = "../../pelayananpenyambungan/pasang_baru/pb3phasa.php";
                })
            </script>
<?php
        }
    }
}
?>


</html>