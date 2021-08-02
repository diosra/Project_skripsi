<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Permohonan Perubahan Daya</title>
</head>

</html>

<!-- Begin Page Content - konten halaman -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><u>Data Permohonan Pelanggan mengajukan Perubahan Daya</u></h1>
    </div>

    <!-- Modal dialog untuk deskripsi -->
    <div id="get-data" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deskripsi Lengkap Data Pengajuan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk Dalam Proses (belum ada progres dari petugas)Survey-->
    <div id="get-data5" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Petugas Survey</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi_petugas">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk Dalam Proses Pengerjaan Survey-->
    <div id="get-data3" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Laporan Progres Sementara Petugas</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi_proses">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk Selesai Survey-->
    <div id="get-data4" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Laporan Hasil Survey</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi_selesai">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk Selesai Survey-->
    <div id="get-data11" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tanggal Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="desk_pembayaran">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk status pembayaran-->
    <div id="get-data6" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Status Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi_pembayaran">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dialog untuk penolakan Survey-->
    <div id="get-data7" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Alasan Penolakan Survey</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deskripsi_ditolak">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Data Masuk dan Progress -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Data Permohonan Masuk dan Progres Perubahan Daya</h4>
            <!-- <a class="btn btn-primary p-2 mr-2" href="header.php?page=pelinput"><i class="fas fa-plus-circle"></i> Tambah</a> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Registrasi</th>
                            <th class="text-center">Identitas (KTP)</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Tanggal Masuk</th>
                            <th class="text-center">Deskripsi Lengkap Data Pengajuan</th>
                            <th class="text-center">Status Petugas Survey</th>
                            <!-- <th class="text-center">Status Pembayaran</th> -->
                            <!-- <th class="text-center">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $data = mysqli_query($mysqli, "SELECT a.*, b.idpel, b.identitas,b.nama,b.alamat FROM tb_mohon_pd a JOIN tb_pelanggan b ON a.id_pelanggan = b.idpel");

                        $data = mysqli_query($mysqli, "SELECT a.*,b.id_mohon,b.id_perubahan_daya,b.fasa_lama, c.*, d.*, e.no_petugas_survey , f.idpel, f.identitas, f.nama, f.alamat
                        FROM tb_mohon_pd a JOIN tb_perubahan_daya b ON a.id_mohon = b.id_mohon LEFT JOIN tb_laporan_survey c ON c.id_mohon_survey = a.id_mohon LEFT JOIN tb_survey_lap_masuk d ON d.id_mohon_survey = a.id_mohon LEFT JOIN tb_petugas_survey e ON e.no_petugas_survey = d.id_petugas LEFT JOIN tb_pelanggan f ON a.id_pelanggan = f.idpel WHERE (a.status_survey = '0' || a.status_survey = '1' || a.status_survey = '2') ORDER BY a.id_mohon ASC, a.tgl_masuk ASC");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                    <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td>
                                    <td class="align-middle"><?php echo date('d-M-Y', strtotime($row['tgl_masuk'])); ?></td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_mohon'] ?>" class="open-modal btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>

                                    <?php
                                    if ($row['status_survey'] == "1") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal5 btn btn-info rounded" data-toggle="modal" data-id="<?php echo $row['id_survey_lap'] ?>" href="#">
                                                Dalam Proses
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "2") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal3 btn btn-info rounded" data-toggle="modal" data-id="<?php echo $row['id_mohon'] ?>" href="#">
                                                Survey Belum Selesai
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "3") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal4 btn btn-success rounded" data-toggle="modal" data-id="<?php echo $row['id_laporan'] ?>" href="#">
                                                Selesai
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "4") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal7 btn btn-danger rounded" data-toggle="modal" data-id="<?php echo $row['id_laporan'] ?>" href="#">
                                                Ditolak
                                            </a>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-primary rounded" href="header.php?page=surveytambah&idsurveypd=<?php echo $row['id_mohon'] ?>&fasa=<?php echo $row['fasa_lama'] ?>&idm=<?php echo $row['no_registrasi'] ?>">
                                                Pilih Petugas
                                            </a>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <!-- <?php
                                            if ($row['status_survey'] == "0" || $row['status_survey'] == "1" || $row['status_survey'] == "2") {
                                            ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-secondary rounded disabled">
                                                Survey dalam proses
                                            </a>
                                        </td>
                                        <?php
                                            } elseif ($row['status_survey'] == "3") {
                                                if ($row['status_pembayaran'] == 0) {
                                        ?>
                                            <td class="align-middle text-center">
                                                <a class="open-modal6 btn btn-warning rounded" data-toggle="modal" data-id="<?php echo $row['id_mohon'] ?>" href="#">
                                                    Belum Lunas
                                                </a>
                                            </td>
                                        <?php
                                                } elseif ($row['status_pembayaran'] == 1) {
                                        ?>
                                            <td class="align-middle text-center">
                                                <a class="btn btn-success rounded">
                                                    Lunas
                                                </a>
                                            </td>
                                        <?php
                                                }
                                            } else {
                                        ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-secondary rounded disabled">
                                                Ditolak
                                            </a>
                                        </td>
                                    <?php
                                            }
                                    ?> -->
                                    <!-- <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col">
                                                <a href="header.php?page=peledit&edit=<?php echo $row['id_pelanggan'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            </div>
                                            <div class="col mt-2">
                                                <a href="header.php?page=hapusmohonyanbung&hapuspd=<?php echo $row['id_mohon'] ?>&noreg=<?php echo $row['no_registrasi'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data" id="remove"><i class="fas fa-user-minus"></i></a>
                                            </div>
                                        </div>
                                    </td> -->
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tabel Data  Selesai -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Data Permohonan Survey Selesai</h4>
            <!-- <a class="btn btn-primary p-2 mr-2" href="header.php?page=pelinput"><i class="fas fa-plus-circle"></i> Tambah</a> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered text-gray-900" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Registrasi</th>
                            <th class="text-center">Identitas (KTP)</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Tanggal Selesai</th>
                            <th class="text-center">Deskripsi Lengkap Data Pengajuan</th>
                            <th class="text-center">Status Petugas Survey</th>
                            <th class="text-center">Status Pembayaran</th>
                            <!-- <th class="text-center">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $data = mysqli_query($mysqli, "SELECT a.*, b.idpel, b.identitas,b.nama,b.alamat FROM tb_mohon_pd a JOIN tb_pelanggan b ON a.id_pelanggan = b.idpel");

                        $data = mysqli_query($mysqli, "SELECT a.*,b.id_mohon,b.id_perubahan_daya,b.fasa_lama, c.*, d.*, e.no_petugas_survey , f.idpel, f.identitas, f.nama, f.alamat
                        FROM tb_mohon_pd a JOIN tb_perubahan_daya b ON a.id_mohon = b.id_mohon LEFT JOIN tb_laporan_survey c ON c.id_mohon_survey = a.id_mohon LEFT JOIN tb_survey_lap_masuk d ON d.id_mohon_survey = a.id_mohon LEFT JOIN tb_petugas_survey e ON e.no_petugas_survey = d.id_petugas LEFT JOIN tb_pelanggan f ON a.id_pelanggan = f.idpel WHERE a.status_survey = '3' ORDER BY c.tgl_selesai ASC");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                    <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td>
                                    <td class="align-middle"><?php echo date('d-M-Y', strtotime($row['tgl_selesai'])); ?></td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_mohon'] ?>" class="open-modal btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>

                                    <?php
                                    if ($row['status_survey'] == "1") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal5 btn btn-info rounded" data-toggle="modal" data-id="<?php echo $row['id_survey_lap'] ?>" href="#">
                                                Dalam Proses
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "2") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal3 btn btn-info rounded" data-toggle="modal" data-id="<?php echo $row['id_mohon'] ?>" href="#">
                                                Survey Belum Selesai
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "3") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal4 btn btn-success rounded" data-toggle="modal" data-id="<?php echo $row['id_laporan'] ?>" href="#">
                                                Selesai
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "4") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal7 btn btn-danger rounded" data-toggle="modal" data-id="<?php echo $row['id_laporan'] ?>" href="#">
                                                Ditolak
                                            </a>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-primary rounded" href="header.php?page=surveytambah&idsurveypd=<?php echo $row['id_mohon'] ?>&fasa=<?php echo $row['fasa_lama'] ?>&idm=<?php echo $row['no_registrasi'] ?>">
                                                Pilih Petugas
                                            </a>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($row['status_survey'] == "0" || $row['status_survey'] == "1" || $row['status_survey'] == "2") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-secondary rounded disabled">
                                                Survey dalam proses
                                            </a>
                                        </td>
                                        <?php
                                    } elseif ($row['status_survey'] == "3") {
                                        if ($row['status_pembayaran'] == 0) {
                                        ?>
                                            <td class="align-middle text-center">
                                                <a class="open-modal6 btn btn-warning rounded" data-toggle="modal" data-id="<?php echo $row['id_mohon'] ?>" href="#">
                                                    Belum Lunas
                                                </a>
                                            </td>
                                        <?php
                                        } elseif ($row['status_pembayaran'] == 1) {
                                        ?>
                                            <td class="align-middle text-center">
                                                <a class="open-modal11 btn btn-success rounded" data-toggle="modal" data-id="<?php echo $row['id_mohon'] ?>" href="#">
                                                    Lunas
                                                </a>
                                            </td>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-secondary rounded disabled">
                                                Ditolak
                                            </a>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <!-- <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col">
                                                <a href="header.php?page=peledit&edit=<?php echo $row['id_pelanggan'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            </div>
                                            <div class="col mt-2">
                                                <a href="header.php?page=hapusmohonyanbung&hapuspd=<?php echo $row['id_mohon'] ?>&noreg=<?php echo $row['no_registrasi'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data" id="remove"><i class="fas fa-user-minus"></i></a>
                                            </div>
                                        </div>
                                    </td> -->
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tabel Data Ditolak -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto p-2">Data Permohonan Survey Ditolak</h4>
            <!-- <a class="btn btn-primary p-2 mr-2" href="header.php?page=pelinput"><i class="fas fa-plus-circle"></i> Tambah</a> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered text-gray-900" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Registrasi</th>
                            <th class="text-center">Identitas (KTP)</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Tanggal Ditolak</th>
                            <th class="text-center">Deskripsi Lengkap Data Pengajuan</th>
                            <th class="text-center">Status Petugas Survey</th>
                            <!-- <th class="text-center">Status Pembayaran</th> -->
                            <!-- <th class="text-center">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $data = mysqli_query($mysqli, "SELECT a.*, b.idpel, b.identitas,b.nama,b.alamat FROM tb_mohon_pd a JOIN tb_pelanggan b ON a.id_pelanggan = b.idpel");

                        $data = mysqli_query($mysqli, "SELECT a.*,b.id_mohon,b.id_perubahan_daya,b.fasa_lama, c.*, d.*, e.no_petugas_survey , f.idpel, f.identitas, f.nama, f.alamat
                        FROM tb_mohon_pd a JOIN tb_perubahan_daya b ON a.id_mohon = b.id_mohon LEFT JOIN tb_laporan_survey c ON c.id_mohon_survey = a.id_mohon LEFT JOIN tb_survey_lap_masuk d ON d.id_mohon_survey = a.id_mohon LEFT JOIN tb_petugas_survey e ON e.no_petugas_survey = d.id_petugas LEFT JOIN tb_pelanggan f ON a.id_pelanggan = f.idpel WHERE a.status_survey = '4' ORDER BY c.tgl_selesai ASC");
                        $no = 1;
                        $hitungrow = mysqli_num_rows($data);
                        if ($hitungrow > 0) {
                            while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no++ ?></td>
                                    <td class="align-middle"><?php echo $row['no_registrasi']; ?></td>
                                    <td class="align-middle"><?php echo $row['identitas']; ?></td>
                                    <td class="align-middle"><?php echo $row['nama']; ?></td>
                                    <td class="align-middle"><?php echo $row['alamat']; ?></td>
                                    <td class="align-middle"><?php echo date('d-M-Y', strtotime($row['tgl_selesai'])); ?></td>
                                    <td class="align-middle text-center">
                                        <a data-toggle="modal" data-id="<?php echo $row['id_mohon'] ?>" class="open-modal btn btn-primary" href="#">
                                            <i class='fas fa-sticky-note fa-2x'></i>
                                        </a>
                                    </td>

                                    <?php
                                    if ($row['status_survey'] == "1") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal5 btn btn-info rounded" data-toggle="modal" data-id="<?php echo $row['id_survey_lap'] ?>" href="#">
                                                Dalam Proses
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "2") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal3 btn btn-info rounded" data-toggle="modal" data-id="<?php echo $row['id_mohon'] ?>" href="#">
                                                Survey Belum Selesai
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "3") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal4 btn btn-success rounded" data-toggle="modal" data-id="<?php echo $row['id_laporan'] ?>" href="#">
                                                Selesai
                                            </a>
                                        </td>
                                    <?php
                                    } elseif ($row['status_survey'] == "4") {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="open-modal7 btn btn-danger rounded" data-toggle="modal" data-id="<?php echo $row['id_laporan'] ?>" href="#">
                                                Ditolak
                                            </a>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-primary rounded" href="header.php?page=surveytambah&idsurveypd=<?php echo $row['id_mohon'] ?>&fasa=<?php echo $row['fasa_lama'] ?>&idm=<?php echo $row['no_registrasi'] ?>">
                                                Pilih Petugas
                                            </a>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <!-- <?php
                                            if ($row['status_survey'] == "0" || $row['status_survey'] == "1" || $row['status_survey'] == "2") {
                                            ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-secondary rounded disabled">
                                                Survey dalam proses
                                            </a>
                                        </td>
                                        <?php
                                            } elseif ($row['status_survey'] == "3") {
                                                if ($row['status_pembayaran'] == 0) {
                                        ?>
                                            <td class="align-middle text-center">
                                                <a class="open-modal6 btn btn-warning rounded" data-toggle="modal" data-id="<?php echo $row['id_mohon'] ?>" href="#">
                                                    Belum Lunas
                                                </a>
                                            </td>
                                        <?php
                                                } elseif ($row['status_pembayaran'] == 1) {
                                        ?>
                                            <td class="align-middle text-center">
                                                <a class="btn btn-success rounded">
                                                    Lunas
                                                </a>
                                            </td>
                                        <?php
                                                }
                                            } else {
                                        ?>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-secondary rounded disabled">
                                                Ditolak
                                            </a>
                                        </td>
                                    <?php
                                            }
                                    ?> -->
                                    <!-- <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col">
                                                <a href="header.php?page=peledit&edit=<?php echo $row['id_pelanggan'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            </div>
                                            <div class="col mt-2">
                                                <a href="header.php?page=hapusmohonyanbung&hapuspd=<?php echo $row['id_mohon'] ?>&noreg=<?php echo $row['no_registrasi'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data" id="remove"><i class="fas fa-user-minus"></i></a>
                                            </div>
                                        </div>
                                    </td> -->
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    $(function() {
        $(document).on('click', '.open-modal', function(e) {
            e.preventDefault();
            $("#get-data").modal('show');
            $.post('pelayanan_penyambungan/permohonan_yanbung/view_pd.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi").html(html);
                });
        });
    })
</script>

<script>
    $(function() {
        $(document).on('click', '.open-modal3', function(e) {
            e.preventDefault();
            $("#get-data3").modal('show');
            $.post('pelayanan_penyambungan/permohonan_yanbung/view_proses_survey_pd.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi_proses").html(html);
                });
        });
    })
</script>

<script>
    $(function() {
        $(document).on('click', '.open-modal4', function(e) {
            e.preventDefault();
            $("#get-data4").modal('show');
            $.post('pelayanan_penyambungan/permohonan_yanbung/view_survey_selesai_pd.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi_selesai").html(html);
                });
        });
    })
</script>

<script>
    $(function() {
        $(document).on('click', '.open-modal5', function(e) {
            e.preventDefault();
            $("#get-data5").modal('show');
            $.post('pelayanan_penyambungan/permohonan_yanbung/view_petugas_pd.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi_petugas").html(html);
                });
        });
    })
</script>

<script>
    $(function() {
        $(document).on('click', '.open-modal6', function(e) {
            e.preventDefault();
            $("#get-data6").modal('show');
            $.post('pelayanan_penyambungan/permohonan_yanbung/view_pembayaran_pd.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi_pembayaran").html(html);
                });
        });
    })
</script>

<script>
    $(function() {
        $(document).on('click', '.open-modal7', function(e) {
            e.preventDefault();
            $("#get-data7").modal('show');
            $.post('pelayanan_penyambungan/permohonan_yanbung/view_survey_ditolak_pd.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#deskripsi_ditolak").html(html);
                });
        });
    })
</script>

<script>
    $(function() {
        $(document).on('click', '.open-modal11', function(e) {
            e.preventDefault();
            $("#get-data11").modal('show');
            $.post('pelayanan_penyambungan/permohonan_yanbung/view_tgl_pembayaran_pd.php', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $("#desk_pembayaran").html(html);
                });
        });
    })
</script>

<?php
include_once 'footer.php';
?>

<!-- Script untuk Menampilkan 2 Tabel di 1 halaman -->
<script>
    $(document).ready(function() {
        $('table.display').DataTable();
    });
</script>

<!-- Script buat menghilangkan beberapa fitur sorting di datatables -->
<script>
    $('#dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [1, 3, 4, 6, 7]
        }]
    });
</script>

<!-- Script buat menghilangkan beberapa fitur sorting di datatables - Tabel 2 -->
<script>
    $('#dataTable2').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [1, 3, 4, 6, 7]
        }]
    });
</script>

<!-- Script buat menghilangkan beberapa fitur sorting di datatables - Tabel 2 -->
<script>
    $('#dataTable3').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [1, 3, 4, 6, 7]
        }]
    });
</script>