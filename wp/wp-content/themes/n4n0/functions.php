<?php

	include 'fnc/product-post-type.php';
	include 'fnc/user-fields.php';
	include 'fnc/post-helpers.php';
	include 'fnc/remove-comments.php';
	include 'fnc/language.php';
    include 'fnc/helper-products.php';
    include 'fnc/api-endpoints/get-cart-sum.php';
    include 'fnc/api-endpoints/get-csv.php';

    add_action( 'wp_enqueue_scripts', function() {

        // App style
        if ( file_exists( get_template_directory() . '/dist/css/app.min.css' ) ) :
            $csstime = filemtime( get_template_directory() . '/dist/css/app.min.css' );
            wp_enqueue_style( 'app', get_template_directory_uri() . '/dist/css/app.min.css', array(), $csstime );
        endif;

        if(get_post_type() === "product"):
          $handle = "/dist/js/tabcordion.min.js";
          if ( file_exists( get_template_directory() . $handle ) ) :
                $jstime = filemtime( get_template_directory() . $handle );
                wp_enqueue_script( 'app', get_template_directory_uri() . $handle, array(), $jstime, true );
          endif;
        endif;

        // // App script
        // if ( file_exists( get_template_directory() . '/dist/js/app.min.js' ) ) :
        //     $jstime = filemtime( get_template_directory() . '/dist/js/app.min.js' );
        //     wp_enqueue_script( 'app', get_template_directory_uri() . '/dist/js/app.min.js', array(), $jstime, true );
        // endif;

    });


	function get_r_v(){
		return current_user_can("administrator") ? rand() : "2019";
	}
	
	function xml_escape($string) {
	    return str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $string);
	}
	// short price
	function short_price($prices){
		$res = false;
		if(count($prices) === 1):
			$res = "&euro;".$prices[0]["price"]." / ".$prices[0]['quantity'];
		else:

			$rPrices = array_reverse($prices);

			$highestPrice = 0;

			foreach($prices as $pr):
				if(intval($pr["price"]) > intval($highestPrice)):
					$highestPrice = $pr["price"];
				endif;
			endforeach;

			$res = get_ui_text("money_from")." &euro;".number_format(intval($highestPrice)/5, 2)." / 1L";


		endif;

		return $res;
	}

	// cart
	function cart($output = "array"){
		// post_id|quantity|price

		$cart_pre = $_COOKIE['cart'] ?? null;


		if(isset($_COOKIE['cart']) && !is_null($_COOKIE['cart'])):

			
			return process_cart($cart_pre);

		else:
			return false;
		endif;
	}

	function process_cart($cart_pre, $output = "array"){
		$cart_post = array();

		$positions = explode(",", $cart_pre);

		foreach($positions as $pos):
			$cart_items = explode("|", $pos);
            $quantity_in_cart = $cart_items[1];
            $post_id = $cart_items[0];
            $price_repeater_index = $cart_items[2];

			$source = get_product_source($post_id);


			$prices = get_field("prices", $source);
            
			// post_id|quantity|price

			$title = get_the_title($source);
			$price = $prices[ $price_repeater_index - 1 ];

			$pos_ready = array(
				"id" => $post_id,
				"pricebm" => $price_repeater_index,
				"title" => $title,
				"qty" => $quantity_in_cart,
				"price" => $price
				);

			array_push($cart_post, $pos_ready);
		endforeach;

		if($output === "json"):
			echo json_encode($cart_post);
			die();
		elseif($output === "array"):
			return $cart_post;
		endif;
	}

	function get_product_source($source){
		if(get_field("data_source", $source) === false && get_field("get_data_from", $source)):
			$source = get_field("get_data_from", $source);
			$source = $source[0];
		endif;
		return $source;
	}

	// if($_GET['cart'] == "get"){
	// 	cart("json");
	// }

	if(isset($_GET['cart']) && $_GET['cart'] == "process"){
		
		global $wpdb;
		$cart = cart();

		// build message
		$fields = array("delivery_type","address","name","surname","phone","email","promo");
		$pd = array();

		array_push($pd, "\xA \r\nContact info:");
		
		foreach($fields as $field):
			array_push($pd, $field.": ".$_GET[$field]);
		endforeach;

		array_push($pd, "\xA \r\nOrder info:");

		

		$sum = 0;

		foreach($cart as $ci):

			$price = $ci["price"];
			$row_sum = $price['price']*$ci['qty'];
			$sum += $row_sum;

			$row = $ci['title']." ".$price['quantity']." -> €".$price['price']." x ".$ci['qty']." = ".$row_sum;
			array_push($pd, $row);



			
		endforeach;

		array_push($pd, "Sum: " . $sum);



		$m = implode("\xA \r\n",$pd);

		setcookie("cart", "", time()-10, "/");

		wp_mail("info@bardahl.lv", "Bardahl.lv order", $m);


		// mail done, now write to db


			

			$res = $wpdb->query( $wpdb->prepare( 
				"
					INSERT INTO b_orders
					( name, surname, phone, email, address, delivery_type  )
					VALUES ( %s, %s, %s, %s, %s, %s )
				", 
					array(
						$_GET['name'],
						$_GET['surname'],
						$_GET['phone'],
						$_GET['email'],
						$_GET['address'],
						$_GET['delivery_type']
					) 
				) );
			$order_id = $wpdb->insert_id;

			$values = array();

			foreach ( $cart as $ci ) {
					$price = $ci['price'];
			    $values[] = $wpdb->prepare( "(%d,%d,%s,%s,%d,%f)", $order_id, $ci['id'], $ci['title'], $price['quantity'], $ci['qty'], $price['price'] );
			}

			$b_ordermeta_query = "INSERT INTO b_ordermeta (order_id, post_id, title, quantity, units, price) VALUES ";
			$b_ordermeta_query .= implode( ",\n", $values );

			$wpdb->query($b_ordermeta_query);



		
	}

	// cart sum

	function cart_sum(){
		if(isset($_COOKIE['cart_sum']) && !is_null($_COOKIE['cart_sum'])):
			$cs = $_COOKIE['cart_sum'];
		else:
			$cs = "0.00";
		endif;

		return $cs;
	}


	// A must-have
	function failed_login () {
		return 'the login information you have entered is incorrect.';
	}
	add_filter ( 'login_errors', 'failed_login' );
	

	// Everyone uses menus and post-thumbnails
	if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support('menus');
		add_theme_support('post-thumbnails');
	}
	
	// Because [...] is fucking ugly
	function new_excerpt_more($more) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	// handy add image sizes 
	// add_image_size( $name, $width = 0, $height = 0, $crop = false )
	add_image_size("carousel", 1200, 360, true);
	add_image_size("product-square", 390, 390, true);
	add_image_size("logo", 200, 200, false);

    add_image_size("home-intro", 1140, 357, true);
    add_image_size("home-intro-mobile", 600, 200, true);



	function feat_heading($label, $skip_getter = false){
		if($skip_getter):
			$heading = $label;
		else:
			$heading = get_ui_text($label);
		endif;
	?>
	<div class="container">
	  <div id="<?php echo $label; ?>-heading" class="feat-heading">
	    <span class="chevron"></span>
	    <h4><?php echo $heading; ?></h4>
	    <span class="chevron"></span>
	  </div>
	</div>
	<?php
	}















function get_excerpt_by_id($post_id, $excerpt_length = 35){
	$the_post = get_post($post_id); //Gets post ID
	$the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
	
	$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
	$words = explode(' ', $the_excerpt, $excerpt_length + 1);

	if(count($words) > $excerpt_length) :
		array_pop($words);
		array_push($words, '...');
		$the_excerpt = implode(' ', $words);
	endif;

	// $the_excerpt = '<p>' . $the_excerpt . '</p>';

	return $the_excerpt;
}




remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');



function remove_footer_admin(){
	echo '<span id="footer-thankyou">&nbsp;</span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');
