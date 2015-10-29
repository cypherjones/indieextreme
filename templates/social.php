<!-- social links -->
<div class="col-xs-12">
   <div class="social-links">
      <div class="page-title">
        <h4>Social Media</h4>
      </div>
      <div class="social-links-list">
      <?php 

        $facebook   = get_field('facebook', 'option');
        $twitter    = get_field('twitter', 'option');
        $instagram  = get_field('instagram', 'option');
        $youtube    = get_field('youtube', 'option');
        $soundcloud = get_field('soundcloud', 'option');
        $spotify    = get_field('spotify', 'option');

       ?>
        <ul>
          <?php if (!empty($facebook)) : ?>
            <li>
              <div class="facebook circle">
                <a href="<?php the_field('facebook', 'option') ?>">
                  <i class="fa fa-facebook"></i>
                </a>
              </div>
            </li>
          <?php endif; ?>
          <?php if (!empty($twitter)) : ?>
          <li>
            <div class="twitter circle">
              <a href="<?php the_field('twitter', 'option') ?>">
               <i class="fa fa-twitter"></i>
              </a>
            </div>
          </li>
          <?php endif; ?>
          <?php if (!empty($instagram)) : ?>
            <li>
              <div class="instagram circle">
                <a href="<?php the_field('instagram', 'option') ?>">
                 <i class="fa fa-instagram"></i>
                </a>
              </div>
            </li>
          <?php endif; ?>
          <?php if (!empty($youtube)) : ?>
            <li>
              <div class="youtube circle">
                <a href="<?php the_field('youtube', 'option') ?>">
                 <i class="fa fa-youtube"></i>
                </a>
              </div>
            </li>
          <?php endif; ?>
          <?php if(!empty($soundcloud)) : ?>
            <li>
              <div class="soundcloud circle">
                <a href="<?php the_field('soundcloud', 'option') ?>">
                 <i class="fa fa-soundcloud"></i>
                </a>
              </div>
            </li>
          <?php endif; ?>
          <?php if(!empty($spotify)) : ?>
            <li>
              <div class="spotify circle">
                <a href="<?php the_field('spotify', 'option') ?>">
                  <i class="fa fa-spotify"></i>
                </a>
              </div>
            </li>
          <?php endif; ?>
        </ul>
      </div>
   </div>
</div>