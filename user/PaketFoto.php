<?php
require '../backend/koneksi.php';
$result = $koneksi->query("SELECT * FROM paket_foto ORDER BY id DESC LIMIT 6");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Fotografer2</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
    <script src="asset/JS/script.js"></script>

    <!-- NAVIGASI -->
    <div class="navbar">
        <div class="logo">Logo</div>
        <div class="menu">
            <a href="..\index.php">Tentang Kami</a>
            <a href="GaleriUser.php">Galeri</a>
            <a href="..\index.php\#Kontak-kami">Kontak Kami</a>
        </div>
        <a href="../index.php" class="btn">Kembali</a>
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
            <div class="paket-card" onclick='openDetail(<?php echo json_encode($row, JSON_HEX_APOS | JSON_HEX_QUOT); ?>)'>
                <div class="paket-img" 
                    style="background: url('../Admin/paket/<?php echo $row['foto']; ?>') center center; background-size: cover;">
                </div>
                <h3><?php echo $row['nama_paket']; ?></h3>
                <p class="harga">Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- HALAMAN DETAIL OVERLAY -->
    <div class="detail-overlay" id="detailOverlay">
        <div class="detail-container">
            <button class="detail-close" onclick="closeDetail()">×</button>
            <img class="detail-image" id="detailImage" src="" alt="">
            <div class="detail-content">
                <h2 class="detail-title" id="detailTitle"></h2>
                <p class="detail-price" id="detailPrice"></p>
                
                <div class="detail-features">
                    <h3>Deskripsi Paket:</h3>
                    <p id="detailDescription"></p>
                </div>

                <div class="detail-actions">
                    <a href="#" class="btn-pesan" id="btnPesan">Pesan Sekarang</a>
                </div>
            </div>
        </div>
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
        <hr style="margin: 50px 0px 10px 0px; background-color: #000000ff;">
        <div class="footer-bottom">
            <h4>© 2025 Galleria. All rights reserved.</h4>
        </div>
    </div>

    <script>
        function openDetail(paket) {
            document.getElementById('detailImage').src = '../Admin/paket/' + paket.foto;
            document.getElementById('detailTitle').textContent = paket.nama_paket;
            document.getElementById('detailPrice').textContent = 
                'Rp' + parseInt(paket.harga).toLocaleString('id-ID');
            
            // isi deskripsi langsung dari database + format bullet
            let deskripsi = paket.deskripsi || 'Belum ada deskripsi paket.';
            let formatted = deskripsi
                .split(/[\n\.]/)               // pisah per kalimat/baris
                .map(s => s.trim())            // rapikan spasi
                .filter(s => s.length > 0)     // buang kosong
                .map(s => `• ${s}`)            // tambah simbol
                .join('<br>');                 // enter
            document.getElementById('detailDescription').innerHTML = formatted;
            
            document.getElementById('detailOverlay').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeDetail() {
            document.getElementById('detailOverlay').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Tutup detail jika klik di luar container
        document.getElementById('detailOverlay').addEventListener('click', function(e) {
            if (e.target === this) { closeDetail(); }
        });

        // Tutup dengan tombol ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') { closeDetail(); }
        });
    </script>
</body>
</html>
