<?php

/**
 * Creative Commons Block
 * 
 * @package elsa
 * @since 0.1
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Block Content
 * 
 * Outputs the Creative Common Markup
 *
 * @since 0.1
 *
 * @return html Markup
 */

function elsa_block_creativecommons_content() {

	if(elsa_is_creative_commons()) {
		return elsa_create_creative_commons_markup();
	}

}

/**
 * Block Editor Assets
 * 
 * @since 0.1
 */

function elsa_block_creativecommons_editor_assets() {

	// Block Content
	$block_params = array(
		'cc_content' => 'Creative Commons Markup'
	);

	// Block Java Script
	wp_enqueue_script(
		'elsa-block-creativecommons',
		get_theme_file_uri( 'blocks/creativecommons.js'), 
		array( 'wp-blocks', 'wp-i18n', 'wp-element' )
	);

	// Bring the Content into the Block Java Script
	wp_localize_script( 'elsa-block-creativecommons', 'BlockParams', $block_params );

} 
add_action( 'enqueue_block_editor_assets', 'elsa_block_creativecommons_editor_assets' );

/**
 * Block FrontEnd Rendering
 * 
 * @since 0.1
 */

register_block_type( 'elsa/creativecommons', array(
	'render_callback' => 'elsa_block_creativecommons_content'
) );

?>