<?php
//memasukkan koneksi database
require_once("../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $mysqli->query("SELECT * FROM tb_laporan_tekpen WHERE id_laporan ='$id'");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();
            //menampilkan data dengan table
            echo '
            <div class="form-group">
                <label for="">Tanggal Mulai Perbaikan</label>
                <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_mulai'])) . '" class="form-control" readonly>
            </div>
            <hr>
            <div class="form-group">
                <label for="">Tanggal Selesai Perbaikan</label>
                <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_selesai'])) . '" class="form-control" readonly>
            </div>
            <hr>
            <div class="form-group">
                <label for="">Laporan</label>
                <textarea class="form-control" cols="10" rows="3" readonly>' . $row_view['laporan'] . '</textarea>
            </div>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
