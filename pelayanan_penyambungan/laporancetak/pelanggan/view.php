<?php
//memasukkan koneksi database
require_once("../../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    // $view = $mysqli->query("SELECT a.*, b.* FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon WHERE id_pasang_baru = $id");
    $view = $mysqli->query("SELECT a.*, b.id_pelanggan FROM tb_pelanggan a JOIN tb_mohon_pb b ON a.idpel = b.id_pelanggan WHERE a.id_pelanggan = '$id'");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();

            echo '
            <div class="form-group">
                <label for="">No Handphone</label>
                <input type="text" value="' . $row_view['nohp'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">No Telpon</label>
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
