<?php 
/**
 * Template part for the Meta Fields
 */

?>

<ul class="book-meta-fields">
    <!-- Here w'll display our custom meta -->
    <?php
    $meta_fields = [
        'rbr_book_pages'    => __( 'Pages', 'rocket-books' ),
        'rbr_book_format'   => __( 'Format', 'rocket-books' ),
        'rbr_is_featured'   => __( 'Is Featured', 'rocket-books' ),
    ];
    
    $meta_icons = [
        'rbr_book_pages'    => '<i class="fas fa-file-invoice"></i>',
        'rbr_book_format'   => '<i class="fas fa-book-reader"></i>',
        'rbr_is_featured'   => '<i class="fas fa-grin-stars"></i>',
    ];

    $html = '';

    foreach ( $meta_fields as $meta_key => $label ) {
        // first: meta value
        $value =  esc_html( 
            get_post_meta( 
                get_the_ID(), 
                $meta_key, 
                true   
            )
        ); 

        // if its not empty, then we're going to build html
        if ( empty( $value ) ) {
            continue;
        }

        $html .= "<li>{$meta_icons[$meta_key]} {$label}: $value</li>";
    }
    
    echo $html;

    ?>
   <!--  <li>Pages:
        <?php echo esc_html(
            get_post_meta(
                get_the_ID(),
                'rbr_book_pages',
                true
            )
        ); ?>
    </li>
    <li>Format:
        <?php echo esc_html(
            get_post_meta(
                get_the_ID(),
                'rbr_book_format',
                true
            )
        ); ?>
    </li>
    <li>Is Featured:
        <?php echo esc_html(
            get_post_meta(
                get_the_ID(),
                'rbr_is_featured',
                true
            )
        ); ?>
    </li> -->
</ul>
<?php do_action( 'rbr_single_book_meta_after' ); ?>