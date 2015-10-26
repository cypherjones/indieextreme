<div class="row">
  <div class="video-box">
  <!-- new releases -->
  <?php 
    $args = array(
      'post_type' => 'video',
      'order' => 'DESC',
    );

    $videos = new WP_Query( $args );
    
    if ($videos->have_posts()) : while ($videos->have_posts()) : $videos->the_post();  ?>
      <div class="col-xs-3">
        <?php

        // get iframe HTML
        $iframe = get_field('video_asset');


        // use preg_match to find iframe src
        preg_match('/src="(.+?)"/', $iframe, $matches);
        $src = $matches[1];


        // add extra params to iframe src
        $params = array(
            'controls'    => 0,
            'hd'        => 1,
            'autohide'    => 1
        );

        $new_src = add_query_arg($params, $src);

        $iframe = str_replace($src, $new_src, $iframe);


        // add extra attributes to iframe html
        $attributes = 'frameborder="0"';

        $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe); ?>

        <a href="<?php the_permalink(); ?>"><?php echo $iframe;?></a>
        
      </div>
  <?php endwhile; endif; ?>
  </div>
</div>