<?php
/**
 * Plugin Name: Mk Widget
 * Plugin URI: http://www.mayankpatel104.blogspot.in/
 * Description: MK Widget
 * Version: 1.0
 * Author: Mayank Patel
 * Author URI: http://www.mayankpatel104.blogspot.in/
 * License: A "mk-widget"
 */
  
// Creating the widget 
class mk_widget extends WP_Widget
{
	function __construct()
	{
		parent::__construct('mk_widget',__('MK Widget', 'mk_widget_domain'), array( 'description' => __( 'Sample Widget By Mayank Patel', 'mk_widget_description' ),));
	}

	public function widget($args,$instance)
	{
		$title = apply_filters('widget_title',$instance['title']);
		echo $args['before_widget'];
		if(!empty($title))
		{
			echo $args['before_title'] . $title . $args['after_title'];
		}
		echo __('Hello, World Frontend Side!','mk_widget_description');
		echo $args['after_widget'];
	}
	
	public function form($instance)
	{
		if(isset($instance['title']))
		{
			$title = $instance['title'];
		}
		else
		{
			$title = __('New title','mk_widget_description');
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php 
	}
	public function update($new_instance,$old_instance)
	{
		$instance = array();
		$instance['title'] = (!empty($new_instance['title']))?strip_tags($new_instance['title']):'';
		return $instance;
	}
}

function wpb_load_widget()
{
	register_widget( 'mk_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
?>