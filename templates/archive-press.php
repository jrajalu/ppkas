<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<div class="wrap column">
  <article class="article col-8-12">
    <h2><?php _e( 'Press Release', 'ukmtheme' ); ?></h2>
    <ol class="press-release">
      <?php
        $press = new WP_Query( array( 
          'post_type'       => 'press', 
          'posts_per_page'  => 10,
        ));
      if ( $press->have_posts() ) : while ( $press->have_posts() ) : $press->the_post(); ?>
        <li>
          <?php echo get_post_meta($post->ID,'ut_press_date',true); ?><br/>
          <a href="<?php echo get_post_meta($post->ID,'ut_press_file',true); ?>"><?php the_title(); ?></a>
        </li>
      <?php endwhile; else: ?>
      <h2><?php _e( 'Nothing Found', 'ukmtheme' ); ?></h2>
      <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
      <?php get_search_form(); ?>
      <?php endif; ?>
    </ol>
  </article>
  <aside class="aside col-4-12">
    <div class="uk-panel uk-panel-box">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
</div>
<?php get_footer(); ?>