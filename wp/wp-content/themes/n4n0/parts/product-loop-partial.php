<?php
    $source = get_product_source($pid);

    $img = get_field("image", $source);
    if(!$img){
        $src = wp_get_attachment_image_src(get_post_thumbnail_id($source), 'medium', false, '');
        $img_url = $src[0];
    }else{
        $imgSizes = $img['sizes'];
        $img_url = $imgSizes['medium'];
    }
    
    // $product_type = 
    // $vehicle_type = 

    $is_popular = get_field("popular", $source);

    $product_type = get_field("product_type", $source);
    if(!$product_type) $product_type = kg_get_tax($source, "product-type", "slug");
    $vehicle_type = get_field("vehicle_type", $source);
    if(!$vehicle_type) $vehicle_type = kg_get_tax($source, "product-application", "slug");

    $prices = get_field("prices", $source);
    $i = 1;
    $id = $source;
    $title = get_the_title($source);
?>
<div class="<?php echo $loop_class; ?> <?php echo $product_type." ".$vehicle_type; ?>" data-filter="type-<?php echo $product_type; ?>">
  <a href="<?php echo get_permalink($pid); ?>">
    
    <?php 
      if($is_popular):
        get_template_part("parts/product/popular");
      endif; 
    ?>
    <div class="img-container">
        <img src="<?php echo $img_url; ?>" alt="<?php echo $pt; ?>">
    </div>


    <div class="details">
        <div class="details__description">
            <span class="type">
                <?php echo get_ui_text($product_type)." ".get_ui_text($vehicle_type); ?>
            </span>
            <span class="name"><?php echo $title; ?></span>
        </div>
        <div class="prices">
        <?php foreach($prices as $price): ?>
            <div class="price-row">
            <span class="price">&euro;<?php echo $price['price']; ?></span>
            <span class="qty">(<?php echo $price['quantity']; ?>)</span>
            </div>
        <?php endforeach; ?>
        </div>

        <div class="buy"><?php echo get_ui_text("buy"); ?> <i class="fa fa-chevron-right"></i></div>
    </div>
  </a>
</div>