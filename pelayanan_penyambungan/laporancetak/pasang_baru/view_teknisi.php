<?php
//memasukkan koneksi database
require_once("../../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];

    $view = $mysqli->query("SELECT a.*,b.*,d.no_teknisi, d.nama AS nama_teknisi, e.id_pasang_baru,e.id_mohon, f.id_perubahan_daya,f.id_mohon, g.id_mlta, g.id_mohon, h.id_mohon,h.id_pelanggan, h.no_registrasi AS noreg_pb, i.id_mohon,i.id_pelanggan,i.no_registrasi AS noreg_pd, j.id_mohon,j.id_pelanggan,j.no_registrasi AS noreg_ps, k.*
FROM tb_tekyan_lap_masuk a JOIN tb_laporan_tekyan b ON a.id_tekyanlap = b.id_tekyanlap 
JOIN tb_teknisi_penyambungan d ON a.id_teknisi = d.no_teknisi 
LEFT JOIN tb_pasang_baru e ON e.id_pasang_baru = a.id_yanbung 
LEFT JOIN tb_perubahan_daya f ON f.id_perubahan_daya = a.id_yanbung
LEFT JOIN tb_multiguna g ON g.id_mlta = a.id_yanbung
LEFT JOIN tb_mohon_pb h ON h.id_mohon = e.id_mohon
LEFT JOIN tb_mohon_pd i ON i.id_mohon = f.id_mohon
LEFT JOIN tb_mohon_multiguna j ON j.id_mohon = g.id_mohon
LEFT JOIN tb_pelanggan k ON k.idpel = h.id_pelanggan OR k.idpel = i.id_pelanggan OR k.idpel = j.id_pelanggan 
WHERE a.pegawai_acc = '1' AND b.status = '3' AND id_laporan = '$id'");
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
