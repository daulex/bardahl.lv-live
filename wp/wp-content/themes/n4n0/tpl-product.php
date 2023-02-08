<?php
	/* Template name: product */

  
	get_header();

	if(have_posts()): while(have_posts()): the_post();

		$source = get_product_source($post->ID);

		
	
?>
<div id="product" class="container">
	<div class="row" id="product-wrap">
		
		<div class="col-sm-3">
			<?php
				$img = get_field("image", $source);
				$imgSizes = $img['sizes'];

			if(get_field('dont_resize', $source) === true):
				$size = 'large';
			else:
				$size = 'product-square';
			endif;
			?>
			<div id="product-pic">
				<img src="<?php echo $imgSizes[$size]; ?>" alt="<?php echo $img['alt']; ?>">
			</div>
			
			<?php if(get_field("product_type", $source) === "oil"): ?>
			<a id="filter-advice" href="<?php echo get_permalink(get_ui_text("advise_oil_page")); ?>">
				<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2019/03/KnechtProds.jpg" alt="">
				<span><?php echo get_ui_text("filter_advice"); ?></span>
			</a>
			<?php endif; ?>

		</div>

		<div class="col-sm-9">
			<div id="product-inner">
				

				
				<h1 id="product-heading">
					<span class="type"><?php echo get_ui_text(get_field("product_type", $source))." ".get_ui_text(get_field("vehicle_type", $source)); ?></span>
					<span class="name"><?php the_title(); ?></span>
				</h1>
				<p class="product-meta">
					SKU: <?php echo get_field("sku", $source); ?>
				</p>


				<div id="prices">
					<div id="prices-heading"><?php echo get_ui_text('price'); ?></div>
					<?php
						$prices = get_field("prices", $source);
						$i = 1;
						$id = $post->ID;
						foreach($prices as $price):
							$fpr = $price['price'];
					?>
					<div class="price-row">
						<span class="qty"><?php echo $price['quantity']; ?></span> &nbsp; <span class="price">&euro;<?php echo $price['price']; ?></span> &nbsp; <input type="text" name="qty" value="1" class="cqty"><a href="#" class="to-cart" data-pn="<?php echo $i; ?>" data-pid="<?php echo $id; ?>"><i class="fa fa-cart-plus"></i> <?php echo get_ui_text("to_cart"); ?></a>
					</div>
					<?php $i++; endforeach; ?>

					<div id="availability">
					<?php
						$not_available = get_field("not_available", $source);
						if(!$not_available):
					?>
						<div id="availability-available"><i class="fa fa-check"></i> <?php echo get_ui_text('product_available'); ?></div>
					<?php else: ?>
						<div id="availability-not-available"><i class="fa fa-times"></i> <?php echo get_ui_text('product_not_available'); ?></div>
					<?php endif; ?>
					</div>
					
				</div>



				<div class="the-content" id="product-content">
					
					<?php the_content(); ?>

				</div>
			</div>
		</div>


		



	</div>
</div>

<?php
	get_template_part("parts/popular");
	get_template_part("parts/brands");

?>


<?php
	endwhile; endif;

	get_footer();
?>