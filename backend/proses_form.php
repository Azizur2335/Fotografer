<?php
require 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari form langsung
    $first   = $_POST['first'] ?? '';
    $last    = $_POST['last'] ?? '';
    $email   = $_POST['email'] ?? '';
    $phone   = $_POST['phone'] ?? '';
    $topic   = $_POST['topic'] ?? '';
    $opsi    = $_POST['opsi'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validasi semua field terisi
    if (!$first || !$last || !$email || !$phone || !$topic || !$opsi || !$message) {
        echo "<script>alert('Semua field harus diisi!'); window.location='Fotografi.php';</script>";
        exit();
    }

    // Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Email tidak valid!'); window.location='Fotografi.php';</script>";
        exit();
    }

    // Validasi checkbox persetujuan
    if (!isset($_POST['setuju'])) {
        echo "<script>alert('Anda harus menyetujui syarat dan ketentuan!'); window.location='Fotografi.php';</script>";
        exit();
    }

    // Prepared statement untuk simpan data
    $stmt = $koneksi->prepare("INSERT INTO pesan_masuk (first, last, email, phone, topic, opsi, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisss", $first, $last, $email, $phone, $topic, $opsi, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Pesan berhasil dikirim! Terima kasih.'); window.location='Fotografi.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan. Silakan coba lagi.'); window.location='Fotografi.php';</script>";
    }

    $stmt->close();
} else {
    header("Location: Fotografi.php");
    exit();
}
?>
