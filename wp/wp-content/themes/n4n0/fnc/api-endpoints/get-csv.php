<?php
function api_csv() {
    // Set the charset to UTF-8
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="products.csv"');

    // Open output stream
    $output = fopen('php://output', 'w');

    // get products from 'product' post type and return them as csv
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1
    );
    $products = get_posts($args);

    // Write CSV header
    fputcsv($output, array('ean', 'brand', 'name', 'price', 'currency', 'bulk price', 'specification', 'grouping', 'stock', 'photo', 'short desc', 'long desc'));

    foreach($products as $product):
        $id = $product->ID;
        $name = $product->post_title;
        $prices = get_field("prices", $id);

        $img = get_field("image", $id);
        if(!$img){
            $src = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'large', false, '');
            $img_url = $src[0];
        }else{
            $imgSizes = $img['sizes'];
            $img_url = $imgSizes['large'];
        }

        $main_content = get_field("main_content", $id);
        $excerpt = truncate_field($main_content, 100);
        $main_content = htmlspecialchars($main_content);
        $specifications = get_field("specifications", $id);
        $spec = array();
        if($specifications):
            foreach($specifications as $row):
                $spec[] = $row['specification'];
            endforeach;
            $spec = implode(", ", $spec);
        else:
            $spec = "";
        endif;
        $vehicle_type = kg_get_tax($id, "product-application", "slug");
        $product_type = kg_get_tax($id, "product-type", "slug");
        $grouping = $vehicle_type . " " . $product_type;
        
        foreach($prices as $row):
            $in_stock = $row["in_stock"];
            $price = $row["price"];
            $bulk_price = $row["bulk_price"];
            $ean = $row["ean"];
            $quantity = $row["quantity"];
            
            // Write CSV row
            fputcsv($output, array($ean, 'Bardahl', "Bardahl $name - $quantity", $price, 'eur', $bulk_price, $spec, $grouping, $in_stock, $img_url, $excerpt, $main_content));
        endforeach;
    endforeach;

    // Close output stream
    fclose($output);
    exit;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'bardahl/v1', '/csv', array(
        'methods' => 'GET',
        'callback' => 'api_csv',
        'permission_callback' => '__return_true'
    ) );
} );
?>
