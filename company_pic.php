<?php
require_once 'functions/function_company_pic.php';
require_once 'database/database.php';

$companyPICS = getCompanyPICs();

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
    <title>Company PIC | jobSakti</title>
    <link href="src/dist/css/style.min.css" rel="stylesheet">
    <style>
        .table td,
        .table th {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
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

                        <li class="sidebar-item selected"> <a class="sidebar-link" href="company.php"
                                aria-expanded="false"><i data-feather="briefcase" class="feather-icon"></i><span
                                    class="hide-menu">Company PIC
                                </span></a>
                        </li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Manage</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="applicant.php"
                                aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                                    class="hide-menu">Applicant
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="employee.php"
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Company PIC</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted"> Dashboard</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Company PIC</li>
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
                                <h4 class="card-title">Company PIC Management</h4>
                                <h6 class="card-subtitle">Manage Company PIC details in the table below.</h6>
                            </div>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addCompanyPICModal">Add New Company PIC</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 5rem;">ID</th>
                                        <th scope="col" style="width: 10rem;">Actions</th>
                                        <th scope="col" style="width: 10rem;">Company Code</th>
                                        <th scope="col" style="width: 20rem;">Name</th>
                                        <th scope="col" style="width: 20rem;">Position</th>
                                        <th scope="col" style="width: 20rem;">Department</th>
                                        <th scope="col" style="width: 20rem;">Division</th>
                                        <th scope="col" style="width: 20rem;">Email</th>
                                        <th scope="col" style="width: 15rem;">Phone</th>
                                        <th scope="col" style="width: 15rem;">Insert Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($companyPICS as $index => $companyPIC): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($companyPIC['companypic_id']) ?></td>
                                            <td style="display: flex; align-items: center; justify-content: center;">
                                                <form method="POST" action="process/process_company_pic.php" style="display:inline-block; margin-right: 0.5rem;">
                                                    <input type="hidden" name="companypic_id" value="<?= $companyPIC['companypic_id'] ?>">
                                                    <input type="hidden" name="action" value="delete">
                                                    <button type="submit" class="btn btn-danger" style="width: 5rem">Delete</button>
                                                </form>
                                                <button class="btn btn-primary" style="width: 5rem" data-toggle="modal" data-target="#editCompanyPICModal"
                                                    data-id="<?= $companyPIC['companypic_id'] ?>"
                                                    data-name="<?= $companyPIC['companypic_name'] ?>"
                                                    data-position="<?= $companyPIC['companypic_position'] ?>"
                                                    data-department="<?= $companyPIC['companypic_departement'] ?>"
                                                    data-division="<?= $companyPIC['companypic_division'] ?>"
                                                    data-email="<?= $companyPIC['companypic_email'] ?>"
                                                    data-phone="<?= $companyPIC['companypic_phone'] ?>">Edit</button>
                                            </td>
                                            <td><?= htmlspecialchars($companyPIC['company_code']) ?></td>
                                            <td><?= htmlspecialchars($companyPIC['companypic_name']) ?></td>
                                            <td><?= htmlspecialchars($companyPIC['companypic_position']) ?></td>
                                            <td><?= htmlspecialchars($companyPIC['companypic_departement']) ?></td>
                                            <td><?= htmlspecialchars($companyPIC['companypic_division']) ?></td>
                                            <td><?= htmlspecialchars($companyPIC['companypic_email']) ?></td>
                                            <td><?= htmlspecialchars($companyPIC['companypic_phone']) ?></td>
                                            <td><?= htmlspecialchars($companyPIC['companypic_insertdate']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Company PIC Modal -->
            <div class="modal fade" id="addCompanyPICModal" tabindex="-1" role="dialog" aria-labelledby="addCompanyPICModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCompanyPICModalLabel">Add Company PIC</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="process/process_company_pic.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="action" value="add">
                                <div class="form-group">
                                    <label for="company_code">Company Code</label>
                                    <input type="text" class="form-control" name="company_code" id="company_code" required>
                                </div>
                                <div class="form-group">
                                    <label for="companypic_name">Name</label>
                                    <input type="text" class="form-control" name="companypic_name" id="companypic_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="companypic_position">Position</label>
                                    <input type="text" class="form-control" name="companypic_position" id="companypic_position" required>
                                </div>
                                <div class="form-group">
                                    <label for="companypic_departement">Department</label>
                                    <input type="text" class="form-control" name="companypic_departement" id="companypic_departement" required>
                                </div>
                                <div class="form-group">
                                    <label for="companypic_division">Division</label>
                                    <input type="text" class="form-control" name="companypic_division" id="companypic_division" required>
                                </div>
                                <div class="form-group">
                                    <label for="companypic_email">Email</label>
                                    <input type="email" class="form-control" name="companypic_email" id="companypic_email" required>
                                </div>
                                <div class="form-group">
                                    <label for="companypic_phone">Phone</label>
                                    <input type="text" class="form-control" name="companypic_phone" id="companypic_phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="companypic_password">Password</label>
                                    <input type="password" class="form-control" name="companypic_password" id="companypic_password" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Company PIC Modal -->
            <div class="modal fade" id="editCompanyPICModal" tabindex="-1" role="dialog" aria-labelledby="editCompanyPICModalLabel" aria-hidden="true">

                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCompanyPICModalLabel">Edit Company PIC</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="process/process_company_pic.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="companypic_id" id="edit_companypic_id">

                                <div class="form-group">
                                    <label for="edit_companypic_name">Name</label>
                                    <input type="text" class="form-control" name="companypic_name" id="edit_companypic_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_companypic_position">Position</label>
                                    <input type="text" class="form-control" name="companypic_position" id="edit_companypic_position" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_companypic_departement">Department</label>
                                    <input type="text" class="form-control" name="companypic_departement" id="edit_companypic_departement" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_companypic_division">Division</label>
                                    <input type="text" class="form-control" name="companypic_division" id="edit_companypic_division" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_companypic_email">Email</label>
                                    <input type="email" class="form-control" name="companypic_email" id="edit_companypic_email" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_companypic_phone">Phone</label>
                                    <input type="text" class="form-control" name="companypic_phone" id="edit_companypic_phone" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Delete Company PIC Modal -->
            <div class="modal fade" id="deleteCompanyPICModal" tabindex="-1" role="dialog" aria-labelledby="deleteCompanyPICModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteCompanyPICModalLabel">Confirm Deletion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="process/process_company_pic.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="companypic_id" id="delete_companypic_id">
                                <p>Are you sure you want to delete the Company PIC <span id="delete_companypic_name"></span>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Delete</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

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
    <script>
        // Script to populate edit modal with data
        $('#editCompanyPICModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var position = button.data('position');
            var department = button.data('department');
            var division = button.data('division');
            var email = button.data('email');
            var phone = button.data('phone');

            var modal = $(this);
            modal.find('#edit_companypic_id').val(id);
            modal.find('#edit_companypic_name').val(name);
            modal.find('#edit_companypic_position').val(position);
            modal.find('#edit_companypic_departement').val(department);
            modal.find('#edit_companypic_division').val(division);
            modal.find('#edit_companypic_email').val(email);
            modal.find('#edit_companypic_phone').val(phone);
        });

        // Script to populate delete modal with data
        $('#deleteCompanyPICModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');

            var modal = $(this);
            modal.find('#delete_companypic_id').val(id);
            modal.find('#delete_companypic_name').text(name);
        });
    </script>

</html>