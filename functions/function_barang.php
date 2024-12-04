<?php
include 'database/database.php';

// Fungsi untuk mengambil semua barang (termasuk gambar dalam bentuk base64)
function getAllBarang() {
    $conn = getConnection();
    $query = "SELECT idbarang, namabarang, kategori, hargabeli, hargajual, stok, gambar FROM barang";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    
    $barangList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mengonversi gambar menjadi base64
    foreach ($barangList as &$barang) {
        if ($barang['gambar']) {
            $barang['gambar_base64'] = 'data:image/jpeg;base64,' . base64_encode($barang['gambar']);
        } else {
            $barang['gambar_base64'] = null;
        }
    }

    return $barangList;
}


// Fungsi untuk menambah barang (termasuk gambar)
function addBarang($namabarang, $kategori, $hargabeli, $hargajual, $stok, $gambar) {
    $conn = getConnection();
    
    // Query untuk menambah barang (termasuk gambar)
    $query = "INSERT INTO barang (namabarang, kategori, hargabeli, hargajual, stok, gambar) 
              VALUES (:namabarang, :kategori, :hargabeli, :hargajual, :stok, :gambar)";
    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bindParam(':namabarang', $namabarang);
    $stmt->bindParam(':kategori', $kategori);
    $stmt->bindParam(':hargabeli', $hargabeli);
    $stmt->bindParam(':hargajual', $hargajual);
    $stmt->bindParam(':stok', $stok);
    $stmt->bindParam(':gambar', $gambar, PDO::PARAM_LOB);

    return $stmt->execute();
}

// Fungsi untuk mengupdate barang
function updateBarang($idbarang, $namabarang, $kategori, $hargabeli, $hargajual, $stok, $gambar = null) {
    $conn = getConnection();
    $query = "UPDATE barang SET namabarang = :namabarang, kategori = :kategori, hargabeli = :hargabeli, 
              hargajual = :hargajual, stok = :stok";
    
    if ($gambar !== null) {
        $query .= ", gambar = :gambar";
    }

    $query .= " WHERE idbarang = :idbarang";

    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bindParam(':idbarang', $idbarang);
    $stmt->bindParam(':namabarang', $namabarang);
    $stmt->bindParam(':kategori', $kategori);
    $stmt->bindParam(':hargabeli', $hargabeli);
    $stmt->bindParam(':hargajual', $hargajual);
    $stmt->bindParam(':stok', $stok);

    if ($gambar !== null) {
        $stmt->bindParam(':gambar', $gambar, PDO::PARAM_LOB);
    }

    return $stmt->execute();
}

// Fungsi untuk menghapus barang
function deleteBarang($idbarang) {
    $conn = getConnection();
    $query = "DELETE FROM barang WHERE idbarang = :idbarang";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':idbarang', $idbarang);
    return $stmt->execute();
}

// Fungsi untuk mengambil data barang berdasarkan ID
function getBarangById($idbarang) {
    $conn = getConnection();
    $query = "SELECT * FROM barang WHERE idbarang = :idbarang";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':idbarang', $idbarang);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
