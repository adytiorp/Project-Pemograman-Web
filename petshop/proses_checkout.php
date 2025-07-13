<?php
header('Content-Type: application/json'); // penting agar return JSON

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $metode = $_POST['metode_pembayaran'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $cartData = json_decode($_POST['cart_data'], true);

    $conn = new mysqli("localhost", "root", "", "petshop_db");
    if ($conn->connect_error) {
        echo json_encode(["success" => false, "error" => "Koneksi gagal"]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO checkout (nama, email, alamat, telepon, metode_pembayaran) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama, $email, $alamat, $telepon, $metode);
    $stmt->execute();
    $checkout_id = $stmt->insert_id;
    $stmt->close();

    $stmt_item = $conn->prepare("INSERT INTO checkout_items (checkout_id, nama_produk, jumlah, harga_satuan) VALUES (?, ?, ?, ?)");
    foreach ($cartData as $item) {
        $nama_produk = $item['title']; // pastikan 'title', bukan 'name'
        $jumlah = $item['quantity'];
        $harga = $item['price'];
        $stmt_item->bind_param("isii", $checkout_id, $nama_produk, $jumlah, $harga);
        $stmt_item->execute();
    }
    $stmt_item->close();
    $conn->close();

    echo json_encode(["success" => true, "nama" => $nama]);
}
?>