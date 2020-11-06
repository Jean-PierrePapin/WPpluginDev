<?php
// IF this file is called directly, abort.-white
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

?>

<div class="book-content" style="background-color: lightskyblue;">
    <?php echo get_the_content(); ?>
</div>