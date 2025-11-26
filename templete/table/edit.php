<?php include "koneksi.php"; ?>
<?php
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tbl_menu WHERE id_menu=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <h2 class="text-center mt-5">Edit Menu</h2>
    <form method="POST" class="container" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo ($row['harga']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="Tersedia" <?php echo ($row['status'] === 'Tersedia'); ?>>Tersedia</option>
                <option value="Habis" <?php echo ($row['status'] === 'Habis'); ?>>Habis</option>
            </select>
        </div>
        <div class="text-center mb-5">
            <input type="submit" name="update" value="Simpan" class="btn btn-outline-primary">
        </div>
    </form>
    <?php
if (isset($_POST['update'])) {
    $harga =($_POST['harga']);
    $status =($_POST['status']);

    $query = "UPDATE tbl_menu SET harga='$harga', status='$status' WHERE id_menu=$id";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
?>
</body>

</html>