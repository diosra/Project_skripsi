<?php
include "../../koneksi.php"; // Load file koneksi.php
$id_pelanggan = $_POST['id_pelanggan']; // Ambil data NIS yang dikirim lewat AJAX
$query = mysqli_query($mysqli, "SELECT * FROM tb_pelanggan WHERE idpel ='" . $id_pelanggan . "'"); // Tampilkan data siswa dengan NIS tersebut
$row = mysqli_num_rows($query); // Hitung ada berapa data dari hasil eksekusi $query
if ($row > 0) { // Jika data lebih dari 0
    $data = mysqli_fetch_array($query); // ambil data siswa tersebut

    // BUat sebuah array
    $callback = array(
        'status' => 'success',
        'nama' => $data['nama'],
        'alamat' => $data['alamat'],
        'nohp' => $data['nohp'],
        'notelpon' => $data['no_telp'],
        'email' => $data['email'],
        'ktp' => $data['identitas'],
        'idpel' => $data['idpel'],
    );
} else {
    $callback = array('status' => 'failed'); // set array status dengan failed
}
echo json_encode($callback); // konversi varibael $callback menjadi JSON
