<?php
include "koneksi.php";
if (isset($_POST['update'])) {
    $id = ($_POST['id_menu']);
    $harga =($_POST['harga']);
    $status =($_POST['status']);

    $query = "UPDATE tbl_menu SET harga='$harga', status='$status' WHERE id_menu=$id";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
?>