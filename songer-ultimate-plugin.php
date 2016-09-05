<?php
/**
 * @link              http://austinvernsonger.github.io
 * @since             1.0.0
 * @package           Songer_Ultimate_Plugin
 * @wordpress-plugin
 * Plugin Name:       Songer Ultimate Plugin
 * Plugin URI:        http://github.com/austinvernsonger/songer-ultimate-plugin
 * Description:       Manages Performance, Security, Maintenance.
 * Version:           1.0.0
 * Author:            Austin Songer
 * Author URI:        http://austinvernsonger.github.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       songer-ultimate-plugin
 * Domain Path:       /languages */

/*#########################################################*/ 
/*#########################################################*/

include dirname(__FILE__) . '/inc/';
include dirname(__FILE__) . '/inc/';
/* include dirname(__FILE__) . '/inc/'; */

/*#########################################################*/
/*#########################################################*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) { die; }
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-songer-ultimate-plugin-activator.php
 */
function activate_songer_ultimate_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-songer-ultimate-plugin-activator.php';
	Songer_Ultimate_Plugin_Activator::activate(); }
/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-songer-ultimate-plugin-deactivator.php
 */
function deactivate_songer_ultimate_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-songer-ultimate-plugin-deactivator.php';
	Songer_Ultimate_Plugin_Deactivator::deactivate(); }
register_activation_hook( __FILE__, 'activate_songer_ultimate_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_songer_ultimate_plugin' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-songer-ultimate-plugin.php';
/**
 * Begins execution of the plugin.
 * Since everything within the plugin is registered via hooks, then kicking off the plugin from this point in the 
 * file does not affect the page life cycle.
 * @since    1.0.0
 */
function run_songer_ultimate_plugin() {
	$plugin = new Songer_Ultimate_Plugin();
	$plugin->run(); }
run_songer_ultimate_plugin();
