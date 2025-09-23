<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Studio Fotografer</title>
  <style>
    body {
      font-family: 'Merriweather';
      background-color: #fff;
      color: #000;
    }
    .topbar {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 15px 20px;
      border-bottom: 1px solid #797979;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      background: #fff;
      z-index: 1000;
    }
    .hamburger {
      font-size: 22px;
      cursor: pointer;
      user-select: none;
    }
    .title {
      padding-left: 5px;
      font-size: 18px;
      font-weight: 600;
    }
    .sidebar {
      position: fixed;
      top: 50px;
      left: 0;
      width: 250px;
      height: 100%;
      background-color: #fff;
      border-right: 1px solid #797979;
      padding-top: 20px;
      transition: left 0.3s ease;
      z-index: 999;
    }
    .sidebar.hide {
      left: -250px; /* geser keluar */
    }
    .nav-item {
      display: flex;
      align-items: center;
      padding: 15px 20px;
      color: #2b2b2b;
      text-decoration: none;
      font-size: 15px;
      transition: 0.2s;
      cursor: pointer;
    }
    .nav-item span {
      margin-right: 10px;
    }
    .nav-item img {
      width: 20px;   
      height: 20px;  
      margin-right: 7px; 
      vertical-align: middle; 
    }
    .nav-item:hover, .nav-item.active {
      border-left: 5px solid #949494;
      background-color: #e8e8e8;
      color: #000;
    }
    .main-content {
      margin-top: 60px;
      padding: 20px;
      min-height: 100vh;
      margin-left: 250px;
      transition: margin-left 0.3s ease;
    }
    .main-content.full {
      margin-left: 0; /* kalau sidebar disembunyikan */
    }
    .welcome {
      text-align: center;
      margin: 40px 0;
    }
    .welcome h2 {
      font-size: 28px;
      margin-bottom: 10px;
    }
    .welcome p {
      font-size: 16px;
      color: #555;
    }
    .cards {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 30px;
      max-width: 800px;
      margin: 0 auto;
    }
    .card {
      background: #fff;
      padding: 20px;
      border: 1px solid #797979;
      border-radius: 10px;
      text-align: center;
      transition: transform 0.2s;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card h3 {
      font-size: 24px;
      margin: 10px 0;
    }
    .card p {
      color: #555;
    }
    .icon img {
      width: 30px;  
      height: 30px;
    }
    .hidden {
      display: none;
    }
    h1 {
      border-bottom: 1px solid  #908f8fff;
      text-align: center;
      padding-bottom: 20px;
      margin-bottom: 10px;
    }
    .btn {
      display: inline-block;
      padding: 8px 12px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
      background: #000;
      color: #fff;
      cursor: pointer;
      font-size: 14px;
      transition: 0.3s;
      text-decoration: none;
    }
    .btn:hover {
      background: #444;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    table th, table td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    table th {
      background: #f0f0f0;
    }
    .actions button {
      margin-right: 5px;
    }
    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 15px;
      padding: 10px;
      max-width: 1000px;
      margin: auto;
    }
    .gallery-item {
      position: relative;
      overflow: hidden;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }
    .gallery-item img {
      width: 100%;
      display: block;
      transition: transform 0.3s;
    }
    .gallery-item:hover img {
      transform: scale(1.05);
    }
    .gallery-item .actions {
      position: absolute;
      bottom: 8px;
      left: 0;
      right: 0;
      display: flex;
      justify-content: center;
      gap: 10px;
      opacity: 0;
      transition: opacity 0.3s;
    }
    .gallery-item:hover .actions {
      opacity: 1;
    }
    .btn-edit { background: #007bff; color: #fff; }
    .btn-delete { background: #dc3545; color: #fff; }
  </style>
</head>
<body>
  <!-- TOPBAR -->
  <div class="topbar">
    <div class="hamburger" onclick="toggleSidebar()">☰</div>
    <div class="title">Admin Studio Fotografer</div>
  </div>

  <!-- SIDEBAR -->
  <div class="sidebar" id="sidebar">
    <div class="nav-item active" onclick="showPage('dashboard', event)">
      <span><img src="image/home4.png"></span> Dashboard
    </div>
    <div class="nav-item" onclick="showPage('paket', event)">
      <span><img src="image/camera3.png"></span> Kelola Paket Foto
    </div>
    <div class="nav-item" onclick="showPage('galeri', event)">
      <span><img src="image/photo8.png"></span> Kelola Galeri Foto
    </div>
    <div class="nav-item" onclick="showPage('pesan', event)">
      <span><img src="image/email8.png"></span> Pesan Masuk
    </div>
  </div>

  <!-- MAIN CONTENT -->
  <div class="main-content">
    <!-- DASHBOARD -->
    <div id="dashboardPage">
      <div class="welcome">
        <h2>Selamat datang, Admin!</h2>
        <p>Berikut ringkasan aktivitas terbaru di Studio Fotografer Anda.</p>
      </div>
      <div class="cards">
        <div class="card">
          <span class="icon"><img src="image/camera3.png"></span>
          <h3>0</h3>
          <p>Paket Foto</p>
        </div>
        <div class="card">
          <span class="icon"><img src="image/photo8.png"></span>
          <h3>0</h3>
          <p>Foto di Galeri</p>
        </div>
        <div class="card">
          <span class="icon"><img src="image/email8.png"></span>
          <h3>0</h3>
          <p>Pesan Masuk</p>
        </div>
        <div class="card">
          <span class="icon"><img src="image/icon3.png"></span>
          <h3>0</h3>
          <p>Pelanggan</p>
        </div>
      </div>
    </div>

    <!-- PAKET FOTO -->
    <div id="paketPage" class="hidden">
      <h1>Kelola Paket Foto</h1>
      <a href="formPaketA.php" class="btn">+ Tambah</a>
      <table>
        <thead>
          <tr>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Durasi</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Paket Wisuda</td>
            <td>Rp 300.000</td>
            <td>1 Jam</td>
            <td>10 Foto + Cetak 5</td>
            <td class="actions">
              <button class="btn">Edit</button>
              <button class="btn">Hapus</button>
            </td>
          </tr>
          <tr>
            <td>Paket Prewedding</td>
            <td>Rp 250.000</td>
            <td>1 Jam</td>
            <td>10 Foto + Cetak 5</td>
            <td class="actions">
              <button class="btn">Edit</button>
              <button class="btn">Hapus</button>
            </td>
          </tr>
          <tr>
            <td>Paket Keluarga</td>
            <td>Rp 400.000</td>
            <td>2 Jam</td>
            <td>10 Foto + Cetak 5</td>
            <td class="actions">
              <button class="btn">Edit</button>
              <button class="btn">Hapus</button>
            </td>
          </tr>
          <tr>
            <td>Paket Event</td>
            <td>Rp 500.000</td>
            <td>2 Jam</td>
            <td>10 Foto + Cetak 5</td>
            <td class="actions">
              <button class="btn">Edit</button>
              <button class="btn">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- GALERI -->
    <div id="galeriPage" class="hidden">
      <h1>Kelola Galeri Foto</h1>
      <a href="formGaleriA" class="btn">+ Tambah Foto</a>
      <div class="gallery">
        <div class="gallery-item">
          <img src="" alt="Foto">
          <div class="actions">
            <button class="btn btn-edit" onclick="alert('Edit foto')">Edit</button>
            <button class="btn btn-delete" onclick="alert('Hapus foto?')">Hapus</button>
          </div>
        </div>
        <div class="gallery-item">
          <img src="" alt="Foto">
          <div class="actions">
            <button class="btn btn-edit" onclick="alert('Edit foto')">Edit</button>
            <button class="btn btn-delete" onclick="alert('Hapus foto?')">Hapus</button>
          </div>
        </div>
        <div class="gallery-item">
          <img src="" alt="Foto">
          <div class="actions">
            <button class="btn btn-edit" onclick="alert('Edit foto')">Edit</button>
            <button class="btn btn-delete" onclick="alert('Hapus foto?')">Hapus</button>
          </div>
        </div>
      </div>
    </div>

    <!-- PESAN MASUK -->
    <div id="pesanPage" class="hidden">
        <h1>Pesan Masuk</h1>
        <table>
            <tr>
            <th>Pengirim</th>
            <th>Preview</th>
            <th>Tanggal</th>
            </tr>
            <tr class="unread">
            <td>Lucas</td>
            <td>Halo admin, saya mau tanya tentang paket...</td>
            <td>17-09-2025</td>
            </tr>
            <tr>
            <td>Mark</td>
            <td>Halo, saya mau tanya tentang paket..</td>
            <td>16-09-2025</td>
            </tr>
            <td>Jaemin</td>
            <td>Halo, saya mau tanya tentang paket..</td>
            <td>16-09-2025</td>
            </tr>
        </table>
    </div>
    
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const content = document.querySelector('.main-content');
      sidebar.classList.toggle('hide');
      content.classList.toggle('full');
    }

    function showPage(page, e) {
      // sembunyikan semua
      document.getElementById('dashboardPage').classList.add('hidden');
      document.getElementById('paketPage').classList.add('hidden');
      document.getElementById('galeriPage').classList.add('hidden');
      document.getElementById('pesanPage').classList.add('hidden');

      // tampilkan yang dipilih
      document.getElementById(page + 'Page').classList.remove('hidden');

      // update active menu
      const navItems = document.querySelectorAll('.nav-item');
      navItems.forEach(item => item.classList.remove('active'));
      e.currentTarget.classList.add('active');
    }
  </script>
</body>
</html>
