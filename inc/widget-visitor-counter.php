<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 * 
 * Widget: Visitor Counter
 */
class Visitor_Counter_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'visitor_counter_widget',
			__( '&bull; Best View, Visitor Counter and Last Update', 'ukmtheme' ),
			array( 'description' => __( 'Widget for best view, visitor counter and last update statement', 'ukmtheme' ), )
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
    
    if ( ! isset( $instance['counter'] ) ) {
      $counter = $instance['counter'];
    }
    
		?>

      <p style="margin-top: 0;"><?php _e( 'This site can be accessed using smart devices. Best viewed using the latest versions of web browsers on a minimum resolution of 1024x768.', 'ukmtheme' ); ?></p>
      <!-- BEGIN: Powered by Supercounters.com -->
      <script type="text/javascript" src="http://widget.supercounters.com/texthit.js"></script>
      <script type="text/javascript">
        var sc_texthit_var = sc_texthit_var || [];sc_text_hit(<?php echo $instance['counter']; ?>,
        "<?php _e( 'Visitors','ukmtheme' ); ?>&nbsp;.&nbsp;<?php _e( 'View Full Statistic','ukmtheme' ); ?>",
        "ffffff"
        );
      </script><br>
      <?php _e( 'Last Update:&nbsp;', 'ukmtheme' ); ?><?php echo date( 'd/m/Y', strtotime("-3 days") ); ?><br/>
      <!-- END: Powered by Supercounters.com -->  
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
    
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Visitor Counter', 'ukmtheme' );
    
    if ( isset( $instance['counter'] ) ) {
      $counter = $instance['counter'];
    }
    
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
    <p>
    <label for="<?php echo $this->get_field_id( 'counter' ); ?>"><?php _e( 'Counter ID:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'counter' ); ?>" name="<?php echo $this->get_field_name( 'counter' ); ?>" type="text" value="<?php echo esc_attr( $counter ); ?>">
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
    $instance['counter'] = ( ! empty( $new_instance['counter'] ) ) ? strip_tags( $new_instance['counter'] ) : '';
    
		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_ukmtheme_visitor_counter_widget() {
  register_widget( 'Visitor_Counter_Widget' );
}
add_action( 'widgets_init', 'register_ukmtheme_visitor_counter_widget' );