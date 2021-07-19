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
    $view = $mysqli->query("SELECT a.*, b.* FROM tb_perubahan_daya a JOIN tb_mohon_pd b ON a.id_mohon = b.id_mohon WHERE id_perubahan_daya = $id");
    //jika ada datanya
    if ($view) {
        if ($view->num_rows) {
            //fetch data ke dalam veriabel $row_view
            $row_view = $view->fetch_assoc();

            $no = 1;
            $fasa = $row_view['fasa_baru'];
            $fasalama = $row_view['fasa_lama'];

            if ($fasalama == "1 Fasa" && $fasa == "1 Fasa") {
                $pekerjaan = "PD 1 Fasa";
                $harga = mysqli_query($mysqli, "SELECT HARGA_SATUAN FROM tb_harga WHERE KODE = 'PD 1 FASA'");
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
                            <th class="text-center">Detail 3 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Penggantian MCB 1 Phasa"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                                <tr>
                                    ' . $hargaB . '
                                </tr>
                    </tbody>
                </table>
		';
            } elseif ($fasalama == "3 Fasa" && $fasa == "3 Fasa") {
                $pekerjaan = "PD 3 Fasa";
                $harga = mysqli_query($mysqli, "SELECT HARGA_SATUAN FROM tb_harga WHERE KODE = 'PD 3 FASA'");
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
                <input type="text" value="' . $pekerjaan . '" class="form-control" readonly>
            </div>

            <hr>

            <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">Detail 1 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Penggantian MCB / MCCB 3 Phasa"></i></th>
                            <th class="align-middle text-center">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                                <tr>
                                    ' . $hargaB . '
                                </tr>
                    </tbody>
                </table>
		';
            } elseif ($fasalama == "3 Fasa" && $fasa == "1 Fasa") {
                $pekerjaan = "PD 3 Fasa ke 1 Fasa";
                $harga = mysqli_query($mysqli, "SELECT HARGA_SATUAN FROM tb_harga WHERE KODE = 'PD 3 FASA KE 1 FASA'");
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
                            <th colspan="12" class="text-center">Detail Biaya</th>
                            <th rowspan="2" class="align-middle text-center">Total Biaya</th>
                        </tr>
                        <tr>
                            <th class="text-center">Detail 1 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="kWh Meter Prabayar Fase Tunggal"></i></th>
                            <th class="text-center">Detail 2 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="NFA2X;2X10mm2;0,6/1kV;OH"></i></th>
                            <th class="text-center">Detail 3 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Segel Plastik"></i></th>
                            <th class="text-center">Detail 4 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="CCO 1T1 (10/16 sqmm - 10/16 sqmm)"></i></th>
                            <th class="text-center">Detail 5 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="CCO 3T1 (16/35 sqmm - 10/16 sqmm)"></i></th>
                            <th class="text-center">Detail 6 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Isolasi Scotch / Rubber Tape 1 KV ( Dimension : 19 mm x 20,1 m x 0.177 mm )"></i></th>
                            <th class="text-center">Detail 7 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Service Wedge Clamp 1 Phasa (Dua Sampit) ; Type SWC 616 ; 6. 10, 16 sqmm"></i></th>
                            <th class="text-center">Detail 8 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Pasang Kwh Meter Satu Phase + Wiring"></i></th>
                            <th class="text-center">Detail 9 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Penarikan SR 1 Phase"></i></th>
                            <th class="text-center">Detail 10 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Pengepresan CCO / Connector 10-25 mm²"></i></th>
                            <th class="text-center">Detail 11 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Survey"></i></th>
                            <th class="text-center">Detail 12 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Bongkar Kwh Meter Tiga Phase Tanpa Wiring"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                                <tr>
                                    ' . $hargaB . '
                                </tr>
                    </tbody>
                </table>
		';
            } elseif ($fasalama == "1 Fasa" && $fasa == "3 Fasa") {
                $pekerjaan = "PD 1 Fasa ke 3 Fasa";
                $harga = mysqli_query($mysqli, "SELECT HARGA_SATUAN FROM tb_harga WHERE KODE = 'PD 1 FASA KE 3 FASA'");
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
                            <th colspan="13" class="text-center">Detail Biaya</th>
                            <th rowspan="2" class="align-middle text-center">Total Biaya</th>
                        </tr>
                        <tr>
                            <th class="text-center">Detail 1 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="kWh Meter 3 Phase Pengukuran langsung kelas 1"></i></th>
                            <th class="text-center">Detail 2 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Segel Plastik"></i></th>
                            <th class="text-center">Detail 3 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="NFA2X-T;3X35+1X35;0,6/1kV;OH"></i></th>
                            <th class="text-center">Detail 4 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="NFA2X;4X16mm2;0,6/1kV;OH"></i></th>
                            <th class="text-center">Detail 5 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Service Wedge Clamp 3 Phasa ; Type SWC 625 ; 6, 10, 16, 25 sqmm"></i></th>
                            <th class="text-center">Detail 6 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="CCO 3T3 (16/35 sqmm - 16/35 sqmm)"></i></th>
                            <th class="text-center">Detail 7 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="SKAT 3 ( 35 sqmm ) ; L1"></i></th>
                            <th class="text-center">Detail 8 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Isolasi Scotch / Rubber Tape 1 KV ( Dimension : 19 mm x 20,1 m x 0.177 mm )"></i></th>
                            <th class="text-center">Detail 9 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Pemas. Kwh Meter Tiga Phase Tanpa Wiring"></i></th>
                            <th class="text-center">Detail 10 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Penarikan SR 3 Phase"></i></th>
                            <th class="text-center">Detail 11 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Pengepresan CCO / Connector 30-70 mm²"></i></th>
                            <th class="text-center">Detail 12 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Penggantian MCB / MCCB 3 Phasa"></i></th>
                            <th class="text-center">Detail 13 <br> <i class="fas fa-info-circle" tabindex="0" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Bongkar Kwh Meter Satu Phase + Wiring"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                                <tr>
                                    ' . $hargaB . '
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