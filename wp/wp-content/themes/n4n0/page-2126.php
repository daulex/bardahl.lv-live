<?php
	$products = new WP_Query( array(
		"post_type" => "page",
		"post_parent" => "5",
		"nopaging" => true,
		"post_status" => "publish",
		"order" => "ASC",
		"orderby" => "menu_order"

		) );
	
	$allRows = array();
if($products->have_posts()): while($products->have_posts()): $products->the_post();
	
	$img = get_field("image", $post->ID);
	$imgSizes = $img['sizes'];

	$price = array_reverse(get_field("prices"))[0];

	$row = array(
			"id" => $post->ID,
			"availability" => "in stock",
			"condition" => "new",
			"description" => get_the_excerpt(),
			"image_link" => $img['url'],
			"link" => get_permalink($post->ID),
			"title" => $post->post_title,
			"price" => $price['price'],
			"brand" => "Bardahl",
			"google_product_category" => "5613"
		);

	array_push($allRows, $row);
	
endwhile; endif; /* ends product loop */



$output = fopen("php://output",'w') or die("Can't open php://output");
header("Content-Type:application/csv"); 
header("Content-Disposition:attachment;filename=pressurecsv.csv"); 
fputcsv($output, array("id","availability","condition","description","image_link","link","title","price","brand","google_product_category"));
foreach($allRows as $product) {
    fputcsv($output, $product);
}
fclose($output) or die("Can't close php://output");
?>