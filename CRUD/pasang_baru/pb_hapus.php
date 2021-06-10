<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <?php include '../../koneksi.php'; ?>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php

    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        $fasabaru = $_GET['fasa_baru'];
        $delete = "DELETE FROM tb_pasang_baru WHERE id_pasang_baru=$id";
        $query = mysqli_query($mysqli, $delete) or die(mysqli_error($mysqli));

        if ($query && $fasabaru == "1 FASA") { ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Data Pelanggan Pasang Baru 1 Phasa berhasil dihapus!'
                }).then((result) => {
                    window.location = "../../pelayananpenyambungan/pasang_baru/pb1phasa.php";
                })
            </script>
        <?php
        } elseif ($query && $fasabaru == "3 FASA") { ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Data Pelanggan Pasang Baru 3 Phasa berhasil dihapus!'
                }).then((result) => {
                    window.location = "../../pelayananpenyambungan/pasang_baru/pb3phasa.php";
                })
            </script>
    <?php
        }
    } ?>
</body>

</html>