<?php

/**
 * Theme functions.php
 *
 * @package BansheeStudio
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require get_template_directory() . '/inc/theme-config.php';
require get_template_directory() . '/inc/theme-scripts-styles.php';
require get_template_directory() . '/inc/theme-register-menus.php';
require get_template_directory() . '/inc/theme-register-blocks.php';
require get_template_directory() . '/inc/theme-template-helpers.php';
require get_template_directory() . '/inc/admin-config.php';
require get_template_directory() . '/inc/admin-allow-svg-uploads.php';
require get_template_directory() . '/inc/plugin-acf-config.php';

/*************************************************************
    GLOBAL PHP VARIABLE
 *************************************************************/
// Define theme global variable
global $themeGlobals;
$themeGlobals = [
    'namespace' => 'theme-',
    'guten_category' => '',
    'text_domain' => 'theme-custom',
    'theme_url' => get_stylesheet_directory_uri(), // Absolute path to theme directory (URL)
    'theme_rel' => get_stylesheet_directory(), // Relative path to theme directory
    'ajax_url' => admin_url('admin-ajax.php'), // Localized AJAX URL
    'rest_url' => esc_url_raw(rest_url()),
];
$themeGlobals['guten_category'] = $themeGlobals['namespace'] . 'blocks'; // Using the namespace prefix used throughout the theme, create the slug used for our Gutenberg Category


/*************************************************************
    REGISTER GUTENBERG BLOCKS
 *************************************************************/
// REGISTER CUSTOM BLOCK CATEGORY
function theme_register_block_categories($categories)
{
    global $themeGlobals;
    $category_slugs = wp_list_pluck($categories, 'slug');
    // Add category if its not already there
    return in_array($themeGlobals['guten_category'], $category_slugs, true) ? $categories : array_merge(
        $categories,
        array(
            array(
                'slug'  => $themeGlobals['guten_category'],
                'title' => __('Theme Blocks', $themeGlobals['text_domain']),
                'icon'  => 'admin-home',
            ),
        )
    );
}
add_filter('block_categories_all', 'theme_register_block_categories', 10, 2);

// REGISTER CUSTOM BLOCKS
function register_acf_block_types()
{

    // Register all blocks found within the block register directory
    $blocks = scandir(__DIR__ . '/template-parts/blocks/__register');
    foreach ($blocks as $block) {
        if ($block[0] != '.') {
            include(__DIR__ . '/template-parts/blocks/__register/' . $block);
        }
    }
}
// Check if function exists and hook into setup.
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}




/*************************************************************
    GUTENBERG BLOCKS: LIMIT ALLOWED BLOCKS
 *************************************************************/
// Allow Only Custom Blocks Listed Below
function my_allowed_block_types($allowed_block_types_all, $post)
{
    $allowed = [
        'core/block', // add this for reusable blocks
        'core/footnotes',
        'core/group',
        'core/columns',
        'core/heading',
        'core/list-item',
        'core/list',
        'core/media-text',
        'core/paragraph',
        'core/post-author-name',
        'core/post-date',
        'core/post-excerpt',
        'core/post-featured-image',
        'core/post-title',
        'core/quote',
        'yoast-seo/breadcrumbs',
        'formidable/simple-form',
    ];

    $post_type = get_post_type();
    switch ($post_type):

        case 'post':
            // Post Type specific blocks - example
            // default to built in wysiwyg - allow ACF blocks too
            $allowed[] = 'core/freeform';
            foreach (acf_get_block_types() as $key => $block) {
               $allowed[] = $block['name'];
            }
            break;

        // Default blocks allowed
        default:
            foreach (acf_get_block_types() as $key => $block) {
                $allowed[] = $block['name'];
            }
            break;
    endswitch;

    return $allowed;
}
add_filter('allowed_block_types_all', 'my_allowed_block_types', 10, 2);


/*************************************************************
    GUTENBERG BLOCKS: CORE BLOCKS
 *************************************************************/
/**
 * CORE/FREEFORM
 * - source: https://www.gsarigiannidis.gr/adding-a-div-wrapper-to-gutenberg-s-classic-block/
 * - Wrap core/freeform in container div
 */
function theme_wrap_classic_block($block_content, $block)
{
    if (null === $block['blockName'] && !empty($block_content) && !ctype_space($block_content)) {
        $block_content = '<section class="block block--freeform"><div class="container">' . $block_content . '</div></section>';
    }
    return $block_content;
}
add_filter('render_block', 'theme_wrap_classic_block', 10, 2);

