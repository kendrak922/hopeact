<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Template Helpers
 *
 * A collection of functions meant to help with templating logic.
 *
 * @package BansheeStudio
 */

/**
 * Check if current page is THE blog archive page.
 *
 * @return bool
 */
function is_blog_general_archive(): bool
{
    return (is_archive() || is_author() || is_category() || is_tag() || is_home());
}

/**
 * Check if current page is THE blog archive page.
 *
 * @return bool
 */
function is_blog_post_archive(): bool
{
    return (is_home()) && 'post' == get_post_type();
}

/**
 * Check if current page is a blog post page.
 *
 * @return bool
 */
function is_blog_post_single(): bool
{
    return (is_single()) && 'post' == get_post_type();
}

/**
 * Check if current collection of posts is paginated.
 *
 * @return bool
 */
function is_paginated(): bool
{
    global $wp_query;
    return ($wp_query->max_num_pages > 1);
}

/**
 * Insert an inline SVG
 *
 * @param string $svg_path The path to the SVG to be loaded.
 * @return string The SVG you want to load.
 */
function svg_inline($svg_path, $include_path = true)
{
    if ($include_path == false) {
        $svg_file = $svg_path;
    } else {
        $svg_file = get_stylesheet_directory() . $svg_path;
    }

    if (file_exists($svg_file)) {
        return file_get_contents($svg_file);
    }
    // Return a blank string if the file can't be located.
    return '';
}
