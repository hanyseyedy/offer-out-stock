<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       hanyseyedy.ir
 * @since      1.0.0
 *
 * @package    Offer_Out_Stock
 * @subpackage Offer_Out_Stock/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Offer_Out_Stock
 * @subpackage Offer_Out_Stock/includes
 * @author     hanyseyedy <info@pooyeshtech.ir>
 */
class Offer_Out_Stock_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'offer-out-stock',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
