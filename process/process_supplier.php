<?php
require_once '../database/database.php';
require_once '../functions/function_supplier.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menambah supplier
    if (isset($_POST['add'])) {
        $namasupplier = $_POST['namasupplier'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        if (addSupplier($namasupplier, $alamat, $telepon)) {
            header("Location: ../supplier.php?status=success");
        } else {
            header("Location: ../supplier.php?status=error");
        }
    }

    // Mengupdate supplier
    if (isset($_POST['update'])) {
        $idsupplier = $_POST['idsupplier'];
        $namasupplier = $_POST['namasupplier'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        if (updateSupplier($idsupplier, $namasupplier, $alamat, $telepon)) {
            header("Location: ../supplier.php?status=updated");
        } else {
            header("Location: ../supplier.php?status=error");
        }
    }
}

// Proses Delete Supplier menggunakan GET parameter
if (isset($_GET['delete']) && $_GET['delete'] == 'true') {
    if (isset($_GET['idsupplier'])) {
        $idsupplier = $_GET['idsupplier'];

        if (deleteSupplier($idsupplier)) {
            header("Location: ../supplier.php?status=deleted");
        } else {
            header("Location: ../supplier.php?status=error");
        }
    } else {
        header("Location: ../supplier.php?status=error&message=No%20ID%20supplied");
    }
}
?>
