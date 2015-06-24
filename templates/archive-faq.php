<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 */
get_header();

  $faq = new WP_Query( array( 
    'post_type'       => 'faq', 
    'posts_per_page'  => -1, 
    'orderby'         => 'menu_order', 
    'order'           => 'ASC' 
  ));
  
?>
<div class="wrap column">
  <article class="article col-8-12">
  <h2><?php echo __( 'Frequently Asked Questions', 'ukmtheme' ) ?></h2>
    <ol class="ut-faq">
      <?php while ( $faq->have_posts() ) : $faq->the_post(); ?>
        <li>
          <a data-uk-toggle="{target:'#ut-faq-<?php echo get_the_ID(); ?>'}"><?php the_title(); ?></a>
          <div id="ut-faq-<?php echo get_the_ID(); ?>" class="uk-panel uk-panel-box uk-hidden">
            <?php the_content(); ?>
          </div>
        </li>
      <?php endwhile; ?>
    </ol>
  </article>
  <aside class="aside col-4-12">
    <div class="uk-panel uk-panel-box">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
</div>
<?php get_footer(); ?>