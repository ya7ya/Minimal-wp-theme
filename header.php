<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title('|',true, 'right'); ?><?php bloginfo('name'); ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="author" content="">

        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css">

        
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

    <!-- HEADER -->
    <header class="main-header">
        <div class="main-header-wrap clearfix">
        <div class="top-menu-container">

            <div class="container">
                <nav class = "top-menu-navigation navbar">
                    <?php /* wp_nav_menu(array(
                        'theme_location' => 'top-menu'
                    ));*/ ?>
                </nav>

            </div> <!-- end of container-->

        </div><!-- end of top-menu-container-->
        <div class="container">

            <div class="row-fluid">
            
                <div class="span12">
                    <h1 id="logo" class ="logo"><a href="<?php echo home_url(); ?>"><img src="<?php print IMAGES; ?>/logo.png" class="img-circle" alt="<?php bloginfo('name'); ?>" /></a></h1>
                </div><!-- end of span 3-->

            
            </div> <!-- end of row-->
            
            <nav id="main-nav" class="main-navigation navbar clearfix">
                <ul id="menu-static" class="menu">
                <a id="nav-brand" href="#logo"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.png" class="img-circle logo-icon brand" alt="<?php bloginfo('name'); ?>" /></a>
                  <?php wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'item_wrap' =>  '%3$s'
                    )); ?>

                </ul>
            </nav> <!-- end of main navigation-->


        </div><!-- end of container -->
    </div>
    </header><!-- end of main header-->