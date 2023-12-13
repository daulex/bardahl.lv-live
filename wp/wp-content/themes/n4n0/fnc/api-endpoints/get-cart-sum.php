<?php
function api_cart_get_sum( $data ) {
    $result = array();
    $result['sum'] = "100.99";
    if(isset($_COOKIE['cart']))
    {
        $positions = explode(",", $_COOKIE['cart']);
        $sum = 0;
		foreach($positions as $pos):
			$cart_items = explode("|", $pos);
            
            $quantity_in_cart = intval($cart_items[1]);
            $price_repeater_index = intval($cart_items[2]);

            $post_id = $cart_items[0];
            

			$source = get_product_source($post_id);
			$prices = get_field("prices", $source);
            $price = $prices[ $price_repeater_index - 1 ][ 'price'];
            $sum += $price * $quantity_in_cart;    
        endforeach;
        
        $result['sum'] = number_format($sum, 2, '.', "");

    }
    return json_encode($result);
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'bardahl/v1', '/cart/get-sum', array(
        'methods' => 'GET',
        'callback' => 'api_cart_get_sum',
        'permission_callback' => '__return_true'
    ) );
} );