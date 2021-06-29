<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Pasang Baru</title>

    <script src="pelayanan_penyambungan/CRUD/process.js"></script> <!-- Load file process.js -->

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Form Tambah Data Pasang Baru</u></h1>
    </div>

    <!-- Card untuk Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data Pelanggan Pasang Baru</h6>
        </div>
        <!-- Form Utama -->
        <div class="card-body">
            <form action="header.php?page=sendcrud" method="post" name="form1">
                <div class="form-group">
                    <label for="">Cari No Registrasi</label>
                    <input type="text" id="no_registrasi" name="id_pelanggan" class="form-control" required>
                    <button type="button" id="btn-search" class="btn btn-primary mt-2">Cari</button>
                </div>

                <input type="text" id="no_reg" name="id_pelanggan" class="form-control" required hidden>

                <div class="form-group">
                    <label for="">Identitas (No. KTP)</label>
                    <input type="text" id="identitas" name="identitas" class="form-control" readonly="readonly" required>
                </div>

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" id="nama" class="form-control" required readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" cols="10" rows="3" required readonly="readonly"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Jenis Transaksi</label>
                    <input type="text" name="jenis_transaksi" class="form-control" value="Pasang Baru" disabled>
                </div>

                <div class="form-group">
                    <label for="">Tanggal Permohonan</label>
                    <input type="date" name="tgl_mohon" class="form-control" required>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label for="">Tarif Baru</label>
                        <input type="text" name="tarif_baru" class="form-control" value="" placeholder="Masukkan Tarif Baru Pelanggan" required>
                    </div>
                    <div class="col">
                        <label for="">Daya Baru</label>
                        <input type="text" name="daya_baru" class="form-control" value="" placeholder="Masukkan Daya Baru Pelanggan" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Fasa Baru</label>
                    <select name="fasa_baru" class="form-control" required>
                        <option value="" disabled selected>Pilih</option>
                        <option>1 FASA</option>
                        <option>3 FASA</option>
                    </select>
                </div>

                <hr class="my-3">
                <h3 class="mb-3"><u>Form Kirim Email</u></h3>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" id="email" name="email_penerima" class="form-control" required readonly="readonly">
                </div>

                <div class="form-group">
                    <label>Subjek</label>
                    <input type="text" name="subjek" placeholder="Isi Subjek Email" class="form-control" required />
                </div>

                <div class="form-group">
                    <label>Pesan</label>
                    <textarea name="pesan" required placeholder="Isi Pesan" rows="8" class="form-control"></textarea>
                </div>

                <div class="form-group row float-right">
                    <div class="col">
                        <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>

                        <button type="submit" class="btn btn-primary tesboot" name="savepb"><i class="fas fa-save"></i> Simpan</button>
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
include_once 'footer.php';
?>

</html>