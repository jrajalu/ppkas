<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<div class="wrap column">
  <article class="article col-12-12">
    <?php while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <?php the_excerpt(); ?>

    <?php endwhile;?>
  </article>
</div>
<?php get_footer(); ?>