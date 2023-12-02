
jQuery(document).ready(function($) {
	$.expr[":"].contains = $.expr.createPseudo(function(arg) {
	    return function( elem ) {
	        return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
	    };
	});


	if( $("body").hasClass("single-product") ){
		$("#lang-switch a").on("click", function(e){
			e.preventDefault();

			var setLang = $(this).attr("id").split("-")[1];
			Cookies.set("lang", setLang, {path: '/'});
			location.reload();
		});
		
	}




	
	$(".product-category-title").on("click", function(e){
		e.preventDefault();

		$(".product-category:visible").slideUp(300);
		$(this).next().slideDown(300, function(){
			var zis = $(this);
			$("html,body").animate({"scrollTop": zis.offset().top - 50}, 500);
		});

		window.location.hash = $(this).attr("href");
	});

	// if(window.location.hash){
	// 	// console.log(window.location.hash);
	// 	setTimeout(function(){
	// 		// $("a[href="+window.location.hash+"]").trigger("click");
	// 	},310);
	// }

	$(".product-category:eq(0)").slideDown(300);

	$(".checkout-delivery-option").on("click", function(e){
		e.preventDefault();

		if(!$(this).hasClass("selected")){
			$(this).parent().children(".selected").removeClass("selected");
			$(this).addClass("selected");

			if($(this).attr("data-do") === "deliver"){
				$("#delivery-deliver").stop().slideDown("fast");
			}else{
				$("#delivery-deliver:visible").stop().slideUp("fast");
			}
		}
	});

	$("#order-button").on("click", function(e){
		e.preventDefault();

		$("#text-how-to-order").slideToggle("fast");
	});

	// store filter for each group
	$('.button-group').each( function( i, buttonGroup ) {
	    var $buttonGroup = $( buttonGroup );
	    $buttonGroup.on( 'click', 'button', function() {
	      $buttonGroup.find('.is-checked').removeClass('is-checked');
	      $( this ).addClass('is-checked');
	    });
	  });

	
	var filters = {};

	var $container = $('#product-loop-wrap').imagesLoaded( function() {
	  $container.isotope({
	    itemSelector: ".product"
	  });
	});

	if(window.location.hash){
		$container.isotope({ filter: window.location.hash.substring(1) });

		var filterCount = window.location.hash.split(".").length-1;

		if(filterCount === 1){
			var filter1 = "."+window.location.hash.split(".")[1];
			$(".button-group button[data-filter='"+filter1+"']").parent().children(".is-checked").removeClass("is-checked");
			$(".button-group button[data-filter='"+filter1+"']").addClass("is-checked");
			
			if(filterCount === 2){
				var filter2 = "."+window.location.hash.split(".")[2];
				$(".button-group button[data-filter='"+filter2+"']").parent().children(".is-checked").removeClass("is-checked");
				$(".button-group button[data-filter='"+filter2+"']").addClass("is-checked");
			}
		}
	}


	$('#products-search-input').on("focus", function(){
		$("#product-loop-wrap,#cat-nav").addClass("searching");

		setTimeout(function(){
			$container.isotope();
		},400);
	});
	// use value of search field to filter
	var $quicksearch = $('#products-search-input').keyup( debounce( function() {
	  qsRegex = new RegExp( $quicksearch.val(), 'gi' );
	  $container.isotope({
	  	filter: function() {
	  	    return qsRegex ? $(this).text().match( qsRegex ) : true;
	  	  }
	  });
	}, 200 ) );

	// debounce so filtering doesn't happen every millisecond
	function debounce( fn, threshold ) {
	  var timeout;
	  return function debounced() {
	    if ( timeout ) {
	      clearTimeout( timeout );
	    }
	    function delayed() {
	      fn();
	      timeout = null;
	    }
	    timeout = setTimeout( delayed, threshold || 100 );
	  }
	}
	

	$("#cat-nav").on( 'click', 'button', function() {
	  var $this = $(this);
	  // get group key
	  var $buttonGroup = $this.parents('.button-group');
	  var filterGroup = $buttonGroup.attr('data-filter-group');
	  // set filter for group
	  filters[ filterGroup ] = $this.attr('data-filter');
	  // combine filters
	  var filterValue = '';
	  for ( var prop in filters ) {
	    filterValue += filters[ prop ];
	  }
	  window.location.hash = filterValue;
	  // set filter for Isotope
	  $container.isotope({ filter: filterValue });
	});

	// if(!is_touch_device()){

		// $(".menu-item-has-children").on("mouseenter", function(){
			
		// 	if($(".sub-menu", this).length){
		// 		$(".sub-menu", this).fadeIn("fast");
		// 	}
		// });

		// $(".sub-menu").on("mouseleave", function(){
		// 	$(this).hide();
		// });
		
	// }

	$("#toggle-menu,.menu-btn").on("click", function(e){
		e.preventDefault();
		$(this).next().slideToggle("fast");
	});
});