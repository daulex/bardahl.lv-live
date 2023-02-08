<?php
  // if(!isset($_GET['show_all']) && $_GET['show_all'] !== NULL):
    
  //   $orders = $wpdb->get_results( 
  //     "
  //     SELECT * 
  //     FROM b_orders
  //     ORDER BY id DESC;
  //     "
  //   );
  // else:
    
    
  // endif;
  



  $limit = 15;

  if (isset($_GET["paged"])) { $page  = intval($_GET["paged"]); } else { $page=1; };  

  $start_from = ($page-1) * $limit;  
    
  // $sql = "SELECT * FROM posts ORDER BY title ASC LIMIT $start_from, $limit";  

  $orders = $wpdb->get_results( 
    "
    SELECT * 
    FROM b_orders
    ORDER BY id DESC
    LIMIT $start_from, $limit
    ;
    "
  );

?>
<div id="bsm-dash">
  <div id="bsm-dash-header">
    <h1>BSM Dashboard</h1>
  </div>
  

  


  <div id="bsm-recent-orders">

    <table id="bsm-recent-orders-table">
      <thead>
        <tr>
          <th>date</th>
          <th>name</th>
          <th>delivery type</th>
          <th>status</th>
          <th>&nbsp; <!-- manage --></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <td colspan="5">
            <?php bsm_pagination("b_orders", $limit, $wpdb); ?>
          </td>
        </tr>
      </tfoot>
    <tbody>

    

    <?php foreach($orders as $order):
      $stamp = strtotime($order->created_at);
      ?>
      <tr>
        <td><?php echo date('d.m.y h:i', $stamp); ?></td>
        <td><?php echo $order->name." ".$order->surname; ?></td>
        <td><?php echo $order->delivery_type; ?></td>
        <td><?php echo $order->status; ?></td>
        <td><a href="admin.php?page=bsm&amp;manage=<?php echo $order->id; ?>" class="bsm-b-manage">manage</a></td>

      </tr>
    <?php endforeach; ?>

    </tbody>
    </table>


    
  </div>


  
</div>