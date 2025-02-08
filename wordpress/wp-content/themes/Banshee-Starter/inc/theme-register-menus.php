<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Register Navigation
 *
 * Register Nav Menus for use within the theme
 *
 * @package BansheeStudio
 * @return void
 */

add_action(
    'init',
    static function (): void {
        register_nav_menus([
            'primary_navigation' => 'Primary Navigation',
            'footer_legal_links' => 'Footer Legal Links'
        ]);
    }
);
