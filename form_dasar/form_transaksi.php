<?php
$data_menu_array = array(
    1 => array("nama" => "Kopi Susu Aren", "harga" => 20000, "status" => "Tersedia"),
    2 => array("nama" => "Americano", "harga" => 15000, "status" => "Tersedia"),
    3 => array("nama" => "Butter Croissant", "harga" => 18000, "status" => "Tersedia"),
    4 => array("nama" => "Red Velvet Latte", "harga" => 22000, "status" => "Habis")
);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
</head>

<body>

    <h2>Form Kasir</h2>

    <form action="" method="post">

        <label>Nama Pelanggan: </label>
        <input type="text" name="nama_pelanggan" required><br><br>

        <h3>Pilih Menu:</h3>
        <table border="0" cellpadding="5">
            <?php foreach ($data_menu_array as $id => $menu): ?>
                <tr>
                    <td><?php echo $menu['nama']; ?></td>
                    <td>(Rp <?php echo number_format($menu['harga']); ?>)</td>
                    <td>
                        <?php if ($menu['status'] == 'Tersedia'): ?>
                            <input type="number" name="qty[<?php echo $id; ?>]" value="0" min="0">
                        <?php else: ?>
                            <span style="color:red;">Habis</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <br>
        <button type="submit">Hitung & Cetak Struk</button>
    </form>

    <hr>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nama_pelanggan = $_POST['nama_pelanggan'];
        $qty_input = $_POST['qty']; 
        $total_bayar = 0;

        echo "<h3>--- STRUK PEMBAYARAN ---</h3>";
        echo "Nama Pelanggan: <strong>" . $nama_pelanggan . "</strong><br><br>";

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><th>Menu</th><th>Harga</th><th>Qty</th><th>Subtotal</th></tr>";

        foreach ($qty_input as $id => $jumlah) {
            if ($jumlah > 0) {
                $menu_item = $data_menu_array[$id];
                $subtotal = $menu_item['harga'] * $jumlah;
                $total_bayar += $subtotal;

                echo "<tr>";
                echo "<td>" . $menu_item['nama'] . "</td>";
                echo "<td>Rp " . number_format($menu_item['harga']) . "</td>";
                echo "<td>" . $jumlah . "</td>";
                echo "<td>Rp " . number_format($subtotal) . "</td>";
                echo "</tr>";
            }
        }

        echo "<tr><td colspan='3' align='right'>TOTAL</td>";
        echo "<td>Rp " . number_format($total_bayar) . "</td></tr>";
        echo "</table>";
    }
    ?>

</body>

</html>