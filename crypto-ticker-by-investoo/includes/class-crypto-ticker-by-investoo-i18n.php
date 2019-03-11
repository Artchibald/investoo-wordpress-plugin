<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       archibaldbutler.com
 * @since      1.0.0
 *
 * @package    Crypto_Ticker_By_Investoo
 * @subpackage Crypto_Ticker_By_Investoo/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Crypto_Ticker_By_Investoo
 * @subpackage Crypto_Ticker_By_Investoo/includes
 * @author     investoo <archie@archibaldbutler.com>
 */
class Crypto_Ticker_By_Investoo_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'crypto-ticker-by-investoo',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
