<div id="footer-container">
	<div class="container">
		<div id="fc-1" class="col-sm-4 footer-col">
			<?php get_template_part("parts/x-contact"); ?>
		</div>
		<div id="fc-2" class="col-sm-8 footer-col footer-col-large">
			<?php
				$menu = get_lang() == "ru" ? "bot-ru" : "bot";
				wp_nav_menu("&menu=".$menu."&container=");
			?>

			
		</div>
	</div>
</div>
<div id="copyright-container">
	<div class="container">
		<div class="col-md-8">&copy; Bardahl Latvia (SIA GL Oils) <?php echo date("Y"); ?>. <i><?php echo get_ui_text("bardahl_riga"); ?></i></div>
	</div>
</div>

</div><?php /* ended pushy container */ ?>

<?php /* if(!current_user_can('administrator')): ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/561d0ce4537920ae5207ff31/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php 

endif; */

    $v = filemtime( get_template_directory()."/a/js/site.js" );
    wp_enqueue_script( "jquery", false, 0, $v, true );
    wp_enqueue_script( "plugins", get_template_directory_uri()."/a/js/plugins.js", 0, $v, true );
    wp_enqueue_script( "pushy", get_template_directory_uri()."/a/plugins/pushy/js/pushy.min.js", 0, $v, true );
    wp_enqueue_script( "site", get_template_directory_uri()."/a/js/site.js", array("plugins"), $v, true );
    wp_enqueue_script( "shop", get_template_directory_uri()."/a/js/shop.js", array("site","plugins"), $v, true );

wp_footer(); ?>
</body>
</html>