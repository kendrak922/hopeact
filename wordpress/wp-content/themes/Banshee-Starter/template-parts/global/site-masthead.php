<?php

/**
 * The template that generates the html for
 * the global masthead of the website.
 *
 * @package BansheeStudio
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$logo   = get_field('brand_logo', 'option');

if (!empty($logo)) {
    $logo_output = wp_get_attachment_image($logo, 'full');
} else {
    $logo_output = '<span>Kendra Kyndberg</span>';
}

?>
<header>
<div class="tier">
    <div class="wrapper">
        <div class="masthead" role="banner">
            <div class="masthead__brand">
                <div class="logo">
                    <a class="isBlock" href="<?php echo get_site_url(); ?>">
                        <?php echo $logo_output; ?>
                    </a>
                </div>
            </div>
            <div class="masthead__menu">
                <nav> 
                    <?php wp_nav_menu(array('theme_location' => 'primary_navigation')); ?>    
                </nav>
            </div>
        </div>
    </div>
</div>
</header>