<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PLN - Halaman Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-image: url(img/bg_login.jpg); background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9 mt-5">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-3">
                                    <div class="text-center">
                                        <div class="d-flex justify-content-center mb-4">
                                            <img src="img/logo.png" width="35%" class="mr-4">
                                            <div class="border-left mt-3">
                                                <h5 class="text-gray-900 font-weight-bold ml-2">Aplikasi Pelayanan Penyambungan & Pengaduan</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <form class="user" action="proses_login.php" method="POST">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Username</label>
                                            <input type="text" class="form-control form-control-user" placeholder="Masukkan Username" name="username" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Password</label>
                                            <input type="password" class="form-control form-control-user" placeholder="Masukkan Password" name="password" required>
                                        </div>
                                        <a class="btn btn-warning btn-user float-left mb-3 p-3 text-dark" href="dashboard.php">
                                            <i class="fas fa-arrow-circle-left"></i>
                                            Dashboard
                                        </a>
                                        <button class="btn btn-primary btn-user float-right mb-3 p-3" type="submit" name="log"><i class="fas fa-sign-in-alt mr-2"></i> Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>