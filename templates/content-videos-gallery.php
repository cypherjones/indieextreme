<div class="video-box">
    <ul>
    <!-- new releases -->
    <?php 
      $args = array(
        'post_type' => 'video',
        'order' => 'DESC',
      );

      $videos = new WP_Query( $args );
      
      if ($videos->have_posts()) : while ($videos->have_posts()) : $videos->the_post();  ?>
        <li class="<?= $post->post_name; ?>">
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
          <a href="<?php the_permalink(); ?>">
            <div class="video-container">
              <?php echo $iframe;?>
            </div>
          </a>
        </li>
    <?php endwhile; endif; ?>
    </ul>
  </div>