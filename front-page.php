<?php get_header( ); ?>
  <section class="jumbo background">
    <div class="container">
      <!-- jumbo -->
      <?php get_template_part('templates/jumbo', 'front-page' );?>
    </div>
  </section>
  <section class="newsletter">
    <div class="container">
      <!-- newsletter -->
      <?php get_template_part('templates/cta', 'newsletter' ); ?>
    </div>
  </section>
  <section class="latest-news background">
    <div class="container">
      <!-- latest news -->
      <?php get_template_part('templates/content', 'latest-news' ); ?>
    </div>
  </section>
<?php get_footer( ); ?>