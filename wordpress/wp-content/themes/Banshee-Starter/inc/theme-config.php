<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


/**
 * Theme Configuration
 *
 * Sets up theme defaults and registers support for various WordPress features.
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @package BansheeStudio
 * @return void
 */

add_action(
    'after_setup_theme',
    static function (): void {
        add_theme_support('menus');
        add_theme_support('post-thumbnails', array('post'));
        add_theme_support('title-tag');
        add_theme_support('html5', ['script', 'style']);
        remove_theme_support('custom-logo');
        remove_theme_support('automatic-feed-links');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_shortlink_wp_head');
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'rest_output_link_wp_head');
        remove_action('template_redirect', 'rest_output_link_header', 11);
        remove_action('wp_head', 'wp_oembed_add_discovery_links');
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
    }
);

/**
 * Modify the_excerpt length
 *
 * @package BansheeStudio
 * @return integer
 */

add_filter(
    'excerpt_length',
    static function ($length): int {
        return 42;
    }
);

/**
 * Modify the_excerpt terminator
 *
 * @package BansheeStudio
 * @return string
 */

add_filter(
    'excerpt_more',
    static function ($more): string {
        return '&hellip;';
    }
);
