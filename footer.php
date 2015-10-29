    <section class="footer">
      <div class="container">
        <!-- logos -->
        <div class="row">
          <div class="col-xs-12 col-md-6">
            <div class="footer-logo">
              <div class="logo">
                <img src="<?php the_field('w_o_b_logo', 'option') ?>" alt="">
              </div>
              <div class="tagline">
                <img src="<?php the_field('tag_line_logo', 'option') ?>" alt="">
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-6">
            <div class="footer-meta">
              <div class="row">
                <div class="col-xs-6 col-md-4">
                  <!-- site map title -->
                  <div class="site-map">
                    <div class="title">
                      <h4>
                        Sitemap
                      </h4>
                    </div>
                  </div>
                  <!-- site map list -->
                  <div class="site-map-menu">
                    <ul>
                      <!-- repeater loop -->
                      <?php if ( have_rows('menu_items', 'option')) : while (have_rows('menu_items', 'options')) : the_row(); ?>
                        <li>
                          <a href="<?php the_sub_field('menu_item_link') ?>">
                            <?php the_sub_field('menu_item_name') ?>
                          </a>
                        </li>
                      <?php endwhile; endif; ?>
                    </ul>
                  </div>
                </div>
                <div class="col-xs-6 col-md-4">
                  <!-- legal stuff -->
                  <div class="legal-stuff">
                    <!-- legal title -->
                    <div class="title">
                      <h4>
                        Legal Stuff
                      </h4>
                    </div>
                    <!-- legal stuff menu -->
                    <div class="legal-stuff-menu">
                      <ul>
                        <!-- repeater loop -->
                        <?php if ( have_rows('legal_menu_items', 'option')) : while (have_rows('legal_menu_items', 'options')) : the_row(); ?>
                          <li>
                            <a href="<?php the_sub_field('legal_menu_item_link') ?>">
                              <?php the_sub_field('legal_menu_item_name') ?>
                            </a>
                          </li>
                        <?php endwhile; endif; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-md-4">
                  <div class="cta">
                    <div class="title">
                      <h4>
                        Seen Enough?
                      </h4>
                    </div>
                    <div class="btn">
                      <a href="mailto:kathyd@indieextreme.com">
                        Get Started
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- lovingly made by -->
        <div class="row">
          <div class="col-xs-12">
            <div class="lvlymb">
              <p>
                © 2015 indieEXTREME, LLC. | Website Powered By: <a href="http://beefymarketing.com">Beefy Marketing</a>.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- type kit -->
    <script src="https://use.typekit.net/lxk4yeq.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  <script type="text/javascript">
  (function($) {

  /*
  *  render_map
  *
  *  This function will render a Google Map onto the selected jQuery element
  *
  *  @type  function
  *  @date  8/11/2013
  *  @since 4.3.0
  *
  *  @param $el (jQuery element)
  *  @return  n/a
  */

  function render_map( $el ) {

    // var
    var $markers = $el.find('.marker');

    // vars
    var args = {
      zoom    : 8,
      center    : new google.maps.LatLng(0, 0),
      mapTypeId : google.maps.MapTypeId.ROADMAP,
      disableDefaultUI: true,
      panControl: false
    };

    // create map           
    var map = new google.maps.Map( $el[0], args);

    // add a markers reference
    map.markers = [];

    // add markers
    $markers.each(function(){

        add_marker( $(this), map );

    });

    // center map
    center_map( map );

  }

  /*
  *  add_marker
  *
  *  This function will add a marker to the selected Google Map
  *
  *  @type  function
  *  @date  8/11/2013
  *  @since 4.3.0
  *
  *  @param $marker (jQuery element)
  *  @param map (Google Map object)
  *  @return  n/a
  */

  function add_marker( $marker, map ) {

    // var
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

    // create marker
    var marker = new google.maps.Marker({
      position  : latlng,
      map     : map
    });

    // add to array
    map.markers.push( marker );

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
      // create info window
      var infowindow = new google.maps.InfoWindow({
        content   : $marker.html()
      });

      // show info window when marker is clicked
      google.maps.event.addListener(marker, 'click', function() {

        infowindow.open( map, marker );

      });
    }

  }

  /*
  *  center_map
  *
  *  This function will center the map, showing all markers attached to this map
  *
  *  @type  function
  *  @date  8/11/2013
  *  @since 4.3.0
  *
  *  @param map (Google Map object)
  *  @return  n/a
  */

  function center_map( map ) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each( map.markers, function( i, marker ){

      var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

      bounds.extend( latlng );

    });

    // only 1 marker?
    if( map.markers.length == 1 )
    {
      // set center of map
        map.setCenter( bounds.getCenter() );
        map.setZoom( 16 );
    }
    else
    {
      // fit to bounds
      map.fitBounds( bounds );
    }

  }

  /*
  *  document ready
  *
  *  This function will render each map when the document is ready (page has loaded)
  *
  *  @type  function
  *  @date  8/11/2013
  *  @since 5.0.0
  *
  *  @param n/a
  *  @return  n/a
  */

  $(document).ready(function(){

    $('.form-map').each(function(){

      render_map( $(this) );

    });

  });

  })(jQuery);
  </script>
    <!-- sliders -->
    <script>
      $(document).ready(function(){
        $('.jumbo-slider').slick({
          arrows: true,
          infinite: true,
          dots: true,
          speed: 300,
          slidesToShow: 1,
          cssEase: 'ease',
          adaptiveHeight: true
        });
      });
    </script>
    <script>
      $(document).ready(function(){
        $('.labels-mobile-slider').slick({
          arrows: false,
          infinite: true,
          dots: true,
          speed: 300,
          slidesToShow: 1,
          cssEase: 'ease',
          adaptiveHeight: true
        });
      });
    </script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.5/slick.min.js"></script>
	</body>
</html>