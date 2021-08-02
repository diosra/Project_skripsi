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
include('../../phpmailer/Exception.php');
include('../../phpmailer/PHPMailer.php');
include('../../phpmailer/SMTP.php');
include '../../koneksi.php';

$email_pengirim = 'pln.up3.bjm@gmail.com'; // Isikan dengan email pengirim
$nama_pengirim = 'pln up3'; // Isikan dengan nama pengirim
$email_penerima = $_POST['email']; // Ambil email penerima dari inputan form
// Ambil subjek dari inputan form
// $pesan = $_POST['pesan']; // Ambil pesan dari inputan form
if (isset($_POST['save'])) {
    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_laporan) as LapTerbesar FROM tb_pengaduan");
    $dataambil = mysqli_fetch_array($queryambil);
    $noLaporan = @$dataambil['LapTerbesar'];

    $urutan = (int) substr($noLaporan, 8, 8);
    $urutan++;

    $huruf = "NLP";
    $noLaporan = $huruf . sprintf("%08s", $urutan);

    $subjek = "Laporan Pengaduan";
    $idpel = $_POST['idpel'];
    $gangguan = $_POST['gangguan'];
    $identitas = $_POST['identitas'];
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $notelp = $_POST['no_telp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_masuk_laporan = $_POST['tgl_masuk_laporan'];
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
include "../../dashboard/layanan_pengaduan/content.php";

$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();

$mail->Subject = $subjek;
$mail->Body = $content;
$mail->AddEmbeddedImage('../../img/logopln.png', 'logo_PLN', 'logopln.png'); // Aktifkan jika ingin menampilkan gambar dalam email

$send = $mail->send();

if (isset($_POST['save'])) {
    $idpel = $_POST['idpel'];
    $gangguan = $_POST['gangguan'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_masuk_laporan = $_POST['tgl_masuk_laporan'];

    $insert = "INSERT INTO tb_pengaduan (no_laporan,id_pelanggan,gangguan,deskripsi, tgl_masuk_laporan) VALUES ('$noLaporan','$idpel','$gangguan', '$deskripsi', '$tgl_masuk_laporan')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($query && $send) {
        $insert2 = "INSERT INTO tb_tekpen_lap_masuk (id_pengaduan,op_acc) values ('" . mysqli_insert_id($mysqli) . "', '0')";
        $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Data Laporan anda berhasil terkirim! anda akan segera dihubungi oleh operator kami dengan Email yang sudah anda masukkan'
            }).then((result) => {
                window.location = "pengaduan_input.php";
            })
        </script>
<?php
    }
}
