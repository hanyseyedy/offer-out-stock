<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              hanyseyedy.ir
 * @since             1.2
 * @package           Offer_Out_Stock
 *
 * @wordpress-plugin
 * Plugin Name:       offer out stock plugin
 * Plugin URI:        https://pooyeshtech.ir
 * Description:       this is a wordpress plugin for display offer that is product out of stock.Display Box: "This product is currently out of stock. we have other suggestions for you". Then you can go to relevant category.
 * Version:           1.4
 * Author:            hanyseyedy
 * Author URI:        hanyseyedy.ir
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       offer-out-stock
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-offer-out-stock-activator.php
 */
function activate_offer_out_stock() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-offer-out-stock-activator.php';
	Offer_Out_Stock_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-offer-out-stock-deactivator.php
 */
function deactivate_offer_out_stock() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-offer-out-stock-deactivator.php';
	Offer_Out_Stock_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_offer_out_stock' );
register_deactivation_hook( __FILE__, 'deactivate_offer_out_stock' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-offer-out-stock.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_offer_out_stock() {

	$plugin = new Offer_Out_Stock();
	$plugin->run();

}
run_offer_out_stock();
