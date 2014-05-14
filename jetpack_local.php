<?php
/**
 * Jetpack Local.
 *
 * Enables The Use Of Jetpack On Local Hosts Without Connection To The Internet
 * 
 * @package   Jetpack Local
 * @author    Brad Dalton brad@wpsites.net
 * @license   GPL-2.0+
 * @link      http://wpsites.net
 * @copyright 2014 WP Sites
 *
 * @wordpress-plugin
 * Plugin Name:       Jetpack Local
 * Plugin URI:        @TODO
 * Description:       @TODO
 * Version:           1.0.0
 * Author:            Brad Dalton
 * Author URI:        http://wpsites.net
 * Text Domain:       plugin-name-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/braddalton
 * WordPress-Plugin-Boilerplate: v2.6.1
 */


if ( ! defined( 'WPINC' ) ) {
	die;
}


require_once( plugin_dir_path( __FILE__ ) . 'public/class-jetpack-local.php' );

register_activation_hook( __FILE__, array( 'jetpack-local', 'activate' ) );

register_deactivation_hook( __FILE__, array( 'jetpack-local', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'Jetpack_Local', 'get_instance' ) );

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'jetpack-local-admin.php' );
	add_action( 'plugins_loaded', array( 'Jetpack_Local', 'get_instance' ) );

}

add_filter( 'jetpack_development_mode', '__return_true' );
