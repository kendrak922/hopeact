<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Remove support for specific admin functionality on init.
 *
 * @package BansheeStudio
 * @return void
 */

add_action(
    'admin_init',
    static function (): void {
        remove_post_type_support('page', 'comments'); // no comments on pages
    }
);

/**
 * Remove Pages from WP Admin Navigation
 *
 * @package BansheeStudio
 * @return void
 */

add_action(
    'admin_menu',
    static function (): void {
        $customizer_url = add_query_arg('return', urlencode(remove_query_arg(wp_removable_query_args(), wp_unslash($_SERVER['REQUEST_URI']))), 'customize.php');

        remove_submenu_page('themes.php', 'site-editor.php?path=/patterns');
        remove_submenu_page('themes.php', 'widgets.php');
        remove_submenu_page('themes.php', 'edit.php?post_type=wp_block');
        remove_submenu_page('themes.php', $customizer_url);
    }
);

/**
 * Block remote Block Patterns from loading
 *
 * @package BansheeStudio
 * @return void
 */

add_filter(
    'should_load_remote_block_patterns',
    '__return_false'
);


/**
 * Remove Welcome Panel
 *
 * @package BansheeStudio
 * @return void
 */

add_action(
    'admin_init',
    static function (): void {
        remove_action('welcome_panel', 'wp_welcome_panel');
    }
);
