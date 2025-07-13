<?php
$conn = new mysqli("localhost", "root", "", "petshop_db");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Daftar Pesanan</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container">
    <h1 class="admin-title">Daftar Pesanan Pelanggan</h1>

<?php
$sql = "
    SELECT c.id AS order_id, c.nama, c.email, c.alamat, c.telepon, c.metode_pembayaran,
           i.nama_produk, i.jumlah, i.harga_satuan
    FROM checkout c
    JOIN checkout_items i ON c.id = i.checkout_id
    ORDER BY c.id DESC
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
$current_order = null;
$total = 0;

while ($row = $result->fetch_assoc()) {
    if ($current_order !== $row['order_id']) {
        if ($current_order !== null) {
            
            echo "<tr><td colspan='3' style='text-align:right; font-weight:bold;'>Total</td><td>Rp" . number_format($total, 0, ',', '.') . "</td></tr>";
            echo "</tbody></table></div>"; 
        }

        $total = 0;
        echo "<div class='order-card'>";
        echo "<h3>Pesanan dari: " . htmlspecialchars($row['nama']) . " (" . htmlspecialchars($row['email']) . ")</h3>";
        echo "<p class='order-info'>Alamat: " . htmlspecialchars($row['alamat']) . " | Telepon: " . htmlspecialchars($row['telepon']) . " | Metode: " . htmlspecialchars($row['metode_pembayaran']) . "</p>";
        echo "<table class='order-table'>";
        echo "<thead><tr><th>Produk</th><th>Jumlah</th><th>Harga Satuan</th><th>Subtotal</th></tr></thead><tbody>";

        $current_order = $row['order_id'];
    }

    $nama_produk = htmlspecialchars($row['nama_produk']);
    $jumlah = (int)$row['jumlah'];
    $harga = (int)$row['harga_satuan'];
    $subtotal = $jumlah * $harga;
    $total += $subtotal;

    echo "<tr>
            <td>{$nama_produk}</td>
            <td>{$jumlah}</td>
            <td>Rp" . number_format($harga, 0, ',', '.') . "</td>
            <td>Rp" . number_format($subtotal, 0, ',', '.') . "</td>
          </tr>";
}


if ($current_order !== null) {
    echo "<tr><td colspan='3' style='text-align:right; font-weight:bold;'>Total</td><td>Rp" . number_format($total, 0, ',', '.') . "</td></tr>";
    echo "</tbody></table></div>";
}
} else {
    echo "<p>Tidak ada pesanan.</p>";
}

$conn->close();
?>
</div>
</body>
</html>