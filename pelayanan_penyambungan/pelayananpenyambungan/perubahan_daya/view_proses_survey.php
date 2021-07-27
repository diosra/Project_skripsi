<?php
//memasukkan koneksi database
require_once("../../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $mysqli->query("SELECT a.*, b.*, c.*, d.id_mohon, e.* FROM tb_perubahan_daya a JOIN tb_laporan_tekyan b ON a.id_perubahan_daya = b.id_yanbung JOIN tb_tekyan_lap_masuk c ON a.id_perubahan_daya = c.id_yanbung JOIN tb_mohon_pd d ON a.id_mohon = d.id_mohon JOIN tb_teknisi_penyambungan e ON c.id_teknisi = e.no_teknisi WHERE a.id_perubahan_daya ='$id'");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();
            //menampilkan data dengan table
            echo '
            <div class="form-group">
                <label for="">Nama Teknisi</label>
                <input type="text" value="' . $row_view['nama'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Tanggal Memulai</label>
                <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_mulai'])) . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Laporan Sementara</label>
                <textarea class="form-control" cols="10" rows="3" readonly>' . $row_view['laporan'] . '</textarea>
            </div>
            
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
