<?php
/*
Plugin Name: My Block Theme Plugin
Description: A custom plugin for block theme enhancements.
Version: 0.0.0
Author: 
License: GPL2 or later
*/

/**
 * カスタムフィールドの値を表示するショートコードの関数
 * ショートコードの使用例: [get-custom-field name="price"]
 */
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
// ショートコードの名前, ショートコードで実行する関数名
add_shortcode('get-custom-field', 'mbtp_get_custom_field_shortcode');
