<?php
include "../../koneksi.php"; // Load file koneksi.php
$daya = $_POST['daya']; // Ambil data NIS yang dikirim lewat AJAX
$produk_layanan = $_POST['produk_layanan']; // Ambil data NIS yang dikirim lewat AJAX

if ($daya == "450") {
    $hargaPenyambungan = 421000;
    $hargaMaterai = 0;

    if ($produk_layanan == "PASCABAYAR") {
        $hargaUJL = $daya * 72;
        $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    } elseif ($produk_layanan == "PRABAYAR") {
        $hargaToken = $_POST['token'];
        $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    }
} elseif ($daya == "900") {
    $hargaPenyambungan = 843000;
    $hargaMaterai = 0;

    if ($produk_layanan == "PASCABAYAR") {
        $hargaUJL = $daya * 72;
        $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    } elseif ($produk_layanan == "PRABAYAR") {
        $hargaToken = $_POST['token'];
        $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    }
} elseif ($daya == "1300") {
    $hargaPenyambungan = 1218000;
    $hargaMaterai = 0;

    if ($produk_layanan == "PASCABAYAR") {
        $hargaUJL = $daya * 133;
        $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    } elseif ($produk_layanan == "PRABAYAR") {
        $hargaToken = $_POST['token'];
        $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    }
} elseif ($daya == "2200") {
    $hargaPenyambungan = 2062000;
    $hargaMaterai = 0;

    if ($produk_layanan == "PASCABAYAR") {
        $hargaUJL = $daya * 141;
        $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    } elseif ($produk_layanan == "PRABAYAR") {
        $hargaToken = $_POST['token'];
        $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    }
} elseif ($daya >= "3500") {
    $hargaPenyambungan = $daya * 969;

    if ($daya >= "5500") {
        $hargaMaterai = 10000;
    } elseif ($daya <= "4400") {
        $hargaMaterai = 0;
    }

    if ($produk_layanan == "PASCABAYAR") {
        if ($daya == "3500" || $daya <= "5500") {
            $hargaUJL = $daya * 157;
        } elseif ($daya >= 6600) {
            $hargaUJL = $daya * 140;
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
