<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top" class="text-gray-900">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #1B6C89;">

            <div class="nav-item text-center mt-3 mb-3">
                <div class="nav-item text-center mt-3 mb-3">
                    <a class="btn" href="login.php">
                        <i class="fas fa-user-alt fa-2x"></i> <br>
                        <span>Login</span>
                    </a>
                </div>
            </div>

            <!-- Divider -->
            <hr class=" sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <span>Layanan Penyambungan</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <span>Layanan Pengaduan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="d-flex justify-content-center">
                            <!-- Header - Logo & Judul -->
                            <div class="img-responsive">
                                <h4 class="text-center mt-2 text-dark font-weight-bold text-sm-left text-md-left text-lg-left text-xl-left"><a href="index.php" class="border-right mr-3"><img src="img/logo.png" width="15%" class="mr-3"></a>Selamat Datang ke Aplikasi Pelayanan Penyambungan dan Pengaduan</h4>
                            </div>
                        </div>

                    </ul>
                </nav>
                <!-- End of Topbar -->
</body>

</html>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Profil Perusahaan -->
    <div class="text-center mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Profil Perusahaan</h1>
        <img src="img/bg_login.jpg" width="50%" class="mt-2">
    </div>

    <!-- Visi dan Misi -->
    <div class="row">
        <!-- Visi -->
        <div class="card shadow col mr-2">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary text-center">Visi</h3>
            </div>
            <div class="card-body">
                Menjadi Perusahaan Listrik Terkemuka se-Asia Tenggara dan #1 Pilihan Pelanggan untuk Solusi Energi.
            </div>
        </div>

        <!-- Misi -->
        <div class="card shadow col">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary text-center">Misi</h3>
            </div>
            <div class="card-body">
                <ul>
                    <li>
                        Menjalankan bisnis kelistrikan dan bidang lain yang terkait, berorientasi pada kepuasan pelanggan, anggota perusahaan dan pemegang saham.
                    </li>
                    <li>
                        Menjadikan tenaga listrik sebagai media untuk meningkatkan kualitas kehidupan masyarakat.
                    </li>
                    <li>
                        Mengupayakan agar tenaga listrik menjadi pendorong kegiatan ekonomi.
                    </li>
                    <li>
                        Menjalankan kegiatan usaha yang berwawasan lingkungan.
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Riwayat Singkat -->
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary text-center">Riwayat Singkat PLN</h3>
        </div>
        <div class="card-body">
            <p>Berawal di akhir abad 19, bidang pabrik gula dan pabrik ketenagalistrikan di Indonesia mulai ditingkatkan saat beberapa perusahaan asal Belanda yang bergerak di bidang pabrik gula dan pebrik teh mendirikan pembangkit tenaga lisrik untuk keperluan sendiri</p>

            <p>Antara tahun 1942-1945 terjadi peralihan pengelolaan perusahaan-perusahaan Belanda tersebut oleh Jepang, setelah Belanda menyerah kepada pasukan tentara Jepang di awal Perang Dunia II</p>

            <p>Proses peralihan kekuasaan kembali terjadi di akhir Perang Dunia II pada Agustus 1945, saat Jepang menyerah kepada Sekutu. Kesempatan ini dimanfaatkan oleh para pemuda dan buruh listrik melalui delagasi Buruh/Pegawai Listrik dan Gas yang bersama-sama dengan Pemimpin KNI Pusat berinisiatif menghadap Presiden Soekarno untuk menyerahkan perusahaan-perusahaan tersebut kepada Pemerintah Republik Indonesia. Pada 27 Oktober 1945, Presiden Soekarno membentuk Jawatan Listrik dan Gas di bawah Departemen Pekerjaan Umum dan Tenaga dengan kapasitas pembangkit tenaga listrik sebesar 157,5 MW.</p>

            <p>Pada tanggal 1 januari 1961, Jawatan Listrik dan Gas diubah menjadi BPU-PLN (Bada Pemimpin Umum Perusahaan Listrik Negara) yang bergerak di bidang listrik, gas dan kokas yang dibubarkan pada tanggal 1 Januari 1965. Pada saat yang sama, 2 (dua) perusahaan negara yaitu Perusahaan Listrik Negara (PLN) sebagai pengelola tenaga listrik milik negara dan Perusahaan Gas Negara (PGN) sebagai pengelola gas diresmikan.</p>

            <p>Pada tahun 1972, sesuai dengan Peraturan Pemerintah No. 17, status Perusahaan Listrik Negara (PLN) ditetapkan sebagai Perusahaan Umum Listrik Negara dan sebagai Pemegang Kuasa Usaha Ketenagalistrikan (PKUK) dengan tugas menyediakan tenaga listrik bagi kepentingan umum.</p>

            <p>Seiring dengan kebijakan Pemerintah yang memberikan kesempatan kepada sektor swasta untuk bergerak dalam bisnis penyediaan listrik, maka sejak tahun 1994 status PLN beralih dari Perusahaan Umum menjadi Perusahaan Perseroan (Persero) dan juga sebagai PKUK dalam menyediakan listrik bagi kepentingan umum hingga sekarang</p>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include_once 'footer.php';
?>