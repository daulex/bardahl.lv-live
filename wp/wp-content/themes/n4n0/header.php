<!doctype html>
<html lang="lv">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title(' | ', true, 'right'); ?></title>
    
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/a/plugins/pushy/css/pushy.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/a/css/fontawesome/css/font-awesome.min.css?v=150918" />
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?> data-lang="<?php echo get_lang() === 'ru' ? "ru" : "lv"; ?>">

<nav class="pushy pushy-left" data-focus="#first-link">
  <div class="pushy-content">
  <?php get_template_part("parts/offcanvas"); ?>
  </div>
</nav>

<!-- Site Overlay -->
<div class="site-overlay"></div>

<!-- Your Content -->
<div id="container">

<header>
  <div id="header-innner" class="container">
    <div id="header-inner">
      <a href="<?php bloginfo('url'); echo "/".get_lang(); ?>" id="header-logo"><img src="<?php echo get_template_directory_uri(); ?>/a/i/logo-bardahl.svg" alt="<?php echo get_ui_text('logo'); ?>" width="176" height="123"></a>
    </div>
    <div id="header-innner-flex">
      
      <div id="hi-logo">&nbsp;</div>

      <div id="hi-navs">
        <div id="hin-1">
          <?php
            $menu = get_lang() == "ru" ? "pre-top-ru" : "pre-top-lv";
            wp_nav_menu("&menu=".$menu."&container=");
          ?>
          <span class="hin-1-address"><?php echo get_ui_text('address'); ?></span>
          <span class="hin-1-phone"><?php echo get_ui_text('phone'); ?></span>

        </div>
        <div id="hin-2">
        
            <a href="<?php echo get_permalink(get_ui_text("advise_oil_page")); ?>" id="oil-request"><?php echo get_ui_text("advise_oil"); ?></a>
          
          <?php
            $menu = get_lang() == "ru" ? "top-ru" : "top";
            wp_nav_menu("&menu=".$menu."&container=");
          ?>
          <a href="<?php echo get_permalink(get_ui_text('cart_link')); ?>" id="cart-nav"><i class="fa fa-shopping-cart"></i> &nbsp; &euro;<span class="cart-val"><?php echo cart_sum(); ?></span></a>
          <button class="menu-btn">&#9776; <span><?php echo get_ui_text('toggle_menu'); ?></span></button>
        </div>
      </div>
    </div>  
  </div>
            
</header>
