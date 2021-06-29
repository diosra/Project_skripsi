<?php
//memasukkan koneksi database
require_once("../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $mysqli->query("SELECT * FROM tb_laporan_tekpen WHERE id_pengaduan ='$id'");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();
            //menampilkan data dengan table
            echo '
		    <p>' . $row_view['laporan'] . '</p>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
