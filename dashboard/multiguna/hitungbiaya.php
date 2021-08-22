<?php
include "../../koneksi.php"; // Load file koneksi.php
$daya = $_POST['daya']; // Ambil data NIS yang dikirim lewat AJAX
$tglmulai = $_POST['tgl_mulai'];
$tglselesai = $_POST['tgl_selesai'];
$pemakaian = $_POST['pemakaian'];

$ambil = "SELECT * FROM tb_harga_penyambungan WHERE kode = 'MLTA' || kode = 'PPN' || kode = 'PPJ' || kode = 'MATERAI'";
$qambil = mysqli_query($mysqli, $ambil);
$arrData2[] = '';
while ($data = mysqli_fetch_array($qambil)) {
    $TData = $data[3];
    $arrData2[] = $TData;
}

/*
Biaya perKWH
var_dump($arrData2[1]);

Biaya PPN
var_dump($arrData2[2]);

Biaya PPJ
var_dump($arrData2[3]);

Biaya Materai
var_dump($arrData2[4]);
*/

$tgl_awal = date_create($tglmulai);
$tgl_akhir = date_create($tglselesai);
$diff = date_diff($tgl_awal, $tgl_akhir);
$ambilLamaHari = $diff->d;
$konvhari = "$ambilLamaHari Hari";

// $biayaKWH = 1650;
$biayaKWH = $arrData2[1];
if ($daya >= "7700") {
    // $PPN = 10;
    $PPN = $arrData2[2];
    $persenPPN = $PPN / 100;
} else {
    $PPN = 0;
    $persenPPN = $PPN / 100;
}

$arr12 = [
    //450 per 1 hari dan 12 jam
    "5",
    //900
    "11",
    //1300
    "16",
    //2200
    "26",
    //3500
    "42",
    //4400
    "53",
    //5500
    "66",
    //6600
    "79",
    //7700
    "92",
    //10600
    "127",
    //11000
    "132",
    //13200
    "158",
    //16500
    "198",
    //23000
    "276"
];

$arr24 = [
    //450 per 1 hari dan 24 jam
    "11",
    //900
    "22",
    //1300
    "31",
    //2200
    "53",
    //3500
    "84",
    //4400
    "106",
    //5500
    "132",
    //6600
    "158",
    //7700
    "185",
    //10600
    "254",
    //11000
    "264",
    //13200
    "317",
    //16500
    "396",
    //23000
    "552"
];

if ($pemakaian == "12 Jam/Hari") {
    if ($daya == "450") {
        $eDib = $arr12[0];
    } elseif ($daya == "900") {
        $eDib = $arr12[1];
    } elseif ($daya == "1300") {
        $eDib = $arr12[2];
    } elseif ($daya == "2200") {
        $eDib = $arr12[3];
    } elseif ($daya == "3500") {
        $eDib = $arr12[4];
    } elseif ($daya == "4400") {
        $eDib = $arr12[5];
    } elseif ($daya == "5500") {
        $eDib = $arr12[6];
    } elseif ($daya == "6600") {
        $eDib = $arr12[7];
    } elseif ($daya == "7700") {
        $eDib = $arr12[8];
    } elseif ($daya == "10600") {
        $eDib = $arr12[9];
    } elseif ($daya == "11000") {
        $eDib = $arr12[10];
    } elseif ($daya == "13200") {
        $eDib = $arr12[11];
    } elseif ($daya == "16500") {
        $eDib = $arr12[12];
    } elseif ($daya == "23000") {
        $eDib = $arr12[13];
    }
} else {
    if ($daya == "450") {
        $eDib = $arr24[0];
    } elseif ($daya == "900") {
        $eDib = $arr24[1];
    } elseif ($daya == "1300") {
        $eDib = $arr24[2];
    } elseif ($daya == "2200") {
        $eDib = $arr24[3];
    } elseif ($daya == "3500") {
        $eDib = $arr24[4];
    } elseif ($daya == "4400") {
        $eDib = $arr24[5];
    } elseif ($daya == "5500") {
        $eDib = $arr24[6];
    } elseif ($daya == "6600") {
        $eDib = $arr24[7];
    } elseif ($daya == "7700") {
        $eDib = $arr24[8];
    } elseif ($daya == "10600") {
        $eDib = $arr24[9];
    } elseif ($daya == "11000") {
        $eDib = $arr24[10];
    } elseif ($daya == "13200") {
        $eDib = $arr24[11];
    } elseif ($daya == "16500") {
        $eDib = $arr24[12];
    } elseif ($daya == "23000") {
        $eDib = $arr24[13];
    }
}

if ($ambilLamaHari == "1") {
    $eDibA = $eDib * $ambilLamaHari;

    if ($eDibA <= "80") {
        $emin = 80;
    } else {
        $emin = $eDib * $ambilLamaHari;
    }

    // $PPJ = 8;
    $PPJ = $arrData2[3];
    $persenPPJ = $PPJ / 100;
    $biayaMaterai = 0;

    $total1 = $emin * $biayaKWH;
    $total2 = $persenPPJ * $total1;
    $total3 = $persenPPN * $total1;
    $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
} elseif ($ambilLamaHari == "2" || $ambilLamaHari == "3") {
    $eDibA = $eDib * $ambilLamaHari;

    if ($eDibA <= "150") {
        $emin = 150;
    } else {
        $emin = $eDib * $ambilLamaHari;
    }

    // $PPJ = 8;
    $PPJ = $arrData2[3];
    $persenPPJ = $PPJ / 100;
    $biayaMaterai = 0;

    $total1 = $emin * $biayaKWH;
    $total2 = $persenPPJ * $total1;
    $total3 = $persenPPN * $total1;
    $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
} elseif ($ambilLamaHari == "4" || $ambilLamaHari <= "7") {
    $eDibA = $eDib * $ambilLamaHari;

    if ($eDibA <= "300") {
        $emin = 300;
    } else {
        $emin = $eDib * $ambilLamaHari;
    }

    // $PPJ = 8;
    $PPJ = $arrData2[3];
    $persenPPJ = $PPJ / 100;
    if (($ambilLamaHari == "5" || $ambilLamaHari <= "30") && $daya >= "23000") {
        // $biayaMaterai = 10000;
        $biayaMaterai = $arrData2[4];
    } else {
        $biayaMaterai = 0;
    }

    $total1 = $emin * $biayaKWH;
    $total2 = $persenPPJ * $total1;
    $total3 = $persenPPN * $total1;
    $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
} elseif ($ambilLamaHari == "8" || $ambilLamaHari <= "30") {
    $eDibA = $eDib * $ambilLamaHari;

    if ($eDibA <= "500") {
        $emin = 500;
    } else {
        $emin = $eDib * $ambilLamaHari;
    }
    // $PPJ = 8;
    $PPJ = $arrData2[3];
    $persenPPJ = $PPJ / 100;

    if ($ambilLamaHari == "5" && $daya >= "23000") {
        $biayaMaterai = $arrData2[4];
    } else {
        $biayaMaterai = 0;
    }

    $total1 = $emin * $biayaKWH;
    $total2 = $persenPPJ * $total1;
    $total3 = $persenPPN * $total1;
    $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
}

if ($totalBiaya) {
    $callback = array(
        'status' => 'success',
        'biaya' => $konv,
        'lama' => $konvhari,
    );
} else {
    $callback = array('status' => 'failed'); // set array status dengan failed
}



echo json_encode($callback); // konversi varibael $callback menjadi JSON
