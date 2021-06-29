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

  $query = $mysqli->query("SELECT * FROM tb_data_user WHERE username = '$user' AND password='$pass'");
  $data = $query->fetch_array();

  $username = $data['username'];
  $password = $data['password'];
  $level = $data['level'];
  $tekcheck = $data['t_check'];
  $nama_asli = $data['nama'];
  $jenis_kelamin = $data['jenis_kelamin'];
  $foto = $data['foto'];
  $id = $data['id'];

  if ($user == $username && $pass == $password) {
    $_SESSION['username'] = $username;
    $name = $_SESSION['username'];
    $_SESSION['level'] = $level;
    $_SESSION['t_check'] = $tekcheck;
    $_SESSION['nama'] = $nama_asli;
    $_SESSION['jenis_kelamin'] = $jenis_kelamin;
    $_SESSION['foto'] = $foto;
    $_SESSION['id'] = $id;

    if ($level == 1 && $tekcheck == 0) {
?>
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Sukses.',
          text: 'Login sebagai Admin Berhasil! Selamat Datang : <?php echo $nama_asli ?>'
        }).then((result) => {
          window.location = "index.php";
        })
      </script>
    <?php
    } elseif ($level == 2 && $tekcheck == 0) {
    ?>
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Sukses.',
          text: 'Login sebagai Pegawai Berhasil! Selamat Datang : <?php echo $nama_asli ?>'
        }).then((result) => {
          window.location = "index.php";
        })
      </script>
    <?php
    } elseif ($level == 3 && $tekcheck == 0) {
    ?>
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Sukses.',
          text: 'Login sebagai Operator Berhasil! Selamat Datang : <?php echo $nama_asli ?>'
        }).then((result) => {
          window.location = "index.php";
        })
      </script>
    <?php
    } elseif ($level == 4 && $tekcheck == 1) {
    ?>
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Sukses.',
          text: 'Login sebagai Teknisi Pelayanan Penyambungan Berhasil! Selamat Datang : <?php echo $nama_asli ?>'
        }).then((result) => {
          window.location = "index.php";
        })
      </script>
    <?php
    } elseif ($level == 4 && $tekcheck == 2) {
    ?>
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Sukses.',
          text: 'Login sebagai Teknisi Pelayanan Pengaduan Berhasil! Selamat Datang : <?php echo $nama_asli ?>'
        }).then((result) => {
          window.location = "index.php";
        })
      </script>
    <?php
    } elseif ($level == 5 && $tekcheck == 0) {
    ?>
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Sukses.',
          text: 'Login sebagai Petugas Survey Berhasil! Selamat Datang : <?php echo $nama_asli ?>'
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
