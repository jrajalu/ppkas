<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 */
  $current_year = date('Y');
  $current_month = date('m');
  $eveData = array(
    'post_type'       => 'event',
    'posts_per_page'  => 10,
    'year'            => $current_year,
    'monthnum'        => $current_month,
    'post_status'     => array( 'publish', 'future' ),
    );
    
  $eveSlider = new WP_Query( $eveData );
?>

<div class="wrap event_jcarousel-outer">
  <div class="jcarousel-wrapper">
  <div class="jcarousel">
    <ul>
    <?php while ( $eveSlider->have_posts() ) : $eveSlider->the_post(); ?>
      <li>
        <span class="new_event_heading"><?php echo get_post_meta($post->ID, 'ut_event_date', true); ?>&nbsp;:&nbsp;<?php echo get_post_meta($post->ID, 'ut_event_time_start', true); ?></span>
        <span class="new_event_content"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></span>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
  <a href="#" class="jcarousel-control-prev"><i class='uk-icon uk-icon-angle-left'></i></a>
  <a href="#" class="jcarousel-control-next"><i class='uk-icon uk-icon-angle-right'></i></a>
  </div>
</div>