
<article class="ootb-tabcordion">
	<div class="ootb-tabcordion--tabs" role="tablist" aria-label="TabCordion">
    <button class="tab is-active" role="tab" aria-selected="true" aria-controls="tab1-tab" id="tab1"><?=get_ui_text("description");?></button>
    <?php kg_render_tabs($args['fields']); ?>
	</div>
	<section id="tab1-tab" class="ootb-tabcordion--entry is-active" data-title="Tab 1 with big text" tabindex="0" role="tabpanel" aria-labelledby="tab1">
		<div class="ootb-tabcordion--entry-container">
			<div class="ootb-tabcordion--entry-content">
          <?php the_field("main_content"); ?>
			</div>
		</div>
	</section>
	
  <?php kg_render_tabs($args['fields'], "sections"); ?>
	
</article>