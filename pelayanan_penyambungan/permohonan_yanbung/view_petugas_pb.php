<?php
//memasukkan koneksi database
require_once("../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    // $view = $mysqli->query("SELECT a.*, b.*,c.* FROM tb_laporan_survey a JOIN tb_survey_lap_masuk b ON b.id_survey_lap = a.id_survey_lap JOIN tb_petugas_survey c ON c.no_petugas_survey = b.id_petugas WHERE a.id_laporan ='$id'");
    $view = $mysqli->query("SELECT a.*,b.*,c.* FROM tb_mohon_pb a JOIN tb_survey_lap_masuk b ON a.id_mohon = b.id_mohon_survey JOIN tb_petugas_survey c ON b.id_petugas = c.no_petugas_survey WHERE b.id_survey_lap = '$id'");
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
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
