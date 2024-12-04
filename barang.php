<?php
require_once 'functions/function_barang.php';
include_once 'database/database.php';

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
    <title>Barang</title>
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
                            INVENTORI BARANG </a>
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
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php"
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

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">List Barang</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted"> Dashboard</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">List Barang</li>
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
                    <h4 class="card-title">Tabel List Barang</h4>
                    <h6 class="card-subtitle">Manage List Barang in the table below.</h6>
                </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBarangModal">Tambah Barang</button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $barangList = getAllBarang();
                        foreach ($barangList as $barang) {
                            echo "<tr>
                                    <td>" . $barang['idbarang'] . "</td>
                                    <td>" . $barang['namabarang'] . "</td>
                                    <td>" . $barang['kategori'] . "</td>
                                    <td>" . $barang['hargabeli'] . "</td>
                                    <td>" . $barang['hargajual'] . "</td>
                                    <td>" . $barang['stok'] . "</td>";

                            // Menampilkan gambar jika ada
                            if ($barang['gambar_base64']) {
                                echo "<td><img src='" . $barang['gambar_base64'] . "' width='50' height='50' alt='Gambar Barang'></td>";
                            } else {
                                echo "<td>No Image</td>";
                            }

                            echo "<td>
                                    <button class='btn btn-warning' onclick='editBarang(" . $barang['idbarang'] . ")' data-bs-toggle='modal' data-bs-target='#editBarangModal'>Edit</button>
                                    <button class='btn btn-danger' onclick='deleteBarang(" . $barang['idbarang'] . ")'>Delete</button>
                                  </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


            <!-- Modal untuk menambah barang -->
<div class="modal fade" id="tambahBarangModal" tabindex="-1" aria-labelledby="tambahBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahBarangModalLabel">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="process/process_barang.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="namabarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namabarang" name="namabarang" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori" required>
                            <option value="Alat Tulis">Alat Tulis</option>
                            <option value="Buku & Kertas">Buku & Kertas</option>
                            <option value="Perlengkapan">Perlengkapan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="hargabeli" class="form-label">Harga Beli</label>
                        <input type="number" class="form-control" id="hargabeli" name="hargabeli" required>
                    </div>
                    <div class="mb-3">
                        <label for="hargajual" class="form-label">Harga Jual</label>
                        <input type="number" class="form-control" id="hargajual" name="hargajual" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" required>
                    </div>
                    <!-- Input untuk gambar -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Barang</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                    </div>

                    <button type="submit" name="add" class="btn btn-primary">Tambah Barang</button>
                </form>
            </div>
        </div>
    </div>
</div>


            <!-- Modal Edit Barang -->
            <div class="modal fade" id="editBarangModal" tabindex="-1" aria-labelledby="editBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBarangModalLabel">Edit Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="process/process_barang.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="editIdBarang" name="idbarang">
                    <div class="mb-3">
                        <label for="editNamaBarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="editNamaBarang" name="namabarang" required>
                    </div>
                    <div class="mb-3">
                        <label for="editKategori" class="form-label">Kategori</label>
                        <select class="form-control" id="editKategori" name="kategori" required>
                            <option value="Alat Tulis">Alat Tulis</option>
                            <option value="Buku & Kertas">Buku & Kertas</option>
                            <option value="Perlengkapan">Perlengkapan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editHargaBeli" class="form-label">Harga Beli</label>
                        <input type="number" class="form-control" id="editHargaBeli" name="hargabeli" required>
                    </div>
                    <div class="mb-3">
                        <label for="editHargaJual" class="form-label">Harga Jual</label>
                        <input type="number" class="form-control" id="editHargaJual" name="hargajual" required>
                    </div>
                    <div class="mb-3">
                        <label for="editStok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="editStok" name="stok" required>
                    </div>
                    
                    <!-- Menampilkan Gambar Barang Lama -->
                    <div class="mb-3">
                        <label for="editGambar" class="form-label">Gambar Barang</label>
                        <div>
                            <img id="editGambarPreview" src="" alt="Gambar Barang" width="100" height="100">
                        </div>
                        <input type="file" class="form-control" id="editGambar" name="gambar" accept="image/*">
                    </div>

                    <button type="submit" name="update" class="btn btn-primary">Update Barang</button>
                </form>
            </div>
        </div>
    </div>
</div>



            <!-- Modal Hapus Barang -->
            <div class="modal fade" id="deleteBarangModal" tabindex="-1" aria-labelledby="deleteBarangModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteBarangModalLabel">Hapus Barang</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus barang ini?</p>
                            <form action="process/process_barang.php" method="POST">
                                <input type="hidden" id="deleteIdBarang" name="idbarang">
                                <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </form>
                        </div>
                    </div>
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
                // Fungsi untuk membuka modal edit dengan mengisi data barang yang dipilih
                function editBarang(idbarang) {
                    // Mengambil data barang berdasarkan ID menggunakan fetch
                    fetch(`get_barang.php?idbarang=${idbarang}`)
                        .then(response => response.json())
                        .then(data => {
                            // Mengisi data ke dalam form modal
                            document.getElementById('editIdBarang').value = data.idbarang;
                            document.getElementById('editNamaBarang').value = data.namabarang;
                            document.getElementById('editKategori').value = data.kategori;
                            document.getElementById('editHargaBeli').value = data.hargabeli;
                            document.getElementById('editHargaJual').value = data.hargajual;
                            document.getElementById('editStok').value = data.stok;

                            // Menampilkan modal
                            $('#editBarangModal').modal('show');
                        })
                        .catch(error => {
                            console.error('Error fetching barang data:', error);
                        });
                }

                // Fungsi untuk membuka modal hapus dengan mengisi ID barang yang ingin dihapus
                function deleteBarang(idbarang) {
                    // Mengisi ID barang ke dalam form modal
                    document.getElementById('deleteIdBarang').value = idbarang;

                    // Menampilkan modal
                    $('#deleteBarangModal').modal('show');
                }
            </script>

</body>

</html>