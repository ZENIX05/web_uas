<?php include "koneksi.php"; 

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tbl_promosi WHERE id_promosi=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Promosi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2 class="text-center mt-5">Edit Promosi #<?php echo $id ?></h2>

    <form action="proses_edit.php" method="POST" class="container" enctype="multipart/form-data">

        <!-- kirim ID ke proses_edit.php -->
        <input type="hidden" name="id" value="<?php echo $row['id_promosi']; ?>">

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" 
                   value="<?php echo $row['judul_promosi']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required><?php 
                echo $row['deskripsi']; 
            ?></textarea>
        </div>
        
        <div class="mb-3">
            <label for="mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" id="mulai" name="mulai" 
                   value="<?php echo $row['tgl_mulai']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" class="form-control" id="selesai" name="selesai" 
                   value="<?php echo $row['tgl_selesai']; ?>" required>
        </div>

        <div class="text-center mb-5">
            <input type="submit" name="update" value="Simpan" class="btn btn-outline-primary">
        </div>
    </form>
</body>
</html>
