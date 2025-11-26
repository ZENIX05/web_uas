<?php
include "koneksi.php";
if (isset($_POST['update'])) {
    $harga =($_POST['harga']);
    $status =($_POST['status']);

    $query = "UPDATE tbl_menu SET harga='$harga', status='$status'";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
?>