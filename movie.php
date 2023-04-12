<?php

/**
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           Movie
 *
 * @wordpress-plugin
 * Plugin Name:       Movie
 * Description:       WP Assignment for Noogla Agency
 * Version:           1.0.0
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       movie
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define plugin constants
 */
define( 'PLUGIN_MAIN_FILE', __FILE__ );
define( 'MOVIE_VERSION', '1.0.0' );

function activation() {
	require plugin_dir_path( __FILE__ ) . 'includes/Activator.php';
	Movie\Includes\Activator::activate();
}
function deactivation() {
	require plugin_dir_path( __FILE__ ) . 'includes/Deactivator.php';
	Movie\Includes\Deactivator::deactivate();
}
register_activation_hook( __FILE__, 'activation' );
register_deactivation_hook( __FILE__, 'deactivation' );

add_action( 'init', function() {
	if ( ! defined( 'Movie_Plugin_Loaded' ) ) {
		require plugin_dir_path( __FILE__ ) . 'includes/Controller.php';
		new Movie\Includes\Controller();
    }
});