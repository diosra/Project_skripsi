<?php
//memasukkan koneksi database
require_once("../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $mysqli->query("SELECT a.id_mohon, b.*,c.*, d.* FROM tb_mohon_pb a JOIN tb_laporan_survey b ON a.id_mohon = b.id_mohon_survey JOIN tb_survey_lap_masuk c ON a.id_mohon = c.id_mohon_survey JOIN tb_petugas_survey d ON c.id_petugas = d.no_petugas_survey WHERE a.id_mohon ='$id'");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();
            //menampilkan data dengan table
            echo '
            <div class="form-group">
                <label for="">Nama Petugas Survey</label>
                <input type="text" value="' . $row_view['nama'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Tanggal Memulai Survey</label>
                <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_mulai'])) . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Laporan Sementara Petugas Survey</label>
                <textarea class="form-control" cols="10" rows="3" readonly>' . $row_view['laporan'] . '</textarea>
            </div>
            
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
