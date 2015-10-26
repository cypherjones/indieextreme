<header>
  <!-- navigation -->
  <div class="pre-nav bar">
    
  </div>
  <nav class="navbar navbar-default .navbar-static-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="brand">
          <div class="logo">
            <?php
              //get the logos from options page
              $mainLogo     = get_field('main_logo', 'option');
              $mobile_logo  = get_field('mobile_logo', 'option');
              $tablet_logo  = get_field('tablet_logo', 'option');
              // check for mobile logo first
              if ( is_mobile() ) : ?>
              <!-- mobile logo -->
              <a href="<?php bloginfo('url' ); ?>">
                <img class="mobile-logo" src="<?= $mobile_logo; ?>" alt="Indie Extreme Logo">
              </a>
            <?php 
              // check for tablet logo
              elseif ( is_tablet() ) : 
             ?>
              <!-- tablet logo -->
              <a href="<?php bloginfo('url' ); ?>">
                <img class="tablet-logo" src="<?= $mobile_logo; ?>" alt="Indie Extreme Logo">
              </a>
            <?php 
              else :
             ?>
              <!-- main logo -->
              <a href="<?php bloginfo('url' ); ?>">
                <img class="desktop-logo" src="<?= $mainLogo; ?>" alt="Indie Extreme Logo">
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
      <!-- Collect the nav links, forms, and other content for toggling -->
      <?php
          wp_nav_menu( array(
              'menu'              => 'menu',
              'theme_location'    => 'main-nav',
              'depth'             => 2,
              'menu_class'        => 'nav navbar-nav navbar-right',
              'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
              'walker'            => new wp_bootstrap_navwalker())
          );
        ?>
    </div><!-- /.container -->
  </nav>
</header>