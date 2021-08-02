<?php
//memasukkan koneksi database
require_once("../../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];

    $view = $mysqli->query("SELECT
    a.*,
    b.id_mohon AS pb_mohon,
    c.id_mohon AS tbpb_mohon,
    b.no_registrasi AS jt_pb,
    b.tgl_masuk AS tgl_pb,
    d.id_mohon AS pd_mohon,
    e.id_mohon AS tbpd_mohon,
    d.no_registrasi AS jt_pd,
    d.tgl_masuk AS tgl_pd,
    f.id_mohon AS ps_mohon,
    g.id_mohon AS tbps_mohon,
    f.tgl_masuk AS tgl_ps,
    f.no_registrasi AS jt_ps,
    h.idpel,
    h.identitas,
    h.nama,
    h.alamat,
    i.*
FROM
    tb_laporan_survey a
JOIN tb_survey_lap_masuk i ON
    a.id_survey_lap = i.id_survey_lap
LEFT JOIN tb_mohon_pb b ON
    a.id_mohon_survey = b.id_mohon
LEFT JOIN tb_pasang_baru c ON
    b.id_mohon = c.id_mohon
LEFT JOIN tb_mohon_pd d ON
    a.id_mohon_survey = d.id_mohon
LEFT JOIN tb_perubahan_daya e ON
    d.id_mohon = e.id_mohon
LEFT JOIN tb_mohon_multiguna f ON
    a.id_mohon_survey = f.id_mohon
LEFT JOIN tb_multiguna g ON
    f.id_mohon = g.id_mohon
LEFT JOIN tb_pelanggan h ON
    h.idpel = b.id_pelanggan OR h.idpel = d.id_pelanggan OR h.idpel = f.id_pelanggan
WHERE
    a.status = '4' AND id_laporan = '$id'
ORDER BY
    a.tgl_selesai ASC");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();

            echo '
            <div class="form-group">
                <label for="">Alasan Penolakan</label>
                <textarea class="form-control" cols="10" rows="3" readonly>' . $row_view['alasan_penolakan'] . '</textarea>
            </div>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
