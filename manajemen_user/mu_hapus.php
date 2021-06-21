<!DOCTYPE html>
<html lang="en">
<?php
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

            $delete = "DELETE FROM tb_data_user WHERE id=$id";
            $query = mysqli_query($mysqli, $delete) or die(mysqli_error($mysqli));

            if ($query) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses.',
                        text: 'Data User berhasil dihapus!'
                    }).then((result) => {
                        window.location = "header.php?page=user";
                    })
                </script>
        <?php
            }
        } ?>
    </body>

</html>

<?php } ?>