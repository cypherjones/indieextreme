<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * 
 */

get_header(); ?>
  
  <section id="four-o-four">
    <div class="container">
      <div class="row">
        <div id="primary" class="col-md-12">
          <div id="content" class="site-content" role="main">

            <div class="page-header">
              <h1 class="page-title">
                Looks like we can't find what you're looking for...
              </h1>
            </div>

            <div class="page-wrapper">
              <div class="page-content">
                <h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'twentythirteen' ); ?></h2>
                <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>

                 <?php get_search_form(); ?> 
              </div><!-- .page-content -->
            </div><!-- .page-wrapper -->

          </div><!-- #content -->
        </div><!-- #primary -->
      </div>
    </div>
  </section>

<?php get_footer(); ?>