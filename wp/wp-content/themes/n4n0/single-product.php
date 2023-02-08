<?php
	/* Template name: product */
  if(!current_user_can("administrator"))
    header("Location: https://bardahl.lv");
	get_header();
	if(have_posts()): while(have_posts()): the_post();
?>
<div id="product" class="container">
	<div class="row" id="product-wrap">
		
		<div class="col-sm-3" id="product-pic">
			<img src="<?php echo get_the_post_thumbnail_url($post->ID, "large"); ?>" alt="<?php echo $post->post_title; ?>">
		</div>

		<div class="col-sm-9">
			<div id="product-inner">
				
				<h1 id="product-heading">
					<span class="type"><?php echo kg_get_tax($post->ID, "product-type")." ".kg_get_tax($post->ID, "product-application"); ?></span>
					<span class="name"><?php the_title(); ?></span>
				</h1>


				<div id="price-table">
					<div class="heading-row">
						<div class="product-availability">
							<?php echo get_ui_text('product_available'); ?>?
						</div>
						<div class="product-price">
							<?php echo get_ui_text('product_price'); ?>
						</div>
						<div class="product-quantity">
							<?php echo get_ui_text('product_quantity'); ?>
						</div>
						<div class="product-to-cart">
							<?php echo get_ui_text("to_cart"); ?>
						</div>
						<div class="product-sku">SKU</div>
					</div>
					<?php
						$prices = get_field("prices");
						$i = 1;
						$id = $post->ID;
						foreach($prices as $price):
							$fpr = $price['price'];
					?>
					<div class="product-row">
						<div class="product-availability">
							<?php if($price['in_stock']): ?>
								<i title="<?php echo get_ui_text('product_available'); ?>" class="fa fa-check available"></i>
							<?php else: ?>
								<i title="<?php echo get_ui_text('product_not_available'); ?>" class="fa fa-times not-available"></i>
							<?php endif; ?>
						</div>
						<div class="product-price">
							<span class="price">&euro;<?php echo $price['price']; ?></span>	
						</div>
						<div class="product-quantity">
							<span class="qty"><?php echo $price['quantity']; ?></span>
						</div>
						<div class="product-to-cart">
							<input type="text" name="qty" value="1" class="cqty">
							<a title="<?php echo get_ui_text("to_cart"); ?>" href="#" class="to-cart" data-pn="<?php echo $i; ?>" data-pid="<?php echo $id; ?>"><i class="fa fa-cart-plus"></i></a>
						</div>
						<div class="product-sku"><?php echo $price['sku']; ?></div>
					</div>
					<?php $i++; endforeach; ?>
<?php /*
					<div id="availability">
					<?php
						$not_available = get_field("not_available");
						if(!$not_available):
					?>
						<div id="availability-available"><i class="fa fa-check"></i> <?php echo get_ui_text('product_available'); ?></div>
					<?php else: ?>
						<div id="availability-not-available"><i class="fa fa-times"></i> <?php echo get_ui_text('product_not_available'); ?></div>
					<?php endif; ?>
					</div>
*/ ?>
					
				</div>



				<div class="the-content" id="product-content">
					<?php the_field("main_content") ?>
				</div>

			</div>
		</div>


		



	</div>
</div>

<?php
	get_template_part("parts/popular");
	get_template_part("parts/brands");

?>

<script>
	// fbq('init', '595424047276107');
	// fbq('track', 'ViewContent', { 
	//     content_type: 'product',
	//     content_ids: ['<?php echo $post->ID; ?>'],
	//     content_name: '<?php echo $post->post_title; ?>',
	//     value: <?php echo $fpr; ?>,
	//     currency: 'EUR'
	// });
</script>
<?php
	endwhile; endif;

	get_footer();
?>