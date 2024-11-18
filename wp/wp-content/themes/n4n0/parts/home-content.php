<div id="home" class="container">
	<div class="row">
        <div class="col-xs-12">
            <?php get_template_part("parts/home", "intro"); ?>
        </div>
    </div>

    <div class="row">
		<div class="col-md-8">
			<h1 id="home-description-heading"><?php echo $post->post_title; ?></h1>
			<div class="the-content">
				<?php the_content(); ?>
			</div>
		</div>
		<?php if(has_post_thumbnail()): ?>
		<div class="col-md-4 hide-for-mobile" id="home-feat-pic"><img src="<?php echo the_post_thumbnail_url('large'); ?>" alt=""></div>
		<?php endif; ?>
	</div>
</div>