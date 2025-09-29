<?php
require '../backend/koneksi.php';
// Ambil data paket dari database
$result = $koneksi->query("SELECT * FROM paket_foto ORDER BY id DESC LIMIT 6");
?>
<!DOCTYPE html>
<head>
    <title>Fotografer2</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
    <script src="asset/JS/script.js"></script>
    <!-- NAVIGASI -->
    <div class="navbar">
        <div class="logo">Galleria</div>
        <div class="menu">
            <a href="#">Tentang Kami</a>
            <a href="#">Galeri</a>

            <div class="dropdown">
            <button class="dropbtn" onclick="toggleDropdown()">Kontak Kami</button>
            <div id="dropdownMenu" class="dropdown-content">
                <a href="-">WhatsApp</a>
                <a href="-">Email</a>
                <a href="-">Telepon</a>
            </div>
            </div>
        </div>
        <a href="../Fotografi.php" class="btn">Log out</a>
    </div>

    <!-- HEADER -->
    <div class="header">
        <p class="header-subtitle">Galleria</p>
        <h1 class="header-title">Paket Harga Foto</h1>
        <p class="header-text">Temukan paket foto terbaik untuk momen spesial Anda di Studio Fotografi Sejahtera.</p>
        <div class="header-buttons">
            <a href="lihat_paket.php" class="btn second">Lihat</a>
            <a href="-" class="btn second">Hubungi</a>
        </div>
    </div>
    <!-- GRID FOTO -->
    <div class="paket">
        <div class="paket-header">
            <div>
                <h2>Paket</h2>
                <p>Temukan paket foto terbaik untuk momen spesial Anda.</p>
            </div>
            <a href="lihat_paket.php" class="btn-outline">Lihat Semua</a>
        </div>
        <div class="paket-grid">
            <?php while($row = $result->fetch_assoc()): ?>
            <div class="paket-card">
                <div class="paket-img" 
                    style="background: url('../Admin/paket/<?php echo $row['foto']; ?>') center center; background-size: cover;">
                </div>
                <h3><?php echo $row['nama_paket']; ?></h3>
                <p class="harga">Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
            </div>
            <?php endwhile; ?>
        </div>
        </div>
    <!-- FOOTER -->
    <div class="footer">
        <div class="footer-top">
            <div class="footer-logo">Galleria</div>
                <div class="footer-menu">
                    <a href="-">Menu</a>
                    <a href="-">Link</a>
                    <a href="-">Link</a>
                    <a href="-">Link</a>
                    <a href="-">Link</a>
                </div>
            <div class="footer-socials">
            <a href="-"><img src="images/facebook1.png"></a>
            <a href="-"><img src="images/instagram.png"></a>
            <a href="-"><img src="images/x2.webp"></a>
            <a href="-"><img src="images/linkedin.jpg"></a>
            <a href="-"><img src="images/yt2.jpg"></a>
            </div>
        </div>
        <hr style="margin: 50px 0px 10px 0px; background-color: #000000ff;">
        <div class="footer-bottom">
            <h4>© 2025 Galleria. All rights reserved.</h4>
            <div class="footer-links">
            <a href="-">Kebijakan Privasi</a>
            <a href="-">Syarat Layanan</a>
            <a href="-">Pengaturan Cookies</a>
            </div>
        </div>
    </div>
</body>
</html>