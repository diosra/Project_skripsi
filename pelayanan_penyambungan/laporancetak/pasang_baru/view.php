<?php
//memasukkan koneksi database
require_once("../../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];

    $view = $mysqli->query("SELECT a.*,b.id_survey_lap,b.id_laporan,b.laporan,b.tgl_mulai,b.tgl_selesai,b.status,c.no_petugas_survey, c.nama AS nama_petugas, d.id_mohon,d.no_registrasi AS noreg_pb, e.id_mohon,e.no_registrasi AS noreg_pd, f.id_mohon,f.no_registrasi AS noreg_ps FROM tb_survey_lap_masuk a JOIN tb_laporan_survey b ON a.id_survey_lap = b.id_survey_lap JOIN tb_petugas_survey c ON c.no_petugas_survey = a.id_petugas LEFT JOIN tb_mohon_pb d ON a.id_mohon_survey = d.id_mohon LEFT JOIN tb_mohon_pd e ON a.id_mohon_survey = e.id_mohon LEFT JOIN tb_mohon_multiguna f ON a.id_mohon_survey = f.id_mohon WHERE a.pegawai_acc = '1' AND b.status = '3' AND id_laporan = '$id'");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();

            echo '
            <div class="form-group">
                <label for="">Laporan Petugas</label>
                <textarea class="form-control" cols="10" rows="3" readonly>' . $row_view['laporan'] . '</textarea>
            </div>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
