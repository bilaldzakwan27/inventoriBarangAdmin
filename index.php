<?php
include_once 'database/database.php';
include_once  'functions/function_provinces.php';
require_once 'functions/function_regencies.php';
require_once 'functions/function_applicant.php';
require_once 'functions/function_company.php';

// Ambil total provinsi
$totalProvinces = countProvinces();

$countRegencies = countRegencies();

$countApplicants = countApplicants();

$totalCompany = totalCompany();


session_start();
if (!isset($_SESSION['employee_name'])) {
    header("Location: login.php");
    exit();
}
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
    <title>Dashboard Admin Inventori </title>
    <!-- Custom CSS -->
    <link href="src/" rel="stylesheet">
    <link href="src/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="src/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="src/dist/css/style.min.css" rel="stylesheet">
    
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
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
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
                            <p>INVENTORI BARANG</p>
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
                        <li class="sidebar-item selected"> <a class="sidebar-link sidebar-link" href="index.php"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>

                        

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Barang</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="barang.php"
                                aria-expanded="false"><i data-feather="box" class="feather-icon"></i><span
                                    class="hide-menu">List Barang
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="pembelian.php"
                                aria-expanded="false"><i data-feather="shopping-cart" class="feather-icon"></i><span
                                    class="hide-menu">Pembelian Barang
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="penjualan.php"
                                aria-expanded="false"><i data-feather="shopping-bag" class="feather-icon"></i><span
                                    class="hide-menu">Penjualan Barang
                                </span></a>
                        </li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Manage</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="admin.php"
                                aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span
                                    class="hide-menu">Admin
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="supplier.php"
                                aria-expanded="false"><i data-feather="truck" class="feather-icon"></i><span
                                    class="hide-menu">supplier
                                </span></a>
                        </li>

                        <li class="list-divider"></li>

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
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Hi! <?php echo $_SESSION['employee_name']; ?>, how are you today?</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium"><?php echo $totalCompany; ?></h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Company
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="mouse-pointer"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><?php echo $countApplicants; ?><span class="badge bg-primary font-12 text-white font-weight-medium rounded-pill ms-2">+18.33%</span></h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Applicant
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium"><?php echo $totalProvinces; ?></h2>
                                            <!-- <span class="badge bg-danger font-12 text-white font-weight-medium rounded-pill ms-2 d-md-none d-lg-block">-18.33%</span> -->
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Provinces</h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="map"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo $countRegencies; ?></h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Regencies</h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="map-pin"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Sales Charts Section -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Applicants</h4>
                                <div id="campaign-v2" class="mt-2" style="height:283px; width:100%;"></div>
                                <ul class="list-style-none mb-0">
                                    <li>
                                        <i class="fas fa-circle text-primary font-10 me-2"></i>
                                        <span class="text-muted">Direct Applications</span>
                                        <span class="text-dark float-end font-weight-medium">2346</span>
                                    </li>
                                    <li class="mt-3">
                                        <i class="fas fa-circle text-danger font-10 me-2"></i>
                                        <span class="text-muted">Referral Applications</span>
                                        <span class="text-dark float-end font-weight-medium">2108</span>
                                    </li>
                                    <li class="mt-3">
                                        <i class="fas fa-circle text-cyan font-10 me-2"></i>
                                        <span class="text-muted">Affiliate Applications</span>
                                        <span class="text-dark float-end font-weight-medium">1204</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Applicant Overview</h4>
                                <div class="net-income mt-4 position-relative" style="height:294px;"></div>
                                <ul class="list-inline text-center mt-5 mb-2">
                                    <li class="list-inline-item text-muted fst-italic">Applications for this month</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Applicant by Province</h4>
                                <div class="" style="height:180px">
                                    <div id="visitbylocate" style="height:100%"></div>
                                </div>
                                <div class="row mb-3 align-items-center mt-1 mt-5">
                                    <div class="col-4 text-end">
                                        <span class="text-muted font-14">DKI Jakarta</span>
                                    </div>
                                    <div class="col-5">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <span class="mb-0 font-14 text-dark font-weight-medium">28%</span>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-4 text-end">
                                        <span class="text-muted font-14">East Java</span>
                                    </div>
                                    <div class="col-5">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 74%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <span class="mb-0 font-14 text-dark font-weight-medium">21%</span>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-4 text-end">
                                        <span class="text-muted font-14">Bali</span>
                                    </div>
                                    <div class="col-5">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-cyan" role="progressbar" style="width: 60%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <span class="mb-0 font-14 text-dark font-weight-medium">18%</span>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-4 text-end">
                                        <span class="text-muted font-14">West Java</span>
                                    </div>
                                    <div class="col-5">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <span class="mb-0 font-14 text-dark font-weight-medium">12%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Sales Charts Section -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Location and Earnings Charts Section -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-md-6 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <h4 class="card-title mb-0">Earning Statistics</h4>
                                    <div class="ms-auto">
                                        <div class="dropdown sub-dropdown">
                                            <button class="btn btn-link text-muted dropdown-toggle" type="button"
                                                id="dd1" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dd1">
                                                <a class="dropdown-item" href="#">Insert</a>
                                                <a class="dropdown-item" href="#">Update</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-4 mb-5">
                                    <div class="stats ct-charts position-relative" style="height: 315px;"></div>
                                </div>
                                <ul class="list-inline text-center mt-4 mb-0">
                                    <li class="list-inline-item text-muted fst-italic">Earnings for this month</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Recent Activity</h4>
                                <div class="mt-4 activity">
                                    <div class="d-flex align-items-start border-left-line pb-3">
                                        <div>
                                            <a href="javascript:void(0)" class="btn btn-info btn-circle mb-2 btn-item">
                                                <i data-feather="shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="ms-3 mt-2">
                                            <h5 class="text-dark font-weight-medium mb-2">New Product Sold!</h5>
                                            <p class="font-14 mb-2 text-muted">John Musa just purchased <br> Cannon 5M
                                                Camera.
                                            </p>
                                            <span class="font-weight-light font-14 text-muted">10 Minutes Ago</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start border-left-line pb-3">
                                        <div>
                                            <a href="javascript:void(0)"
                                                class="btn btn-primary btn-circle mb-2 btn-item">
                                                <i data-feather="message-square"></i>
                                            </a>
                                        </div>
                                        <div class="ms-3 mt-2">
                                            <h5 class="text-dark font-weight-medium mb-2">New Support Ticket</h5>
                                            <p class="font-14 mb-2 text-muted">Richardson just create support <br>
                                                ticket</p>
                                            <span class="font-weight-light font-14 text-muted">25 Minutes Ago</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start border-left-line">
                                        <div>
                                            <a href="javascript:void(0)" class="btn btn-cyan btn-circle mb-2 btn-item">
                                                <i data-feather="bell"></i>
                                            </a>
                                        </div>
                                        <div class="ms-3 mt-2">
                                            <h5 class="text-dark font-weight-medium mb-2">Notification Pending Order!
                                            </h5>
                                            <p class="font-14 mb-2 text-muted">One Pending order from Ryne <br> Doe</p>
                                            <span class="font-weight-light font-14 mb-1 d-block text-muted">2 Hours
                                                Ago</span>
                                            <a href="javascript:void(0)"
                                                class="font-14 border-bottom pb-1 border-info">Load More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Location and Earnings Charts Section -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Top Leader Table -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Top Leaders</h4>
                                    <div class="ms-auto">
                                        <div class="dropdown sub-dropdown">
                                            <button class="btn btn-link text-muted dropdown-toggle" type="button"
                                                id="dd1" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                                <a class="dropdown-item" href="#">Insert</a>
                                                <a class="dropdown-item" href="#">Update</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">Team Lead
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Project
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Team</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                                    Status
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                                    Weeks
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Budget</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border-top-0 px-2 py-4">
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="me-3"><img
                                                                src="src/assets/images/users/widget-table-pic1.jpg"
                                                                alt="user" class="rounded-circle" width="45"
                                                                height="45" /></div>
                                                        <div class="">
                                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Hanna
                                                                Gover</h5>
                                                            <span class="text-muted font-14">hgover@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-top-0 text-muted px-2 py-4 font-14">Elite Admin</td>
                                                <td class="border-top-0 px-2 py-4">
                                                    <div class="popover-icon">
                                                        <a class="btn btn-primary rounded-circle btn-circle font-12"
                                                            href="javascript:void(0)">DS</a>
                                                        <a class="btn btn-primary rounded-circle btn-circle font-12 popover-item"
                                                            href="javascript:void(0)">SS</a>
                                                        <a class="btn btn-cyan rounded-circle btn-circle font-12 popover-item"
                                                            href="javascript:void(0)">RP</a>
                                                        <a class="btn btn-success text-white rounded-circle btn-circle font-20"
                                                            href="javascript:void(0)">+</a>
                                                    </div>
                                                </td>
                                                <td class="border-top-0 text-center px-2 py-4"><i
                                                        class="fa fa-circle text-primary font-12"
                                                        data-bs-toggle="tooltip" data-placement="top"
                                                        title="In Testing"></i></td>
                                                <td
                                                    class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                                    35
                                                </td>
                                                <td class="font-weight-medium text-dark border-top-0 px-2 py-4">$96K
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-4">
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="me-3"><img
                                                                src="src/assets/images/users/widget-table-pic2.jpg"
                                                                alt="user" class="rounded-circle" width="45"
                                                                height="45" /></div>
                                                        <div class="">
                                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Daniel
                                                                Kristeen
                                                            </h5>
                                                            <span class="text-muted font-14">Kristeen@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-muted px-2 py-4 font-14">Real Homes WP Theme</td>
                                                <td class="px-2 py-4">
                                                    <div class="popover-icon">
                                                        <a class="btn btn-primary rounded-circle btn-circle font-12"
                                                            href="javascript:void(0)">DS</a>
                                                        <a class="btn btn-primary rounded-circle btn-circle font-12 popover-item"
                                                            href="javascript:void(0)">SS</a>
                                                        <a class="btn btn-success text-white rounded-circle btn-circle font-20"
                                                            href="javascript:void(0)">+</a>
                                                    </div>
                                                </td>
                                                <td class="text-center px-2 py-4"><i
                                                        class="fa fa-circle text-success font-12"
                                                        data-bs-toggle="tooltip" data-placement="top" title="Done"></i>
                                                </td>
                                                <td class="text-center text-muted font-weight-medium px-2 py-4">32</td>
                                                <td class="font-weight-medium text-dark px-2 py-4">$85K</td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-4">
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="me-3"><img
                                                                src="src/assets/images/users/widget-table-pic3.jpg"
                                                                alt="user" class="rounded-circle" width="45"
                                                                height="45" /></div>
                                                        <div class="">
                                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Julian
                                                                Josephs
                                                            </h5>
                                                            <span class="text-muted font-14">Josephs@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-muted px-2 py-4 font-14">MedicalPro WP Theme</td>
                                                <td class="px-2 py-4">
                                                    <div class="popover-icon">
                                                        <a class="btn btn-primary rounded-circle btn-circle font-12"
                                                            href="javascript:void(0)">DS</a>
                                                        <a class="btn btn-primary rounded-circle btn-circle font-12 popover-item"
                                                            href="javascript:void(0)">SS</a>
                                                        <a class="btn btn-cyan rounded-circle btn-circle font-12 popover-item"
                                                            href="javascript:void(0)">RP</a>
                                                        <a class="btn btn-success text-white rounded-circle btn-circle font-20"
                                                            href="javascript:void(0)">+</a>
                                                    </div>
                                                </td>
                                                <td class="text-center px-2 py-4"><i
                                                        class="fa fa-circle text-primary font-12"
                                                        data-bs-toggle="tooltip" data-placement="top" title="Done"></i>
                                                </td>
                                                <td class="text-center text-muted font-weight-medium px-2 py-4">29</td>
                                                <td class="font-weight-medium text-dark px-2 py-4">$81K</td>
                                            </tr>
                                            <tr>
                                                <td class="border-bottom-0 px-2 py-4">
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="me-3"><img
                                                                src="src/assets/images/users/widget-table-pic4.jpg"
                                                                alt="user" class="rounded-circle" width="45"
                                                                height="45" /></div>
                                                        <div class="">
                                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Jan
                                                                Petrovic
                                                            </h5>
                                                            <span class="text-muted font-14">hgover@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0 text-muted px-2 py-4 font-14">Hosting Press
                                                    HTML</td>
                                                <td class="border-bottom-0 px-2 py-4">
                                                    <div class="popover-icon">
                                                        <a class="btn btn-primary rounded-circle btn-circle font-12"
                                                            href="javascript:void(0)">DS</a>
                                                        <a class="btn btn-success text-white font-20 rounded-circle btn-circle"
                                                            href="javascript:void(0)">+</a>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0 text-center px-2 py-4"><i
                                                        class="fa fa-circle text-danger font-12"
                                                        data-bs-toggle="tooltip" data-placement="top"
                                                        title="In Progress"></i></td>
                                                <td
                                                    class="border-bottom-0 text-center text-muted font-weight-medium px-2 py-4">
                                                    23</td>
                                                <td class="border-bottom-0 font-weight-medium text-dark px-2 py-4">$80K
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by bilal.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="src/dist/js/app-style-switcher.js"></script>
    <script src="src/dist/js/feather.min.js"></script>
    <script src="src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="src/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="src/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="src/assets/extra-libs/c3/d3.min.js"></script>
    <script src="src/assets/extra-libs/c3/c3.min.js"></script>
    <script src="src/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="src/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="src/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="src/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="src/dist/js/pages/dashboards/dashboard1.min.js"></script>
</body>

</html>