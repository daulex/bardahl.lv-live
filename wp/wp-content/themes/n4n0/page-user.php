<?php
	get_header();
	if(have_posts()): while(have_posts()): the_post();

		$title = $post->post_title;
		$content = apply_filters("the_content", $post->post_content);

		if(current_user_can("administrator")):
			$title = get_lang() === "ru" ? get_field("title_ru", $post->ID) : $title; 
			$content = get_lang() === "ru" ? get_field("main_content_ru", $post->ID) : $content;
		endif;
?>
<div id="page-user" class="container">
	<div class="row" id="page-wrap">
		<div class="col-sm-12">
			<div id="page-inner">
				test
			</div>
		</div>

	</div>

</div>
<?php
	endwhile; endif;

	get_footer();
?>