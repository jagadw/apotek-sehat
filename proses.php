<?php
include "koneksi.php";
session_start();

$user = $_POST['username'];
$pass = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE username='$user'");
$baris_level = mysqli_fetch_assoc($query);
$leveluser = $baris_level['leveluser'];
$hash = $baris_level['password'];
// echo $cek = mysqli_num_rows($query);

if(password_verify($pass, $hash)) {
    $_SESSION['username'] = $user;
    $_SESSION['leveluser'] = $leveluser;
    header('location: dashboard.php?page=main&pesan=Login_Berhasil');
} else {
    echo "<script>alert('Username atau password tidak valid!');window.location.href='index.php'</script>";
}
?>