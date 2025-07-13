<?php
session_start();

$cartData = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['cart_data'])) {
    $cartData = json_decode($_POST['cart_data'], true);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Pet's Home</title>
    <link rel="stylesheet" href="checkout.css">
</head>
<body>
    <div class="checkout-container">
        <h2>Checkout</h2>
        <form id="formCheckout" class="checkout-form" onsubmit="return submitCheckout(event)">
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Pengiriman:</label>
                <textarea id="alamat" name="alamat" required></textarea>
            </div>
            <div class="form-group">
                <label for="telepon">Nomor Telepon:</label>
                <input type="tel" id="telepon" name="telepon" required>
            </div>
            <div class="form-group">
                <label for="metode">Metode Pembayaran:</label>
                <select id="metode" name="metode_pembayaran" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="COD">Bayar di Tempat (COD)</option>
                    <option value="QRIS">QRIS</option>
                </select>
            </div>

            <h3>Ringkasan Pesanan</h3>
            <div class="order-summary">
                <?php
                $total = 0;
                if (!empty($cartData)) {
                    foreach ($cartData as $item) {
                        $name = htmlspecialchars($item['title']);
                        $qty = (int)$item['quantity'];
                        $price = (int)$item['price'];
                        $subtotal = $qty * $price;
                        $total += $subtotal;
                        echo "<p>$name - $qty x Rp" . number_format($price, 0, ',', '.') . " = Rp" . number_format($subtotal, 0, ',', '.') . "</p>";
                    }
                    echo "<p><strong>Total: Rp" . number_format($total, 0, ',', '.') . "</strong></p>";
                } else {
                    echo "<p>Keranjang kosong.</p>";
                }
                ?>
            </div>

            <input type="hidden" name="cart_data" value='<?= json_encode($cartData); ?>'>
            <button type="submit" class="checkout-button">Proses Checkout</button>
        </form>
    </div>

<script>
function submitCheckout(e) {
    e.preventDefault();

    const form = document.getElementById("formCheckout");
    const formData = new FormData(form);

    fetch("proses_checkout.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            document.getElementById("checkoutModalNama").textContent = data.nama;
            document.getElementById("checkoutSuccessModal").style.display = "flex";
        } else {
            alert("Gagal memproses: " + (data.error || "Unknown error"));
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("Terjadi kesalahan saat memproses pesanan.");
    });
}
</script>

<div id="checkoutSuccessModal" class="modal" style="display:none;">
  <div class="modal-content">
    <span class="close-btn" onclick="closeCheckoutModal()">&times;</span>
    <h2>Pesanan berhasil diproses!</h2>
    <p>Terima kasih, <strong id="checkoutModalNama"></strong>. Pesanan Anda telah dicatat.</p>
    <button onclick="window.location.href='index.php'" class="btn">Kembali ke Beranda</button>
  </div>
</div>

<style>
.modal {
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  z-index: 9999;
  left: 0; top: 0;
  width: 100%; height: 100%;
  background-color: rgba(0,0,0,0.6);
}
.modal-content {
  background-color: #fff;
  padding: 30px;
  border-radius: 8px;
  text-align: center;
  width: 400px;
}
.close-btn {
  float: right;
  font-size: 20px;
  cursor: pointer;
}
</style>

<script>
function closeCheckoutModal() {
  document.getElementById("checkoutSuccessModal").style.display = "none";
}
</script>

</body>
</html>