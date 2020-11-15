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

        $html .= "<li>{$label}: $value</li>";
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