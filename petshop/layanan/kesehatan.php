<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "Pelanggan";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesan Pemeriksaan Kesehatan - Pet Shop</title>
  <link rel="stylesheet" href="../style.css">
  <style>
    <?php include '../layanan-style.css'; ?>
  </style>
</head>
<body>

<div class="layanan-detail">
  <img src="../image/medicine.avif" alt="Pemeriksaan Kesehatan">
  <h1>Pesan Pemeriksaan Kesehatan</h1>
  <p>Pemeriksaan menyeluruh oleh dokter hewan profesional. Pastikan hewan kesayangan Anda dalam kondisi sehat dan bahagia.</p>

  <?php
    $pesan = urlencode("Halo Pet Shop,Saya $username ingin memesan layanan Pemeriksaan Kesehatan.Mohon informasi lebih lanjut, terima kasih.");
    $link = "https://wa.me/62895609811704?text=$pesan";
  ?>
  <a href="<?= $link ?>" target="_blank" class="btn-wa">Pesan via WhatsApp</a>
</div>

</body>
</html>