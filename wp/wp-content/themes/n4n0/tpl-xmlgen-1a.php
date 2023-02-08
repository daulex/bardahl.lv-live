<?php
	/* Template name: xmlgen 1a */
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
		<sku>".$inf['sku']."</sku>
		<ean>".$inf['ean']."</ean>
		<price>".$inf['price']."</price>
		<price_1a>".$inf['1a_price']."</price_1a>
		<image>".$inf['image']."</image>
		<category_full>".$inf['category']."</category_full>
		<category_link>".$inf['category_link']."</category_link>
		<manufacturer>Bardahl</manufacturer>
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

		
		
		
		$item['image'] = $imgSizes['product-square'];
		
		$item['category'] = get_ui_text($product_type)." ".get_ui_text($vehicle_type);
		$item['category_link'] = get_bloginfo('url')."/#pc-".$product_type;
		$not_available = get_field("not_available");
		
		if($not_available):
			$item['count'] = 0;
		else:
			// $item['count'] = 10;
			$item['count'] = rand(10, 15);
		endif;



		
		foreach($prices as $pr):

			$qty = explode(" ", $pr['quantity']);
			if($qty[1] === "L"):
				$quantity_wording = intval($qty[0]) === 1 ? "litrs" : "litri";
				$quantity = $qty[0]." ".$quantity_wording;
			else:
				$quantity = $pr['quantity'];
			endif;

			$item['name'] = $post->post_title." ".$quantity;

			$item['sku'] = $pr['sku'];
			$item['ean'] = $pr['ean'];
			$item['price'] = $pr['price'];
			$item['1a_price'] = $pr['1a_price'];


			array_push($xmlArray, renderItem($item));


			
		endforeach;
		
		

		


		

	endwhile; endif;


	array_push($xmlArray, $xml_end);

	$final = implode("", $xmlArray);

	$myfile = fopen($theme."/1a.xml", "w") or die("Unable to open file!");

	fwrite($myfile, $final);

	fclose($myfile);
?>