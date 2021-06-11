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
        $data = mysqli_query($mysqli, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = $id");
        $row = $data->fetch_assoc();
        $delete = "DELETE FROM tb_pelanggan WHERE id_pelanggan=$id";
        $query = mysqli_query($mysqli, $delete) or die(mysqli_error($mysqli));

        if ($query) { ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Data Pelanggan dengan No.Registrasi : <?php echo $row['no_registrasi'] ?> & Nama : <?php echo $row['nama'] ?> berhasil dihapus!'
                }).then((result) => {
                    window.location = "../../pelanggan/pelanggan.php";
                })
            </script>
    <?php
        }
    } ?>
</body>

</html>