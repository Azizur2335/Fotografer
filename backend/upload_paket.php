<?php
require 'koneksi.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = htmlspecialchars($_POST['namaPaket']);
    $harga  = (int) $_POST['hargaPaket'];
    $desk   = htmlspecialchars($_POST['deskripsiPaket']);
    $file   = $_FILES['fotoPaket'];
    $targetDir = "../Admin/paket/";

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Terjadi kesalahan saat upload file: " . $file['error']);
    }

    $fileName   = time() . "_" . basename($file['name']);
    $targetFile = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed  = ["jpg", "jpeg", "png", "gif"];

    if (!in_array($fileType, $allowed)) {
        die("Format file tidak diizinkan.");
    }

    if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
        die("Gagal upload file.");
    }

    $stmt = $koneksi->prepare(
        "INSERT INTO paket_foto (nama_paket, harga, deskripsi, foto) VALUES (?, ?, ?, ?)"
    );
    if (!$stmt) die("Gagal prepare statement: " . $koneksi->error);
    $stmt->bind_param("siss", $nama, $harga, $desk, $fileName);
    if (!$stmt->execute()) die("Gagal simpan ke database: " . $stmt->error);
    $stmt->close();

    // **Redirect relative path**
    header("Location: ../Admin/formPaketA.php?success=1");
    exit();
}
?>
