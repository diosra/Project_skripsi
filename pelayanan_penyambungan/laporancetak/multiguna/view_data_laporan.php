<?php
//memasukkan koneksi database
require_once("../../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    // $view = $mysqli->query("SELECT a.*, b.* FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon WHERE id_pasang_baru = $id");
    $view = $mysqli->query("SELECT a.*, b.*,c.id_yanbung, c.tgl_selesai, d.* FROM tb_multiguna a JOIN tb_mohon_multiguna b ON a.id_mohon = b.id_mohon JOIN tb_laporan_tekyan c ON c.id_yanbung = a.id_mlta JOIN tb_pelanggan d ON d.idpel = b.id_pelanggan WHERE a.id_mlta = '$id' AND a.status_teknisi = '3'");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();
            echo '
            <div class="form-group">
                <label for="">Tanggal Pengerjaan</label>
                <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_selesai'])) . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Daya yang diperlukan</label>
                <input type="text" value="' . $row_view['daya'] . ' VA" class="form-control" readonly>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Tanggal Mulai Pemakaian</label>
                        <input type="text" value="' . date('d-M-Y', strtotime($row_view['tgl_mulai_pemakaian'])) . '" class="form-control" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Tanggal Selesai Pemakaian</label>
                        <input type="text" value="' . date('d-M-Y', strtotime($row_view['tgl_selesai_pemakaian'])) . '" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Total Lama Hari</label>
                <input type="text" value="' . $row_view['lamahari'] . ' Hari" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Pemakaian</label>
                <input type="text" value="' . $row_view['pemakaian'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Total Biaya</label>
                <input type="text" value="Rp.' . number_format($row_view['total'], 0, ',', '.') . '" class="form-control" readonly>
            </div>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
