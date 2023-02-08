<?php
  $brand_images = array(
    "audi.svg",
    "chevrolet.svg",
    "citroen.svg",
    "fiat.svg",
    "jaguar.svg",
    "landrover.svg",
    "opel.svg",
    "peugeot.svg",
    "renault.svg",
    "skoda.svg",
    "volkswagen.svg",
    "volvo.svg"
  );
?>

<div id="brands" class="container">
  <div class="col-md-12">
    <div class="row">
      <h5><?php echo get_ui_text("approved_by_car_brands"); ?></h5>
      <div id="brand-logos">
        <?php foreach($brand_images as $b): $bn = explode(".", $b)?>
          <img src="<?php echo get_template_directory_uri(); ?>/a/i/brands/<?php echo $b; ?>" alt="<?php echo $bn[0]; ?>">
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>