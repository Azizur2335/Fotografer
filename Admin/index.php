<?php
require '../backend/koneksi.php';

  $resultPaket = $koneksi->query("SELECT COUNT(*) AS total FROM paket_foto");
  $dataPaket   = $resultPaket->fetch_assoc();
  $totalPaket  = $dataPaket['total'];

  $query_total = "SELECT COUNT(*) as total FROM pesan_masuk";
  $result_total = mysqli_query($koneksi, $query_total);
  $total_pesan = 0;
  if($result_total){
  $row_total = mysqli_fetch_assoc($result_total);
  $total_pesan = $row_total['total'];
 }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Studio Fotografer</title>
  <style>
    body {
      font-family: 'Merriweather';
      background-color: #f6f8f4ff;
      color: #000000ff;
    }
    .topbar {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 15px 20px;
      border-bottom: 5px solid #f6f8f4ff;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      background: hsla(181, 42%, 40%, 1.00); /* hijau dengan transparansi */
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
      top: 60px;
      left: 0;
      width: 250px;
      height: 100%;
      background-color: hsla(181, 42%, 40%, 1.00); /* hijau transparan */
      border-right: 5px solid #f6f8f4ff;
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
      color: #000000ff;
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
      border-left: 5px solid #72a2d6ff;
      background-color: #85acd5ff;
      color: #000000ff;
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
      color: #000000ff;
    }
    .welcome h2 {
      font-size: 28px;
      margin-bottom: 10px;
    }
    .welcome p {
      font-size: 16px;
    }
    .cards {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 30px;
      max-width: 800px;
      margin: 0 auto;
    }
    .card {
      background: #d5f9ffff;
      padding: 20px;
      border: 1px solid #254e7a;
      border-radius: 10px;
      text-align: center;
      transition: transform 0.2s;
      box-shadow: 0 2px 5px rgba(0,0,0,0.5);
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card h3 {
      font-size: 24px;
      margin: 10px 0;
    }
    .card p {
      color: #000000ff;
    }
    .icon img {
      width: 30px;  
      height: 30px;
    }
    .hidden {
      display: none;
    }
    h1 {
      border-bottom: 3px solid  #112337ff;
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
      background: #0c3e72ff;
      color: #ffffffff;
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
      background: #ffffffff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 5px 5px rgba(0,0,0,0.1);
    }
    table th, table td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #083260ff;
    }
    table th {
      background: #91979dff;
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
    .btn-edit { background: #0c3e72ff; color: #f7f3ea; }
    .btn-delete { background: #572127ff; color: #f7f3ea; }
    .sidebar img,
      #dashboardPage .card img {
      filter: invert(100%);
    }
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
          <h3><?php echo $totalPaket; ?></h3>
          <p>Paket Foto</p>
        </div>
        <div class="card">
          <span class="icon"><img src="image/photo8.png"></span>
          <h3>0</h3>
          <p>Foto di Galeri</p>
        </div>
        <div class="card">
            <span class="icon"><img src="image/email8.png"></span>
            <h3><?php echo $total_pesan; ?></h3>
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
      <a href="formPaketA.php" class="btn">+ Tambah Paket</a>
      <table>
        <thead>
          <tr>
            <th>Nama Paket</th>
            <th>Foto</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            require '../backend/koneksi.php';
            $result = $koneksi->query("SELECT * FROM paket_foto ORDER BY id DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nama_paket']) . "</td>";
                echo "<td><img src='paket/" . htmlspecialchars($row['foto']) . "' alt='" . htmlspecialchars($row['nama_paket']) . "' width='80'></td>";
                echo "<td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
                echo "<td>" . htmlspecialchars($row['deskripsi']) . "</td>";
                echo "<td class='actions'>";
                echo "<a href='../backend/edit_paket.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a> ";
                echo "<a href='../backend/hapus_paket.php?id=" . $row['id'] . "' class='btn btn-delete' onclick='return confirm(\"Yakin hapus paket ini?\")'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
          ?>
        </tbody>
      </table>
    </div>

    <!-- GALERI -->
    <div id="galeriPage" class="hidden">
      <h1>Kelola Galeri Foto</h1>
      <a href="formGaleriA.php" class="btn">+ Tambah Foto</a>
      <div class="gallery">
        <?php
          require '../backend/koneksi.php';
          $result = $koneksi->query("SELECT * FROM galeri ORDER BY id DESC");
          while ($row = $result->fetch_assoc()) {
              echo "<div class='gallery-item'>";
              echo "<img src='galeri/" . htmlspecialchars($row['gambar']) . "' alt='" . htmlspecialchars($row['judul']) . "'>";
              echo "<div class='actions'>";
              echo "<button class='btn btn-edit'>Edit</button>";
              echo "<button class='btn btn-delete'>Hapus</button>";
              echo "</div>";
              echo "</div>";
          }
        ?>
      </div>
    </div>

    <!-- PESAN MASUK -->
    <div id="pesanPage" class="hidden">
      <h1>Pesan Masuk</h1>
      <?php 
      $result = mysqli_query($koneksi, "SELECT * FROM pesan_masuk ORDER BY tanggal DESC");
      
      if($result && mysqli_num_rows($result) > 0) { 
      ?>
        <table>
          <thead>
            <tr>
              <th>Pengirim</th>
              <th>Email</th>
              <th>Topik</th>
              <th>Opsi</th>
              <th>Preview</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><strong><?php echo htmlspecialchars($row['first'] . ' ' . $row['last']); ?></strong></td>
              <td><?php echo htmlspecialchars($row['email']); ?></td>
              <td><?php echo htmlspecialchars($row['topic']); ?></td>
              <td>
                <?php 
                  $opsi_text = '';
                  switch($row['opsi']) {
                    case '1': $opsi_text = 'Konsultasi'; break;
                    case '2': $opsi_text = 'Buat Janji'; break;
                    case '3': $opsi_text = 'Booking'; break;
                    case '4': $opsi_text = 'Lainnya'; break;
                    default: $opsi_text = $row['opsi'];
                  }
                  echo htmlspecialchars($opsi_text);
                ?>
              </td>
              <td>
                <div class="preview-text">
                  <?php echo htmlspecialchars(substr($row['message'], 0, 50)) . '...'; ?>
                </div>
              </td>
              <td><?php echo date('d/m/Y H:i', strtotime($row['tanggal'])); ?></td>
              <td class="actions">
                <a href="../backend/detail_pesan.php?id=<?php echo $row['id']; ?>" class="btn btn-view">Lihat</a>
                <a href="../backend/hapus_pesan.php?id=<?php echo $row['id']; ?>" 
                  class="btn btn-delete" 
                  onclick="return confirm('Yakin ingin menghapus pesan ini?')">Hapus</a>
              </td>
            </tr>
            <?php 
            }
            ?>
          </tbody>
        </table>
      <?php 
      } else { 
      ?>
        <div class="empty-state">
          <h3>Belum Ada Pesan</h3>
          <p>Belum ada pesan masuk dari formulir kontak</p>
        </div>
      <?php 
      } 
      ?>
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
