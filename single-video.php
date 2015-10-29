    <?php get_header( ); ?>
      <?php if (have_posts()) : while(have_posts()) : the_post();?>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="the-video-title">
                <?php the_title( ); ?>
              </div>
              <div class="the-video">
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
                  <?php echo $iframe;?>
              </div>
              <div class="videos">
                <?php get_template_part('templates/content', 'videos-gallery' ); ?>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; endif; ?> 
    <?php get_footer( ); ?>