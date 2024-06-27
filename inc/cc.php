<?php

/**
 * Creative Commons Functions
 * 
 * @package elsa
 * @since 0.1
 */

/**
 * Is Creative Commons
 * 
 * @since 0.1
 */

function elsa_is_creative_commons() {

    if (!function_exists('get_field')) { 
        return false;
	} 

    if(!get_field('licence_type') OR get_field('licence_type')=='Null') {
        return false;
    }

    if(!get_field('licence_version')) {
        return false;
    }

    return true;
}

/**
 * Is Creative Commons Exclude
 * 
 * @since 0.1
 */

 function elsa_is_creative_commons_exclude() {

    if(get_field('licence_exclude')) {
        return true;
    } else {
        return false;
    }

}

/**
 * Get Creative Commons Link
 * 
 * @since 0.1
 */

function elsa_get_creative_commons_link() {
		return 'https://creativecommons.org/licenses/by/4.0/deed.de';
}

/**
 * Get Creative Commons Label Complete
 * 
 * @since 0.1
 */

 function elsa_get_creative_commons_label_complete() {

    $label='Creative Commons CC-BY 4.0';
    return $label;

}

/**
 * Get Creative Commons Label Short
 * 
 * @since 0.1
 */

 function elsa_get_creative_commons_label_short() {

    $label='CC-BY';
    return $label;

}

/**
 * Get Creative Commons Label
 * 
 * @since 0.1
 */

 function elsa_get_creative_commons_label() {

    // Complete Label
    if(elsa_is_post_type('post')){
        return elsa_get_creative_commons_label_complete();
    }

    // Complete Label
    if(elsa_is_post_type('ello')){
        return elsa_get_creative_commons_label_complete();
    }

    // Short Label
    if(elsa_is_post_type('pinseldisko')){
        return elsa_get_creative_commons_label_short();
    }

    // Complete Label
    if(elsa_is_post_type('podcast')){
        return elsa_get_creative_commons_label_complete();
    }

}

/**
 * Get Creative Commons Image
 * 
 * @since 0.1
 */

function elsa_get_creative_commons_image() {

    // Classic Badge
    if(elsa_is_post_type('post')){
        return elsa_get_creative_commons_badge();
    }

    // Modern Icons
    if(elsa_is_post_type('ello')){
        return elsa_get_creative_commons_icons();
    }

    // Official Logo
    if(elsa_is_post_type('pinseldisko')){
        return elsa_get_creative_commons_logo();
    }

    // Modern Icons
    if(elsa_is_post_type('podcast')){
        return elsa_get_creative_commons_icons();
    }

}

/**
 * Get Creative Commons Exclude
 * 
 * @since 0.1
 */

function elsa_get_creative_commons_exclude() {

    return get_field('licence_exclude');

}

/**
 * Get Creative Commons Badge
 * 
 * @since 0.1
 */

function elsa_get_creative_commons_badge() {

    $badge='<img src="'.get_template_directory_uri().'/assets/svg/cc-by.svg" alt="Creative Commons CC-BY 4.0"/>';
    return $badge;

}

/**
 * Get Creative Commons Icons
 * 
 * @since 0.1
 */

function elsa_get_creative_commons_icons() {

    $badge='<img src="'.get_template_directory_uri().'/assets/svg/cc.svg" alt="Creative Commons CC" style="margin-right:3px;"/>';
    $badge.='<img src="'.get_template_directory_uri().'/assets/svg/by.svg" alt="Creative Commons BY"/>';
    return $badge;

}

/**
 * Get Creative Commons Logo
 * 
 * @since 0.1
 */

function elsa_get_creative_commons_logo() {

    $badge='<img src="'.get_template_directory_uri().'/assets/svg/cc-logo.svg" alt="Creative Commons Logo"/>';
    return $badge;

}

/**
 * Create Creative Commons Markup
 * 
 * @since 0.1
 */

function elsa_create_creative_commons_markup() {

    // Headline
    $markup='<p><strong>Lizenz</strong></p>';

    // Exclude
    $cc_exclude='';
    if(elsa_is_creative_commons_exclude()){
        $cc_exclude.='<span class="creativecommons-exclude"> // ';
        $cc_exclude.=esc_textarea(elsa_prepare_creative_commons_exclude(elsa_get_creative_commons_exclude()));
        $cc_exclude.='</span>';
    }

    // License
    $markup.='<div style="margin-top:0rem" class="creativecommons-label">';
    $markup.='<a href="'.elsa_get_creative_commons_link().'">';
    $markup.=elsa_get_creative_commons_label();
    $markup.='</a>';
    $markup.=$cc_exclude;
    $markup.='</div>';

    // Badge
    $markup.='<div style="margin-top:0.4rem" class="creativecommons-image">';
    $markup.='<a href="'.elsa_get_creative_commons_link().'">';
    $markup.=elsa_get_creative_commons_image();
    $markup.='</a>';
    $markup.='</div>';

    return $markup;

}

/**
 * Prepare Creative Commons Exclude
 * 
 * @since 0.1
 */

function elsa_prepare_creative_commons_exclude($cc_exclude) {

    // This is old code
    $cc_exclude = ucwords ($cc_exclude);
    $cc_last_media_with_komma = strrchr($cc_exclude, ",");
    $cc_last_media_with_and = str_replace(",", " und", $cc_last_media_with_komma); 
    $cc_exclude_string= str_replace($cc_last_media_with_komma, $cc_last_media_with_and, $cc_exclude);
    $cc_exclude_string=$cc_exclude_string . " ausgeschlossen"; 

    return $cc_exclude_string;
}

?>