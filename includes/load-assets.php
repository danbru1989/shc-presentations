<?php
/**
 * Loads the Assets.
 *
 * @package      ServantsHeartCamp\SHCPresentations
 * @author       Dan Brubaker
 * @since        1.0.0
 **/

/**
 * Remove all theme scripts and styles on Presentations.
 */
add_action(
	'wp_enqueue_scripts',
	function() {

		if ( is_singular( 'presentation' ) ) {

			global $wp_scripts;
			global $wp_styles;

			$wp_scripts->queue = array();
			$wp_styles->queue  = array();
		}
	},
	100
);

/**
 * Enqueue Public Presentation Scripts and Styles.
 *
 * @since 1.0.0
 *
 * @return void
 */
add_action(
	'wp_enqueue_scripts',
	function () {

		if ( is_singular( 'presentation' ) ) {

			// Enqueue Reveal.js.
			wp_enqueue_script(
				SHCP_PLUGIN_TEXT_DOMAIN . '-reveal',
				SHCP_PLUGIN_URL . 'assets/js/reveal.js',
				array(),
				SHCP_PLUGIN_VERSION,
				true
			);

			// Enqueue Reveal Styles.
			wp_enqueue_style(
				SHCP_PLUGIN_TEXT_DOMAIN . '-reveal',
				SHCP_PLUGIN_URL . 'assets/css/reveal.css',
				array(),
				SHCP_PLUGIN_VERSION
			);

			// Default Reveal Theme.
			$theme = 'black';
			$theme = apply_filters( 'shcp_theme', $theme );

			// Enqueue Reveal Theme.
			wp_enqueue_style(
				SHCP_PLUGIN_TEXT_DOMAIN . '-reveal-theme',
				SHCP_PLUGIN_URL . 'assets/css/themes/' . $theme . '.css',
				array(),
				SHCP_PLUGIN_VERSION
			);

			// Enqueue Font Awesome.
			wp_enqueue_style( SHCP_PLUGIN_TEXT_DOMAIN . 'font-awesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css', array(), SHCP_PLUGIN_VERSION );
		}
	},
	200
);
