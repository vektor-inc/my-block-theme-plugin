<?php
/*
Plugin Name: My Block Theme Plugin
Description: A custom plugin for block theme enhancements.
Version: 0.0.0
Author: 
License: GPL2 or later
*/

// [custom-price] ショートコードでカスタムフィールド price の値を表示
function mbtp_custom_price_shortcode($atts) {
    global $post;
    if (!isset($post->ID)) return '';
    $price = get_post_meta($post->ID, 'price', true);
    if ($price === '') return '';
    return esc_html($price);
}
add_shortcode('custom-price', 'mbtp_custom_price_shortcode');

require_once __DIR__ . '/custom-price-block.php';


