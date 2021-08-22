<?php
//memasukkan koneksi database
require_once("../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $mysqli->query("SELECT * FROM tb_pelanggan WHERE id_pelanggan ='$id'");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();
            //menampilkan data dengan table
            echo '
            <div class="form-group">
                <label for="">ID Pelanggan</label>
                <input type="text" value="' . $row_view['idpel'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">No HP</label>
                <input type="text" value="' . $row_view['nohp'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">No Telp</label>
                <input type="text" value="' . $row_view['no_telp'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" value="' . $row_view['email'] . '" class="form-control" readonly>
            </div>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
