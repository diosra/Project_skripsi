<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perubahan Daya</title>

    <?php
    $pageSkr = 'pd';
    include_once '../header.php';

    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_registrasi) as RegTerbesar FROM tb_mohon_pd");
    $dataambil = mysqli_fetch_array($queryambil);
    $noRegistrasi = @$dataambil['RegTerbesar'];

    $urutan = (int) substr($noRegistrasi, 7, 5);
    $urutan++;

    $huruf = "NRG-PD-";
    $noRegistrasi = $huruf . sprintf("%05s", $urutan);
    ?>


    <script type="text/javascript">
        function prola() {
            var tipe = document.getElementById('produk').value;
            if (tipe == "PRABAYAR") {
                document.getElementById('token').style.display = 'block';
                document.getElementById("token_a").required = true;
            } else if (tipe == "PASCABAYAR") {
                document.getElementById('token').style.display = 'none';
                document.getElementById("token_a").required = false;
                document.getElementById('token').removeAttribute("selected");
            }
        }
    </script>

    <script src="process.js"></script> <!-- Load file process.js -->
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Permohonan Perubahan Daya</u></h1>
    </div>

    <!-- Card untuk Form -->

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <label for="">Cari ID Pelanggan</label>
                    <input type="text" id="idpel" name="idpel" class="form-control">
                    <button type="button" id="btn-search" class="btn btn-primary mt-2">Cari</button>
                    <!-- <a href="menu_pd.php" class="btn btn-warning mt-2">Reset</a> -->
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <!-- Form Utama -->
        <div class="card-body">
            <form action="menu_pd.php" method="post" name="form1">

                <h3 class="mb-4"><u>Data Pemohon</u></h3>

                <!-- <input type="hidden" name="no_registrasi" value="<?php echo $noRegistrasi ?>" class="form-control" disabled readonly> -->

                <input type="hidden" name="idplg" id="idpelanggan" value="" class="form-control" required readonly>
                <input type="hidden" name="fasalama" id="fasalama" value="" class="form-control" required readonly>

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

                <div class="form-group row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tarif Lama</label>
                            <input type="text" name="tarif_lama" id="tarif" class="form-control" value="" required readonly="readonly">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Daya Lama</label>
                            <input type="text" name="daya_lama" id="daya" class="form-control" value="" required readonly="readonly">
                        </div>
                    </div>
                </div>

                <hr class="font-weight-bolder my-4">

                <h3 class="mb-4"><u>Daya Baru</u></h3>

                <div class="form-group">
                    <label for="">Produk Layanan</label>
                    <select name="produk_layanan" id="produk" class="form-control" onchange="prola()" required>
                        <option disabled selected>Pilih</option>
                        <option value="PASCABAYAR">PASCABAYAR</option>
                        <option value="PRABAYAR">PRABAYAR</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Peruntukan</label>
                    <select name="peruntukan" class="form-control" required>
                        <option disabled selected>Pilih</option>
                        <!-- <option>Bisnis</option>
                        <option>Industri</option> -->
                        <option>Rumah Tangga</option>
                    </select>
                </div>

                <div class="form-group" id="token" style="display: none;">
                    <label for="">Token Perdana</label>
                    <select name="token" id="token_a" class="form-control">
                        <option disabled selected>Pilih</option>
                        <option>5000</option>
                        <option>20000</option>
                        <option>40000</option>
                        <option>50000</option>
                        <option>100000</option>
                        <option>200000</option>
                        <option>500000</option>
                        <option>1000000</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Daya</label>
                    <select name="daya_baru" class="form-control" required>
                        <option disabled selected>Pilih</option>
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

<script type="text/javascript">
    function changeValueNama(x) {
        document.getElementById('nama').value = prdName[x].nama;
    }
</script>

<!-- PHP - Query Tombol Save dan SweetAlert -->
<?php
if (isset($_POST['save'])) {
    $idplg = $_POST['idplg'];
    $dayalama = $_POST['daya_lama'];
    $tariflama = $_POST['tarif_lama'];
    $produk_layanan = $_POST['produk_layanan'];
    $daya = $_POST['daya_baru'];
    $peruntukan = $_POST['peruntukan'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $fasalama = $_POST['fasalama'];

    if ($daya <= $dayalama) {
        $hargaMaterai = 0;
        $hargaPenyambungan = 0;

        if ($daya <= "900") {
            $hargaUJL = $daya * 72;
        } elseif ($daya == "1300") {
            $hargaUJL = $daya * 133;
        } elseif ($daya == "2200") {
            $hargaUJL = $daya * 141;
        } elseif ($daya == "3500" || $daya <= "5500") {
            $hargaUJL = $daya * 157;
        } elseif ($daya >= "6600") {
            $hargaUJL = $daya * 140;
        }

        if ($produk_layanan == "PASCABAYAR") {
            $totalBiaya = (($daya - $dayalama) * 0) + $hargaUJL + $hargaMaterai;
        } elseif ($produk_layanan == "PRABAYAR") {
            $hargaToken = $_POST['token'];
            $totalBiaya = (($daya - $dayalama) * 0) + $hargaToken + $hargaMaterai;
        }
    } elseif ($daya >= $dayalama) {
        if ($dayalama <= "1300" && $daya == "2200") {
            $hargaMaterai = 0;
            $hargaPenyambungan = 937;

            if ($produk_layanan == "PASCABAYAR") {
                $hargaUJL = $daya * 141;
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
            } elseif ($produk_layanan == "PRABAYAR") {
                $hargaToken = $_POST['token'];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
            }
        } elseif ($dayalama <= "2200" && $daya >= "3500") {
            $hargaPenyambungan = 969;

            if ($daya >= "6600") {
                $hargaMaterai = 10000;
            } else {
                $hargaMaterai = 0;
            }

            if ($daya <= "900") {
                $hargaUJL = $daya * 72;
            } elseif ($daya == "1300") {
                $hargaUJL = $daya * 133;
            } elseif ($daya == "2200") {
                $hargaUJL = $daya * 141;
            } elseif ($daya == "3500" || $daya <= "5500") {
                $hargaUJL = $daya * 157;
            } elseif ($daya >= "6600") {
                $hargaUJL = $daya * 140;
            }

            if ($produk_layanan == "PASCABAYAR") {
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
            } elseif ($produk_layanan == "PRABAYAR") {
                $hargaToken = $_POST['token'];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
            }
        } elseif ($dayalama >= "2200" && $daya >= "2200") {
            $hargaPenyambungan = 969;

            if ($daya >= "6600") {
                $hargaMaterai = 10000;
            } else {
                $hargaMaterai = 0;
            }

            if ($daya <= "900") {
                $hargaUJL = $daya * 72;
            } elseif ($daya == "1300") {
                $hargaUJL = $daya * 133;
            } elseif ($daya == "2200") {
                $hargaUJL = $daya * 141;
            } elseif ($daya == "3500" || $daya <= "5500") {
                $hargaUJL = $daya * 157;
            } elseif ($daya >= "6600") {
                $hargaUJL = $daya * 140;
            }

            if ($produk_layanan == "PASCABAYAR") {
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaUJL + $hargaMaterai;
            } elseif ($produk_layanan == "PRABAYAR") {
                $hargaToken = $_POST['token'];
                $totalBiaya = (($daya - $dayalama) * $hargaPenyambungan) + $hargaToken + $hargaMaterai;
            }
        }
    }

    // Penentuan Tarif Berdasarkan Daya
    if ($daya <= "2200") {
        $tarif = "R-1";
    } elseif ($daya == "3500" || $daya <= "5500") {
        $tarif = "R-2";
    } elseif ($daya >= "6600") {
        $tarif = "R-3";
    }

    if ($produk_layanan == "PASCABAYAR") {
        $insert = "INSERT INTO tb_mohon_pd (no_registrasi,id_pelanggan, daya_lama,tarif_lama, produk_layanan, daya_baru,tarif_baru,total,peruntukan,tgl_masuk) 
        VALUES 
        ('$noRegistrasi','$idplg', '$dayalama','$tariflama','$produk_layanan','$daya','$tarif','$totalBiaya', '$peruntukan', '$tgl_masuk')";
    } elseif ($produk_layanan == "PRABAYAR") {
        $token = $_POST['token'];
        $t = "T";

        $insert = "INSERT INTO tb_mohon_pd (no_registrasi,id_pelanggan, daya_lama,tarif_lama, produk_layanan, daya_baru,tarif_baru,total,token,peruntukan,tgl_masuk) 
        VALUES 
        ('$noRegistrasi','$idplg', '$dayalama','$tariflama','$produk_layanan','$daya','$tarif$t','$totalBiaya','$token', '$peruntukan', '$tgl_masuk')";
    }
    $query = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));;
    // var_dump($insert);

    if ($query) {
        if ($daya <= "5500") {
            $fasa = "1 Fasa";
        } elseif ($daya >= "6600") {
            $fasa = "3 Fasa";
        }

        if ($fasalama == "1 Fasa" && $fasa == "3 Fasa") {
            $pekerjaanRAB = "PD 1 Fasa ke 3 Fasa";
        } elseif ($fasalama == "3 Fasa" && $fasa == "1 Fasa") {
            $pekerjaanRAB = "PD 3 Fasa ke 1 Fasa";
        } elseif ($fasalama == "1 Fasa" && $fasa == "1 Fasa") {
            $pekerjaanRAB = "PD 1 Fasa";
        } elseif ($fasalama == "3 Fasa" && $fasa == "3 Fasa") {
            $pekerjaanRAB = "PD 3 Fasa";
        }

        if ($produk_layanan == "PASCABAYAR") {
            if ($daya <= "5500") {
                $insert2 = "INSERT INTO tb_perubahan_daya (id_mohon,jenis_transaksi,daya_lama,tarif_lama,daya_baru,tarif_baru,fasa_lama,fasa_baru,pekerjaan_rab) VALUES ('" . mysqli_insert_id($mysqli) . "','Perubahan Daya','$dayalama','$tariflama','$daya','$tarif','$fasalama','$fasa','$pekerjaanRAB')";
            } elseif ($daya >= "6600") {
                $insert2 = "INSERT INTO tb_perubahan_daya (id_mohon,jenis_transaksi,daya_lama,tarif_lama,daya_baru,tarif_baru,fasa_lama,fasa_baru,pekerjaan_rab) VALUES ('" . mysqli_insert_id($mysqli) . "','Perubahan Daya','$dayalama','$tariflama','$daya','$tarif','$fasalama','$fasa','$pekerjaanRAB')";
            }
        } elseif ($produk_layanan == "PRABAYAR") {
            $t = "T";
            if ($daya <= "5500") {
                $insert2 = "INSERT INTO tb_perubahan_daya (id_mohon,jenis_transaksi,daya_lama,tarif_lama,daya_baru,tarif_baru,fasa_lama,fasa_baru,pekerjaan_rab) VALUES ('" . mysqli_insert_id($mysqli) . "','Perubahan Daya','$dayalama','$tariflama','$daya','$tarif$t','$fasalama','$fasa','$pekerjaanRAB')";
            } elseif ($daya >= "6600") {
                $insert2 = "INSERT INTO tb_perubahan_daya (id_mohon,jenis_transaksi,daya_lama,tarif_lama,daya_baru,tarif_baru,fasa_lama,fasa_baru,pekerjaan_rab) VALUES ('" . mysqli_insert_id($mysqli) . "','Perubahan Daya','$dayalama','$tariflama','$daya','$tarif$t','$fasalama','$fasa','$pekerjaanRAB')";
            }
        }
        $query2 = mysqli_query($mysqli, $insert2) or die(mysqli_error($mysqli));;
        // var_dump($insert2);
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Sukses Menambahkan Data Mohon Perubahan Daya!'
            }).then((result) => {
                // window.location = "menu_pd.php";
            })
        </script>
    <?php
    } else {

    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal Menambahkan Data Mohon Perubahan Daya!'
            }).then((result) => {
                // window.location = "menu_pd.php";
            })
        </script>
<?php
    }
}
?>


</html>