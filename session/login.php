<?php
session_start();
include "koneksi.php";

$username = $_POST['email'];
$password = $_POST['password'];

// Mengecek kondisi jika user ada atau tidak
$sql_user = mysqli_query($mysqli, "SELECT * FROM akun WHERE email='$email' AND password='$password'");
$cek_user = mysqli_num_rows($sql_user);

if ($cek_user > 0) {
    $_SESSION['login'] = true;
    header('Location: ../dashboard.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}