<?php
//memasukkan koneksi database
require_once("../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $mysqli->query("SELECT a.*, b.* FROM tb_pengaduan a JOIN tb_pelanggan b ON a.id_pelanggan = b.idpel WHERE id_pengaduan='$id'");
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
                <label for="">Jenis Gangguan</label>
                <input type="text" value="' . $row_view['gangguan'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">No Handphone</label>
                <input type="text" value="' . $row_view['nohp'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">No Telpon</label>
                <input type="text" value="' . $row_view['no_telp'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Email Pelapor</label>
                <input type="text" value="' . $row_view['email'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Deskripsi Pengaduan</label>
                <textarea class="form-control" cols="10" rows="3" readonly>' . $row_view['deskripsi'] . '</textarea>
            </div>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
