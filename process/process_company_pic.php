<?php

require_once '../database/database.php';
require_once '../functions/function_company_pic.php';

$action = isset($_POST['action']) ? $_POST['action'] : '';

switch ($action) {
    case 'add':
        // Menangani penambahan data
        $company_code = $_POST['company_code'];
        $name = $_POST['companypic_name'];
        $position = $_POST['companypic_position'];
        $department = $_POST['companypic_departement'];
        $division = $_POST['companypic_division'];
        $email = $_POST['companypic_email'];
        $phone = $_POST['companypic_phone'];
        $password = $_POST['companypic_password'];
        
        if (addCompanyPIC($company_code, $name, $position, $department, $division, $email, $phone, $password)) {
            $_SESSION['message'] = 'Company PIC added successfully!';
        } else {
            $_SESSION['error'] = 'Failed to add Company PIC.';
        }
        
        header("Location: ../company_pic.php");
        break;
    
    case 'update':
        // Menangani update data
        $id = $_POST['companypic_id'];
        $company_code = $_POST['company_code'];
        $name = $_POST['companypic_name'];
        $position = $_POST['companypic_position'];
        $department = $_POST['companypic_departement'];
        $division = $_POST['companypic_division'];
        $email = $_POST['companypic_email'];
        $phone = $_POST['companypic_phone'];

        if (updateCompanyPIC($id, $company_code, $name, $position, $department, $division, $email, $phone)) {
            $_SESSION['message'] = 'Company PIC updated successfully!';
        } else {
            $_SESSION['error'] = 'Failed to update Company PIC.';
        }

        header("Location: ../company_pic.php");
        break;
    
    case 'delete':
        // Menangani delete data
        $id = $_POST['companypic_id'];

        if (deleteCompanyPIC($id)) {
            $_SESSION['message'] = 'Company PIC deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to delete Company PIC.';
        }

        header("Location: ../company_pic.php");
        break;

    default:
        // Jika tidak ada aksi, redirect kembali
        header("Location: ../company_pic.php");
        break;
}

?>
