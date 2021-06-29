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
include "pelayanan_penyambungan/CRUD/content.php";

$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();

$mail->Subject = $subjek;
$mail->Body = $content;
$mail->AddEmbeddedImage('img/logopln.png', 'logo_PLN', 'logopln.png'); // Aktifkan jika ingin menampilkan gambar dalam email

$send = $mail->send();

if (isset($_POST['savepb'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $tgl_mohon = $_POST['tgl_mohon'];
    $tarif_baru = $_POST['tarif_baru'];
    $daya_baru = $_POST['daya_baru'];
    $fasa_baru = $_POST['fasa_baru'];

    $insert = "INSERT INTO tb_pasang_baru (id_pelanggan, jenis_transaksi,tgl_mohon, tarif_baru, daya_baru, fasa_baru) VALUES ('$id_pelanggan', 'Pasang Baru', '$tgl_mohon', '$tarif_baru','$daya_baru', '$fasa_baru')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    if ($fasa_baru == "1 FASA") {
        $ambil1 = "PB 1 FASA";
    } elseif ($fasa_baru == "3 FASA") {
        $ambil2 = "PB 3 FASA";
    }

    if ($query && $send) {
        if ($fasa_baru == "1 FASA") {
            $insert2 = "INSERT INTO tb_detail_pb_1phs (id_pasang_baru, pekerjaan_rab, uraianbiaya1_pb1,uraianbiaya2_pb1,uraianbiaya3_pb1,uraianbiaya4_pb1,uraianbiaya5_pb1,uraianbiaya6_pb1,uraianbiaya7_pb1,uraianbiaya8_pb1,uraianbiaya9_pb1,uraianbiaya10_pb1,uraianbiaya11_pb1,total_biaya)
            VALUES 
            ('" . mysqli_insert_id($mysqli) . "', '$ambil1', '243040','4210','2724','6985','9358','5615','3842','41008','33625','22982','20856','394245')";
            $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Data Pelanggan Pasang Baru 1 Phasa'
                }).then((result) => {
                    window.location = "header.php?page=pb1phasa";
                })
            </script>
        <?php
        } elseif ($fasa_baru == "3 FASA") {
            $insert2 = "INSERT INTO tb_detail_pb_3phs (id_pasang_baru,pekerjaan_rab, uraianbiaya1_pb3,uraianbiaya2_pb3,uraianbiaya3_pb3,uraianbiaya4_pb3,uraianbiaya5_pb3,uraianbiaya6_pb3,uraianbiaya7_pb3,uraianbiaya8_pb3,uraianbiaya9_pb3,uraianbiaya10_pb3,uraianbiaya11_pb3,uraianbiaya12_pb3,uraianbiaya13_pb3,total_biaya)
            VALUES 
            ('" . mysqli_insert_id($mysqli) . "', '$ambil2', '1348000', '2400000', '2724', '29360', '12110','4433', '11722', '39400', '5615', '46811', '3482', '31339', '20856', '3990852')";
            $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Sukses Menambahkan Data Pelanggan Pasang Baru 3 Phasa'
                }).then((result) => {
                    window.location = "header.php?page=pb3phasa";
                })
            </script>
<?php
        }
    }
}
