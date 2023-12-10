<?php
$products = get_field("products_to_show");

if($products):
  feat_heading(get_field("popular_heading"), true);

?>
<div id="popular_products" class="container">
<div class="row">
<?php
  foreach($products as $product):
    $pid = $product->ID;
    $pt = $product->post_title;
    $loop_class = "product-row-3 product";
    include 'product-loop-partial.php';
  endforeach;
?>
</div>
</div>
<?php endif; ?>