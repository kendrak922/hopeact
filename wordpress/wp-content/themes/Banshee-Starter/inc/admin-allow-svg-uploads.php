<?php

/**
 * Allow SVG Uploads to Media Library
 *
 * https://wpengine.com/resources/enable-svg-wordpress/
 *
 * @package BansheeStudio
 * @return  array
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Check SVG filetype and extension
 *
 * @package BansheeStudio
 * @return  array
 */
add_filter(
    'wp_check_filetype_and_ext',
    static function ($data, $file, $filename, $mimes): array {

        global $wp_version;

        if ($wp_version !== '4.7.1') {
            return $data;
        }

        $filetype = wp_check_filetype($filename, $mimes);

        return [
            'ext' => $filetype['ext'],
            'type' => $filetype['type'],
            'proper_filename' => $data['proper_filename']
        ];
    },
    10,
    4
);

/**
 * Add svg to list of allowed mimes
 *
 * @package BansheeStudio
 * @return  array
 */
add_filter(
    'upload_mimes',
    static function ($mimes): array {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
);

/**
 * Output CSS so SVGs display properly in th media library
 *
 * @package BansheeStudio
 * @return  array
 */
add_action(
    'admin_head',
    static function (): void {
        echo '<style>
            .attachment-266x266, .thumbnail img {
                 width: 100% !important;
                 height: auto !important;
            }
        </style>';
    }
);
