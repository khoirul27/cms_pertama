<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $judul_halaman ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= base_url('asset/admin/') ?>img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('asset/admin/') ?>xlib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('asset/admin/') ?>lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
        rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('asset/admin/') ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('asset/admin/') ?>css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <div class="d-flex align-items-center ms-4 mb-4 mt-5">
                    <div class="position-relative mt-5">
                        <img class="rounded-circle" src="<?= base_url('asset/admin/') ?>img/user.jpg" alt="" style="width: 80px; height: 80px;">
                    </div>
                    <div class="ms-3 mt-5">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                <?php $menu = $this->uri->segment(2); ?>
                    <a href="<?= base_url('admin/home/index') ?>" class="nav-item nav-link <?php if($menu=='home'){echo "active"; } ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="<?= base_url('admin/konten/') ?>" class="nav-item nav-link <?php if($menu=='konten'){echo "active"; } ?>"><i class="fa fa-laptop me-2"></i>Konten</a>
                    <a href="<?= base_url('admin/pengguna/hal_pengguna') ?>" class="nav-item nav-link <?php if($menu=='pengguna'){echo "active"; } ?>"><i class="fa fa-keyboard me-2"></i>Pengguna</a>
                    <a href="<?= base_url('admin/kategori/') ?>" class="nav-item nav-link <?php if($menu=='kategori'){echo "active"; } ?>"><i class="fa fa-th me-2"></i>kategori</a>
                    <a href="<?= base_url('admin/konfigurasi/') ?>" class="nav-item nav-link <?php if($menu=='konfigurasi'){echo "active"; } ?>"><i class="fa fa-chart-bar me-2"></i>Konfigurasi</a>
                    <a href="<?= base_url('admin/caraousel/') ?>" class="nav-link <?php if($menu=='caraousel'){echo "active"; } ?>"><i class="far fa-file-alt me-2"></i>caraousel</a>
                    <a href="<?= base_url('admin/auth/logout') ?>" class="nav-item nav-link ">Log out</a>
                    <!-- <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a> -->
                </div>
        </div>
        </nav>
    </div>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0 mt-3 mb-3">
                <i class="fa fa-bars"></i>
            </a>
        </nav>
        <!-- Navbar End -->


        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <?php echo $contents; ?>
            </div>
        </div>
        <!-- Sale & Revenue End -->


        <!-- Footer Start -->
        <!-- <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end"> -->
        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        <!-- Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div> -->
        <!-- Footer End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('asset/admin/') ?>lib/chart/chart.min.js"></script>
    <script src="<?= base_url('asset/admin/') ?>lib/easing/easing.min.js"></script>
    <script src="<?= base_url('asset/admin/') ?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url('asset/admin/') ?>lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url('asset/admin/') ?>lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?= base_url('asset/admin/') ?>lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?= base_url('asset/admin/') ?>lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('asset/admin/') ?>js/main.js"></script>
</body>

</html>