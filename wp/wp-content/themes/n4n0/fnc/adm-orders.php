<?php


add_action( 'admin_menu', 'orders_admin_menu' );
function bardahl_orders(){
  
}

function orders_admin_menu() {
  // add_menu_page(
  //         'My Top Level Menu Example',
  //         'Top Level Menu',
  //         'manage_options',
  //         'myplugin/myplugin-admin-page.php',
  //         'myplguin_admin_page',
  //         'dashicons-tickets',
  //         6 
  //   );
  $page_title = "Website orders";
  $menu_title = "Orders";
  $capability = "edit_pages";
  $menu_slug = "admin.php?page=orders";
  $function = "bardahl-orders";
  $icon_url = "";
  $position = "99";

  add_menu_page(
    $page_title, 
    $menu_title, 
    $capability, 
    $menu_slug, 
    $function = '', 
    $icon_url = '', 
    $position = null 
    );

}

