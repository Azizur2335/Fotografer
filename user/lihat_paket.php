<?php
require '../backend/koneksi.php';

// Ambil semua paket dari database
$result = $koneksi->query("SELECT * FROM paket_foto ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Semua Paket Foto</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 30px;
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    .paket-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 25px;
    }
    .paket-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      overflow: hidden;
      text-align: center;
      transition: transform 0.2s;
      cursor: pointer;
    }
    .paket-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.15);
    }
    .paket-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      display: block;
    }
    .paket-card h3 {
      margin: 12px 0 5px;
      font-size: 18px;
      font-weight: bold;
    }
    .back-btn {
      display: inline-block;
      margin-top: 30px;
      text-decoration: none;
      padding: 10px 25px;
      background: #142b43;
      color: #fff;
      border-radius: 6px;
      font-weight: bold;
    }
    .back-btn:hover {
      background: #1d3e66;
    }
    .paket-card .info {
      text-align: left;
      margin: 0 15px 15px;
      color: #555;
      font-size: 14px;
      line-height: 1.4em;
    }
    .paket-card .info p {
      margin: 5px 0;
    }

    /* Overlay */
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
    }
    .detail-overlay.active { display: block; }
    .detail-container {
      max-width: 900px;
      margin: 0 auto;
      background: white;
      border-radius: 20px;
      overflow: hidden;
      position: relative;
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
    }
    .detail-image {
      width: 100%;
      height: 450px;
      object-fit: cover;
    }
    .detail-content { padding: 40px; }
    .detail-title {
      font-size: 2.5em;
      color: #333;
      margin-bottom: 20px;
    }
    .detail-price {
      font-size: 2em;
      color: #007bff;
      font-weight: bold;
      margin-bottom: 30px;
    }
    .detail-description {
      background: #f8f9fa;
      padding: 25px;
      border-radius: 10px;
      margin-bottom: 30px;
    }
    .detail-description h3 {
      color: #333;
      margin-bottom: 15px;
      font-size: 1.3em;
    }
    .detail-description ul {
      padding-left: 20px; /* bullet list */
      margin: 0;
    }
    .detail-description li {
      margin-bottom: 8px;
      color: #555;
      line-height: 1.6em;
    }
    .detail-actions {
      display: flex;
      justify-content: center;
    }
    .btn-pesan {
      background: #007bff;
      color: white;
      padding: 15px 50px;
      border: none;
      border-radius: 8px;
      font-size: 1.1em;
      cursor: pointer;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <h2>Semua Paket Foto</h2>
  <hr style="margin: 30px 0 50px 0; background-color:#010101ff;">
  <div class="paket-grid">
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="paket-card" onclick='openDetail(<?php echo json_encode($row, JSON_HEX_APOS | JSON_HEX_QUOT); ?>)'>
        <img src="../Admin/paket/<?php echo $row['foto']; ?>" alt="<?php echo $row['nama_paket']; ?>">
        <h3><?php echo $row['nama_paket']; ?></h3>
        <div class="info">
          <p><strong>Harga:</strong> Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

  <a href="PaketFoto.php" class="back-btn">← Kembali</a>

  <!-- DETAIL OVERLAY -->
  <div class="detail-overlay" id="detailOverlay">
    <div class="detail-container">
      <button class="detail-close" onclick="closeDetail()">×</button>
      <img class="detail-image" id="detailImage" src="" alt="">
      <div class="detail-content">
        <h2 class="detail-title" id="detailTitle"></h2>
        <p class="detail-price" id="detailPrice"></p>

        <div class="detail-description">
          <h3>Deskripsi Paket:</h3>
          <ul id="detailDescription"></ul>
        </div>

        <div class="detail-actions">
          <a href="#" class="btn-pesan" id="btnPesan">Pesan Sekarang</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    function openDetail(paket) {
      document.getElementById('detailImage').src = '../Admin/paket/' + paket.foto;
      document.getElementById('detailTitle').textContent = paket.nama_paket;
      document.getElementById('detailPrice').textContent = 'Rp' + parseInt(paket.harga).toLocaleString('id-ID');

      // Buat bullet list dari deskripsi (tiap enter = 1 bullet)
      let descContainer = document.getElementById('detailDescription');
      descContainer.innerHTML = '';
      if (paket.deskripsi) {
        let lines = paket.deskripsi.split(/\r?\n/);
        lines.forEach(line => {
          if (line.trim() !== '') {
            let li = document.createElement('li');
            li.textContent = line.trim();
            descContainer.appendChild(li);
          }
        });
      }

      document.getElementById('detailOverlay').classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function closeDetail() {
      document.getElementById('detailOverlay').classList.remove('active');
      document.body.style.overflow = 'auto';
    }
  </script>
</body>
</html>
