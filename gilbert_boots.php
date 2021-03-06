<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://hernandochaves.com
 * @since             1.0.0
 * @package           Gilbert_boots
 *
 * @wordpress-plugin
 * Plugin Name:       Gilbert Bootstrap
 * Plugin URI:        http://chaves.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Hernando J Chaves
 * Author URI:        http://hernandochaves.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gilbert_boots
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) 
{
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */

global $wpdb;

// define( 'PLUGIN_NAME_VERSION', '1.0.0' );
define( 'GIL_DIR_PATH',plugin_dir_path( __FILE__ ));
define( 'GIL_DIR_URL',plugin_dir_url( __FILE__ ));
define( 'GIL_TABLE',"{$wpdb->prefix}gilbert_boots");

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gilbert_boots-activator.php
 */
function activate_gilbert_boots() 
{
	require_once GIL_DIR_PATH . 'includes/class-gilbert_boots-activator.php';
	Gilbert_boots_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gilbert_boots-deactivator.php
 */
function deactivate_gilbert_boots() 
{
	require_once GIL_DIR_PATH . 'includes/class-gilbert_boots-deactivator.php';
	Gilbert_boots_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gilbert_boots' );
register_deactivation_hook( __FILE__, 'deactivate_gilbert_boots' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require GIL_DIR_PATH . 'includes/class-gilbert_boots.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gilbert_boots() 
{

	$plugin = new Gilbert_boots();
	$plugin->run();

}
run_gilbert_boots();
