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
        <h3>Galeri User</h3>
        <a href="..\index.php" class="btn">Kembali</a>
    </div>
    <h2 style="text-align: center;">Abadikan Momen Indah Anda bersama Studio Fotografi Sejahtera 📸<h2>
    <div class="paket">
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
            <div class="footer-socials">
            <img src="images/facebook1.png">
            <img src="images/instagram.png">
            <img src="images/x2.webp">
            <img src="images/linkedin.jpg">
            <img src="images/yt2.jpg">
            </div>
        </div>
        <hr style="margin: 50px 0px 10px 0px;">
        <div class="footer-bottom">
            <h4>© 2025 NamaUsaha. All rights reserved.</h4>
        </div>
    </div>
</body>
</html>