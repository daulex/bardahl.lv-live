<?php
	get_header();

  $v = get_r_v();
  wp_enqueue_script( "register", get_template_directory_uri()."/a/js/register.js", array("site"), $v, true );

	if(have_posts()): while(have_posts()): the_post();

		$title = $post->post_title;
		$content = apply_filters("the_content", $post->post_content);

		if(current_user_can("administrator")):
			$title = get_lang() === "ru" ? get_field("title_ru", $post->ID) : $title; 
			$content = get_lang() === "ru" ? get_field("main_content_ru", $post->ID) : $content;
		endif;





		function kg_field_gen($fields,$fsn = "up"){

				foreach($fields as $field):
					if($field['type'] === "password"):
			?>
			<div class="field field-up field-password <?php echo $field['class']; ?>">
				
        <label for="<?php echo $fsn; ?>_<?php echo $field['name']; ?>">
          <?php echo $field['label']; ?>
          <span class="err"><?php echo $field['error'] ? $field['error'] : "Šis lauks ir obligāts!"; ?></span>  
        </label>
				<input type="<?php echo $field['type']; ?>" id="<?php echo $fsn; ?>_<?php echo $field['name']; ?>" name="<?php echo $fsn; ?>_<?php echo $field['name']; ?>" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">
				<input type="<?php echo $field['type']; ?>" id="<?php echo $fsn; ?>_<?php echo $field['name']; ?>2" name="<?php echo $fsn; ?>_<?php echo $field['name']; ?>2" placeholder="(Parole atkartoti)">
			</div>
			<?php elseif($field['type'] === "spacer"): ?>
				<div class="field-spacer"><?php echo $field['label']; ?></div>
			<?php else: ?>

			<div class="field field-up <?php echo $field['class']; ?>">
				<label for="<?php echo $fsn; ?>_<?php echo $field['name']; ?>">
          <?php echo $field['label']; ?>
          <span class="err"><?php echo $field['error'] ? $field['error'] : "Šis lauks ir obligāts!"; ?></span>  
        </label>
				<input type="<?php echo $field['type']; ?>" id="<?php echo $fsn; ?>_<?php echo $field['name']; ?>" name="<?php echo $fsn; ?>_<?php echo $field['name']; ?>" placeholder="<?php echo $field['placeholder']; ?>">
			</div>
		<?php endif; ?>
			<?php endforeach;
		} // kg_field_gen
?>
<div id="page-register" class="container">
	<div class="row" id="page-wrap">
		<div class="col-sm-12">
			<div id="page-inner">
				<h1><?php the_title(); ?></h1>

        

				
				<form action="<?php echo get_permalink($post->ID); ?>" id="register" method="get">

          <div class="switch-field">
            <input type="radio" id="checkbox_user_type_person" name="user_type" value="checkbox_user_type_person" checked ="checked">
            <label for="checkbox_user_type_person">Fiziska persona</label>
            <input type="radio" id="checkbox_user_type_company" name="user_type" value="checkbox_user_type_company">
            <label for="checkbox_user_type_company">Juridiska / Pašnodarbināta persona</label>
          </div>

          <div class="fieldset-wrap">
            
            <fieldset id="user-profile">
              <?php kg_field_gen(kg_user_fields_list("profile")); ?>
            </fieldset>

            <fieldset id="user-company" class="off">
              <?php kg_field_gen(kg_user_fields_list("company"), "uc"); ?>
            </fieldset>

          </div>

					


          <div id="terms-and-conditions">
            <input name="tnc" id="tnc" type="checkbox" value="confirmed">
            <label for="tnc">Esmu iepazinies/-usies un piekrītu <a href="#">Pakalpojumu sniegšanas</a> noteikumiem un <a href="#">Konfidencialitātes politikai</a>.</label>
          </div>

          <div id="user-form-submit"><input type="submit" value="Reģistrēties"></div>



				</form>
			</div>
		</div>

	</div>

</div>
<?php
	endwhile; endif;

	get_footer();
?>