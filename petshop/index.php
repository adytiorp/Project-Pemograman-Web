
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200..700&display=swap" rel="stylesheet">
</head>

<body>

<div class="header">
<div class="container">
    <div class="navbar">
        <div class="logo">
            <img src="logo/logo2.png" width="30px" height="30px">
        </div>
        <div class="user-info">
            <?php if (isset($_SESSION['username'])): ?>
                <div class="user-icon">
                    <img src="logo/account.svg" alt="Akun" width="30px" height="30px">
                    <div class="username"><?= htmlspecialchars($_SESSION['username']) ?></div>
                </div>
            <?php else: ?>
                <div class="user-icon" onclick="openAccountModal()" style="cursor:pointer">
                    <img src="logo/account.svg" alt="Akun" width="30px" height="30px">
                    <div class="username">Login</div>
                </div>
            <?php endif; ?>
            
        </div>
        <nav>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="#produk">Products</a></li>
                <li><a href="#" onclick="openContactModal()">Callcenter</a></li>
                <li><a href="#" onclick="openAccountModal()">Account</a></li>
                <li><a href="#" onclick="openAboutModal()">About</a></li>
                <li><a href="#layanan">Services</a></li>
            </ul>
        </nav>

        <div class ="nav-right">
          <div class="menu-toggle" onclick="toggleMenu()">
            &#9776; 
          </div>
          <?php if (isset($_SESSION['username'])): ?>
            <img src="image/cart.png" width="30px" height="30px" onclick="openCartModal()" style="cursor: pointer;">
          <?php else: ?>
            <img src="image/cart.png" width="30px" height="30px" onclick="openAccountModal(); alert('Silakan login terlebih dahulu untuk membuka keranjang.')" style="cursor: pointer;">
          <?php endif; ?>
        </div>
         
    </div>
    <div class="row">
        <div class="col-2">
            <?php if (isset($_SESSION['username'])): ?>
                <h1>Halo, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
                <p>Selamat datang kembali di Pet's Home.</p>
                <p>Kami senang melihatmu lagi! 🐾</p>
                <p>Banyak hal menyenangkan untukmu dan hewan peliharaanmu</p>
                <p>Enjoy!!</p>
                <a href="logout.php" class="btn logout-btn">Logout</a>
            <?php else: ?>
                <h1>Let's Make Our Pets<br> Happy!</h1>
                <p>Kami hadir,</p>
                  <p>membantu anda merawat hewan peliharaan kesayangan anda. Dengan berbagai produk dan layanan yang kami sediakan kami harap kami dapat membantu anda dalam merawat hewan peliharaan anda.</p>
                <a href="#" class="btn" onclick="openAccountModal()">Kunjungi Kami &#10139;</a>
            <?php endif; ?>
        </div>
    </div>
</div> 
</div>   

<div class="categories">
  <div class="small-container">
    <h4 class="section-title">"Hewan peliharaan Anda layak mendapatkan yang terbaik. Di sini, kami menyediakan berbagai kebutuhan mereka dengan penuh cinta dan perhatian, karena bagi kami, mereka bukan sekadar hewan — mereka adalah keluarga."</h4>
    <div class="category-grid">
      <div class="category-card" onclick="scrollToProduk()">
        <img src="image/col2.avif" alt="Produk">
        <h3>Produk</h3>
      </div>
      <div class="category-card" onclick="scrollToLayanan()">
        <img src="image/service.jpg" alt="Layanan">
        <h3>Layanan</h3>
      </div>
      <div class="category-card" onclick="scrollToInformasi()">
        <img src="image/info.jpg" alt="Informasi">
        <h3>Informasi</h3>
      </div>
    </div>
  </div>
</div>
<div id="accountModal" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeAccountModal()">&times;</span>
    
    <div class="tab-menu">
      <button class="tab-btn active" onclick="showTab('login')">Login</button>
      <button class="tab-btn" onclick="showTab('register')">Daftar</button>
    </div>

    <div id="loginTab" class="tab-content">
      <h2>Login Akun</h2>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>

    <div id="registerTab" class="tab-content" style="display: none;">
      <h2>Daftar Akun Baru</h2>
      <form action ="register.php" method="post">
        <input type="text" name="username" placeholder="Username" >
        <input type="email" name="email" placeholder="Email" >
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="submit">Daftar</button>
      </form>
    </div>
  </div>
</div>

<script>
  function openAccountModal() {
    document.getElementById("accountModal").style.display = "block";
    showTab('login'); 
  }

  function closeAccountModal() {
    document.getElementById("accountModal").style.display = "none";
  }

  function showTab(tabName) {
    document.getElementById("loginTab").style.display = tabName === "login" ? "block" : "none";
    document.getElementById("registerTab").style.display = tabName === "register" ? "block" : "none";

    document.querySelectorAll(".tab-btn").forEach(btn => btn.classList.remove("active"));
    document.querySelector(`.tab-btn[onclick="showTab('${tabName}')"]`).classList.add("active");
  }

  window.onclick = function(event) {
    const modal = document.getElementById("accountModal");
    if (event.target === modal) {
      closeAccountModal();
    }
  }

</script>

<div id="contactModal" class="modal">
  <div class="modal-content contact">
    <span class="close-btn" onclick="closeContactModal()">&times;</span>
    <h2>Hubungi Kami</h2>
    <div class="contact-info">
      <p><strong>📞 Telepon:</strong> 021-12345678</p>
      <p><strong>✉️ Email:</strong> support@petshop.com</p>
      <p><strong>📍 Alamat:</strong> Jl. Contoh No.123, Jakarta</p>
      <p><strong>🕘 Jam Operasional:</strong> Senin - Sabtu, 08.00 - 17.00</p>
    </div>
  </div>
</div>

<script>
function openContactModal() {
  document.getElementById("contactModal").style.display = "block";
}

function closeContactModal() {
  document.getElementById("contactModal").style.display = "none";
}

window.onclick = function(event) {
  const modal = document.getElementById("contactModal");
  if (event.target === modal) {
    closeContactModal();
  }
}
</script>

<section class="products" id="produk">
  <div class="container">
    <h2 class="section-title">Produk Kami</h2>
    <div class="product-grid">
      <div class="product-card">
        <img src="image/wear.avif" alt="Baju Hewan">
        <h3>Baju Hewan</h3>
        <p class="price">Rp 45.000</p>
        <button class="btn-cart" data-index="0">Tambah ke Keranjang</button>
      </div>

      <div class="product-card">
        <img src="image/food.avif" alt="Makanan Kucing">
        <h3>Makanan Kucing</h3>
        <p class="price">Rp 85.000</p>
        <button class="btn-cart" data-index="1">Tambah ke Keranjang</button>
      </div>

      <div class="product-card">
        <img src="image/bowl.avif" alt="Mangkok Makan">
        <h3>Mangkok Makan</h3>
        <p class="price">Rp 30.000</p>
        <button class="btn-cart" data-index="2">Tambah ke Keranjang</button>
      </div>

      <div class="product-card">
        <img src="image/necklace.avif" alt="Kalung Hewan">
        <h3>Kalung Hewan</h3>
        <p class="price">Rp 25.000</p>
        <button class="btn-cart" data-index="3">Tambah ke Keranjang</button>
      </div>

      <div class="product-card">
        <img src="image/obat.avif" alt="Vitamin Hewan">
        <h3>Vitamin Hewan</h3>
        <p class="price">Rp 60.000</p>
        <button class="btn-cart" data-index="4">Tambah ke Keranjang</button>
      </div>

      <div class="product-card">
        <img src="image/cage.avif" alt="Kandang Kucing">
        <h3>Kandang Kucing</h3>
        <p class="price">Rp 200.000</p>
        <button class="btn-cart" data-index="4">Tambah ke Keranjang</button>
      </div>

      <div class="product-card">
        <img src="image/shampoo.avif" alt="Shampoo Hewan">
        <h3>Shampoo Hewan</h3>
        <p class="price">Rp 75.000</p>
        <button class="btn-cart" data-index="4">Tambah ke Keranjang</button>
      </div>

       <div class="product-card">
        <img src="image/tempatikan.avif" alt="Aquarium Mini">
        <h3>Aquarium Mini</h3>
        <p class="price">Rp 55.000</p>
        <button class="btn-cart" data-index="4">Tambah ke Keranjang</button>
      </div>

       <div class="product-card">
        <img src="image/kandanghamster.avif" alt="Kandang Hamster">
        <h3>Kandang Hamster</h3>
        <p class="price">Rp 100.000</p>
        <button class="btn-cart" data-index="4">Tambah ke Keranjang</button>
      </div>

       <div class="product-card">
        <img src="image/snack.avif" alt="Snack Tuna">
        <h3>Snack Tuna</h3>
        <p class="price">Rp 50.000</p>
        <button class="btn-cart" data-index="4">Tambah ke Keranjang</button>
      </div>

      <div class="product-card">
        <img src="image/kasur.avif" alt="Sofa Hewan">
        <h3>Sofa Hewan</h3>
        <p class="price">Rp 125.000</p>
        <button class="btn-cart" data-index="4">Tambah ke Keranjang</button>
      </div>

      <div class="product-card">
        <img src="image/birdcage.avif" alt="Kandang Burung">
        <h3>Kandang Burung</h3>
        <p class="price">Rp 100.000</p>
        <button class="btn-cart" data-index="4">Tambah ke Keranjang</button>
      </div>

      <div class="product-card">
        <img src="image/rabbitfood.avif" alt="Makanan Kelinci">
        <h3>Makanan Kelinci</h3>
        <p class="price">Rp 60.000</p>
        <button class="btn-cart" data-index="4">Tambah ke Keranjang</button>
      </div>

      <div class="product-card">
        <img src="image/tas.avif" alt="Tas Kucing">
        <h3>Tas Kucing</h3>
        <p class="price">Rp 130.000</p>
        <button class="btn-cart" data-index="4">Tambah ke Keranjang</button>
      </div>

      <div class="product-card">
        <img src="image/fishfood.avif" alt="Makanan Ikan">
        <h3>Makanan Ikan</h3>
        <p class="price">Rp 53.000</p>
        <button class="btn-cart" data-index="4">Tambah ke Keranjang</button>
      </div>

      <div style="text-align: center; margin-top: 20px;">
        <button id="showMoreBtn" class="btn" onclick="showAllProducts()">Lihat Semua Produk</button>
      </div>

    </div>
  </div>
</section>

<div id="productModal" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeProductModal()">&times;</span>
    <div class="product-detail">
      <img id="productModalImage" src="" alt="Produk">
      <div class="product-info">
        <h2 id="productModalTitle">Nama Produk</h2>
        <p id="productModalPrice">Rp 0</p>
        <p id="productModalDescription">Deskripsi produk...</p>
        <div class="quantity-control">
          <button onclick="changeQuantity(-1)">−</button>
          <input type="number" id="productQuantity" value="1" min="1" readonly />
          <button onclick="changeQuantity(1)">+</button>
        </div>

        <button class="btn-cart" onclick="confirmAddToCart()">Tambah ke Keranjang</button>
      </div>
    </div>
  </div>
</div>

<div id="cartModal" class="modal">
  <div class="modal-content cart">
    <span class="close-btn" onclick="closeCartModal()">&times;</span>
    <h2>Keranjang Belanja</h2>
    <div id="cartItems"></div>
    <div class="cart-total">
      <strong>Total: Rp <span id="cartTotal">0</span></strong>
    </div>
    <div class="checkout-btn-wrapper" style="margin-top: 15px; text-align: right;">
      <form id="checkout-form" action="checkout.php" method="POST">
        <input type="hidden" name="cart_data" id="cart-data">
        <button type="submit" onclick="prepareCheckout()">Checkout</button>
      </form>
    </div>
  </div>
</div>

<script>
let cart = [];
function openCartModal() {
  renderCart();
  document.getElementById("cartModal").style.display = "block";
}

function prepareCheckout() {
    const cartDataInput = document.getElementById("cart-data");
    cartDataInput.value = JSON.stringify(cart); 
    return true;
}

function closeCartModal() {
  document.getElementById("cartModal").style.display = "none";
}

function addToCart(index, quantity = 1) {
  const product = productData[index];
  const existing = cart.find(item => item.title === product.title);

  if (existing) {
    existing.quantity += quantity;
  } else {
    cart.push({
      title: product.title,
      price: product.price,
      image: product.image,
      quantity: quantity
    });
  }

  alert(`${quantity}x ${product.title} ditambahkan ke keranjang.`);
}

function renderCart() {
  const cartItems = document.getElementById("cartItems");
  cartItems.innerHTML = "";

  let total = 0;

  cart.forEach((item, i) => {
    const itemTotal = item.price * item.quantity;
    total += itemTotal;

    const div = document.createElement("div");
    div.className = "cart-item";
    div.innerHTML = `
      <div style="display: flex; align-items: center;">
        <img src="${item.image}" alt="${item.title}">
        <span>${item.title} (${item.quantity}x)</span>
      </div>
      <div>
        Rp ${itemTotal.toLocaleString()} 
        <button onclick="removeFromCart(${i})" style="margin-left:10px;">❌</button>
      </div>
    `;

    cartItems.appendChild(div);
  });

  document.getElementById("cartTotal").textContent = total.toLocaleString();
}

function removeFromCart(index) {
  cart.splice(index, 1);
  renderCart();
}
</script>



<section class="services" id="layanan">
  <div class="container">
    <h2 class="section-title">Layanan Kami</h2>
    <div class="service-grid">
      <a href="layanan/grooming.php" class="service-card">
        <img src="image/grooming.avif" alt="Grooming">
        <h3>Grooming</h3>
        <p>Perawatan lengkap untuk hewan kesayangan Anda.</p>
      </a>

      <a href="layanan/kesehatan.php" class="service-card">
        <img src="image/medicine.avif" alt="Pemeriksaan Kesehatan">
        <h3>Pemeriksaan Kesehatan</h3>
        <p>Didukung dokter hewan berpengalaman untuk memastikan hewan Anda sehat.</p>
      </a>

      <a href="layanan/penitipan.php" class="service-card">
        <img src="image/penitipan.avif" alt="Penitipan Hewan">
        <h3>Penitipan Hewan</h3>
        <p>Tempat aman dan nyaman saat Anda bepergian.</p>
      </a>
    </div>
  </div>
</section>

<section class="pet-gallery-section" id="informasi">
  <div class="small-container">
    <h2 class="section-title">Kenali Hewan Peliharaan</h2>
    
    <div class="pet-scroll-wrapper">
      <div class="pet-scroll">
        <div class="pet-card" onclick="showPetModal('cat')">🐱<p>Kucing</p></div>
        <div class="pet-card" onclick="showPetModal('dog')">🐶<p>Anjing</p></div>
        <div class="pet-card" onclick="showPetModal('rabbit')">🐰<p>Kelinci</p></div>
        <div class="pet-card" onclick="showPetModal('bird')">🐦<p>Burung</p></div>
        <div class="pet-card" onclick="showPetModal('hamster')">🐹<p>Hamster</p></div>
        <div class="pet-card" onclick="showPetModal('fish')">🐟<p>Ikan</p></div>
      </div>
    </div>
  </div>
</section>


<div id="petModal" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closePetModal()">&times;</span>
    
    <div class="slider-container">
      <div class="slider" id="petSlider">
        
      </div>
      <button class="slide-btn left" onclick="slide(-1)">&#10094;</button>
      <button class="slide-btn right" onclick="slide(1)">&#10095;</button>
    </div>

    <div class="pet-description">
      <h3 id="petTitle">Judul Hewan</h3>
      <p id="petDescription">Deskripsi hewan akan muncul di sini.</p>
    </div>
  </div>
</div>

<div id="aboutModal" class="modal">
  <div class="modal-content about">
    <span class="close-btn" onclick="closeAboutModal()">&times;</span>
    <h2>Tentang Pet's Home</h2>
    <p>
      Pet’s Home adalah toko hewan peliharaan yang menyediakan produk berkualitas dan layanan terbaik bagi pecinta hewan. Sejak berdiri pada tahun 2020, kami telah membantu ribuan pelanggan memenuhi kebutuhan hewan kesayangan mereka.
    </p>
    <p>
      Misi kami adalah menjadi mitra terpercaya dalam perawatan hewan, dengan layanan mulai dari produk makanan, aksesoris, hingga grooming dan penitipan hewan. Kami percaya bahwa hewan peliharaan adalah bagian dari keluarga, dan mereka layak mendapatkan yang terbaik.
    </p>
  </div>
</div>

<script>
  function openAboutModal() {
    document.getElementById("aboutModal").style.display = "block";
  }

  function closeAboutModal() {
    document.getElementById("aboutModal").style.display = "none";
  }
</script>

<footer class="footer">
  <div class="container footer-container">
    <div class="footer-section">
      <h3>Pet Shop</h3>
      <p>Kami hadir untuk membantu Anda merawat hewan peliharaan dengan sepenuh hati.</p>
    </div>
    
    <div class="footer-section">
      <h4>Menu</h4>
      <ul>
        <li><a href="#" onclick="scrollToTop()">Home</a></li>
        <li><a href="#" onclick="scrollToProduk()">Produk</a></li>
        <li><a href="#" onclick="scrollToLayanan()">Layanan</a></li>
        <li><a href="#" onclick="scrollToInformasi()">Informasi</a></li>
        <li><a href="#">About</a></li>
      </ul>
    </div>
    
    <div class="footer-section">
      <h4>Hubungi Kami</h4>
      <p>📞 021-12345678</p>
      <p>✉️ petshome@gmail.com</p>
      <p>📍 Perum Villa Muka Kuning Blok.C4 No.10, Batam</p>
      <div class="footer-section">
        <h4>Ikuti Kami</h4>
         <div class="social-icons">
          <a href="https://facebook.com" target="_blank" aria-label="Facebook"><img src="logo/facebook.svg" alt="Facebook"></a>
          <a href="https://instagram.com" target="_blank" aria-label="Instagram"><img src="logo/instagram.svg" alt="Instagram"></a>
          <a href="https://twitter.com" target="_blank" aria-label="Twitter"><img src="logo/x.svg" alt="Twitter"></a>
          </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; 2025 Pet Shop. All rights reserved.</p>
  </div>
</footer>

<script>
const petInfo = {
  cat: {
  title: "Kucing",
  desc: `
<b>Berikut adalah beberapa hal yang perlu dipertimbangkan sebelum memelihara kucing:</b><br><br>

<b>1. Komitmen Waktu dan Biaya:</b><br>
- Memberi makan, membersihkan litter box, bermain, dan merawat bulu kucing membutuhkan waktu setiap hari.<br>
- Biaya makanan, pasir, perlengkapan perawatan, vaksinasi, dan biaya medis jika sakit bisa menjadi pengeluaran rutin.<br><br>

<b>2. Kebutuhan Dasar Kucing:</b><br>
- <b>Makanan:</b> Kucing adalah karnivora, jadi makanan yang mengandung protein tinggi sangat penting.<br>
- <b>Tempat tinggal:</b> Sediakan tempat tidur yang nyaman dan aman, serta litter box yang bersih.<br>
- <b>Kesehatan:</b> Vaksinasi, obat cacing, dan perawatan kesehatan secara rutin sangat penting untuk menjaga kesehatan kucing.<br><br>

<b>3. Interaksi dan Sosialisasi:</b><br>
- <b>Dengan manusia:</b> Kucing membutuhkan perhatian dan interaksi sosial dengan pemiliknya.<br>
- <b>Dengan hewan lain:</b> Perhatikan bagaimana kucing baru akan berinteraksi dengan hewan peliharaan lain.<br>
- <b>Karakter:</b> Setiap kucing memiliki kepribadian berbeda. Pertimbangkan sebelum memilih.<br><br>

<b>4. Persiapan Lingkungan:</b><br>
- <b>Rumah aman:</b> Jauhkan kabel listrik, racun, dan benda tajam dari jangkauan.<br>
- <b>Kenyamanan:</b> Sediakan ruang istirahat dan bermain yang nyaman.<br><br>

<b>5. Toksoplasmosis (Peringatan untuk Wanita Hamil):</b><br>
- <b>Risiko:</b> Wanita hamil berisiko tertular dari kotoran kucing.<br>
- <b>Pencegahan:</b> Jaga kebersihan litter box, hindari kontak langsung, dan periksakan kucing secara rutin.<br><br>

<b>6. Fakta Menarik tentang Kucing:</b><br>
- Kucing adalah makhluk pembersih, mereka sering merawat diri sendiri.<br>
- Pendengaran mereka tajam dan bisa memutar telinga untuk mendeteksi suara.<br>
- Kucing aktif saat fajar dan senja (nokturnal).<br><br>

Dengan mempertimbangkan hal-hal di atas, Anda bisa membuat keputusan yang tepat sebelum memelihara kucing.
`,
  images: ["image/kucing/cat1.avif", "image/kucing/cat2.avif", "image/kucing/cat3.avif", "image/kucing/cat4.avif", "image/kucing/cat5.avif"]
},
 dog: {
  title: "Anjing",
  desc: `
<b>Berikut beberapa hal yang perlu diperhatikan sebelum memelihara anjing:</b><br><br>

<b>1. Pertimbangan Biaya:</b><br>
- <b>Biaya Awal:</b> Kandang, tempat tidur, makanan, mainan, peralatan grooming, vaksinasi, dan biaya adopsi/pembelian.<br>
- <b>Biaya Bulanan:</b> Makanan, perlengkapan, kesehatan (vaksin, obat cacing), dan biaya tak terduga.<br>
- <b>Biaya Jangka Panjang:</b> Perawatan penyakit serius & pemakaman.<br><br>

<b>2. Komitmen Waktu:</b><br>
- Pelatihan: Melatih anjing agar patuh butuh waktu.<br>
- Perawatan: Memberi makan, memandikan, membersihkan.<br>
- Bermain: Anjing perlu aktivitas harian.<br>
- Perhatian: Anjing butuh kasih sayang & interaksi.<br><br>

<b>3. Ruang dan Lingkungan:</b><br>
- Tempat tidur & kandang yang nyaman.<br>
- Area bermain yang cukup luas.<br>
- Rumah aman dari bahaya.<br><br>

<b>4. Kebutuhan Khusus:</b><br>
- <b>Ras:</b> Ras tertentu butuh perawatan/olahraga lebih.<br>
- <b>Usia:</b> Anjing tua butuh perhatian khusus.<br>
- <b>Kesehatan:</b> Pertimbangkan kondisi fisik anjing.<br><br>

<b>5. Vaksin & Kesehatan:</b><br>
- Vaksin penting untuk cegah penyakit.<br>
- Pemeriksaan rutin ke dokter hewan.<br>
- Kebersihan gigi juga perlu dijaga.<br><br>

<b>6. Grooming & Perawatan:</b><br>
- Mandikan sesuai jenis bulu.<br>
- Sikat bulu secara rutin.<br>
- Potong kuku secara teratur.<br><br>

<b>7. Kehidupan Sosial:</b><br>
- Butuh sosialisasi dengan manusia.<br>
- Perkenalkan sejak kecil ke anjing lain.<br><br>

Dengan persiapan yang matang dan komitmen, hubungan bahagia dan sehat dengan anjing bisa tercipta.
`,
  images: [
    "image/anjing/dog1.avif",
    "image/anjing/dog2.avif",
    "image/anjing/dog3.avif",
    "image/anjing/dog4.avif",
    "image/anjing/dog5.avif"
  ]
},
 rabbit: {
  title: "Kelinci",
  desc: `
<b>1. Kebutuhan Dasar Kelinci:</b><br><br>

<b>Kandang:</b> Kelinci membutuhkan kandang yang cukup luas agar bisa bergerak bebas, melompat, dan bermain. Pastikan kandang memiliki alas yang nyaman dan mudah dibersihkan.<br>
<b>Makanan:</b> Berikan hay (jerami) sebagai makanan utama, ditambah sayuran segar dan pelet khusus kelinci. Hindari terlalu banyak wortel karena mengandung gula tinggi.<br>
<b>Air:</b> Kelinci harus selalu memiliki akses ke air bersih dan segar.<br>
<b>Kebersihan:</b> Kandang harus dibersihkan secara rutin untuk mencegah penyakit. Bersihkan alas kandang, area makan, dan minum secara teratur.<br><br>

<b>2. Perilaku dan Sifat Kelinci:</b><br>
- <b>Gigi Tumbuh Terus:</b> Sediakan mainan kunyah untuk mengikis gigi mereka.<br>
- <b>Sistem Pencernaan Sensitif:</b> Hindari makanan yang bisa mengganggu pencernaan.<br>
- <b>Interaksi Sosial:</b> Kelinci butuh waktu bermain dan berinteraksi, baik dengan manusia atau kelinci lain.<br>
- <b>Perilaku Unik:</b> Mereka suka menggali, menandai wilayah dengan dagu, melompat, dan berdiri.<br><br>

<b3. >Hal Lain yang Perlu Diperhatikan:</b><br>
- <b>Kesehatan:</b> Periksa rutin ke dokter hewan.<br>
- <b>Kebutuhan Ruang:</b> Kelinci butuh ruang yang cukup meskipun tubuhnya kecil.<br>
- <b>Peran dalam Keluarga:</b> Kelinci bisa jadi hewan peliharaan yang menyenangkan dan mengurangi stres.<br>
- <b>Komitmen:</b> Butuh perhatian, waktu, dan biaya untuk makanan, kandang, dan perawatan.<br><br>

Dengan memahami kebutuhan dan sifat kelinci, Anda bisa merawatnya dengan baik dan membuat mereka bahagia serta sehat.
`,
  images: [
    "image/kelinci/rabbit1.avif",
    "image/kelinci/rabbit2.avif",
    "image/kelinci/rabbit3.avif",
    "image/kelinci/rabbit4.avif",
    "image/kelinci/rabbit5.avif"
  ]
},
 bird: {
  title: "Burung",
  desc: `
<b>1. Fakta-fakta penting saat ingin memelihara burung:</b><br><br>

<b>Kebutuhan Kandang:</b> Burung membutuhkan kandang yang luas dan nyaman, dengan tempat bertengger yang sesuai serta tempat makan dan minum yang mudah dijangkau.<br>
<b>Nutrisi yang Seimbang:</b> Makanan burung harus bervariasi dan mengandung nutrisi lengkap, seperti biji-bijian, buah, sayuran, dan makanan tambahan seperti pelet.<br>
<b>Kebersihan Kandang:</b> Bersihkan kandang secara rutin untuk mencegah penyakit dan menjaga kebersihan.<br>
<b>Perawatan Kesehatan:</b> Burung memerlukan pemeriksaan dokter hewan, pemotongan kuku, dan perawatan bulu.<br>
<b>Interaksi dan Stimulasi:</b> Burung membutuhkan interaksi sosial dan mental dari pemilik serta mainan di kandang.<br>
<b>Memilih Jenis Burung:</b> Beberapa burung seperti kenari lebih mudah dirawat dibandingkan burung beo yang lebih kompleks.<br>
<b>Manfaat Psikologis:</b> Memelihara burung dapat memberikan rasa tenang dan mengurangi stres.<br>
<b>Potensi Alergi:</b> Debu dan bulu burung bisa memicu alergi pada sebagian orang.<br><br>

<b>2. Hal-hal yang perlu dipertimbangkan sebelum memelihara burung:</b><br>
- <b>Penelitian:</b> Pelajari kebutuhan makanan, perawatan, dan perilaku burung yang ingin dipelihara.<br>
- <b>Biaya:</b> Siapkan dana untuk kandang, makanan, perawatan, dan dokter hewan.<br>
- <b>Tempat:</b> Sediakan tempat yang cukup luas dan aman untuk kandang burung.<br>
- <b>Lingkungan:</b> Hindarkan dari hewan peliharaan lain atau benda berbahaya di sekitar kandang.<br>
- <b>Komitmen Jangka Panjang:</b> Banyak burung memiliki umur panjang, jadi pastikan siap berkomitmen merawat dalam waktu lama.<br><br>

Dengan perawatan dan komitmen yang tepat, burung bisa menjadi teman yang menyenangkan dan membawa ketenangan dalam rumah Anda.
`,
  images: [
    "image/burung/bird1.avif",
    "image/burung/bird2.avif",
    "image/burung/bird3.avif",
    "image/burung/bird4.avif",
    "image/burung/bird5.avif"
  ]
},
  hamster: {
  title: "Hamster",
  desc: `
<b>Berikut adalah beberapa fakta penting yang perlu diketahui sebelum memelihara hamster:</b><br><br>

<b>1. Kandang yang Sesuai:</b><br>
Hamster membutuhkan kandang yang cukup luas agar bisa bergerak bebas dan berolahraga. Pastikan kandang memiliki tempat persembunyian, alat minum, tempat makan, dan mainan.<br><br>

<b>2. Pembersihan Kandang:</b><br>
Bersihkan kandang secara rutin. Ganti pasir, buang sisa makanan, dan bersihkan kotoran untuk mencegah penyakit.<br><br>

<b>3. Makanan dan Minuman:</b><br>
Berikan makanan seimbang khusus hamster dan air bersih. Hindari makanan berbahaya seperti cokelat atau bawang.<br><br>

<b>4. Perawatan Kesehatan:</b><br>
Hamster umumnya merawat dirinya sendiri, namun jika ada gigi tumbuh berlebihan atau penyakit lain, segera konsultasikan ke dokter hewan.<br><br>

<b>5. Sifat dan Perilaku:</b><br>
Hamster adalah hewan nokturnal (aktif di malam hari) dan menyendiri. Mereka suka menimbun makanan di sarangnya.<br><br>

<b>6. Interaksi dengan Manusia:</b><br>
Hamster bisa dilatih dengan pendekatan lembut dan hadiah seperti camilan. Hindari memaksa jika mereka sedang tidak ingin berinteraksi.<br><br>

<b>7. Umur Hamster:</b><br>
Hamster memiliki umur pendek, rata-rata hanya sekitar 2–3 tahun.<br><br>

<b>8. Penyakit:</b><br>
Beberapa penyakit hamster bisa menular ke manusia, seperti Lymphocytic Choriomeningitis (LCMV).<br><br>

<b>9. Perlindungan dari Predator:</b><br>
Tempatkan kandang hamster di area yang aman dari hewan peliharaan lain seperti kucing atau anjing.<br><br>

<b>10. Perhatikan Perilaku:</b><br>
Jika hamster tampak gelisah, agresif, atau membangun sarang, bisa jadi itu tanda-tanda akan melahirkan atau stres.<br><br>

Dengan memahami fakta-fakta ini, Anda bisa memberikan lingkungan yang aman dan nyaman untuk hamster peliharaan Anda.
`,
  images: [
    "image/hamster/hamster1.avif",
    "image/hamster/hamster2.avif",
    "image/hamster/hamster3.avif",
    "image/hamster/hamster4.avif",
    "image/hamster/hamster5.avif"
  ]
},
  fish: {
  title: "Ikan",
  desc: `
<b>Berikut adalah beberapa poin penting yang perlu diperhatikan sebelum memelihara ikan:</b><br><br>

<b>1. Pilih Jenis Ikan yang Tepat:</b><br>
- <b>Kenali Karakteristik Ikan:</b> Setiap jenis ikan memiliki kebutuhan yang berbeda terkait suhu air, pH, dan makanan.<br>
- <b>Air Tawar atau Air Laut:</b> Pilih jenis ikan sesuai dengan jenis air yang Anda siapkan.<br>
- <b>Ukuran Ikan:</b> Sesuaikan ukuran akuarium dengan ukuran ikan saat ini dan saat mereka tumbuh dewasa.<br>
- <b>Sifat Ikan:</b> Beberapa ikan agresif dan bisa menyerang ikan lain, jadi perhatikan kombinasi jenis ikan dalam satu akuarium.<br><br>

<b>2. Siapkan Akuarium dan Perlengkapannya:</b><br>
- <b>Ukuran Akuarium:</b> Pilih akuarium yang cukup besar agar ikan bisa berenang bebas.<br>
- <b>Filter dan Aerasi:</b> Gunakan filter dan aerator untuk menjaga air tetap bersih dan beroksigen.<br>
- <b>Suhu dan pH Air:</b> Sesuaikan suhu dan pH air dengan kebutuhan ikan.<br>
- <b>Substrat dan Dekorasi:</b> Tambahkan pasir, batu, dan tanaman air untuk estetika dan tempat persembunyian.<br>
- <b>Cahaya:</b> Gunakan pencahayaan yang sesuai, tetapi hindari sinar matahari langsung untuk mencegah tumbuhnya alga.<br><br>

<b>3. Perawatan Ikan:</b><br>
- <b>Pakan yang Tepat:</b> Berikan makanan khusus sesuai dengan jenis ikan, jangan berlebihan.<br>
- <b>Penggantian Air:</b> Ganti sebagian air secara berkala untuk menjaga kualitas air.<br>
- <b>Kebersihan Akuarium:</b> Bersihkan akuarium, filter, dan substrat secara rutin.<br>
- <b>Kesehatan Ikan:</b> Amati perilaku dan kondisi fisik ikan, segera tangani jika sakit.<br>
- <b>Adaptasi Ikan Baru:</b> Saat memasukkan ikan baru, biarkan beradaptasi secara perlahan ke suhu dan kondisi air akuarium.<br><br>

<b>4. Manfaat Memelihara Ikan:</b><br>
- <b>Mengurangi Stres:</b> Melihat ikan berenang dapat memberikan efek menenangkan.<br>
- <b>Meningkatkan Fokus:</b> Dapat membantu meningkatkan konsentrasi.<br>
- <b>Menurunkan Tekanan Darah:</b> Interaksi visual dengan ikan dipercaya dapat menurunkan tekanan darah.<br>
- <b>Menambah Keindahan Ruangan:</b> Akuarium mempercantik ruangan dan menambah nilai estetika.<br><br>

Dengan perawatan yang tepat, memelihara ikan bisa menjadi hobi yang menyenangkan sekaligus menenangkan.
`,
  images: [
    "image/ikan/fish1.avif",
    "image/ikan/fish2.avif",
    "image/ikan/fish3.avif",
    "image/ikan/fish4.avif",
    "image/ikan/fish5.avif"
  ]
},
};

let currentSlide = 0;

function showPetModal(pet) {
  const data = petInfo[pet];
  const slider = document.getElementById("petSlider");
  slider.innerHTML = data.images.map(src => `<img src="${src}" alt="${data.title}">`).join('');
  document.getElementById("petTitle").textContent = data.title;
  document.getElementById("petDescription").innerHTML = data.desc;
  document.getElementById("petModal").style.display = "flex";
  currentSlide = 0;
  updateSlider();
}

function closePetModal() {
  document.getElementById("petModal").style.display = "none";
}

function slide(dir) {
  const slides = document.querySelectorAll("#petSlider img");
  currentSlide = (currentSlide + dir + slides.length) % slides.length;
  updateSlider();
}

function updateSlider() {
  const slider = document.getElementById("petSlider");
  const width = slider.clientWidth;
  slider.style.transform = `translateX(-${currentSlide * width}px)`;
}
</script>

<script>
  function scrollToProduk() {
    document.getElementById("produk").scrollIntoView({ behavior: "smooth" });
  }

  function scrollToLayanan() {
    document.getElementById("layanan").scrollIntoView({ behavior: "smooth" });
  }

  function scrollToInformasi() {
    document.getElementById("informasi").scrollIntoView({ behavior: "smooth" });
  }
</script>

<script>
  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
</script>

<script>
  const productData = [
    {
      title: "Baju Hewan",
      price: 45000,
      description: "Baju lucu dan nyaman untuk hewan peliharaan Anda. Terbuat dari bahan katun lembut yang tidak menyebabkan iritasi, cocok untuk anjing maupun kucing. Tersedia dalam berbagai ukuran dan motif menarik.",
      image: "image/wear.avif"
    },
    {
      title: "Makanan Kucing",
      price: 85000,
      description: "Makanan bergizi lengkap untuk kucing kesayangan Anda. Mengandung protein tinggi, vitamin, dan mineral yang mendukung kesehatan tulang, gigi, dan bulu. Cocok untuk semua usia kucing.",
      image: "image/food.avif"
    },
    {
      title: "Mangkok Makan",
      price: 30000,
      description: "Mangkok makan praktis dan tahan lama untuk hewan peliharaan. Terbuat dari bahan plastik tebal anti slip, mudah dibersihkan, dan cocok untuk makanan maupun air.",
      image: "image/bowl.avif"
    },
    {
      title: "Kalung Hewan",
      price: 25000,
      description: "Kalung imut untuk hewan peliharaan Anda.",
      image: "image/necklace.avif"
    },
    {
      title: "Vitamin Hewan",
      price: 60000,
      description: "Vitamin cair ini dirancang khusus untuk menjaga daya tahan tubuh dan meningkatkan nafsu makan hewan peliharaan Anda. Mengandung kombinasi lengkap vitamin A, D3, E, dan B kompleks, produk ini cocok digunakan untuk anjing, kucing, kelinci, serta hewan kecil lainnya. Selain mendukung pertumbuhan yang optimal, vitamin ini juga membantu menjaga kesehatan kulit dan bulu. Dengan bentuk cair, penggunaannya sangat praktis karena dapat dicampur langsung ke makanan atau minuman.",
      image: "image/obat.avif"
    },
    {
      title: "Kandang Kucing",
      price: 200000,
      description: "Kandang kucing ini dirancang agar nyaman, aman, dan praktis untuk peliharaan Anda. Terbuat dari rangka besi anti-karat yang kokoh dengan ventilasi optimal untuk sirkulasi udara yang baik. Dilengkapi dengan pintu ganda dan alas yang bisa dilepas, memudahkan saat membersihkan kandang. Dengan ukuran 75 x 50 x 60 cm, kandang ini ideal untuk tempat istirahat, bermain, atau pemulihan pasca-operasi. Bonus tambahan berupa tempat makan dan hammock gantung membuat kandang ini semakin lengkap untuk kebutuhan kucing kesayangan Anda.",
      image: "image/cage.avif"
    },
    {
      title: "Shampoo Hewan",
      price: 75000,
      description: "Diformulasikan dengan bahan alami yang lembut di kulit, shampoo ini membantu menjaga kelembapan kulit, mengurangi gatal, serta membuat bulu menjadi lebih halus, wangi, dan mudah disisir. Cocok untuk anjing, kucing, dan hewan berbulu lainnya. Bebas dari paraben dan alkohol, sehingga aman untuk penggunaan rutin.",
      image: "image/shampoo.avif"
    },
    {
      title: "Aquarium Mini",
      price: 55000,
      description: "Dengan desain compact namun elegan, akuarium ini cocok diletakkan di meja kerja, kamar tidur, atau ruang tamu. Terbuat dari kaca bening berkualitas tinggi dan dilengkapi sistem pencahayaan LED serta filter mini untuk menjaga kejernihan air. Cocok untuk ikan kecil seperti cupang, guppy, atau neon tetra.",
      image: "image/tempatikan.avif"
    },
    {
      title: "Kandang Hamster",
      price: 100000,
      description: "Dirancang khusus dengan ventilasi optimal, material plastik dan kawat berkualitas, serta ruang bermain bertingkat yang membuat hamster aktif dan bahagia. Dilengkapi dengan roda lari, tempat makan, dan botol minum, kandang ini adalah solusi lengkap untuk kenyamanan dan kesehatan hewan mungil Anda.",
      image: "image/kandanghamster.avif"
    },
    {
      title: "Snack Tuna",
      price: 50000,
      description: "Dibuat dari daging tuna segar berkualitas tinggi, camilan ini kaya akan protein dan omega-3 yang baik untuk kesehatan jantung, bulu berkilau, dan nafsu makan kucing. Tekstur lembutnya cocok untuk semua usia, mulai dari kitten hingga kucing senior.",
      image: "image/snack.avif"
    },
    {
      title: "Sofa Hewan",
      price: 125000,
      description: "Berikan tempat istirahat terbaik untuk hewan kesayangan Anda dengan sofa hewan peliharaan yang empuk dan elegan ini. Dibuat dari bahan kain premium yang lembut dan tahan lama, sofa ini memberikan kenyamanan maksimal untuk kucing maupun anjing kecil. Desain modernnya cocok untuk melengkapi interior rumah Anda.",
      image: "image/kasur.avif"
    },
    {
      title: "Kandang Burung",
      price: 100000,
      description: "Kandang burung ini dirancang khusus untuk memberikan ruang gerak yang cukup sekaligus menciptakan lingkungan yang aman dan nyaman bagi burung kesayangan Anda. Terbuat dari rangka besi berkualitas anti-karat, dengan jarak antar jeruji yang ideal untuk burung kecil hingga sedang seperti kenari, lovebird, atau parkit.",
      image: "image/birdcage.avif"
    },
    {
      title: "Makanan Kelinci",
      price: 60000,
      description: "Campuran hay berkualitas, pelet, dan sayuran kering kaya serat untuk pencernaan sehat dan gigi kuat. Cocok untuk kelinci muda maupun dewasa. Tanpa bahan kimia, aman dan lezat!",
      image: "image/birdcage.avif"
    },
    {
      title: "Tas Kucing",
      price: 130000,
      description: "Tas carrier modern dengan jendela transparan dan ventilasi optimal, ideal untuk bepergian bersama kucing kesayangan. Ringan, aman, dan tampil keren — cocok untuk travel maupun ke dokter hewan.",
      image: "image/tas.avif"
    },
    {
      title: "Makanan Ikan",
      price: 53000,
      description: "Makanan ikan dengan formula seimbang, cocok untuk ikan hias air tawar. Mengandung protein, vitamin, dan mineral penting untuk mendukung pertumbuhan, warna cerah, dan daya tahan tubuh ikan. Tidak mengeruhkan air.",
      image: "image/fishfood.avif"
    }
  ];

  function openProductModal(index) {
    const product = productData[index];
    document.getElementById("productModalImage").src = product.image;
    document.getElementById("productModalTitle").textContent = product.title;
    document.getElementById("productModalPrice").textContent = "Rp " + product.price.toLocaleString();
    document.getElementById("productModalDescription").textContent = product.description;
    document.getElementById("productQuantity").value = 1;
    const modal = document.getElementById("productModal");
    modal.style.display = "flex";
    modal.dataset.productIndex = index;
  }

  function closeProductModal() {
    document.getElementById("productModal").style.display = "none";
  }

function confirmAddToCart() {
  const index = document.getElementById("productModal").dataset.productIndex;
  const quantity = parseInt(document.getElementById("productQuantity").value);
  addToCart(index, quantity);
  closeProductModal();
}

  function changeQuantity(amount) {
  const qtyInput = document.getElementById("productQuantity");
  let currentQty = parseInt(qtyInput.value);
  currentQty = isNaN(currentQty) ? 1 : currentQty + amount;
  if (currentQty < 1) currentQty = 1;
  qtyInput.value = currentQty;
  }

  document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".btn-cart").forEach((btn, index) => {
      btn.addEventListener("click", () => openProductModal(index));
   });
  });
</script>

<script>
  const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";
  const username = localStorage.getItem("username") || "User";

  const visitBtn = document.getElementById("visitBtn");

  if (isLoggedIn) {
    visitBtn.textContent = "Logout";
    visitBtn.classList.add("logout-btn");
    visitBtn.href = "#"; 

    visitBtn.addEventListener("click", function (e) {
      e.preventDefault(); 
      localStorage.removeItem("isLoggedIn");
      localStorage.removeItem("username");
      alert("Anda berhasil logout.");
      location.reload(); 
    });
  }
</script>

<script>
  // Sembunyikan produk setelah index ke-3
  document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".product-card");
    cards.forEach((card, index) => {
      if (index > 3) {
        card.style.display = "none";
      }
    });
  });

  function showAllProducts() {
    const cards = document.querySelectorAll(".product-card");
    cards.forEach(card => {
      card.style.display = "block";
    });
    document.getElementById("showMoreBtn").style.display = "none";
  }
</script>

<script>
function toggleMenu() {
    const nav = document.querySelector('.navbar nav ul');
    nav.classList.toggle('active');
}
</script>

</body>  
</html>

