    <?php get_header( ); ?>
    <?php if (have_posts()) : while(have_posts()) : the_post();?>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-4">
                <div class="featured-image">
                  <img src="<?php the_field('resource_image') ?>" alt="Featured Image">
                </div>
              </div>
              <div class="col-md-8">
                <!-- post -->
                <div class="page post">
                  <!-- post title -->
                  <div class="title">
                    <?php the_title( ); ?>
                  </div>
                  <!-- post subtitle 1 -->
                  <div class="subtitle">
                    <?php the_field('resource_subtitle') ?>
                  </div>
                  <!-- post content -->
                  <div class="content">
                    <?php the_field('resource_description') ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; endif; ?> 
    <?php get_footer( ); ?>