<?php
/**
 * @package PPKAS_UniMAP
 * @version 1.0
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<div class="wrap column">
  <article class="article col-12-12">
    <h2><?php _e( 'Search', 'ukmtheme' ); ?></h2>
    <?php get_search_form(); ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php the_excerpt(); ?>
    <?php endwhile;?>
  </article>
</div>
<?php get_footer(); ?>