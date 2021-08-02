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
    $view = $mysqli->query("SELECT a.*, b.* FROM tb_pasang_baru a JOIN tb_mohon_pb b ON a.id_mohon = b.id_mohon WHERE id_pasang_baru = $id");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();

            $no = 1;
            $fasa = $row_view['fasa_baru'];

            if ($fasa == "1 Fasa") {
                $pekerjaan = "PB 1 Fasa";
                $harga = mysqli_query($mysqli, "SELECT HARGA_SATUAN FROM tb_harga WHERE KODE = 'PB 1 FASA' ORDER BY id_harga ASC");
                $hargaB = "";
                $hargaB2 = "";
                $n = 0;
                while ($hargaambil = $harga->fetch_array()) {
                    $hargaB = $hargaB . "<td class='align-middle'>Rp." . number_format($hargaambil[0], 0, ',', '.') . "</td>";
                    $n = $n + $hargaambil[0];
                }

                $hargaB2 = $hargaB2 .
                    "<td class='align-middle'>Rp." . number_format($n, 0, ',', '.') . "</td>";


                $querytb_harga = mysqli_query($mysqli, "SELECT HARGA_SATUAN, URAIAN FROM tb_harga WHERE KODE = 'PB 1 FASA' ORDER BY id_harga ASC");
                $querynama = "";
                $querycolumn = "";
                $querycolumnharga = "";
                $querycolumnharga2 = "";
                $no = 1;
                $coldata = mysqli_num_rows($querytb_harga);
                $querycolumn = $querycolumn . "<th scope='col' class='text-center'>Detail Biaya</th>";
                $querycolumnharga = $querycolumnharga . "<td  class='align-middle text-center'>Total Biaya</td>";
                $querycolumnharga2 = $querycolumnharga2 . "<th scope='col' class='text-center'>Harga Per satuan</th>";
                while ($uraianambil = $querytb_harga->fetch_array()) {
                    $querynama = $querynama . "
                    <td class='text-center'>Detail " . $no++ . " <i class='fas fa-info-circle' tabindex='0' data-container='body' data-toggle='popover' data-trigger='focus' data-placement='top' data-content='" . $uraianambil[1] . "'></i>
                    </td>
                    <td class='align-middle'>Rp." . number_format($uraianambil[0], 0, ',', '.') . "</td>       
                    </tr>
                    ";
                }
                echo '
            <div class="form-group">
                <label for="">Pekerjaan RAB</label>
                <input type="text" value="' . $pekerjaan . '" class="form-control" readonly>
            </div>
            
            <hr>

            <h5>Detail Pekerjaan RAB</h5>

            <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
            
            <thead>
                <th scope="col" class="text-center">Detail Uraian</th>
                <th scope="col" class="text-center">Harga</th>
            </thead>
            <tbody>
            <tr>
                ' . $querynama . ' 
            </tr>
                        <tr>
                        ' . $querycolumnharga . '
                        ' . $hargaB2 . '
                        </tr>
                    </tbody>
            </table>
		';
            } else {
                $pekerjaan = "PB 3 Fasa";
                $harga = mysqli_query($mysqli, "SELECT HARGA_SATUAN FROM tb_harga WHERE KODE = 'PB 3 FASA' ORDER BY id_harga ASC");
                $hargaB = "";
                $hargaB2 = "";
                $n = 0;
                while ($hargaambil = $harga->fetch_array()) {
                    $hargaB = $hargaB . "<tr><td class='align-middle'>Rp." . number_format($hargaambil[0], 0, ',', '.') . "</td></tr>";
                    $hargaa = $hargaambil[0];
                    $n = $n + $hargaambil[0];
                }

                $hargaB2 = $hargaB2 .
                    "<td class='align-middle'>Rp." . number_format($n, 0, ',', '.') . "</td>";
                $coldata2 = mysqli_num_rows($harga);


                $querytb_harga = mysqli_query($mysqli, "SELECT HARGA_SATUAN, URAIAN FROM tb_harga WHERE KODE = 'PB 3 FASA' ORDER BY id_harga ASC");
                $querynama = "";
                $querycolumn = "";
                $querycolumnharga = "";
                $querycolumnharga2 = "";
                $no = 1;
                $coldata = mysqli_num_rows($querytb_harga);
                $querycolumn = $querycolumn . "<th scope='col' class='text-center'>Detail Biaya</th>";
                $querycolumnharga = $querycolumnharga . "<td  class='align-middle text-center'>Total Biaya</td>";
                $querycolumnharga2 = $querycolumnharga2 . "<th scope='col' class='text-center'>Harga Per satuan</th>";
                while ($uraianambil = $querytb_harga->fetch_array()) {
                    $querynama = $querynama . "
                    <td class='text-center'>Detail " . $no++ . " <i class='fas fa-info-circle' tabindex='0' data-container='body' data-toggle='popover' data-trigger='focus' data-placement='top' data-content='" . $uraianambil[1] . "'></i>
                    </td>
                    <td class='align-middle'>Rp." . number_format($uraianambil[0], 0, ',', '.') . "</td>       
                    </tr>
                    ";
                }

                echo '
            <div class="form-group">
                <label for="">Pekerjaan RAB</label>
                <input type="text" value="' . $pekerjaan . '" class="form-control" readonly>
            </div>

            <hr>

            <h5>Detail Pekerjaan RAB</h5>

            <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
            
            <thead>
                <th scope="col" class="text-center">Detail Uraian</th>
                <th scope="col" class="text-center">Harga</th>
            </thead>
            <tbody>
            <tr>
                ' . $querynama . ' 
            </tr>
                        <tr>
                        ' . $querycolumnharga . '
                        ' . $hargaB2 . '
                        </tr>
                    </tbody>
            </table>
		';
            }
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
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