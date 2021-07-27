<?php
//memasukkan koneksi database
require_once("../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $mysqli->query("SELECT a.*, b.*, c.*, d.id_mohon_survey, d.tgl_selesai FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon JOIN tb_tekyan_lap_masuk c ON a.id_pasang_baru = c.id_yanbung JOIN tb_laporan_survey d ON d.id_mohon_survey = b.id_mohon  WHERE a.id_pasang_baru ='$id'");
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
            <div class="form-group">
                <label for="">Produk Layanan</label>
                <input type="text" value="' . $row_view['produk_layanan'] . '" class="form-control" readonly>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Daya</label>
                        <input type="text" value="' . $row_view['daya'] . ' VA" class="form-control" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Tarif</label>
                        <input type="text" value="' . $row_view['tarif'] . '" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Fasa</label>
                <input type="text" value="' . $row_view['fasa_baru'] . '" class="form-control" readonly>
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
