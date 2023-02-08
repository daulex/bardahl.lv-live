<?php
	/* Template name: Distributors */
	
	get_header();
	if(have_posts()): while(have_posts()): the_post();
?>

<div id="page" class="container">
	<div class="row" id="page-wrap">
		<div id="page-inner">
		<div class="col-sm-12 col-md-6">
			
				
				<div id="dc-wrap">
					<h1 id="page-heading">
						<?php the_title(); ?>
					</h1>

					<?php
						$cities = get_field("distributors", 441);

						foreach($cities as $city):
					?>
					<div class="city" data-city="<?php echo $city['city']; ?>">
						<h2 class="city-name"><?php echo get_ui_text($city['city']); ?></h2>
						<div class="distributors">
							<?php foreach($city['distributor'] as $distributor): ?>
							<div class="distributor">
								<?php if($distributor['logo']): $img = $distributor['logo']; $imgSizes = $img['sizes']; ?>
									<img src="<?php echo $imgSizes['logo']; ?>" alt="<?php echo $distributor['name']; ?>" class="distributor-logo">
								<?php endif; ?>
								<h3 class="name"><?php echo $distributor['name']; ?></h3>
								<ul class="details">
									<?php if($distributor['phone_number']): ?>
										<li><i class="fa fa-phone"></i> <strong><?php echo $distributor['phone_number']; ?></strong></li>
									<?php endif; ?>
									<?php if($distributor['website_link']): ?>
										<li><a href="<?php echo $distributor['website_link']; ?>" class="website_link" rel="nofollow"><i class="fa fa-link"></i> <span><?php echo get_ui_text('website_link'); ?></span></a></li>
									<?php endif; ?>
									<?php if($distributor['google_maps_link']): ?>
										<li><a href="<?php echo $distributor['google_maps_link']; ?>" class="google_maps_link" rel="nofollow"><i class="fa fa-globe"></i> <span><?php echo get_ui_text('google_maps_link'); ?></span></a></li>
									<?php endif; ?>
									<li><?php echo $distributor['address']; ?></li>
								</ul>
								
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endforeach; ?>
					
				</div>


				
				
			
		</div>

		<div class="col-sm-12 col-md-6" id="become-partner-wrap">
			<div id="become-partner-inner">
				<div class="the-content" id="page-content">
					<?php the_content(); ?>
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