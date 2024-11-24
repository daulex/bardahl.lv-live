<a href="<?php bloginfo('url'); echo "/".get_lang(); ?>" id="offcanvas-logo"><img src="<?php echo get_template_directory_uri(); ?>/a/i/logo-bardahl.svg" alt="<?php echo get_ui_text('logo'); ?>"></a>

<?php
  wp_nav_menu("&menu=mobile&container=&menu_id=menu-top-offcanvas");

  $menu = get_lang() == "ru" ? "pre-top-ru" : "pre-top-lv";
  wp_nav_menu("&menu=".$menu."&container=&menu_id=pre-menu-top-offcanvas");
?>

<div id="offcanvas-contact">
<?php get_template_part("parts/x-contact"); ?>
</div>