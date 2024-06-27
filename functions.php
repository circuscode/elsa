<?php

/**
 * Functions
 *
 * @package elsa
 * @since 0.1
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Theme Setup
 * 
 * @since 0.1
 */

function elsa_setup() {

    // Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'quote','image' ) );

    // Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
    
}
add_action( 'after_setup_theme', 'elsa_setup' );

/**
 * Enqueue Scripts
 * 
 * @since 0.1
 */

function elsa_scripts() {

    /* CSS */
	wp_enqueue_style( 'elsa-style', get_template_directory_uri() . '/assets/css/elsa.css', array(), '001' );

    /* Java Script */
    wp_enqueue_script( 'elsa-js', get_template_directory_uri() . '/assets/js/elsa.js', array( 'jquery' ), '001', true );
    
}
add_action( 'wp_enqueue_scripts', 'elsa_scripts' );

/**
 * Load Custom Styles to Editor
 * 
 * @since 0.1
 */

function elsa_editor_styles() {

	add_editor_style( 'assets/css/elsa.css' );

}
add_action( 'after_setup_theme', 'elsa_editor_styles' );

/**
 * Overwrite Comment Form Title Markup
 * 
 * @since 0.1
 */

function elsa_comment_form_defaults( $defaults ) {

    $defaults['title_reply_before'] = '<div id="reply-title" class="comment-reply-title">';
    $defaults['title_reply_after'] = '</div>';
    $defaults['comment_notes_before'] = '<span id="email-notes">Deine E-Mail-Adresse wird nicht veröffentlicht. </span><span class="required-field-message">Erforderliche Felder sind mit <span class="required">*</span> markiert.</span>';

    return $defaults;

}
add_filter( 'comment_form_defaults', 'elsa_comment_form_defaults' );

/**
 * Elsa Block Wrapper
 * 
 * @since 0.1
 */

function elsa_block_wrapper( $block_content, $block ) {

    // Comments Title
	if ( $block['blockName'] === 'core/comments-title' ) {
        $block_content=str_replace("h2","div",$block_content);
        $block_content=str_replace("Antworten","Kommentare",$block_content);
		$content = $block_content;
		return $content;
	}

    // Site Title
    if ( $block['blockName'] === 'core/site-title' ) {
        if (elsa_blog_title_html_manipulate_condition()) {
        $block_content=str_replace("h1","p",$block_content);
		$content = $block_content;
		return $content;
        }
	} 

    // Post Excerpt
	if ( $block['blockName'] === 'core/post-excerpt' ) {
        $block_content=str_replace('&hellip;'," [&hellip;]",$block_content);
		$content = $block_content;
		return $content;
	} 

    // Term Description
	if ( $block['blockName'] === 'core/term-description' ) {
        if(is_author()) {
            $block_content='<div class="wp-block-term-description"><p>Alle Beiträge von '.get_the_author().'</p></div>';
            $content = $block_content;
            return $content;
        }
        if(is_date()) {
            $block_content='<div class="wp-block-term-description"><p>Alle Beiträge des oben genannten Zeitraums</p></div>';
            $content = $block_content;
            return $content;
        }
        if(is_search()) {
            $block_content='<div class="wp-block-term-description"><p>Tröts sowie Tweets sind von der Suche ausgeschlossen.</p></div>';
            $content = $block_content;
            return $content;
        }
    }
		
	return $block_content;
}
add_filter( 'render_block', 'elsa_block_wrapper', 10, 2 );

/**
 * Blog Title HTML Manipulate Condition
 * 
 * @since 0.1
 */

 function elsa_blog_title_html_manipulate_condition() {

    if (is_home()) {
        return true;
    }

    if (is_single() ) {
       return true;
    }

    if (is_category() OR is_tag() OR is_tax()) {
        return true;
    }

    if (is_post_type_archive('ello')) {
        return true;
    }

    if (is_post_type_archive('pinseldisko')) {
        return true;
    }

    if (is_post_type_archive('podcast')) {
        return true;
    }

    if (is_post_type_archive('raketenstaub')) {
        return true;
    }

    if (is_page()) {
        return true;
    }

	return false;

}

/**
 * Is Post Type
 * 
 * @since 0.1
 * 
 * @param string Post Type
 * @return bool
 */

 function elsa_is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}

/**
 * Include Program Files
 * 
 * @since 0.1
 */

require_once('inc/cc.php'); 
require_once('inc/shortcodes.php'); 

/**
 * Include Blocks
 * 
 * @since 0.1
 */

require_once('blocks/creativecommons.php'); 
require_once('blocks/titledate.php'); 
require_once('blocks/aocb.php'); 
require_once('blocks/code.php'); 
require_once('blocks/creator.php'); 
require_once('blocks/dyncat.php'); 
require_once('blocks/metasketch.php'); 

?>