<?php
//memasukkan koneksi database
require_once("../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    // $view = $mysqli->query("SELECT a.*, b.*, c.id_mohon, c.jenis_transaksi FROM tb_laporan_survey a JOIN tb_mohon_pd b ON a.id_mohon_survey = b.id_mohon JOIN tb_perubahan_daya c ON a.id_mohon_survey = c.id_mohon WHERE a.id_survey_lap ='$id'");

    $view = $mysqli->query("SELECT a.*, b.id_mohon, b.jenis_transaksi, b.status_teknisi, c.* FROM tb_laporan_tekyan a JOIN tb_perubahan_daya b ON a.id_yanbung = b.id_perubahan_daya JOIN tb_mohon_pd c ON b.id_mohon = c.id_mohon WHERE a.id_tekyanlap ='$id'");

    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();
            //menampilkan data dengan table
            echo '
            <div class="form-group">
                <label for="">Tanggal Mulai</label>
                <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_mulai'])) . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Laporan Sementara Teknisi</label>
                <textarea class="form-control" cols="10" rows="3" readonly>' . $row_view['laporan'] . '</textarea>
            </div>

            <a class="btn btn-warning rounded float-right" href="header.php?page=progresteknisi&status=' . $row_view['status_teknisi'] . '&id=' . $row_view['id_tekyanlap'] . '&jt=' . $row_view['jenis_transaksi'] . '">
                Edit Status
            </a>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
