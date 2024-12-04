<?php
require_once '../database/database.php';
include_once '../functions/function_pembelian.php';


// Proses menambah data penjualan
if (isset($_POST['add'])) {
    $tanggal = $_POST['tanggal'];
    $idcustomer = $_POST['idcustomer'];
    $code = $_POST['code'];

    if (addPenjualan($tanggal, $idcustomer, $code)) {
        header("Location: ../pembelian.php?status=success");
    } else {
        header("Location: ../pembelian.php?status=error");
    }
}

// Proses update data penjualan
if (isset($_POST['update'])) {
    $idpenjualan = $_POST['idpenjualan'];
    $tanggal = $_POST['tanggal'];
    $idcustomer = $_POST['idcustomer'];
    $code = $_POST['code'];

    if (updatePenjualan($idpenjualan, $tanggal, $idcustomer, $code)) {
        header("Location: ../pembelian.php?status=success");
    } else {
        header("Location: ../pembelian.php?status=error");
    }
}

// Proses delete data penjualan
if (isset($_POST['delete'])) {
    $idpenjualan = $_POST['idpenjualan'];

    if (deletePenjualan($idpenjualan)) {
        header("Location: ../pembelian.php?status=deleted");
    } else {
        header("Location: ../pembelian.php?status=error");
    }
}
?>
