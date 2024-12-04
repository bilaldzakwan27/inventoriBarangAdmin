<?php
include_once 'database/database.php';
include_once 'functions/function_company.php';
include_once 'functions/function_regencies.php';
include_once 'functions/function_provinces.php';
$companies = getAllCompanies();

session_start();
if (!isset($_SESSION['employee_name'])) {
    header("Location: login.php");
    exit();
}

$conn = getConnection();

// Query untuk mengambil data perusahaan beserta nama provinsi dan regensi
$query = "
    SELECT c.*, p.name AS province_name, r.name AS regency_name 
    FROM company c 
    JOIN provinces p ON c.company_provinces = p.id 
    JOIN regencies r ON c.company_regencies = r.id
";


$stmt = $conn->query($query);
$companies = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ambil data provinsi dan regensi untuk dropdown
$provinces = getProvinces();
$regencies = getRegencies();

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
    <title>Company | Admin jobSakti</title>
    <!-- This page css -->
    <!-- Custom CSS -->
    <link href="src/dist/css/style.min.css" rel="stylesheet">
    <style>
        .table th,
        .table td {
            white-space: nowrap;
            /* Mencegah teks membungkus */
            overflow: hidden;
            /* Sembunyikan konten yang melampaui */
            text-overflow: ellipsis;
            /* Tambahkan elipsis jika konten terpotong */
        }

        .table th {
            min-width: 150px;
            /* Atur lebar minimum untuk th sesuai kebutuhan */
        }

        .table td {
            min-width: 150px;
            /* Atur lebar minimum untuk td sesuai kebutuhan */
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

                        <li class="sidebar-item selected"> <a class="sidebar-link sidebar-link" href="company.php"
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
                        <li class="sidebar-item"> <a class="sidebar-link" href="employee.php"
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Company</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted"> Dashboard</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Company</li>
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
                                <h4 class="card-title">Company Data</h4>
                                <h6 class="card-subtitle">List of companies in the system.</h6>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="openAddCompanyModal()">Add Company</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Actions</th>
                                        <th scope="col">Verification</th>
                                        <th scope="col">Company ID</th>
                                        <th scope="col">Company Code</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Website</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Provinces</th>
                                        <th scope="col">Regencies</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Priority</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Industry</th>
                                        <th scope="col">Employee Size</th>
                                        <th scope="col">Instagram</th>
                                        <th scope="col">Facebook</th>
                                        <th scope="col">Twitter</th>
                                        <th scope="col">LinkedIn</th>
                                        <th scope="col">Since</th>
                                        <th scope="col">About</th>
                                        <th scope="col">Logo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($companies as $index => $company): ?>
                                        <tr>
                                            <th scope="row"><?= $index + 1 ?></th>
                                            <td>
                                                <!-- Kolom Actions -->
                                                <button type="button" class="btn btn-primary" onclick="editCompany(<?= $company['company_id'] ?>, '<?= $company['company_code'] ?>', '<?= $company['company_code'] ?>', '<?= $company['company_name'] ?>', '<?= $company['company_website'] ?>', '<?= $company['company_email'] ?>', '<?= $company['company_address'] ?>', '<?= $company['province_name'] ?>', '<?= $company['regency_name'] ?>', '<?= $company['company_phone'] ?>', '<?= $company['company_priority'] ?>', '<?= $company['company_category'] ?>', '<?= $company['company_industry'] ?>', '<?= $company['company_employee_size'] ?>', '<?= $company['company_instagram'] ?>', '<?= $company['company_facebook'] ?>', '<?= $company['company_twitter'] ?>', '<?= $company['company_linkedin'] ?>', '<?= $company['company_since'] ?>', '<?= $company['company_about'] ?>', '<?= $company['company_logo'] ?>')">Edit</button>
                                                <a href="process/process_company.php?delete_company=<?= $company['company_id'] ?>" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this company?')">Delete</a>
                                            </td>
                                            <td>
                                                <!-- Kolom Verifikasi -->
                                                <?php if ($company['verifikasi'] == '0'): ?>
                                                    <a href="process/process_company.php?verify_company=<?= $company['company_id'] ?>" class="btn" style="background: #7001fe; color: white" onclick="return confirm('Are you sure you want to verify this company?')">Verify</a>
                                                <?php else: ?>
                                                    <span>Verified</span>
                                                <?php endif; ?>
                                            </td>
                                            
                                            <td><?= $company['company_id'] ?></td>
                                            <td><?= $company['company_code'] ?></td>
                                            <td><?= $company['company_name'] ?></td>
                                            <td><a href="<?= $company['company_website'] ?>" target="_blank"><?= $company['company_website'] ?></a></td>
                                            <td><?= $company['company_email'] ?></td>
                                            <td><?= $company['company_address'] ?></td>
                                            <td><?= $company['province_name'] ?></td>
                                            <td><?= $company['regency_name'] ?></td>
                                            <td><?= $company['company_phone'] ?></td>
                                            <td><?= $company['company_priority'] ?></td>
                                            <td><?= $company['company_category'] ?></td>
                                            <td><?= $company['company_industry'] ?></td>
                                            <td><?= $company['company_employee_size'] ?></td>
                                            <td><?= $company['company_instagram'] ?></td>
                                            <td><?= $company['company_facebook'] ?></td>
                                            <td><?= $company['company_twitter'] ?></td>
                                            <td><?= $company['company_linkedin'] ?></td>
                                            <td><?= $company['company_since'] ?></td>
                                            <td><?= $company['company_about'] ?></td>
                                            <td><?= $company['company_logo'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <!-- Modal for Adding Company -->
                    <div class="modal fade" id="addCompanyModal" tabindex="-1" role="dialog" aria-labelledby="addCompanyModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="process/process_company.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addCompanyModalLabel">Add Company</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="action" value="create">
                                        <div class="form-group">
                                            <label for="company_code">Company Code</label>
                                            <input type="text" class="form-control" name="company_code">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_code">Customer Number</label>
                                            <input type="text" class="form-control" name="company_code">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_name">Company Name</label>
                                            <input type="text" class="form-control" name="company_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_website">Company Website</label>
                                            <input type="url" class="form-control" name="company_website">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_email">Company Email</label>
                                            <input type="email" class="form-control" name="company_email">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_address">Company Address</label>
                                            <textarea class="form-control" name="company_address"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="company_provinces">Select Province</label>
                                            <select class="form-control" id="company_provinces" name="company_provinces">
                                                <option value="" disabled selected>Select a province</option>
                                                <?php foreach ($provinces as $province): ?>
                                                    <option value="<?= $province['id'] ?>"><?= $province['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="company_regencies">Select Regency</label>
                                            <select class="form-control" id="company_regencies" name="company_regencies">
                                                <option value="" disabled selected>Select a regency</option>
                                                <?php foreach ($regencies as $regency): ?>
                                                    <option value="<?= $regency['id'] ?>"><?= $regency['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="company_phone">Phone</label>
                                            <input type="text" class="form-control" name="company_phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_priority">Priority</label>
                                            <input type="text" class="form-control" name="company_priority">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_category">Category</label>
                                            <input type="text" class="form-control" name="company_category">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_industry">Industry</label>
                                            <input type="text" class="form-control" name="company_industry">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_employee_size">Employee Size</label>
                                            <input type="number" class="form-control" name="company_employee_size">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_instagram">Instagram</label>
                                            <input type="text" class="form-control" name="company_instagram">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_facebook">Facebook</label>
                                            <input type="text" class="form-control" name="company_facebook">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_twitter">Twitter</label>
                                            <input type="text" class="form-control" name="company_twitter">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_linkedin">LinkedIn</label>
                                            <input type="text" class="form-control" name="company_linkedin">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_since">Since</label>
                                            <input type="date" class="form-control" name="company_since">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_about">About</label>
                                            <textarea class="form-control" name="company_about"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="company_logo">Logo</label>
                                            <input type="file" class="form-control" name="company_logo">
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


                    <!-- Modal for Editing Company -->
                    <div class="modal fade" id="editCompanyModal" tabindex="-1" role="dialog" aria-labelledby="editCompanyModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="process/process_company.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editCompanyModalLabel">Edit Company</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="company_id" id="edit_company_id">
                                        <div class="form-group">
                                            <label for="edit_company_code">Company Code</label>
                                            <input type="text" class="form-control" name="company_code" id="edit_company_code">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_customer_number">Customer Number</label>
                                            <input type="text" class="form-control" name="company_code" id="edit_customer_number">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_name">Company Name</label>
                                            <input type="text" class="form-control" name="company_name" id="edit_company_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_website">Company Website</label>
                                            <input type="url" class="form-control" name="company_website" id="edit_company_website">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_email">Company Email</label>
                                            <input type="email" class="form-control" name="company_email" id="edit_company_email">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_address">Company Address</label>
                                            <textarea class="form-control" name="company_address" id="edit_company_address"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_provinces">Select Province</label>
                                            <select class="form-control" id="edit_company_provinces" name="company_provinces">
                                                <option value="" disabled>Select a province</option>
                                                <?php foreach ($provinces as $province): ?>
                                                    <option value="<?= $province['id'] ?>" <?= $province['id'] == $company['company_provinces'] ? 'selected' : '' ?>><?= $province['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_regencies">Select Regency</label>
                                            <select class="form-control" id="edit_company_regencies" name="company_regencies">
                                                <option value="" disabled>Select a regency</option>
                                                <?php foreach ($regencies as $regency): ?>
                                                    <option value="<?= $regency['id'] ?>" <?= $regency['id'] == $company['company_regencies'] ? 'selected' : '' ?>><?= $regency['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_phone">Phone</label>
                                            <input type="text" class="form-control" name="company_phone" id="edit_company_phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_priority">Priority</label>
                                            <input type="text" class="form-control" name="company_priority" id="edit_company_priority">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_category">Category</label>
                                            <input type="text" class="form-control" name="company_category" id="edit_company_category">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_industry">Industry</label>
                                            <input type="text" class="form-control" name="company_industry" id="edit_company_industry">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_employee_size">Employee Size</label>
                                            <input type="number" class="form-control" name="company_employee_size" id="edit_company_employee_size">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_instagram">Instagram</label>
                                            <input type="text" class="form-control" name="company_instagram" id="edit_company_instagram">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_facebook">Facebook</label>
                                            <input type="text" class="form-control" name="company_facebook" id="edit_company_facebook">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_twitter">Twitter</label>
                                            <input type="text" class="form-control" name="company_twitter" id="edit_company_twitter">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_linkedin">LinkedIn</label>
                                            <input type="text" class="form-control" name="company_linkedin" id="edit_company_linkedin">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_since">Since</label>
                                            <input type="date" class="form-control" name="company_since" id="edit_company_since">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_about">About</label>
                                            <textarea class="form-control" name="company_about" id="edit_company_about"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company_logo">Logo</label>
                                            <input type="file" class="form-control" name="company_logo" id="edit_company_logo">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
    <!-- Include jQuery dan Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script> -->


    <script>
        function openAddCompanyModal() {
            $('#addCompanyModal').modal('show');
        }

        function editCompany(id, code, customerNumber, name, website, email, address, provinces, regencies, phone, handphone1, handphone2, handphone3, priority, category, industry, employeeSize, instagram, facebook, twitter, linkedin, since, about, logo) {
            $('#edit_company_id').val(id);
            $('#edit_company_code').val(code);
            $('#edit_customer_number').val(customerNumber);
            $('#edit_company_name').val(name);
            $('#edit_company_website').val(website);
            $('#edit_company_email').val(email);
            $('#edit_company_address').val(address);
            $('#edit_province_name').val(provinces);
            $('#edit_regency_name').val(regencies);
            $('#edit_company_phone').val(phone);
            $('#edit_company_handphone3').val(handphone3);
            $('#edit_company_priority').val(priority);
            $('#edit_company_category').val(category);
            $('#edit_company_industry').val(industry);
            $('#edit_company_employee_size').val(employeeSize);
            $('#edit_company_instagram').val(instagram);
            $('#edit_company_facebook').val(facebook);
            $('#edit_company_twitter').val(twitter);
            $('#edit_company_linkedin').val(linkedin);
            $('#edit_company_since').val(since);
            $('#edit_company_about').val(about);
            $('#editCompanyModal').modal('show');
        }
    </script>

</body>

</html>