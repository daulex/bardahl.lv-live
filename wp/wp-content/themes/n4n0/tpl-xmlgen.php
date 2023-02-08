<?php
	/* Template name: xmlgen */
	if($_GET['XVPLp6Qb6sM5bUW'] !== 'yAZmPCVepaakFvF')
		die("fail");


	$theme = get_template_directory();

	$xml_start = '<?xml version="1.0" encoding="utf-8" ?><root>';
	$xml_end = '</root>';

	$xmlArray = array();

	function renderItem($inf){
		$itemxml = "
	<item>
		<name>Bardahl ".xml_escape($inf['name'])."</name>
		<link>".$inf['url']."</link>
		<price>".$inf['price']."</price>
		<image>".$inf['image']."</image>
		<category_full>".$inf['category']."</category_full>
		<category_link>".$inf['category_link']."</category_link>
		<manufacturer>Bardahl</manufacturer>
		<model>".$inf['sku']."</model>
		<in_stock>".$inf['count']."</in_stock>
		<delivery_omniva>5.62</delivery_omniva>


	</item>";
		return $itemxml;
	}

	array_push($xmlArray, $xml_start);


	// for ($i=0; $i < 4; $i++) { 
	// 	array_push($xmlArray, renderItem($i));
	// }


	$products = new WP_Query(array(
		"posts_per_page" => 1000,
		"post_type" => "page",
		"post_parent" => 5,
		"post_status" => 'publish'
		));

	if($products->have_posts()): while($products->have_posts()): $products->the_post();
		$img = get_field("image", $post->ID);
		$imgSizes = $img['sizes'];
		$product_type = get_field("product_type", $post->ID);
		$vehicle_type = get_field("vehicle_type", $post->ID);

		$prices = get_field("prices", $post->ID);
		$i = 1;
		$id = $post->ID;

		$item = array();

		$item['url'] = get_permalink($post->ID);
		$item['name'] = $post->post_title;



		$highestPrice = 0;
		$highestQuantity = 0;
		foreach($prices as $pr):
			if(intval($pr["price"]) > intval($highestPrice)):
				$highestPrice = $pr["price"];
				$highestQuantity = $pr["quantity"];
			endif;
		endforeach;
		
		$qty = explode(" ", $pr['quantity']);
		if($qty[1] === "L"):
			$quantity = $qty[0]." litri";
		else:
			$quantity = $pr['quantity'];
		endif;

		$item['name'] .= " ".$quantity;
		$item['price'] = $highestPrice;
		$item['image'] = $imgSizes['product-square'];
		$item['sku'] = get_field("sku", $post->ID);
		$item['category'] = get_ui_text($product_type)." ".get_ui_text($vehicle_type);
		$item['category_link'] = get_bloginfo('url')."/#pc-".$product_type;
		$not_available = get_field("not_available");
		
		if($not_available):
			$item['count'] = 0;
		else:
			// $item['count'] = 10;
			$item['count'] = rand(10, 15);
		endif;


		array_push($xmlArray, renderItem($item));

	endwhile; endif;


	array_push($xmlArray, $xml_end);

	$final = implode("", $xmlArray);

	$myfile = fopen($theme."/salidzini.xml", "w") or die("Unable to open file!");

	fwrite($myfile, $final);

	fclose($myfile);
?>