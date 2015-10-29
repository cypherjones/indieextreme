<div class="row">
  <div class="col-md-12">
    <div class="contact-box">
      <div class="row">
        <div class="col-md-6">
          <div class="form-bx">
            <?php 
            $form = get_field('contact_form',13); 
            //form
            echo do_shortcode($form );
            ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-text">
            <div class="form-title">
              <?php the_field('title', 13) ?>
            </div>
            <div class="form-sub-title">
              <?php the_field('sub_title', 13) ?>
            </div>
            <!-- <div class="form-map">
              <?php $location = get_field('map') ?>
              <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
