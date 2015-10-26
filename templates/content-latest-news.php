<div class="row">
  <!-- left column -->
  <div class="col-md-7">
    <div class="row">
      <!-- latest post title -->
      <div class="col-xs-12">
        <div class="page-title">
          <h4>Latest News</h4>
        </div>
      </div>
      <!-- latest post -->
        <div class="post">
        <?php 
          $args = array(
            'order' => 'DESC',
            'showposts' => '3',
            // 'date_query' => array(
            //       array(
            //           'after'  => '30 days ago'
            //       ),
            //   ),
             
          );

          $the_latest = new WP_Query( $args );
          
          if ($the_latest->have_posts()) : while ($the_latest->have_posts()) : $the_latest->the_post(); 
          $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
          $postContent = get_the_content( ); ?>
            
          <div class="post-wrapper">
            <div class="post-box">
              <div class="col-xs-12 col-md-5">
                <!-- post image -->
                <?php if (!empty($src)) : ?>
                <div class="post-image">
                  <img src="<?= $src[0]; ?>" alt="">
                </div>
                <?php else : ?>
                <div class="post-image">
                  <img src="<?php the_field('main_logo', 'option') ?>" alt="">  
                </div>
                <?php endif; ?>
              </div>
              <div class="col-xs-12 col-md-7">
                <!-- post -->
                <div class="post-content">
                  <div class="post-title">
                    <a href="<?php the_permalink(); ?>">
                      <?php the_title( ); ?>
                    </a>
                  </div>
                  <!-- <div class="post sub-title">
                    <?php the_field('sub_heading') ?>
                  </div> -->
                  <div class="post-excerpt">
                    <?= wp_trim_words($postContent, 55 ); ?>... <a href="<?php the_permalink(); ?>">read more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; endif; wp_reset_query(); rewind_posts(); ?>
        </div>

    </div>
  </div>
  <!-- right column -->
  <div class="col-md-5">
    <div class="row">
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
          <?php endwhile; endif; ?>
        </div>
      </div>
      <!-- social links -->
      <div class="col-xs-12">
       <div class="social-links">
          <div class="page-title">
            <h4>Social Media</h4>
          </div>
          <div class="social-links-list">
            <ul>
              <li>
                <div class="facebook circle">
                  <a href="<?php the_field('facebook', 'option') ?>">
                    <i class="fa fa-facebook"></i>
                  </a>
                </div>
              </li>
              <li>
                <div class="twitter circle">
                  <a href="<?php the_field('twitter', 'option') ?>">
                   <i class="fa fa-twitter"></i>
                  </a>
                </div>
              </li>
              <li>
                <div class="instagram circle">
                  <a href="<?php the_field('instagram', 'option') ?>">
                   <i class="fa fa-instagram"></i>
                  </a>
                </div>
              </li>
              <li>
                <div class="youtube circle">
                  <a href="<?php the_field('youtube', 'option') ?>">
                   <i class="fa fa-youtube"></i>
                  </a>
                </div>
              </li>
              <li>
                <div class="soundcloud circle">
                  <a href="<?php the_field('soundcloud', 'option') ?>">
                   <i class="fa fa-soundcloud"></i>
                  </a>
                </div>
              </li>
              <li>
                <div class="spotify circle">
                  <a href="<?php the_field('spotify', 'option') ?>">
                    <i class="fa fa-spotify"></i>
                  </a>
                </div>
              </li>
            </ul>
          </div>
       </div>
      </div>
    </div>
  </div>
</div>