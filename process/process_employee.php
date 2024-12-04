<?php
include '../functions/function_employee.php'; // Adjust the path if needed
require_once '../database/database.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create Employee
    if (isset($_POST['create'])) {
        $role_code = $_POST['role_code'];
        $employee_number = $_POST['employee_number'];
        $employee_name = $_POST['employee_name'];
        $employee_position = $_POST['employee_position'];
        $employee_departement = $_POST['employee_departement'];
        $employee_division = $_POST['employee_division'];
        $employee_grade = $_POST['employee_grade'];
        $employee_email = $_POST['employee_email'];
        $employee_passwd = password_hash($_POST['employee_passwd'], PASSWORD_DEFAULT); // Hash password
        $employee_bank_name = $_POST['employee_bank_name'];
        $employee_bank_acountname = $_POST['employee_bank_acountname'];
        $employee_bank_accoutnumber = $_POST['employee_bank_accoutnumber'];
        $employee_workdate_start = $_POST['employee_workdate_start'];
        $employee_workmonth = $_POST['employee_workmonth'];
        $employee_workdate_end = $_POST['employee_workdate_end'];

        createEmployee($role_code, $employee_number, $employee_name, $employee_position, $employee_departement, $employee_division, $employee_grade, $employee_email, $employee_passwd, $employee_bank_name, $employee_bank_acountname, $employee_bank_accoutnumber, $employee_workdate_start, $employee_workmonth, $employee_workdate_end);
        header("Location: ../employee.php?status=success");
        exit();
    }

    // Update Employee
    if (isset($_POST['update'])) {
        $employee_id = $_POST['employee_id'];
        $role_code = $_POST['role_code'];
        $employee_number = $_POST['employee_number'];
        $employee_name = $_POST['employee_name'];
        $employee_position = $_POST['employee_position'];
        $employee_departement = $_POST['employee_departement'];
        $employee_division = $_POST['employee_division'];
        $employee_grade = $_POST['employee_grade'];
        $employee_email = $_POST['employee_email'];
        $employee_passwd = password_hash($_POST['employee_passwd'], PASSWORD_DEFAULT); // Hash password
        $employee_bank_name = $_POST['employee_bank_name'];
        $employee_bank_acountname = $_POST['employee_bank_acountname'];
        $employee_bank_accoutnumber = $_POST['employee_bank_accoutnumber'];
        $employee_workdate_start = $_POST['employee_workdate_start'];
        $employee_workmonth = $_POST['employee_workmonth'];
        $employee_workdate_end = $_POST['employee_workdate_end'];

        updateEmployee($employee_id, $role_code, $employee_number, $employee_name, $employee_position, $employee_departement, $employee_division, $employee_grade, $employee_email, $employee_passwd, $employee_bank_name, $employee_bank_acountname, $employee_bank_accoutnumber, $employee_workdate_start, $employee_workmonth, $employee_workdate_end);
        header("Location: ../employee.php?status=updated");
        exit();
    }

    // Delete Employee
    if (isset($_POST['delete'])) {
        $employee_id = $_POST['employee_id'];
        deleteEmployee($employee_id);
        header("Location: ../employee.php?status=deleted");
        exit();
    }
}