<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = htmlspecialchars($_POST['judul']);
    $files = $_FILES['gambar'];
    $targetDir = "../Admin/galeri/";

    for ($i = 0; $i < count($files['name']); $i++) {
        if ($files['error'][$i] === UPLOAD_ERR_OK) {
            $fileName = time() . "_" . basename($files['name'][$i]);
            $targetFile = $targetDir . $fileName;

            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $allowed = ["jpg", "jpeg", "png", "gif"];

            if (in_array($fileType, $allowed)) {
                if (move_uploaded_file($files['tmp_name'][$i], $targetFile)) {
                    $stmt = $koneksi->prepare("INSERT INTO galeri (judul, gambar) VALUES (?, ?)");
                    $stmt->bind_param("ss", $judul, $fileName);
                    $stmt->execute();
                    $stmt->close();
                } else {
                    echo "Gagal upload file: " . htmlspecialchars($files['name'][$i]) . "<br>";
                }
            } else {
                echo "Format file tidak diizinkan: " . htmlspecialchars($files['name'][$i]) . "<br>";
            }
        }
    }

    header("Location: ../Admin/formGaleriA.php");
    exit();
}
?>