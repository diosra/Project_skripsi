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
    $id_petugas = $_POST['id_petugas_survey'];
    $noreg = $_POST['noreg'];
    $fasa = $_GET['fasa'];

    $update = "UPDATE tb_mohon_pb SET petugas_survey='$nama', status_survey='1' WHERE id_mohon = $id";
    $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
    // var_dump($update);

    if ($query && $send) {
        $tipeSurvey = "Survey Pasang Baru";
        $insert = "INSERT INTO tb_survey_lap_masuk (id_mohon_survey,noreg,id_petugas,pegawai_acc, tipe) VALUES ('$id','$noreg','$id_petugas','1', '$tipeSurvey')";
        $query2 = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
        // var_dump($insert);

        if ($fasa == "1 Fasa") {
?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Petugas Survey dan Mengirimkan Email!'
                }).then((result) => {
                    window.location = "header.php?page=mohonyanbungpb";
                })
            </script>
        <?php
        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Petugas Survey dan Mengirimkan Email!'
                }).then((result) => {
                    window.location = "header.php?page=mohonyanbungpb";
                })
            </script>
        <?php
        }
    }
} elseif (isset($_POST['savepd'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $id_petugas = $_POST['id_petugas_survey'];
    $noreg = $_POST['noreg'];
    $fasa = $_GET['fasa'];

    $update = "UPDATE tb_mohon_pd SET petugas_survey='$nama', status_survey='1' WHERE id_mohon = $id";
    $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
    // var_dump($update);

    if ($query && $send) {
        $tipeSurvey = "Survey Perubahan Daya";
        $insert = "INSERT INTO tb_survey_lap_masuk (id_mohon_survey,noreg,id_petugas,pegawai_acc, tipe) VALUES ('$id','$noreg','$id_petugas','1', '$tipeSurvey')";
        $query2 = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
        // var_dump($insert);

        if ($fasa == "1 Fasa") {
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Petugas Survey dan Mengirimkan Email!'
                }).then((result) => {
                    window.location = "header.php?page=mohonyanbungpd";
                })
            </script>
        <?php
        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Petugas Survey dan Mengirimkan Email!'
                }).then((result) => {
                    window.location = "header.php?page=mohonyanbungpd";
                })
            </script>
        <?php

        }
    }
} elseif (isset($_POST['savemlta'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $id_petugas = $_POST['id_petugas_survey'];
    $noreg = $_POST['noreg'];
    $fasa = $_GET['fasa'];

    $update = "UPDATE tb_mohon_multiguna SET petugas_survey='$nama', status_survey='1' WHERE id_mohon = $id";
    $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
    // var_dump($update);

    if ($query && $send) {
        $tipeSurvey = "Survey Penyambungan Sementara";
        $insert = "INSERT INTO tb_survey_lap_masuk (id_mohon_survey,noreg,id_petugas,pegawai_acc, tipe) VALUES ('$id','$noreg','$id_petugas','1', '$tipeSurvey')";
        $query2 = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
        // var_dump($insert);

        if ($fasa == "1 Fasa") {
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Petugas Survey dan Mengirimkan Email!'
                }).then((result) => {
                    window.location = "header.php?page=mohonyanbungps";
                })
            </script>
        <?php
        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Petugas Survey dan Mengirimkan Email!'
                }).then((result) => {
                    window.location = "header.php?page=mohonyanbungps";
                })
            </script>
<?php
        }
    }
}
