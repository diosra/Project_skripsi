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
    <script src="hitung.js"></script> <!-- Load file process.js -->
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
            <form action="../send.php" method="post" name="form1">

                <h3 class="mb-4"><u>Data Pemohon</u></h3>

                <!-- <input type="hidden" name="no_registrasi" value="<?php echo $noRegistrasi ?>" class="form-control" disabled readonly> -->

                <input type="hidden" name="idplg" id="idpelanggan" value="" class="form-control" required readonly>
                <input type="hidden" name="fasalama" id="fasalama" value="" class="form-control" required readonly>

                <div class="form-group">
                    <label for="">Identitas (No KTP)</label> <br>
                    <input type="text" name="identitas" class="form-control" value="" id="ktp" required readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" readonly="readonly" required>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="10" rows="3" required readonly="readonly"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required readonly="readonly">
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">No. HP</label>
                            <input type="number" name="nohp" id="nohp" class="form-control" value="" required readonly="readonly">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">No. Telp</label>
                            <input type="number" name="notelp" id="notelp" class="form-control" value="" required readonly="readonly">
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
                    <select name="daya_baru" id="daya_baru" class="form-control" required>
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

                <div class="form-group">
                    <label for="">Total Biaya</label>
                    <input type="text" id="biaya" name="biaya" class="form-control" readonly>
                    <a type="button" id="btn-hitung" class="btn btn-primary mt-2">Hitung</a>
                </div>

                <div class="form-group row float-right">
                    <div class="col">
                        <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>

                        <button type="submit" class="btn btn-primary tesboot" name="savepd"><i class="fas fa-save"></i> Simpan</button>
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


</html>