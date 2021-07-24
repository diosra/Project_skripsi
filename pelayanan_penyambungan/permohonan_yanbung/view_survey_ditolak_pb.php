<?php
//memasukkan koneksi database
require_once("../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $mysqli->query("SELECT a.*, b.*,c.*, d.id_mohon FROM tb_laporan_survey a JOIN tb_survey_lap_masuk b ON b.id_survey_lap = a.id_survey_lap JOIN tb_petugas_survey c ON c.no_petugas_survey = b.id_petugas JOIN tb_mohon_pb d ON d.id_mohon = b.id_mohon_survey WHERE a.id_laporan ='$id'");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();
            //menampilkan data dengan table
            echo '
            <div class="form-group">
                <label for="">Petugas Survey</label>
                <input type="text" value="' . $row_view['nama'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Tanggal Mulai Survey</label>
                <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_mulai'])) . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Tanggal Selesai Survey</label>
                <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_selesai'])) . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Alasan Penolakan</label>
                <textarea class="form-control" cols="10" rows="3" readonly>' . $row_view['alasan_penolakan'] . '</textarea>
            </div>

            <hr>

            <a href="header.php?page=kirimkonfirmasi&idsurveypb=' . $row_view['id_mohon'] . '" class="btn btn-primary" name="savepb"> Kirim Email</a>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
