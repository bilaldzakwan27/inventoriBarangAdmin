<?php
include 'functions/function_pembelian.php'; // Pastikan Anda menghubungkan fungsi koneksi DB yang benar
include_once 'database/database.php';

if (isset($_GET['idpenjualan'])) {
    $idpenjualan = $_GET['idpenjualan'];
    $conn = getConnection(); // Fungsi untuk koneksi database
    $sql = "SELECT * FROM penjualan WHERE idpenjualan = :idpenjualan";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idpenjualan', $idpenjualan, PDO::PARAM_INT);
    $stmt->execute();
    $penjualan = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($penjualan) {
        echo json_encode($penjualan); // Kembalikan data dalam format JSON
    } else {
        echo json_encode(["error" => "Data not found"]);
    }
} else {
    echo json_encode(["error" => "Invalid request"]);
}
?>
