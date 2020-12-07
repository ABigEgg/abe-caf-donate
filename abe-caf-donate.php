<?php 
/** 
 * Plugin name: A Big Egg - CAF donation plugin
 * Description: This is a simple plugin that makes it easier to generate donation links for CAF
 * Author: A Big Egg
 * Version: 1.0
 * Author URI: https://abigegg.com
 */
add_action( 'admin_menu', 'abe_caf_register_options_page' );


/**
 * Generate a CAF donation link and return the URL. 
 * If no URL is set (in Settings > CAF Donations), this will return false
 *
 * @param  mixed $amount  The amount to be donated
 * @param  mixed $regular Should this be a regular (recurring) donation? 
 * @return string|false
 */
function abe_caf_get_donation_link( $amount = 0, $regular = false ) {
    $url = abe_caf_get_donation_url();

    if ( ! $url ) {
        return false;
    }
    
    $args = [
        'caf_donationamount' => floatval( $amount ) ?? 0,
        'caf_paymenttype'    => $regular ? 'regular' : 'single' 
    ];

    return add_query_arg( $args, $url );
}

/**
 * Register the options page for the plugin
 *
 * @return void
 */
function abe_caf_register_options_page() {
    add_options_page( 'CAF Donations', 'CAF Donations', 'manage_options', 'abe-caf', '_abe_caf_options_page' );
}

add_action( 'admin_init', 'abe_caf_register_settings' );

/**
 * Register the settings for the plugin
 *
 * @return void
 */
function abe_caf_register_settings() {
    add_option( 'abe_caf_url', '' );
    register_setting( 'abe_caf', 'abe_caf_url', [
        'sanitize_callback' => 'sanitize_url'
    ] );
}

/**
 * Render the options page for the plugin
 *
 * @return void
 */
function _abe_caf_options_page() {
?>
<div>
    <?php screen_icon(); ?>
    <h2>A Big Egg - CAF Donations</h2>
    <form method="post" action="options.php">
    <?php settings_fields( 'abe_caf' ); ?>
    <p>Enter the URL of your CAF donation page, it should look something like this: https://cafdonate.cafonline.org/10805</p>
    <table>
    <tr valign="top">
    <th scope="row"><label for="abe_caf_url">CAF donation page URL</label></th>
    <td><input type="text" id="abe_caf_url" name="abe_caf_url" value="<?php echo get_option('abe_caf_url'); ?>" /></td>
    </tr>
    </table>
    <?php submit_button(); ?>
    </form>
</div>
<?php
}

/**
 * Get the charity's CAF url
 *
 * @return string
 */
function abe_caf_get_donation_url() {
    return untrailingslashit( get_option( 'abe_caf_url' ) );
}
