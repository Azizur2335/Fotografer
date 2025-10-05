<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotografer_2</title>
    <link rel="stylesheet" href="Assets/css/style.css">
</head>
<body class="body-lp">
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
    <section id="Tentan-kami">
      <h1 style="text-align: center; margin-top: 20px;">
          Abadikan Momen Indah <br> Anda bersama Studio <br> Fotografi Sejahtera 
      </h1>
      <p style="font-size: 10px; text-align: center;">
          Kami siap membantu Anda menangkap setiap momen berharga dalam hidup. Dengan 
          <br> pengalaman dan keahlian, kami menjamin hasil yang memuaskan.
      </p>
      <div style="display: flex; justify-content: center; margin: 20px;">
          <button class="btn-hero-w">
            <a href="user/GaleriUser.php">Lihat</a></button>
          <button class="btn-hero-b">
            <a href="user/PaketFoto.php">Paket</a></button>
      </div>
      <img src="./Assets/download.jpg" class="img-atas">
    </section>

    <div class="ayu" id="Paket-foto">
        <h2>Paket Foto Menarik untuk Setiap</h2>
        <h2>Momen Spesial Anda Bersama Kami</h2>
        <div class="packages">
            <div class="package">
                <img src="./Assets/gambar.jpg" alt="Pilih Paket">
                <h3>Pilih Paket yang Sesuai dengan Kebutuhan dan Anggaran Anda</h3>
                <p>Kami menawarkan berbagai paket foto untuk setiap momen berharga Anda.</p>
                <a href="#">Lihat ></a>
            </div>
            <div class="package">
                <img src="./Assets/gambar.jpg" alt="Paket Prewedding">
                <h3>Paket Prewedding: Ciptakan Kenangan Indah Sebelum Hari Bahagia Anda</h3>
                <p>Paket dirancang untuk momen-momen romantis Anda.</p>
                <a href="#">Lihat ></a>
            </div>
            <div class="package">
                <img src="./Assets/gambar.jpg" alt="Paket Wisuda">
                <h3>Paket Wisuda: Rayakan Keberhasilan Anda dengan Foto yang Memukau</h3>
                <p>Abadikan momen kelulusan Anda dengan foto yang penuh makna.</p>
                <a href="#">Lihat ></a>
            </div>
        </div>
    </div>

    <div class="container-lp" id="Galeri">
        <h1 class="title-center-lp">Galeri Foto</h1>
        <p class="subtitle-center-lp">Lihat hasil pemotretan terbaik kami di sini.</p><br>
        <div class="gallery-lp">
            <img src="./Assets/foto1.jpg" alt="Foto 1">
            <img src="./Assets/foto2.jpg" alt="Foto 2">
            <img src="./Assets/foto3.jpg" alt="Foto 3">
        </div>

        <div class="contact-lp" id="Kontak-kami">
            <div class="contact-info-lp">
                <p class="contact-label-lp">Kontak</p>
                <h2 class="contact-title-lp">Hubungi Kami</h2>
                <p class="contact-desc-lp">Kami siap membantu Anda dengan pertanyaan apa pun.</p>
                <p class="contact-item-lp">
                    <img src="./Assets/email.jpg" alt="Email" width="20">info@studiofotografisejahtera.com
                </p>
                <p class="contact-item-lp">
                    <img src="./Assets/telpon.jpg" alt="Telepon" width="20">+62 812 2456 7890
                </p>
                <p class="contact-item-lp">
                    <img src="./Assets/lokasi.jpg" alt="Lokasi" width="20">Jl. Contoh No. 123, Jakarta 10100.ID
                </p>
            </div>

            <form class="form-lp" action="backend/proses_form.php" method="POST">
                <div class="grid-2-lp">
                    <div>
                        <label class="label-lp">Nama Depan</label>
                        <input type="text" name="first" required>
                    </div>
                    <div>
                        <label class="label-lp">Nama Belakang</label>
                        <input type="text" name="last">
                    </div>
                </div>

                <div class="grid-2-lp mt-20-lp">
                    <div>
                        <label class="label-lp">Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div>
                        <label class="label-lp">Nomor Telepon</label>
                        <input type="tel" name="phone">
                    </div>
                </div>

                <div class="mt-20-lp">
                    <label class="label-lp">Pilih Topik</label>
                    <select name="topic" required>
                        <option value="" disabled selected hidden>Pilih satu...</option>
                        <option value="Prewedding">Prewedding</option>
                        <option value="Produk">Produk/Komersial</option>
                        <option value="Acara">Acara/Keluarga</option>
                        <option value="Kerjasama">Kerja Sama</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="radio-group-lp">
                    <label class="label-lp mb-10-lp">Apa yang Anda butuhkan?</label>
                    <div class="radio-options-lp">
                        <label><input type="radio" name="opsi" value="1"> Konsultasi </label>
                        <label><input type="radio" name="opsi" value="2"> Buat Janji</label>
                        <label><input type="radio" name="opsi" value="3"> Booking</label>
                        <label><input type="radio" name="opsi" value="4"> Lainnya</label>
                    </div>
                </div>

                <div class="textarea-lp mb-15-lp">
                    <label for="pesan" class="label-lp">Pesan</label>
                    <textarea id="pesan" name="message" rows="4" placeholder="Ketik pesan Anda..."></textarea>
                </div>

                <div class="checkbox-area-lp">
                    <input type="checkbox" id="setuju" name="setuju" value="1" required>
                    <label for="setuju">Saya setuju dengan Syarat</label>
                </div>

                <button class="btn-lp mt-15-lp" type="submit">Kirim</button>
            </form>
        </div>
    </div>

      <section id="testimoni">
          <h2>Testimoni Pelanggan</h2>
          <p class="sub-title">Pengalaman luar biasa dengan Studio Fotografi Sejahtera.</p>
          <div class="testimonial-container" id="slider">
              <div class="testimonial-card">
                  <p class="quote">"Hasil foto yang sangat memuaskan dan profesional!"</p>
                  <div class="profile">
                      <i class='bx bx-user'></i>
                      <div class="profile-info">
                          <strong>Rina Sari</strong>
                          <span>Konsultan, PT. Maju</span>
                      </div>
                  </div>
              </div>
              <div class="testimonial-card">
                  <p class="quote">"Pengalaman yang tak terlupakan, sangat direkomendasikan!"</p>
                  <div class="profile">
                      <i class='bx bx-user'></i>
                      <div class="profile-info">
                          <strong>Andi Prasetyo</strong>
                          <span>Manager, CV. Kreatif</span>
                      </div>
                  </div>
              </div>
              <div class="testimonial-card">
                  <p class="quote">"Foto-foto yang dihasilkan sangat berkualitas!"</p>
                  <div class="profile">
                      <i class='bx bx-user'></i>
                      <div class="profile-info">
                          <strong>Siti Aminah</strong>
                          <span>Direktur, Studio XYZ</span>
                      </div>
                  </div>
              </div>
              <div class="testimonial-card">
                  <p class="quote">"Foto-foto yang dihasilkan sangat berkualitas!"</p>
                  <div class="profile">
                      <i class='bx bx-user'></i>
                      <div class="profile-info">
                          <strong>Siti Aminah</strong>
                          <span>Direktur, Studio XYZ</span>
                      </div>
                  </div>
              </div>
               <div class="testimonial-card">
                  <p class="quote">"Foto-foto yang dihasilkan sangat berkualitas!"</p>
                  <div class="profile">
                      <i class='bx bx-user'></i>
                      <div class="profile-info">
                          <strong>Siti Aminah</strong>
                          <span>Direktur, Studio XYZ</span>
                      </div>
                  </div>
              </div>
               <div class="testimonial-card">
                  <p class="quote">"Foto-foto yang dihasilkan sangat berkualitas!"</p>
                  <div class="profile">
                      <i class='bx bx-user'></i>
                      <div class="profile-info">
                          <strong>Siti Aminah</strong>
                          <span>Direktur, Studio XYZ</span>
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
                <i class='bxl bx-facebook-circle'></i> 
                <i class='bxl bx-instagram'></i> 
                <i class='bxl bx-twitter-x'></i> 
                <i class='bxl bx-linkedin-square'></i> 
                <i class='bxl bx-youtube'></i> 
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 Sejahtera Photography. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
