<?php
//memasukkan koneksi database
require_once("../../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $mysqli->query("SELECT a.*, b.* FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon WHERE id_pasang_baru = $id");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();

            echo '
            <div class="form-group">
                <label for="">No Registrasi</label>
                <input type="text" value="' . $row_view['no_registrasi'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">ID Pelanggan</label>
                <input type="text" value="' . $row_view['id_pelanggan'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Jenis Transaksi</label>
                <input type="text" value="' . $row_view['jenis_transaksi'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Daya</label>
                <input type="text" value="' . $row_view['daya'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Tarif</label>
                <input type="text" value="' . $row_view['tarif'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Fasa Baru</label>
                <input type="text" value="' . $row_view['fasa_baru'] . '" class="form-control" readonly>
            </div>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
