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
        $noreg = $_GET['noreg'];

        $noreg_exp = explode("-", $noreg);
        $noreg_imp = implode("", $noreg_exp);

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
    } elseif (isset($_GET['hapuspd']) && isset($_GET['noreg'])) {
        $id = $_GET['hapuspd'];
        $noreg = $_GET['noreg'];

        $noreg_exp = explode("-", $noreg);
        $noreg_imp = implode("", $noreg_exp);

        $data = mysqli_query($mysqli, "SELECT a.*,b.* FROM tb_mohon_pd a JOIN tb_pelanggan b ON a.id_pelanggan = b.idpel WHERE a.id_mohon = $id");
        $row = $data->fetch_assoc();
        $delete = "DELETE FROM tb_mohon_pd WHERE id_mohon ='$id'";
        $query = mysqli_query($mysqli, $delete) or die(mysqli_error($mysqli));
        // var_dump($delete);

        if ($query) {
            $delete2 = "DELETE FROM tb_survey_lap_masuk WHERE noreg ='$noreg_imp'";
            $query2 = mysqli_query($mysqli, $delete2) or die(mysqli_error($mysqli));
            // var_dump($delete);
        ?>
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
    } elseif (isset($_GET['hapusps'])) {
        $id = $_GET['hapusps'];
        $noreg = $_GET['noreg'];

        $noreg_exp = explode("-", $noreg);
        $noreg_imp = implode("", $noreg_exp);

        $data = mysqli_query($mysqli, "SELECT a.*,b.* FROM tb_mohon_multiguna a JOIN tb_pelanggan b ON a.id_pelanggan = b.idpel WHERE a.id_mohon = $id");
        $row = $data->fetch_assoc();
        $delete = "DELETE FROM tb_mohon_multiguna WHERE id_mohon =$id";
        $query = mysqli_query($mysqli, $delete) or die(mysqli_error($mysqli));

        if ($query) { ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses.',
                    text: 'Data Permohonan Penyambungan Sementara dengan No.Registrasi : <?php echo $row['no_registrasi'] ?> & Nama : <?php echo $row['nama'] ?> berhasil dihapus!'
                }).then((result) => {
                    window.location = "header.php?page=mohonyanbungps";
                })
            </script>
    <?php
        }
    }
    ?>
</body>

</html>