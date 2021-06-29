<?php
include "../../koneksi.php";
$no_registrasi = $_POST['no_registrasi'];
$query = mysqli_query($mysqli, "SELECT * FROM tb_pelanggan WHERE no_registrasi ='" . $no_registrasi . "'");
$row = mysqli_num_rows($query);
if ($row > 0) {
    $data = mysqli_fetch_array($query);

    $callback = array(
        'status' => 'success',
        'id_pelanggan' => $data['id_pelanggan'],
        'identitas' => $data['identitas'],
        'nama' => $data['nama'],
        'email' => $data['email'],
        'alamat' => $data['alamat']
    );
} else {
    $callback = array('status' => 'failed');
}
echo json_encode($callback);
