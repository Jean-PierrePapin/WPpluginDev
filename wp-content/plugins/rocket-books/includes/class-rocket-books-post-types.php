<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://livres.io
 * @since      1.0.0
 *
 * @package    Rocket_Books
 * @subpackage Rocket_Books/public
 */

/**
 * Functionality for our Custom Post Types
 *
 *
 * @package    Rocket_Books
 * @subpackage Rocket_Books/public
 * @author     James Lecodeur <Ma-h3sW3YEWRip=i@5E#>
 */
class Rocket_Books_Post_Types {

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


	private $template_loader;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->template_loader = $this->get_template_loader();
	}

	/**
	 * Hooked into 'init' action hook
	 */	
	public function init() {

		$this->register_cpt_book();
		$this->register_taxonomy_genre();
	}


	/**
	 * Registering Custom Post Type: Book
	 */
	public function register_cpt_book() {

		register_post_type( 'book', [
			'description'		=> __( 'Books', 'rocket-books' ),
			'labels'			=> [
				'name'                  => _x( 'Books', 'Post type general name', 'rocket-books' ),
				'singular_name'         => _x( 'Book', 'Post type singular name', 'rocket-books' ),
				'menu_name'             => _x( 'Books', 'Admin Menu text', 'rocket-books' ),
				'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'rocket-books' ),
				'add_new'               => __( 'Add New', 'rocket-books' ),
				'add_new_item'          => __( 'Add New Book', 'rocket-books' ),
				'new_item'              => __( 'New Book', 'rocket-books' ),
				'edit_item'             => __( 'Edit Book', 'rocket-books' ),
				'view_item'             => __( 'View Book', 'rocket-books' ),
				'search_items'          => __( 'Search Books', 'rocket-books' ),
				'not_found'             => __( 'No books found.', 'rocket-books' ),
				'not_found_in_trash'    => __( 'No books found in Trash.', 'rocket-books' ),
				'parent_item_colon'     => __( 'Parent Books:', 'rocket-books' ),
				'all_items'             => __( 'All Books', 'rocket-books' )
			],
			'public'             	=> true,
			'hierarchical'       	=> false,
			'exclude_from_search'	=> false,
			'publicly_queryable' 	=> true,
			'show_ui'            	=> true,
			'show_in_menu'      	=> true,
			'show_in_nav_menu'		=> true,
			'show_in_admin_bar'		=> true,
			'menu_position'     	=> 20,
			'menu_icon' 			=> 'dashicons-book',
			'capability_type'    	=> 'post',
			'map_meta_cap'			=> null,
			'supports'           	=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
			'register_meta_box_cb'	=> [$this, 'register_metabox_book'],
			'taxonomies'			=> [ 'genre' ],	
			'has_archive'        	=> true,		
			'rewrite'            	=> array( 
				'slug' 			=> 'book',
				'with_front'	=> true,
				'feeds'			=> true,
				'pages'			=> false
			),
			'query_var'          	=> true,
			'can_export'			=> true,
			'show_in_rest'			=> true,
		] );
	}

	/**
	 * Register custom taxonomy
	 */
	public function register_taxonomy_genre() {

		register_taxonomy( 'genre', ['book'], [
			'description'			=> 'Genre',
			'labels'				=> [
				'name'                       => _x( 'Genres', 'taxonomy general name', 'rocket-books' ),
				'singular_name'              => _x( 'Genre', 'taxonomy singular name', 'rocket-books' ),
				'search_items'               => __( 'Search Genres', 'rocket-books' ),
				'popular_items'              => __( 'Popular Genres', 'rocket-books' ),
				'all_items'                  => __( 'All Genres', 'rocket-books' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'edit_item'                  => __( 'Edit Genre', 'rocket-books' ),
				'view_item'					 => __( 'View Genre', 'rocket-books' ),
				'update_item'                => __( 'Update Genre', 'rocket-books' ),
				'add_new_item'               => __( 'Add New Genre', 'rocket-books' ),
				'new_item_name'              => __( 'New Genre Name', 'rocket-books' ),
				'separate_items_with_commas' => __( 'Separate Genres with commas', 'rocket-books' ),
				'add_or_remove_items'        => __( 'Add or remove Genres', 'rocket-books' ),
				'choose_from_most_used'      => __( 'Choose from the most used Genres', 'rocket-books' ),
				'not_found'                  => __( 'No Genres found.', 'rocket-books' ),
			],
			'public'				=> true,
			'show_ui'               => true,
			'show_in_nav_menus'		=> true,
			'show_tagcloud'			=> true,
			'meta_box_cb'			=> null,
			'show_admin_column'     => true,
			'hierarchical'          => false,
			'query_var'             => true,
			'rewrite'               => array( 
				'slug' 			=> 'genre',
				'with_front'	=> true,
				'hierarchical'	=> true,
			),
			'capabilities'			=> [],
			'show_in_rest'			=> true,
		] );
	}

	/**
	 * Filter content for CPT: Book
	 * @param	 	mixed		$the_content		the content of the post/post type.
	 */
	public function content_single_book($the_content) {

		// Filter contents for just Books
		if ( in_the_loop() && is_singular( 'book' ) ) {

			// return "<pre>" . $the_content . "</pre>";

			ob_start();
			include ROCKET_BOOKS_BASE_DIR . 'templates/book-content.php';
			return ob_get_clean();

		}

		return $the_content;

	}

	/**
	 * Single Template for CPT: book
	 */
	public function single_template_book( $template ) {

		if ( is_singular( 'book' ) ) {


			// template for CPT book


			return $this->template_loader->get_template_part( 'single', 'book', false );
		}


		return $template;
	}

	/**
	 * Archive Template for CPT: book
	 */
	public function archive_template_book( $template ) {

		if ( is_post_type_archive( 'book' ) || is_tax( 'genre' ) ) {


			// template for CPT book

			return $this->template_loader->get_template_part( 'archive', 'book', false );
		}


		return $template;
	}

	public function get_template_loader() {

		require_once ROCKET_BOOKS_BASE_DIR . 'public/class-rocket-books-template-loader.php';

		return new Rocket_Books_Template_Loader();

	}

	/**
	 * Register Metabox for CPT: Book
	 */
	public function register_metabox_book( $post ) {

		add_meta_box(
			'book-details',
			__( 'Book Details', 'rocket-books' ),
			[$this, 'book_metabox_display_cb'],
			'book',
			'normal',
			'default'
		);

	}


	/**
	 * Display for Metabox for CPT: book
	 */
	public function book_metabox_display_cb( $post ) {

		echo 'Here, we shall display fields';

	}



}
