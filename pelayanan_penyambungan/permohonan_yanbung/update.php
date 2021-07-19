<?php
if (isset($_POST['savepb'])) {
    $id = $_POST['id_mohon'];
    $status = implode(",", $_POST['status']);
    $tgl = $_POST['tgl'];
    $update = "UPDATE tb_mohon_pb SET status_pembayaran='$status' , tgl_pembayaran='$tgl' WHERE id_mohon=$id";
    // var_dump($update);
    $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
    if ($query) {
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Mengubah Status Pembayaran!'
            }).then((result) => {
                window.location = "header.php?page=mohonyanbungpb";
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Gagal Mengubah Status Pembayaran!'
            }).then((result) => {
                window.location = "header.php?page=mohonyanbungpb";
            })
        </script>
    <?php
    }
} elseif (isset($_POST['savepd'])) {
    $id = $_POST['id_mohon'];
    $status = implode(",", $_POST['status']);
    $tgl = $_POST['tgl'];
    $update = "UPDATE tb_mohon_pd SET status_pembayaran='$status' , tgl_pembayaran='$tgl' WHERE id_mohon=$id";
    // var_dump($update);
    $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
    if ($query) {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Mengubah Status Pembayaran!'
            }).then((result) => {
                window.location = "header.php?page=mohonyanbungpd";
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Gagal Mengubah Status Pembayaran!'
            }).then((result) => {
                window.location = "header.php?page=mohonyanbungpd";
            })
        </script>
    <?php
    }
} elseif (isset($_POST['saveps'])) {
    $id = $_POST['id_mohon'];
    $status = implode(",", $_POST['status']);
    $tgl = $_POST['tgl'];
    $update = "UPDATE tb_mohon_multiguna SET status_pembayaran='$status' , tgl_pembayaran='$tgl' WHERE id_mohon=$id";
    // var_dump($update);
    $query = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
    if ($query) {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses.',
                text: 'Sukses Mengubah Status Pembayaran!'
            }).then((result) => {
                window.location = "header.php?page=mohonyanbungps";
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Gagal Mengubah Status Pembayaran!'
            }).then((result) => {
                window.location = "header.php?page=mohonyanbungps";
            })
        </script>
<?php
    }
}
?>