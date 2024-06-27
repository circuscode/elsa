<?php

/**
 * Code Block
 * 
 * @package elsa
 * @since 0.1
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Block Content
 * 
 * Outputs any code
 *
 * @since 0.1
 *
 * @return html Markup
 */

function elsa_block_code_content() {

	// '<p>Hallo Welt</p>'
	// do_blocks();

	return true;
}

/**
 * Block Editor Assets
 * 
 * @since 0.1
 */

function elsa_block_code_editor_assets() {

	// Block Content
	$block_params = array(
		'code_content' => 'Hallo Welt'
	);

	// Block Java Script
	wp_enqueue_script(
		'elsa-block-code',
		get_theme_file_uri( 'blocks/code.js'), 
		array( 'wp-blocks', 'wp-i18n', 'wp-element' )
	);

	// Bring the Content into the Block Java Script
	wp_localize_script( 'elsa-block-code', 'BlockParams', $block_params );

} 
add_action( 'enqueue_block_editor_assets', 'elsa_block_code_editor_assets' );

/**
 * Block FrontEnd Rendering
 * 
 * @since 0.1
 */

register_block_type( 'elsa/code', array(
	'render_callback' => 'elsa_block_code_content'
) );

?>