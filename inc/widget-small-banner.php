<?php
/**
 * @package PPKAS_UniMAP
 * @version 1.0
 * @author Jamaludin Rajalu
 */
class PPKAS_Banner_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'ppkas_small_banner_widget', // Base ID
			__( 'Small Banner', 'ppkas' ), // Name
			array( 'description' => __( 'Small Marketing Widget', 'ppkas' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
    
    if ( ! isset( $instance['image'] ) ) {
      $image = $instance['image'];
    }
    
    if ( ! isset( $instance['link'] ) ) {
      $link = $instance['link'];
    }  
		?>
<a href="<?php echo $instance['link']; ?>">
  <img src="<?php echo $instance['image']; ?>"/>
</a>
    

    <?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'ppkas' );
    $image = ! empty( $instance['image'] ) ? $instance['image'] : __( 'New image', 'ppkas' );
    $link = ! empty( $instance['link'] ) ? $instance['link'] : __( 'New link', 'ppkas' );
		?>
		<p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
    <p>
      <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image URL:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_attr( $image ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>">
    </p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
    $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';

		return $instance;
	}

}

add_action( 'widgets_init', 'register_ppkas_small_banner_widget' );
  function register_ppkas_small_banner_widget() {
    register_widget( 'PPKAS_Banner_Widget' );
  }