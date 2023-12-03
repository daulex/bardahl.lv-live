<?php
$specification = $args['fields']['specifications'] ?? false;
if($specification):
?>

  <h4><?php echo get_ui_text("specifications"); ?></h4>
  <ul>
    <?php foreach($specification as $row): ?>
    <li><?=$row['specification'];?></li>
    <?php endforeach; ?>
  </ul>

<?php
endif;