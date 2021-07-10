<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pasang Baru</title>

    <?php
    $pageSkr = 'pb';
    include_once '../header.php';

    extract($_POST);
    $queryambil = mysqli_query($mysqli, "SELECT max(no_registrasi) as RegTerbesar FROM tb_mohon_pb");
    $dataambil = mysqli_fetch_array($queryambil);
    $noRegistrasi = @$dataambil['RegTerbesar'];

    $urutan = (int) substr($noRegistrasi, 3, 3);
    $urutan++;

    $huruf = "NRG";
    $noRegistrasi = $huruf . sprintf("%03s", $urutan);

    $queryambil2 = mysqli_query($mysqli, "SELECT max(id_pelanggan) as idPelangganmax FROM tb_mohon_pb");
    $dataambil2 = mysqli_fetch_array($queryambil2);
    $id_pelanggan = @$dataambil2['idPelangganmax'];

    $urutan2 = (int) substr($id_pelanggan, 3, 3);
    $urutan2++;

    $huruf2 = "PLG";
    $id_pelanggan = $huruf2 . sprintf("%03s", $urutan2);
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

    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>

    <script>
        function hanyaHuruf(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 32) {
                return false;
            }
            return true;
        }
    </script>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Permohonan Pasang Baru</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <!-- Form Utama -->
        <div class="card-body">
            <form action="menu_pb.php" method="post" name="form1" enctype="multipart/form-data">

                <h3 class="mb-4"><u>Data Pemohon</u></h3>

                <input type="hidden" name="no_registrasi" value="<?php echo $noRegistrasi ?>" class="form-control" disabled readonly>

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" onkeypress="return hanyaHuruf (event)" required>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" placeholder="Masukkan alamat pelanggan" class="form-control" cols="10" rows="3" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">No. HP</label>
                            <input type="text" name="nohp" class="form-control" placeholder="Masukkan No Handphone" onkeypress="return hanyaAngka (event)" maxlength="15" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">No. Telp</label>
                            <input type="text" name="notelp" placeholder="Masukkan No Telpon" class="form-control" onkeypress="return hanyaAngka (event)" maxlength="15">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                </div>

                <div class="form-group">
                    <label for="">Identitas (Nomor KTP)</label>
                    <input type="text" name="identitas" class="form-control" placeholder="Masukkan Nomor KTP" maxlength="16" onkeypress="return hanyaAngka (event)" required>
                </div>

                <hr class="font-weight-bolder my-4">

                <h3 class="mb-4"><u>Tarif/Daya Baru</u></h3>

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
                        <option>Bisnis</option>
                        <option>Industri</option>
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
                    <select name="daya" class="form-control" required>
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
                        <option>33000</option>
                    </select>
                </div>

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

<!-- PHP - Query Tombol Save dan SweetAlert -->
<?php
if (isset($_POST['save'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $identitas = $_POST['identitas'];
    $produk_layanan = $_POST['produk_layanan'];
    $daya = $_POST['daya'];
    $peruntukan = $_POST['peruntukan'];

    if ($produk_layanan == "PASCABAYAR") {
        if ($daya <= "2200") {
            $insert = "INSERT INTO tb_mohon_pb (no_registrasi,id_pelanggan, nama,alamat, nohp, notelp, email,identitas,produk_layanan,daya,tarif, peruntukan) VALUES ('$noRegistrasi', '$id_pelanggan', '$nama', '$alamat', '$nohp','$notelp', '$email','$identitas','$produk_layanan','$daya','R-1', '$peruntukan')";
            $query = mysqli_query($mysqli, $insert);
        } elseif ($daya >= "3500" || $daya <= "5500") {
            $insert = "INSERT INTO tb_mohon_pb (no_registrasi,id_pelanggan, nama,alamat, nohp, notelp, email,identitas,produk_layanan,daya,tarif, peruntukan) VALUES ('$noRegistrasi', '$id_pelanggan', '$nama', '$alamat', '$nohp','$notelp', '$email','$identitas','$produk_layanan','$daya','R-2', '$peruntukan')";
            $query = mysqli_query($mysqli, $insert);
        } elseif ($daya >= "6600") {
            $insert = "INSERT INTO tb_mohon_pb (no_registrasi,id_pelanggan, nama,alamat, nohp, notelp, email,identitas,produk_layanan,daya,tarif, peruntukan) VALUES ('$noRegistrasi', '$id_pelanggan', '$nama', '$alamat', '$nohp','$notelp', '$email','$identitas','$produk_layanan','$daya','R-3', '$peruntukan')";
            $query = mysqli_query($mysqli, $insert);
        }
    } elseif ($produk_layanan == "PRABAYAR") {
        $token = $_POST['token'];
        $insert = "INSERT INTO tb_mohon_pb (no_registrasi,id_pelanggan, nama,alamat, nohp, notelp, email,identitas,produk_layanan,daya,token, peruntukan) VALUES ('$noRegistrasi', '$id_pelanggan', '$nama', '$alamat', '$nohp','$notelp', '$email','$identitas','$produk_layanan','$daya','$token', '$peruntukan')";
        $query = mysqli_query($mysqli, $insert);
    }

    if ($query) {
        $insertpelanggan = "INSERT INTO tb_pelanggan (id_mohon,idpel, no_registrasi, identitas, nama, alamat, nohp, no_telp, email) VALUES ('" . mysqli_insert_id($mysqli) . "','$id_pelanggan','$noRegistrasi','$identitas', '$nama', '$alamat', '$nohp', '$notelp', '$email')";
        $querypelanggan = mysqli_query($mysqli, $insertpelanggan);
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Sukses Menambahkan Data Mohon Pasang Baru!'
            }).then((result) => {
                window.location = "menu_pb.php";
            })
        </script>
    <?php
    } else {


    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal Menambahkan Data Mohon Pasang Baru Karena Nomor Identitas sudah terdaftar!'
            }).then((result) => {
                window.location = "menu_pb.php";
            })
        </script>
<?php
    }
}
?>

</html>