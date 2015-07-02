<?php
/**
 * @package PPKAS_UniMAP
 * @version 1.0
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<div class="wrap column">
  <?php if ( dynamic_sidebar( 'sidebar-2' ) ) : else : ?><?php endif; ?>
</div>
<div class="wrap">
  <div class="pad-top pad-bottom uk-grid uk-grid-divider" data-uk-grid-match="">
    <?php if ( dynamic_sidebar( 'sidebar-3' ) ) : else : ?><?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>