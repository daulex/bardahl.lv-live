<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

/**
 * Generate alt text when sending an image to WP
 *
 * @param string $post_ID
 *
 * @return void
 */
add_action('add_attachment', 'seopress_ai_alt_text_upload', 20);
function seopress_ai_alt_text_upload($post_ID) {
    if (seopress_pro_get_service('OptionPro')->getAIOpenaiAltText() !== '1') {
        return;
    }

    if (!isset($post_ID)) {
        return;
    }

    $language = seopress_get_current_lang();

    $alt_text = seopress_pro_get_service('Completions')->generateImgAltText($post_ID, $meta = '', $language);

    update_post_meta($post_ID, '_wp_attachment_image_alt', $alt_text);
}

