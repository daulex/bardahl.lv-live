<?php  $v = get_r_v(); ?>
<!doctype html>
<html lang="<?php echo get_lang() == "ru" ? "ru" : "lv"; ?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title(' | ', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/a/plugins/pushy/css/pushy.css" />


	<!-- <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/a/css/reset.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/a/plugins/slick/slick.css" />
  
	
  
  
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/a/css/base.css?v=<?php echo $v; ?>" /> -->
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/a/css/fontawesome/css/font-awesome.min.css?v=150917" />
	<?php wp_head(); ?>

<!-- Global site tag (gtag.js) - Google AdWords: 1046291819 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-1046291819"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-1046291819');
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-2761409-27', 'auto');
  ga('send', 'pageview');
</script>

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '595424047276107');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=595424047276107&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

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
      <a href="<?php bloginfo('url'); echo "/".get_lang(); ?>" id="header-logo"><img src="<?php echo get_template_directory_uri(); ?>/a/i/logo-bardahl.svg" alt="<?php echo get_ui_text('logo'); ?>"></a>
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

