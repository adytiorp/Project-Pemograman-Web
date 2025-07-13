<?php
$layanan = $_GET['layanan'] ?? 'Layanan';
$whatsapp = '62895609811704'; // Ganti dengan nomor WA tujuan
$pesan = urlencode("Halo, saya ingin memesan layanan *$layanan* untuk hewan peliharaan saya. Mohon informasi lebih lanjut.");
$link = "https://wa.me/$whatsapp?text=$pesan";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesan Layanan - <?= htmlspecialchars($layanan) ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container" style="padding: 50px; text-align: center;">
    <h1>Pesan Layanan: <?= htmlspecialchars($layanan) ?></h1>
    <p>Klik tombol di bawah untuk melanjutkan pemesanan melalui WhatsApp:</p>
    <a href="<?= $link ?>" class="btn" target="_blank" style="font-size: 18px; padding: 10px 20px; background: #25D366; color: white; text-decoration: none; border-radius: 8px;">
      Chat via WhatsApp
    </a>
    <br><br>
    <a href="index.php" style="color: #555;">← Kembali ke Beranda</a>
  </div>
</body>
</html>