jQuery(document).ready(function($){

  $("#boi-status").on("change", function(e){
    e.preventDefault();


    $("#bsm-status-loading").addClass("visible");


    var v = $(this).val();
    var oid = parseInt($("#bsm-oid").text());

    $.ajax({
      type: "POST",
      url: "admin.php?page=bsm&bsm_ajax=updatestatus",
      data: "new_status="+v+"&oid="+oid,
      success: function(response){
        $("#bsm-status-loading").removeClass("visible");
      }
    });

  });
});