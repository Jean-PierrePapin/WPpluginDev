<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://livres.io
 * @since      1.0.0
 *
 * @package    Rocket_Books
 * @subpackage Rocket_Books/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rocket_Books
 * @subpackage Rocket_Books/admin
 * @author     James Lecodeur <Ma-h3sW3YEWRip=i@5E#>
 */
if ( ! class_exists( 'Rocket_Books_Admin' ) ) {

	class Rocket_Books_Admin {

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $plugin_name    The ID of this plugin.
		 */
		private $plugin_name;

		/**
		 * The version of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $version    The current version of this plugin.
		 */
		private $version;

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 * @param      string    $plugin_name       The name of this plugin.
		 * @param      string    $version    The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {

			$this->plugin_name = $plugin_name;
			$this->version = $version;

		}

		/**
		 * Register the stylesheets for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles() {

			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in Rocket_Books_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Rocket_Books_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */

			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/rocket-books-admin.css', array(), $this->version, 'all' );

		}

		/**
		 * Register the JavaScript for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts() {

			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in Rocket_Books_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Rocket_Books_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */

			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/rocket-books-admin.js', array( 'jquery' ), $this->version, false );

		}

		/**
		 * Add admin menu for our plugin
		 */
		public function add_admin_menu() {

			// Top Level Menu
			/* add_menu_page(
				'Rocket Books Settings',
				'Rocket Books',
				'manage_options',
				'rocket-books',
				[
					$this, 
					'admin_page_display'
				],
				'dashicons-chart-pie',
				60
			); */



			// Sub Menu
			/* add_plugins_page(
				'Rocket Books Settings',
				'Rocket Books',
				'manage_options',
				'rocket-books',
				[
					$this, 
					'admin_page_display'
				]
			);
			*/
			add_submenu_page(
				'edit.php?post_type=book',
				'Rocket Books Settings Page',
				'Rocket Books',
				'manage_options',
				'rocket-books',
				[
					$this, 
					'admin_page_display'
				]
			);


		}

		/**
		 * Admin Page Display
		 */
		public function admin_page_display() {
			// Old method for saving options
			//include 'partials/rocket-books-admin-display-form-method.php';


			// Settings API
			include 'partials/rocket-books-admin-display.php';

		}

		/**
		 * All the hooks for admin_init
		 */
		public function admin_init() {

			// Add settings section
			$this->add_settings_section();

			// Add settings fields
			$this->add_settings_fields();

			// Save settings
			$this->save_fields();
		}

		/**
		 * Add settings section for plugin options
		 */
		public function add_settings_section() {


			add_settings_section(
				'rbr-general-section',
				'General Settings',
				function() {
					echo "<p>These are general settings for Rocket Books</p>";
				},
				'rbr-settings-page'
			);


			// Advance Section
			add_settings_section(
				'rbr-advance-section',
				'Advance Settings',
				function() {
					echo "<p>These are advance settings for Rocket Books</p>";
				},
				'rbr-settings-page'
			);


		}

		/**
		 * Add settings fields
		 */
		public function add_settings_fields() {

			add_settings_field(
				'rbr_test_field',
				'Test Field',
				[
					$this, 
					'markup_text_fields_cb'
				],
				'rbr-settings-page',
				'rbr-general-section',
				[
					'name'	=> 'rbr_test_field',
					'value' => get_option( 'rbr_test_field' )
				]
			);

			add_settings_field(
				'rbr_archive_column',
				'Archive Columns',
				[
					$this, 
					'markup_select_fields_cb'
				],
				'rbr-settings-page',
				'rbr-general-section',
				[
					'name'		=> 'rbr_archive_column',
					'value' 	=> get_option( 'rbr_archive_column' ),
					'options'	=> [
							'column-two'	=> __( 'Two Columns', 'rocket-books' ),
							'column-three'	=> __( 'Three Columns', 'rocket-books' ),
							'column-four'	=> __( 'Four Columns', 'rocket-books' ),
							'column-five'	=> __( 'Five Columns', 'rocket-books' )
					]
				]
			);

			add_settings_field(
				'rbr_advance_field1',
				'Advance Field 1',
				[
					$this, 
					'markup_text_fields_cb'
				],
				'rbr-settings-page',
				'rbr-advance-section',
				[
					'name'	=> 'rbr_advance_field1',
					'value' => get_option( 'rbr_advance_field1' )
				]
			);

			add_settings_field(
				'rbr_advance_field2',
				'Advance Field 2',
				[
					$this, 
					'markup_text_fields_cb'
				],
				'rbr-settings-page',
				'rbr-advance-section',
				[
					'name'	=> 'rbr_advance_field2',
					'value' => get_option( 'rbr_advance_field2' )
				]
			);



			/* add_settings_field(
				'rbr_advance_field1',
				'Advance Field 2',
				function() {
					echo '<input 
							type="text" 
							name="rbr_advance_field1"
							value="' . esc_html( get_option( 'rbr_advance_field1' ) ) . '"
							/>';
				},
				'rbr-settings-page',
				'rbr-advance-section'
			);

			add_settings_field(
				'rbr_advance_field2',
				'Advance Field 2',
				function() {
					echo '<input 
							type="text" 
							name="rbr_advance_field2"
							value="' . esc_html( get_option( 'rbr_advance_field2' ) ) . '"
							/>';
				},
				'rbr-settings-page',
				'rbr-advance-section'
			); */
			
		}

		/**
		 * Save Settings Fields
		 */
		public function save_fields() {

			register_setting(
				'rbr-settings-page-options-group',
				'rbr_test_field',
				[
					'sanitize_callback'	=> 'sanitize_text_field'
				]
			);

			register_setting(
				'rbr-settings-page-options-group',
				'rbr_advance_field1',
				[
					'sanitize_callback'	=> 'sanitize_text_field'
				]
			);

			register_setting(
				'rbr-settings-page-options-group',
				'rbr_advance_field2',
				[
					'sanitize_callback'	=> 'absint'
				]
			);

			register_setting(
				'rbr-settings-page-options-group',
				'rbr_archive_column'
			);

		}

		/**
		 * Markup for Text Fields
		 */
		public function markup_text_fields_cb( $args ) {

			if ( ! is_array( $args ) ) {
				return null;
			}

			$name = ( isset( $args['name'] ) ) ? esc_html( $args['name'] ) : '';
			$value = ( isset( $args['value'] ) ) ? esc_html( $args['value'] ) : '';
			?>

			<input 
				type="text" 
				name="<?php echo $name; ?>"
				value="<?php echo $value; ?>"
				class="field-<?php echo $name; ?>"
				/>

			<?php
		}
		

		/**
		 * Markup for Select Fields
		 */
		public function markup_select_fields_cb( $args ) {

			if ( ! is_array( $args ) ) {
				return null;
			}

			$name = ( isset( $args['name'] ) ) ? esc_html( $args['name'] ) : '';
			$value = ( isset( $args['value'] ) ) ? esc_html( $args['value'] ) : '';
			$options = ( 
				isset( $args['options'] )
				&&
				is_array( $args['options'] )
				) ? $args['options'] : [];

			?>

			<select 
				name="<?php echo $name; ?>"
				class="field-<?php echo $name; ?>"
			>
				<?php 
				foreach ( $options as $option_key => $option_label ) {
					echo "<option
					value='{$option_key}'
					" . selected( $option_key, $value ) . ">
					{$option_label}</option>";
				}
				?>	
			</select>

			<?php
		}

		/**
		 * Add Plugin Action Links
		 */
		public function add_plugin_action_links( $links ) {
			
			$links[] = '<a href="'. esc_url( get_admin_url(null, 'edit.php?post_type=book&page=rocket-books') ) .'">Settings</a>';
				
			return $links;
		}

		/**
		 * To add Plugin Menu and Settings page
		 */
		public function plugin_menu_settings_using_helper() {

			require_once ROCKET_BOOKS_BASE_DIR . 'vendor/boo-settings-helper/class-boo-settings-helper.php';

			$rocket_books_settings = [
				'tabs'		=> true,
				'prefix'	=> 'rbr_',
				'menu'		=> [
					'slug'			=> 'rocket-books',
					'page_title'	=> __( 'Rocket Books Settings', 'rocket-books' ),
					'menu_title'	=> __( 'Rocket Books', 'rocket-books' ),
					'parent'		=> 'edit.php?post_type=book',
					'submenu'		=> true
				],
				'sections' 	=> [
					// General Section
					[
						'id'	=> 'rbr_general_section',
						'title'	=> __( 'General Section', 'rocket-books' ),
						'desc'	=> __( 'These are general settings', 'rocket-books' )
					],
					// Advance Section
					[
						'id'	=> 'rbr_advance_section',
						'title'	=> __( 'Advance Section', 'rocket-books' ),
						'desc'	=> __( 'These are advance settings', 'rocket-books' )
					],
				],
				'fields'	=> [
					// fieldss for General Section
					'rbr_general_section'	=> [
						[
							'id'	=> 'test_field',
							'label' => __( 'Test Field', 'rocket-books' ),
						],
						[
							'id'	=> 'archive_column',
							'label' => __( 'Archive column', 'rocket-books' ),
							'type'	=> 'select',
							'options'	=> [
								'column-two'	=> __( 'Two Columns', 'rocket-books' ),
								'column-three'	=> __( 'Three Columns', 'rocket-books' ),
								'column-four'	=> __( 'Four Columns', 'rocket-books' ),
								'column-five'	=> __( 'Five Columns', 'rocket-books' )
							]
						],
						[
							'id'		=> 'media_test',
							'label'		=> __( 'Media', 'rocket-books' ),
							'desc'		=> __( 'Media', 'rocket-books' ),
							'type'		=> 'media',
							'default'	=> '',
							'options'	=> [
								'btn'		=> 'Get the image',
								'width'		=> 900,
								'height'	=> 300,
								'max_width'	=> 900
							]
						]


					],
					'rbr_advance_section'	=> apply_filters( 'rbr/admin/settings/advance/fields' , [
						[
							'id'	=> 'advance_field1',
							'label' => __( 'Advance Field 1', 'rocket-books' ),
						],
						[
							'id'	=> 'advance_field2',
							'label' => __( 'Advance Field 2', 'rocket-books' ),
						]
					] )
				],
				'links'    => array(
					'plugin_basename' => plugin_basename( ROCKET_BOOKS_BASE_FILE ),
					'action_links'    => true,
				),
			];



			new Boo_Settings_Helper( $rocket_books_settings );
		}

	}

}