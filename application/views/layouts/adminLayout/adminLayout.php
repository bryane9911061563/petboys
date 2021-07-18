<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Petboys - <?= $titulo ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('resources/assets/images/favicon.ico') ?>">

    <!-- App css -->
    <link href="<?= base_url('resources/assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('resources/assets/css/icons.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('resources/assets/css/metismenu.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('resources/assets/css/style.css') ?>" rel="stylesheet" type="text/css" />

    <script src="<?= base_url('resources/assets/js/modernizr.min.js') ?>"></script>

</head>


<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">

            <div class="slimscroll-menu" id="remove-scroll">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <span>
                            <img src="<?= base_url('resources/assets/images/logo.png') ?>" alt="" height="22">
                        </span>
                        <i>
                            <img src="<?= base_url('resources/assets/images/logo_sm.png') ?>" alt="" height="28">
                        </i>
                    </a>
                </div>

                <!-- User box -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="<?= base_url('resources/assets/images/users/avatar-1.jpg') ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                    </div>
                    <h5><a href="#"><?= $this->session->userdata('nombres') . ' ' . $this->session->userdata('apellidos') ?></a> </h5>
                    <p class="text-muted">Admin Head</p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <!--<li class="menu-title">Navigation</li>-->

                        <li>
                            <a href="<?= base_url('inicio') ?>">
                                <i class="fi-air-play"></i><span class="badge badge-danger badge-pill float-right">7</span> <span> Inicio </span>
                            </a>
                        </li>

                    </ul>

                </div>
                <!-- Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <!-- Top Bar Start -->
            <div class="topbar">

                <nav class="navbar-custom">

                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?= base_url('resources/assets/images/users/avatar-1.jpg') ?>" alt="user" class="rounded-circle"> <span class="ml-1"><?= $this->session->userdata('nombres') . ' ' . $this->session->userdata('apellidos') ?> <i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Bienvenido !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-head"></i> <span>My perfil</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-cog"></i> <span>Ajustes</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-help"></i> <span>Soporte</span>
                                </a>

                                <!-- item-->
                                <a href="<?= base_url('CAuth/cerrarSesion') ?>" class="dropdown-item notify-item">
                                    <i class="fi-power"></i> <span>Cerrar sesión</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left disable-btn">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        <li>
                            <div class="page-title-box">
                                <h4 class="page-title"><?= $titulo ?> </h4>
                                <ol class="breadcrumb">
                                    <!-- <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                                    <li class="breadcrumb-item active"><?= $titulo ?></li>
                                </ol>
                            </div>
                        </li>

                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->



            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">

                    <?= $content ?>

                </div> <!-- container -->

            </div> <!-- content -->

            <footer class="footer">
                <?= date('Y') ?> © Petboys. - blazarnetworks.com
            </footer>

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->



    <!-- jQuery  -->
    <script src="<?= base_url('resources/assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('resources/assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('resources/assets/js/metisMenu.min.js') ?>"></script>
    <script src="<?= base_url('resources/assets/js/waves.js') ?>"></script>
    <script src="<?= base_url('resources/assets/js/jquery.slimscroll.js') ?>"></script>

    <!-- App js -->
    <script src="<?= base_url('resources/assets/js/jquery.core.js') ?>"></script>
    <script src="<?= base_url('resources/assets/js/jquery.app.js') ?>"></script>

</body>

</html>