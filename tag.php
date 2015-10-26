<?php get_header( ); ?>
<div class="container">
  <div class="col-md-9">
    <div class="row">
      <div class="tag title">
        <h5>
          Blog <span>></span> <?php single_tag_title( ); ?> Posts
        </h5>
      </div>
    </div>
  <!-- ============ Post Loop ============ -->
  <?php 
      global $paged,$wp_query;

      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      // Get all the Tag info
      if (is_tag(  )) {
        $tag_page = get_queried_object();
        $tag_title = $tag_page->name;
        $tag_slug = $tag_page->slug;
        $tag_id = $tag_page->term_id;
      }

        /**
         * The WordPress Query class.
         * @link http://codex.wordpress.org/Function_Reference/WP_Query
         *
         */
        $args = array(
          
          // 'category_name'    => 'blog',
          // 'post_type' => 'post',
          // 'order'     => 'DESC',
          'tag'           => $tag_slug,
          'posts_per_page'         => 2,
          // 'posts_per_archive_page' => 2,
          'paged'                  => $paged,
          
        );
      
      $query = new WP_Query( $args );
      
      

    if ( have_posts()) : $i = 0;
      while ( have_posts()) :
         the_post(); $i++;

      $TagPostContent = get_the_content( );
      

   ?>
  <div class="paged-post-box">

  <?php if( $i == 1 ) { ?>

    <div class="post title no-pad">

  <?php } else { ?>

    <div class="post title">

  <?php }  ?>

      <h3><?php the_title( ); ?> <span class="date"> <?php the_date( ); ?></span></h3> 
    </div>
    <div class="post-container">
      <div class="post-box">
        <div class="thumb">
          <img src="<?php the_field('image') ?>" alt="">
        </div>
        <div class="excerpt">
          <p>
            <?php echo wp_trim_words($TagPostContent, 45 ); ?>
          </p>
        </div>
        <div class="readon">
          <div class="readmore btn">
            <a href="<?php the_permalink(); ?>">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- ============ Share Box ============ -->
    <div class="share-box">
      <div class="row">
        <div class="social-shares">
          <div class="col-md-5">
            <div class="share">
              <div class="title">
                Share
              </div>
              <div class="links">
                <ul>
                  <li>
                    <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" data-link="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share on Facebook." class="js-social-share">Facebook</a>
                  </li>
                  <li>
                    <a href="https://plus.google.com/share?url={<?php the_permalink();?>}" onclick="javascript:window.open(this.href,
                  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">Google+</a>
                  </li>
                  <li>
                    <a href="http://twitter.com/share?original_referer=/&amp;text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" title="Tweet this!" class="js-social-share">Twitter</a>
                  </li>
                  <li>
                    <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>" class="js-social-share">Pinterest</a>
                  </li>
                  <li>
                    <a href="mailto:youremail@example.com?subject=I wanted to share this post with you from <?php bloginfo('name'); ?>&amp;body=<?php the_title('','',true); ?>&#32;&#32;<?php the_permalink(); ?>" title="Email to a friend/colleague" target="_top">Email</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="tag-shares">
          <div class="col-md-4">
            <div class="tags">
              <div class="title">
                Tags
              </div>
              <div class="links">
                <ul>

                  <?php 

                    $posttags = get_the_tags();
                    $tagCount = 0;

                    if ($posttags) {
                      foreach ($posttags as $tag) { 
                        $tagCount++;
                        if ( $tagCount <= 4 ) { 

                    ?>
                      
                      <li>
                        <a href="<?php echo get_tag_link($tag ); ?>">
                          <?php echo $tag->name; ?>
                        </a>
                      </li>

                  <?php 

                        }
                      }
                    }

                    ?>

                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="comment-counter">
          <div class="col-md-3">
            <div class="comments">
              <div class="title">
                Comments
              </div>
              <div class="count">
                <?php 

                  $goGetComments = get_comment_link( );

                 ?>
                <a href="<?php echo $goGetComments; ?>">
                  <?php comments_number('Comment', '1', '%' ); ?>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endwhile; endif; wp_reset_query(); rewind_posts();?>

  <!-- ============ Load Book Promos ============ -->
  <div class="post-pagination">
    <div class="row">
      <div class="col-md-12">
        <?php
          $big = 999999999; // need an unlikely integer

          echo paginate_links( array(
            // 'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            // 'current' => max( 1, get_query_var('paged') ),
            'total' => $query->max_num_pages,
            'type' => 'list',
            'prev_next' => true,
            'prev_text' => __('Previous'),
            'next_text' => __('Next'),
          ) );
        ?>
      </div>
    </div>
  </div>
  <!-- ============ Subscribe box ============ -->
  <?php get_template_part('content/cta', 'subscribe-newsletter' ); ?>
</div>
<!-- ============ Sidebar ============ -->
<?php get_template_part('content/section', 'sidebar' ); ?>
</div>
<?php get_footer( ); ?>