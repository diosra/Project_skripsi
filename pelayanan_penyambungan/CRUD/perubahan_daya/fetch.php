<?php
if (isset($_POST["action"])) {
    $connect = mysqli_connect("localhost", "root", "", "db_pln");

    if ($_POST["action"] == "id_pelanggan") {
        $query = "SELECT nama FROM tb_pelanggan WHERE id_pelanggan = '" . $_POST["query"] . "' GROUP BY nama";
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_array($result)) {
?>
            <input type="text" name="nama" id="nama" value="<?php echo $row["nama"] ?>" disabled class="form-control">
<?php
        }
    }
}
