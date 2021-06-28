<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

if (isset($_POST['save'])) {
    $id = $_POST['id_pengaduan'];
    $nama = $_POST['nama'];
    $id_teknisi = $_POST['id_teknisi'];

    $insert = "UPDATE tb_pengaduan SET teknisi='$nama', status='Dalam Proses' WHERE id_pengaduan = $id";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($query) {
        $update = "UPDATE tb_tekpen_lap_masuk SET id_teknisi='$id_teknisi', op_acc='1' WHERE id_pengaduan = $id";
        $query2 = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Menambahkan Teknisi'
            }).then((result) => {
                window.location = "header.php?page=pengaduanproses";
            })
        </script>
    <?php
    }
}

$email_pengirim = 'pln.up3.bjm@gmail.com'; // Isikan dengan email pengirim
$nama_pengirim = 'pln up3'; // Isikan dengan nama pengirim
$email_penerima = $_POST['email_penerima']; // Ambil email penerima dari inputan form
$subjek = $_POST['subjek']; // Ambil subjek dari inputan form
$pesan = $_POST['pesan']; // Ambil pesan dari inputan form
// $attachment = $_FILES['attachment']['name']; // Ambil nama file yang di upload

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
include "pelayanan_pengaduan/content.php";

$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();

$mail->Subject = $subjek;
$mail->Body = $content;
$mail->AddEmbeddedImage('img/logopln.png', 'logo_PLN', 'logopln.png'); // Aktifkan jika ingin menampilkan gambar dalam email

$send = $mail->send();

if ($send) { // Jika Email berhasil dikirim
    ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses.',
            text: 'Sukses Mengirimkan Email!'
        }).then((result) => {
            window.location = "header.php?page=pengaduanmasuk";
        })
    </script>
<?php
} else { // Jika Email gagal dikirim
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal.',
            text: 'Gagal Mengirimkan Email!'
        }).then((result) => {
            window.location = "header.php?page=pengaduanmasuk";
        })
    </script>
<?php
}
