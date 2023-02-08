<?php
  $id = intval($_GET['manage']);
  $orders = $wpdb->get_results( 
      "
      SELECT * 
      FROM b_orders
      WHERE id=$id;
      "
    );
  $order = $orders[0];

  $ordermeta = $wpdb->get_results( 
      "
      SELECT * 
      FROM b_ordermeta
      WHERE order_id=$id
      ORDER BY meta_id ASC
      ;
      "
    );
  
?>
<br>
<a href="admin.php?page=bsm" class="button">&larr; Back to list</a>

<div id="bsm-order">
  <div id="bsm-order-header">
    <h1>Order <span id="bsm-oid"><?php echo $id; ?></span></h1>
  </div>
  <div id="bsm-order-info">

    <h2>Order info</h2>
    
    <div class="boi-row boi-field-status">
      <div class="boi-label">status</div>
      <div class="boi-field">
      <?php
        $statuses = bsm_get_statuses();
        $status = $order->status;
      ?>
        <select name="status" id="boi-status">
          <?php
            foreach($statuses as $s):
              $selected = "";
              if($s === $status):
                $selected = ' selected="selected"';
              endif;
          ?>
          <option value="<?php echo $s; ?>"<?php echo $selected; ?>><?php echo $s; ?></option>
          <?php endforeach; ?>
        </select>
        <img src="<?php echo plugins_url('bsm/a/img/loading.gif'); ?>" alt="loading" id="bsm-status-loading" class="bsm-spinner">
      </div>
    </div>
    <div class="boi-row boi-field-type">
      <div class="boi-label">Delivery type</div>
      <div class="boi-field"><?php echo $order->delivery_type; ?></div>
    </div>



    <div class="boi-row boi-field-date">
      <div class="boi-label">date</div>
      <div class="boi-field"><?php echo date('d.m.y h:i', strtotime($order->created_at)) ?></div>
    </div>
    <div class="boi-row boi-field-name">
      <div class="boi-label">Name</div>
      <div class="boi-field"><?php echo $order->name . " " . $order->surname; ?></div>
    </div>
    
    <div class="boi-row boi-field-address">
      <div class="boi-label">address</div>
      <div class="boi-field"><?php echo stripslashes($order->address); ?></div>
    </div>
    <div class="boi-row boi-field-email">
      <div class="boi-label">email</div>
      <div class="boi-field"><?php echo $order->email; ?></div>
    </div>
    <div class="boi-row boi-field-phone">
      <div class="boi-label">phone</div>
      <div class="boi-field"><?php echo $order->phone; ?></div>
    </div>

  </div>
  
  <h3>Products</h3>

  <div id="bsm-order-products">



    <table id="bsm-order-products-table">
      <thead>
        <tr>
          <th>Title</th>
          <th>quantity</th>
          <th>SKU</th>
          <th>units</th>
          <th>per unit</th>
          <th>total</th>
        </tr>
      </thead>
      
    <tbody>

    

    <?php 
      $sum = 0;

      foreach($ordermeta as $product):
        $row_sum = intval($product->units)*floatval($product->price);
        $sum = $sum + $row_sum;

        $source = get_product_source($product->post_id);
        $prices = get_field("prices", $source);

        
        $sku = 0;
        foreach($prices as $price):
          
          if($product->quantity === $price['quantity']):
            $sku = $price['sku'];

          endif;

        endforeach;
        
     ?>
      <tr>
        <td><a href="<?php echo get_permalink($product->post_id); ?>"><?php echo $product->title; ?></a></td>
        <td><?php echo $product->quantity; ?></td>
        <td><?php echo $sku; ?></td>
        <td><?php echo $product->units; ?></td>
        <td><?php echo $product->price; ?></td>
        <td><?php echo number_format($row_sum, 2); ?></td>

      </tr>
    <?php endforeach; ?>

    </tbody>
      <tfoot>
        <tr>
          <td colspan="5">&nbsp;</td>
          <td>
            <?php echo number_format($sum, 2); ?>
          </td>
        </tr>
      </tfoot>
    </table>


  



  </div>

</div>