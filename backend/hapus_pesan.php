<?php
require 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($id > 0) {
        $stmt = $koneksi->prepare("DELETE FROM pesan_masuk WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $stmt->close();
            mysqli_close($koneksi);
            echo "<script>alert('Pesan berhasil dihapus.'); window.location='../Admin/index.php';</script>";
            exit();
        } else {
            $stmt->close();
            mysqli_close($koneksi);
            echo "<script>alert('Terjadi kesalahan saat menghapus pesan.'); window.location='../Admin/index.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('ID tidak valid.'); window.location='../Admin/index.php';</script>";
        exit();
    }
} else {
    header("Location: ../Admin/index.php");
    exit();
}
?>
