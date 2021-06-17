<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pasang Baru</title>

    <?php
    $pageSkr = 'pd';
    include_once '../header.php';
    ?>

    <script src="process.js"></script> <!-- Load file process.js -->
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Permohonan Perubahan Daya</u></h1>
    </div>

    <!-- Card untuk Form -->

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <label for="">No Registrasi</label>
                    <input type="text" id="noreg" name="no_registrasi" class="form-control">
                    <button type="button" id="btn-search" class="btn btn-primary mt-2">Cari</button>
                    <a href="menu_pd.php" class="btn btn-warning mt-2">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <!-- Form Utama -->
        <div class="card-body">
            <form action="menu_pd.php" method="post" name="form1">

                <h3 class="mb-4"><u>Data Pemohon</u></h3>

                <!-- <div class="form-group">
                    <label for="">Nomor Registrasi</label>
                    <select id="noreg" name="no_registrasi" class="form-control" onchange="changeValueNama(this.value)" required>
                        <option disabled selected>Pilih</option>

                        <?php
                        // $query = "SELECT * FROM tb_tes_input_pb";
                        // $result = mysqli_query($mysqli, $query);
                        // $jsArray = "var prdName = new Array();\n";
                        // while ($data = mysqli_fetch_array($result)) {
                        //     echo '<option value="' . $data['no_registrasi'] . '">' . $data['no_registrasi'] . '</option> ';
                        //     $jsArray .=
                        //         "prdName['" . $data['no_registrasi'] . "'] = {nama:'" . addslashes($data['nama']) . "'};\n";
                        // }
                        ?>
                    </select>
                </div> -->

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" cols="10" rows="3" required></textarea>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">No. HP</label>
                            <input type="number" name="tgl_mohon" id="nohp" class="form-control" value="" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">No. Telp</label>
                            <input type="number" name="tgl_mohon" id="notelp" class="form-control" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="tgl_mohon" class="form-control" id="email" required>
                </div>

                <div class="form-group">
                    <label for="">Identitas</label>
                    <input type="email" name="tgl_mohon" class="form-control" id="identitas" value="" required>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tarif Lama</label>
                            <input type="text" name="jenis_transaksi" id="tarif_lama" class="form-control" value="" required disabled>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Daya Lama</label>
                            <input type="text" name="jenis_transaksi" id="daya" class="form-control" value="" required disabled>
                        </div>
                    </div>
                </div>

                <hr class="font-weight-bolder my-4">

                <h3 class="mb-4"><u>Tarif / Daya Baru</u></h3>

                <div class="form-group">
                    <label for="">Produk Layanan</label>
                    <select name="fasa_baru" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>PASCABAYAR</option>
                        <option>PRABAYAR</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Daya</label>
                    <select name="fasa_baru" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>450</option>
                        <option>900</option>
                        <option>1300</option>
                        <option>2200</option>
                        <option>3500</option>
                        <option>4400</option>
                        <option>5500</option>
                        <option>6600</option>
                        <option>7700</option>
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

<script type="text/javascript">
    <?php echo $jsArray ?>

    function changeValueNama(x) {
        document.getElementById('nama').value = prdName[x].nama;
    }
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