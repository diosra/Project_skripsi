<?php
//memasukkan koneksi database
require_once("../../koneksi.php");

if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $mysqli->query("SELECT * FROM tb_mohon_multiguna WHERE id_mohon ='$id'");
    //jika ada datanya

    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();

            echo '
            <form method="POST" action="header.php?page=up_pem">
                <input type="hidden" name="id_mohon" id="" value="' . $row_view['id_mohon'] . '">
                    <label for="">Ubah Status</label> <br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="status[]" required>
                            <label class="form-check-label" for="defaultCheck1">
                                Sudah Dibayar
                            </label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Tanggal Pembayaran</label>
                            <input type="date" name="tgl" class="form-control" required>
                            </div>
                <button type="submit" class="btn btn-primary" name="saveps"><i class="fas fa-save"></i> Ubah</button>
            </form>
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}
