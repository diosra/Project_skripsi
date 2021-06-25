<?php
include "../koneksi.php";
$no_teknisi = $_POST['no_teknisi'];
$query = mysqli_query($mysqli, "SELECT * FROM tb_teknisi_pengaduan WHERE no_teknisi ='" . $no_teknisi . "'");
$row = mysqli_num_rows($query);
if ($row > 0) {
    $data = mysqli_fetch_array($query);

    // BUat sebuah array
    $callback = array(
        'status' => 'success',
        'id_teknisi' => $data['id_teknisi'],
        'nama' => $data['nama'],
    );
} else {
    $callback = array('status' => 'failed');
}
echo json_encode($callback);
