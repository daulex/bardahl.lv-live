<?php
  if(get_field("enable_carousel")):
    $carousel_slides = get_field("carousel_slides");
?>

<div id="carousel">

  <div class="slider single-item">

    <?php foreach($carousel_slides as $slide): $link = $slide['link']; ?>
    <div style="background-image: url('<?php echo $slide['background']; ?>');">
      <h3><?php echo $slide['title']; ?></h3>
      
      <a href="<?php echo $link['url']; ?>" class="cta" <?php if($link['target']): ?>target="_blank"<?php endif; ?>><?php echo $link['title']; ?></a>
    </div>
    <?php endforeach; ?>

  </div>
</div>
<?php endif; ?>