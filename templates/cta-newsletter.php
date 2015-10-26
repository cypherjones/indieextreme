
<div class="row">
  <div class="cta-newsletter">
    <!-- newsletter titles -->
    <div class="col-xs-12 col-md-6">
      <div class="page-title">
        <h1>
          <?php the_field('newsletter_heading',26) ?>
        </h1>
      </div>
      <div class="sub-title">
        <?php the_field('newsletter_subheading',26) ?> 
      </div>
    </div>
    <!-- newsletter form -->
    <div class="col-xs-12 col-md-6">
      <div class="form">
        <?= do_shortcode('[gravityform id=1 title=false description=false index=99]' ); ?>
      </div>
    </div>
  </div>
</div>