<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 */
get_header();

  $publication = new WP_Query( array( 
    'post_type'       => 'publication',
    'posts_per_page'  => 10,
  ));

?>
<div class="wrap column">
  <article class="article col-12-12">
    <h2><?php _e( 'Publication', 'ukmtheme' ); ?></h2>
      <?php if ( $publication->have_posts() ) : while ( $publication->have_posts() ) : $publication->the_post(); ?>
        <div class="column bottom-divider">
          <div class="col-3-12 pad-right">
            <?php
              $pub_cover = get_post_meta($post->ID,'ut_publication_cover',true);
              if ( $pub_cover ) { ?>
              <img src="<?php echo $pub_cover; ?>" alt="">
              <?php }

              else { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_publication.svg">
              <?php }
            ?>
          </div>
          <div class="col-9-12 pad-left">
            <h3><?php the_title(); ?></h3>
            <h4><?php _e('Detail','ukmtheme') ?></h4>
            <table>
              <tr><td><?php _e('Author','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_author', true); ?></td></tr>
              <tr><td><?php _e('Publisher','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_publisher', true); ?></td></tr>
              <tr><td><?php _e('Year','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_year', true); ?></td></tr>
              <tr><td><?php _e('Number of Pages','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_pages', true); ?></td></tr>
              <tr><td><?php _e('Reference/Download','ukmtheme'); ?></td><td>:&nbsp;<a href="<?php echo get_post_meta($post->ID, 'ut_publication_reference', true); ?>"><?php _e('Click here','ukmtheme') ?></a></td></tr>
            </table>
            <a href="<?php echo get_permalink(); ?>"><button class="uk-button uk-button-small"><?php _e('Read More','ukmtheme'); ?></button></a>
          </div>
        </div>
      <?php endwhile; else: ?>
        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
        <?php get_search_form(); ?>
      <?php endif; ?>
      <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
  </article>
</div>
<?php get_footer(); ?>