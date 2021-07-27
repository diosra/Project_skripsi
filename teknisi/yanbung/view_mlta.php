<?php
//memasukkan koneksi database
require_once("../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $mysqli->query("SELECT a.*, b.*, c.*, d.*, e.id_mohon_survey, e.tgl_selesai FROM tb_multiguna a JOIN tb_mohon_multiguna b ON a.id_mohon = b.id_mohon JOIN tb_tekyan_lap_masuk c ON a.id_mlta = c.id_yanbung JOIN tb_pelanggan d ON b.id_pelanggan = d.idpel JOIN tb_laporan_survey e ON e.id_mohon_survey = b.id_mohon WHERE a.id_mlta ='$id'");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();
            //menampilkan data dengan table
            echo '
            <div class="form-group">
                <label for="">Jenis Transaksi</label>
                <input type="text" value="' . $row_view['jenis_transaksi'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Tanggal Selesai Survey</label>
                <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_selesai'])) . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Peruntukan</label>
                <input type="text" value="' . $row_view['peruntukan'] . '" class="form-control" readonly>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Tanggal Mulai</label>
                        <input type="text" value="' . date('d-M-Y', strtotime($row_view['tgl_mulai_pemakaian'])) . '" class="form-control" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Tanggal Selesai</label>
                        <input type="text" value="' . date('d-M-Y', strtotime($row_view['tgl_selesai_pemakaian'])) . '" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Lama Hari</label>
                <input type="text" value="' . $row_view['lamahari'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Daya yang diperlukan</label>
                <input type="text" value="' . $row_view['daya'] . ' VA" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Pemakaian</label>
                <input type="text" value="' . $row_view['pemakaian'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Pekerjaan RAB</label>
                <input type="text" value="' . $row_view['pekerjaan_rab'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">No Handphone</label>
                <input type="text" value="' . $row_view['nohp'] . '" class="form-control" readonly>
            </div>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
