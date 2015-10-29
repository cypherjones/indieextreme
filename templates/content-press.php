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
            'showposts' => '5',
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
      <?php get_template_part('templates/content', 'video' ); ?>
      <?php get_template_part('templates/social' ); ?>
      <!-- cta buttons  -->
      <div class="col-xs-12">
        <div class="press-cta">
          <?php 

            $secOneImage   = get_field('section_one_image',9);
            $secOneUrl     = get_field('section_one_url',9);
            $secTwoImage   = get_field('section_two_image',9); 
            $secTwoURL     = get_field('section_two_url',9);
            $secthreeImage = get_field('section_three_image',9);
            $secThreeUrl   = get_field('section_three_url',9); 

           ?>
           <?php if ( !empty($secOneImage) ) : ?>
            <div class="press-cta-image">
              <a href="<?= $secOneUrl; ?>">
                <img src="<?= $secOneImage; ?>" alt="Call to Action Image">
              </a>
            </div>
           <?php endif; ?>
           <?php if ( !empty($secTwoImage) ) : ?>
            <div class="press-cta-image">
              <a href="<?= $secTwoURL; ?>">
                <img src="<?= $secTwoImage; ?>" alt="Call to Action Image">
              </a>
            </div>
           <?php endif; ?>
           <?php if ( !empty($secThreeImage) ) : ?>
            <div class="press-cta-image">
              <a href="<?= $secThreeUrl; ?>">
                <img src="<?= $secThreeImage; ?>" alt="Call to Action Image">
              </a>
            </div>
           <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>