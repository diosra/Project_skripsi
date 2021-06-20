<!DOCTYPE html>
<html lang="en">
<?php
include '../../koneksi.php';
if (!isset($_SESSION['username'])) {
    echo "<script> alert('Silahkan login Terlebih dahulu');</script>";
    echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
} else {
?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
    </head>

    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php

        if (isset($_GET['hapus'])) {
            $id = $_GET['hapus'];
            $fasabaru = $_GET['fasa_baru'];
            $data = mysqli_query($mysqli, "SELECT a.no_registrasi, a.nama , b.* FROM tb_multiguna b JOIN tb_pelanggan a ON b.id_pelanggan = a.id_pelanggan WHERE id_mlta = $id");
            $row = $data->fetch_assoc();
            $delete = "DELETE FROM tb_multiguna WHERE id_mlta=$id";
            $query = mysqli_query($mysqli, $delete) or die(mysqli_error($mysqli));

            if ($query && $fasabaru == "1 FASA") { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses.',
                        text: 'Data Pelanggan Multiguna 1 Phasa dengan No.Registrasi : <?php echo $row['no_registrasi'] ?> & Nama : <?php echo $row['nama'] ?> berhasil dihapus!'
                    }).then((result) => {
                        window.location = "../../pelayananpenyambungan/multiguna/multiguna1phs.php";
                    })
                </script>
            <?php
            } elseif ($query && $fasabaru == "3 FASA") { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses.',
                        text: 'Data Pelanggan Multiguna 3 Phasa dengan No.Registrasi : <?php echo $row['no_registrasi'] ?> & Nama : <?php echo $row['nama'] ?> berhasil dihapus!'
                    }).then((result) => {
                        window.location = "../../pelayananpenyambungan/multiguna/multiguna3phs.php";
                    })
                </script>
        <?php
            }
        } ?>
    </body>

</html>

<?php } ?>