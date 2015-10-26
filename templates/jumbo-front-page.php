<div class="row">
  <div class="jumbo front-page">
    <!-- jumbo-copy -->
    <div class="col-xs-12 col-sm-6 col-md-5">
      <div class="tag-line">
        <h1><?php the_field('tag_line');?></h1>
      </div>
      <div class="header bar"></div>
      <div class="tag-extended">
        <?php the_field('tag_description')?>
      </div>
    </div>
    <!-- jumbo-slider -->
    <div class="col-xs-12 col-sm-6 col-md-7">
      <div class="jumbo-slider">
        <!-- slider repeater loop -->
        <?php if (have_rows('fp_slider')) : while ( have_rows('fp_slider')) : the_row();?>
          <!-- slider image -->
          <div class="image">
            <?php $jumbo_image = get_sub_field('slide_image'); ?>
            <img src="<?= $jumbo_image;?>" alt="">
            <div class="slider-artist">
              <?php the_sub_field('artist_name') ?>
            </div>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</div>