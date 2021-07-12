<?php
if (isset($_POST['save'])) {
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
                window.location = "header.php?page=mohonyanbung";
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
                window.location = "header.php?page=mohonyanbung";
            })
        </script>
<?php
    }
}
?>