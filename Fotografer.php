<!DOCTYPE html>
<html>
<head>
    <title>Fotografer_2</title>
    <link rel="stylesheet" href="Assets/css/style.css">
</head>
<body>
    <h1 style="text-align: center;">
        Abadikan Momen Indah <br> Anda bersama Studio <br> Fotografi Sejahtera 
    </h1>
    <p style="font-size: 10px; text-align: center;">
        Kami siap membantu Anda menangkap setiap momen berharga dalam hidup. Dengan 
        <br> pengalaman dan keahlian, kami menjamin hasil yang memuaskan.
    </p>
    <div style="display: flex; justify-content: center; margin: 20px;">
        <button style="margin-right: 5px; border-radius: 0px; background-color: black; color: white; height: 30px; width: 50px; font-size: 10px;">Lihat</button>
        <button style="margin-left: 5px; border-radius: 0px; background-color: white; height: 30px; width: 50px; font-size: 10px;">Paket</button>
    </div>
    <img src="./Assets/download.jpg" class="img-atas">

    <div class="ayu">
        <h2>Paket Foto Menarik untuk Setiap</h2>
        <h2>Momen Spesial Anda Bersama Kami</h2>

        <div class="packages">
            <div class="package">
                <img src="./Assets/gambar.jpeg" alt="Pilih Paket">
                <h3>Pilih Paket yang Sesuai dengan Kebutuhan dan Anggaran Anda</h3>
                <p>Kami menawarkan berbagai paket foto untuk setiap momen berharga Anda.</p>
                <a href="#">Lihat ></a>
            </div>

            <div class="package">
                <img src="./Assets/gambar.jpeg" alt="Paket Prewedding">
                <h3>Paket Prewedding: Ciptakan Kenangan Indah Sebelum Hari Bahagia Anda</h3>
                <p>Paket dirancang untuk momen-momen romantis Anda.</p>
                <a href="#">Lihat ></a>
            </div>

            <div class="package">
                <img src="./Assets/gambar.jpeg" alt="Paket Wisuda">
                <h3>Paket Wisuda: Rayakan Keberhasilan Anda dengan Foto yang Memukau</h3>
                <p>Abadikan momen kelulusan Anda dengan foto yang penuh makna.</p>
                <a href="#">Lihat ></a>
            </div>
        </div>
    </div>

    <div class="container">
    <h1 style="text-align:center">Galeri Foto</h1>
    <p style="text-align:center">Lihat hasil pemotretan terbaik kami di sini.</p><br>
    <div class="gallery">
      <img src="./Assets/foto1.jpg" alt="Foto 1" width="320">
      <img src="./Assets/foto2.jpg" alt="Foto 1" width="320">
      <img src="./Assets/foto3.jpg" alt="Foto 1" width="320">
    </div>

    <div class="contact">
      <div>
        <p>Kontak</p>
        <h2>Hubungi Kami</h2>
        <p>Kami siap membantu Anda dengan pertanyaan apa pun.</p>
        <p><img src="./Assets/email.jpg" alt="Foto 1" width="20">info@studiofotografisejahtera.com</p>
        <p><img src="./Assets/telpon.jpg" alt="Foto 1" width="20">+62 812 2456 7890</p>
        <p><img src="./Assets/lokasi.jpg" alt="Foto 1" width="20">Jl. Contoh No. 123, Jakarta 10100.ID</p>
      </div>

      <form>
        <div class="grid-2">
          <div>
            <label>Nama Depan</label>
            <input type="text" name="first" required>
          </div>
          <div>
            <label>Nama Belakang</label>
            <input type="text" name="last">
          </div>
        </div>

        <div class="grid-2 mt-20">
          <div>
            <label>Email</label>
            <input type="email" name="email" required>
          </div>
          <div>
            <label>Nomor Telepon</label>
            <input type="tel" name="phone">
          </div>
        </div>

        <div class="mt-20">
          <label>Pilih Topik</label>
          <select name="topic" required>
            <option value="">Pilih satu...</option>
            <option value="Prewedding">Prewedding</option>
            <option value="Produk">Produk/Komersial</option>
            <option value="Acara">Acara/Keluarga</option>
            <option value="Kerjasama">Kerja Sama</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </div>

        <div class="radio-group">
          <label style = "margin-bottom: 10px;">Apa yang Anda butuhkan?</label>
            <div class="radio-options">
                <label><input type="radio" name="opsi" value="1"> Pilihan Pertama</label>
                <label><input type="radio" name="opsi" value="2"> Pilihan Kedua</label>
                <label><input type="radio" name="opsi" value="3"> Pilihan Ketiga</label>
                <label><input type="radio" name="opsi" value="4"> Pilihan Keempat</label>
                <label><input type="radio" name="opsi" value="5"> Pilihan Kelima</label>
                <label><input type="radio" name="opsi" value="6"> Lainnya</label>
            </div>
        </div>

        <div style=" margin-bottom: 15px;">
          <label for="pesan">Pesan</label>
          <textarea id="pesan" name="message" rows="4" placeholder="Ketik pesan Anda..."></textarea>
        </div>
  
       <div class="checkbox-area">
          <input type="checkbox" id="setuju" name="setuju" value="1" required>
          <label for="setuju">Saya setuju dengan Syarat</label>
        </div>

        <button class="btn mt-15" type="submit">Kirim</button>
      </form>
    </div>
  </div>
</body>
</html>