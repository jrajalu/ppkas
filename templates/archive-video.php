<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 *
 * @link http://codex.wordpress.org/Function_Reference/get_post_type_archive_link
 * @link http://codex.wordpress.org/Function_Reference/post_type_archive_title
 */
get_header(); ?>
<div class="wrap">
  <article class="article">
    <h2><?php _e( 'Video', 'ukmtheme' ) ; ?></h2>
    <div class="column fitvids">
      <?php while ( have_posts() ) : the_post(); ?>
      <div class="col-4-12 pad-right pad-bottom" style="min-height: 250px;">
          <?php
            $url = esc_url( get_post_meta( get_the_ID(), 'ut_video_url', 1 ) );
            echo wp_oembed_get( $url );
          ?>
          <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
        </div>
      <?php endwhile ?>
    </div>
    <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
  </article>
</div>
<?php get_footer(); ?>