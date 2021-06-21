<?php
include "../../koneksi.php"; // Load file koneksi.php
$id_pelanggan = $_POST['id_pelanggan']; // Ambil data NIS yang dikirim lewat AJAX
$query = mysqli_query($mysqli, "SELECT * FROM tb_mohon_pb WHERE id_pelanggan ='" . $id_pelanggan . "'"); // Tampilkan data siswa dengan NIS tersebut
$row = mysqli_num_rows($query); // Hitung ada berapa data dari hasil eksekusi $query
if ($row > 0) { // Jika data lebih dari 0
    $data = mysqli_fetch_array($query); // ambil data siswa tersebut

    // BUat sebuah array
    $callback = array(
        'status' => 'success', // Set array status dengan success // Set array nama dengan isi kolom nama pada tabel siswa
        'no_registrasi' => $data['no_registrasi'], // Set array nama dengan isi kolom nama pada tabel siswa
        'nama' => $data['nama'], // Set array nama dengan isi kolom nama pada tabel siswa
        'alamat' => $data['alamat'], // Set array jenis_kelamin dengan isi kolom jenis_kelamin pada tabel siswa
        'nohp' => $data['nohp'],
        'notelp' => $data['notelp'],
        'email' => $data['email'],
        'daya' => $data['daya'],
    );
} else {
    $callback = array('status' => 'failed'); // set array status dengan failed
}
echo json_encode($callback); // konversi varibael $callback menjadi JSON
