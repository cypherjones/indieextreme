<?php get_header( ); ?>
<section class="newsletter">
  <div class="container">
    <!-- newsletter -->
    <?php get_template_part('templates/cta', 'newsletter' ); ?>
  </div>
</section>

<div class="container"> 
<?php
  if (have_posts()) : while(have_posts()) : the_post();
  $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
?>
  <div class="row">
    <div class="col-md-7">
      <!-- latest post title -->
      <div class="page-title">
        <h4>Press</h4>
      </div>
      <div class="post-wrapper">
        <div class="post-box">
            <!-- post image -->
            <?php if (!empty($src)) : ?>
              <div class="post-image-box">
                <div class="post-image">
                  <img src="<?= $src[0]; ?>" alt="">
                </div>
              </div>
            <?php else : ?>
              
            <?php endif; ?>
            <!-- post -->
            <div class="post-post-box">
              <div class="post-content">
                <div class="post-title">
                  <?php the_title( ); ?>
                </div>
                <!-- <div class="post sub-title">
                  <?php the_field('sub_heading') ?>
                </div> -->
                <div class="post-content">
                  <?php the_content( ); ?>
                </div>
              </div>
            </div>
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
                <a href="<?= $secTwoUrl; ?>">
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
<?php endwhile; endif; ?>
</div>
<?php get_footer( ); ?>