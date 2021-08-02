<html>

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>

<body>
    <div style="float: left;margin-right: 10px;">
        <img src="cid:logo_PLN" alt="Logo" style="height: 50px">
    </div>
    <h2 style="margin-bottom: 0;">PT. PLN (PERSERO) UP3 Banjarmasin</h2>
    <div style="clear: both"></div>
    <hr />
    <div style="text-align: justify">
        <?php
        if (isset($_POST['save'])) {
            echo '
                Data Laporan Pengaduan Gangguan Listrik anda :
                <br>
                Tanggal Melakukan Pengaduan : ' . date('d-M-Y', strtotime($tgl_masuk_laporan)) . '
                <br> <br>
                ID Pelanggan : ' . $idpel . '
                <br>
                No Laporan : ' . $noLaporan . '
                <br>
                Identitas / No KTP : ' . $identitas . '
                <br>
                Nama : ' . $nama . '
                <br>
                Alamat : ' . $alamat . '
                <br>
                No Handphone : ' . $nohp . '
                <br>
                No Telpon : ' . $notelp . '
                <br>
                E-Mail : ' . $email . '
                <br>
                Deskripsi Laporan : ' . $deskripsi . '
            ';
        }
        ?>
    </div>
</body>

</html>