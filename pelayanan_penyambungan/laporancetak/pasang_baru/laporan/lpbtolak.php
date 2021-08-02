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

        $result = $mysqli->query("SELECT a.*,b.id_mohon AS pb_mohon,c.id_mohon AS tbpb_mohon,b.no_registrasi AS jt_pb,b.tgl_masuk AS tgl_pb,d.id_mohon AS pd_mohon,e.id_mohon AS tbpd_mohon,d.no_registrasi AS jt_pd,d.tgl_masuk AS tgl_pd,f.id_mohon AS ps_mohon,g.id_mohon AS tbps_mohon,f.tgl_masuk AS tgl_ps,f.no_registrasi AS jt_ps,h.idpel,h.identitas,h.nama,h.alamat,i.* , c.jenis_transaksi AS jt_pb2, e.jenis_transaksi AS jt_pd2, g.jenis_transaksi AS jt_ps2 FROM tb_laporan_survey a JOIN tb_survey_lap_masuk i ON a.id_survey_lap = i.id_survey_lap LEFT JOIN tb_mohon_pb b ON a.id_mohon_survey = b.id_mohon LEFT JOIN tb_pasang_baru c ON b.id_mohon = c.id_mohon LEFT JOIN tb_mohon_pd d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_perubahan_daya e ON d.id_mohon = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon LEFT JOIN tb_multiguna g ON f.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan h ON h.idpel = b.id_pelanggan OR h.idpel = d.id_pelanggan OR h.idpel = f.id_pelanggan WHERE a.status = '4' AND MONTH(tgl_selesai)='" . $_GET['bulan'] . "' AND YEAR(tgl_selesai)='" . $_GET['tahun'] . "' ORDER BY a.tgl_selesai ASC") or die($mysqli->error);

        $bulanA = $_GET['bulan'];
        $tahunA = $_GET['tahun'];
        $jumlah = mysqli_num_rows($result);

        $mulaitgl = $nama_bulan[$_GET['bulan']];
    } elseif ($filter == '2') {
        $result = $mysqli->query("SELECT a.*,b.id_mohon AS pb_mohon,c.id_mohon AS tbpb_mohon,b.no_registrasi AS jt_pb,b.tgl_masuk AS tgl_pb,d.id_mohon AS pd_mohon,e.id_mohon AS tbpd_mohon,d.no_registrasi AS jt_pd,d.tgl_masuk AS tgl_pd,f.id_mohon AS ps_mohon,g.id_mohon AS tbps_mohon,f.tgl_masuk AS tgl_ps,f.no_registrasi AS jt_ps,h.idpel,h.identitas,h.nama,h.alamat,i.* , c.jenis_transaksi AS jt_pb2, e.jenis_transaksi AS jt_pd2, g.jenis_transaksi AS jt_ps2 FROM tb_laporan_survey a JOIN tb_survey_lap_masuk i ON a.id_survey_lap = i.id_survey_lap LEFT JOIN tb_mohon_pb b ON a.id_mohon_survey = b.id_mohon LEFT JOIN tb_pasang_baru c ON b.id_mohon = c.id_mohon LEFT JOIN tb_mohon_pd d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_perubahan_daya e ON d.id_mohon = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon LEFT JOIN tb_multiguna g ON f.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan h ON h.idpel = b.id_pelanggan OR h.idpel = d.id_pelanggan OR h.idpel = f.id_pelanggan WHERE a.status = '4' AND YEAR(tgl_selesai)='" . $_GET['tahun'] . "' ORDER BY a.tgl_selesai ASC") or die($mysqli->error);

        $tahunA = $_GET['tahun'];
        $jumlah = mysqli_num_rows($result);
        $mulaitgl = date('Y', strtotime($tahunA));
    } elseif ($filter == '4') {
        $result = $mysqli->query("SELECT a.*,b.id_mohon AS pb_mohon,c.id_mohon AS tbpb_mohon,b.no_registrasi AS jt_pb,b.tgl_masuk AS tgl_pb,d.id_mohon AS pd_mohon,e.id_mohon AS tbpd_mohon,d.no_registrasi AS jt_pd,d.tgl_masuk AS tgl_pd,f.id_mohon AS ps_mohon,g.id_mohon AS tbps_mohon,f.tgl_masuk AS tgl_ps,f.no_registrasi AS jt_ps,h.idpel,h.identitas,h.nama,h.alamat,i.* , c.jenis_transaksi AS jt_pb2, e.jenis_transaksi AS jt_pd2, g.jenis_transaksi AS jt_ps2 FROM tb_laporan_survey a JOIN tb_survey_lap_masuk i ON a.id_survey_lap = i.id_survey_lap LEFT JOIN tb_mohon_pb b ON a.id_mohon_survey = b.id_mohon LEFT JOIN tb_pasang_baru c ON b.id_mohon = c.id_mohon LEFT JOIN tb_mohon_pd d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_perubahan_daya e ON d.id_mohon = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon LEFT JOIN tb_multiguna g ON f.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan h ON h.idpel = b.id_pelanggan OR h.idpel = d.id_pelanggan OR h.idpel = f.id_pelanggan WHERE a.status = '4' AND DATE(tgl_selesai) BETWEEN '" . $_GET['tanggal'] . "' AND '" . $_GET['sampaitanggal'] . "' ORDER BY a.tgl_selesai ASC") or die($mysqli->error);

        $tgl1 = tgl_indo2(date('d-m-Y', strtotime($_GET['tanggal'])));
        $tgl2 = tgl_indo2(date('d-m-Y', strtotime($_GET['sampaitanggal'])));

        $jumlah = mysqli_num_rows($result);
    } elseif ($filter == '5') {
        $result = $mysqli->query("SELECT a.*,b.id_mohon AS pb_mohon,c.id_mohon AS tbpb_mohon,b.no_registrasi AS jt_pb,b.tgl_masuk AS tgl_pb,d.id_mohon AS pd_mohon,e.id_mohon AS tbpd_mohon,d.no_registrasi AS jt_pd,d.tgl_masuk AS tgl_pd,f.id_mohon AS ps_mohon,g.id_mohon AS tbps_mohon,f.tgl_masuk AS tgl_ps,f.no_registrasi AS jt_ps,h.idpel,h.identitas,h.nama,h.alamat,i.* , c.jenis_transaksi AS jt_pb2, e.jenis_transaksi AS jt_pd2, g.jenis_transaksi AS jt_ps2 FROM tb_laporan_survey a JOIN tb_survey_lap_masuk i ON a.id_survey_lap = i.id_survey_lap LEFT JOIN tb_mohon_pb b ON a.id_mohon_survey = b.id_mohon LEFT JOIN tb_pasang_baru c ON b.id_mohon = c.id_mohon LEFT JOIN tb_mohon_pd d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_perubahan_daya e ON d.id_mohon = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon LEFT JOIN tb_multiguna g ON f.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan h ON h.idpel = b.id_pelanggan OR h.idpel = d.id_pelanggan OR h.idpel = f.id_pelanggan WHERE a.status = '4' AND (c.jenis_transaksi='" . $_GET['jenis'] . "' OR e.jenis_transaksi ='" . $_GET['jenis'] . "' OR g.jenis_transaksi ='" . $_GET['jenis'] . "')ORDER BY a.tgl_selesai ASC") or die($mysqli->error);

        $jenis = $_GET['jenis'];
        $jumlah = mysqli_num_rows($result);
    }
} else {
    $result = $mysqli->query("SELECT a.*,b.id_mohon AS pb_mohon,c.id_mohon AS tbpb_mohon,b.no_registrasi AS jt_pb,b.tgl_masuk AS tgl_pb,d.id_mohon AS pd_mohon,e.id_mohon AS tbpd_mohon,d.no_registrasi AS jt_pd,d.tgl_masuk AS tgl_pd,f.id_mohon AS ps_mohon,g.id_mohon AS tbps_mohon,f.tgl_masuk AS tgl_ps,f.no_registrasi AS jt_ps,h.idpel,h.identitas,h.nama,h.alamat,i.* , c.jenis_transaksi AS jt_pb2, e.jenis_transaksi AS jt_pd2, g.jenis_transaksi AS jt_ps2 FROM tb_laporan_survey a JOIN tb_survey_lap_masuk i ON a.id_survey_lap = i.id_survey_lap LEFT JOIN tb_mohon_pb b ON a.id_mohon_survey = b.id_mohon LEFT JOIN tb_pasang_baru c ON b.id_mohon = c.id_mohon LEFT JOIN tb_mohon_pd d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_perubahan_daya e ON d.id_mohon = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon LEFT JOIN tb_multiguna g ON f.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan h ON h.idpel = b.id_pelanggan OR h.idpel = d.id_pelanggan OR h.idpel = f.id_pelanggan WHERE a.status = '4' ORDER BY a.tgl_selesai ASC") or die($mysqli->error);

    $jumlah = mysqli_num_rows($result);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN DATA PENGAJUAN DITOLAK</title>
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
                    LAPORAN DATA PENGAJUAN DITOLAK <br>
                    BULAN <?php echo $mulaitgl ?> <?php echo $tahunA ?>
                <?php
                } elseif ($filter == 2) {
                ?>
                    LAPORAN DATA PENGAJUAN DITOLAK <br>
                    TAHUN <?php echo $mulaitgl ?>
                <?php
                } elseif ($filter == 4) {
                    $spasi = "s.d"
                ?>
                    LAPORAN DATA PENGAJUAN DITOLAK <br>
                    TANGGAL <?php echo $tgl1 ?> s.d <?php echo $tgl2 ?>
                <?php
                } elseif ($filter == 5) {
                ?>
                    LAPORAN DATA PENGAJUAN DITOLAK <br>
                    JENIS PENGAJUAN <?php echo $jenis ?>
                <?php
                }
            } else {
                ?>
                LAPORAN DATA PENGAJUAN DITOLAK <br>
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
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Nama Pemohon</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Alamat</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Jenis Pengajuan</th>
                            <th colspan="2" style="text-align: center; font-size: 18px;">Tanggal</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Alasan Penolakan</th>
                        </tr>
                        <tr style="background-color: darkgrey">
                            <th>Pengajuan</th>
                            <th>Ditolak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $harga = mysqli_query($mysqli, "SELECT HARGA_SATUAN FROM tb_harga WHERE KODE = 'PB 1 FASA'");
                        // $hargaB = "";
                        // $n = 0;
                        // $hargatotal = 0;
                        // while ($hargaambil = $harga->fetch_array()) {
                        //     $n = $n + $hargaambil[0];
                        // }
                        // $hargaB = $hargaB .
                        //     "<td align='center'>Rp." . number_format($n, 0, ',', '.') . "</td>";

                        $hitungrow = mysqli_num_rows($result);
                        // $totalSemua = 0;
                        if ($hitungrow > 0) {
                            while ($tampil = mysqli_fetch_array($result)) {
                                $tipe = $tampil['tipe'];
                                $newdate2 = date("d-M-Y", strtotime($tampil['tgl_selesai']));
                        ?>
                                <tr>
                                    <td align="center"><?php echo $no++; ?></td>
                                    <?php
                                    if ($tipe == "Survey Pasang Baru") {
                                    ?>
                                        <td align="center"><?php echo $tampil['jt_pb']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Survey Perubahan Daya") {
                                    ?>
                                        <td align="center"><?php echo $tampil['jt_pd']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Survey Penyambungan Sementara") {
                                    ?>
                                        <td align="center"><?php echo $tampil['jt_ps']; ?></td>
                                    <?php
                                    }
                                    ?>
                                    <td align="center"><?php echo $tampil['identitas']; ?></td>
                                    <td align="center"><?php echo $tampil['nama']; ?></td>
                                    <td align="center"><?php echo $tampil['alamat']; ?></td>
                                    <?php
                                    if ($tipe == "Survey Pasang Baru") {
                                    ?>
                                        <td align="center"><?php echo $tampil['jt_pb2']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Survey Perubahan Daya") {
                                    ?>
                                        <td align="center"><?php echo $tampil['jt_pd2']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Survey Penyambungan Sementara") {
                                    ?>
                                        <td align="center"><?php echo $tampil['jt_ps2']; ?></td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($tipe == "Survey Pasang Baru") {
                                    ?>
                                        <td align="center"><?php echo date("d-M-Y", strtotime($tampil['tgl_pb'])); ?></td>
                                    <?php
                                    } elseif ($tipe == "Survey Perubahan Daya") {
                                    ?>
                                        <td align="center"><?php echo date("d-M-Y", strtotime($tampil['tgl_pd'])); ?></td>
                                    <?php
                                    } elseif ($tipe == "Survey Penyambungan Sementara") {
                                    ?>
                                        <td align="center"><?php echo date("d-M-Y", strtotime($tampil['tgl_ps'])); ?></td>
                                    <?php
                                    }
                                    ?>
                                    <td align="center"><?php echo $newdate2 ?></td>
                                    <td align="center"><?php echo $tampil['alasan_penolakan']; ?></td>
                                </tr>
                            <?php
                                // $hargatotal += $n;
                                // $totalSemua += $tampil['total'];
                            }
                            ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan='9' align="center" style="text-transform: uppercase; font-size: 30px; background-color: lightblue;">Data dengan filter yang dipilih tidak ditemukan!</td>
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