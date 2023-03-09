<?php

  add_action( 'init', 'kg_products_cpt' );
  function kg_products_cpt() {
    $labels = array(
              "name" => "Products",
              "add_new" => "Add new Product",
              "add_new_item" => "Add new Product",
              "singular_name" => "Products",
              "view_item" => "View Product",
              "view_items" => "View Products",
              "all_items" => "All Products",
              "featured_image" => "Product picture",
              "search_items" => "Search Products",
              // "" => "",
              // "" => "",
              // "" => "",
              // "" => "",
              // "" => "",
              );
    register_post_type( 'product', array(
      'labels'  => $labels,
      'public' => true,
      'rewrite' => array('slug' => 'produkti'),
      'has_archive' => true,
      'menu_icon' => 'dashicons-products',
      'taxonomies' => array('product-type','product-application'),
      'supports' => array('title', 'thumbnail')
    ));

  }

  // Register Custom Taxonomy
  function kg_product_tax() {

    $labels = array(
      'name'                       => 'Product types',
      'singular_name'              => 'Product type',
      'menu_name'                  => 'Product types',
      'all_items'                  => 'All product types',
      'parent_item'                => 'Parent product type',
      'parent_item_colon'          => 'Parent product type:',
      'new_item_name'              => 'New product type',
      'add_new_item'               => 'Add product type',
      'edit_item'                  => 'Edit product type',
      'update_item'                => 'Update product type',
      'view_item'                  => 'View product type',
      'separate_items_with_commas' => 'Separate product types with commas',
      'add_or_remove_items'        => 'Add or remove product types',
      'choose_from_most_used'      => 'Choose from the most used',
      'popular_items'              => 'Popular product types',
      'search_items'               => 'Search product types',
      'not_found'                  => 'Not Found',
      'no_terms'                   => 'No product types',
      'items_list'                 => 'Product type list',
      'items_list_navigation'      => 'product type navigation',
    );
    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => false,
    );
    register_taxonomy( 'product-type', array( 'product' ), $args );


    $labels2 = array(
      'name'                       => 'Product applications',
      'singular_name'              => 'Product application',
      'menu_name'                  => 'Product applications',
      'all_items'                  => 'All product applications',
      'parent_item'                => 'Parent product application',
      'parent_item_colon'          => 'Parent product application:',
      'new_item_name'              => 'New product application',
      'add_new_item'               => 'Add product application',
      'edit_item'                  => 'Edit product application',
      'update_item'                => 'Update product application',
      'view_item'                  => 'View product application',
      'separate_items_with_commas' => 'Separate product applications with commas',
      'add_or_remove_items'        => 'Add or remove product applications',
      'choose_from_most_used'      => 'Choose from the most used',
      'popular_items'              => 'Popular product applications',
      'search_items'               => 'Search product applications',
      'not_found'                  => 'Not Found',
      'no_terms'                   => 'No product applications',
      'items_list'                 => 'Product application list',
      'items_list_navigation'      => 'product application navigation',
    );
    $args2 = array(
      'labels'                     => $labels2,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => false,
    );
    register_taxonomy( 'product-application', array( 'product' ), $args2 );

  }
  add_action( 'init', 'kg_product_tax', 0 );
  









  function bts_custom_pp($query) {
      if (!$query->is_main_query())
          return $query;
      elseif ( !is_admin() && $query->is_post_type_archive('our-people') || !is_admin() && $query->is_tax('job_category'))
          $query->set('posts_per_page', '24');
      // elseif ($query->is_post_type_archive('case-study') || $query->is_tax('case-study-category'))
      //     $query->set('posts_per_page', '30');
      return $query;
  }
  add_filter('pre_get_posts', 'bts_custom_pp');
   
  // Apply pre_get_posts filter - ensure this is not called when in admin
  // if (!is_admin()) {
  //     add_filter('pre_get_posts', 'tenpixelsleft_custom_posts_per_page');
  // }


