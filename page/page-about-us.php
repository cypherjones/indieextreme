<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="row">
  <!-- left column -->
  <div class="col-md-7">
    <div class="row">
      <!-- latest post title -->
      <div class="col-xs-12">
        <div class="page-title">
          <h4><?php the_title( ); ?></h4> <!-- wire up -->
        </div>
      </div>
      <!-- latest post -->
      <div class="col-xs-12">
        <div class="content-box">
          <div class="post">
            <?php the_content( ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- right column -->
  <div class="col-md-5">
    <div class="row">
      <!-- video title -->
      <div class="col-xs-12">
        <div class="page-title">
          <h4>A Note from the CEO</h4>
        </div>
      </div>
      <!-- videos -->
      <div class="col-xs-12">
        <div class="ceo">
          <div class="ceo-image">
            <img src="<?php the_field('ceo_image') ?>" alt="">
          </div>
          <div class="ceo-message">
            <?php the_field('ceo_message') ?>
          </div>
        </div>
      </div>
      <div class="col-xs-12">
        <div class="ie-opps">
          <div class="page-title">
            <h4>iE Opportunities</h4>
          </div>
          <div class="content-box">
            <div class="ie-opp-title">
              <a href="<?php the_field('opportunity_files',7) ?>"><?php the_field('opportunity_title',7) ?></a>
            </div>
          </div>
        </div>
      </div>
      <?php get_template_part('templates/social' ); ?>
    </div>
  </div>
</div>
<?php endwhile; endif; ?>