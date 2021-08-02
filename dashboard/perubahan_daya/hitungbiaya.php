<?php
include "../../koneksi.php"; // Load file koneksi.php
$daya = $_POST['daya_baru']; // Ambil data NIS yang dikirim lewat AJAX
$dayalama = $_POST['daya_lama'];
$produk_layanan = $_POST['produk_layanan']; // Ambil data NIS yang dikirim lewat AJAX

if ($daya <= $dayalama) {
    $hargaMaterai = 0;
    $hargaPenyambungan = 0;

    if ($daya <= "900") {
        $hargaUJL = $daya * 72;
    } elseif ($daya == "1300") {
        $hargaUJL = $daya * 133;
    } elseif ($daya == "2200") {
        $hargaUJL = $daya * 141;
    } elseif (
        $daya == "3500" || $daya <= "5500"
    ) {
        $hargaUJL = $daya * 157;
    } elseif ($daya >= "6600") {
        $hargaUJL = $daya * 140;
    }

    if ($produk_layanan == "PASCABAYAR") {
        $totalBiaya = (($daya - $dayalama) * 0) + $hargaUJL + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    } elseif ($produk_layanan == "PRABAYAR") {
        $hargaToken = $_POST['token'];
        $totalBiaya = (($daya - $dayalama) * 0) + $hargaToken + $hargaMaterai;
        $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
    }
} elseif ($daya >= $dayalama) {
    if ($dayalama <= "1300" && $daya == "2200") {
        $hargaMaterai = 0;
        $hargaPenyambungan = 937;

        if ($produk_layanan == "PASCABAYAR") {
            $hargaUJL = $daya * 141;
            $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
            $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
            $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
        }
    } elseif (
        $dayalama <= "2200" && $daya >= "3500"
    ) {
        $hargaPenyambungan = 969;

        if ($daya >= "6600") {
            $hargaMaterai = 10000;
        } else {
            $hargaMaterai = 0;
        }

        if ($daya <= "900") {
            $hargaUJL = $daya * 72;
        } elseif ($daya == "1300") {
            $hargaUJL = $daya * 133;
        } elseif ($daya == "2200") {
            $hargaUJL = $daya * 141;
        } elseif ($daya == "3500" || $daya <= "5500") {
            $hargaUJL = $daya * 157;
        } elseif ($daya >= "6600") {
            $hargaUJL = $daya * 140;
        }

        if ($produk_layanan == "PASCABAYAR") {
            $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
            $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
            $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
        }
    } elseif (
        $dayalama >= "2200" && $daya >= "2200"
    ) {
        $hargaPenyambungan = 969;

        if ($daya >= "6600") {
            $hargaMaterai = 10000;
        } else {
            $hargaMaterai = 0;
        }

        if ($daya <= "900") {
            $hargaUJL = $daya * 72;
        } elseif ($daya == "1300") {
            $hargaUJL = $daya * 133;
        } elseif ($daya == "2200") {
            $hargaUJL = $daya * 141;
        } elseif ($daya == "3500" || $daya <= "5500") {
            $hargaUJL = $daya * 157;
        } elseif ($daya >= "6600") {
            $hargaUJL = $daya * 140;
        }

        if ($produk_layanan == "PASCABAYAR") {
            $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
            $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
            $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
        }
    }
}

if ($totalBiaya) {
    $callback = array(
        'status' => 'success',
        'biaya' => $konv,
    );
} else {
    $callback = array('status' => 'failed'); // set array status dengan failed
}



echo json_encode($callback); // konversi varibael $callback menjadi JSON
