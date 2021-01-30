<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://livres.io
 * @since      1.0.0
 *
 * @package    Rocket_Books
 * @subpackage Rocket_Books/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Rocket_Books
 * @subpackage Rocket_Books/includes
 * @author     James Lecodeur <Ma-h3sW3YEWRip=i@5E#>
 */
if ( ! class_exists( 'Rocket_Books_Deactivator' ) ) {
	class Rocket_Books_Deactivator {

		/**
		 * Short Description. (use period)
		 *
		 * Long Description.
		 *
		 * @since    1.0.0
		 */
		public static function deactivate() {

			// Unregister CPT
			unregister_post_type( 'book' );

			// Un-Register Taxonomy
			unregister_taxonomy( 'genre' );

			// Flush rewrite rules
			flush_rewrite_rules();

		}

	}
}