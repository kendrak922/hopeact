<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Enqueue Scripts and Styles for the Front end
 *
 * @package BansheeStudio
 * @return void
 */

add_action(
    'wp_enqueue_scripts',
    static function (): void {

        wp_enqueue_style(
            'app-style',
            get_template_directory_uri() . '/assets/css/src/main.css',
            [],
            filemtime(get_stylesheet_directory() . '/assets/css/src/main.css'),
            'screen'
        );

        // remove unwanted stylesheets
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('global-styles');
        wp_dequeue_style('classic-theme-styles');
    }
);

/**
 * Enqueue Scripts and Styles for the WordPress Dashboard
 *
 * @package BansheeStudio
 * @return void
 */
add_action(
    'admin_enqueue_scripts',
    static function (): void {

        wp_enqueue_style(
            'admin-style',
            get_template_directory_uri() . '/assets/css/src/admin.css',
            [],
            filemtime(get_stylesheet_directory() . '/assets/css/src/admin.css'),
            'screen'
        );
    }
);
