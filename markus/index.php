<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <img src="https://pointcoffee.id/wp-content/uploads/2023/04/cropped-cropped-cropped-Logo-Point-Coffee.png" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tampilan.php"> Tampilan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="mt-4 p-5 bg-dark text-white rounded">
            <h1>Selamat Datang, Ibra ganteng!</h1>
            <p>Kelola menu Point Coffee Anda.</p>   
        </div>
    </div>
    
    <!-- tampilan article di admin -->
<div class="container mt-5">
        <h3 class="mb-3">Daftar Promosi</h3>
        <a href="tambah_promosi.php" class="btn btn-outline-primary mb-3">Tambah Promosi</a>
        <div class="table-responsive">
            <table class="container table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th> 
                    <th>Tangggal mulai</th>
                    <th>Tanggal selesai</th>
                </tr>
                <?php
                include "koneksi.php";
                $result = mysqli_query($koneksi, "SELECT * FROM tbl_promosi");
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "          
                    <tr>
                            <td>$no</td>
                            <td>{$row['judul_promosi']}</td>
                            <td><img src='{$row['gambar_promosi']}' width='120'></td>
                            <td>{$row['deskripsi']}</td>
                            <td>{$row['tgl_mulai']}</td>
                            <td>{$row['tgl_selesai']}</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='edit.php?id={$row['id_promosi']}'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='proses_hapus.php?id={$row['id_promosi']}' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                            </td>
                        </tr>";
                    $no++;
                }
                ?>
            </table>
        </div>  
</div>

</body>
</html>