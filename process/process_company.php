<?php
include_once '../database/database.php';
require_once '../functions/function_company.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'create') {
        createCompany($_POST);
    } elseif ($_POST['action'] == 'update') {
        updateCompany($_POST);
    }
    header("Location: ../company.php");
    exit();
} elseif (isset($_GET['delete_company'])) {
    deleteCompany($_GET['delete_company']);
    header("Location: ../company.php");
    exit();
} elseif (isset($_GET['verify_company'])) {
    verifyCompany($_GET['verify_company']);
    header("Location: ../company.php");
    exit();
}
?>
