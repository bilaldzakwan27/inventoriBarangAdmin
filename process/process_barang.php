<?php
require_once '../database/database.php';
require_once '../functions/function_barang.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menambahkan Barang
    if (isset($_POST['add'])) {
        $namabarang = $_POST['namabarang'];
        $kategori = $_POST['kategori'];
        $hargabeli = $_POST['hargabeli'];
        $hargajual = $_POST['hargajual'];
        $stok = $_POST['stok'];

        // Handle gambar yang di-upload
        $gambar = null;
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
            $gambar = file_get_contents($_FILES['gambar']['tmp_name']);  // Membaca file gambar menjadi binary
        }

        // Menambahkan barang ke database
        if (addBarang($namabarang, $kategori, $hargabeli, $hargajual, $stok, $gambar)) {
            header("Location: ../barang.php");
        } else {
            echo "Error: Gagal menambahkan barang!";
        }
    }

    // Mengupdate Barang
    if (isset($_POST['update'])) {
        $idbarang = $_POST['idbarang'];
        $namabarang = $_POST['namabarang'];
        $kategori = $_POST['kategori'];
        $hargabeli = $_POST['hargabeli'];
        $hargajual = $_POST['hargajual'];
        $stok = $_POST['stok'];

        // Handle gambar yang di-upload jika ada
        $gambar = null;
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
            $gambar = file_get_contents($_FILES['gambar']['tmp_name']);
        }

        // Update barang di database
        if (updateBarang($idbarang, $namabarang, $kategori, $hargabeli, $hargajual, $stok, $gambar)) {
            header("Location: ../barang.php");
        } else {
            echo "Error: Gagal mengupdate barang!";
        }
    }

    // Menghapus Barang
    if (isset($_POST['delete'])) {
        $idbarang = $_POST['idbarang'];
        if (deleteBarang($idbarang)) {
            header("Location: ../barang.php");
        } else {
            echo "Error: Gagal menghapus barang!";
        }
    }
}
?>
