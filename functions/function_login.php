<?php
require_once '../database/database.php';

// Fungsi untuk memverifikasi login admin
function checkAdminLogin($username, $password) {
    $conn = getConnection();
    
    // Query untuk mendapatkan admin berdasarkan username
    $query = "SELECT * FROM admin WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika admin ditemukan dan password cocok
    if ($admin && $admin['password'] === $password) {
        return $admin; // Kembalikan data admin
    }

    return false; // Login gagal
}
?>
