<?php
	/* Template name: checkout */
	get_header();
	if(have_posts()): while(have_posts()): the_post();
?>
<div id="checkout" class="container">
	<div class="row" id="checkout-wrap">
		<div class="col-sm-12">
			<div id="checkout-page">

			<?php
			
				$cart = cart();
				if($cart):
					$cart_empty = ' style="display:none;"';
					$checkout_table = '';
				else:
					$cart_empty = '';
					$checkout_table = ' style="display:none;"';
				endif;
			?>
				<div id="cart-empty"<?php echo $cart_empty; ?>>
					<h2><?php echo get_ui_text("cart_empty"); ?></h2>
					<p><a href="<?php echo get_permalink(get_ui_text('product_page')); ?>"><?php echo get_ui_text("products"); ?> &rarr;</a></p>
				</div>

				<div id="checkout-complete">
					<h2><?php echo get_ui_text("order_accepted"); ?></h2>
					<p><?php echo get_ui_text("order_will_respond"); ?></p>
				</div>


				<div id="checkout-table"<?php echo $checkout_table; ?>>
				<form action="" method="get" id="checkout-form">
					<h1 id="checkout-heading"><?php echo get_ui_text("your_cart"); ?></h1>
                    <div class="checkout-rows">
					<?php
						if($cart):
						$sum = 0;
					
						foreach($cart as $ci):
							
							$price = $ci["price"];
							$row_sum = $price['price']*$ci['qty'];
							$sum += $row_sum;
                            
					?>
					<div class="checkout-row" data-id="<?php echo $ci['id']; ?>" data-pbm="<?php echo $ci['pricebm']; ?>">
						<div class="product-name"><a href="<?php echo get_permalink($ci['id']); ?>"><?php echo $ci['title']; ?></a> <?php echo $price['quantity']; ?></div>
						<div class="product-price">
							<div class="product-price-single">&euro;<span><?php echo $price['price']; ?></span></div>
							<span class="times">x</span>
							<div class="product-qty"><input type="text" value="<?php echo $ci['qty']; ?>" data-cache="<?php echo $ci['qty']; ?>"></div>
							<span class="equals">=</span>
							<div class="product-price-total">&euro;<span><?php echo number_format($row_sum, 2, '.', ""); ?></span></div>
							<a href="#" class="cart-remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<?php endforeach; ?>
                    </div>
						
						
					<?php endif;?>


					
					<div id="checkout-total"><?php echo get_ui_text("cart_sum"); ?> &euro;<span><?php echo number_format($sum, 2, '.', ""); ?></span></div>


					<h2 id="checkout-delivery"><?php echo get_ui_text("cart_delivery"); ?></h2>

					<div id="checkout-delivery-options">
						<div id="checkout-delivery-option-collect" class="checkout-delivery-option selected" data-do="collect">
							<div class="dco-text"><div class="dco-show"><i class="fa fa-check-circle"></i><i class="fa fa-circle-o"></i></div> <?php echo get_ui_text("cart_delivery_collect"); ?></div>
						</div>
						<div id="checkout-delivery-option-deliver" class="checkout-delivery-option" data-do="deliver">
							<div class="dco-text"><div class="dco-show"><i class="fa fa-check-circle"></i><i class="fa fa-circle-o"></i></div> <?php echo get_ui_text("cart_delivery_deliver"); ?></div>
						</div>

						<i class="fa fa-truck fa-5x"></i>
					</div>

					<div id="delivery-deliver">
						<div id="delivery-info"><?php echo get_ui_text("cart_delivery_deliver_info"); ?></div>
						<textarea id="delivery-address" placeholder="<?php echo get_ui_text("cart_delivery_deliver_placeholder"); ?>" name="address" class="val"></textarea>
						<div class="error"><?php echo get_ui_text("error_address"); ?></div>
					</div>

					<h2 id="checkout-contact"><?php echo get_ui_text("cart_contact_info"); ?></h2>

					<div id="checkout-contact-wrap">
						<div class="cc-row">
							<label for="name"><?php echo get_ui_text("form_name"); ?></label>
							<input type="text" name="name" id="name" class="val" placeholder="<?php echo get_ui_text("form_name"); ?>">
							<div class="error"><?php echo get_ui_text("error_required"); ?></div>
						</div>

						<div class="cc-row">
							<label for="surname"><?php echo get_ui_text("form_surname"); ?></label>
							<input type="text" name="surname" id="surname" class="val" placeholder="<?php echo get_ui_text("form_surname"); ?>">
							<div class="error"><?php echo get_ui_text("error_required"); ?></div>
						</div>

						<div class="cc-row">
							<label for="phone"><?php echo get_ui_text("form_phone"); ?></label>
							<input type="text" name="phone" id="phone" class="val" placeholder="<?php echo get_ui_text("form_phone"); ?>">
							<div class="error"><?php echo get_ui_text("error_required"); ?></div>
						</div>

						<div class="cc-row">
							<label for="email"><?php echo get_ui_text("form_email"); ?></label>
							<input type="text" name="email" id="email" class="val	val-email" placeholder="<?php echo get_ui_text("form_email"); ?>">
							<div class="error"><?php echo get_ui_text("error_email"); ?></div>
						</div>


                        <div class="cc-row cc-row-promo">
                            <label for="promo"><?php echo get_ui_text("form_promo"); ?></label>
                            <input type="text" name="promo" id="promo" class="" placeholder="<?php echo get_ui_text("form_promo"); ?>">
                            <div class="notice"><?php echo get_ui_text("form_promo_expl"); ?></div>
                        </div>
					</div>
					<input type="hidden" name="cart_val" value="<?=isset($_COOKIE['cart_sum'])??$_COOKIE['cart_sum']; ?>">
					<input type="submit" id="checkout-submit-hidden" value="<?php echo get_ui_text("order"); ?>">
					<a href="#" id="checkout-submit"><i class="fa fa-check"></i> <?php echo get_ui_text("order"); ?></a>

				</form>
				</div>
			</div>
		</div>
	</div>

</div>
</div>

<?php
	endwhile; endif;

	get_footer();
?>