<?php
include "../../koneksi.php";
$no_petugas_survey = $_POST['no_petugas_survey'];
$query = mysqli_query($mysqli, "SELECT * FROM tb_petugas_survey WHERE no_petugas_survey ='" . $no_petugas_survey . "'");
$row = mysqli_num_rows($query);
if ($row > 0) {
    $data = mysqli_fetch_array($query);

    // BUat sebuah array
    $callback = array(
        'status' => 'success',
        'id_survey' => $data['no_petugas_survey'],
        'nama' => $data['nama'],
    );
} else {
    $callback = array('status' => 'failed');
}
echo json_encode($callback);
