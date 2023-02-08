<?php get_header(); ?>
<div class="container">
  <div id="news-heading">
    <span class="chevron"></span>
    <h4><?php echo get_ui_text("news"); ?></h4>
    <span class="chevron"></span>
  </div>
</div>
<?php
  if(have_posts()): while(have_posts()): the_post();
?>
<div class="small-news-item">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <span class="date"><?php the_time('d F Y'); ?></span>
      </div>
      <div class="col-md-7"><h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4></div>
    </div>
  </div>
</div>
<?php
  endwhile; endif;
get_footer(); ?>