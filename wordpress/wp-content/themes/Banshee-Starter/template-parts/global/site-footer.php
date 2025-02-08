<?php

/**
 * The template that generates the html for
 * the global footer of the website.
 *
 * @package BansheeStudio
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// acf options
$logo   = get_field('brand_logo', 'option');

if (!empty($logo)) {
    $logo_output = wp_get_attachment_image($logo, 'full');
} else {
    $logo_output = '<span>Kendra Kyndberg</span>';
}

// quick links
$footer_quick_links = wp_nav_menu(
    [
    'container'      => false,
    'menu_class'     => '',
    'menu_id'        => 'footer-quick-links-menu',
    'echo'           => false,
    'fallback_cb'    => false,
    'item_spacing'   => 'preserve',
    'depth'          => 0,
    'theme_location' => 'footer_quick_links',
    'link_after'     => '',
    'link_before'    => '',
    ]
);

// quick links
$footer_legal_links = wp_nav_menu(
    [
    'container'      => false,
    'menu_class'     => 'txt txt--3xs',
    'menu_id'        => 'footer-legal-links-menu',
    'echo'           => false,
    'fallback_cb'    => false,
    'item_spacing'   => 'preserve',
    'depth'          => 0,
    'theme_location' => 'footer_legal_links',
    'link_after'     => '',
    'link_before'    => '',
    ]
);

?>

<footer class="tier tier-blue">
    < class="wrapper">
        <div class="colophon">
            <div class="colophon__section colophon__section--social">
                <?php if (have_rows('social_platforms', 'option')) : ?>
                    <div class="socialLinks">
                        <ul class="series series--sm series--j-left">
                            <?php while (have_rows('social_platforms', 'option')) : ?>
                                <?php
                                the_row();
                                $platform_name          = get_sub_field('social_platform_name');
                                $platform_url           = get_sub_field('social_platform_url');
                                $platform_footer_link   = get_sub_field('social_platform_footer_link');

                                if (empty($platform_footer_link)) {
                                    continue;
                                }
                                ?>
                                <li>
                                    <a
                                        class="isBlock"
                                        href="<?php echo $platform_url; ?>"
                                        target="_blank"
                                        rel="noopener"
                                        title="Visit <?php echo $platform_name['label']; ?>"
                                    >
                                        <i class="social-icon" aria-hidden="true">
                                            <?php
                                            $icon_svg = svg_inline("/assets/media/icons/{$platform_name['value']}.svg", true);

                                            if (empty($icon_svg)) {
                                                $icon_svg = svg_inline('/assets/media/icons/other.svg', true);
                                            }

                                            echo $icon_svg;
                                            ?>
                                        </i>
                                        <span class="isVisuallyHidden">
                                            <?php echo $platform_name; ?>
                                        </span>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="colophon__section colophon__section--legal">
                <div class="colophon__section__links">
                    <?php echo $footer_legal_links; ?>
                <div class="colophon__section__copyright">
                    <small class="txt txt--3xs txt--lh-md">
                        &copy;<?php echo date('Y'); ?> BansheeStudio. All rights reserved.
                    </small>
                </div>
            </div>
        </div>
    </div>
</footer>
