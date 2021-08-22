<?php
include '../koneksi.php';

$ambil = "SELECT * FROM tb_harga_penyambungan";
$qambil = mysqli_query($mysqli, $ambil);
$arrData2[] = '';
while ($data = mysqli_fetch_array($qambil)) {
    $TData = $data[3];
    $arrData2[] = $TData;
}

var_dump($arrData2);
