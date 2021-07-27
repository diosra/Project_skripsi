<?php
//memasukkan koneksi database
require_once("../../../koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $mysqli->query("SELECT a.*, b.* FROM tb_multiguna a JOIN tb_mohon_multiguna b ON a.id_mohon = b.id_mohon WHERE id_mlta = $id");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();

            echo '
            <div class="form-group">
                <label for="">No Registrasi</label>
                <input type="text" value="' . $row_view['no_registrasi'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">ID Pelanggan</label>
                <input type="text" value="' . $row_view['id_pelanggan'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Jenis Transaksi</label>
                <input type="text" value="' . $row_view['jenis_transaksi'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Daya yang dibutuhkan</label>
                <input type="text" value="' . $row_view['daya'] . ' VA" class="form-control" readonly>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Tanggal Mulai</label>
                    <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_mulai_pemakaian'])) . '" class="form-control" readonly>
                </div>
                <div class="col">
                    <label for="">Tanggal Selesai</label>
                    <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_selesai_pemakaian'])) . '" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="">Total Hari</label>
                <input type="text" value="' . $row_view['lamahari'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Pemakaian</label>
                <input type="text" value="' . $row_view['pemakaian'] . '" class="form-control" readonly>
            </div>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
