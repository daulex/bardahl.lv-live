<?php
	/* Template name: products page */
	get_header();
	if(have_posts()): while(have_posts()): the_post();

    get_template_part("parts/products", "list");

	endwhile; endif;

	get_template_part("parts/brands");
	
	get_footer();
?>