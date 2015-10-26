<?php get_header(); ?>
  <section class="newsletter">
    <div class="container">
      <!-- newsletter -->
      <?php get_template_part('templates/cta', 'newsletter' ); ?>
    </div>
  </section>
  <div class="container">
  <?php

    $labels  = 'our-labels';
    $about   = 'what-we-do';
    $press   = 'press';
    $success = 'success-stories';
    $contact = 'contact';
    $vid     = 'videos-gallery';

    if (is_page( $labels )) :

      get_template_part('page/page', 'labels' );

    elseif ( is_page( $about ) ) :

      get_template_part('page/page', 'about-us' );

    elseif ( is_page( $press ) ) : 

      get_template_part('page/page', 'press' );

    elseif ( is_page($success ) ) :

      get_template_part('page/page', 'success' );

    elseif ( is_page( $contact ) ) :

      get_template_part('page/page', 'contact' );

    elseif ( is_page( $vid ) ) :

      get_template_part('page/page', 'videos-gallery' );

    else :

      get_template_part('templates/page', 'content' );

    endif;

    ?>

  </div>
<?php get_footer(); ?>