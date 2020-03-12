<?php
/**
 * Sets up the plugin.
 *
 * @package      ServantsHeartCamp\SHCPresentations
 * @author       Dan Brubaker
 * @since        1.0.0
 **/

/**
 * Reveal.js Default Presentation Configuration.
 *
 * @see https://github.com/hakimel/reveal.js#configuration
 */
function shcp_default_config() {

	$default_config = array(
		'controls'             => true,
		'progress'             => true,
		'autoSlide'            => 0, // milliseconds or 0 for off.
		'autoSlideStoppable'   => false,
		'loop'                 => true,
		'transition'           => 'slide', // none, fade, slide, convex, concave, zoom.
		'backgroundTransition' => 'none', // none, fade, slide, convex, concave, zoom.
		'transitionSpeed'      => 'default', // default, fast, slow.
		'hash'                 => true,
	);

	$default_config = wp_json_encode( apply_filters( 'shcp_custom_config', $default_config ) );

	return $default_config;
}

/**
 * Create "Presentation" Custom Post Type.
 */
add_action(
	'init',
	function() {

		$labels = array(
			'name'                     => __( 'Presentations', 'shc-presentations' ),
			'singular_name'            => __( 'Presentation', 'shc-presentations' ),
			'menu_name'                => __( 'Presentations', 'shc-presentations' ),
			'all_items'                => __( 'All Presentations', 'shc-presentations' ),
			'add_new'                  => __( 'Add New', 'shc-presentations' ),
			'add_new_item'             => __( 'Add New Presentation', 'shc-presentations' ),
			'edit_item'                => __( 'Edit Presentation', 'shc-presentations' ),
			'new_item'                 => __( 'New Presentation', 'shc-presentations' ),
			'view_item'                => __( 'View Presentation', 'shc-presentations' ),
			'view_items'               => __( 'View Presentations', 'shc-presentations' ),
			'search_items'             => __( 'Search Presentations', 'shc-presentations' ),
			'not_found'                => __( 'No Presentations found', 'shc-presentations' ),
			'not_found_in_trash'       => __( 'No Presentations found in trash', 'shc-presentations' ),
			'parent'                   => __( 'Parent Presentation:', 'shc-presentations' ),
			'featured_image'           => __( 'Featured image for this Presentation', 'shc-presentations' ),
			'set_featured_image'       => __( 'Set featured image for this Presentation', 'shc-presentations' ),
			'remove_featured_image'    => __( 'Remove featured image for this Presentation', 'shc-presentations' ),
			'use_featured_image'       => __( 'Use as featured image for this Presentation', 'shc-presentations' ),
			'archives'                 => __( 'Presentation archives', 'shc-presentations' ),
			'insert_into_item'         => __( 'Insert into Presentation', 'shc-presentations' ),
			'uploaded_to_this_item'    => __( 'Upload to this Presentation', 'shc-presentations' ),
			'filter_items_list'        => __( 'Filter Presentations list', 'shc-presentations' ),
			'items_list_navigation'    => __( 'Presentations list navigation', 'shc-presentations' ),
			'items_list'               => __( 'Presentations list', 'shc-presentations' ),
			'attributes'               => __( 'Presentations attributes', 'shc-presentations' ),
			'name_admin_bar'           => __( 'Presentation', 'shc-presentations' ),
			'item_published'           => __( 'Presentation published', 'shc-presentations' ),
			'item_published_privately' => __( 'Presentation published privately.', 'shc-presentations' ),
			'item_reverted_to_draft'   => __( 'Presentation reverted to draft.', 'shc-presentations' ),
			'item_scheduled'           => __( 'Presentation scheduled', 'shc-presentations' ),
			'item_updated'             => __( 'Presentation updated.', 'shc-presentations' ),
			'parent_item_colon'        => __( 'Parent Presentation:', 'shc-presentations' ),
		);

		$args = array(
			'label'                 => __( 'Presentation', 'shc-presentations' ),
			'labels'                => $labels,
			'description'           => '',
			'public'                => true,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_rest'          => false,
			'rest_base'             => '',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'has_archive'           => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'delete_with_user'      => false,
			'exclude_from_search'   => false,
			'capability_type'       => 'post',
			'map_meta_cap'          => true,
			'hierarchical'          => false,
			'rewrite'               => array(
				'slug'       => 'presentation',
				'with_front' => true,
			),
			'query_var'             => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-format-video',
			'supports'              => array( 'title' ),
		);

		register_post_type( 'presentation', $args );
	},
	10
);

/**
 * Reset permalinks after creating CPTs.
 */
add_action(
	'init',
	function() {
		if ( get_option( 'shcp_flush_rewrite_rules_flag' ) ) {
			flush_rewrite_rules();
			delete_option( 'shcp_flush_rewrite_rules_flag' );
		}
	},
	20
);

/**
 * Output default plugin presentation template for single Presentation CPT if no theme template file exists.
 */
add_filter(
	'template_include',
	function( $template ) {

		global $post;

		if ( is_singular( 'presentation' ) ) {

			if ( locate_template( array( 'single-presentation-' . $post->post_name . '.php' ) ) === $template ) {

				return $template;

			} elseif ( locate_template( array( 'single-presentation.php' ) ) === $template ) {

				return $template;

			} else {

				return plugin_dir_path( __DIR__ ) . 'includes/templates/presentation.php';
			}
		}

		return $template;

	},
	9999
);

add_action( 'shcp_slides', 'shcp_default_slides' );
/**
 * Add Default Slides.
 */
function shcp_default_slides() {
	?>

	<section data-background-color="rgb(48,48,48)">Default Slide 1</section>
	<section data-background-color="rgb(48,48,48)">Default Slide 2</section>
	<section data-background-color="rgb(48,48,48)">Default Slide 3</section>

	<?php
}

/**
 * Remove Admin Bar on presentations.
 */
add_filter(
	'show_admin_bar',
	function() {

		if ( is_singular( 'presentation' ) ) {
			return false;
		}

		return true;
	}
);
