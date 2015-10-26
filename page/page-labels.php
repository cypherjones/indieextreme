<?php 
  if ( is_mobile() || is_tablet()) :
    get_template_part('templates/labels', 'mobile' );
  else :
    get_template_part('templates/labels', 'desktop' );
  endif;
 ?>
