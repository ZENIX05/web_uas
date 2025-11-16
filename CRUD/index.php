<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan CRUD</title>
    <?php   
    include "link.php";
    include "koneksi.php";
    include "nav.php";
    ?>

</head>
<body class="bg-secondary">
    <div class="container mt-3 p-3 border border-info bg-dark ">
                    <a href="tambah/tpeserta.php" class="btn btn-info">Tambah Peserta</a>
                <hr>
        <div class="col-md-12">
            <table class="table table-bordered border-info text-center text-light">
                <tr>
                    <td>ID</td>
                    <td>nama</td>
                    <td>foto</td>
                    <td>aksi</td>
                </tr>
                <?php 
                $sql = "SELECT * from kotak";
                $no = 1;
                $query = mysqli_query($koneksi,$sql);
                foreach ($query as $r) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $r['nama'] ?></td>
                    <td><img src="assets/<?= $r['foto'] ?>" alt="<?= $r['foto'] ?>" width = "100" ></td>
                    <td>
                        <a href="edit/epeserta.php?id_peserta=<?= $r['id_peserta']; ?>" class='btn btn-warning'>EDIT</a><hr>
                        <a href="hapus/hpeserta.php?id_peserta=<?= $r['id_peserta']; ?>" class='btn btn-danger'>HAPUS</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    </div>
</body>
</html>