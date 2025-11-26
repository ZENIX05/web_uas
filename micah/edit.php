<?php include "../link/koneksi.php"; ?>
<?php
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tbl_artikel WHERE id_artikel=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <form  method="POST" enctype="multipart/form-data" action="proses_edit_artikel.php">
        <div class="container mb-3">
            <h2 class="mb-5">Edit Artikel</h2>
    
            <input type="hidden" name="id_artikel" value="<?php echo $row['id_artikel']; ?>">

            <div class="mb-3">
                <label for="judul_artikel" class="form-label">Judul Artikel: </label>
                <input type="text" name="judul_artikel" id="judul_artikel" size="40"
                       value="<?php echo $row['judul_artikel']; ?>">
            </div>

            <div class="mb-3">
                <label for="gambar_utama" class="form-label">Gambar Utama:</label><br>
                <img src="<?php echo $row['gambar_utama']; ?>" width="150"><br>
                <input type="file" name="gambar_utama" id="gambar_utama">
            </div>

            <div class="mb-3">
                <label for="isi_konten" class="form-label">Isi Konten:</label><br>
                <textarea name="isi_konten" id="isi_konten" rows="8" cols="60"><?php 
                    echo $row['isi_konten']; 
                ?></textarea>
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis:</label>
                <input type="text" name="penulis" id="penulis" size="40"
                       value="<?php echo $row['penulis']; ?>">
            </div>

             <div class="mb-3">
                 <label for="id_staf" class="form-label">ID staff:</label>
                <input type="number" name="id_staf" id="staff" size="10"
                       value="<?php echo $row['id_staf']; ?>">
            </div>

            <input type="submit" name="update" value="simpan" class="btn btn-outline-primary">
        </div>
    </form>
 
</body>
</html>