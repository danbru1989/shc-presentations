<?php
/**
 * SHC Presentations.
 *
 * @package      ServantsHeartCamp\SHCPresentations
 * @author       Dan Brubaker
 * @since        1.0.0
 **/

/**
 * Used to initialize the framework in the various template files.
 *
 * It pulls in all the necessary components like header and footer, the basic
 * markup structure, and hooks.
 *
 * @since 1.0.0
 */
function shcp_presentation() {

	echo '<html>';
		echo '<head>' . wp_head() . '</head>';

		echo '<body>';
			echo '<div class="reveal">';
				echo '<div class="slides">';

					do_action( 'shcp_slides' );

				echo '</div>';
			echo '</div>';

			wp_footer();

			$reveal_config = shcp_default_config();

			echo '<script>Reveal.initialize(' . $reveal_config . ');</script>';

		echo '</body>';

	echo '</html>';
}
