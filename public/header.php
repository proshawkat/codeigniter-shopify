<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <base href="<?php echo base_url(); ?>">
        <title>Fogzee</title>

        <!-- Custom fonts for this template-->
        <link href=<?php echo site_url(); ?>public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- Custom styles for this template-->
        <link href="<?php echo site_url(); ?>public/assets/css/sb-admin-2.min.css" rel="stylesheet">


        <link href="<?php echo site_url(); ?>public/assets/css/custom.css" rel="stylesheet">

        <script src="https://cdn.shopify.com/s/assets/external/app.js"></script>

        <?php
            $api_data = array(
                'API_KEY' => $this->config->item('shopify_api_key'),
                'API_SECRET' => $this->config->item('shopify_secret'),
                'SHOP_DOMAIN' => $_SESSION['shop'],
                'ACCESS_TOKEN' => $this->session->userdata('access_token')
            );

            $CI = & get_instance();
            $CI->load->library('Shopify', $api_data);

            $the_script_tag = site_url().'scripts/frontend_register_script.php';
//            dd($the_script_tag);
            $scriptArray = array(
                'script_tag' => array(
                    'event' => 'onload',
                    'src' => $the_script_tag
                )
            );

        $script_tags = $CI->shopify->call(['METHOD' => 'GET', 'URL' => $_SESSION['shop'] . '/admin/api/2020-10/script_tags.json'], true);
//        $CI->shopify->call(['METHOD' => 'DELETE', 'URL' => $_SESSION['shop'] . '/admin/api/2020-10/script_tags/118936141870.json'], true);

//        dd($script_tags);
        $exists = false;
        foreach( $script_tags->script_tags as $script_tag ) {
            if( $script_tag->src == $the_script_tag ) $exists = true;
        }

        if( !$exists ) $CI->shopify->call(['METHOD' => 'POST', 'URL' => $_SESSION['shop'] . '/admin/api/2020-10/script_tags.json', 'DATA' => $scriptArray], true);
        
        ?>
    </head>

    <body>
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background: #ffffff;" href="#">
                    <div class="sidebar-brand-icon rotate-n-15 text-primary-color">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3 text-primary-color">Fogzee</div>
                </a>

                <?php if($this->uri->segment(3) != 'editor'){ ?>
<!--                    <li class="sidebar-header-li nav-item">-->
<!--                        <a class="nav-link" href="--><?php //echo 'https://'.$this->session->userdata('shop').'/admin/apps'; ?><!--"><i class="fa fa-arrow-left"></i>Back To Shopify</a>-->
<!--                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link menu_active" href="<?php echo base_url(); ?>app/home">Dashboard</a>
                    </li>
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="--><?php //echo base_url(); ?><!--event/page/all"><i class="fa fa-file"></i>Event Pages</a>-->
<!--                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>event/all">Event List</a>
                    </li>
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="--><?php //echo base_url(); ?><!--event/live"><i class="fa fa-dot-circle-o"></i>Live Event</a>-->
<!--                    </li>-->
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
                                        <span class="text-primary-color"><?php echo $shop_owner->meta_value; ?></span>
                                        <br>
                                        <span class="small text-primary-color"><?php echo $this->session->userdata('shop'); ?></span>
                                    </span>
                                </a>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="<?php if($this->uri->segment(3) !== 'editor') { echo 'container-fluid mt-2'; } ?>">
