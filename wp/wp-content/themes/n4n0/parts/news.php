<?php
  $lp = new WP_Query( "&posts_per_page=5" );
  if ( $lp->have_posts() ):


    feat_heading("news");

  $pi = 1;
  while($lp->have_posts()): $lp->the_post();

    if($pi === 1):
?>
  <div id="news-first-item">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
          <span class="date"><?php the_time('d F Y'); ?></span>
        </div>
        <div class="col-md-7 the_content"><?php echo get_excerpt_by_id($post->ID, 80); ?></div>
      </div>
    </div>
  </div>
  
<?php else: ?>
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
<?php endif; ?>
<?php $pi++; endwhile; ?>
<div id="all-posts-link">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          &nbsp;
        </div>
        <div class="col-md-7">
          <a href="<?php echo get_permalink(get_ui_text('posts_page')); ?>"><?php echo get_ui_text('posts_page_label'); ?></a>
        </div>
      </div>
    </div>
  </div>
<?php endif; wp_reset_query(); ?>