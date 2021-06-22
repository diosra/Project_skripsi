<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>404 - Halaman Tidak Ditemukan!</title>

</head>

<?php

if (!isset($_SESSION['username'])) {
    echo "<script> alert('Silahkan login Terlebih dahulu');</script>";
    echo "<meta http-equiv='refresh' content='0; url=login.php'>";
} else {
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Halaman yang anda cari tidak ditemukan!</p>
            <a href="index.php">&larr; Kembali ke Dashboard</a>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>

    <?php
    include_once 'footer.php';
    ?>
    <!-- End of Main Content -->

    </body>

</html>

<?php } ?>