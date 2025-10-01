<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #fff;
      color: #333;
    }
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .logo {
      color: black;
      font-size: 24px;
      font-family: 'brush script MT', cursive;
    }
    nav {
      display: flex;
      gap: 25px;
      font-size: 14px;
      align-items: center;
    }
    nav a {
      text-decoration: none;
      color: #333;
      transition: color 0.3s;
    }
    nav a:hover {
      color: #555;
    }
    .arrow {
      display: inline-block;
      margin-left: 5px;
      margin-bottom: 2px;
      width: 4px;
      height: 4px;
      border-left: 2px solid black;
      border-bottom: 2px solid black;
      transform: rotate(-45deg);
    }
    .dropdown {
      position: relative;
      display: inline-block;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background-color: #fff;
      min-width: 140px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      z-index: 1;
    }
    .dropdown-content a {
      display: block;
      padding: 8px 12px;
      text-decoration: none;
      color: #333;
    }
    .dropdown-content a:hover {
      background-color: #f0f0f0;
    }
    .dropdown:hover .dropdown-content {
      display: block;
    }
    .hubungi-btn {
      background-color: #000;
      color: #fff;
      padding: 8px 16px;
      text-decoration: none;
      transition: background-color 0.3s;
    }
    .hubungi-btn:hover {
      background-color: #444;
    }
    .image-container {
      max-width: 100%;
      height: auto;
      overflow: hidden;
    }
    .image-container img {
      width: 90%;
      height: auto;
      object-fit: cover;
      display: block;
      margin: 0 auto;
    }
    h1 {
      text-align: center;
      font-size: 50px;
      color: #000;
    }
    .btn-dark {
      background-color: black;
      color: white;
      padding: 10px 20px;
      border: 1px solid grey;
      cursor: pointer;
      text-decoration: none;
    }
    .btn-light {
      background-color: white;
      color: black;
      padding: 10px 20px;
      border: 1px solid grey;
      cursor: pointer;
    }

    .btn-light a {
      color: #000;
      text-decoration: none;
    }
    section {
      padding: 60px 20px;
    }
    section h2 {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 20px;
      text-align: center;
    }
    /* Paket */
    .grid-3 {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      margin: 40px 30px;
      padding: 20px;
    }
    .card {
      padding: 20px;
      border: 1px solid #ffffffff;
      border-radius: 8px;
      background: #ffffffff;
      text-align: center;
    }
    .card img {
      width: 60px;
      height: 60px;
      margin-bottom: 15px;
    }
    .gallery {
      display: grid;
      text-align: center;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px; /* jarak antar gambar */
    }

    .gallery img {
      width: 100%;        /* penuh sesuai kolom */
      height: 100%;      /* tinggi seragam */
      object-fit: cover;  /* gambar dipotong biar proporsi terjaga */
      border-radius: 8px; /* biar rapi */
    }
    /* Kontak */
    .kontak-container{
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      max-width: 1100px;
      margin: 0 auto;
      padding: 40px 20px;
    }
    .kontak-info h2 {
      font-size: 28px;
      margin-bottom: 10px;
    }
    .kontak-info p {
      margin-bottom: 20px;
      color: #555;
    }
    .info-item {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }
    .info-item .icon {
      font-size: 20px;
      margin-right: 10px;
    }

    /* Kolom kanan (form) */
    .contact-form form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    /* Baris sejajar (nama depan & belakang, email & telp) */
    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr; /* dua kolom */
      gap: 20px; /* jarak antar kolom */
    }
    .form-group {
      display: flex;
      flex-direction: column; /* supaya p di atas input */
    }
    .form-input {
      padding: 8px 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 12px;
    }
    .form-textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #aaa;
      border-radius: 4px;
      font-size: 12px;
    }

    /* Dropdown */
    .form-select {
      height: 40px;
    }

    /* Textarea */
    .form-textarea {
      min-height: 100px;
      resize: vertical;
    }

    /* Radio & Checkbox */
    .form-group label {
      display: block;
      margin-top: 8px;
      margin-bottom: 12px;
      font-size: 12px;
    }

    /* Tombol submit */
    .btn-submit {
      background: black;
      color: white;
      padding: 12px 16px;
      border: none;
      cursor: pointer;
      font-weight: bold;
      transition: background 0.3s;
    }
    .btn-submit:hover {
      background: #333;
    }

    /* Footer */
    footer {
      padding: 15px 40px;
      background: #fff;
    }

    /* bagian atas */
    .footer-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .tengah{
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 20px;
      font-size: 12px;
    }

    /* bagian bawah dengan border pembatas */
    .footer-bottom {
      border-top: 1px solid black; /* garis pembatas */
      padding: 20px 0;
    }
    .footer-bottom div {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 20px;
      font-size: 10px;
    }
    footer p {
      margin: 0;
    }
    h2 {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    p.sub-title {
      font-size: 16px;
      margin-bottom: 30px;
      color: #444;
      text-align: center;
    }

    .testimonial-container {
      display: flex;
      gap: 20px;
      overflow-x: auto;
      scroll-behavior: smooth;
      padding-bottom: 20px;
    }

    .testimonial-card {
      flex: 0 0 300px;
      border: 2px solid #000000ff;
      padding: 20px;
      border-radius: 0px;
      background: #fff;
    }

    .testimonial-card p.quote {
      font-size: 15px;
      margin-bottom: 20px;
      color: #222;
    }

    .profile {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .profile img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    .profile-info {
      font-size: 14px;
    }

    .profile-info strong {
      display: block;
      font-weight: bold;
    }

    .read-more {
      font-size: 14px;
      font-weight: bold;
      color: #000;
      text-decoration: none;
    }

    /* Navigation buttons */
    .nav-btns {
      display: flex;
      justify-content: right;
      margin-top: 20px;
    }

    .btn {
      border: 1px solid #ccc;
      background: #fff;
      padding: 8px 12px;
      border-radius: 50%;
      cursor: pointer;
      font-size: 18px;
    }

    .dots {
      text-align: center;
      margin-top: 15px;
    }

    .dot {
      height: 8px;
      width: 8px;
      margin: 0 4px;
      background-color: #ccc;
      border-radius: 50%;
      display: inline-block;
    }

    .dot.active {
      background-color: #000;
    }

    .card i {
      font-size: 60px;
    }

    .footer-top i {
      font-size: 20px;
    }

    .profile i {
      font-size: 33px;
      padding-right: 10px;
    }
  </style>
</head>
<body>
  <!-- header navigasi -->
  <header>
      <div class="logo">Logo</div>
      <nav>
        <a href="#Tentang-kami">Tentang kami</a>
        <a href="#Paket-foto">Paket foto</a>
        <a href="#Galeri">Galeri</a>
        <div class="dropdown">
          <a href="#Kontak-kami" class="dropdown-btn">Kontak kami<span class="arrow"></span></a>
          <div class="dropdown-content">
            <a href="#WhatsApp">WhatsApp</a>
            <a href="#Email">Email</a>
          </div>
        </div>
      </nav>
      <a href="SignIn.php" class="hubungi-btn">Log In</a>
  </header>
  <!-- Tentang Kami -->
  <section id="Tentang-kami">
    <h1>
      Abadikan Momen Indah <br> Anda bersama Studio<br>Fotografi Sejahtera 📸
    </h1>
    <p style="text-align: center">
      Kami siap membantu Anda menangkap setiap momen berharga dalam hidup. Dengan <br>
      pengalaman dan keahlian, kami menjamin hasil yang memuaskan. <br><br>
      <button class="btn-dark"><a href="user/galeri.php">Lihat</a></button>
      <button class="btn-light"> <a href="user/PaketFoto.php">Paket</a></button>
    </p><br>
  </section>
  <!-- gambar1 -->
  <div class="image-container">
    <img src="img/sylusss.jpg" alt="">
  </div><br><br><br><br><br><br>
  <!-- Paket Foto -->
  <section id="Paket-foto">
    <h2>Paket Foto Menarik untuk Setiap<br>Momen Spesial Anda Bersama Kami</h2>
    <div class="grid-3">
      <div class="card">
        <i class='bx  bx-camera'  ></i>  
        <h3>Pilih Paket yang Sesuai dengan Kebutuhan dan Anggaran Anda</h3>
        <p>Kami menawarkan berbagai paket foto untuk setiap momen berharga Anda.</p>
        <a>Lihat &rsaquo;</a>      
      </div>
      <div class="card">
        <i class='bx  bx-camera'  ></i>  
        <h3>Paket Prewedding: Ciptakan Kenangan Indah Sebelum Hari Bahagia Anda</h3>
        <p>Paket ini dirancang untuk menangkap momen-momen romantis Anda.</p>
        <a>Lihat &rsaquo;</a>
      </div>
      <div class="card">
        <i class='bx  bx-camera'  ></i>  
        <h3>Paket Wisuda: Rayakan Keberhasilan Anda dengan Foto yang Memukau</h3>
        <p>Abadikan momen kelulusan Anda dengan foto yang penuh makna.</p>
        <a>Lihat &rsaquo;</a>
      </div>
    </div>
  </section>
  <!-- Galeri -->
  <section id="Galeri">
    <h2>Galeri Foto</h2>
    <p style="text-align: center">Lihat hasil pemotretan terbaik kami di sini</p>
    <div class="gallery">
      <div class="gallery img">
        <img src="img/Sylus2.jpg" alt="">
      </div>
      <div class="gallery img">
        <img src="img/Sylus1.jpg" alt="">
      </div>
      <div class="gallery img">
        <img src="img/Sylus3.jpg" alt="">
      </div>
    </div>
  </section>
  <!-- Kontak Kami -->
  <section id="Kontak-kami">
    <div class="kontak-container">

    <!-- Kontak info -->
      <div class="kontak-info">
        <h2 style="text-align: left">Hubungi Kami</h2>
        <p>Kami siap membantu Anda dengan pertanyaan apapun.</p>

        <div class="info-item">
          <span class="icon">📧</span>
          <span>info@studiofotografisejahtera.com</span>
        </div>

        <div class="info-item">
          <span class="icon">📞</span>
          <span>+62 812 3456 7890</span>
        </div>

        <div class="info-item">
          <span class="icon">📍</span>
          <span>Jl. Contoh No. 123, Jakarta 10100, ID</span>
        </div>
      </div>
    <!-- Kontak form -->
      <div class="kontak-form">
        <form>
          <div class="form-row">
            <div class="form-group">
              <p style="text-align: left">Nama Depan</p>
              <input type="text" class="form-input">
            </div>
            <div class="form-group">
              <p style="text-align: left">Nama Belakang</p>
              <input type="text" class="form-input">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <p style="text-align: left">Email</p>
              <input type="text" class="form-input">
            </div>
            <div class="form-group">
              <p style="text-align: left">Nomor Telepon</p>
              <input type="text" class="form-input">
            </div>
          </div>
          <div class="form-group">
          <p style="text-align: left">Pilih Topik</p>
          <select id="topic" class="form-select">
            <option>Pilih satu...</option>
            <option>Fotografi</option>
            <option>Videografi</option>
            <option>Lainnya</option>
          </select>
        </div><p>Apa yang Anda butuhkan?</p>
        <div class="form-row">
          <div class="form-group">
            <label><input type="radio" name="opsi" class="form-radio"> Pilihan Pertama</label>
            <label><input type="radio" name="opsi" class="form-radio"> Pilihan Kedua</label>
            <label><input type="radio" name="opsi" class="form-radio"> Pilihan Ketiga</label>
          </div>
          <div class="form-group">
            <label><input type="radio" name="opsi" class="form-radio"> Pilihan Keempat</label>
            <label><input type="radio" name="opsi" class="form-radio"> Pilihan Kelima</label>
            <label><input type="radio" name="opsi" class="form-radio"> Lainnya</label>
          </div>
        </div>
        <div class="form-group">
          <p>Pesan</p>
          <textarea class="form-textarea" placeholder="Ketik pesan Anda..."></textarea>
        </div>
        <div class="form-group">
          <label><input type="checkbox" class="form-checkbox">Saya setuju dengan Syarat</label>
        </div>
        <button type="submit" class="btn-submit">Kirim</button>
        </form>
      </div>
    </div>
  </section>

  <!-- Testimoni -->
  <section id="testimoni">
    <h2>Testimoni Pelanggan</h2>
    <p class="sub-title">Pengalaman luar biasa dengan Studio Fotografi Sejahtera.</p>

    <div class="testimonial-container" id="slider">
      <div class="testimonial-card">
        <p class="quote">"Hasil foto yang sangat memuaskan dan profesional!"</p>
        <div class="profile">
          <i class='bx  bx-user'  ></i> 
          <div class="profile-info">
            <strong>Rina Sari</strong>
            <span>Konsultan, PT. Maju</span>
          </div>
        </div>
        <a href="#" class="read-more">Baca studi kasus →</a>
      </div>

      <div class="testimonial-card">
        <p class="quote">"Pengalaman yang tak terlupakan, sangat direkomendasikan!"</p>
        <div class="profile">
          <i class='bx  bx-user'  ></i>
          <div class="profile-info">
            <strong>Andi Prasetyo</strong>
            <span>Manager, CV. Kreatif</span>
          </div>
        </div>
        <a href="#" class="read-more">Baca studi kasus →</a>
      </div>

      <div class="testimonial-card">
        <p class="quote">"Foto-foto yang dihasilkan sangat berkualitas!"</p>
        <div class="profile">
          <i class='bx  bx-user'  ></i>
          <div class="profile-info">
            <strong>Siti Aminah</strong>
            <span>Direktur, Studio XYZ</span>
          </div>
        </div>
        <a href="#" class="read-more">Baca studi kasus →</a>
      </div>

      <div class="testimonial-card">
        <p class="quote">"Tim fotografernya sangat ramah dan hasilnya luar biasa!"</p>
        <div class="profile">
          <i class='bx  bx-user'  ></i>
          <div class="profile-info">
            <strong>Budi Santoso</strong>
            <span>CEO, Startup ABC</span>
          </div>
        </div>
        <a href="#" class="read-more">Baca studi kasus →</a>
      </div>
    </div>

    <!-- Dots -->
    <div class="dots">
      <span class="dot active"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>

    <!-- Navigation buttons -->
    <div class="nav-btns">
      <button class="btn" onclick="prevSlide()">&#8592;</button>
      <button class="btn" onclick="nextSlide()">&#8594;</button>
    </div>

    <script>
      const slider = document.getElementById("slider");
      function nextSlide() {
        slider.scrollBy({ left: 320, behavior: "smooth" });
      }
      function prevSlide() {
        slider.scrollBy({ left: -320, behavior: "smooth" });
      }
    </script>
  </section>

  <footer>
  <div class="footer-top">
    <div class="logo">Logo</div>
    <div class="tengah">
      <p>Menu</p>
      <p>Link</p>
      <p>Link</p>
      <p>Link</p>
      <p>Link</p>
    </div>
    <div>
      <i class='bxl  bx-facebook-circle'  ></i> 
      <i class='bxl  bx-instagram'  ></i> 
      <i class='bxl  bx-twitter-x'  ></i> 
      <i class='bxl  bx-linkedin-square'  ></i> 
      <i class='bxl  bx-youtube'  ></i> 
      <!-- <img src="img/sponsor.png" width="125" height="30" alt=""> -->
    </div>
  </div>

  <section class="footer-bottom">
    <div>
      <p>© 2025 Sejahtera Photography. All rights reserved.</p>
      <a href="#">Kebijakan Privasi</a>
      <a href="#">Syarat Layanan</a>
      <a href="#">Pengaturan Cookies</a>
    </div>
  </section>
</footer>

</body>
</html>