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
  <h2><?php single_cat_title(); ?></h2>

  <?php

    $staff = new WP_Query( array(
      'post_type'       => 'staff',
      'department'        => get_the_term_list( $post->ID, 'department' ),
      'posts_per_page'  => -1,
      'orderby'         => 'menu_order',
      'order'           => 'ASC'
    ));

    while ( $staff->have_posts() ) : $staff->the_post();
  ?>
  <div class="column bottom-divider">
    <div class="sm-col-3-12">
        <div class="staff-photo pad-right">
          <?php
            $staff_photo = get_post_meta($post->ID,'ppkas_staff_photo',true);
            if ( $staff_photo ) { ?>
            <img src="<?php echo get_post_meta($post->ID,'ppkas_staff_photo',true); ?>" alt="">
            <?php }

            else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_staff.svg">
            <?php }
          ?>
        </div>
    </div>

    <div class="sm-col-9-12">
      <div class="staff-detail pad-left">
        <h3><?php the_title(); ?></h3>
        <ul>
          <li><?php echo get_the_term_list( $post->ID, 'position', '', ', ', '' ); ?></li>
          <li><i class="uk-icon-phone-square"></i> <?php echo get_post_meta($post->ID, 'ppkas_staff_phone', true); ?></li>
          <li><i class="uk-icon-envelope-square"></i> <?php echo get_post_meta($post->ID, 'ppkas_staff_email', true); ?></li>
        </ul>
        <?php
          $cvLink = get_post_meta(get_the_ID(),'ppkas_staff_cv_link',true);

          if( $cvLink == on ) { ?>
            <a href="<?php echo get_permalink(); ?>">Curriculum Vitae</a>
          <?php }
          else {
            echo '';
          }
        ?>
          <?php get_template_part('templates/content','edit' ); ?>
      </div>
    </div>
  </div>
  <hr>

  <?php endwhile; ?>
</article>
  <aside class="aside col-4-12">
    <div class="uk-panel uk-panel-box">
      <?php echo term_description(); ?>
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
</div>

<?php get_footer(); ?>
