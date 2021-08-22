<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Penyambungan Sementara</title>

    <?php
    $pageSkr = 'mg';
    include_once '../header.php';
    ?>

    <script src="process.js"></script> <!-- Load file process.js -->
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="hitung.js"></script> <!-- Load file process.js -->
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
            <form action="../send.php" method="post" name="form1">

                <h3 class="mb-4"><u>Data Pemohon</u></h3>

                <input type="hidden" value="<?php echo $noRegistrasi ?>" class="form-control" disabled readonly>

                <input type="hidden" name="idplg" id="idpelanggan" value="" class="form-control" required readonly>

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
                    <select name="daya" id="daya" class="form-control" required>
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
                    <select name="pemakaian" id="pemakaian" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>12 Jam/Hari</option>
                        <option>24 Jam/Hari</option>
                    </select>
                </div>

                <input type="hidden" name="tgl_masuk" value="<?php echo date("Y-m-d"); ?>">

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Total Biaya</label>
                            <input type="text" id="biaya" name="biaya" class="form-control" readonly>
                        </div>
                        <a type="button" id="btn-hitung" class="btn btn-primary mt-2">Hitung</a>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Total Lama Hari</label>
                            <input type="text" id="lama" name="lama" class="form-control" readonly>
                        </div>
                    </div>
                </div>


                <div class="form-group row float-right">
                    <div class="col">
                        <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>

                        <button type="submit" class="btn btn-primary tesboot" name="savemlta"><i class="fas fa-save"></i> Simpan</button>
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


</html>