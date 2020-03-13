<?php
/**
 * Plugin Name: SHC Presentations
 * Description: A WordPress plugin from Servant's Heart Camp for displaying dynamic presentations using Reveal.js.
 *
 * Version:     1.1.0
 *
 * Author:      Dan Brubaker
 * Author URI:  https://brubakerservices.org/
 *
 * @package    ServantsHeartCamp\SHCPresentations
 *
 * Text Domain: shc-presentations
 */

// Initialize Constants.
define( 'SHCP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SHCP_PLUGIN_TEXT_DOMAIN', 'shc-presentations' );
define( 'SHCP_PLUGIN_VERSION', '1.1.0' );

require_once __DIR__ . '/includes/load-includes.php';
require_once __DIR__ . '/includes/load-assets.php';

register_activation_hook(
	__FILE__,
	function() {

		// Create a flag to reset permalinks after the "Presentation" custom post type is registered.
		if ( ! get_option( 'shcp_flush_rewrite_rules_flag' ) ) {
			add_option( 'shcp_flush_rewrite_rules_flag', true );
		}
	}
);
