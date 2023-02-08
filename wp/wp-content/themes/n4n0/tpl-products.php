<?php
	/* Template name: products page */
	get_header();
	if(have_posts()): while(have_posts()): the_post();
?>
<div id="products-page" class="container">

	<div class="row">
		<div class="col-sm-12" id="products-page-heading">
			<div id="home-products-inner">
				<h2><?php echo get_ui_text("products"); ?></h2>
			</div>
			<div id="products-search">
				<input type="text" id="products-search-input" placeholder="<?php echo get_ui_text('search_placeholder'); ?>">
			</div>
		</div>
		
		
	</div>
	<div class="row">
		<div id="cat-nav" class="col-sm-3">
			<?php get_template_part("part-product-loop-buttons"); ?>
		</div>
		<div id="product-loop-wrap" class="col-sm-9">
		<?php get_template_part("product-loop"); ?>
		</div>
	</div>
</div>
<?php
	endwhile; endif;

	get_template_part("parts/brands");
	
	get_footer();
?>