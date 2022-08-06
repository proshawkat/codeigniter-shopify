<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('public/assets/images/favicon/apple-touch-icon.png');?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('public/assets/images/favicon/favicon-32x32.png');?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('public/assets/images/favicon/favicon-16x16.png');?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('public/assets/css/admin_responsive.css');?>">

        <base href="<?php echo base_url(); ?>">
        <title>Fogzee</title>

        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('public/assets/css/all.css');?>">
        <!-- Custom styles for this template-->
        <link href="<?php echo site_url(); ?>public/assets/css/sb-admin-2.min.css" rel="stylesheet">

        <link href="<?php echo site_url(); ?>public/assets/css/custom.css" rel="stylesheet">
        <?php if(isset($page_name) && $page_name == 'event_promotion'){ ?>
        <link href="<?php echo site_url(); ?>public/assets/css/widget_styles.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>public/assets/css/banner_styles.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>public/assets/css/promotion_style.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>public/assets/css/promotion_responsive.css" rel="stylesheet">
        <?php } ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">

        <script src="https://cdn.shopify.com/s/assets/external/app.js"></script>
    </head>

    <body>
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background: #e04747;" href="<?php echo site_url('app/home') ?>">
                    <div class="sidebar-brand-text mx-3">Fogzee</div>
                </a>

                <?php if($this->uri->segment(2) == 'home' || ($this->uri->segment(1)=='event' && $this->uri->segment(2)=='all')){ ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(1)=='app' && $this->uri->segment(2) == 'home'){ echo "menu_active"; } ?>" href="<?php echo base_url(); ?>app/home">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(1)=='event' && $this->uri->segment(2) == 'all'){ echo "menu_active"; } ?>" href="<?php echo base_url(); ?>event/all">All Events</a>
                    </li>
                <?php }else{ ?>
                    <li class="nav-item">
                        <?php if(isset($_GET['event']) && isset($_GET['talk'])){ ?>
                            <a class="nav-link <?php if($this->uri->segment(2) == 'add-new-event'){ echo "menu_active"; } ?>" href="<?php echo base_url(); ?>event/add-new-event?step=1&event=<?php echo $_GET['event'].'&talk='.$_GET['talk']; ?><?php if(isset($_GET['status'])) echo '&status=edit'; ?>">
                        <?php }elseif(isset($_GET['event']) && isset($_GET['session'])){ ?>
                            <a class="nav-link <?php if($this->uri->segment(2) == 'add-new-event'){ echo "menu_active"; } ?>" href="<?php echo base_url(); ?>event/add-new-event?step=1&event=<?php echo $_GET['event'].'&session='.$_GET['session']; ?><?php if(isset($_GET['status'])) echo '&status=edit'; ?>">
                        <?php }else{ ?>
                            <a class="nav-link <?php if($this->uri->segment(2) == 'add-new-event'){ echo "menu_active"; } ?>" href="<?php echo base_url(); ?>event/add-new-event?step=1">
                        <?php } ?>
                            Your event setup
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php if(isset($_GET['event']) && isset($_GET['talk'])){ ?>
                            <a class="nav-link <?php if($this->uri->segment(2) == 'promotion-setup'){ echo "menu_active"; } ?>" href="<?php echo base_url('event/promotion-setup?event='.$_GET['event'].'&talk='.$_GET['talk']); ?><?php if(isset($_GET['status'])) echo '&status=edit'; ?>">
                        <?php }elseif(isset($_GET['event']) && isset($_GET['session'])){ ?>
                            <a class="nav-link <?php if($this->uri->segment(2) == 'promotion-setup'){ echo "menu_active"; } ?>" href="<?php echo base_url('event/promotion-setup?event='.$_GET['event'].'&session='.$_GET['session']); ?><?php if(isset($_GET['status'])) echo '&status=edit'; ?>">
                        <?php }else{ ?>
                            <a onclick="alertModal()" class="nav-link <?php if($this->uri->segment(2) == 'promotion-setup'){ echo "menu_active"; } ?>" href="javascript:void(0)">
                        <?php } ?>
                                Your event's promotion</a>
                    </li>
                <?php } ?>
            </ul>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                                    <span class="ml-2 d-none d-lg-inline small">
                                        <span><?php echo $shop_owner->meta_value; ?></span>
                                        <br>
                                        <span class="small"><?php echo $this->session->userdata('shop'); ?></span>
                                    </span>
                                </a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo site_url('logout'); ?>">Logout</a>
                                </div>
                            </li>

                        </ul>
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="<?php if($this->uri->segment(3) !== 'editor') { echo 'container-fluid mt-2'; } ?>">
