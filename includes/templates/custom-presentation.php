<?php
/**
 * Default Presentation Template.
 *
 * Copy this template to your theme to create your own presentations.
 *
 * @package      ServantsHeartCamp\SHCPresentations
 * @author       Dan Brubaker
 * @since        1.0.0
 **/

/**
 * Add Custom Configuration.
 */
add_filter(
	'shcp_custom_config',
	function() {

		$custom_config = array(
			'controls'             => true,
			'progress'             => true,
			'autoSlide'            => 0, // milliseconds or 0 for off.
			'autoSlideStoppable'   => false,
			'loop'                 => true,
			'transition'           => 'slide', // none, fade, slide, convex, concave, zoom.
			'backgroundTransition' => 'none', // none, fade, slide, convex, concave, zoom.
			'transitionSpeed'      => 'default', // default, fast, slow.
			'hash'                 => false,
			'hideAddressBar'       => true,
		);

		return $custom_config;
	}
);

/**
 * Set Theme.
 *
 * @see https://github.com/hakimel/reveal.js#theming.
 */
add_filter(
	'shcp_theme',
	function() {
		return 'black';
	}
);

/**
 * Add Slides.
 */
remove_action( 'shcp_slides', 'shcp_default_slides' );
add_action(
	'shcp_slides',
	function() {
		?>

		<section data-background-color="rgb(48,48,48)">Custom Slide 1</section>
		<section data-background-color="rgb(48,48,48)">Custom Slide 2</section>
		<section data-background-color="rgb(48,48,48)">Custom Slide 3</section>

		<?php
	}
);

shcp_presentation();
