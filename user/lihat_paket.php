<?php
require '../backend/koneksi.php';

// Ambil semua paket
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
      text-align: center; /* Judul dan gambar tetap di tengah */
      transition: transform 0.2s;
    }
    .paket-card:hover {
      transform: translateY(-5px);
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
      margin-top: 10px;
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
    /* Deskripsi dan harga rata kiri */
    .paket-card .info div {
      margin-top: 1px; /* jarak harga dari deskripsi */
    }
    .paket-card .info {
      text-align: left;
      margin: 0 15px 5px;
      color: #555;
      font-size: 14px;
      line-height: 1em;
      white-space: pre-line; /* pastikan newline tampil */
    }
    .paket-card .info p {
      line-height: 1em;
      margin: 1px 0;
    }
    .paket-card .info strong {
      display: block;
      margin: 0px;
    }
  </style>
</head>
<body>
  <h2>Semua Paket Foto</h2>
  <hr style="margin: 30px 0px 50px 0px; background-color: #010101ff;">
  <div class="paket-grid">
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="paket-card">
        <img src="../Admin/paket/<?php echo $row['foto']; ?>" alt="<?php echo $row['nama_paket']; ?>">
        <h3><?php echo $row['nama_paket']; ?></h3>
        <div class="info">
          <strong>Desc:</strong>
          <p><?php echo nl2br($row['deskripsi']); ?></p>
          <p>Harga: Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

  <a href="PaketFoto.php" class="back-btn">← Kembali</a>
</body>
</html>
