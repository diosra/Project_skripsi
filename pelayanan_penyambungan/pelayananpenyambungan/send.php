<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

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

if (isset($_POST['savepb'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $id_teknisi = $_POST['id_teknisi'];
    $fasa = $_GET['fasa'];

    $update = "UPDATE tb_pasang_baru SET teknisi='$nama', status_teknisi='1' WHERE id_pasang_baru = $id";
    $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
    // var_dump($update);

    if ($query && $send) {
        $tipe = "Pasang Baru";
        $insert = "INSERT INTO tb_tekyan_lap_masuk (id_yanbung,id_teknisi,pegawai_acc, tipe) VALUES ('$id','$id_teknisi','1', '$tipe')";
        $query2 = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
        // var_dump($insert);

        if ($fasa == "1 Fasa") {
?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Teknisi dan Mengirimkan Email!'
                }).then((result) => {
                    window.location = "header.php?page=pb1phasa";
                })
            </script>
        <?php
        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Teknisi dan Mengirimkan Email!'
                }).then((result) => {
                    window.location = "header.php?page=pb3phasa";
                })
            </script>
        <?php
        }
    }
} elseif (isset($_POST['savepd'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $id_teknisi = $_POST['id_teknisi'];
    $fasa = $_GET['fasa'];

    $update = "UPDATE tb_perubahan_daya SET teknisi='$nama', status_teknisi='1' WHERE id_perubahan_daya = $id";
    $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
    // var_dump($update);

    if ($query && $send) {
        $tipe = "Perubahan Daya";
        $insert = "INSERT INTO tb_tekyan_lap_masuk (id_yanbung,id_teknisi,pegawai_acc, tipe) VALUES ('$id','$id_teknisi','1', '$tipe')";
        $query2 = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
        // var_dump($insert);

        if ($fasa == "1 Fasa") {
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Teknisi dan Mengirimkan Email!'
                }).then((result) => {
                    window.location = "header.php?page=pd1phasa";
                })
            </script>
        <?php
        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Teknisi dan Mengirimkan Email!'
                }).then((result) => {
                    window.location = "header.php?page=pd3phasa";
                })
            </script>
        <?php

        }
    }
} elseif (isset($_POST['savemlta'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $id_teknisi = $_POST['id_teknisi'];
    $fasa = $_GET['fasa'];

    $update = "UPDATE tb_multiguna SET teknisi='$nama', status_teknisi='1' WHERE id_mlta = $id";
    $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
    // var_dump($update);

    if ($query && $send) {
        $tipe = "Penyambungan Sementara";
        $insert = "INSERT INTO tb_tekyan_lap_masuk (id_yanbung,id_teknisi,pegawai_acc, tipe) VALUES ('$id','$id_teknisi','1', '$tipe')";
        $query2 = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
        // var_dump($insert);

        if ($fasa == "1 Fasa") {
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Teknisi dan Mengirimkan Email!'
                }).then((result) => {
                    window.location = "header.php?page=multiguna1phasa";
                })
            </script>
        <?php
        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Teknisi dan Mengirimkan Email!'
                }).then((result) => {
                    window.location = "header.php?page=multiguna3phasa";
                })
            </script>
<?php
        }
    }
}
