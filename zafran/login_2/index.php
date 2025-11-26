<?php
// 1. LOGIKA SESSION
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

 <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Point Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <a class="nav-link active" href="index.php">Dashboard</a>
                    </li>
                    </ul>
                
                <div class="d-flex">
                    <a href="logout.php" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin logout?')">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="mt-4 p-5 bg-dark text-white rounded">
            <h1>Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p>Anda telah berhasil login ke dalam sistem manajemen Point Coffee.</p>   
        </div>

       <div class="container mt-5">
        <h3 class="mb-3">Daftar User</h3>
        <a href="tambah.php" class="btn btn-outline-primary mb-3">Tambah User</a>
        <div class="table-responsive">
            <table class="container table table-bordered">
                <tr>
                    <th>id_staf</th>
                    <th>Nama panjang</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th> 
                    <th>Aksi</th>                    
                </tr>
                <?php
                include "koneksi.php";
                $result = mysqli_query($koneksi, "SELECT * FROM tbl_staf");
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                    <td>".$no."</td>
                    <td>".$row['nama_lengkap']."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['password']."</td>      
                    <td>".$row['role']."</td>
                    <td>
                        <a class='btn btn-outline-primary me-0' href='edit.php?id=".$row['id_staf']."'>Edit</a>
                        <a class='btn btn-outline-danger' href='proses_hapus.php?id=".$row['id_staf']."' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                    </td>
                </tr>";
                    $no++;
                }
                ?>
            </table>
        </div>  
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 

