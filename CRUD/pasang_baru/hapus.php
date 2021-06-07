<?php

include '../../koneksi.php';

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $mysqli->query("DELETE FROM tb_pasang_baru WHERE id_pasang_baru=$id") or die(mysqli_error($mysqli));

    echo '<script>window.location = "../../pelayananpenyambungan/pasang_baru/pb1phasa.php" </script>';
}
