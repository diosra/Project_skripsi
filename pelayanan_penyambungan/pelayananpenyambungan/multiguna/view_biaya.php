<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

</head>


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

            $no = 1;
            $fasa = $row_view['fasa'];

            if ($fasa == "1 Fasa") {
                $pekerjaan = "Multiguna Pelanggan 1 Fasa";
                $harga = mysqli_query($mysqli, "SELECT HARGA_SATUAN FROM tb_harga WHERE KODE = 'MULTIGUNA PELANGGAN 1 FASA'");
                $hargaB = "";
                $n = 0;
                while ($hargaambil = $harga->fetch_array()) {
                    $hargaB = $hargaB . "<td class='align-middle'>Rp." . number_format($hargaambil[0], 0, ',', '.') . "</td>";
                    $n = $n + $hargaambil[0];
                }

                $hargaB = $hargaB .
                    "<td class='align-middle'>Rp." . number_format($n, 0, ',', '.') . "</td>";

                echo '
            <div class="form-group">
                <label for="">Pekerjaan RAB</label>
                <input type="text" value="' . $pekerjaan . '" class="form-control w-25" readonly>
            </div>
            
            <hr>

            <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th colspan="3" class="text-center">Detail Biaya</th>
                            <th rowspan="2" class="align-middle text-center">Total Biaya</th>
                        </tr>
                        <tr>
                            <th class="text-center">Detail 1 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="MCB"></i></th>
                            <th class="text-center">Detail 2 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Segel Plastik"></i></th>
                            <th class="text-center">Detail 3 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Multiguna Pelanggan"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                                <tr>
                                    ' . $hargaB . '
                                </tr>
                    </tbody>
                </table>
		';
            } elseif ($fasa == "3 Fasa") {
                $pekerjaan = "Multiguna Pelanggan 3 Fasa";
                $harga = mysqli_query($mysqli, "SELECT HARGA_SATUAN FROM tb_harga WHERE KODE = 'MULTIGUNA PELANGGAN 3 FASA'");
                $hargaB = "";
                $n = 0;
                while ($hargaambil = $harga->fetch_array()) {
                    $hargaB = $hargaB . "<td class='align-middle'>Rp." . number_format($hargaambil[0], 0, ',', '.') . "</td>";
                    $n = $n + $hargaambil[0];
                }

                $hargaB = $hargaB .
                    "<td class='align-middle'>Rp." . number_format($n, 0, ',', '.') . "</td>";

                echo '
            <div class="form-group">
                <label for="">Pekerjaan RAB</label>
                <input type="text" value="' . $pekerjaan . '" class="form-control w-25" readonly>
            </div>
            
            <hr>

            <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th colspan="8" class="text-center">Detail Biaya</th>
                            <th rowspan="2" class="align-middle text-center">Total Biaya</th>
                        </tr>
                        <tr>
                            <th class="text-center">Detail 1 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="MCB"></i></th>
                            <th class="text-center">Detail 2 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Segel Plastik"></i></th>
                            <th class="text-center">Detail 3 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="NFA2X-T;3X35+1X35;0,6/1kV;OH"></i></th>
                            <th class="text-center">Detail 4 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Material Adjustable Dead End Assembly (25 - 35 sqmm) : Non Steinles Steel Strip +Yorke"></i></th>
                            <th class="text-center">Detail 5 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="CCO 3T3 (16/35 sqmm - 16/35 sqmm)"></i></th>
                            <th class="text-center">Detail 6 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Isolasi Scotch / Rubber Tape 1 KV ( Dimension : 19 mm x 20,1 m x 0.177 mm )"></i></th>
                            <th class="text-center">Detail 7 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Penarikan SR 3 Phase"></i></th>
                            <th class="text-center">Detail 8 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Pasang Kotak APP Langsung + Pipa Perlengkapan"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                                <tr>
                                    ' . $hargaB . '
                                </tr>
                    </tbody>
                </table>
		';
            } else {
                echo
                "Error di " . $view . " " . $mysqli->error;
            }
        }
    }
}
?>

<!-- Script untuk Menampilkan Popover -->
<script>
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
</script>

</html>