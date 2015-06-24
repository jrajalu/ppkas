<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 * 
 * Widget: Address with social icon
 */

class UKMtheme_Social_Widget extends WP_Widget {


  function __construct() {
    parent::__construct(
      'ukmtheme_social_widget',
      __( '&bull; Address with Social Media Icon', 'ukmtheme' ),
      array( 'description' => __( 'Social media icon', 'ukmtheme' ), )
    );
  }


  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }

    if ( ! isset( $instance['textarea_address'] ) ) {
      $textarea_address = apply_filters( 'widget_textarea', empty( $instance['textarea_address'] ) ? '' : $instance['textarea_address'], $instance );
    }
    ?>
    <div class="column">
      <div class="col-12-12">
        <p><?php echo $instance['textarea_address']; ?></p>
      </div>
    </div>
    <div class="column">
      <div class="col-12-12 footer-social-link-wrap">
        <ul class="footer-social-icon">
          <?php
            $hide_facebook    = get_option('ukmtheme_facebook_hide');
            $hide_twitter     = get_option('ukmtheme_twitter_hide');
            $hide_youtube     = get_option('ukmtheme_youtube_hide');
            $hide_instagram   = get_option('ukmtheme_instagram_hide');
            $hide_rss         = get_option('ukmtheme_rss_hide');
          ?>
          <li class="<?php echo $hide_rss; ?>"><a class="uk-icon-rss-square" href="<?php bloginfo('rss_url'); ?>" title="RSS"></a></li>
          <li class="<?php echo $hide_facebook; ?>"><a class="uk-icon-facebook-square" href="<?php echo get_option('ukmtheme_facebook'); ?>" title="Facebook"></a></li>
          <li class="<?php echo $hide_twitter; ?>"><a class="uk-icon-twitter-square" href="<?php echo get_option('ukmtheme_twitter'); ?>" title="Twitter"></a></li>
          <li class="<?php echo $hide_youtube; ?>"><a class="uk-icon-youtube-square" href="<?php echo get_option('ukmtheme_youtube'); ?>" title="Youtube"></a></li>
          <li class="<?php echo $hide_instagram; ?>"><a class="uk-icon-instagram" href="<?php echo get_option('ukmtheme_instagram'); ?>" title="Intsagram"></a></li>
        </ul>
      </div>
    </div>
    <div class="column">
      <div class="col-12-12">
         <p class="ut-visitor-counter"><?php get_template_part( 'templates/visitor', $counter ); ?></p>
      </div>
    </div>

    <?php
    echo $args['after_widget'];
  }


  public function form( $instance ) {

    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Address with Social Icon', 'ukmtheme' );

    $textarea_address = ! empty( $instance['textarea_address'] ) ? $instance['textarea_address'] : __( 'Awesome widget!', 'ukmtheme' );

    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
    <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('textarea_address'); ?>" name="<?php echo $this->get_field_name('textarea_address'); ?>"><?php echo $textarea_address; ?></textarea>
    </p>
    <?php 
  }

  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    if ( current_user_can('unfiltered_html') )
      $instance['textarea_address'] =  $new_instance['textarea_address'];
    else
      $instance['textarea_address'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['textarea_address']) ) );

    return $instance;
  }

} 


function register_ukmtheme_social_widget() {
  register_widget( 'UKMtheme_Social_Widget' );
}
add_action( 'widgets_init', 'register_ukmtheme_social_widget' );