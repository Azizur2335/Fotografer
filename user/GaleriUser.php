<?php
require '../backend/koneksi.php';
$result = $koneksi->query("SELECT * FROM galeri ORDER BY id DESC");
?>
<!DOCTYPE html>
<head>
    <title>Galeri User</title>
    <link rel="stylesheet" href="asset/CSS/style.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">Logo</div>
        <div class="menu">
            <a href="#">Tentang Kami</a>
            <a href="#">Paket Foto</a>
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
        <a href="-" class="btn">Hubungi</a>
    </div>

    <div class="paket">
        <div class="paket-header">
            <div>
                <h2>Galeri User</h2>
                <p>Text.</p>
            </div>
            <a href="-" class="btn-outline">Lihat Semua</a>
        </div>
        <div class="paket-grid">
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="paket-card">
                    <img src="../Admin/galeri/<?php echo htmlspecialchars($row['gambar']); ?>" 
                         alt="<?php echo htmlspecialchars($row['judul']); ?>" 
                         class="paket-img">
                </div>
            <?php endwhile; ?>
        </div>
    <!-- FOOTER -->
    <div class="footer">
        <div class="footer-top">
            <div class="footer-logo">Logo</div>
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
        <hr style="margin: 50px 0px 10px 0px;">
        <div class="footer-bottom">
            <h4>© 2025 NamaUsaha. All rights reserved.</h4>
            <div class="footer-links">
            <a href="-">Kebijakan Privasi</a>
            <a href="-">Syarat Layanan</a>
            <a href="-">Pengaturan Cookies</a>
            </div>
        </div>
    </div>
</body>
</html>