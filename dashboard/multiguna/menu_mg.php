<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Multiguna / Penyambungan Sementara</title>

    <?php
    $pageSkr = 'mg';
    include_once '../header.php';

    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_registrasi) as RegTerbesar FROM tb_mohon_multiguna");
    $dataambil = mysqli_fetch_array($queryambil);
    $noRegistrasi = @$dataambil['RegTerbesar'];

    $urutan = (int) substr($noRegistrasi, 7, 5);
    $urutan++;

    $huruf = "NRG-PS-";
    $noRegistrasi = $huruf . sprintf("%05s", $urutan);
    ?>

    <script src="process.js"></script> <!-- Load file process.js -->
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Permohonan Sambung Sementara</u></h1>
    </div>

    <!-- Card untuk Form -->

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <label for="">Cari ID Pelanggan</label>
                    <input type="text" id="id_pelanggan" name="id_pelanggan" class="form-control">
                    <button type="button" id="btn-search" class="btn btn-primary mt-2">Cari</button>
                    <!-- <a href="menu_mg.php" class="btn btn-warning mt-2">Reset</a> -->
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <!-- Form Utama -->
        <div class="card-body">
            <form action="menu_mg.php" method="post" name="form1">

                <h3 class="mb-4"><u>Data Pemohon</u></h3>

                <input type="hidden" value="<?php echo $noRegistrasi ?>" class="form-control" disabled readonly>

                <input type="hidden" name="idplg" id="idpelanggan" value="" class="form-control" required readonly>

                <div class="form-group">
                    <label for="">Identitas (No KTP)</label> <br>
                    <input type="text" class="form-control" value="" id="ktp" required readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" id="nama" class="form-control" readonly="readonly" required>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea class="form-control" id="alamat" cols="10" rows="3" required readonly="readonly"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="email" required readonly="readonly">
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">No. HP</label>
                            <input type="number" id="nohp" class="form-control" value="" required readonly="readonly">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">No. Telp</label>
                            <input type="number" id="notelp" class="form-control" value="" required readonly="readonly">
                        </div>
                    </div>
                </div>

                <hr class="font-weight-bolder my-4">

                <h3 class="mb-4"><u>Data Sambung Sementara</u></h3>

                <div class="form-group">
                    <label for="">Peruntukan</label>
                    <select name="peruntukan" class="form-control" required>
                        <option disabled selected>Pilih</option>
                        <!-- <option>Bisnis</option>
                        <option>Industri</option> -->
                        <option>Rumah Tangga</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Daya yang dibutuhkan</label>
                    <select name="daya" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>450</option>
                        <option>900</option>
                        <option>1300</option>
                        <option>2200</option>
                        <option>3500</option>
                        <option>4400</option>
                        <option>5500</option>
                        <option>6600</option>
                        <option>7700</option>
                        <option>10600</option>
                        <option>11000</option>
                        <option>13200</option>
                        <option>16500</option>
                        <option>23000</option>
                    </select>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label for="">Tanggal Mulai</label>
                        <input type="date" id="startDate" class="form-control" name="tgl_mulai" required>
                    </div>
                    <div class="col">
                        <label for="">Tanggal Selesai</label>
                        <input type="date" id="endDate" class="form-control" name="tgl_selesai" required>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="">Lama Hari</label>
                    <input type="text" name="lamahari" class="form-control" readonly="readonly">
                </div> -->

                <div class="form-group">
                    <label for="">Pemakaian</label>
                    <select name="pemakaian" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>12 Jam/Hari</option>
                        <option>24 Jam/Hari</option>
                    </select>
                </div>

                <input type="hidden" name="tgl_masuk" value="<?php echo date("Y-m-d"); ?>">

                <div class="form-group row float-right">
                    <div class="col">
                        <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>

                        <button type="submit" class="btn btn-primary tesboot" name="save"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Form Utama end -->
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include_once '../footer.php';
?>


<!-- Script Lama untuk Limit batas Date -->
<!-- <script>
    $(function() {

        $("#startDate").datepicker({
            changeYear: true,
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            format: 'dd/mm/yyyy',
            minDate: '1',
            maxDate: '+30D',
        });
    });

    $(function() {

        $("#endDate").datepicker({
            changeYear: true,
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            format: 'dd/mm/yyyy',
            minDate: '1',
            maxDate: '+30D',
        });
    });
</script> -->

<!-- <script>
    var today = new Date(new Date().getFullYear(), new Date().getMonth(),
        new Date().getDate());
    $('#startDate').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        format: 'dd/mm/yyyy',

        maxDate: function() {
            return $('#endDate').val();

        }
    });
    $('#endDate').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        format: 'dd/mm/yyyy',

        minDate: function() {
            return $('#startDate').val();
        }
    });

    function checkDate() {
        var start = $('#startDate').val();
        var end = $('#endDate').val();
        //convert strings to date for comparing
        var startDate = createDate(start);
        var endDate = createDate(end);
        // Calculate the day diffrence
        var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
        var diffDays = Math.abs((endDate.getTime() - startDate.getTime()) / (oneDay));
        if (diffDays > 31) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Lama Tanggal tidak boleh lebih dari 30 hari!'
            }).then((result) => {
                $('#endDate').val('').datepicker('');
            })
        } else {
            $('#startDate').val();
            $('#endDate').val();
        }
    }

    function createDate(datestr) {
        var datearr = datestr.split("/");
        var d = new Date(datearr[2], Number(datearr[1]) - 1, datearr[0])
        return d;
    }

    function createDate2(datestr2) {
        var datearr = datestr2.split("/");
        var c = new Date(datearr[2], Number(datearr[1]) - 1, datearr[0])
        var e = c.join("/");
        console.log(e);
        return e;
    }
</script> -->

<!-- PHP - Query Tombol Save dan SweetAlert -->
<?php
if (isset($_POST['save'])) {
    $idplg = $_POST['idplg'];
    $daya = $_POST['daya'];
    $tglmulai = $_POST['tgl_mulai'];
    $tglselesai = $_POST['tgl_selesai'];
    $pemakaian = $_POST['pemakaian'];
    $peruntukan = $_POST['peruntukan'];
    $tgl_masuk = $_POST['tgl_masuk'];

    $tgl_awal = date_create($tglmulai);
    $tgl_akhir = date_create($tglselesai);
    $diff = date_diff($tgl_awal, $tgl_akhir);
    $ambilLamaHari = $diff->d;

    $biayaKWH = 1650;
    if ($daya >= "7700") {
        $PPN = 10;
        $persenPPN = $PPN / 100;
    } else {
        $PPN = 0;
        $persenPPN = $PPN / 100;
    }

    $arr12 = [
        //450 per 1 hari dan 12 jam
        "5",
        //900
        "11",
        //1300
        "16",
        //2200
        "26",
        //3500
        "42",
        //4400
        "53",
        //5500
        "66",
        //6600
        "79",
        //7700
        "92",
        //10600
        "127",
        //11000
        "132",
        //13200
        "158",
        //16500
        "198",
        //23000
        "276"
    ];

    $arr24 = [
        //450 per 1 hari dan 24 jam
        "11",
        //900
        "22",
        //1300
        "31",
        //2200
        "53",
        //3500
        "84",
        //4400
        "106",
        //5500
        "132",
        //6600
        "158",
        //7700
        "185",
        //10600
        "254",
        //11000
        "264",
        //13200
        "317",
        //16500
        "396",
        //23000
        "552"
    ];

    if ($pemakaian == "12 Jam/Hari") {
        if ($daya == "450") {
            $eDib = $arr12[0];
        } elseif ($daya == "900") {
            $eDib = $arr12[1];
        } elseif ($daya == "1300") {
            $eDib = $arr12[2];
        } elseif ($daya == "2200") {
            $eDib = $arr12[3];
        } elseif ($daya == "3500") {
            $eDib = $arr12[4];
        } elseif ($daya == "4400") {
            $eDib = $arr12[5];
        } elseif ($daya == "5500") {
            $eDib = $arr12[6];
        } elseif ($daya == "6600") {
            $eDib = $arr12[7];
        } elseif ($daya == "7700") {
            $eDib = $arr12[8];
        } elseif ($daya == "10600") {
            $eDib = $arr12[9];
        } elseif ($daya == "11000") {
            $eDib = $arr12[10];
        } elseif ($daya == "13200") {
            $eDib = $arr12[11];
        } elseif ($daya == "16500") {
            $eDib = $arr12[12];
        } elseif ($daya == "23000") {
            $eDib = $arr12[13];
        }
    } else {
        if ($daya == "450") {
            $eDib = $arr24[0];
        } elseif ($daya == "900") {
            $eDib = $arr24[1];
        } elseif ($daya == "1300") {
            $eDib = $arr24[2];
        } elseif ($daya == "2200") {
            $eDib = $arr24[3];
        } elseif ($daya == "3500") {
            $eDib = $arr24[4];
        } elseif ($daya == "4400") {
            $eDib = $arr24[5];
        } elseif ($daya == "5500") {
            $eDib = $arr24[6];
        } elseif ($daya == "6600") {
            $eDib = $arr24[7];
        } elseif ($daya == "7700") {
            $eDib = $arr24[8];
        } elseif ($daya == "10600") {
            $eDib = $arr24[9];
        } elseif ($daya == "11000") {
            $eDib = $arr24[10];
        } elseif ($daya == "13200") {
            $eDib = $arr24[11];
        } elseif ($daya == "16500") {
            $eDib = $arr24[12];
        } elseif ($daya == "23000") {
            $eDib = $arr24[13];
        }
    }

    if ($ambilLamaHari == "1") {
        $eDibA = $eDib * $ambilLamaHari;

        if ($eDibA <= "80") {
            $emin = 80;
        } else {
            $emin = $eDib * $ambilLamaHari;
        }

        $PPJ = 8;
        $persenPPJ = $PPJ / 100;
        $biayaMaterai = 0;

        $total1 = $emin * $biayaKWH;
        $total2 = $persenPPJ * $total1;
        $total3 = $persenPPN * $total1;
        $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    } elseif ($ambilLamaHari == "2" || $ambilLamaHari == "3") {
        $eDibA = $eDib * $ambilLamaHari;

        if ($eDibA <= "150") {
            $emin = 150;
        } else {
            $emin = $eDib * $ambilLamaHari;
        }

        $PPJ = 8;
        $persenPPJ = $PPJ / 100;
        $biayaMaterai = 0;

        $total1 = $emin * $biayaKWH;
        $total2 = $persenPPJ * $total1;
        $total3 = $persenPPN * $total1;
        $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    } elseif ($ambilLamaHari == "4" || $ambilLamaHari <= "7") {
        $eDibA = $eDib * $ambilLamaHari;

        if ($eDibA <= "300") {
            $emin = 300;
        } else {
            $emin = $eDib * $ambilLamaHari;
        }

        $PPJ = 8;
        $persenPPJ = $PPJ / 100;
        if (($ambilLamaHari == "5" || $ambilLamaHari <= "30") && $daya >= "23000") {
            $biayaMaterai = 10000;
        } else {
            $biayaMaterai = 0;
        }

        $total1 = $emin * $biayaKWH;
        $total2 = $persenPPJ * $total1;
        $total3 = $persenPPN * $total1;
        $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    } elseif ($ambilLamaHari == "8" || $ambilLamaHari <= "30") {
        $eDibA = $eDib * $ambilLamaHari;

        if ($eDibA <= "500") {
            $emin = 500;
        } else {
            $emin = $eDib * $ambilLamaHari;
        }
        $PPJ = 8;
        $persenPPJ = $PPJ / 100;

        if ($ambilLamaHari == "5" && $daya >= "23000") {
            $biayaMaterai = 10000;
        } else {
            $biayaMaterai = 0;
        }

        $total1 = $emin * $biayaKWH;
        $total2 = $persenPPJ * $total1;
        $total3 = $persenPPN * $total1;
        $totalBiaya = $total1 + $total2 + $total3 + $biayaMaterai;
    } elseif ($ambilLamaHari >= "31") {
?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal Menambahkan Data, Lama Hari tidak boleh melebihi 30 hari!'
            }).then((result) => {
                window.location = "menu_mg.php";
            })
        </script>
    <?php
    }

    $insert = "INSERT INTO tb_mohon_multiguna (no_registrasi,id_pelanggan, daya, tgl_mulai, tgl_selesai, pemakaian,lamahari,total,peruntukan,tgl_masuk) VALUES ('$noRegistrasi','$idplg', '$daya', '$tglmulai', '$tglselesai', '$pemakaian','$ambilLamaHari Hari', '$totalBiaya', '$peruntukan','$tgl_masuk')";
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
    // var_dump($insert);

    if ($query) {
        if ($daya <= "5500" || $daya == "7700") {
            $fasa = "1 Fasa";
        } elseif ($daya == "6600" || $daya >= "10600") {
            $fasa = "3 Fasa";
        }

        if ($fasa == "1 Fasa") {
            $pekerjaanRAB = "Multiguna Pelanggan 1 Fasa";
        } else {
            $pekerjaanRAB = "Multiguna Pelanggan 3 Fasa";
        }

        $insert2 = "INSERT INTO tb_multiguna (id_mohon,jenis_transaksi, daya, fasa, pekerjaan_rab) VALUES ('" . mysqli_insert_id($mysqli) . "','Sambung Sementara', '$daya', '$fasa', '$pekerjaanRAB')";
        $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));
        // var_dump($insert2);
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Sukses Menambahkan Data Mohon Multiguna / Penyambungan Sementara!'
            }).then((result) => {
                window.location = "menu_mg.php";
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal Menambahkan Data Mohon Multiguna / Penyambungan Sementara!'
            }).then((result) => {
                window.location = "menu_mg.php";
            })
        </script>
<?php
    }
}

?>


</html>