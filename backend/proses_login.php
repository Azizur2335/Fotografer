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
            $_SESSION['id'] = $row['id'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['email'] = $row['email'];

            header("Location: ../Fotografi.php");
            exit;
        } else {
            echo "<script>alert('PASSWORD YANG KAMU MASUKIN SALAH WOYYY!!'); window.location.href='../SignIn.php';</script>";
        }
    } else {
        echo "<script>alert('EMAIL APE KAU TULIS TU DAWG, GAADA WOYYY!!!!'); window.location.href='../SignIn.php';</script>";
    }
    $stmt->close();
}
$koneksi->close();
?>
