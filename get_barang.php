<?php
include_once 'database/database.php';

// Mengecek apakah ada ID barang yang diberikan
if (isset($_GET['idbarang'])) {
    $idbarang = $_GET['idbarang'];
    
    // Membuat query untuk mengambil data barang berdasarkan ID
    $conn = getConnection();
    $query = "SELECT * FROM barang WHERE idbarang = :idbarang";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':idbarang', $idbarang);
    $stmt->execute();

    // Mengambil data dan mengembalikannya dalam format JSON
    $barang = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($barang);
}
?>
