<?php
include "../../koneksi.php"; // Load file koneksi.php
$daya = $_POST['daya_baru']; // Ambil data NIS yang dikirim lewat AJAX
$dayalama = $_POST['daya_lama'];
$produk_layanan = $_POST['produk_layanan']; // Ambil data NIS yang dikirim lewat AJAX

$ambil = "SELECT * FROM tb_harga_penyambungan WHERE kode = 'PD' || kode = 'UJL' || kode = 'MATERAI'";
$qambil = mysqli_query($mysqli, $ambil);
$arrData2[] = '';
while ($data = mysqli_fetch_array($qambil)) {
    $TData = $data[3];
    $arrData2[] = $TData;
}

/*
Biaya PD
var_dump($arrData2[1]);
var_dump($arrData2[2]);

Biaya UJL
var_dump($arrData2[3]);
var_dump($arrData2[4]);
var_dump($arrData2[5]);
var_dump($arrData2[6]);
var_dump($arrData2[7]);

Biaya Materai
var_dump($arrData2[8]);
*/

if ($daya <= $dayalama) {
    $hargaMaterai = 0;
    $hargaPenyambungan = 0;

    if ($daya <= "900") {
        // $hargaUJL = $daya * 72;
        $hargaUJL = $daya * $arrData2[3];
    } elseif ($daya == "1300") {
        // $hargaUJL = $daya * 133;
        $hargaUJL = $daya * $arrData2[4];
    } elseif ($daya == "2200") {
        // $hargaUJL = $daya * 141;
        $hargaUJL = $daya * $arrData2[5];
    } elseif ($daya == "3500" || $daya <= "5500") {
        // $hargaUJL = $daya * 157;
        $hargaUJL = $daya * $arrData2[6];
    } elseif ($daya >= "6600") {
        // $hargaUJL = $daya * 140;
        $hargaUJL = $daya * $arrData2[7];
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
        // $hargaPenyambungan = 937;
        // $hargaPenyambungan = $data['harga_pd_1'];
        $hargaPenyambungan = $arrData2[1];

        if ($produk_layanan == "PASCABAYAR") {
            // $hargaUJL = $daya * 141;
            $hargaUJL = $daya * $arrData2[5];
            $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
            $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
            $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
        }
    } elseif ($dayalama <= "900" && $daya <= "2200") {
        $hargaMaterai = 0;
        // $hargaPenyambungan = 937;
        // $hargaPenyambungan = $data['harga_pd_1'];
        $hargaPenyambungan = $arrData2[1];

        if ($produk_layanan == "PASCABAYAR") {
            // $hargaUJL = $daya * 141;
            $hargaUJL = $daya * $arrData2[5];
            $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
            $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
            $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
        }
    } elseif ($dayalama <= "2200" && $daya >= "3500") {
        // $hargaPenyambungan = 969;
        // $hargaPenyambungan = $data['harga_pd_2'];
        $hargaPenyambungan = $arrData2[2];

        if ($daya >= "6600") {
            // $hargaMaterai = $data['harga_materai'];
            $hargaMaterai = $arrData2[8];
        } else {
            $hargaMaterai = 0;
        }

        if ($daya <= "900") {
            // $hargaUJL = $daya * 72;
            $hargaUJL = $daya * $arrData2[3];
        } elseif ($daya == "1300") {
            // $hargaUJL = $daya * 133;
            $hargaUJL = $daya * $arrData2[4];
        } elseif ($daya == "2200") {
            // $hargaUJL = $daya * 141;
            $hargaUJL = $daya * $arrData2[5];
        } elseif ($daya == "3500" || $daya <= "5500") {
            // $hargaUJL = $daya * 157;
            $hargaUJL = $daya * $arrData2[6];
        } elseif ($daya >= "6600") {
            // $hargaUJL = $daya * 140;
            $hargaUJL = $daya * $arrData2[7];
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
        // $hargaPenyambungan = 969;
        $hargaPenyambungan = $arrData2[2];

        if ($daya >= "6600") {
            $hargaMaterai = $arrData2[8];
        } else {
            $hargaMaterai = 0;
        }

        if ($daya <= "900") {
            // $hargaUJL = $daya * 72;
            $hargaUJL = $daya * $arrData2[3];
        } elseif ($daya == "1300") {
            // $hargaUJL = $daya * 133;
            $hargaUJL = $daya * $arrData2[4];
        } elseif ($daya == "2200") {
            // $hargaUJL = $daya * 141;
            $hargaUJL = $daya * $arrData2[5];
        } elseif ($daya == "3500" || $daya <= "5500") {
            // $hargaUJL = $daya * 157;
            $hargaUJL = $daya * $arrData2[6];
        } elseif ($daya >= "6600") {
            // $hargaUJL = $daya * 140;
            $hargaUJL = $daya * $arrData2[7];
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
