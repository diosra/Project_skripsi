<?php
//memasukkan koneksi database
require_once("../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $mysqli->query("SELECT * FROM tb_pengaduan WHERE id_pengaduan='$id'");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();
            //menampilkan data dengan table
            echo '
            <div class="form-group">
                <label for="">Jenis Gangguan</label>
                <input type="text" value="' . $row_view['gangguan'] . '" class="form-control" readonly>
            </div>
            <hr>
            <div class="form-group">
                <label for="">Tanggal Pengaduan Masuk</label>
                <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_masuk_laporan'])) . '" class="form-control" readonly>
            </div>
            <hr>
            <div class="form-group">
                <label for="">Kabupaten</label>
                <input type="text" value="' . $row_view['kabupaten'] . '" class="form-control" readonly>
            </div>
            <hr>
            <div class="form-group">
                <label for="">Kecamatan</label>
                <input type="text" value="' . $row_view['kecamatan'] . '" class="form-control" readonly>
            </div>
            <hr>
            <div class="form-group">
                <label for="">Kelurahan</label>
                <input type="text" value="' . $row_view['kelurahan'] . '" class="form-control" readonly>
            </div>
            <hr>
            <div class="form-group">
                <label for="">No Handphone</label>
                <input type="text" value="' . $row_view['nohp'] . '" class="form-control" readonly>
            </div>
            <hr>
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
