<?php
/*
Plugin Name: My Block Theme Plugin
Description: A custom plugin for block theme enhancements.
Version: 0.0.0
Author: 
License: GPL2 or later
*/

// [get-custom-field] ショートコードで指定したカスタムフィールドの値を表示
function mbtp_get_custom_field_shortcode($atts) {
    global $post;
    if (!isset($post->ID)) return '';
    $atts = shortcode_atts([
        'name' => '',
    ], $atts);
    if (empty($atts['name'])) return '';
    $value = get_post_meta($post->ID, $atts['name'], true);
    if ($value === '') return '';
    return esc_html($value);
}
add_shortcode('get-custom-field', 'mbtp_get_custom_field_shortcode');
