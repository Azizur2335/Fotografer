<?php
require 'koneksi.php';

// Ambil data paket saat GET untuk ditampilkan di form
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$paket = ['id'=>0,'nama_paket'=>'','harga'=>0,'deskripsi'=>'','foto'=>''];

if($id > 0){
    $stmt = $koneksi->prepare("SELECT * FROM paket_foto WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    if($res->num_rows > 0){
        $paket = $res->fetch_assoc();
    } else {
        die("Paket tidak ditemukan.");
    }
    $stmt->close();
}

// Proses update jika POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = isset($_POST['paketId']) ? (int)$_POST['paketId'] : 0;
    $nama   = htmlspecialchars($_POST['namaPaket']);
    $harga  = (int)$_POST['hargaPaket'];
    $desk   = htmlspecialchars($_POST['deskripsiPaket']);

    if($id <= 0) die("ID paket tidak valid.");

    // Ambil file lama
    $stmt = $koneksi->prepare("SELECT foto FROM paket_foto WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    $oldFoto = '';
    if($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $oldFoto = $row['foto'];
    }
    $stmt->close();

    // Upload file baru jika ada
    $fileName = $oldFoto;
    if(isset($_FILES['fotoPaket']) && $_FILES['fotoPaket']['error'] === UPLOAD_ERR_OK){
        $file = $_FILES['fotoPaket'];
        $targetDir = "../Admin/paket/";
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];

        if(!in_array($ext, $allowed)) die("Format file tidak diizinkan.");

        $fileName = time() . "_" . basename($file['name']);
        $targetFile = $targetDir . $fileName;

        if(!move_uploaded_file($file['tmp_name'], $targetFile)) die("Gagal upload file.");

        // Hapus file lama
        if(!empty($oldFoto) && file_exists($targetDir.$oldFoto)){
            unlink($targetDir.$oldFoto);
        }
    }

    // Update database
    $stmt = $koneksi->prepare("UPDATE paket_foto SET nama_paket=?, harga=?, deskripsi=?, foto=? WHERE id=?");
    $stmt->bind_param("sissi", $nama, $harga, $desk, $fileName, $id);
    if($stmt->execute()){
        $stmt->close();
        header("Location: ../backend/edit_paket.php?id=$id&update=1");
        exit();
    } else {
        die("Gagal update data: ".$stmt->error);
    }
}
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Paket Foto</title>
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
    .btn-kembali {
      display: inline-block;
      margin-top: 10px;
      padding: 8px 14px;
      background: #343434;
      color: #fff;
      padding: 10px 16px;
      border-radius: 6px;
      text-decoration: none;
      font-size: 14px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
      transition: background 0.3s;
    }
    .btn-kembali:hover {
      background: #6d6d6d;
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
  <h2>Edit Paket Foto</h2>

  <?php if(isset($_GET['update'])): ?>
    <p style="color:green;">Data paket berhasil diperbarui!</p>
  <?php endif; ?>

  <form id="formPaket" method="POST" action="../backend/edit_paket.php" enctype="multipart/form-data">
    <input type="hidden" id="paketId" name="paketId" value="<?= (int)$paket['id'] ?>">

    <label>Nama Paket:
      <input type="text" id="namaPaket" name="namaPaket" value="<?= htmlspecialchars($paket['nama_paket']) ?>" required>
    </label>

    <label>Harga (IDR):
      <input type="number" id="hargaPaket" name="hargaPaket" value="<?= htmlspecialchars($paket['harga']) ?>" min="0" required>
    </label>
    <div id="errorHarga" class="error" style="display:none;">Harga tidak boleh kosong atau negatif</div>

    <label>Deskripsi:
      <textarea id="deskripsiPaket" name="deskripsiPaket"><?= htmlspecialchars($paket['deskripsi']) ?></textarea>
    </label>

    <label>Foto Paket (biarkan kosong jika tidak ingin ganti):
      <input type="file" id="fotoPaket" name="fotoPaket" accept="image/*">
    </label>

    <button type="submit">Simpan Perubahan</button>
    <button type="button" onclick="resetPaket()">Reset</button>
  </form>
</body>
</html>
