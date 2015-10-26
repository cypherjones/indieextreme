<ul>
<?php 
  // get the rows
  $rows = get_sub_field('label_artist');
  //do we have rows 
  if (have_rows('label_artist')) : 
  // set a counter
  $i = 0; 
  // count the rows
  $count = count($rows);
  // run the loop
  while (have_rows('label_artist')) : the_row(); $i++; ?>
    <?php if ($count <= 2 ) : ?>

      <li>
        <?php if ( $i == 1 ) : ?>
          <div class="label-title one-label">
            <?php the_sub_field('label_artist_name') ?>
          </div>
        <?php else : ?>
          <div class="artist">
            <?php the_sub_field('label_artist_name') ?>
          </div>
        <?php endif; ?>
      </li>

    <?php elseif ( $count == 3 ) : ?>

      <li>
        <?php if ( $i == 1 ) : ?>
          <div class="label-title even-more-labels">
            <?php the_sub_field('label_artist_name') ?>
          </div>
        <?php else : ?>
          <div class="artist">
            <?php the_sub_field('label_artist_name') ?>
          </div>
        <?php endif; ?>
      </li>

    <?php else : ?>

      <li>
        <?php if ( $i == 1 ) : ?>
          <div class="label-title more-labels">
            <?php the_sub_field('label_artist_name') ?>
          </div>
        <?php else : ?>
          <div class="artist">
            <?php the_sub_field('label_artist_name') ?>
          </div>
        <?php endif; ?>
      </li>

    <?php endif; ?>
  <?php endwhile; endif; ?>
</ul>