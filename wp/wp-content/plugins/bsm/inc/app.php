<?php
  
  
  
  function bsm_get_statuses(){
    return array("new","awaiting payment","awaiting collection", "awaiting delivery", "complete");
  }



  function bsm_include_template($wpdb){
    if(isset($_GET['manage'])):
      include(WP_PLUGIN_DIR."/bsm/templates/manage.php");
    else:
      include(WP_PLUGIN_DIR."/bsm/templates/dashboard.php");
    endif;
  }


  function bsm_pagination($table, $limit, $wpdb){
        
    $limit = intval($limit);


    $orders = $wpdb->get_results( 
      "
      SELECT COUNT(id) as c
      FROM $table
      ;
      "
    );
    $order_count = $orders[0];
    

    $total_records = intval($order_count->c);
    $total_pages = ceil($total_records / $limit);
    $pagLink = '<div class="bsm-pagination">';  
    for ($i=1; $i<=$total_pages; $i++):
      
      $class = "button";
      if(isset($_GET['paged']) && intval($_GET['paged']) === $i):
        $class .= " active";
      endif;

      $pagLink .= '<a href="admin.php?page=bsm&amp;paged='.$i.'" class="' . $class . '">'.$i.'</a>';  
    endfor;
    echo $pagLink . "</div>";  
    
  }
  
