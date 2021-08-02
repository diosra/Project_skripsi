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
        if (isset($_POST['savepb'])) {
            if ($produk_layanan == "PASCABAYAR") {
                echo '
                Data Pengajuan anda dalam Pasang Baru :
                <br>
                Tanggal Pengajuan : ' . date('d-M-Y', strtotime($tgl_masuk)) . '
                <br> <br>
                ID Pelanggan : ' . $id_pelanggan . '
                <br>
                No Registrasi : ' . $noRegistrasi . '
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
                Produk Layanan : ' . $produk_layanan . '
                <br>
                Daya yang dipilih : ' . $daya . ' VA
                <br>
                Tarif : ' . $tarif . '
                <br>
                Peruntukan : ' . $peruntukan . '
                <br>
                Total Biaya : Rp.' . number_format($totalBiaya, 0, ',', '.') . '
            ';
            } else {
                echo '
                Data Pengajuan anda dalam Pasang Baru :
                <br>
                Tanggal Pengajuan : ' . date('d-M-Y', strtotime($tgl_masuk)) . '
                <br> <br>
                ID Pelanggan : ' . $id_pelanggan . '
                <br>
                No Registrasi : ' . $noRegistrasi . '
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
                Produk Layanan : ' . $produk_layanan . '
                <br>
                Token : ' . $token . '
                <br>
                Daya yang dipilih : ' . $daya . ' VA
                <br>
                Tarif : ' . $tarif . 'T
                <br>
                Peruntukan : ' . $peruntukan . '
                <br>
                Total Biaya : Rp.' . number_format($totalBiaya, 0, ',', '.') . '
            ';
            }
        } elseif (isset($_POST['savepd'])) {
            if ($produk_layanan == "PASCABAYAR") {
                echo '
                Data Pengajuan anda dalam Perubahan Daya :
                <br>
                Tanggal Pengajuan : ' . date('d-M-Y', strtotime($tgl_masuk)) . '
                <br> <br>
                ID Pelanggan : ' . $idplg . '
                <br>
                No Registrasi : ' . $noRegistrasi . '
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
                Produk Layanan : ' . $produk_layanan . '
                <br>
                Daya Lama : ' . $dayalama . ' VA
                <br>
                Tarif Lama : ' . $tariflama . '
                <br>
                Daya Baru : ' . $daya . ' VA
                <br>
                Tarif Baru : ' . $tarif . ' 
                <br>
                Peruntukan : ' . $peruntukan . '
                <br>
                Total Biaya : Rp.' . number_format($totalBiaya, 0, ',', '.') . '
            ';
            } else {
                echo '
                Data Pengajuan anda dalam Perubahan Daya :
                <br>
                Tanggal Pengajuan : ' . date('d-M-Y', strtotime($tgl_masuk)) . '
                <br> <br>
                ID Pelanggan : ' . $idplg . '
                <br>
                No Registrasi : ' . $noRegistrasi . '
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
                Produk Layanan : ' . $produk_layanan . '
                <br>
                Token : ' . $token . '
                <br>
                Daya Lama : ' . $dayalama . ' VA
                <br>
                Tarif Lama : ' . $tariflama . '
                <br>
                Daya Baru : ' . $daya . ' VA
                <br>
                Tarif Baru : ' . $tarif . 'T 
                <br>
                Peruntukan : ' . $peruntukan . '
                <br>
                Total Biaya : Rp.' . number_format($totalBiaya, 0, ',', '.') . '
            ';
            }
        } elseif (isset($_POST['savemlta'])) {
            echo '
                Data Pengajuan anda dalam Penyambungan Sementara :
                <br>
                Tanggal Pengajuan : ' . date('d-M-Y', strtotime($tgl_masuk)) . '
                <br> <br>
                ID Pelanggan : ' . $idplg . '
                <br>
                No Registrasi : ' . $noRegistrasi . '
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
                Daya yang dibutuhkan : ' . $daya . ' VA
                <br>
                Tanggal Mulai Pemakaian : ' . date('d-M-Y', strtotime($tgl_mulai)) . '
                <br>
                Tanggal Selesai Pemakaian : ' . date('d-M-Y', strtotime($tgl_selesai)) . '
                <br>
                Pemakaian : ' . $pemakaian . '
                <br>
                Total Lama Hari Pemakaian : ' . $ambilLamaHari . ' Hari
                <br>
                Peruntukan : ' . $peruntukan . '
                <br>
                Total Biaya : Rp.' . number_format($totalBiaya, 0, ',', '.') . '
            ';
        }
        ?>
    </div>
</body>

</html>