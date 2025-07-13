<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "Pelanggan";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesan Grooming - Pet Shop</title>
  <link rel="stylesheet" href="../style.css">
  <style>
    <?php include '../layanan-style.css'; ?>
  </style>
</head>
<body>

<div class="layanan-detail">
  <img src="../image/grooming.avif" alt="Layanan Grooming">
  <h1>Pesan Layanan Grooming</h1>
  <p>Perawatan menyeluruh untuk hewan kesayangan Anda: mandi, potong kuku, dan styling bulu oleh staf profesional kami.</p>

  <?php
    $pesan = urlencode("Halo Pet Shop,Saya $username ingin memesan layanan Grooming untuk hewan peliharaan saya.Mohon informasi lebih lanjut, terima kasih.");
    $link = "https://wa.me/62895609811704?text=$pesan";
  ?>
  <a href="<?= $link ?>" target="_blank" class="btn-wa">Pesan via WhatsApp</a>
</div>

</body>
</html>