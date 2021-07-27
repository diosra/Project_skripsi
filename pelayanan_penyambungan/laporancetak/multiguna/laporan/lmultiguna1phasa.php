<?php
include '../../../../koneksi.php';

$no = 1;

function tgl_indo2($tanggal2)
{
    $bulan2 = array(
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
    $pecahkan2 = explode('-', $tanggal2);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan2[0] . ' ' . $bulan2[(int)$pecahkan2[1]] . ' ' . $pecahkan2[2];
}

if (isset($_GET['filter']) && !empty($_GET['filter'])) {
    $filter = $_GET['filter'];

    if ($filter == '1') {
        $nama_bulan = array('', 'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER');

        $result = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai, d.* FROM tb_multiguna a JOIN tb_mohon_multiguna b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_mlta JOIN tb_pelanggan d ON d.idpel = b.id_pelanggan WHERE a.fasa = '1 FASA' AND a.status_teknisi = '3' AND MONTH(tgl_masuk)='" . $_GET['bulan'] . "' AND YEAR(tgl_masuk)='" . $_GET['tahun'] . "'") or die($mysqli->error);

        $bulanA = $_GET['bulan'];
        $tahunA = $_GET['tahun'];
        $jumlah = mysqli_num_rows($result);

        $mulaitgl = $nama_bulan[$_GET['bulan']] . ' ' . date('Y', strtotime($tahunA));
    } elseif ($filter == '2') {
        $result = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai, d.* FROM tb_multiguna a JOIN tb_mohon_multiguna b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_mlta JOIN tb_pelanggan d ON d.idpel = b.id_pelanggan WHERE a.fasa = '1 FASA' AND a.status_teknisi = '3'  AND YEAR(tgl_masuk)='" . $_GET['tahun'] . "'") or die($mysqli->error);

        $tahunA = $_GET['tahun'];
        $jumlah = mysqli_num_rows($result);
        $mulaitgl = date('Y', strtotime($tahunA));
    } else {
        $result = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai, d.* FROM tb_multiguna a JOIN tb_mohon_multiguna b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_mlta JOIN tb_pelanggan d ON d.idpel = b.id_pelanggan WHERE a.fasa = '1 FASA' AND a.status_teknisi = '3' AND DATE(tgl_masuk) BETWEEN '" . $_GET['tanggal'] . "' AND '" . $_GET['sampaitanggal'] . "'") or die($mysqli->error);

        $tgl1 = tgl_indo2(date('d-m-Y', strtotime($_GET['tanggal'])));
        $tgl2 = tgl_indo2(date('d-m-Y', strtotime($_GET['sampaitanggal'])));

        $jumlah = mysqli_num_rows($result);
    }
} else {
    $result = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai, d.* FROM tb_multiguna a JOIN tb_mohon_multiguna b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_mlta JOIN tb_pelanggan d ON d.idpel = b.id_pelanggan WHERE a.fasa = '1 FASA' AND a.status_teknisi = '3'") or die($mysqli->error);

    $jumlah = mysqli_num_rows($result);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN DATA PELANGGAN MULTIGUNA 1 FASA</title>
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
            <?php
            if (isset($_GET['filter']) && !empty($_GET['filter'])) {
                $filter = $_GET['filter'];

                if ($filter == 1) {
            ?>
                    LAPORAN DATA PELANGGAN MULTIGUNA 1 FASA <br>
                    BULAN <?php echo $mulaitgl ?>
                <?php
                } elseif ($filter == 2) {
                ?>
                    LAPORAN DATA PELANGGAN MULTIGUNA 1 FASA <br>
                    TAHUN <?php echo $mulaitgl ?>
                <?php
                } else {
                    $spasi = "s.d"
                ?>
                    LAPORAN DATA PELANGGAN MULTIGUNA 1 FASA <br>
                    PENGAJUAN <?php echo $tgl1 ?> s.d <?php echo $tgl2 ?>
                <?php
                }
            } else {
                ?>
                LAPORAN DATA PELANGGAN MULTIGUNA 1 FASA <br>
            <?php
            }
            ?>
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr style="background-color: darkgrey" height="30px">
                            <th rowspan="2" style="text-align: center; font-size: 18px;">No.</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">No.Registrasi</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Identitas</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Nama Pelanggan</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Alamat</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Tanggal Pengajuan</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Tanggal Pengerjaan</th>
                            <th colspan="2" style="text-align: center; font-size: 18px;">Tanggal Pemakaian</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Lama Hari</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Daya</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Pemakaian</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Total Biaya</th>
                        </tr>
                        <tr style="background-color: darkgrey">
                            <th class="text-center">Mulai</th>
                            <th class="text-center">Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $hitungrow = mysqli_num_rows($result);
                        $totalSemua = 0;
                        if ($hitungrow > 0) {
                            while ($tampil = mysqli_fetch_array($result)) {
                                $newdate = date("d-M-Y", strtotime($tampil['tgl_masuk']));
                                $newdate2 = date("d-M-Y", strtotime($tampil['tgl_selesai']));
                                $newdate3 = date("d-M-Y", strtotime($tampil['tgl_mulai_pemakaian']));
                                $newdate4 = date("d-M-Y", strtotime($tampil['tgl_selesai_pemakaian']));
                        ?>
                                <tr>
                                    <td align="center"><?php echo $no++; ?></td>
                                    <td align="center"><?php echo $tampil['no_registrasi']; ?></td>
                                    <td align="center"><?php echo $tampil['identitas']; ?></td>
                                    <td align="center"><?php echo $tampil['nama']; ?></td>
                                    <td align="center"><?php echo $tampil['alamat']; ?></td>
                                    <td align="center"><?php echo $newdate ?></td>
                                    <td align="center"><?php echo $newdate2 ?></td>
                                    <td align="center"><?php echo $newdate3 ?></td>
                                    <td align="center"><?php echo $newdate4 ?></td>
                                    <td align="center"><?php echo $tampil['lamahari']; ?> Hari</td>
                                    <td align="center"><?php echo $tampil['daya']; ?> VA</td>
                                    <td align="center"><?php echo $tampil['pemakaian']; ?></td>
                                    <td align="center">Rp.<?php echo number_format($tampil['total'], 0, ',', '.') ?></td>
                                </tr>
                            <?php
                                $totalSemua += $tampil['total'];
                            }
                            ?>
                            <tr>
                                <td colspan="12" align="right" style="font-size: 23px;"><b>Jumlah Total Biaya</b></td>
                                <td align="center">Rp. <?php echo number_format($totalSemua, 0, ',', '.') ?></td>
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

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }
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