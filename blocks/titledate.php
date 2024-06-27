<?php

/**
 * Title Date Block
 * 
 * @package elsa
 * @since 0.1
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Block Content
 *
 * Outputs the post title as date
 * 
 * @since 0.1
 *
 * @return html Markup
 */

function elsa_block_titledate_content() {

	$content='<h2 class="wp-block-post-title elsa-titledate">';
	$content.='<a href="';
	$content.=get_permalink();
	$content.='" target="_self" rel="bookmark">';
	$content.=get_the_date();
	$content.='</a>';
	$content.='</h2>';

	return $content;
}

/**
 * Block Editor Assets
 * 
 * @since 0.1
 */

function elsa_block_titledate_editor_assets() {

	// Block Content
	$block_params = array(
		'titledate_content' => 'Elsa Title Date'
	);

	// Block Java Script
	wp_enqueue_script(
		'elsa-block-titledate',
		get_theme_file_uri( 'blocks/titledate.js'), 
		array( 'wp-blocks', 'wp-i18n', 'wp-element' )
	);

	// Bring the Content into the Block Java Script
	wp_localize_script( 'elsa-block-titledate', 'BlockParams', $block_params );

} 
add_action( 'enqueue_block_editor_assets', 'elsa_block_titledate_editor_assets' );

/**
 * Block FrontEnd Rendering
 * 
 * @since 0.1
 */

register_block_type( 'elsa/titledate', array(
	'render_callback' => 'elsa_block_titledate_content'
) );

?>