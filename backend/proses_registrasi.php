<?php
require_once 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (empty($nama) || empty($email) || empty($_POST['password'])) {
        echo "ERROR: ISI SEMUA DULU KOCAKKK!!! <a href='SignUp.php>Kembali</a>";
    } else {
        $query = "INSERT INTO data_user (nama, email, password) VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("sss", $nama, $email, $password);
        
        if($stmt->execute()){
            echo "<h1>REGISTRASI BERHASILLL YEYYY</h1>";
            echo "<p>Selamat yaa, " . $nama . "!! Data kamu telah berhasil disimpan xD.</p>";
            echo "<button><a href='../SignIn.php'>Kembali</a></button>";
        } else {
            if ($koneksi->errno == 1062){
                echo "<p style='text-align: center; color: red;'> ERROR: EMAIL " . $email . " SUDAH TERDAFTAR. <br> <a href='index.html' style='text-decoration: none; color: red;'>Kembali</a></p>";
            } else {
                echo "Error saat registrasi: " . $stmt->error . "<a href='../SignIn.php'>Kembali</a>";
            }
        } $stmt->close();
    }
} else {
    header('Location: ../SignIn.php');
    exit();
}
$koneksi->close();
?>