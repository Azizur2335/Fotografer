<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom right, #f6efedff, #cdaaaaff);
      color: #32201cff;
    }
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
      background-color: #cdaaaaff;
      box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
    }
    .logo{
      font-weight: bold;
    }
    nav {
      display: flex;
      gap: 25px;
      font-size: 14px;
      align-items: center;
    }
    nav a {
      text-decoration: none;
      color: #32201cff;
      transition: color 0.3s;
    }
    nav a:hover {
      color: #472d27ff;
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
      background-color: #32201cff;
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
      color: #32201cff;
    }
    button a {
      color: inherit;
      text-decoration: none;
      display: inline-block;
      width: 100%;
      height: 100%;
    }
    button a:hover {
      color: inherit;
    }
    .btn {
      background: #32201cff(0, 0, 0); 
      color: white; 
      padding: 6px 12px;
      text-decoration: none; 
      border-radius: 4px;
    }
    .btn.second {
      background: transparent;
      color: black; /* bisa diganti sesuai tema */
      border: 1px solid black;
      padding: 8px 16px;
      border-radius: 4px;
      margin: 0 5px; /* jarak antar tombol */
      text-decoration: none;
      display: inline-block;
      transition: all 0.3s;
    }
    .btn.second:hover {
      background: #32201cff;
      color: white;
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
      grid-template-columns: repeat(3, 1fr); /* 3 kolom */
      gap: 20px;                             /* jarak antar card */
      margin: 40px 30px;
      padding: 20px;
    }
    .card {
      background-color: #fff;
      border: 2px solid #32201cff;   /* border kotak tiap card */
      padding: 40px;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card a {
      text-decoration: none;    /* hilangkan underline */
      color: #32201cff;
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
      object-fit: cover;
      border-color: #32201cff;  /* gambar dipotong biar proporsi terjaga */
      border-radius: 8px; /* biar rapi */
    }
    /* Kontak */
    .kontak-container{
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      max-width: 1100px;
      margin: auto;
      padding: 40px 0px;
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
      background: #32201cff;
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
      background-color: #cdaaaaff;
      box-shadow: 20px 10px 5px rgba(0, 0, 0, 0.05);
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
      scrollbar-width: none;
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
      color: #32201cff;
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
      color: #32201cff;
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
        <a href="#Kontak-kami">Kontak kami</a>
      </nav>
      <a href="SignIn.php" class="hubungi-btn">Log In</a>
  </header>
  <!-- Tentang Kami -->
  <section id="Tentang-kami">
   <div style=" padding: 100px 0; text-align: center; color: white;">
    <h1>
      Abadikan Momen Indah Anda bersama Studio<br>Fotografi Sejahtera 📸
    </h1>
    <p style="text-align: center; color: black;">
      <br>Kami siap membantu Anda menangkap setiap momen berharga dalam hidup.<br> 
      Dengan pengalaman dan keahlian, kami menjamin hasil yang memuaskan. <br><br>
    </p><br>
    <p style="text-align: center;">
      <a href="user/GaleriUser.php" class="btn second">Lihat</a>
      <a href="user/PaketFoto.php" class="btn second">Paket</a>
    </p>
  </div>
  </section>
  <!-- Paket Foto -->
  <section id="Paket-foto">
    <h2>Paket Foto Menarik untuk Setiap Momen</h2>
    <div class="grid-3">
      <div class="card">
        <i class='bx bx-camera'></i>
        <h3>Paket Prewedding</h3>
        <p>Momen romantis sebelum hari bahagia.</p>
        <a href="user/PaketFoto.php">Lihat &rsaquo;</a>
      </div>
      <div class="card">
        <i class='bx bx-camera'></i>
        <h3>Paket Wisuda</h3>
        <p>Abadikan kelulusan Anda dengan foto yang memukau.</p>
        <a href="user/PaketFoto.php">Lihat &rsaquo;</a>
      </div>
      <div class="card">
        <i class='bx bx-camera'></i>
        <h3>Paket Ulang Tahun</h3>
        <p>Rayakan ulang tahun dengan foto kenangan.</p>
        <a href="user/PaketFoto.php">Lihat &rsaquo;</a>
      </div>
    </div>
  </section>
  <!-- Galeri -->
  <section id="Galeri">
    <h2>Galeri Foto</h2>
    <p style="text-align: center">Lihat hasil pemotretan terbaik kami di sini</p><br>
    <div class="gallery">
      <div class="gallery img">
        <img src="img/Sylus2.jpg">
      </div>
      <div class="gallery img">
        <img src="img/Sylus1.jpg">
      </div>
      <div class="gallery img">
        <img src="img/Sylus3.jpg">
      </div>
    </div>
  </section>
  <!-- Kontak Kami -->
  <section id="Kontak-kami">
    <div class="kontak-container">

    <!-- Kontak info -->
      <div class="kontak-info">
        <h2 style="text-align: ">Hubungi Kami</h2>
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
      </div>
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
    </div>
  </section>
</footer>

</body>
</html>