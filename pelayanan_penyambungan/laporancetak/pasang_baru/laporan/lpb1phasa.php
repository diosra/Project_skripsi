<?php
include '../../../../koneksi.php';

$no = 1;

$bln = array(
    '01' => 'JANUARI',
    '02' => 'FEBRUARI',
    '03' => 'MARET',
    '04' => 'APRIL',
    '05' => 'MEI',
    '06' => 'JUNI',
    '07' => 'JULI',
    '08' => 'AGUSTUS',
    '09' => 'SEPTEMBER',
    '10' => 'OKTOBER',
    '11' => 'NOVEMBER',
    '12' => 'DESEMBER'
);

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

        $result = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_pasang_baru WHERE a.fasa_baru = '1 FASA' AND a.status_teknisi = '3' AND MONTH(tgl_masuk)='" . $_GET['bulan'] . "' AND YEAR(tgl_masuk)='" . $_GET['tahun'] . "'") or die($mysqli->error);

        $bulanA = $_GET['bulan'];
        $tahunA = $_GET['tahun'];
        $jumlah = mysqli_num_rows($result);

        $mulaitgl = $nama_bulan[$_GET['bulan']];
    } elseif ($filter == '2') {
        $result = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_pasang_baru WHERE a.fasa_baru = '1 FASA' AND a.status_teknisi = '3' AND YEAR(tgl_masuk)='" . $_GET['tahun'] . "'") or die($mysqli->error);

        $tahunA = $_GET['tahun'];
        $jumlah = mysqli_num_rows($result);
        $mulaitgl = date('Y', strtotime($tahunA));
    } elseif ($filter == '3') {
        $result = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_pasang_baru WHERE a.fasa_baru = '1 FASA' AND a.status_teknisi = '3' AND b.produk_layanan='" . $_GET['produk'] . "'") or die($mysqli->error);

        $produkA = $_GET['produk'];
        $jumlah = mysqli_num_rows($result);
    } else {
        $result = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_pasang_baru WHERE a.fasa_baru = '1 FASA' AND a.status_teknisi = '3' AND DATE(tgl_masuk) BETWEEN '" . $_GET['tanggal'] . "' AND '" . $_GET['sampaitanggal'] . "'") or die($mysqli->error);

        $tgl1 = tgl_indo2(date('d-m-Y', strtotime($_GET['tanggal'])));
        $tgl2 = tgl_indo2(date('d-m-Y', strtotime($_GET['sampaitanggal'])));

        $jumlah = mysqli_num_rows($result);
    }
} else {
    $result = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_pasang_baru WHERE a.fasa_baru = '1 FASA' AND a.status_teknisi = '3'") or die($mysqli->error);

    $jumlah = mysqli_num_rows($result);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN DATA PELANGGAN PASANG BARU 1 Fasa</title>
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
                    LAPORAN DATA PELANGGAN PASANG BARU 1 FASA <br>
                    BULAN <?php echo $mulaitgl ?> <?php echo $tahunA ?>
                <?php
                } elseif ($filter == 2) {
                ?>
                    LAPORAN DATA PELANGGAN PASANG BARU 1 FASA <br>
                    TAHUN <?php echo $mulaitgl ?>
                <?php
                } elseif ($filter == 3) {
                ?>
                    LAPORAN DATA PELANGGAN PASANG BARU 1 FASA <br>
                    PRODUK LAYANAN <?php echo $produkA ?>
                <?php
                } else {
                    $spasi = "s.d"
                ?>
                    LAPORAN DATA PELANGGAN PASANG BARU 1 FASA <br>
                    PENGAJUAN <?php echo $tgl1 ?> s.d <?php echo $tgl2 ?>
                <?php
                }
            } else {
                ?>
                LAPORAN DATA PELANGGAN PASANG BARU 1 FASA <br>
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
                            <th style="text-align: center; font-size: 18px;">No.</th>
                            <th style="text-align: center; font-size: 18px;">No.Registrasi</th>
                            <th style="text-align: center; font-size: 18px;">Identitas</th>
                            <th style="text-align: center; font-size: 18px;">Nama Pelanggan</th>
                            <th style="text-align: center; font-size: 18px;">Alamat</th>
                            <th style="text-align: center; font-size: 18px;">Produk Layanan</th>
                            <th style="text-align: center; font-size: 18px;">Token</th>
                            <th style="text-align: center; font-size: 18px;">Tanggal Pengajuan</th>
                            <th style="text-align: center; font-size: 18px;">Tanggal Pengerjaan</th>
                            <th style="text-align: center; font-size: 18px;">Tarif</th>
                            <th style="text-align: center; font-size: 18px;">Daya</th>
                            <th style="text-align: center; font-size: 18px;">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $harga = mysqli_query($mysqli, "SELECT HARGA_SATUAN FROM tb_harga WHERE KODE = 'PB 1 FASA'");
                        $hargaB = "";
                        $n = 0;
                        $hargatotal = 0;
                        while ($hargaambil = $harga->fetch_array()) {
                            $n = $n + $hargaambil[0];
                        }
                        $hargaB = $hargaB .
                            "<td align='center'>Rp." . number_format($n, 0, ',', '.') . "</td>";

                        $hitungrow = mysqli_num_rows($result);
                        $totalSemua = 0;
                        if ($hitungrow > 0) {
                            while ($tampil = mysqli_fetch_array($result)) {
                                $newdate = date("d-M-Y", strtotime($tampil['tgl_masuk']));
                                $newdate2 = date("d-M-Y", strtotime($tampil['tgl_selesai']));
                        ?>
                                <tr>
                                    <td align="center"><?php echo $no++; ?></td>
                                    <td align="center"><?php echo $tampil['no_registrasi']; ?></td>
                                    <td align="center"><?php echo $tampil['identitas']; ?></td>
                                    <td align="center"><?php echo $tampil['nama']; ?></td>
                                    <td align="center"><?php echo $tampil['alamat']; ?></td>
                                    <td align="center"><?php echo $tampil['produk_layanan']; ?></td>
                                    <td align="center"><?php echo $tampil['token']; ?></td>
                                    <td align="center"><?php echo $newdate ?></td>
                                    <td align="center"><?php echo $newdate2 ?></td>
                                    <td align="center"><?php echo $tampil['tarif']; ?></td>
                                    <td align="center"><?php echo $tampil['daya']; ?> VA</td>
                                    <td align="center">Rp. <?php echo number_format($tampil['total'], 0, ',', '.') ?></td>
                                    <?php
                                    // echo $hargaB;
                                    ?>
                                </tr>
                            <?php
                                // $hargatotal += $n;
                                $totalSemua += $tampil['total'];
                            }
                            ?>
                            <tr>
                                <td colspan="11" align="right" style="font-size: 23px;"><b>Jumlah Total Biaya</b></td>
                                <!-- <td align="center">Rp.<?php echo number_format($hargatotal, 0, ',', '.')  ?></td> -->
                                <td align="center">Rp. <?php echo number_format($totalSemua, 0, ',', '.') ?></td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td colspan='12' align="center" style="text-transform: uppercase; font-size: 30px; background-color: lightblue;">Data dengan filter yang dipilih tidak ditemukan!</td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br>
    <label>Jumlah Data : <?php echo "<b>" . $jumlah . "</b>"; ?></label>
    <br>

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