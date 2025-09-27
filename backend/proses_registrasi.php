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
        
        try {
            if($stmt->execute()){
                echo "<script>alert('REGISTRASI BERHASILLL YEYYY <br> Selamat yaa, " . $nama . "!! Data kamu telah berhasil disimpan xD.'); window.location.href='../SignIn.php';</script>";
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) { // kode duplicate entry
                echo "<p style='text-align: center; color: red;'> ERROR: EMAIL " . $email . " SUDAH TERDAFTAR. <br> <a href='../SignUp.php' style='text-decoration: none; color: red;'>Kembali</a></p>";
            } else {
                echo "Error saat registrasi: " . $e->getMessage();
            }
        }
    }
} else {
    header('Location: ../SignIn.php');
    exit();
}
$koneksi->close();
?>