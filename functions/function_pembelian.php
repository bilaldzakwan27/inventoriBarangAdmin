<?php
require_once '../database/database.php';

// Fungsi untuk mengambil semua data penjualan
function getAllPenjualan() {
    $conn = getConnection(); // Gunakan koneksi PDO
    $sql = "SELECT * FROM penjualan";
    $stmt = $conn->query($sql); // Query dengan PDO
    $penjualanList = [];
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $penjualanList[] = $row;
    }
    
    return $penjualanList;
}

// Fungsi untuk menambahkan data penjualan
function addPenjualan($tanggal, $idcustomer, $code) {
    $conn = getConnection(); // Gunakan koneksi PDO
    $sql = "INSERT INTO penjualan (tanggal, idcustomer, code) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql); // Persiapkan query
    return $stmt->execute([$tanggal, $idcustomer, $code]); // Eksekusi dengan parameter
}

// Fungsi untuk mengupdate data penjualan
function updatePenjualan($idpenjualan, $tanggal, $idcustomer, $code) {
    $conn = getConnection(); // Gunakan koneksi PDO
    $sql = "UPDATE penjualan SET tanggal = ?, idcustomer = ?, code = ? WHERE idpenjualan = ?";
    $stmt = $conn->prepare($sql); // Persiapkan query
    return $stmt->execute([$tanggal, $idcustomer, $code, $idpenjualan]); // Eksekusi dengan parameter
}

// Fungsi untuk menghapus data penjualan
function deletePenjualan($idpenjualan) {
    $conn = getConnection(); // Gunakan koneksi PDO
    $sql = "DELETE FROM penjualan WHERE idpenjualan = ?";
    $stmt = $conn->prepare($sql); // Persiapkan query
    return $stmt->execute([$idpenjualan]); // Eksekusi dengan parameter
}
?>
