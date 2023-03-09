<?php 
    $query = $args['query'] ?? array(
        "nopaging" => true,
        "post_type" => "page",
        "post_status" => "publish",
        "post_parent" => get_ui_text("product_page")
    );

	$products = new WP_Query($query);

	if($products->have_posts()): while($products->have_posts()): $products->the_post();
		$pid = $post->ID;
		$pt = $post->post_title;
		// $loop_class = "col-sm-4 product-row-3 product";
		$loop_class = "product-row-3 product";
		
		include 'parts/product-loop-partial.php';
?>
<?php endwhile; endif; wp_reset_query(); ?>