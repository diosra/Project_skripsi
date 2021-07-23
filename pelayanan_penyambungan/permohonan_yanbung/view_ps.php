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

?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>

                <!-- Custom fonts for this template-->
                <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
                <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

            </head>

            <body>

                <!-- Modal dialog untuk modal ubah status pembayaran -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST" action="header.php?page=up_pem">
                                    <input type="hidden" name="id_mohon" id="" value="<?php echo $id ?>">
                                    <label for="">Ubah Status</label> <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="status[]">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Sudah Dibayar
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="">Tanggal Pembayaran</label>
                                        <input type="date" name="tgl" class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="saveps"><i class="fas fa-save"></i> Ubah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </body>

            </html>

<?php
            $ambilstatus = $row_view['status_pembayaran'];
            $ambiltgl_pemb = $row_view['tgl_pembayaran'];

            if ($ambilstatus == 0) {
                $status = 'Belum Dibayar';
                $a = '';
                $b = '';
                $b .= "
                <td class='align-middle text-center'>
                    <button class='btn btn-danger rounded' data-toggle='modal' data-target='#exampleModalCenter'>
                        $status
                    </button>
                </td>
                ";
            } else {
                $status = "Sudah Dibayar";
                $tanggal = date('d-M-Y', strtotime($ambiltgl_pemb));
                $a = '';
                $b = '';
                $b .= "
                <td class='align-middle text-center'>
                    <button class='btn btn-success rounded'> 
                        $status
                    </button>
                </td>
                ";
                $a .= "
                <p class='mt-2'>Tanggal Pembayaran : $tanggal</p>
                ";
            }

            echo '
            <div class="form-group">
                <label for="">Peruntukan</label>
                <input type="text" value="' . $row_view['peruntukan'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Daya yang Dibutuhkan</label>
                <input type="text" value="' . $row_view['daya'] . '" class="form-control" readonly>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Tanggal Mulai</label>
                    <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_mulai_pemakaian'])) . '" class="form-control" readonly>
                </div>
                <div class="col">
                    <label for="">Tanggal Selesai</label>
                    <input type="text" value="' .
                date('d-M-Y', strtotime($row_view['tgl_selesai_pemakaian'])) . '" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="">Total Hari</label>
                <input type="text" value="' . $row_view['lamahari'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Pemakaian</label>
                <input type="text" value="' . $row_view['pemakaian'] . '" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Total Biaya</label>
                <input type="text" value="Rp.' . number_format($row_view['total'], 0, ',', '.') . '" class="form-control" readonly>
            </div>

            <hr class="my-3">
            
            Status Pembayaran : ' . $b . ' <br>
            ' . $a . '
		';
        }
    } else {
        echo
        "Error di " . $view . " " . $mysqli->error;
    }
}

?>