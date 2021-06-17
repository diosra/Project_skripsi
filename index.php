<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <?php
    include_once 'header.php';
    ?>
</head>

</html>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Tampilan Card total data hanya untuk admin dan pegawai -->
    <?php
    $level = $_SESSION['level'];
    $tekcheck = $_SESSION['t_check'];
    if ($level == 1 || $level == 2) {
    ?>
        <!-- Card - Nampilkan Jumlah Data -->
        <div class="row">
            <!-- Jumlah Data Pelanggan -->
            <?php
            $data = mysqli_query($mysqli, "select * from tb_pelanggan");
            $hitungrow = mysqli_num_rows($data);
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Data Pelanggan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hitungrow ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jumlah Data Pasang Baru -->
            <?php
            $data = mysqli_query($mysqli, "select * from tb_pasang_baru");
            $hitungrow2 = mysqli_num_rows($data);
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Pasang Baru</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hitungrow2 ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jumlah Data Perubahan Daya -->
            <?php
            $data = mysqli_query($mysqli, "select * from tb_perubahan_daya");
            $hitungrow3 = mysqli_num_rows($data);
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Perubahan Daya</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hitungrow3 ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jumlah Data Multiguna -->
            <?php
            $data = mysqli_query($mysqli, "select * from tb_multiguna");
            $hitungrow2 = mysqli_num_rows($data);
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Multiguna</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hitungrow2 ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr style="border-top: 1px solid #8c8b8b; border-bottom: 1px solid #fff;">
    <?php
    }
    ?>

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