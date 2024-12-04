<?php
require_once '../functions/function_login.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa login admin
    $admin = checkAdminLogin($username, $password);

    if ($admin) {
        // Jika login berhasil, simpan data di session
        $_SESSION['admin_id'] = $admin['admin_id'];
        $_SESSION['username'] = $admin['username'];

        // Redirect ke halaman dashboard atau halaman utama
        header("Location: ../index.php"); // Sesuaikan dengan halaman tujuan setelah login
        exit();
    } else {
        // Jika login gagal, arahkan kembali ke halaman login dengan pesan error
        header("Location: ../login.php?error=1");
        exit();
    }
}
?>
