<?php

/**
 * Shortcodes
 * 
 * @package elsa
 * @since 0.1
 */

/**
 * Create Shortcodes
 * 
 * @since 0.1
 */

function elsa_shortcode_white_box($atts, $content = null) {
    return '<div class="white-box">' . do_shortcode( elsa_remove_standard_tags($content) ) . '</div>';
}
add_shortcode( 'white_box', 'elsa_shortcode_white_box' );

function elsa_shortcode_yellow_box($atts, $content = null) {
    return '<div class="yellow-box">' . do_shortcode( elsa_remove_standard_tags($content) ) . '</div>';
}
add_shortcode( 'yellow_box', 'elsa_shortcode_yellow_box' );
 
function elsa_shortcode_red_box($atts, $content = null) {
   return '<div class="red-box">' . do_shortcode( elsa_remove_standard_tags($content) ) . '</div>';
}
add_shortcode( 'red_box', 'elsa_shortcode_red_box' );

function elsa_shortcode_blue_box($atts, $content = null) {
   return '<div class="blue-box">' . do_shortcode( elsa_remove_standard_tags($content) ) . '</div>';
}
add_shortcode( 'blue_box', 'elsa_shortcode_blue_box' );

function elsa_shortcode_orange_box($atts, $content = null) {
   return '<div class="orange-box">' . do_shortcode( elsa_remove_standard_tags($content) ) . '</div>';
}
add_shortcode( 'orange_box', 'elsa_shortcode_orange_box' );

function elsa_shortcode_green_box($atts, $content = null) {
   return '<div class="green-box">' . do_shortcode( elsa_remove_standard_tags($content) ) . '</div>';
}
add_shortcode( 'green_box', 'elsa_shortcode_green_box' );

function elsa_shortcode_grey_box($atts, $content = null) {
   return '<div class="grey-box">' . do_shortcode( elsa_remove_standard_tags($content) ) . '</div>';
}
add_shortcode( 'grey_box', 'elsa_shortcode_grey_box' );

function elsa_shortcode_dark_box($atts, $content = null) {
   return '<div class="dark-box">' . do_shortcode( elsa_remove_standard_tags($content) ) . '</div>';
}
add_shortcode( 'dark_box', 'elsa_shortcode_dark_box' );

/**
 * Remove Standard Tags
 * 
 * @since 0.1
 * 
 * @param string Markup
 * @return string Markup without Standard Tags
 */

function elsa_remove_standard_tags($content) {
    $content = do_shortcode( shortcode_unautop( $content ) );
    $content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content);
    return $content;
}

?>