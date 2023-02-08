<?php
  
  global $wpdb;
  
  $action = isset($_GET['bsm_ajax']) ? preg_replace("/[^a-zA-Z0-9]+/", "", $_GET['bsm_ajax']) : false;

  if($action === "updatestatus"):
    
    $new_status = isset($_POST['new_status']) ? preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['new_status']) : false;
    $oid = isset($_POST['oid']) ? intval(preg_replace("/[^0-9 ]+/", "", trim($_POST['oid']))) : false;

    // die("new status: ".$new_status." oid: ".$oid);

    $wpdb->query( $wpdb->prepare( 
      "
      UPDATE b_orders
      SET status ='%s'
      WHERE id =%d
      ;
      ",

      $new_status, $oid

    ) );

    die("status updated");

  endif;