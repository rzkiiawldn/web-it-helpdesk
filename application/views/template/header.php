<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php if ($title != 'Login') { ?>

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">IT HELPDESK</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->

                <?php if ($title == 'Admin') { ?>
                    <li class="nav-item <?= $this->uri->segment(2) == 'index' ? 'active' : null; ?>">
                        <a class="nav-link pb-0" href="<?= base_url('admin/index') ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>
                    <li class="nav-item <?= $this->uri->segment(2) == 'laporan_kerusakan' ? 'active' : null; ?>">
                        <a class="nav-link pb-0" href="<?= base_url('admin/laporan_kerusakan') ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Tiket Belum Selesai</span></a>
                    </li>
                    <li class="nav-item <?= $this->uri->segment(2) == 'laporan_selesai' ? 'active' : null; ?>">
                        <a class="nav-link pb-0" href="<?= base_url('admin/laporan_selesai') ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Tiket Laporan Selesai</span></a>
                    </li>
                    <li class="nav-item <?= $this->uri->segment(2) == 'data_user' ? 'active' : null; ?>">
                        <a class="nav-link pb-0" href="<?= base_url('admin/data_user') ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Data Users</span></a>
                    </li>
                <?php } elseif ($title == 'IT') { ?>
                    <li class="nav-item <?= $this->uri->segment(2) == 'index' ? 'active' : null; ?>">
                        <a class="nav-link pb-0" href="<?= base_url('it/index') ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>
                    <li class="nav-item <?= $this->uri->segment(2) == 'laporan_kerusakan' ? 'active' : null; ?>">
                        <a class="nav-link pb-0" href="<?= base_url('it/laporan_kerusakan') ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Tiket Belum Selesai</span></a>
                    </li>
                    <li class="nav-item <?= $this->uri->segment(2) == 'laporan_selesai' ? 'active' : null; ?>">
                        <a class="nav-link pb-0" href="<?= base_url('it/laporan_selesai') ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Tiket Laporan Selesai</span></a>
                    </li>

                <?php } elseif ($title == 'Staff') { ?>
                    <li class="nav-item <?= $this->uri->segment(2) == 'index' ? 'active' : null; ?>">
                        <a class="nav-link pb-0" href="<?= base_url('staff/index') ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>
                    <li class="nav-item <?= $this->uri->segment(2) == 'laporan_kerusakan' ? 'active' : null; ?>">
                        <a class="nav-link pb-0" href="<?= base_url('staff/laporan_kerusakan') ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Laporan Kerusakan</span></a>
                    </li>
                    <li class="nav-item <?= $this->uri->segment(2) == 'laporan_selesai' ? 'active' : null; ?>">
                        <a class="nav-link pb-0" href="<?= base_url('staff/laporan_selesai') ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Tiket Laporan Selesai</span></a>
                    </li>
                <?php } ?>


                <!-- Divider -->
                <hr class="sidebar-divider mt-3">
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                    <?php } ?>