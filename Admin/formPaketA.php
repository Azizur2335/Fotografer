<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Panel Admin - Paket Foto</title>
  <style>
    body { 
      font-family: Arial, sans-serif; 
      margin: 0; 
      padding: 20px; 
      background: #f5f5f5;
    }
    h1, h2 { margin-bottom: 10px; }
    form, .list {
      background: #fff;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    label { display: block; margin-top: 10px; font-weight: bold; }
    input, textarea, button {
      width: 100%; 
      padding: 8px; 
      margin-top: 6px; 
      border: 1px solid #ccc; 
      border-radius: 4px;
      font-size: 14px;
    }
    button {
      background: #343434ff; 
      color: white; 
      border: none; 
      cursor: pointer; 
      transition: background 0.3s;
    }
    button:hover { background: #6d6d6dff; }
    .item {
      border: 1px solid #ddd; 
      padding: 12px; 
      margin-bottom: 10px; 
      display: flex; 
      justify-content: space-between; 
      align-items: center; 
      background: #fafafa; 
      border-radius: 6px;
    }
    .btn-kembali {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 14px;
    background: #343434;
    color: #fff;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    transition: background 0.3s;
    }
    .btn-kembali:hover {
      background: #6d6d6d;
    }
    .error { color: red; font-size: 14px; margin-top: 5px; }
    .actions button {
      width: auto;
      margin-left: 6px;
      padding: 6px 12px;
      font-size: 13px;
    }
    .actions {
      display: flex;
      flex-shrink: 0;
    }
    .back {
      width: 150px;
      margin-left: 15px;
    }
    .back a {
      text-decoration: none;
      color: #fff;
    }
  </style>
  <script>
    function resetPaket() {
      document.getElementById('formPaket').reset();
      document.getElementById('errorHarga').style.display = 'none';
    }
  </script>
</head>
<body>
  <h2>Tambah Paket Foto</h2>
  <?php if(isset($_GET['success'])): ?>
  <p style="color:green;">Data paket berhasil disimpan!</p>
  <?php endif; ?>

  <form id="formPaket" method="POST" action="../backend/upload_paket.php" enctype="multipart/form-data">
    <input type="hidden" id="paketId" name="paketId">
    
    <label>Nama Paket:
      <input type="text" id="namaPaket" name="namaPaket" required>
    </label>
    
    <label>Harga (IDR):
      <input type="number" id="hargaPaket" name="hargaPaket" min="0" required>
    </label>
    <div id="errorHarga" class="error" style="display:none;">Harga tidak boleh kosong atau negatif</div>
    
    <label>Deskripsi:
      <textarea id="deskripsiPaket" name="deskripsiPaket"></textarea>
    </label>
    
    <label>Foto Paket:
      <input type="file" id="fotoPaket" name="fotoPaket" accept="image/*" required>
    </label>
    
    <button type="submit">Simpan</button>
    <button type="button" onclick="resetPaket()">Reset</button>
  </form>
  <a href="index.php" class="btn-kembali">← Kembali</a>
</body>
</html>
