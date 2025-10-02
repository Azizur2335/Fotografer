<?php
require '../backend/koneksi.php';
// Ambil data paket dari database
$result = $koneksi->query("SELECT * FROM paket_foto ORDER BY id DESC LIMIT 6");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Fotografer2</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <style>
        /* Style untuk halaman detail */
        .detail-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.95);
            z-index: 9999;
            overflow-y: auto;
            padding: 40px 20px;
            animation: fadeIn 0.3s ease;
        }
        .detail-overlay.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .detail-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            animation: slideUp 0.4s ease;
            position: relative;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .detail-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(0,0,0,0.7);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 24px;
            z-index: 10;
            transition: background 0.3s ease;
        }
        .detail-close:hover { background: rgba(0,0,0,0.9); }
        .detail-image { width: 100%; height: 450px; object-fit: cover; }
        .detail-content { padding: 40px; }
        .detail-title { font-size: 2.5em; color: #333; margin-bottom: 20px; }
        .detail-price { font-size: 2em; color: #007bff; font-weight: bold; margin-bottom: 30px; }
        .detail-features {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .detail-features h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 1.3em;
        }
        .detail-features p {
            color: #555;
            line-height: 1.8;
            font-size: 1.1em;
        }
        .detail-actions { display: flex; justify-content: center; }
        .btn-pesan {
            background: #007bff;
            color: white;
            padding: 15px 50px;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background 0.3s ease;
            text-align: center;
            text-decoration: none;
            display: block;
        }
        .btn-pesan:hover { background: #0056b3; }
        .paket-card {
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .paket-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>
    <script src="asset/JS/script.js"></script>

    <!-- NAVIGASI -->
    <div class="navbar">
        <div class="logo">Galleria</div>
        <div class="menu">
            <a href="..\index.php">Tentang Kami</a>
            <a href="GaleriUser.php">Galeri</a>
            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown()">Kontak Kami</button>
                <div id="dropdownMenu" class="dropdown-content">
                    <a href="#WhatsApp">WhatsApp</a>
                    <a href="#Email">Email</a>
                </div>
            </div>
        </div>
        <a href="../index.php" class="btn">Log out</a>
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
            <div class="footer-logo">Galleria</div>
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
