<?php 

// Creating the widget 
class wpfl_social_profiles_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
    // Base ID of your widget
    'wpfl_social_profiles_widget', 

    // Widget name will appear in UI
    __('WPFL Social Profiles', 'wpfl_social_profiles'), 

    // Widget description
    array( 'description' => __( 'Display your social profile links', 'wpfl_social_profiles' ), ) 
    );
  }

  // Creating widget front-end
  // This is where the action happens
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
    
    echo add_wpfl_profile_icons( '', true, true );
    echo $args['after_widget'];
  }

  // Widget Backend 
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }  else {
      $title = __( 'New title', 'wpfl_social_profiles' );
    }
    // Widget admin form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php 
  }

  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
  }
} // Class wpfl_social_profiles_widget ends here

// Register and load the widget
function wpfl_load_social_profiles_widget() {
	register_widget( 'wpfl_social_profiles_widget' );
}
add_action( 'widgets_init', 'wpfl_load_social_profiles_widget' );