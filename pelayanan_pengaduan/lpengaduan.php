<?php
include '../koneksi.php';

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

        $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_pengaduan a JOIN tb_laporan_tekpen b ON a.id_pengaduan = b.id_pengaduan JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan WHERE a.status = 'Selesai' AND MONTH(tgl_masuk_laporan)='" . $_GET['bulan'] . "' AND YEAR(tgl_masuk_laporan)='" . $_GET['tahun'] . "'") or die($mysqli->error);

        $bulanA = $_GET['bulan'];
        $tahunA = $_GET['tahun'];

        $jumlah = mysqli_num_rows($result);
        $mulaitgl = $nama_bulan[$_GET['bulan']];
    } elseif ($filter == '2') {
        $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_pengaduan a JOIN tb_laporan_tekpen b ON a.id_pengaduan = b.id_pengaduan JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan  WHERE a.status = 'Selesai' AND YEAR(tgl_masuk_laporan)='" . $_GET['tahun'] . "'") or die($mysqli->error);

        $tahunA = $_GET['tahun'];
        $jumlah = mysqli_num_rows($result);
        $mulaitgl = date('Y', strtotime($tahunA));
    } elseif ($filter == '3') {
        $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_pengaduan a JOIN tb_laporan_tekpen b ON a.id_pengaduan = b.id_pengaduan JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan  WHERE a.status = 'Selesai' AND gangguan ='" . $_GET['gangguan'] . "'") or die($mysqli->error);

        $gangguanA = $_GET['gangguan'];
        $jumlah = mysqli_num_rows($result);
    } else {
        $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_pengaduan a JOIN tb_laporan_tekpen b ON a.id_pengaduan = b.id_pengaduan JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan  WHERE a.status = 'Selesai' AND DATE(tgl_masuk_laporan) BETWEEN '" . $_GET['tanggal'] . "' AND '" . $_GET['sampaitanggal'] . "'") or die($mysqli->error);

        $tgl1 = tgl_indo2(date('d-m-Y', strtotime($_GET['tanggal'])));
        $tgl2 = tgl_indo2(date('d-m-Y', strtotime($_GET['sampaitanggal'])));

        $jumlah = mysqli_num_rows($result);
    }
} else {
    $result = $mysqli->query("SELECT a.*, b.*, c.* FROM tb_pengaduan a JOIN tb_laporan_tekpen b ON a.id_pengaduan = b.id_pengaduan JOIN tb_pelanggan c ON c.idpel = a.id_pelanggan  WHERE a.status = 'Selesai'") or die($mysqli->error);

    $jumlah = mysqli_num_rows($result);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        LAPORAN PENGADUAN PELANGGAN
    </title>
</head>

<script type="text/javascript">
    window.print();
</script>

<body>
    <img src="../img/logopln.png" align="left" width="80">
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
                    LAPORAN PENGADUAN PELANGGAN <br>
                    BULAN <?php echo $mulaitgl ?> <?php echo $tahunA ?>

                <?php
                } elseif ($filter == 2) {
                ?>
                    LAPORAN PENGADUAN PELANGGAN <br>
                    TAHUN <?php echo $mulaitgl ?>
                <?php
                } elseif ($filter == 3) {
                ?>
                    LAPORAN PENGADUAN PELANGGAN <br>
                    DENGAN JENIS GANGGUAN : <br>
                    "<?php echo $gangguanA ?>"
                <?php
                } else {
                ?>
                    LAPORAN PENGADUAN PELANGGAN <br>
                    <?php echo $tgl1 ?> s.d <?php echo $tgl2 ?>
                <?php
                }
            } else {
                ?>
                LAPORAN PENGADUAN PELANGGAN <br>
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
                            <th style="text-align: center; font-size: 18px;">No Laporan</th>
                            <th style="text-align: center; font-size: 18px;">Identitas</th>
                            <th style="text-align: center; font-size: 18px;">Nama Pelapor</th>
                            <th style="text-align: center; font-size: 18px;">Alamat</th>
                            <th style="text-align: center; font-size: 18px;">Tanggal Masuk Pengaduan</th>
                            <th style="text-align: center; font-size: 18px;">Jenis Gangguan</th>
                            <th style="text-align: center; font-size: 18px;">Tanggal Mulai Perbaikan</th>
                            <th style="text-align: center; font-size: 18px;">Tanggal Selesai Perbaikan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $hitungrow = mysqli_num_rows($result);
                        $total = 0;
                        if ($hitungrow > 0) {
                            while ($tampil = mysqli_fetch_array($result)) {
                                $newdate = date("d-M-Y", strtotime($tampil['tgl_masuk_laporan']));
                                $newdate2 = date("d-M-Y", strtotime($tampil['tgl_mulai']));
                                $newdate3 = date("d-M-Y", strtotime($tampil['tgl_selesai']));
                        ?>
                                <tr>
                                    <td align="center"><?php echo $no++; ?></td>
                                    <td align="center"><?php echo $tampil['no_laporan']; ?></td>
                                    <td align="center"><?php echo $tampil['identitas']; ?></td>
                                    <td align="center"><?php echo $tampil['nama']; ?></td>
                                    <td align="center"><?php echo $tampil['alamat']; ?></td>
                                    <td align="center"><?php echo $newdate ?></td>
                                    <td align="center"><?php echo $tampil['gangguan']; ?></td>
                                    <td align="center"><?php echo $newdate2; ?></td>
                                    <td align="center"><?php echo $newdate3; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan='10' align="center" style="text-transform: uppercase; font-size: 30px; background-color: lightblue;">Data dengan filter yang dipilih tidak ditemukan!</td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br>
    <label>Jumlah Pengaduan : <?php echo "<b>" . $jumlah . "</b>"; ?></label>
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