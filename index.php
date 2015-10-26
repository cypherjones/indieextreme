<?php get_header( ); ?>
  
    <div class="container">
      <div class="row">
      <?php if (have_posts()) : while(have_posts()) : the_post();?>
        <?php if (is_archive('resource')) :
            get_template_part('templates/content', 'resource' );
            else :
         ?>  
      <div class="row">
        <div class="col-md-4">
          <img src="<?= $src[0]; ?>" alt="Featured Image">
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
              <?php the_field('sub_title') ?>
            </div>
            <!-- post content -->
            <div class="content">
              <?php the_content( ); ?>
            </div>
          </div>
        </div>
      </div>
      <?php endif; endwhile; endif; ?> 
      </div>
    </div>
  
<?php get_footer( ); ?>