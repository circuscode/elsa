<?php

/**
 * Creator Block
 * 
 * @package elsa
 * @since 0.1
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Block Content
 * 
 * Outputs the Creator Headline in the About Section
 *
 * @since 0.1
 *
 * @return html Markup
 */

function elsa_block_creator_content() {

	$creator='Autor';

	if(elsa_is_post_type('post')) {
		$creator='Autor';
	} 
	
	if(elsa_is_post_type('ello')) {
		$creator='Blogger';
	} 

	if(elsa_is_post_type('pinseldisko')) {
		$creator='Zeichner';
	} 

	if(elsa_is_post_type('podcast')) {
		$creator='Podcaster';
	} 
	
	if(elsa_is_post_type('raketenstaub')) {
		$creator='Photograph';
	} 

	$about='<p style="margin-top:0;margin-bottom:0"><strong>';
	$about.='Über den '.$creator;
	$about.='</strong></p>';

	return $about;
}

/**
 * Block Editor Assets
 * 
 * @since 0.1
 */

function elsa_block_creator_editor_assets() {

	// Block Content
	$block_params = array(
		'creator_content' => 'Über den Creator'
	);

	// Block Java Script
	wp_enqueue_script(
		'elsa-block-creator',
		get_theme_file_uri( 'blocks/creator.js'), 
		array( 'wp-blocks', 'wp-i18n', 'wp-element' )
	);

	// Bring the Content into the Block Java Script
	wp_localize_script( 'elsa-block-creator', 'BlockParams', $block_params );

} 
add_action( 'enqueue_block_editor_assets', 'elsa_block_creator_editor_assets' );

/**
 * Block FrontEnd Rendering
 * 
 * @since 0.1
 */

register_block_type( 'elsa/creator', array(
	'render_callback' => 'elsa_block_creator_content'
) );

?>