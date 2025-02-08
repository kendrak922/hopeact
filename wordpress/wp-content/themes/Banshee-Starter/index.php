<?php

/**
 * The main entry point for the site.
 *
 * Loads the appropriate template part.
 * The loop is handled by the template part when necessary.
 *
 * @package BansheeStudio
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
global $post;

?>

<?php get_header(); ?>

<div class="skipNav">
    <a href="#main">Skip to Main content</a>
</div>
<div class="site">
    <div class="site__masthead" role="banner">
        <?php get_template_part('template-parts/global/site-masthead'); ?>
    </div>
    <div class="site__main" id="main" role="main">
        <?php
        if (is_blog_post_archive()) {
            get_template_part('template-parts/pages/standard');
        } elseif (is_front_page()) {
            get_template_part('template-parts/pages/front-page');
        } elseif ($post->post_name === 'work') {
            get_template_part('template-parts/pages/work');
        } elseif (is_blog_post_single()) {
            get_template_part('template-parts/posts/single');
        } elseif (is_blog_general_archive()) {
            get_template_part('template-parts/posts/archive');
        } elseif (is_page()) {
            get_template_part('template-parts/pages/standard');
        } elseif (is_404()) {
            get_template_part('template-parts/pages/404');
        } else {
            get_template_part('template-parts/pages/error');
        }
        ?>
    </div>
    <div class="site__footer" role="contentinfo">
        <?php get_template_part('template-parts/global/site-footer'); ?>
    </div>
</div>

<?php get_footer(); ?>
