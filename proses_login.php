<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proses</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

</body>

</html>

<?php
include 'koneksi.php';

if (isset($_POST['log'])) {
  $user = $mysqli->real_escape_string($_POST['username']);
  $pass = $mysqli->real_escape_string($_POST['password']);

  $query = $mysqli->query("SELECT * FROM datalogin WHERE username = '$user' AND password='$pass'");
  $data = $query->fetch_array();
  $username = $data['username'];
  $password = $data['password'];
  $level = $data['level'];

  $nama_asli = $data['nama_asli'];

  if ($user == $username && $pass == $password) {
    $_SESSION['username'] = $username;
    $name = $_SESSION['username'];
    $_SESSION['level'] = $level;

    $_SESSION['nama_asli'] = $nama_asli;

    if ($level == 1) {
?>
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Sukses.',
          text: 'Login Berhasil! Selamat Datang : <?php echo $nama_asli ?>'
        }).then((result) => {
          window.location = "index.php";
        })
      </script>
    <?php
    } else {
    ?>
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Sukses.',
          text: 'Login Berhasil! Selamat Datang : <?php echo $nama_asli ?>'
        }).then((result) => {
          window.location = "index.php";
        })
      </script>
    <?php
    }
  } else {
    ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Gagal.',
        text: 'Login Gagal! Username atau Password Salah!'
      }).then((result) => {
        window.location = "login.php";
      })
    </script>
<?php
  }
}
