<?php
include '../../../../koneksi.php';

$no = 1;
// if (isset($_POST['cetak'])) {
//     $tgl1 = $_POST['tgl1'];
//     $tgl2 = $_POST['tgl2'];

// $data = mysqli_query($mysqli, "SELECT b.no_registrasi, b.nama,a.tarif_lama, a.daya_lama, a.tarif_baru, a.daya_baru, a.fasa_lama, a.fasa_baru, c.pekerjaan_rab, c.total_biaya FROM tb_pd_1phs a JOIN tb_pelanggan b ON a.id_pelanggan = b.id_pelanggan JOIN tb_hasil_perhitungan_pd_1phs c ON a.id_pd_1phs = c.id_pd_1phs");
// $jumlah = mysqli_num_rows($data);
// }

$bln = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
);

if (isset($_GET['filter']) && !empty($_GET['filter'])) {
    $filter = $_GET['filter'];

    if ($filter == '1') {
        $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_perubahan_daya a JOIN tb_pelanggan b ON a.id_pelanggan = b.id_pelanggan JOIN tb_hasil_perhitungan_pd_1phs_ke_3phs c ON a.id_perubahan_daya = c.id_perubahan_daya WHERE a.fasa_lama = '1 FASA' AND MONTH(tgl_mohon)='" . $_GET['bulan'] . "' AND YEAR(tgl_mohon)='" . $_GET['tahun'] . "'") or die($mysqli->error);
    } else {
        $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_perubahan_daya a JOIN tb_pelanggan b ON a.id_pelanggan = b.id_pelanggan JOIN tb_hasil_perhitungan_pd_1phs_ke_3phs c ON a.id_perubahan_daya = c.id_perubahan_daya WHERE a.fasa_lama = '1 FASA' AND YEAR(tgl_mohon)='" . $_GET['tahun'] . "'") or die($mysqli->error);
    }
} else {
    $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_perubahan_daya a JOIN tb_pelanggan b ON a.id_pelanggan = b.id_pelanggan JOIN tb_hasil_perhitungan_pd_1phs_ke_3phs c ON a.id_perubahan_daya = c.id_perubahan_daya WHERE a.fasa_lama = '1 FASA'") or die($mysqli->error);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN DATA DETAIL PELANGGAN PD 1 PHASA KE 3 PHASA</title>
</head>

<script type="text/javascript">
    window.print();
</script>

<body>
    <img src="../../../../img/logopln.png" align="left" width="80">
    <p align="center"><b>
            <font size="6">PT. PLN (PERSERO) UP3 CABANG BANJARMASIN</font> <br>
            <font size="4">Jl. Lambung Mangkurat No.12, Kertak Baru Ulu, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70114</font><br>
            <font size="4">Telepon : (0511) 3354992</font><br>
            <hr size="2px" color="black">
        </b></p>

    <h3>
        <center>
            LAPORAN DATA DETAIL PELANGGAN PD 1 PHASA KE 3 PHASA <br>
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr style="background-color: darkgrey" height="30px">
                            <th style="text-align: center; font-size: 18px;">No.</th>
                            <th style="text-align: center; font-size: 18px;">No Registrasi</th>
                            <th style="text-align: center; font-size: 18px;">Nama</th>
                            <th style="text-align: center; font-size: 18px;">Jenis Transaksi</th>
                            <th style="text-align: center; font-size: 18px;">Tanggal Mohon</th>
                            <th style="text-align: center; font-size: 18px;">Tarif Lama</th>
                            <th style="text-align: center; font-size: 18px;">Daya Lama</th>
                            <th style="text-align: center; font-size: 18px;">Tarif Baru</th>
                            <th style="text-align: center; font-size: 18px;">Daya Baru</th>
                            <th style="text-align: center; font-size: 18px;">Fasa Lama</th>
                            <th style="text-align: center; font-size: 18px;">Fasa Baru</th>
                            <th style="text-align: center; font-size: 18px;">Pekerjaan RAB</th>
                            <th style="text-align: center; font-size: 18px;">Total Biaya</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $hitungrow = mysqli_num_rows($result);
                        $total = 0;
                        if ($hitungrow > 0) {
                            while ($tampil = mysqli_fetch_array($result)) {
                                $newdate = date("d-M-Y", strtotime($tampil['tgl_mohon']))
                        ?>
                                <tr>
                                    <td align="center"><?php echo $no++; ?></td>
                                    <td align="center"><?php echo $tampil['no_registrasi']; ?></td>
                                    <td align="center"><?php echo $tampil['nama']; ?></td>
                                    <td align="center">Perubahan Daya</td>
                                    <td align="center"><?php echo $newdate ?></td>
                                    <td align="center"><?php echo $tampil['tarif_lama']; ?></td>
                                    <td align="center"><?php echo $tampil['daya_lama']; ?></td>
                                    <td align="center"><?php echo $tampil['tarif_baru']; ?></td>
                                    <td align="center"><?php echo $tampil['daya_baru']; ?></td>
                                    <td align="center"><?php echo $tampil['fasa_lama']; ?></td>
                                    <td align="center"><?php echo $tampil['fasa_baru']; ?></td>
                                    <td align="center"><?php echo $tampil['pekerjaan_rab']; ?></td>
                                    <td align="center">Rp.<?php echo number_format($tampil['total_biaya'], 0, ',', '.') ?></td>
                                </tr>
                            <?php
                                $total += $tampil['total_biaya'];
                            }
                            ?>
                            <tr>
                                <td colspan="12" align="right" style="font-size: 23px;"><b>Jumlah Total Biaya</b></td>
                                <td align="center">Rp.<?php echo number_format($total, 0, ',', '.')  ?></td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td colspan='13' align="center" style="text-transform: uppercase; font-size: 30px; background-color: lightblue;">Data dengan filter yang dipilih tidak ditemukan!</td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }

    // echo tgl_indo(date('Y-m-d')); // 21 Oktober 2017

    // echo "<br/>";
    // echo "<br/>";

    // echo tgl_indo("1994-02-15"); // 15 Februari 1994
    ?>
    <br>
    <div style="text-align: center; display: inline-block; float: right;">
        <h5>
            Banjarmasin, <?php echo tgl_indo(date('Y-m-d')); ?>
            <br>MANAGER UNIT PELAKSANA PELAYANAN <br> PELANGGAN BANJARMASIN,<br>
            <br><br><br><br><br><br>
            <U>SUDARTO<br></U>
        </h5>

    </div>


</body>

</html>