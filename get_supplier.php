<?php
include_once 'functions/function_supplier.php';

if (isset($_GET['idsupplier'])) {
    $idsupplier = $_GET['idsupplier'];
    $supplier = getSupplierById($idsupplier);
    echo json_encode($supplier);
}
?>
