<?php include "koneksi.php"; ?>
<?php
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tbl_staf WHERE id_staf=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
                        <h2 class="mt-5 mb-5">Edit Akun Staf</h2>
                    </div>
                    <div class="card-body"></div>
    <form method="POST" action="proses_edit.php?id=<?php echo $id; ?>" class="container" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo ($row['nama_lengkap']); ?>" required>
        </div>      
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo ($row['username']); ?>" required>                
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="Admin" <?php if($row['role'] == 'Admin') echo 'selected'; ?>>Admin</option>
                <option value="Kasir" <?php if($row['role'] == 'Kasir') echo 'selected'; ?>>Kasir</option>
            </select>
        <div class="text-center mt-5">
                                <a href="index.php" class="btn btn-outline-danger me-md-2 ">Batal</a>
                               <input type="submit" name="update" value="Simpan" class="btn btn-outline-primary me-md-2">
                            </div>
    </form>
 
</body>

</html>