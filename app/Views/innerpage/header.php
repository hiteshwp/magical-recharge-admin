<?php
    $router      =  service('router');
    $controller  =  $router->controllerName();
    $method      =  $router->methodName();
    $session     =  session();
    $curUserData =  $session->get('userdata');
    //echo $controller."--".$method;
?>
<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url("assets/images/brand/favicon.ico"); ?>" />

        <!-- TITLE -->
        <title><?php echo $pageTitle; ?></title>

        <!-- BOOTSTRAP CSS -->
        <link id="style" href="<?php echo base_url("assets/plugins/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet" />

        <!-- STYLE CSS -->
        <link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("assets/css/dark-style.css"); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("assets/css/skin-modes.css"); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("assets/css/transparent-style.css"); ?>" rel="stylesheet" />

        <!--- FONT-ICONS CSS -->
        <link href="<?php echo base_url("assets/css/icons.css"); ?>" rel="stylesheet" />

        <!-- COLOR SKIN CSS -->
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url("assets/colors/color1.css"); ?>" />

        <!-- CUCSTOM CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url("assets/css/custom.css"); ?>" />

    </head>

    <body class="app sidebar-mini ltr light-mode" data-baseurl="<?php echo base_url(); ?>">

        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="<?php echo base_url("assets/images/loader.svg"); ?>" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

                <!-- app-Header -->
                <div class="app-header header sticky">
                    <div class="container-fluid main-container">
                        <div class="d-flex align-items-center">
                            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0);"></a>
                            <div class="responsive-logo">
                                <a href="<?php echo base_url("dashboard"); ?>" class="header-logo">
                                    <img src="<?php echo base_url("assets/images/brand/logo-3.png"); ?>" class="mobile-logo logo-1" alt="logo">
                                    <img src="<?php echo base_url("assets/images/brand/logo.png"); ?>" class="mobile-logo dark-logo-1" alt="logo">
                                </a>
                            </div>
                            <!-- sidebar-toggle-->
                            <a class="logo-horizontal " href="<?php echo base_url("dashboard"); ?>">
                                <img src="<?php echo base_url("assets/images/brand/logo.png"); ?>" class="header-brand-img desktop-logo" alt="logo">
                                <img src="<?php echo base_url("assets/images/brand/logo-3.png"); ?>" class="header-brand-img light-logo1"
                                    alt="logo">
                            </a>
                            <!-- LOGO -->
                            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                                <!-- SEARCH -->
                                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon fe fe-more-vertical text-dark"></span>
                                    </button>
                                <div class="navbar navbar-collapse responsive-navbar p-0">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                        <div class="d-flex order-lg-2">
                                            <div class="dropdown d-block d-lg-none">
                                                <a href="javascript:void(0);" class="nav-link icon" data-bs-toggle="dropdown">
                                                    <i class="fe fe-search"></i>
                                                </a>
                                                <div class="dropdown-menu header-search dropdown-menu-start">
                                                    <div class="input-group w-100 p-2">
                                                        <input type="text" class="form-control" placeholder="Search....">
                                                        <div class="input-group-text btn btn-primary">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown d-md-flex">
                                                <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                                    <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                                    <span class="light-layout"><i class="fe fe-sun"></i></span>
                                                </a>
                                            </div>
                                            <!-- Theme-Layout -->
                                            <div class="dropdown d-md-flex">
                                                <a class="nav-link icon full-screen-link nav-link-bg">
                                                    <i class="fe fe-minimize fullscreen-button" id="myvideo"></i>
                                                </a>
                                            </div>
                                            <!-- MESSAGE-BOX -->
                                            <div class="dropdown d-md-flex profile-1">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown" class="nav-link leading-none d-flex px-1">
                                                    <span>
                                                            <img src="<?php echo base_url("assets/images/users/8.jpg"); ?>" alt="profile-user" class="avatar  profile-user brround cover-image">
                                                        </span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <div class="drop-heading">
                                                        <div class="text-center">
                                                            <h5 class="text-dark mb-0">Elizabeth Dyer</h5>
                                                            <small class="text-muted">Administrator</small>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-divider m-0"></div>
                                                    <a class="dropdown-item" href="<?php echo base_url("change-password"); ?>">
                                                        <i class="dropdown-icon fe fe-alert-triangle"></i> Change Password
                                                    </a>
                                                    <a class="dropdown-item" href="<?php echo base_url("logout"); ?>">
                                                        <i class="dropdown-icon fe fe-alert-circle"></i> Logout
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /app-Header -->

                <!--APP-SIDEBAR-->
                <div class="sticky">
                    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                    <aside class="app-sidebar">
                        <div class="side-header">
                            <a class="header-brand1" href="<?php echo base_url("dashboard"); ?>">
                                <img src="<?php echo base_url("assets/images/brand/logo.png"); ?>" class="header-brand-img desktop-logo" alt="logo">
                                <img src="<?php echo base_url("assets/images/brand/logo-1.png"); ?>" class="header-brand-img toggle-logo" alt="logo">
                                <img src="<?php echo base_url("assets/images/brand/logo-2.png"); ?>" class="header-brand-img light-logo" alt="logo">
                                <img src="<?php echo base_url("assets/images/brand/logo-3.png"); ?>" class="header-brand-img light-logo1" alt="logo">
                            </a>
                            <!-- LOGO -->
                        </div>
                        <div class="main-sidemenu">
                            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                    fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                                </svg></div>
                            <ul class="side-menu">
                                <li class="sub-category">
                                    <h3>&nbsp;</h3>
                                </li>
                                <li class="slide <?php if( $controller == "\App\Controllers\DashboardController" ){ echo "is-expanded"; } ?>">
                                    <a class="side-menu__item <?php if( $controller == "\App\Controllers\DashboardController" ){ echo "active"; } ?>" data-bs-toggle="slide" href="<?php echo base_url("dashboard"); ?>"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                                </li>
                                <li class="slide <?php if( $controller == "\App\Controllers\UserController" ){ echo "is-expanded"; } ?>">
                                    <a class="side-menu__item <?php if( $controller == "\App\Controllers\UserController" ){ echo " active is-expanded"; } ?>" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Member Info</span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li class="side-menu-label1"><a href="javascript:void(0)">Master Detail</a></li>
                                        <li><a href="<?php echo base_url("user/create"); ?>" class="slide-item <?php if( $controller == "\App\Controllers\UserController" && $method=="create" ){ echo "active"; } ?>"> Create User</a></li>
                                        <li><a href="<?php echo base_url("user/list"); ?>" class="slide-item <?php if( $controller == "\App\Controllers\UserController" && $method=="index" ){ echo "active"; } ?>"> User List</a></li>
                                        <li><a href="<?php echo base_url("user/deactive-list"); ?>" class="slide-item <?php if( $controller == "\App\Controllers\UserController" && $method=="deactive_user_list" ){ echo "active"; } ?>"> Deactive User</a></li>
                                        <li><a href="javascript:void(0);" class="slide-item <?php if( $controller == "\App\Controllers\UserController" && $method=="staff_list" ){ echo "active"; } ?>"> Staff Manage</a></li>
                                    </ul>
                                </li> 
                                <li class="slide <?php if( $controller == "\App\Controllers\PaymentController" ){ echo "is-expanded"; } ?>">
                                    <a class="side-menu__item <?php if( $controller == "\App\Controllers\PaymentController" ){ echo " active is-expanded"; } ?>" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-dollar-sign"></i><span class="side-menu__label">Payment Info</span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li class="side-menu-label1"><a href="javascript:void(0)">Payment Info</a></li>
                                        <li><a href="javascript:void(0);" class="slide-item <?php if( $controller == "\App\Controllers\PaymentController" && $method=="create" ){ echo "active"; } ?>"> Add Virtual Wallet</a></li>
                                        <li><a href="javascript:void(0);" class="slide-item <?php if( $controller == "\App\Controllers\PaymentController" && $method=="list" ){ echo "active"; } ?>"> Payment Transfer</a></li>
                                        <li><a href="javascript:void(0);" class="slide-item <?php if( $controller == "\App\Controllers\PaymentController" && $method=="index" ){ echo "active"; } ?>"> Payment Revert</a></li>
                                        <li><a href="javascript:void(0);" class="slide-item <?php if( $controller == "\App\Controllers\PaymentController" && $method=="index" ){ echo "active"; } ?>"> All Payment Request</a></li>
                                    </ul>
                                </li>  
                                <li class="slide <?php if( $controller == "\App\Controllers\AccountController" ){ echo "is-expanded"; } ?>">
                                    <a class="side-menu__item <?php if( $controller == "\App\Controllers\AccountController" ){ echo " active is-expanded"; } ?>" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-briefcase"></i><span class="side-menu__label">Account Info</span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li class="side-menu-label1"><a href="javascript:void(0)">Account Info</a></li>
                                        <li><a href="javascript:void(0);" class="slide-item <?php if( $controller == "\App\Controllers\AccountController" && $method=="create" ){ echo "active"; } ?>"> Admin Ledger</a></li>
                                        <li><a href="javascript:void(0);" class="slide-item <?php if( $controller == "\App\Controllers\AccountController" && $method=="list" ){ echo "active"; } ?>"> Retailer Ledger</a></li>
                                    </ul>
                                </li> 
                                <li class="slide <?php if( $controller == "\App\Controllers\ReportController" ){ echo "is-expanded"; } ?>">
                                    <a class="side-menu__item <?php if( $controller == "\App\Controllers\ReportController" ){ echo " active is-expanded"; } ?>" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-file-text"></i><span class="side-menu__label">Report Info</span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li class="side-menu-label1"><a href="javascript:void(0)">Report Info</a></li>
                                        <li><a href="javascript:void(0);" class="slide-item <?php if( $controller == "\App\Controllers\ReportController" && $method=="create" ){ echo "active"; } ?>"> Live Transaction</a></li>
                                        <li><a href="javascript:void(0);" class="slide-item <?php if( $controller == "\App\Controllers\ReportController" && $method=="list" ){ echo "active"; } ?>"> Pending Recharge</a></li>
                                        <li><a href="javascript:void(0);" class="slide-item <?php if( $controller == "\App\Controllers\ReportController" && $method=="list" ){ echo "active"; } ?>"> Search Transaction</a></li>
                                        <li><a href="javascript:void(0);" class="slide-item <?php if( $controller == "\App\Controllers\ReportController" && $method=="list" ){ echo "active"; } ?>"> Datewise Recharge Transaction</a></li>
                                    </ul>
                                </li> 
                                <li class="slide <?php if( $controller == "\App\Controllers\MLMController" ){ echo "is-expanded"; } ?>">
                                    <a class="side-menu__item <?php if( $controller == "\App\Controllers\MLMController" ){ echo " active is-expanded"; } ?>" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-cpu"></i><span class="side-menu__label">MLM Setting</span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li class="side-menu-label1"><a href="javascript:void(0)">MLM Setting</a></li>
                                        <li><a href="javascript:void(0);" class="slide-item <?php if( $controller == "\App\Controllers\MLMController" && $method=="create" ){ echo "active"; } ?>"> Level Commission</a></li>
                                    </ul>
                                </li>     
                                <li class="slide">
                                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">General Setting</span></a>
                                </li>       
                                <li class="slide">
                                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">My Profile</span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-lock"></i><span class="side-menu__label">Change Password</span></a>
                                </li>                
                                <li class="slide">
                                    <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo base_url("logout"); ?>"><i class="side-menu__icon fe fe-power"></i><span class="side-menu__label">Logout</span></a>
                                </li>
                            </ul>
                            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                                </svg></div>
                        </div>
                    </aside>
                </div>
                <!--/APP-SIDEBAR-->