<?php

get_header();
if(have_posts()): while(have_posts()): the_post();

$source = apply_filters('wpml_object_id', get_the_ID(), get_post_type(), true, 'lv');

$fields = get_fields($source);

$fields['data_sheets'] = true;
$fields['reviews'] = false;
$is_popular = $fields['popular'] ?? false;

$language = defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : 'lv';

$content_container = $language === "lv" ? "main_content" : "main_content_ru";
$fields['content'] = get_field($content_container, $source);


?>
<div id="product" class="container">
	<div class="row" id="product-wrap">
		
		<div class="col-sm-3" id="product-pic">
			<img src="<?php echo get_the_post_thumbnail_url($source, "large"); ?>" alt="<?php echo $post->post_title; ?>">
		</div>

		<div class="col-sm-9">
			<div id="product-inner">
				
				<h1 id="product-heading">
					<span class="type"><?php echo kg_get_tax($source, "product-type")." ".kg_get_tax($source, "product-application"); ?></span>
					<span class="name"><?php the_title(); ?></span>

          <?php 
            if($is_popular):
              get_template_part("parts/product/popular");
            endif; 
          ?>
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

                        $prices = get_field('prices', $source);
                        
						$i = 1;
						$id = $source;
						if($prices): foreach($prices as $price):
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
						<div class="product-price price-data">
							<span class="price">&euro;<?php echo $price['price']; ?></span>	
						</div>
						<div class="product-quantity">
							<span class="qty"><?php echo $price['quantity']; ?></span>
						</div>
						<div class="product-to-cart">
							<input type="text" name="qty" value="1" class="cqty">
							
                            <button 
                                class="to-cart" 
                                data-ean="<?php echo $price['ean']; ?>" 
                                data-pn="<?php echo $i; ?>" 
                                data-pid="<?php echo $id; ?>"
                                data-price="<?php echo $price['price']; ?>"
                                >
                                <i class="fa fa-shopping-cart"></i> <?php echo get_ui_text("to_cart"); ?>
                            </button>
						</div>
						<div class="product-sku"><?php echo $price['sku']; ?></div>
					</div>
					<?php $i++; endforeach; endif; ?>
				</div>

        <?php 
        
        get_template_part(
            "parts/product/tabcordion", "", 
            array('fields' => $fields)); 
            
        get_template_part(
            "parts/product/frequently-bought-with", null, 
            array('fields' => $fields)); 

        ?>

                

			</div>
		</div>


		



	</div>
</div>

<?php
	endwhile; endif;

	get_footer();
?>