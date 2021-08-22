<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

</body>

</html>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('../phpmailer/Exception.php');
include('../phpmailer/PHPMailer.php');
include('../phpmailer/SMTP.php');
include '../koneksi.php';

$ambil = "SELECT * FROM tb_harga_penyambungan";
$qambil = mysqli_query($mysqli, $ambil);
$arrData2[] = '';
while ($data = mysqli_fetch_array($qambil)) {
    $TData = $data[3];
    $arrData2[] = $TData;
}

$email_pengirim = 'pln.up3.bjm@gmail.com'; // Isikan dengan email pengirim
$nama_pengirim = 'pln up3'; // Isikan dengan nama pengirim
$email_penerima = $_POST['email']; // Ambil email penerima dari inputan form
// Ambil subjek dari inputan form
// $pesan = $_POST['pesan']; // Ambil pesan dari inputan form
if (isset($_POST['savepb'])) {

    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_registrasi) as RegTerbesar FROM tb_mohon_pb");
    $dataambil = mysqli_fetch_array($queryambil);
    $noRegistrasi = @$dataambil['RegTerbesar'];

    $urutan = (int) substr($noRegistrasi, 7, 5);
    $urutan++;

    $huruf = "NRG-PB-";
    $noRegistrasi = $huruf . sprintf("%05s", $urutan);

    $queryambil2 = mysqli_query($mysqli, "SELECT max(idpel) as idPelangganmax FROM tb_pelanggan");
    $dataambil2 = mysqli_fetch_array($queryambil2);
    $id_pelanggan = @$dataambil2['idPelangganmax'];
    $urutan2 = (int) substr($id_pelanggan, 3, 5);
    $urutan2++;
    $huruf2 = "PLG";
    $id_pelanggan = $huruf2 . sprintf("%05s", $urutan2);

    $subjek = "Data Pengajuan Pasang Baru";
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $identitas = $_POST['identitas'];
    $produk_layanan = $_POST['produk_layanan'];
    $daya = $_POST['daya'];
    $peruntukan = $_POST['peruntukan'];
    $tgl_masuk = $_POST['tgl_masuk'];

    if ($produk_layanan == "PRABAYAR") {
        $token = $_POST['token'];
    } else {
        $token = 0;
    }

    //Perhitungan Biaya Berdasarkan produk
    if ($daya == "450") {
        // $hargaPenyambungan = 421000;
        $hargaPenyambungan = $arrData2[1];
        $hargaMaterai = 0;

        if ($produk_layanan == "PASCABAYAR") {
            // $hargaUJL = $daya * 72;
            $hargaUJL = $daya * $arrData2[9];
            $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        }

        $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
    } elseif ($daya == "900") {
        // $hargaPenyambungan = 843000;
        $hargaPenyambungan = $arrData2[2];
        $hargaMaterai = 0;

        if ($produk_layanan == "PASCABAYAR") {
            // $hargaUJL = $daya * 72;
            $hargaUJL = $daya * $arrData2[9];
            $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        }
    } elseif ($daya == "1300") {
        // $hargaPenyambungan = 1218000;
        $hargaPenyambungan = $arrData2[3];
        $hargaMaterai = 0;

        if ($produk_layanan == "PASCABAYAR") {
            // $hargaUJL = $daya * 133;
            $hargaUJL = $daya * $arrData2[10];
            $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        }
    } elseif ($daya == "2200") {
        // $hargaPenyambungan = 2062000;
        $hargaPenyambungan = $arrData2[4];
        $hargaMaterai = 0;

        if ($produk_layanan == "PASCABAYAR") {
            // $hargaUJL = $daya * 141;
            $hargaUJL = $daya * $arrData2[11];
            $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        }
    } elseif ($daya >= "3500") {
        // $hargaPenyambungan = $daya * 969;
        $hargaPenyambungan = $daya * $arrData2[5];

        if ($daya >= "5500") {
            // $hargaMaterai = 10000;
            $hargaMaterai = $arrData2[16];
        } elseif ($daya <= "4400") {
            $hargaMaterai = 0;
        }

        if ($produk_layanan == "PASCABAYAR") {
            if ($daya == "3500" || $daya <= "5500") {
                // $hargaUJL = $daya * 157;
                $hargaUJL = $daya * $arrData2[12];
            } elseif ($daya >= 6600) {
                // $hargaUJL = $daya * 140;
                $hargaUJL = $daya * $arrData2[13];
            }
            $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        }
    }

    // Penentuan Tarif Berdasarkan Daya
    if ($daya <= "2200") {
        $tarif = "R-1";
    } elseif ($daya == "3500" || $daya <= "5500") {
        $tarif = "R-2";
    } elseif ($daya >= "6600") {
        $tarif = "R-3";
    }
} elseif (isset($_POST['savepd'])) {
    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_registrasi) as RegTerbesar FROM tb_mohon_pd");
    $dataambil = mysqli_fetch_array($queryambil);
    $noRegistrasi = @$dataambil['RegTerbesar'];

    $urutan = (int) substr($noRegistrasi, 7, 5);
    $urutan++;

    $huruf = "NRG-PD-";
    $noRegistrasi = $huruf . sprintf("%05s", $urutan);

    $subjek = "Data Pengajuan Perubahan Daya";
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $identitas = $_POST['identitas'];
    $idplg = $_POST['idplg'];
    $dayalama = $_POST['daya_lama'];
    $tariflama = $_POST['tarif_lama'];
    $produk_layanan = $_POST['produk_layanan'];
    $daya = $_POST['daya_baru'];
    $peruntukan = $_POST['peruntukan'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $fasalama = $_POST['fasalama'];

    if ($produk_layanan == "PRABAYAR") {
        $token = $_POST['token'];
        $t = "T";
    } else {
        $token = 0;
    }

    if ($daya <= $dayalama) {
        $hargaMaterai = 0;
        $hargaPenyambungan = 0;

        if ($daya <= "900") {
            // $hargaUJL = $daya * 72;
            $hargaUJL = $daya * $arrData2[9];
        } elseif ($daya == "1300") {
            // $hargaUJL = $daya * 133;
            $hargaUJL = $daya * $arrData2[10];
        } elseif ($daya == "2200") {
            // $hargaUJL = $daya * 141;
            $hargaUJL = $daya * $arrData2[11];
        } elseif ($daya == "3500" || $daya <= "5500") {
            // $hargaUJL = $daya * 157;
            $hargaUJL = $daya * $arrData2[12];
        } elseif ($daya >= "6600") {
            // $hargaUJL = $daya * 140;
            $hargaUJL = $daya * $arrData2[13];
        }

        if ($produk_layanan == "PASCABAYAR") {
            $totalBiaya = (($daya - $dayalama) * 0) + $hargaUJL + $hargaMaterai;
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = (($daya - $dayalama) * 0) + $hargaToken + $hargaMaterai;
        }
    } elseif ($daya >= $dayalama) {
        if ($dayalama <= "1300" && $daya == "2200") {
            $hargaMaterai = 0;
            // $hargaPenyambungan = 937;
            $hargaPenyambungan = $arrData2[6];

            if ($produk_layanan == "PASCABAYAR") {
                // $hargaUJL = $daya * 141;
                $hargaUJL = $daya * $arrData2[11];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
            } elseif ($produk_layanan == "PRABAYAR") {
                $hargaToken = $_POST['token'];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
            }
        } elseif ($dayalama <= "900" && $daya <= "2200") {
            $hargaMaterai = 0;
            // $hargaPenyambungan = 937;
            $hargaPenyambungan = $arrData2[6];

            if ($produk_layanan == "PASCABAYAR") {
                // $hargaUJL = $daya * 141;
                $hargaUJL = $daya * $arrData2[11];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
                $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
            } elseif ($produk_layanan == "PRABAYAR") {
                $hargaToken = $_POST['token'];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
                $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
            }
        } elseif ($dayalama <= "2200" && $daya >= "3500") {
            // $hargaPenyambungan = 969;
            $hargaPenyambungan = $arrData2[7];

            if ($daya >= "6600") {
                // $hargaMaterai = 10000;
                $hargaMaterai = $arrData2[16];
            } else {
                $hargaMaterai = 0;
            }

            if ($daya <= "900") {
                // $hargaUJL = $daya * 72;
                $hargaUJL = $daya * $arrData2[9];
            } elseif ($daya == "1300") {
                // $hargaUJL = $daya * 133;
                $hargaUJL = $daya * $arrData2[10];
            } elseif ($daya == "2200") {
                // $hargaUJL = $daya * 141;
                $hargaUJL = $daya * $arrData2[11];
            } elseif ($daya == "3500" || $daya <= "5500") {
                // $hargaUJL = $daya * 157;
                $hargaUJL = $daya * $arrData2[12];
            } elseif ($daya >= "6600") {
                // $hargaUJL = $daya * 140;
                $hargaUJL = $daya * $arrData2[13];
            }

            if ($produk_layanan == "PASCABAYAR") {
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
            } elseif ($produk_layanan == "PRABAYAR") {
                $hargaToken = $_POST['token'];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
            }
        } elseif ($dayalama >= "2200" && $daya >= "2200") {
            // $hargaPenyambungan = 969;
            $hargaPenyambungan = $arrData2[7];

            if ($daya >= "6600") {
                $hargaMaterai = $arrData2[16];
            } else {
                $hargaMaterai = 0;
            }

            if ($daya <= "900") {
                // $hargaUJL = $daya * 72;
                $hargaUJL = $daya * $arrData2[9];
            } elseif ($daya == "1300") {
                // $hargaUJL = $daya * 133;
                $hargaUJL = $daya * $arrData2[10];
            } elseif ($daya == "2200") {
                // $hargaUJL = $daya * 141;
                $hargaUJL = $daya * $arrData2[11];
            } elseif ($daya == "3500" || $daya <= "5500") {
                // $hargaUJL = $daya * 157;
                $hargaUJL = $daya * $arrData2[12];
            } elseif ($daya >= "6600") {
                // $hargaUJL = $daya * 140;
                $hargaUJL = $daya * $arrData2[13];
            }

            if ($produk_layanan == "PASCABAYAR") {
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
            } elseif ($produk_layanan == "PRABAYAR") {
                $hargaToken = $_POST['token'];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
            }
        }
    }

    // Penentuan Tarif Berdasarkan Daya
    if ($daya <= "2200") {
        $tarif = "R-1";
    } elseif ($daya == "3500" || $daya <= "5500") {
        $tarif = "R-2";
    } elseif ($daya >= "6600") {
        $tarif = "R-3";
    }
} elseif (isset($_POST['savemlta'])) {
    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_registrasi) as RegTerbesar FROM tb_mohon_multiguna");
    $dataambil = mysqli_fetch_array($queryambil);
    $noRegistrasi = @$dataambil['RegTerbesar'];

    $urutan = (int) substr($noRegistrasi, 7, 5);
    $urutan++;

    $huruf = "NRG-PS-";
    $noRegistrasi = $huruf . sprintf("%05s", $urutan);

    $subjek = "Data Pengajuan Multiguna / Penyambungan Sementara";
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $identitas = $_POST['identitas'];
    $idplg = $_POST['idplg'];
    $daya = $_POST['daya'];
    $tglmulai = $_POST['tgl_mulai'];
    $tglselesai = $_POST['tgl_selesai'];
    $pemakaian = $_POST['pemakaian'];
    $peruntukan = $_POST['peruntukan'];
    $tgl_masuk = $_POST['tgl_masuk'];

    $tgl_awal = date_create($tglmulai);
    $tgl_akhir = date_create($tglselesai);
    $diff = date_diff($tgl_awal, $tgl_akhir);
    $ambilLamaHari = $diff->d;

    // $biayaKWH = 1650;
    $biayaKWH = $arrData2[8];
    if ($daya >= "7700") {
        // $PPN = 10;
        $PPN = $arrData2[14];
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
        $PPJ = $arrData2[15];
        $persenPPJ = $PPJ / 100;
        $biayaMaterai = 0;

        $total1 = $emin * $biayaKWH;
        $total2 = $persenPPJ * $total1;
        $total3 = $persenPPN * $total1;
        $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    } elseif ($ambilLamaHari == "2" || $ambilLamaHari == "3") {
        $eDibA = $eDib * $ambilLamaHari;

        if ($eDibA <= "150") {
            $emin = 150;
        } else {
            $emin = $eDib * $ambilLamaHari;
        }

        // $PPJ = 8;
        $PPJ = $arrData2[15];
        $persenPPJ = $PPJ / 100;
        $biayaMaterai = 0;

        $total1 = $emin * $biayaKWH;
        $total2 = $persenPPJ * $total1;
        $total3 = $persenPPN * $total1;
        $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    } elseif ($ambilLamaHari == "4" || $ambilLamaHari <= "7") {
        $eDibA = $eDib * $ambilLamaHari;

        if ($eDibA <= "300") {
            $emin = 300;
        } else {
            $emin = $eDib * $ambilLamaHari;
        }

        // $PPJ = 8;
        $PPJ = $arrData2[15];
        $persenPPJ = $PPJ / 100;
        if (($ambilLamaHari == "5" || $ambilLamaHari <= "30") && $daya >= "23000") {
            $biayaMaterai = $arrData2[16];
        } else {
            $biayaMaterai = 0;
        }

        $total1 = $emin * $biayaKWH;
        $total2 = $persenPPJ * $total1;
        $total3 = $persenPPN * $total1;
        $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    } elseif ($ambilLamaHari == "8" || $ambilLamaHari <= "30") {
        $eDibA = $eDib * $ambilLamaHari;

        if ($eDibA <= "500") {
            $emin = 500;
        } else {
            $emin = $eDib * $ambilLamaHari;
        }
        // $PPJ = 8;
        $PPJ = $arrData2[15];
        $persenPPJ = $PPJ / 100;

        if ($ambilLamaHari == "5" && $daya >= "23000") {
            $biayaMaterai = $arrData2[16];
        } else {
            $biayaMaterai = 0;
        }

        $total1 = $emin * $biayaKWH;
        $total2 = $persenPPJ * $total1;
        $total3 = $persenPPN * $total1;
        $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    }
}

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->Username = $email_pengirim; // Email Pengirim
$mail->Password = 'xweomukfwoaonxxo'; // Isikan dengan Password email pengirim
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_penerima, '');
$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

// Load file content.php
ob_start();
include "../dashboard/content.php";

$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();

$mail->Subject = $subjek;
$mail->Body = $content;
$mail->AddEmbeddedImage('../img/logopln.png', 'logo_PLN', 'logopln.png'); // Aktifkan jika ingin menampilkan gambar dalam email

$send = $mail->send();

if (isset($_POST['savepb'])) {

    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_registrasi) as RegTerbesar FROM tb_mohon_pb");
    $dataambil = mysqli_fetch_array($queryambil);
    $noRegistrasi = @$dataambil['RegTerbesar'];
    $urutan = (int) substr($noRegistrasi, 7, 5);
    $urutan++;
    $huruf = "NRG-PB-";
    $noRegistrasi = $huruf . sprintf("%05s", $urutan);

    $queryambil2 = mysqli_query($mysqli, "SELECT max(idpel) as idPelangganmax FROM tb_pelanggan");
    $dataambil2 = mysqli_fetch_array($queryambil2);
    $id_pelanggan = @$dataambil2['idPelangganmax'];
    $urutan2 = (int) substr($id_pelanggan, 3, 5);
    $urutan2++;
    $huruf2 = "PLG";
    $id_pelanggan = $huruf2 . sprintf("%05s", $urutan2);

    // $queryambil3 = mysqli_query($mysqli, "SELECT max(no_kontrak) as nokontrakmax FROM tb_pelanggan");
    // $dataambil3 = mysqli_fetch_array($queryambil3);
    // $no_kontrak = @$dataambil3['nokontrakmax'];
    // $urutan3 = (int) substr($no_kontrak, 4, 5);
    // $urutan3++;
    // $huruf3 = "KON-";
    // $no_kontrak = $huruf3 . sprintf("%05s", $urutan3);

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $identitas = $_POST['identitas'];
    $produk_layanan = $_POST['produk_layanan'];
    $daya = $_POST['daya'];
    $peruntukan = $_POST['peruntukan'];

    //Perhitungan Biaya Berdasarkan produk
    if ($daya == "450") {
        // $hargaPenyambungan = 421000;
        $hargaPenyambungan = $arrData2[1];
        $hargaMaterai = 0;

        if ($produk_layanan == "PASCABAYAR") {
            // $hargaUJL = $daya * 72;
            $hargaUJL = $daya * $arrData2[9];
            $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        }

        $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
    } elseif ($daya == "900") {
        // $hargaPenyambungan = 843000;
        $hargaPenyambungan = $arrData2[2];
        $hargaMaterai = 0;

        if ($produk_layanan == "PASCABAYAR") {
            // $hargaUJL = $daya * 72;
            $hargaUJL = $daya * $arrData2[9];
            $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        }
    } elseif ($daya == "1300") {
        // $hargaPenyambungan = 1218000;
        $hargaPenyambungan = $arrData2[3];
        $hargaMaterai = 0;

        if ($produk_layanan == "PASCABAYAR") {
            // $hargaUJL = $daya * 133;
            $hargaUJL = $daya * $arrData2[10];
            $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        }
    } elseif ($daya == "2200") {
        // $hargaPenyambungan = 2062000;
        $hargaPenyambungan = $arrData2[4];
        $hargaMaterai = 0;

        if ($produk_layanan == "PASCABAYAR") {
            // $hargaUJL = $daya * 141;
            $hargaUJL = $daya * $arrData2[11];
            $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        }
    } elseif ($daya >= "3500") {
        // $hargaPenyambungan = $daya * 969;
        $hargaPenyambungan = $daya * $arrData2[5];

        if ($daya >= "5500") {
            // $hargaMaterai = 10000;
            $hargaMaterai = $arrData2[16];
        } elseif ($daya <= "4400") {
            $hargaMaterai = 0;
        }

        if ($produk_layanan == "PASCABAYAR") {
            if ($daya == "3500" || $daya <= "5500") {
                // $hargaUJL = $daya * 157;
                $hargaUJL = $daya * $arrData2[12];
            } elseif ($daya >= "6600") {
                // $hargaUJL = $daya * 140;
                $hargaUJL = $daya * $arrData2[13];
            }
            $totalBiaya = $hargaPenyambungan + $hargaUJL + $hargaMaterai;
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = $hargaPenyambungan + $hargaToken + $hargaMaterai;
        }
    }

    // Penentuan Tarif Berdasarkan Daya
    if ($daya <= "2200") {
        $tarif = "R-1";
    } elseif ($daya == "3500" || $daya <= "5500") {
        $tarif = "R-2";
    } elseif ($daya >= "6600") {
        $tarif = "R-3";
    }

    if ($produk_layanan == "PASCABAYAR") {
        if ($daya <= "2200") {
            // $tarif = "R-1";
            $insert = "INSERT INTO tb_mohon_pb (no_registrasi,id_pelanggan, nama,alamat, nohp, notelp, email,identitas,produk_layanan,daya,tarif,total, peruntukan, tgl_masuk) VALUES ('$noRegistrasi', '$id_pelanggan', '$nama', '$alamat', '$nohp','$notelp', '$email','$identitas','$produk_layanan','$daya','$tarif', '$totalBiaya', '$peruntukan', '$tgl_masuk')";
            // $query = mysqli_query($mysqli, $insert);
            // var_dump($insert);
        } elseif ($daya == "3500" || $daya <= "5500") {
            // $tarif = "R-2";
            $insert = "INSERT INTO tb_mohon_pb (no_registrasi,id_pelanggan, nama,alamat, nohp, notelp, email,identitas,produk_layanan,daya,tarif, total, peruntukan, tgl_masuk) VALUES ('$noRegistrasi', '$id_pelanggan', '$nama', '$alamat', '$nohp','$notelp', '$email','$identitas','$produk_layanan','$daya','$tarif', '$totalBiaya', '$peruntukan','$tgl_masuk')";
            // $query = mysqli_query($mysqli, $insert);
            // var_dump($insert);
        } elseif ($daya >= "6600") {
            // $tarif = "R-3";
            $insert = "INSERT INTO tb_mohon_pb (no_registrasi,id_pelanggan, nama,alamat, nohp, notelp, email,identitas,produk_layanan,daya,tarif, total, peruntukan, tgl_masuk) VALUES ('$noRegistrasi', '$id_pelanggan', '$nama', '$alamat', '$nohp','$notelp', '$email','$identitas','$produk_layanan','$daya','$tarif','$totalBiaya', '$peruntukan','$tgl_masuk')";
            // $query = mysqli_query($mysqli, $insert);
            // var_dump($insert);
        }
    } elseif ($produk_layanan == "PRABAYAR") {
        $token = $_POST['token'];
        $t = "T";
        $insert = "INSERT INTO tb_mohon_pb (no_registrasi,id_pelanggan, nama,alamat, nohp, notelp, email,identitas,produk_layanan,daya,tarif,total, token, peruntukan, tgl_masuk) VALUES ('$noRegistrasi', '$id_pelanggan', '$nama', '$alamat', '$nohp','$notelp', '$email','$identitas','$produk_layanan','$daya','$tarif$t','$totalBiaya','$token', '$peruntukan','$tgl_masuk')";
        // $query = mysqli_query($mysqli, $insert);
    }
    $query = mysqli_query($mysqli, $insert);

    if ($query && $send) {
        $insert2 = "INSERT INTO tb_pelanggan (id_mohon,idpel, identitas, nama, alamat, nohp, no_telp, email) VALUES ('" . mysqli_insert_id($mysqli) . "','$id_pelanggan','$identitas', '$nama', '$alamat', '$nohp', '$notelp', '$email');";

        if ($produk_layanan == "PASCABAYAR") {
            if ($daya <= "5500") {
                $fasa = "1 Fasa";
                $pekerjaanRAB = "PB 1 Fasa";

                $insert2 .= "INSERT INTO tb_pasang_baru (id_mohon,jenis_transaksi,daya,tarif, fasa_baru,pekerjaan_rab ) VALUES ('" . mysqli_insert_id($mysqli) . "','Pasang Baru','$daya','$tarif','$fasa','$pekerjaanRAB')";
            } elseif ($daya >= "6600") {
                $fasa = "3 Fasa";
                $pekerjaanRAB = "PB 3 Fasa";

                $insert2 .= "INSERT INTO tb_pasang_baru (id_mohon,jenis_transaksi,daya,tarif, fasa_baru,pekerjaan_rab ) VALUES ('" . mysqli_insert_id($mysqli) . "','Pasang Baru','$daya','$tarif','$fasa','$pekerjaanRAB')";
            }
        } elseif ($produk_layanan == "PRABAYAR") {
            $t = "T";
            if ($daya <= "5500") {
                $fasa = "1 Fasa";
                $pekerjaanRAB = "PB 1 Fasa";

                $insert2 .= "INSERT INTO tb_pasang_baru (id_mohon,jenis_transaksi,daya,tarif, fasa_baru,pekerjaan_rab ) VALUES ('" . mysqli_insert_id($mysqli) . "','Pasang Baru','$daya','$tarif$t','$fasa','$pekerjaanRAB')";
            } elseif ($daya >= "6600") {
                $fasa = "3 Fasa";
                $pekerjaanRAB = "PB 3 Fasa";

                $insert2 .= "INSERT INTO tb_pasang_baru (id_mohon,jenis_transaksi,daya,tarif, fasa_baru,pekerjaan_rab ) VALUES ('" . mysqli_insert_id($mysqli) . "','Pasang Baru','$daya','$tarif$t','$fasa','$pekerjaanRAB')";
            }
        }
        // var_dump($insert2);
        $query2 = mysqli_multi_query($mysqli, $insert2);
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Sukses Menambahkan Data Mohon Pasang Baru! Data anda akan segera kami cek dan akan kami hubungi melewati E-Mail!'
            }).then((result) => {
                window.location = "pasang_baru/menu_pb.php";
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal Menambahkan Data Mohon Pasang Baru Karena Nomor Identitas sudah terdaftar!'
            }).then((result) => {
                window.location = "pasang_baru/menu_pb.php";
            })
        </script>
    <?php
    }
} elseif (isset($_POST['savepd'])) {
    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_registrasi) as RegTerbesar FROM tb_mohon_pd");
    $dataambil = mysqli_fetch_array($queryambil);
    $noRegistrasi = @$dataambil['RegTerbesar'];

    $urutan = (int) substr($noRegistrasi, 7, 5);
    $urutan++;

    $huruf = "NRG-PD-";
    $noRegistrasi = $huruf . sprintf("%05s", $urutan);

    $idplg = $_POST['idplg'];
    $dayalama = $_POST['daya_lama'];
    $tariflama = $_POST['tarif_lama'];
    $produk_layanan = $_POST['produk_layanan'];
    $daya = $_POST['daya_baru'];
    $peruntukan = $_POST['peruntukan'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $fasalama = $_POST['fasalama'];

    if ($daya <= $dayalama) {
        $hargaMaterai = 0;
        $hargaPenyambungan = 0;

        if ($daya <= "900") {
            // $hargaUJL = $daya * 72;
            $hargaUJL = $daya * $arrData2[9];
        } elseif ($daya == "1300") {
            // $hargaUJL = $daya * 133;
            $hargaUJL = $daya * $arrData2[10];
        } elseif ($daya == "2200") {
            // $hargaUJL = $daya * 141;
            $hargaUJL = $daya * $arrData2[11];
        } elseif ($daya == "3500" || $daya <= "5500") {
            // $hargaUJL = $daya * 157;
            $hargaUJL = $daya * $arrData2[12];
        } elseif ($daya >= "6600") {
            // $hargaUJL = $daya * 140;
            $hargaUJL = $daya * $arrData2[13];
        }

        if ($produk_layanan == "PASCABAYAR") {
            $totalBiaya = (($daya - $dayalama) * 0) + $hargaUJL + $hargaMaterai;
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = (($daya - $dayalama) * 0) + $hargaToken + $hargaMaterai;
        }
    } elseif ($daya >= $dayalama) {
        if ($dayalama <= "1300" && $daya == "2200") {
            $hargaMaterai = 0;
            // $hargaPenyambungan = 937;
            $hargaPenyambungan = $arrData2[6];

            if ($produk_layanan == "PASCABAYAR") {
                // $hargaUJL = $daya * 141;
                $hargaUJL = $daya * $arrData2[11];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
            } elseif ($produk_layanan == "PRABAYAR") {
                $hargaToken = $_POST['token'];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
            }
        } elseif ($dayalama <= "900" && $daya <= "2200") {
            $hargaMaterai = 0;
            // $hargaPenyambungan = 937;
            $hargaPenyambungan = $arrData2[6];

            if ($produk_layanan == "PASCABAYAR") {
                // $hargaUJL = $daya * 141;
                $hargaUJL = $daya * $arrData2[11];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
                $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
            } elseif ($produk_layanan == "PRABAYAR") {
                $hargaToken = $_POST['token'];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
                $konv = "Rp." . number_format($totalBiaya, 0, ',', '.') . "";
            }
        } elseif ($dayalama <= "2200" && $daya >= "3500") {
            // $hargaPenyambungan = 969;
            $hargaPenyambungan = $arrData2[7];

            if ($daya >= "6600") {
                // $hargaMaterai = 10000;
                $hargaMaterai = $arrData2[16];
            } else {
                $hargaMaterai = 0;
            }

            if ($daya <= "900") {
                // $hargaUJL = $daya * 72;
                $hargaUJL = $daya * $arrData2[9];
            } elseif ($daya == "1300") {
                // $hargaUJL = $daya * 133;
                $hargaUJL = $daya * $arrData2[10];
            } elseif ($daya == "2200") {
                // $hargaUJL = $daya * 141;
                $hargaUJL = $daya * $arrData2[11];
            } elseif ($daya == "3500" || $daya <= "5500") {
                // $hargaUJL = $daya * 157;
                $hargaUJL = $daya * $arrData2[12];
            } elseif ($daya >= "6600") {
                // $hargaUJL = $daya * 140;
                $hargaUJL = $daya * $arrData2[13];
            }

            if ($produk_layanan == "PASCABAYAR") {
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
            } elseif ($produk_layanan == "PRABAYAR") {
                $hargaToken = $_POST['token'];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
            }
        } elseif ($dayalama >= "2200" && $daya >= "2200") {
            // $hargaPenyambungan = 969;
            $hargaPenyambungan = $arrData2[7];

            if ($daya >= "6600") {
                $hargaMaterai = $arrData2[16];
            } else {
                $hargaMaterai = 0;
            }

            if ($daya <= "900") {
                // $hargaUJL = $daya * 72;
                $hargaUJL = $daya * $arrData2[9];
            } elseif ($daya == "1300") {
                // $hargaUJL = $daya * 133;
                $hargaUJL = $daya * $arrData2[10];
            } elseif ($daya == "2200") {
                // $hargaUJL = $daya * 141;
                $hargaUJL = $daya * $arrData2[11];
            } elseif ($daya == "3500" || $daya <= "5500") {
                // $hargaUJL = $daya * 157;
                $hargaUJL = $daya * $arrData2[12];
            } elseif ($daya >= "6600") {
                // $hargaUJL = $daya * 140;
                $hargaUJL = $daya * $arrData2[13];
            }

            if ($produk_layanan == "PASCABAYAR") {
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
            } elseif ($produk_layanan == "PRABAYAR") {
                $hargaToken = $_POST['token'];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
            }
        }
    }

    // Penentuan Tarif Berdasarkan Daya
    if ($daya <= "2200") {
        $tarif = "R-1";
    } elseif ($daya == "3500" || $daya <= "5500") {
        $tarif = "R-2";
    } elseif ($daya >= "6600") {
        $tarif = "R-3";
    }

    if ($produk_layanan == "PASCABAYAR") {
        $insert = "INSERT INTO tb_mohon_pd (no_registrasi,id_pelanggan, daya_lama,tarif_lama, produk_layanan, daya_baru,tarif_baru,total,peruntukan,tgl_masuk) 
        VALUES 
        ('$noRegistrasi','$idplg', '$dayalama','$tariflama','$produk_layanan','$daya','$tarif','$totalBiaya', '$peruntukan', '$tgl_masuk')";
    } elseif ($produk_layanan == "PRABAYAR") {
        $token = $_POST['token'];
        $t = "T";

        $insert = "INSERT INTO tb_mohon_pd (no_registrasi,id_pelanggan, daya_lama,tarif_lama, produk_layanan, daya_baru,tarif_baru,total,token,peruntukan,tgl_masuk) 
        VALUES 
        ('$noRegistrasi','$idplg', '$dayalama','$tariflama','$produk_layanan','$daya','$tarif$t','$totalBiaya','$token', '$peruntukan', '$tgl_masuk')";
    }
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));;
    // var_dump($insert);

    if ($query) {
        if ($daya <= "5500") {
            $fasa = "1 Fasa";
        } elseif ($daya >= "6600") {
            $fasa = "3 Fasa";
        }

        if ($fasalama == "1 Fasa" && $fasa == "3 Fasa") {
            $pekerjaanRAB = "PD 1 Fasa ke 3 Fasa";
        } elseif ($fasalama == "3 Fasa" && $fasa == "1 Fasa") {
            $pekerjaanRAB = "PD 3 Fasa ke 1 Fasa";
        } elseif ($fasalama == "1 Fasa" && $fasa == "1 Fasa") {
            $pekerjaanRAB = "PD 1 Fasa";
        } elseif ($fasalama == "3 Fasa" && $fasa == "3 Fasa") {
            $pekerjaanRAB = "PD 3 Fasa";
        }

        if ($produk_layanan == "PASCABAYAR") {
            if ($daya <= "5500") {
                $insert2 = "INSERT INTO tb_perubahan_daya (id_mohon,jenis_transaksi,daya_lama,tarif_lama,daya_baru,tarif_baru,fasa_lama,fasa_baru,pekerjaan_rab) VALUES ('" . mysqli_insert_id($mysqli) . "','Perubahan Daya','$dayalama','$tariflama','$daya','$tarif','$fasalama','$fasa','$pekerjaanRAB')";
            } elseif ($daya >= "6600") {
                $insert2 = "INSERT INTO tb_perubahan_daya (id_mohon,jenis_transaksi,daya_lama,tarif_lama,daya_baru,tarif_baru,fasa_lama,fasa_baru,pekerjaan_rab) VALUES ('" . mysqli_insert_id($mysqli) . "','Perubahan Daya','$dayalama','$tariflama','$daya','$tarif','$fasalama','$fasa','$pekerjaanRAB')";
            }
        } elseif ($produk_layanan == "PRABAYAR") {
            $t = "T";
            if ($daya <= "5500") {
                $insert2 = "INSERT INTO tb_perubahan_daya (id_mohon,jenis_transaksi,daya_lama,tarif_lama,daya_baru,tarif_baru,fasa_lama,fasa_baru,pekerjaan_rab) VALUES ('" . mysqli_insert_id($mysqli) . "','Perubahan Daya','$dayalama','$tariflama','$daya','$tarif$t','$fasalama','$fasa','$pekerjaanRAB')";
            } elseif ($daya >= "6600") {
                $insert2 = "INSERT INTO tb_perubahan_daya (id_mohon,jenis_transaksi,daya_lama,tarif_lama,daya_baru,tarif_baru,fasa_lama,fasa_baru,pekerjaan_rab) VALUES ('" . mysqli_insert_id($mysqli) . "','Perubahan Daya','$dayalama','$tariflama','$daya','$tarif$t','$fasalama','$fasa','$pekerjaanRAB')";
            }
        }
        $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));;
        // var_dump($insert2);
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Sukses Menambahkan Data Mohon Perubahan Daya! Data anda akan segera kami cek dan akan kami hubungi melewati E-Mail!'
            }).then((result) => {
                window.location = "perubahan_daya/menu_pd.php";
            })
        </script>
    <?php
    } else {

    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal Menambahkan Data Mohon Perubahan Daya!'
            }).then((result) => {
                window.location = "perubahan_daya/menu_pd.php";
            })
        </script>
    <?php
    }
} elseif (isset($_POST['savemlta'])) {
    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_registrasi) as RegTerbesar FROM tb_mohon_multiguna");
    $dataambil = mysqli_fetch_array($queryambil);
    $noRegistrasi = @$dataambil['RegTerbesar'];

    $urutan = (int) substr($noRegistrasi, 7, 5);
    $urutan++;

    $huruf = "NRG-PS-";
    $noRegistrasi = $huruf . sprintf("%05s", $urutan);

    $idplg = $_POST['idplg'];
    $daya = $_POST['daya'];
    $tglmulai = $_POST['tgl_mulai'];
    $tglselesai = $_POST['tgl_selesai'];
    $pemakaian = $_POST['pemakaian'];
    $peruntukan = $_POST['peruntukan'];
    $tgl_masuk = $_POST['tgl_masuk'];

    $tgl_awal = date_create($tglmulai);
    $tgl_akhir = date_create($tglselesai);
    $diff = date_diff($tgl_awal, $tgl_akhir);
    $ambilLamaHari = $diff->d;

    // $biayaKWH = 1650;
    $biayaKWH = $arrData2[8];
    if ($daya >= "7700") {
        // $PPN = 10;
        $PPN = $arrData2[14];
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
        $PPJ = $arrData2[15];
        $persenPPJ = $PPJ / 100;
        $biayaMaterai = 0;

        $total1 = $emin * $biayaKWH;
        $total2 = $persenPPJ * $total1;
        $total3 = $persenPPN * $total1;
        $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    } elseif ($ambilLamaHari == "2" || $ambilLamaHari == "3") {
        $eDibA = $eDib * $ambilLamaHari;

        if ($eDibA <= "150") {
            $emin = 150;
        } else {
            $emin = $eDib * $ambilLamaHari;
        }

        // $PPJ = 8;
        $PPJ = $arrData2[15];
        $persenPPJ = $PPJ / 100;
        $biayaMaterai = 0;

        $total1 = $emin * $biayaKWH;
        $total2 = $persenPPJ * $total1;
        $total3 = $persenPPN * $total1;
        $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    } elseif ($ambilLamaHari == "4" || $ambilLamaHari <= "7") {
        $eDibA = $eDib * $ambilLamaHari;

        if ($eDibA <= "300") {
            $emin = 300;
        } else {
            $emin = $eDib * $ambilLamaHari;
        }

        // $PPJ = 8;
        $PPJ = $arrData2[15];
        $persenPPJ = $PPJ / 100;
        if (($ambilLamaHari == "5" || $ambilLamaHari <= "30") && $daya >= "23000") {
            // $biayaMaterai = 10000;
            $biayaMaterai = $arrData2[16];
        } else {
            $biayaMaterai = 0;
        }

        $total1 = $emin * $biayaKWH;
        $total2 = $persenPPJ * $total1;
        $total3 = $persenPPN * $total1;
        $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    } elseif ($ambilLamaHari == "8" || $ambilLamaHari <= "30") {
        $eDibA = $eDib * $ambilLamaHari;

        if ($eDibA <= "500") {
            $emin = 500;
        } else {
            $emin = $eDib * $ambilLamaHari;
        }
        // $PPJ = 8;
        $PPJ = $arrData2[15];
        $persenPPJ = $PPJ / 100;

        if ($ambilLamaHari == "5" && $daya >= "23000") {
            // $biayaMaterai = 10000;
            $biayaMaterai = $arrData2[16];
        } else {
            $biayaMaterai = 0;
        }

        $total1 = $emin * $biayaKWH;
        $total2 = $persenPPJ * $total1;
        $total3 = $persenPPN * $total1;
        $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    } elseif ($ambilLamaHari >= "31") {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal Menambahkan Data, Lama Hari tidak boleh melebihi 30 hari!'
            }).then((result) => {
                window.location = "menu_mg.php";
            })
        </script>
    <?php
    }

    $insert = "INSERT INTO tb_mohon_multiguna (no_registrasi,id_pelanggan, daya, tgl_mulai_pemakaian, tgl_selesai_pemakaian, pemakaian,lamahari,total,peruntukan,tgl_masuk) VALUES ('$noRegistrasi','$idplg', '$daya', '$tglmulai', '$tglselesai', '$pemakaian','$ambilLamaHari Hari', '$totalBiaya', '$peruntukan','$tgl_masuk')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
    // var_dump($insert);

    if ($query) {
        if ($daya <= "5500" || $daya == "7700") {
            $fasa = "1 Fasa";
        } elseif ($daya == "6600" || $daya >= "10600") {
            $fasa = "3 Fasa";
        }

        if ($fasa == "1 Fasa") {
            $pekerjaanRAB = "Multiguna Pelanggan 1 Fasa";
        } else {
            $pekerjaanRAB = "Multiguna Pelanggan 3 Fasa";
        }

        $insert2 = "INSERT INTO tb_multiguna (id_mohon,jenis_transaksi, daya, fasa, pekerjaan_rab) VALUES ('" . mysqli_insert_id($mysqli) . "','Sambung Sementara', '$daya', '$fasa', '$pekerjaanRAB')";
        $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
        // var_dump($insert2);
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Sukses Menambahkan Data Mohon Sambung Sementara! Data anda akan segera kami cek dan akan kami hubungi melewati E-Mail!'
            }).then((result) => {
                window.location = "multiguna/menu_mg.php";
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal Menambahkan Data Mohon Multiguna / Penyambungan Sementara!'
            }).then((result) => {
                window.location = "multiguna/menu_mg.php";
            })
        </script>
<?php
    }
}
