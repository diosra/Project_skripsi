<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogOut</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

</body>

</html>
<?php
session_start();
session_destroy();
echo
"<script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses.',
            text: 'Anda Berhasil Log Out!'
        }).then((result) => {
            window.location = 'login.php';
        })
</script>";
