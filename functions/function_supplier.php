<?php
include 'database/database.php';

// Fungsi untuk mengambil semua supplier
function getAllSupplier() {
    $conn = getConnection();
    $query = "SELECT * FROM supplier";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fungsi untuk menambah supplier
function addSupplier($namasupplier, $alamat, $telepon) {
    $conn = getConnection();
    $query = "INSERT INTO supplier (namasupplier, alamat, telepon) 
              VALUES (:namasupplier, :alamat, :telepon)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':namasupplier', $namasupplier);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':telepon', $telepon);
    return $stmt->execute();
}

// Fungsi untuk mengupdate supplier
function updateSupplier($idsupplier, $namasupplier, $alamat, $telepon) {
    $conn = getConnection();
    $query = "UPDATE supplier SET namasupplier = :namasupplier, alamat = :alamat, telepon = :telepon 
              WHERE idsupplier = :idsupplier";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':idsupplier', $idsupplier);
    $stmt->bindParam(':namasupplier', $namasupplier);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':telepon', $telepon);
    return $stmt->execute();
}

// Fungsi untuk menghapus supplier
function deleteSupplier($idsupplier) {
    $conn = getConnection();
    $query = "DELETE FROM supplier WHERE idsupplier = :idsupplier";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':idsupplier', $idsupplier);
    return $stmt->execute();
}

// Fungsi untuk mengambil data supplier berdasarkan ID
function getSupplierById($idsupplier) {
    $conn = getConnection();
    $query = "SELECT * FROM supplier WHERE idsupplier = :idsupplier";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':idsupplier', $idsupplier);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}