<?php

/**
 * Meta Sketch Block
 * 
 * @package elsa
 * @since 0.1
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Block Content
 * 
 * Outputs title and description in the meta section
 *
 * @since 0.1
 *
 * @return html Markup
 */

function elsa_block_metasketch_content() {

	$markup='';

	if(elsa_is_post_type('pinseldisko')) {

		// Headline
		$markup='<p style="margin-top:0rem"><strong>Sketchnote</strong></p>';

		// Title
		$markup.='<div style="margin-top:0rem" class="sketchnote-titel">';
		$markup.=get_the_title();
		$markup.='</div>';

		// Excerpt
		$markup.='<div style="margin-top:0rem" class="sketchnote-excerpt">';
		$markup.=get_the_excerpt();
		$markup.='</div>';

		return $markup;
	}

	return $markup;
}

/**
 * Block Editor Assets
 * 
 * @since 0.1
 */

function elsa_block_metasketch_editor_assets() {

	// Block Content
	$block_params = array(
		'metasketch_content' => 'About Sketch'
	);

	// Block Java Script
	wp_enqueue_script(
		'elsa-block-metasketch',
		get_theme_file_uri( 'blocks/metasketch.js'), 
		array( 'wp-blocks', 'wp-i18n', 'wp-element' )
	);

	// Bring the Content into the Block Java Script
	wp_localize_script( 'elsa-block-metasketch', 'BlockParams', $block_params );

} 
add_action( 'enqueue_block_editor_assets', 'elsa_block_metasketch_editor_assets' );

/**
 * Block FrontEnd Rendering
 * 
 * @since 0.1
 */

register_block_type( 'elsa/metasketch', array(
	'render_callback' => 'elsa_block_metasketch_content'
) );

?>