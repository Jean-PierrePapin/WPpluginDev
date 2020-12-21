<?php

/**
 * Plugin Shortcode Functionality
 * 
 * @package     Rocket_Books
 * @subpackage  Rocket_Books/includes
 * @author      Rao <rao@booskills.com>
 */
if ( ! class_exists( 'Rocket_Books_Shortcodes' ) ) {

    class Rocket_Books_Shortcodes {

        /**
         * The ID of this plugin.
         * 
         * @since   1.0.0
         * @access  private
         * @var     string $plugin_name The ID of this plugin.
         */
        private $plugin_name;

        /**
         * The version of this plugin.-white
         * 
         * @since   1.0.0
         * @access  private
         * @var     string $version The current version of this plugin.
         */
        private $version;

        /**
         * Initialize the class and set its properties
         * 
         * @since   1.0.0
         * 
         * @param       string $plugin_name The name of the plugin.
         * @param       string $version The version of this plugin.
         */
        public function __construct( $plugin_name, $version ) {

            $this->plugin_name = $plugin_name;
            $this->version     = $version;

            $this->setup_hooks();

        }

        /**
         * Setup action/filter hooks
         */
        public function setup_hooks() {

            add_action( 'wp_enqueue_scripts', [ $this, 'register_style' ] );

        }
        
        /**
         * Register Placeholder Style
         */
        public function register_style() {

            wp_register_style(
                $this->plugin_name .  '-shortcodes',
                ROCKET_BOOKS_PLUGIN_URL . 'public/css/rocket-books-shortcodes.css'
            );

        }

        
        /**
         * Shortcode for Books List
         * 
         * Usage: [book_list limit=5 column=3] These are contents of shortcode [/book_list]
         */
        public function book_list( $atts, $content = null ) {

            $atts = shortcode_atts(
                [
                    'limit'     => get_option( 'posts_per_page' ),
                    'column'    => 3,
                    'bgcolor'   => '#f6f6f6'
                ],
                $atts,
                'book_list'
            );


            $loop_args = [
                'post_type'         => 'book',
                'posts_per_type'    => $atts['limit'],
            ];

            $loop = new WP_Query( $loop_args );

            $grid_column = rbr_get_column_class( $atts['column'] );

            // Step 1: Register a placeholder stylesheet
            // Step 2: Build up CSS
            $css = ".cpt-cards.cpt-shortcodes .cpt-card{background-color:{$atts['bgcolor']};}";

            // Step 3: Add CSS to placeholder style
            wp_add_inline_style(
                $this->plugin_name . '-shortcodes',
                $css
            );

            // Step 4: Enqueue Style
            wp_enqueue_style(
                $this->plugin_name . '-shortcodes'
            );


            /**
             * When using the template_loader method
             */
            //$template_loader = rbr_get_template_loader();

            ob_start();
            ?>
           

            <div class="cpt-cards cpt-shortcodes <?php echo sanitize_html_class( $grid_column ); ?>">
                <?php
                // Start the loop.
                while ( $loop->have_posts() ) :
                    $loop->the_post();
                    /**
                     * When using the template_loader method
                     */
                    //$template_loader->get_template_part( 'archive/content', 'book' );
                    include ROCKET_BOOKS_BASE_DIR . 'templates/archive/content-book.php';

                // End the loop.
                endwhile;
                /* Restore original post */
                wp_reset_postdata();
                
                ?>
            </div>
            

            <?php
            return ob_get_clean();
        }


    }


}