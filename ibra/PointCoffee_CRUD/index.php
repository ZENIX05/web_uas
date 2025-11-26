<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Admin</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <img src="https://pointcoffee.id/wp-content/uploads/2023/04/cropped-cropped-cropped-Logo-Point-Coffee.png" class="ms-4">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pengunjung.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Pengunjung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kasir.php"> Kasir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container mt-5">
        <h3 class="mb-3">Daftar Menu Pengunjung</h3>
        <a href="tambah_pengunjung.php" class="btn btn-outline-primary mb-3">Tambah Menu</a>
        <div class="table-responsive">
            <table class="container table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Menu</th>
                    <th>Deskripsi</th> 
                    <th>Harga</th> 
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php
                include "koneksi.php";
                $result = mysqli_query($koneksi, "SELECT * FROM tbl_menu");
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                    <td>".$no."</td>
                    <td><img src='".$row['gambar']."' width='150px'></td>
                    <td>".$row['nama_menu']."</td>
                    <td>".$row['deskripsi']."</td>    
                    <td>Rp ".number_format($row['harga'], 0, ',', '.')."</td>
                    <td>".$row['status']."</td>
                    <td>
                        <a class='btn btn-outline-warning mt-4 ' href='edit.php?id=".$row['id_menu']."'>Edit</a>
                        <a class='btn btn-outline-danger mt-3' href='hapus.php?id=".$row['id_menu']."' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
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