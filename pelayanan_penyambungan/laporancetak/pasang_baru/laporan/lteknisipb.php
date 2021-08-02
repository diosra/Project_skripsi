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

        $result = $mysqli->query("SELECT a.*,b.*,d.no_teknisi, d.nama AS nama_teknisi, e.id_pasang_baru,e.id_mohon, e.pekerjaan_rab AS pb_rab, f.id_perubahan_daya,f.id_mohon, f.pekerjaan_rab AS pd_rab, g.id_mlta, g.id_mohon,g.pekerjaan_rab AS mlta_rab, h.id_mohon,h.id_pelanggan, h.no_registrasi AS noreg_pb, i.id_mohon,i.id_pelanggan,i.no_registrasi AS noreg_pd, j.id_mohon,j.id_pelanggan,j.no_registrasi AS noreg_ps, k.* FROM tb_tekyan_lap_masuk a JOIN tb_laporan_tekyan b ON a.id_tekyanlap = b.id_tekyanlap JOIN tb_teknisi_penyambungan d ON a.id_teknisi = d.no_teknisi LEFT JOIN tb_pasang_baru e ON e.id_pasang_baru = a.id_yanbung LEFT JOIN tb_perubahan_daya f ON f.id_perubahan_daya = a.id_yanbung LEFT JOIN tb_multiguna g ON g.id_mlta = a.id_yanbung LEFT JOIN tb_mohon_pb h ON h.id_mohon = e.id_mohon LEFT JOIN tb_mohon_pd i ON i.id_mohon = f.id_mohon LEFT JOIN tb_mohon_multiguna j ON j.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan k ON k.idpel = h.id_pelanggan OR k.idpel = i.id_pelanggan OR k.idpel = j.id_pelanggan WHERE a.pegawai_acc = '1' AND b.status = '3' AND MONTH(tgl_selesai)='" . $_GET['bulan'] . "' AND YEAR(tgl_selesai)='" . $_GET['tahun'] . "'  ORDER BY b.tgl_selesai ASC") or die($mysqli->error);

        $bulanA = $_GET['bulan'];
        $tahunA = $_GET['tahun'];
        $jumlah = mysqli_num_rows($result);

        $mulaitgl = $nama_bulan[$_GET['bulan']];
    } elseif ($filter == '2') {
        $result = $mysqli->query("SELECT a.*,b.*,d.no_teknisi, d.nama AS nama_teknisi, e.id_pasang_baru,e.id_mohon, e.pekerjaan_rab AS pb_rab, f.id_perubahan_daya,f.id_mohon, f.pekerjaan_rab AS pd_rab, g.id_mlta, g.id_mohon,g.pekerjaan_rab AS mlta_rab, h.id_mohon,h.id_pelanggan, h.no_registrasi AS noreg_pb, i.id_mohon,i.id_pelanggan,i.no_registrasi AS noreg_pd, j.id_mohon,j.id_pelanggan,j.no_registrasi AS noreg_ps, k.* FROM tb_tekyan_lap_masuk a JOIN tb_laporan_tekyan b ON a.id_tekyanlap = b.id_tekyanlap JOIN tb_teknisi_penyambungan d ON a.id_teknisi = d.no_teknisi LEFT JOIN tb_pasang_baru e ON e.id_pasang_baru = a.id_yanbung LEFT JOIN tb_perubahan_daya f ON f.id_perubahan_daya = a.id_yanbung LEFT JOIN tb_multiguna g ON g.id_mlta = a.id_yanbung LEFT JOIN tb_mohon_pb h ON h.id_mohon = e.id_mohon LEFT JOIN tb_mohon_pd i ON i.id_mohon = f.id_mohon LEFT JOIN tb_mohon_multiguna j ON j.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan k ON k.idpel = h.id_pelanggan OR k.idpel = i.id_pelanggan OR k.idpel = j.id_pelanggan WHERE a.pegawai_acc = '1' AND b.status = '3' AND YEAR(tgl_selesai)='" . $_GET['tahun'] . "'  ORDER BY b.tgl_selesai ASC") or die($mysqli->error);

        $tahunA = $_GET['tahun'];
        $jumlah = mysqli_num_rows($result);
        $mulaitgl = date('Y', strtotime($tahunA));
    } elseif ($filter == '4') {
        $result = $mysqli->query("SELECT a.*,b.*,d.no_teknisi, d.nama AS nama_teknisi, e.id_pasang_baru,e.id_mohon, e.pekerjaan_rab AS pb_rab, f.id_perubahan_daya,f.id_mohon, f.pekerjaan_rab AS pd_rab, g.id_mlta, g.id_mohon,g.pekerjaan_rab AS mlta_rab, h.id_mohon,h.id_pelanggan, h.no_registrasi AS noreg_pb, i.id_mohon,i.id_pelanggan,i.no_registrasi AS noreg_pd, j.id_mohon,j.id_pelanggan,j.no_registrasi AS noreg_ps, k.* FROM tb_tekyan_lap_masuk a JOIN tb_laporan_tekyan b ON a.id_tekyanlap = b.id_tekyanlap JOIN tb_teknisi_penyambungan d ON a.id_teknisi = d.no_teknisi LEFT JOIN tb_pasang_baru e ON e.id_pasang_baru = a.id_yanbung LEFT JOIN tb_perubahan_daya f ON f.id_perubahan_daya = a.id_yanbung LEFT JOIN tb_multiguna g ON g.id_mlta = a.id_yanbung LEFT JOIN tb_mohon_pb h ON h.id_mohon = e.id_mohon LEFT JOIN tb_mohon_pd i ON i.id_mohon = f.id_mohon LEFT JOIN tb_mohon_multiguna j ON j.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan k ON k.idpel = h.id_pelanggan OR k.idpel = i.id_pelanggan OR k.idpel = j.id_pelanggan WHERE a.pegawai_acc = '1' AND b.status = '3' AND DATE(tgl_selesai) BETWEEN '" . $_GET['tanggal'] . "' AND '" . $_GET['sampaitanggal'] . "'  ORDER BY b.tgl_selesai ASC") or die($mysqli->error);

        $tgl1 = tgl_indo2(date('d-m-Y', strtotime($_GET['tanggal'])));
        $tgl2 = tgl_indo2(date('d-m-Y', strtotime($_GET['sampaitanggal'])));

        $jumlah = mysqli_num_rows($result);
    } elseif ($filter == '5') {
        $result = $mysqli->query("SELECT a.*,b.*,d.no_teknisi, d.nama AS nama_teknisi, e.id_pasang_baru,e.id_mohon, e.pekerjaan_rab AS pb_rab, f.id_perubahan_daya,f.id_mohon, f.pekerjaan_rab AS pd_rab, g.id_mlta, g.id_mohon,g.pekerjaan_rab AS mlta_rab, h.id_mohon,h.id_pelanggan, h.no_registrasi AS noreg_pb, i.id_mohon,i.id_pelanggan,i.no_registrasi AS noreg_pd, j.id_mohon,j.id_pelanggan,j.no_registrasi AS noreg_ps, k.* FROM tb_tekyan_lap_masuk a JOIN tb_laporan_tekyan b ON a.id_tekyanlap = b.id_tekyanlap JOIN tb_teknisi_penyambungan d ON a.id_teknisi = d.no_teknisi LEFT JOIN tb_pasang_baru e ON e.id_pasang_baru = a.id_yanbung LEFT JOIN tb_perubahan_daya f ON f.id_perubahan_daya = a.id_yanbung LEFT JOIN tb_multiguna g ON g.id_mlta = a.id_yanbung LEFT JOIN tb_mohon_pb h ON h.id_mohon = e.id_mohon LEFT JOIN tb_mohon_pd i ON i.id_mohon = f.id_mohon LEFT JOIN tb_mohon_multiguna j ON j.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan k ON k.idpel = h.id_pelanggan OR k.idpel = i.id_pelanggan OR k.idpel = j.id_pelanggan WHERE a.pegawai_acc = '1' AND b.status = '3' AND a.tipe='" . $_GET['pengajuan'] . "' ORDER BY b.tgl_selesai ASC") or die($mysqli->error);

        $pengajuanA = $_GET['pengajuan'];
        $jumlah = mysqli_num_rows($result);
    }
} else {
    $result = $mysqli->query("SELECT a.*,b.*,d.no_teknisi, d.nama AS nama_teknisi, e.id_pasang_baru,e.id_mohon, e.pekerjaan_rab AS pb_rab, f.id_perubahan_daya,f.id_mohon, f.pekerjaan_rab AS pd_rab, g.id_mlta, g.id_mohon,g.pekerjaan_rab AS mlta_rab, h.id_mohon,h.id_pelanggan, h.no_registrasi AS noreg_pb, i.id_mohon,i.id_pelanggan,i.no_registrasi AS noreg_pd, j.id_mohon,j.id_pelanggan,j.no_registrasi AS noreg_ps, k.* FROM tb_tekyan_lap_masuk a JOIN tb_laporan_tekyan b ON a.id_tekyanlap = b.id_tekyanlap JOIN tb_teknisi_penyambungan d ON a.id_teknisi = d.no_teknisi LEFT JOIN tb_pasang_baru e ON e.id_pasang_baru = a.id_yanbung LEFT JOIN tb_perubahan_daya f ON f.id_perubahan_daya = a.id_yanbung LEFT JOIN tb_multiguna g ON g.id_mlta = a.id_yanbung LEFT JOIN tb_mohon_pb h ON h.id_mohon = e.id_mohon LEFT JOIN tb_mohon_pd i ON i.id_mohon = f.id_mohon LEFT JOIN tb_mohon_multiguna j ON j.id_mohon = g.id_mohon LEFT JOIN tb_pelanggan k ON k.idpel = h.id_pelanggan OR k.idpel = i.id_pelanggan OR k.idpel = j.id_pelanggan WHERE a.pegawai_acc = '1' AND b.status = '3' ORDER BY b.tgl_selesai ASC") or die($mysqli->error);

    $jumlah = mysqli_num_rows($result);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN DATA HASIL TEKNISI PELAYANAN PENYAMBUNGAN</title>
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
                    LAPORAN DATA HASIL TEKNISI PELAYANAN PENYAMBUNGAN <br>
                    BULAN <?php echo $mulaitgl ?> <?php echo $tahunA ?>
                <?php
                } elseif ($filter == 2) {
                ?>
                    LAPORAN DATA HASIL TEKNISI PELAYANAN PENYAMBUNGAN <br>
                    TAHUN <?php echo $mulaitgl ?>
                <?php
                } elseif ($filter == 4) {
                    $spasi = "s.d"
                ?>
                    LAPORAN DATA HASIL TEKNISI PELAYANAN PENYAMBUNGAN <br>
                    TANGGAL PENGERJAAN <?php echo $tgl1 ?> s.d <?php echo $tgl2 ?>
                <?php
                } elseif ($filter == 5) {
                ?>
                    LAPORAN DATA HASIL TEKNISI PELAYANAN PENYAMBUNGAN <br>
                    PENGAJUAN <?php echo $pengajuanA ?>
                <?php
                }
            } else {
                ?>
                LAPORAN DATA HASIL TEKNISI PELAYANAN PENYAMBUNGAN <br>
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
                            <!-- <th rowspan="2" style="text-align: center; font-size: 18px;">Identitas</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Nama Pelanggan</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Alamat</th> -->
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Pengajuan</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Pekerjaan RAB</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">ID Teknisi</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Teknisi</th>
                            <th colspan="2" style="text-align: center; font-size: 18px;">Tanggal Pengerjaan</th>
                            <th rowspan="2" style="text-align: center; font-size: 18px;">Laporan Teknisi</th>
                        </tr>
                        <tr style="background-color: darkgrey">
                            <th>Mulai</th>
                            <th>Selesai</th>
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
                                $newdate = date("d-M-Y", strtotime($tampil['tgl_mulai']));
                                $newdate2 = date("d-M-Y", strtotime($tampil['tgl_selesai']));
                                $tipe = $tampil['tipe'];
                        ?>
                                <tr>
                                    <td align="center"><?php echo $no++; ?></td>
                                    <?php
                                    if ($tipe == "Pasang Baru") {
                                    ?>
                                        <td class="align-middle"><?php echo $tampil['noreg_pb']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Perubahan Daya") {
                                    ?>
                                        <td class="align-middle"><?php echo $tampil['noreg_pd']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Penyambungan Sementara") {
                                    ?>
                                        <td class="align-middle"><?php echo $tampil['noreg_ps']; ?></td>
                                    <?php
                                    }
                                    ?>
                                    <!-- <td align="center"><?php echo $tampil['identitas']; ?></td>
                                    <td align="center"><?php echo $tampil['nama']; ?></td>
                                    <td align="center"><?php echo $tampil['alamat']; ?></td> -->
                                    <td align="center"><?php echo $tampil['tipe']; ?></td>
                                    <?php
                                    if ($tipe == "Pasang Baru") {
                                    ?>
                                        <td class="align-middle"><?php echo $tampil['pb_rab']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Perubahan Daya") {
                                    ?>
                                        <td class="align-middle"><?php echo $tampil['pd_rab']; ?></td>
                                    <?php
                                    } elseif ($tipe == "Penyambungan Sementara") {
                                    ?>
                                        <td class="align-middle"><?php echo $tampil['mlta_rab']; ?></td>
                                    <?php
                                    }
                                    ?>
                                    <td align="center"><?php echo $tampil['no_teknisi']; ?></td>
                                    <td align="center"><?php echo $tampil['nama_teknisi']; ?></td>
                                    <td align="center"><?php echo $newdate ?></td>
                                    <td align="center"><?php echo $newdate2 ?></td>
                                    <td align="center"><?php echo $tampil['laporan']; ?></td>
                                    <?php
                                    // echo $hargaB;
                                    ?>
                                </tr>
                            <?php
                                // $hargatotal += $n;
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