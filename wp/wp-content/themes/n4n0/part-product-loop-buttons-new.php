<div class="button-group" data-filter-group="vehicle-type">
	<button data-filter=".car"><i class="fa fa-car pull-right"></i><?php echo get_ui_text('car'); ?></button>
	<button data-filter=".motorcycle"><i class="fa fa-motorcycle pull-right"></i><?php echo get_ui_text('motorcycle'); ?></button>
	<button data-filter=".mechanics"><i class="fa fa-wrench pull-right"></i><?php echo get_ui_text('workshops'); ?></button>
	<button data-filter=".stop-leak"><i class="fa fa-hand-paper-o pull-right"></i>Stop-leak</button>
	<button data-filter="" class="is-checked"><i class="fa fa-bars pull-right"></i><?php echo get_ui_text("all"); ?></button>
</div>

<div class="button-group" data-filter-group="product-type">
	
<?php 
	$types = array(
		"oil:oils:tint",
		"oil-additive:oil-additives:plus",
		"fuel-additive:fuel-additives:fire",
		"tech-liquid:tech-liquids:cogs",
		"car-care:car-care:check"
	);

	foreach($types as $t):
		$x = explode(":", $t);
?>
	<button data-filter=".<?php echo $x[0]; ?>"><i class="fa fa-<?php echo $x[2]; ?> pull-right" ?></i><?php echo get_ui_text($x[1]); ?></button>
<?php endforeach; ?>

	<button data-filter=".spray"><i class="fa fa-wifi fa-rotate-90 pull-right" ?></i><?php echo get_ui_text("sprays"); ?></button>
	<button data-filter="" class="is-checked"><i class="fa fa-bars pull-right"></i><?php echo get_ui_text("all"); ?></button>

</div>

