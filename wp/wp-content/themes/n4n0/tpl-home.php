<?php
/* Template name: home */
get_header();
if(have_posts()): while(have_posts()): the_post();

    get_template_part("parts/home", "content");

	wp_reset_postdata(); 

	
endwhile; endif;

get_template_part("parts/products", "list");

get_footer();
?>