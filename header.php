<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title> <?php echo get_bloginfo('name'); ?>|<?php echo get_bloginfo('description'); ?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">

 
  
 

  <!-- Favicons -->
  <link href=" <?php echo get_bloginfo('template_url'); ?>/assets/img/favicon.png" rel="icon">
  <link href=" <?php echo get_bloginfo('template_url'); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  
  

  
  <?php wp_head(); ?>


  <!-- =======================================================
  * Template Name: Sailor
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
</head>

<body class="index-page">


 
<!-- header start -->

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="index.php" class="logo d-flex align-items-left me-auto">
        
        <?php if (has_custom_logo()) : ?>
          <?php echo get_custom_logo(); ?>  
        <?php else : ?>
         
          <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/default-logo.png" alt="Default Logo"> 
        <?php endif; ?>
      </a>
      <h1 class="sitename">Sailor</h1>
      <nav id="navmenu" class="navmenu">
        <?php

          //displa the dynami menu
          wp_nav_menu(array(
                            'theme-location'=>'primary-menue',
                            'container'=>'',
                            'menu_class'=>'menu',
                            'fallback_cb'=>false
                          ));
       ?>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="about.html">Get Started</a>

    </div>

  </header>

  <!-- header end -->
  