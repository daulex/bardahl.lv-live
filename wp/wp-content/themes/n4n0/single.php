<?php
	get_header();
	if(have_posts()): while(have_posts()): the_post();
?>
<div id="page" class="container">
	<div class="row" id="page-wrap">
		<div class="col-md-8 col-md-offset-2 col-sm-12">
			<div id="page-inner">
				<h1 id="page-heading">
					<?php the_title(); ?>
				</h1>
				<div class="the-content" id="page-content">
					<div class="tc-date"><?php the_time('d.m.Y'); ?></div>
					<?php the_content(); ?>
					<br>
					<div class="fb-like" data-share="true" data-width="450" data-show-faces="true"></div>
				</div>
			</div>
		</div>



	
	</div>

</div>
<?php
	endwhile; endif;

	get_footer();
?>