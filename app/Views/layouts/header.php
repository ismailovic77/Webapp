<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Doc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico'); ?>">

    <!-- jquery.vectormap css -->
    <link href="<?= base_url('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/css/app.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />

    <!-- jQuery -->
    <script src="<?= base_url('assets/libs/jquery/jquery.min.js'); ?>"></script>

    <style>
        .swal2-shown>[aria-hidden="true"] {
            filter: blur(2px);
        }

        @media (min-width: 992px) {

            body[data-layout='detached'] #layout-wrapper::after,
            body[data-layout='detached'] #layout-wrapper::before {
                height: 145px;
            }

            .page-content {
                padding: calc(70px) 24px 60px 24px;
            }


            body[data-layout="detached"] .vertical-menu {
                margin-top: 25px;
            }

            body[data-layout="detached"] .page-title-box {
                padding-bottom: 16px;
            }

        }

        .navbar-brand-box {
            padding: 0 .3rem;
        }

        body[data-layout="detached"] #layout-wrapper::before {
            background: linear-gradient(to right, #0075cc, #1961b0);
        }

        body[data-layout="detached"] #layout-wrapper::after {
            background: none;
        }

        body[data-sidebar-size="small"] .vertical-menu {
            min-width: 140px;
        }

        .btn-primary {
            background-color: #0089ef;
            border-color: #006cbd;
        }

        .btn-primary:hover,
        .btn-primary:not(:disabled):not(.disabled).active,
        .btn-primary:not(:disabled):not(.disabled):active,
        .show>.btn-primary.dropdown-toggle {
            background-color: #006cbd;
            border-color: #006cbd;
        }

        .bg-primary {
            background-color: #0089ef !important;
        }

        .bg-danger {
            background-color: #fa588a !important;
        }

        .btn-danger {
            background-color: #fa759e;
            border-color: #fa588a;
        }
    </style>

</head>

<body data-layout="detached" data-topbar="colored" data-sidebar-size="small">
    <!-- <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div> -->
    <div class="container-fluid">
        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="container-fluid">
                        <div class="float-right">

                            <!-- <div class="dropdown d-inline-block d-lg-none ml-2">
                                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                                    <form class="p-3">
                                        <div class="form-group m-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->

                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="<?= base_url('assets/images/users/avatar-2.png'); ?>" alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ml-1"><?= session("login") ?></span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- item-->
                                    <a class="dropdown-item text-danger" href="<?= base_url('/logout'); ?>"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <!-- LOGO -->
                            <div class="navbar-brand-box">
                                <a href="/" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="<?= base_url('assets/images/logos/deep_horizontal.png'); ?>" alt="" height="20">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="<?= base_url('assets/images/logos/deep_horizontal.png'); ?>" alt="" height="20">
                                    </span>
                                </a>

                                <a href="/" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="<?= base_url('assets/images/logos/deep_horizontal.png'); ?>" alt="" height="20">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="<?= base_url('assets/images/logos/deep_horizontal.png'); ?>" alt="" height="20">
                                    </span>
                                </a>
                            </div>

                            <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect" id="vertical-menu-btn">
                                <i class="fa fa-fw fa-bars"></i>
                            </button>

                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div class="h-100">

                    <div class="user-wid text-center py-4">
                        <div class="user-img">
                            <img src="<?= base_url("assets/images/users/doctor-avatar.svg") ?>" alt="" class="avatar-md mx-auto rounded-circle">
                        </div>

                        <div class="mt-3">

                            <a href="#" class="text-dark font-weight-medium font-size-16"><?= session("lastname") . " " . session("firstname") ?></a>
                            <p class="text-body mt-1 mb-0 font-size-13">Doctor</p>

                        </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="mm-active">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled mm-show" id="side-menu">
                            <!-- <li class="menu-title">Menu</li> -->

                            <?php if (session('role') == 'ADMIN') : ?>
                                <li>
                                    <a href="/" class="waves-effect">
                                        <i>
                                            <img src="<?= base_url('assets/images/icons/home.svg'); ?>" alt="" height="40">
                                        </i>
                                        <!-- <i class="mdi mdi-desktop-mac-dashboard"></i> -->
                                        <span>Home</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?= base_url('/reports') ?>" class=" waves-effect">
                                        <i>
                                            <img src="<?= base_url('assets/images/icons/reports.svg'); ?>" alt="" height="40">
                                        </i>
                                        <!-- <i class="mdi mdi-folder-account-outline"></i> -->
                                        <span>Reports</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?= base_url('/analytics') ?>" class=" waves-effect">
                                        <i>
                                            <img src="<?= base_url('assets/images/icons/analytics.svg'); ?>" alt="" height="40">
                                        </i>
                                        <!-- <i class="mdi mdi-google-analytics"></i> -->
                                        <span>Analytics</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?= base_url('/literature') ?>" class=" waves-effect">
                                        <i>
                                            <img src="<?= base_url('assets/images/icons/literature.svg'); ?>" alt="" height="40">
                                        </i>
                                        <!-- <i class="mdi mdi-google-analytics"></i> -->
                                        <span>Literature</span>
                                    </a>
                                </li>
                            <?php endif ?>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- ========== Left Sidebar End ========== -->

            <div class="main-content">


                <?php if (false) : ?>
            </div>
        </div>
    </div>
<?php endif ?>