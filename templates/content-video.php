<!-- video title -->
      <div class="col-xs-12">
        <div class="page-title">
          <h4>Latest Video</h4>
        </div>
      </div>
      <!-- videos -->
      <div class="col-xs-12">
        <div class="latest-video">
          <?php 
            $args = array(
              'post_type' => 'video',
              'order' => 'DESC',
              'showposts' => '1',
              'date_query' => array(
                    array(
                        'after'  => '30 days ago'
                    ),
                ),
               
            );

            $the_latest_video = new WP_Query( $args );
            
            if ($the_latest_video->have_posts()) : 
              while ($the_latest_video->have_posts()) : 
                $the_latest_video->the_post(); 
              $postContent = get_the_content( ); ?>
              
            <div class="post-box col-xs-12">
              <!-- post image -->
              <div class="post-video">
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

                $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


                // echo $iframe
                echo $iframe;

                ?>
              </div>
            </div>
          <?php endwhile; endif;?>
        </div>
      </div>