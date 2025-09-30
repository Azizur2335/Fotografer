<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $from = isset($_GET['from']) ? $_GET['from'] : 'list';
    
    $stmt = $koneksi->prepare("DELETE FROM pesan_masuk WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if($stmt->execute()) {
        $stmt->close();
        header("Location: ../Admin/index.php?page=pesan&status=deleted");
        exit();
    } else {
        $stmt->close();
        header("Location: ../Admin/index.php?page=pesan&status=error");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}