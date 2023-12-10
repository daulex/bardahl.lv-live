<?php

$products = $args['fields']['frequently_purchased_with'] ?? false;

if($products):

?>
<div id="frequently-purchased-with">
<h3><?php echo get_ui_text("frequently_purchased_with"); ?></h3>
<div class="products">
<?php
  foreach($products as $product):
    $pid = $product->ID;
    $pt = $product->post_title;
    $loop_class = "product";
    $upsale_to_cart = true;
    include get_template_directory() . '/parts/product-loop-partial.php';
  endforeach;
?>
</div>
</div>
<?php endif; ?>