<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://livres.io
 * @since      1.0.0
 *
 * @package    Rocket_Books
 * @subpackage Rocket_Books/admin/partials
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( isset( $_POST ) && ! empty( $_POST ) ) {
    //var_dump($_POST);

   //add_option( 'rbr-test-field', $_POST['rbr-test-field'] );
    update_option( 'rbr-test-field', sanitize_text_field( $_POST['rbr-test-field'] ) );
}

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
    <h1>Rocket Books Settings</h1>

    <form method="post" action="">
        
        <table class="form-table">

            <tbody>
                <tr>
                    <th scope="row"><label for="rbr-test-field">Test Field</label></th>
                    <td>
                        <input name="rbr-test-field" 
                               type="text" 
                               id="rbr-test-field" 
                               value="<?php echo get_option( 'rbr-test-field' ); ?>" 
                               class="regular-text">
                    </td>
                </tr>
            </tbody>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
