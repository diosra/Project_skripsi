<?php
include "../../koneksi.php"; // Load file koneksi.php
$daya = $_POST['daya']; // Ambil data NIS yang dikirim lewat AJAX
$produk_layanan = $_POST['produk_layanan']; // Ambil data NIS yang dikirim lewat AJAX

$ambil = "SELECT * FROM tb_harga_penyambungan WHERE kode = 'PB' || kode = 'UJL' || kode = 'MATERAI'";
$qambil = mysqli_query($mysqli, $ambil);
$arrData2[] = '';
while ($data = mysqli_fetch_array($qambil)) {
    $TData = $data[3];
    $arrData2[] = $TData;
}

/*
    $arrData2[1] s.d $arrData2[5] = Data harga Penyambungan
    $arrData2[6] s.d $arrData2[10] = Data harga UJL
*/

if ($daya == "450") {
    // $hargaPenyambungan = 421000;
    $hargaPenyambungan = $arrData2[1];
    $hargaMaterai = 0;

    if ($produk_layanan == "PASCABAYAR") {
        // $hargaUJL = $daya * 72;
        $hargaUJL = $daya * $arrData2[6];
        $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    } elseif ($produk_layanan == "PRABAYAR") {
        $hargaToken = $_POST['token'];
        $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    }
} elseif ($daya == "900") {
    // $hargaPenyambungan = 843000;
    // $hargaPenyambungan = $data['harga_pb_2'];
    $hargaPenyambungan = $arrData2[2];
    $hargaMaterai = 0;

    if ($produk_layanan == "PASCABAYAR") {
        // $hargaUJL = $daya * 72;
        $hargaUJL = $daya * $arrData2[6];
        $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    } elseif ($produk_layanan == "PRABAYAR") {
        $hargaToken = $_POST['token'];
        $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    }
} elseif ($daya == "1300") {
    // $hargaPenyambungan = 1218000;
    // $hargaPenyambungan = $data['harga_pb_3'];
    $hargaPenyambungan = $arrData2[3];
    $hargaMaterai = 0;

    if ($produk_layanan == "PASCABAYAR") {
        // $hargaUJL = $daya * 133;
        $hargaUJL = $daya * $arrData2[7];
        $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    } elseif ($produk_layanan == "PRABAYAR") {
        $hargaToken = $_POST['token'];
        $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    }
} elseif ($daya == "2200") {
    // $hargaPenyambungan = 2062000;
    $hargaPenyambungan = $arrData2[4];
    $hargaMaterai = 0;

    if ($produk_layanan == "PASCABAYAR") {
        // $hargaUJL = $daya * 141;
        $hargaUJL = $daya * $arrData2[8];
        $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    } elseif ($produk_layanan == "PRABAYAR") {
        $hargaToken = $_POST['token'];
        $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    }
} elseif ($daya >= "3500") {
    // $hargaPenyambungan = $daya * 969;
    $hargaPenyambungan = $daya * $arrData2[5];

    if ($daya >= "5500") {
        $hargaMaterai = $arrData2[11];
    } elseif ($daya <= "4400") {
        $hargaMaterai = 0;
    }

    if ($produk_layanan == "PASCABAYAR") {
        if ($daya == "3500" || $daya <= "5500") {
            // $hargaUJL = $daya * 157;
            $hargaUJL = $daya * $arrData2[9];
        } elseif ($daya >= "6600") {
            // $hargaUJL = $daya * 140;
            $hargaUJL = $daya * $arrData2[10];
        }
        $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    } elseif ($produk_layanan == "PRABAYAR") {
        $hargaToken = $_POST['token'];
        $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    }
}

$callback = array(
    'status' => 'success',
    'biaya' => $konv,
);

echo json_encode($callback); // konversi varibael $callback menjadi JSON
