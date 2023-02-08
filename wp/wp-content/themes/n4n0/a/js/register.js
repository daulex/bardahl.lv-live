jQuery(document).ready(function($) {
	// selected_value = $("input[name='my_options']:checked").val();
  
  $(".switch-field input").on("change", function(e){
    // selected_value = $("input[name='my_options']:checked").val();
    if($(this).val() == "checkbox_user_type_company"){
      $("#user-company").removeClass("off");
      $("#register").addClass("company");
    }else{
      $("#user-company").addClass("off");
      $("#register").removeClass("company");
    }
    
  });

  $("body").on("focus", ".has-error input", function(e){
    $(this).parent().removeClass("has-error");
  });


  $("#register").on("submit", function(e){
    e.preventDefault();
    var f = $(this);
    var form_data = $(this).serialize();
    var errors = [];

    console.log(form_data);

    $("#register .has-error").removeClass("has-error");

    if(f.hasClass("company")){
      var validation_scope = ".req";
    }else{
      var validation_scope = "#user-profile .req";
    }

    $.each($(validation_scope, f), function( index, field ) {
      
      // console.log($("input:first", field).attr("name") + ": " +  $("input:first", field).val());
      var hasError = false;
      var fv = $("input:first", field).val();

      if(fv.length <= 1){
        hasError = true;
      }else if($(field).hasClass("password") && $("input:first", field).val() !== $("input:last", field).val()){
        hasError = true;
      }

      if(hasError){
        $(field).addClass("has-error");
        errors.push(field);
      }
      
    });


    if(errors.length){
      console.log("validation failed");
    }else{
      if(!$("#tnc").prop("checked")){
        console.log("validation passed, checkbox failed");
        $("#terms-and-conditions").addClass("not-checked");
        setTimeout(function(){
          $("#terms-and-conditions").removeClass("not-checked");
        },100);
      }else{
        console.log("proceed to form processing");
      }
    }

    // console.log(form_data);

  });



});