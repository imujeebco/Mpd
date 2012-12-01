<?php
// Search Experts
class Widget_Search_Experts extends WP_Widget {

	function Widget_Search_Experts() {
		$widget_ops = array('description' => __( "About this blog." ), 'classname' => 'widget-search_experts' );
		$this->WP_Widget('search_experts', __('Search_Experts'), $widget_ops);
	}

	function widget($args, $instance) {
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Search_Experts') : $instance['title']);
		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title;
?>
	<?php theme_get_search_form(); ?>
<?php
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	function form($instance) {
		$title = esc_attr($instance['title']);
		?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("Widget_Search_Experts");'));


?>