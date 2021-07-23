<?php
//memasukkan koneksi database
require_once("../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $mysqli->query("SELECT a.*, b.* FROM tb_laporan_survey a JOIN tb_pasang_baru b ON a.id_yanbung = b.id_pasang_baru WHERE a.id_survey_lap ='$id'");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();
            //menampilkan data dengan table
            echo '
            <div class="form-group">
                <label for="">Tanggal Memulai Survey</label>
                <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_mulai'])) . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Laporan Sementara Petugas Survey</label>
                <textarea class="form-control" cols="10" rows="3" readonly>' . $row_view['laporan'] . '</textarea>
            </div>

            <a class="btn btn-warning rounded float-right" href="header.php?page=progressurvey&status=' . $row_view['status_survey'] . '&id=' . $row_view['id_survey_lap'] . '&jt=' . $row_view['jenis_transaksi'] . '">
                Edit Status Survey
            </a>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
