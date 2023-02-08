jQuery(document).ready(function($) {
	$('input, textarea').placeholder();
	// check if cart cookie exists
		if(typeof Cookies.get('cart_sum') !== "undefined"){
			$(".cart-val").text(Cookies.get('cart_sum'));
		}
    setInterval(function(){
        if(typeof Cookies.get('cart_sum') !== "undefined"){
            if($(".cart-val").text() !== Cookies.get('cart_sum')){
                $(".cart-val").text(Cookies.get('cart_sum'));
                
            }
        }
    }, 3000);
// if on cart page check cart total
	if($("#checkout-total span:visible").length){
		var new_sum = $("#checkout-total span").text();
		$(".cart-val").text(new_sum);
		Cookies.set("cart_sum", new_sum, {path: '/'});
	}

// Cart cookie management
	function add_to_cart(x,sum){

		var xs = x.split("|");
		var xm = [];

		$.each(xs, function(a,b){
			if(isNaN(parseInt(b))){
				var b = 1;
				xs[a] = b;
			}

			xm.push(b);
		});

		var x = xm.join("|");
		var xs = xm;

		if(typeof Cookies.get('cart') === "undefined"){
			Cookies.set('cart', x, {path: '/'});
		}else{
			var cc = Cookies.get('cart').split(",");

			// Check if new product exists
			var found = [];

			$.each(cc, function(a,b){
				var tmp = b.split("|");
				if(xs[0] === tmp[0] && xs[2] === tmp[2]){
					found.push(a);
				}
			});


			if(found.length){
				// if found, add to existing record

				$.each(found, function(a,b){

					var tmp = cc[b].split("|");
					var nv = Number(parseInt(tmp[1]))+Number(parseInt(xs[1]));
					tmp = tmp[0]+"|"+nv+"|"+tmp[2];
					cc[b] = tmp;
				});
			}else{
				// if not found, create record

				cc.push(x);
			}

			var nc = cc.join(",");
			Cookies.set("cart", nc, {path: '/'});
		}

		// calculate value
		var cv = $(".cart-val").text();

		var new_sum = Number(parseFloat(sum).toFixed(2))+Number(parseFloat(cv).toFixed(2));
		var new_sum = new_sum.toFixed(2);
		Cookies.set("cart_sum", new_sum, {path: '/'});
		$(".cart-val").text(new_sum);



		// facebook add to cart reg
		if($("#product-heading .name").length){
			var tmp = x.split("|");

			// fbq('track', 'AddToCart', {
			//       content_name: $("#product-heading .name").text(), 
			//       content_ids: [tmp[0]],
			//       content_type: 'product',
			//       value: sum,
			//       currency: 'EUR' 
			//     }); 
		}

	}

// rebuild cookie after checkout update
function rebuild_cart_cookie(){
	var items = [];
	$(".checkout-row").each(function(){
		var id = $(this).attr("data-id");
		var pbm = $(this).attr("data-pbm");
		var qty = $(".product-qty input", this).val();
		
		var row = id+"|"+qty+"|"+pbm;
		items.push(row);
	});

	if(!items.length){
		Cookies.remove("cart", {path: '/'});
	}else{
		var ready = items.join(",");
		Cookies.set("cart", ready, {path: '/'});
	}

	
}





// Product page

	$(".to-cart").on("click", function(e){
		e.preventDefault();
		var id = $(this).attr("data-pid");
		var pn = $(this).attr("data-pn");
		var qty = isNaN(parseInt($(this).prev().val())) ? "1" : $(this).prev().val();

		var price = $(this).parent().children(".price").text().substring(1);
		var sum = Number(parseFloat(price).toFixed(2))*Number(parseInt(qty));
		var sum = sum.toFixed(2);
		
		// var value = qty

		if(qty.length >= 1){
			var to_add = id+"|"+qty+"|"+pn;

			add_to_cart(to_add, sum);
		}

		$(this).prev().val("1");
	});





// Checkout page

	// process checkout
	$("#checkout-submit").on("click", function(e){
		e.preventDefault();
		$("#checkout-form").submit();
	});

	$("#checkout-form").on("submit", function(e){
		e.preventDefault();

		var errors = [];
		$(".error:visible").hide();

		var delivery_type = $("#checkout-delivery-option-collect").hasClass("selected") ? "collect" : "deliver";
		
		$(".val:visible", this).each(function(){
			if($(this).val() === $(this).attr("placeholder") || $(this).val().length === 1 || $(this).val().length === 0 || $(this).hasClass("val-email") && !validateEmail($(this).val())){
				errors.push($(this));
			}
		});
		if(errors.length){
			$.each(errors, function(i, v){
				$(v).next().slideDown("fast");
			});
		}else{
			
			var delivery_type = $(".checkout-delivery-option.selected").attr("data-do");
			var cart_val = $(".cart-val").text();
			var cc = Cookies.get('cart').split(",");

			// Check if new product exists
			// var fbContentIds = [];

			// $.each(cc, function(a,b){
			// 	var row = b.split("|");
			// 	fbContentIds.push(row[0]);
			// });


			// fbq('track', 'AddToCart', {
		 //      content_name: "Cart value", 
		 //      content_ids: fbContentIds,
		 //      content_type: 'product',
		 //      value: cart_val,
		 //      currency: 'EUR' 
		 //    }); 
		  
		  if(typeof gtag === typeof undefined){}else{
            gtag('event', 'conversion', {
                'send_to': 'AW-1046291819/UZqaCKDu63sQ68r08gM',
                'value': cart_val,
                'currency': 'EUR',
                'transaction_id': ''
            });
		  }
		  
		  
			var pd = $("#checkout-form").serialize();
			pd = pd+"&delivery_type="+delivery_type;
			$.get("/?cart=process", pd, function(){});

			// Cookies.remove("cart", {path: '/'});
			Cookies.remove("cart_sum", {path: '/'});

			$("#checkout-table").slideUp("fast");
			$("#checkout-complete").slideDown("fast");
			$(".cart-val").text("0.00");
		}

	});

	// empty cart: reset cookie, hide cart UI, show empty cart UI
	function emptyCart(){
		$("#checkout-table").slideUp("fast");
		$("#cart-empty").slideDown("fast");

		Cookies.remove("cart_sum", {path: '/'});
		$(".cart-val").text("0.00");
	}

	// update checkout sum
	function updateCheckoutSum(){
		window.total = false;

		$(".product-qty input").each(function(){
			
			var add = $(this).parent().next().next().children("span").html();
			if(window.total){
				window.total = Number(parseFloat(window.total).toFixed(2))+Number(parseFloat(add).toFixed(2));
			}else{
				window.total = parseFloat(add).toFixed(2);
			}

		});

		window.total = parseFloat(window.total).toFixed(2);
		if(!$.isNumeric(window.total)){
			$("#checkout-total span").html("0.00");
			emptyCart();
		}else{
			$("#checkout-total span").html(window.total);

			Cookies.set("cart_sum", window.total, {path: '/'});
			$(".cart-val").text(window.total);
		}



		rebuild_cart_cookie();
	}

	// checkout remove item
	$(".cart-remove").on("click", function(e){
		e.preventDefault();

		$(this).parent().parent().slideUp("fast", function(){
			$(this).remove();
			updateCheckoutSum();
		});
	});
	// checkout value change event
	$(".product-qty input").on("keyup", function(e){
		if($(this).val().length && $(this).val() !== $(this).attr("data-cache")){
			var per_unit = $(this).parent().prev().prev().children("span").text();
			var times = $(this).val();

			var per_unit = parseFloat(per_unit).toFixed(2);
			var times = parseInt(times);

			var sum = per_unit*times;
			var sum = sum.toFixed(2);
			
			$(this).attr("data-cache", times);
			$(this).parent().next().next().children("span").html(sum);

			updateCheckoutSum();
		}
	});

	$(".product-qty input").on("blur", function(e){
		if(!$(this).val().length){
			$(this).val($(this).attr("data-cache"));
		}
	});

	$(".product-qty input,.cqty").keydown(function (e) {
			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
					 // Allow: Ctrl+A
					(e.keyCode == 65 && e.ctrlKey === true) ||
					 // Allow: Ctrl+C
					(e.keyCode == 67 && e.ctrlKey === true) ||
					 // Allow: Ctrl+X
					(e.keyCode == 88 && e.ctrlKey === true) ||
					 // Allow: home, end, left, right
					(e.keyCode >= 35 && e.keyCode <= 39)) {
							 // let it happen, don't do anything
							 return;
			}
			// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
					e.preventDefault();
			}
	});

	// checkout delivery switch
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

	
});