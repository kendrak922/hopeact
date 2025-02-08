<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * ACF Configuration
 *
 * Configure theme for use with ACF Pro features
 *
 * @package BansheeStudio
 * @return void
 */

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        array(
            'page_title'    => 'Theme Settings',
            'menu_title'    => 'Theme Settings',
            'menu_slug'     => 'theme-settings',
            'capability'    => 'update_themes',
            'parent_slug'   => 'themes.php',
            'position'      => '1',
            'icon_url'      => 'dashicons-clipboard',
            'redirect'      => false
        )
    );
}

/**
 * Add Minimal WYSIWYG Option
 *
 * @package BansheeStudio
 * @return $toolbars
 */
add_filter(
    'acf/fields/wysiwyg/toolbars',
    static function ($toolbars) {
        $toolbars['Minimal' ] = array();
        $toolbars['Minimal' ][1] = array('bold', 'italic', 'underline', 'link', 'unlink');

        return $toolbars;
    }
);

/**
 * Remove post type creation from ACF admin interface
 */
add_filter(
    'acf/settings/enable_post_types',
    '__return_false'
);

/**
 * Remove option page creation from ACF admin interface
 */
add_filter(
    'acf/settings/enable_options_pages_ui',
    '__return_false'
);
