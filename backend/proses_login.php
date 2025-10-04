<?php
session_start();
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM data_user WHERE email = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password'])) {

            // Simpan data user ke session
            $_SESSION['id'] = $row['id'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];  // Simpan role

            // Redirect berdasarkan role
            if($row['role'] === 'admin') {
                header("Location: ../Admin/index.php");
            } else {
                header("Location: ../index.php");
            }
            exit;

        } else {
            echo "<script>alert('PASSWORD YANG KAMU MASUKKAN SALAH!!'); window.location.href='../SignIn.php';</script>";
        }
    } else {
        echo "<script>alert('EMAIL YANG KAMU MASUKKAN SALAH!!'); window.location.href='../SignIn.php';</script>";
    }
    $stmt->close();
}
$koneksi->close();
?>
