<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // ambil nama file dulu
    $stmt = $koneksi->prepare("SELECT gambar FROM galeri WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($fileName);
    $stmt->fetch();
    $stmt->close();

    if ($fileName) {
        $filePath = "../Admin/galeri/" . $fileName;

        // hapus record dari database
        $stmt = $koneksi->prepare("DELETE FROM galeri WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $stmt->close();

            // hapus file di folder jika ada
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            header("Location: ../Admin/formGaleriA.php?status=deleted");
            exit();
        } else {
            echo "Gagal menghapus data.";
        }
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "Parameter id tidak valid.";
}
?>
