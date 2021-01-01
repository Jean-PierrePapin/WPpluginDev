<?php

/**
 * Register Widget : Books List
 * 
 * @package    Rocket_Books
 * @subpackage Rocket_Books/includes
 * @author     Rao <rao@booskills.com>
 */

if ( ! class_exists( 'Rocket_Books_Widget_Books_List' ) ) {

	class Rocket_Books_Widget_Books_List extends WP_Widget {

		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			$widget_ops = array( 
				'classname' => 'rbr_books_list_class',
				'description' => __( 'Display Rocket Books List', 'rocket-books') ,
			);
			parent::__construct( 'rbr_books_list', __( 'Books List', 'rocket-books' ), $widget_ops );
		}

		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {
			// outputs the content of the widget
			
			/* 
			$args array_keys
			array (
				0 => 'name',
				1 => 'id',
				2 => 'description',
				3 => 'class',
				4 => 'before_widget',
				5 => 'after_widget',
				6 => 'before_title',
				7 => 'after_title',
				8 => 'before_sidebar',
				9 => 'after_sidebar',
				10 => 'widget_id',
				11 => 'widget_name',
			); */
			$title = isset( $instance['title'] ) ? $instance['title'] : '';
			

			echo $args['before_widget'];
			echo $args['before_title'];
			// Title will be displayed here
			echo esc_html( $title );

			echo $args['after_title'];

			/* echo "<pre>";
			var_export( $instance );

			var_export( get_option( 'widget_rbr_books_list', true ) );
			echo "</pre>"; */

			echo $args['after_widget'];

			//echo "This is widget method";
		}

		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ) {
			// outputs the options form on admin
			// echo "This is form method";

			$title = isset( $instance['title'] ) ? $instance['title'] : '';

			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"><?php _e( 'Title:', 'rocket-books' ); ?></label>
				<input type="text" class="widefat"
					   id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
					   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
					   value="<?php echo esc_html( $title ); ?>"
				>
			</p>
			<?php
		}

		/**
		 * Processing widget options on save
		 *
		 * @param array $new_instance The new options
		 * @param array $old_instance The previous options
		 *
		 * @return array
		 */
		public function update( $new_instance, $old_instance ) {
			// processes widget options to be saved

			// Sanitization of $new_instance

			$sanitized_instance = $new_instance;

			return $sanitized_instance;
		}
	}

}