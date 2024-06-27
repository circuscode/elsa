<?php

/**
 * Amount of Comments Button Block
 * 
 * @package elsa
 * @since 0.1
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Block Content
 * 
 * Outputs the comment link with included amount of comments
 *
 * @since 0.1
 *
 * @return html Markup
 */

function elsa_block_aocb_content() {

	$aoc=get_comments_number();
	$aoc_label='Kommentieren';
	$aoc_class='';
	$aoc_section='#respond';

	if($aoc==1) {
		$aoc_label='1 Kommentar';
		$aoc_class='zimtstaub';
		$aoc_section='#comments';
	} elseif($aoc>1) {
		$aoc_label=$aoc.' Kommentare';
		$aoc_class='zimtstaub';
		$aoc_section='#comments';
	}

	$content='<div class="elsa-aocb '.$aoc_class.'">';
	$content.='<a href="';
	$content.=get_permalink().$aoc_section;
	$content.='" target="_self" rel="bookmark">';
	$content.=$aoc_label;
	$content.='</a>';
	$content.='</div>';

	return $content;
}

/**
 * Block Editor Assets
 * 
 * @since 0.1
 */

function elsa_block_aocb_editor_assets() {

	// Block Content
	$block_params = array(
		'aocb_content' => 'Elsa Amount Comments Button'
	);

	// Block Java Script
	wp_enqueue_script(
		'elsa-block-aocb',
		get_theme_file_uri( 'blocks/aocb.js'), 
		array( 'wp-blocks', 'wp-i18n', 'wp-element' )
	);

	// Bring the Content into the Block Java Script
	wp_localize_script( 'elsa-block-aocb', 'BlockParams', $block_params );

} 
add_action( 'enqueue_block_editor_assets', 'elsa_block_aocb_editor_assets' );

/**
 * Block FrontEnd Rendering
 * 
 * @since 0.1
 */

register_block_type( 'elsa/aocb', array(
	'render_callback' => 'elsa_block_aocb_content'
) );

?>