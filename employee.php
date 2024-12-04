<?php
// Pastikan untuk menghubungkan file fungsi agar dapat digunakan
require_once 'functions/function_employee.php';
require_once 'database/database.php';

$employees = getEmployees();

session_start();
if (!isset($_SESSION['employee_name'])) {
    header("Location: login.php");
    exit();
}

// if (isset($_GET['success'])) {
//     echo '<div class="alert alert-success" role="alert">
//             <strong>Success - </strong> Regency added or updated successfully!
//           </div>';
// } elseif (isset($_GET['error'])) {
//     echo '<div class="alert alert-danger" role="alert">
//             <strong>Error - </strong> An error occurred while processing your request.
//           </div>';
// }

// // Menutup alert otomatis setelah 2 detik
// echo '<script>
//         setTimeout(function() {
//             $(".alert").alert("close");
//         }, 2000);
//       </script>';
?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>Employee | Admin jobSakti</title>
    <!-- This page css -->
    <!-- Custom CSS -->
    <link href="src/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-lg">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.php">
                            <img src="src/assets/images/logo 1.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left me-auto ms-3 ps-1">
                        <!-- Notification -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                id="bell" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span><i data-feather="bell" class="svg-icon"></i></span>
                                <span class="badge text-bg-primary notify-no rounded-circle">5</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="settings" class="svg-icon"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                            type="search" placeholder="Search" aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="ms-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark"><?php echo $_SESSION['employee_name']; ?></span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">

                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="power"
                                        class="svg-icon me-2 ms-1"></i>
                                    Logout</a>

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link" href="index.php"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Company</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="company.php"
                                aria-expanded="false"><i data-feather="menu" class="feather-icon"></i><span
                                    class="hide-menu">Menu Company
                                </span></a>
                        </li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Manage</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="applicant.php"
                                aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                                    class="hide-menu">Applicant
                                </span></a>
                        </li>
                        <li class="sidebar-item selected"> <a class="sidebar-link sidebar-link" href="employee.php"
                                aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span
                                    class="hide-menu">Employee
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="provinces.php"
                                aria-expanded="false"><i data-feather="map" class="feather-icon"></i><span
                                    class="hide-menu">Provinces
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="regencies.php"
                                aria-expanded="false"><i data-feather="map-pin" class="feather-icon"></i><span
                                    class="hide-menu">Regencies
                                </span></a>
                        </li>

                        <li class="list-divider"></li>
                                                <!-- <li class="nav-small-cap"><span class="hide-menu">Are you done?</span></li> -->


                         <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="logout.php" aria-expanded="false">
                                <i data-feather="log-out" class="feather-icon"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Authentication</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="authentication-login1.html"
                                aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span
                                    class="hide-menu">Login
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="authentication-register1.html" aria-expanded="false"><i data-feather="lock"
                                    class="feather-icon"></i><span class="hide-menu">Register
                                </span></a>
                        </li>


                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Components</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Forms </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="form-inputs.html" class="sidebar-link"><span
                                            class="hide-menu"> Form Inputs
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span
                                            class="hide-menu"> Form Grids
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                                    class="hide-menu">Tables </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="table-basic.html" class="sidebar-link"><span
                                            class="hide-menu"> Basic Table
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="ui-cards.html"
                                aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span
                                    class="hide-menu">Cards
                                </span></a>
                        </li>



                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Employees</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted"> Dashboard</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Employees</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                            <h4 class="card-title">Employee Management</h4>
                            <h6 class="card-subtitle">Manage employee details in the table below.</h6>
                        </div>
                            <button class="btn btn-primary" data-toggle="modal" onclick="createEmployee()" data-target="#createEmployeeModal">Add Employee</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Actions</th>
                                        <th scope="col">Role Code</th>
                                        <th scope="col">Employee Number</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Position</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Division</th>
                                        <th scope="col">Grade</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Bank Name</th>
                                        <th scope="col">Bank Account Name</th>
                                        <th scope="col">Bank Account Number</th>
                                        <th scope="col">Work Date Start</th>
                                        <th scope="col">Work Month</th>
                                        <th scope="col">Work Date End</th>
                                        <th scope="col">Last Login</th>
                                        <th scope="col">Login Count</th>
                                        <th scope="col">Blocked</th>
                                        <th scope="col">Blocked Reason</th>
                                        <th scope="col">Blocked By</th>
                                        <th scope="col">Insert Date</th>
                                        <th scope="col">Inserted By</th>
                                        <th scope="col">Update Date</th>
                                        <th scope="col">Updated By</th>
                                        <th scope="col">Delete Date</th>
                                        <th scope="col">Deleted By</th>
                                        <th scope="col">Delete Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'functions/function_employee.php';

                                    // Fetch employees directly within employee.php
                                    $employees = getEmployees();

                                    foreach ($employees as $index => $employee): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($employee['employee_id']) ?></td>
                                            <td>
                                                <button class="btn btn-primary mb-2" style="width: 5rem" data-toggle="modal" data-target="#editEmployeeModal"
                                                    data-id="<?= $employee['employee_id'] ?>"
                                                    data-rolecode="<?= $employee['role_code'] ?>"
                                                    data-number="<?= $employee['employee_number'] ?>"
                                                    data-name="<?= $employee['employee_name'] ?>"
                                                    data-position="<?= $employee['employee_position'] ?>"
                                                    data-department="<?= $employee['employee_departement'] ?>"
                                                    data-division="<?= $employee['employee_division'] ?>"
                                                    data-grade="<?= $employee['employee_grade'] ?>"
                                                    data-email="<?= $employee['employee_email'] ?>"
                                                    data-passwd="<?= $employee['employee_passwd'] ?>"
                                                    data-bankname="<?= $employee['employee_bank_name'] ?>"
                                                    data-acountname="<?= $employee['employee_bank_acountname'] ?>"
                                                    data-acountnumber="<?= $employee['employee_bank_accoutnumber'] ?>"
                                                    data-workdate="<?= $employee['employee_workdate_start'] ?>"
                                                    data-workmonth="<?= $employee['employee_workmonth'] ?>"
                                                    data-workdateend="<?= $employee['employee_workdate_end'] ?>">Edit</button>
                                                <form method="POST" action="process/process_employee.php" style="display:inline-block;">
                                                    <input type="hidden" name="employee_id" value="<?= $employee['employee_id'] ?>">
                                                    <button type="submit" name="delete" class="btn btn-primary" style="width: 5rem">Delete</button>
                                                </form>
                                            </td>
                                            <td><?= htmlspecialchars($employee['role_code']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_number']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_name']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_position']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_departement']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_division']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_grade']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_email']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_passwd']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_bank_name']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_bank_acountname']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_bank_accoutnumber']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_workdate_start']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_workmonth']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_workdate_end']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_lastlogin']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_logincount']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_blocked']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_blockedreason']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_blockedby']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_insertdate']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_insertby']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_updatedate']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_updateby']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_deletedate']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_deleteby']) ?></td>
                                            <td><?= htmlspecialchars($employee['employee_deletestatus']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Create Employee Modal -->
            <div class="modal fade" id="createEmployeeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="process/process_employee.php">
                            <div class="modal-header">
                                <h5 class="modal-title">Create Employee</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="role_code">Role Code</label>
                                    <input type="text" name="role_code" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_number">Employee Number</label>
                                    <input type="text" name="employee_number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_name">Name</label>
                                    <input type="text" name="employee_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_position">Position</label>
                                    <input type="text" name="employee_position" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_departement">Department</label>
                                    <input type="text" name="employee_departement" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_division">Division</label>
                                    <input type="text" name="employee_division" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_grade">Grade</label>
                                    <input type="text" name="employee_grade" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_email">Email</label>
                                    <input type="email" name="employee_email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_passwd">Password</label>
                                    <input type="password" name="employee_passwd" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_bank_name">Bank Name</label>
                                    <input type="text" name="employee_bank_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_bank_acountname">Bank Account Name</label>
                                    <input type="text" name="employee_bank_acountname" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_bank_accoutnumber">Bank Account Number</label>
                                    <input type="text" name="employee_bank_accoutnumber" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_workdate_start">Work Date Start</label>
                                    <input type="date" name="employee_workdate_start" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_workmonth">Work Month</label>
                                    <input type="text" name="employee_workmonth" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_workdate_end">Work Date End</label>
                                    <input type="date" name="employee_workdate_end" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="create" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Employee Modal -->
            <div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="process/process_employee.php">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Employee</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="employee_id" id="editEmployeeId">
                                <div class="form-group">
                                    <label for="edit_role_code">Role Code</label>
                                    <input type="text" name="role_code" id="edit_role_code" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_employee_number">Employee Number</label>
                                    <input type="text" name="employee_number" id="edit_employee_number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_employee_name">Name</label>
                                    <input type="text" name="employee_name" id="edit_employee_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_employee_position">Position</label>
                                    <input type="text" name="employee_position" id="edit_employee_position" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_employee_departement">Department</label>
                                    <input type="text" name="employee_departement" id="edit_employee_departement" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_employee_division">Division</label>
                                    <input type="text" name="employee_division" id="edit_employee_division" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_employee_grade">Grade</label>
                                    <input type="text" name="employee_grade" id="edit_employee_grade" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_employee_email">Email</label>
                                    <input type="email" name="employee_email" id="edit_employee_email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_employee_passwd">Password</label>
                                    <input type="password" name="employee_passwd" id="edit_employee_passwd" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_employee_bank_name">Bank Name</label>
                                    <input type="text" name="employee_bank_name" id="edit_employee_bank_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_employee_bank_acountname">Bank Account Name</label>
                                    <input type="text" name="employee_bank_acountname" id="edit_employee_bank_acountname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_employee_bank_accoutnumber">Bank Account Number</label>
                                    <input type="text" name="employee_bank_accoutnumber" id="edit_employee_bank_accoutnumber" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_employee_workdate_start">Work Date Start</label>
                                    <input type="date" name="employee_workdate_start" id="edit_employee_workdate_start" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_employee_workmonth">Work Month</label>
                                    <input type="text" name="employee_workmonth" id="edit_employee_workmonth" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_employee_workdate_end">Work Date End</label>
                                    <input type="date" name="employee_workdate_end" id="edit_employee_workdate_end" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <footer class="footer text-center text-muted">
                All Rights Reserved by bilal.
            </footer>
        </div>
    </div>

    <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="src/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="src/dist/js/app-style-switcher.js"></script>
    <script src="src/dist/js/feather.min.js"></script>
    <script src="src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="src/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="src/dist/js/custom.min.js"></script>

    <script>
        // Function to trigger the 'Create Employee' modal
        function createEmployee() {
            $('#createEmployeeModal').modal('show');
        }

        // Get the modal element
        const editEmployeeModal = document.getElementById('editEmployeeModal');

        // Add an event listener to the 'Edit' buttons
        document.querySelectorAll('.btn-primary').forEach(button => {
            button.addEventListener('click', function() {
                // Get the employee ID and other details from the button's data attributes
                const employeeId = this.dataset.id;
                const roleCode = this.dataset.rolecode;
                const employeeNumber = this.dataset.number;
                const employeeName = this.dataset.name;
                const employeePosition = this.dataset.position;
                const employeeDepartment = this.dataset.department;
                const employeeDivision = this.dataset.division;
                const employeeGrade = this.dataset.grade;
                const employeeEmail = this.dataset.email;
                const employeePasswd = this.dataset.passwd; // Assuming password is not stored in plain text
                const bankName = this.dataset.bankname;
                const accountName = this.dataset.acountname;
                const accountNumber = this.dataset.acountnumber;
                const workDateStart = this.dataset.workdate;
                const workMonth = this.dataset.workmonth;
                const workDateEnd = this.dataset.workdateend;

                // Populate the edit modal form with the employee's details
                document.getElementById('editEmployeeId').value = employeeId;
                document.getElementById('edit_role_code').value = roleCode;
                document.getElementById('edit_employee_number').value = employeeNumber;
                document.getElementById('edit_employee_name').value = employeeName;
                document.getElementById('edit_employee_position').value = employeePosition;
                document.getElementById('edit_employee_departement').value = employeeDepartment;
                document.getElementById('edit_employee_division').value = employeeDivision;
                document.getElementById('edit_employee_grade').value = employeeGrade;
                document.getElementById('edit_employee_email').value = employeeEmail;
                //  document.getElementById('edit_employee_passwd').value = employeePasswd; // Don't show password in plain text
                document.getElementById('edit_employee_bank_name').value = bankName;
                document.getElementById('edit_employee_bank_acountname').value = accountName;
                document.getElementById('edit_employee_bank_accoutnumber').value = accountNumber;
                document.getElementById('edit_employee_workdate_start').value = workDateStart;
                document.getElementById('edit_employee_workmonth').value = workMonth;
                document.getElementById('edit_employee_workdate_end').value = workDateEnd;

                // Show the modal
                $(editEmployeeModal).modal('show');
            });
        });
    </script>


</body>

</html>