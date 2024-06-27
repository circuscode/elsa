<?php

/**
 * Dynamic Category Block
 * 
 * @package elsa
 * @since 0.1
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Block Content
 * 
 * Outputs the category dependent of the post type in the meta section
 *
 * @since 0.1
 *
 * @return html Markup
 */

function elsa_block_dyncat_content() {

	$meta_cat='';

	if(elsa_is_post_type('post')) {
		$meta_cat=do_blocks('<!-- wp:paragraph --><p><strong>Kategorie</strong></p><!-- /wp:paragraph -->');
		$meta_cat.=do_blocks('<!-- wp:post-terms {"term":"category","style":{"spacing":{"margin":{"top":"0rem"}}}} /-->');
	}

	if(elsa_is_post_type('ello')) {
		$meta_cat=do_blocks('<!-- wp:paragraph --><p><strong>Tagebuch</strong></p><!-- /wp:paragraph -->');
		$meta_cat.=do_blocks('<!-- wp:post-terms {"term":"tagebuch","style":{"spacing":{"margin":{"top":"0rem"}}}} /-->');
	}

	if(elsa_is_post_type('pinseldisko')) {
		$meta_cat=do_blocks('<!-- wp:paragraph --><p><strong>Kunsthalle</strong></p><!-- /wp:paragraph -->');
		$meta_cat.=do_blocks('<!-- wp:post-terms {"term":"kunsthalle","style":{"spacing":{"margin":{"top":"0rem"}}}} /-->');
	}

	if(elsa_is_post_type('podcast')) {
		$meta_cat=do_blocks('<!-- wp:paragraph --><p><strong>Gast</strong></p><!-- /wp:paragraph -->');
		$meta_cat.=do_blocks('<!-- wp:post-terms {"term":"artist","style":{"spacing":{"margin":{"top":"0rem"}}}} /-->');
	}

	return $meta_cat;
}

/**
 * Block Editor Assets
 * 
 * @since 0.1
 */

function elsa_block_dyncat_editor_assets() {

	// Block Content
	$block_params = array(
		'dyncat_content' => 'Elsa Dynamic Category'
	);

	// Block Java Script
	wp_enqueue_script(
		'elsa-block-dyncat',
		get_theme_file_uri( 'blocks/dyncat.js'), 
		array( 'wp-blocks', 'wp-i18n', 'wp-element' )
	);

	// Bring the Content into the Block Java Script
	wp_localize_script( 'elsa-block-dyncat', 'BlockParams', $block_params );

} 
add_action( 'enqueue_block_editor_assets', 'elsa_block_dyncat_editor_assets' );

/**
 * Block FrontEnd Rendering
 * 
 * @since 0.1
 */

register_block_type( 'elsa/dyncat', array(
	'render_callback' => 'elsa_block_dyncat_content'
) );

?>