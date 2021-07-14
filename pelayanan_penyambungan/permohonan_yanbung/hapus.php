<!DOCTYPE html>
<html lang="en">

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

    if (isset($_GET['hapuspb'])) {
        $id = $_GET['hapuspb'];
        $data = mysqli_query($mysqli, "SELECT * FROM tb_mohon_pb WHERE id_mohon = $id");
        $row = $data->fetch_assoc();
        $delete = "DELETE FROM tb_mohon_pb WHERE id_mohon =$id";
        $query = mysqli_query($mysqli, $delete) or die(mysqli_error($mysqli));

        if ($query) { ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Data Permohonan Pasang Baru dengan No.Registrasi : <?php echo $row['no_registrasi'] ?> & Nama : <?php echo $row['nama'] ?> berhasil dihapus!'
                }).then((result) => {
                    window.location = "header.php?page=mohonyanbungpb";
                })
            </script>
        <?php
        }
    } elseif (isset($_GET['hapuspd'])) {
        $id = $_GET['hapuspd'];
        $data = mysqli_query($mysqli, "SELECT a.*,b.* FROM tb_mohon_pd a JOIN tb_pelanggan b ON a.id_pelanggan = b.idpel WHERE a.id_mohon = $id");
        $row = $data->fetch_assoc();
        $delete = "DELETE FROM tb_mohon_pd WHERE id_mohon =$id";
        $query = mysqli_query($mysqli, $delete) or die(mysqli_error($mysqli));

        if ($query) { ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Data Permohonan Perubahan Daya dengan No.Registrasi : <?php echo $row['no_registrasi'] ?> & Nama : <?php echo $row['nama'] ?> berhasil dihapus!'
                }).then((result) => {
                    window.location = "header.php?page=mohonyanbungpd";
                })
            </script>
    <?php
        }
    }
    ?>
</body>

</html>