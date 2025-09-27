<?php
require '../backend/koneksi.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $result = $koneksi->query("SELECT foto FROM paket_foto WHERE id = $id");
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $fileFoto = "../Admin/paket/" . $row['foto'];

        if (file_exists($fileFoto)) {
            unlink($fileFoto);
        }

        $stmt = $koneksi->prepare("DELETE FROM paket_foto WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: ../Admin/formPaketA.php");
    exit();
} else {
    die("ID paket tidak ditemukan.");
}
?>
