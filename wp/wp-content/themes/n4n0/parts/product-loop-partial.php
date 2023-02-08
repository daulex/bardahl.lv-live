<?php
    $source = get_product_source($pid);

    $img = get_field("image", $source);
    $imgSizes = $img['sizes'];
    // $product_type = kg_get_tax($source, "product-type", "slug");
    // $vehicle_type = kg_get_tax($source, "product-application", "slug");

    $product_type = get_field("product_type", $source);
    $vehicle_type = get_field("vehicle_type", $source);

    $prices = get_field("prices", $source);
    $i = 1;
    $id = $source;
?>
<div class="<?php echo $loop_class; ?> <?php echo $product_type." ".$vehicle_type; ?>" data-filter="type-<?php echo $product_type; ?>">
  <a href="<?php echo get_permalink($pid); ?>">
    
    
    <img src="<?php echo $imgSizes['large']; ?>" alt="<?php echo $pt; ?>">
    <span class="type"><?php echo get_ui_text($product_type)." ".get_ui_text($vehicle_type); ?></span>
    <span class="name"><?php echo $pt; ?></span>

    <div class="prices">
      <?php foreach($prices as $price): ?>
        <div class="price-row">
          <span class="price">&euro;<?php echo $price['price']; ?></span>
          <span class="qty">(<?php echo $price['quantity']; ?>)</span>
        </div>
      <?php endforeach; ?>
    </div>

    <span class="buy"><?php echo get_ui_text("buy"); ?> <i class="fa fa-angle-right"></i></span>
  </a>
</div>