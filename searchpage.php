<?php
/*
Template Name: Search Page
*/
?>

<?php get_header( ); ?>

<section id="search-form">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-9">
        <h2>Please have a look around.</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-offset-3 col-md-9">
        <div class="search-form">
          <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
            <div class="form-group">
              <input type="search" class="form-control" id="search" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
            </div>
            <button type="submit" class="btn btn-default" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer( ); ?>