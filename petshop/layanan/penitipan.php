<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "Pelanggan";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesan Penitipan Hewan - Pet Shop</title>
  <link rel="stylesheet" href="../style.css">
  <style>
    <?php include '../layanan-style.css'; ?>
  </style>
</head>
<body>

<div class="layanan-detail">
  <img src="../image/penitipan.avif" alt="Penitipan Hewan">
  <h1>Pesan Penitipan Hewan</h1>
  <p>Layanan penitipan dengan fasilitas nyaman dan aman saat Anda harus meninggalkan hewan kesayangan Anda untuk sementara waktu.</p>

  <?php
    $pesan = urlencode("Halo Pet Shop,Saya $username ingin memesan layanan Penitipan Hewan.Mohon informasi lebih lanjut, terima kasih.");
    $link = "https://wa.me/62895609811704?text=$pesan";
  ?>
  <a href="<?= $link ?>" target="_blank" class="btn-wa">Pesan via WhatsApp</a>
</div>

</body>
</html>