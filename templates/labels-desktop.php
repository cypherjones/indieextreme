<?php   
  
  /**
   * The WordPress Query class.
   * @link http://codex.wordpress.org/Function_Reference/WP_Query
   *
   */
  $args = [
    'pagename'  => 'our-labels',
    'post_type' => 'page'
  ];

$query = new WP_Query( $args );

if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

<div class="row">
  <div class="col-xs-12">
    <!-- page title -->
    <div class="page-title">
      <h4>
        <?php the_title( ); ?>
      </h4>
    </div>
  </div>
  <!-- labels-->
  <div class="col-md-12">
    <div class="all-labels">
      <div class="row">
        <?php if (have_rows('labels')) : while (have_rows('labels')) : the_row();?>
          <div class="col-md-4">
            <div class="label-box">
              <img src="<?php the_sub_field('label_image') ?>" alt="">
              <div class="label-overlay">
                <div class="label-artist">
                  <?php get_template_part('templates/labels', 'content' ); ?>
                </div>
                <div class="label-link">
                  <a href="">
                    visit website
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <!-- page title -->
    <div class="page-title">
      <h4>
        New Releases
      </h4>
    </div>
  </div>
</div>
<div class="release-box">
  <!-- new releases -->
  <?php 
    $args = array(
      'post_type' => 'release',
      'order' => 'DESC',
      'showposts' => '4',
    );

    $the_latest_release = new WP_Query( $args );
    
    if ($the_latest_release->have_posts()) : 
      while ($the_latest_release->have_posts()) : 
        $the_latest_release->the_post(); 
      $postContent = get_the_content( ); ?>
      <div class="col-xs-3">
        <img src="<?php the_field('release_image') ?>" alt="">
        <div class="release-artist">
          <?php the_field('release_arist') ?>
        </div>
        <div class="release-title">
          <?php the_field('release_title') ?>
        </div>
        <div class="release-url">
          <?php the_field('release_artist_website') ?>
        </div>
        <div class="release-genre">
          Genre: <?php the_field('release_genre') ?>
        </div>
      </div>
  <?php endwhile; endif; ?>
</div>
<?php endwhile; endif; rewind_posts(); wp_reset_query();?>