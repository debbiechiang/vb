<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
  </head>

  <body>
    <header class="sticky-header">
     <div class="wrapper">
       <div class="nav-wrapper row">
        <a class="logomark" href="<?php echo get_bloginfo( 'wpurl' );?>"><span>Vivek</span>Bedi</a>
        <?php wp_nav_menu('menu=nav&menu_class=nav-items&container=nav'); ?>
       </div>
     </div>
   </header>