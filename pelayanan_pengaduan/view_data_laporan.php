<?php
//memasukkan koneksi database
require_once("../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    // $view = $mysqli->query("SELECT a.*, b.* FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon WHERE id_pasang_baru = $id");
    $view = $mysqli->query("SELECT a.*, b.* FROM tb_pengaduan a JOIN tb_laporan_tekpen b ON a.id_pengaduan = b.id_pengaduan  WHERE a.id_pengaduan = '$id' AND a.status = 'Selesai'");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();
            echo '
            <div class="form-group">
                <label for="">Jenis Gangguan</label>
                <input type="text" value="' . $row_view['gangguan'] . '" class="form-control" readonly>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Tanggal Mulai Perbaikan</label>
                        <input type="text" value="' . date('d-M-Y', strtotime($row_view['tgl_mulai'])) . '" class="form-control" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Tanggal Selesai Perbaikan</label>
                        <input type="text" value="' . date('d-M-Y', strtotime($row_view['tgl_selesai'])) . '" class="form-control" readonly>
                    </div>
                </div>
            </div>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
