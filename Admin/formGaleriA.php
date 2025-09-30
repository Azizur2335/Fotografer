<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Panel Admin - Galeri</title>
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
    input, button {
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
      background: #fafafa; 
      border-radius: 6px;
    }
    .thumbs {
      display: flex;
      flex-wrap: wrap;
      margin-top: 8px;
    }
    .thumbs img { 
      width: 80px; 
      height: 80px; 
      object-fit: cover; 
      margin-right: 6px; 
      margin-bottom: 6px;
      border-radius: 4px; 
      border: 1px solid #ccc; 
    }
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
</head>
<body>
  <h2>Tambah Galeri</h2>
  <form id="formGaleri" action="../backend/upload_galeri.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" id="galeriId" name="id">
    <label>Judul Galeri:
      <input type="text" id="judulGaleri" name="judul" required>
    </label>
    <label>Pilih Foto (bisa banyak):
      <input type="file" id="fileGaleri" name="gambar[]" accept="image/*" multiple>
    </label>
    <div id="previewFoto" class="thumbs"></div>
    <button type="submit">Simpan</button>
    <button type="button" onclick="resetGaleri()">Reset</button>
  </form>
  .back {
      width: 150px;
      margin-left: 15px;
    }
    .back a {
      text-decoration: none;
      color: #fff;
    }
</body>
</html>
