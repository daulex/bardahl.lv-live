<?php
/*
Plugin Name: Bardahl Store Manager
Plugin URI: https://bardahl.lv
Description: A simple plugin to handle the management of the Bardahl Store
Version: 0.1
Author: Kirill Galenko
Author URI: http://daulex.com
License: GPL2
*/

add_action( 'admin_menu', 'bsm_admin_menu' );

function bsm_admin_menu() {
  add_menu_page( 'Bardahl Store Manager', 'BSM', 'manage_options', 'bsm', 'bsm_init', 'dashicons-tickets', 101  );
}

function bsm_init(){
  
  global $wpdb;

  $v = rand();

  wp_register_style( 'bsm_css', plugins_url('a/base.css', __FILE__) , false, $v );
  wp_enqueue_style( 'bsm_css' );

  wp_enqueue_script( "bsm_js", plugins_url('a/base.js', __FILE__), 0, $v, true );

  include("inc/app.php");

  bsm_include_template($wpdb);
  
  
}

function bsm_ajax(){
  if(isset($_GET['bsm_ajax'])):
    include("inc/app.php");
    include("inc/ajax.php");  
    die();
  endif;
}
add_action('plugins_loaded', 'bsm_ajax');