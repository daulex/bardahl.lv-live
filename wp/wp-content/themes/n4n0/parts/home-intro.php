<?php
    $img = false;
    $image = get_field('intro_image');
    if($image){
        $imgSizes = $image['sizes'];
        if(wp_is_mobile()){
            $img = $imgSizes['home-intro-mobile'];
        } else {
            $img = $imgSizes['home-intro'];
        }
    }
?>
<div class="home-intro" <?php if($img){ echo ' style="background-image: url('.$img.')"';} ?>>
    <h1><?=get_ui_text("official_distributor")?></h1>
    <a href="/produkti" class="btn"><?php echo get_ui_text("products"); ?></a>
</div>