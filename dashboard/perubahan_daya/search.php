<?php
include "../../koneksi.php"; // Load file koneksi.php
$id_pelanggan = $_POST['idpel']; // Ambil data NIS yang dikirim lewat AJAX
// $query = mysqli_query($mysqli, "SELECT a.*, b.* FROM tb_pelanggan a JOIN tb_pasang_baru b ON a.id_mohon = b.id_mohon WHERE idpel ='" . $id_pelanggan . "'"); // Tampilkan data siswa dengan NIS tersebut
$query = mysqli_query($mysqli, "SELECT a.* , b.id_mohon, b.status_survey, c.*,d.* FROM tb_pelanggan a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon JOIN tb_pasang_baru c ON b.id_mohon = c.id_mohon JOIN tb_laporan_tekyan d ON d.id_yanbung = c.id_pasang_baru WHERE a.idpel ='" . $id_pelanggan . "' && b.status_survey = '3' && b.status_pembayaran = '1' && d.status = '3'"); // Tampilkan data siswa dengan NIS tersebut
$row = mysqli_num_rows($query); // Hitung ada berapa data dari hasil eksekusi $query
if ($row > 0) { // Jika data lebih dari 0
    $data = mysqli_fetch_array($query); // ambil data siswa tersebut

    // BUat sebuah array
    $callback = array(
        'status' => 'success',
        'ktp' => $data['identitas'],
        'nama' => $data['nama'],
        'alamat' => $data['alamat'],
        'nohp' => $data['nohp'],
        'notelp' => $data['no_telp'],
        'email' => $data['email'],
        'tarif' => $data['tarif'],
        'daya' => $data['daya'],
        'idpel' => $data['idpel'],
        'fasalama' => $data['fasa_baru'],
    );
} else {
    $callback = array('status' => 'failed'); // set array status dengan failed
}
echo json_encode($callback); // konversi varibael $callback menjadi JSON
