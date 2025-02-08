<?php

use Lean\Load;

/**
 * The template for displaying the footer
 */
global $themeGlobals;

// organism variables
$footerData = [
    'logo'        => get_field('footer_logo', 'options') ? get_field('footer_logo', 'options') : get_field('site_logo', 'options'), // media object
    'nav'        => [
        'theme_location'    => 'footer-menu',
        'depth'                => 2,
        'menu_class'        => 'menu menu--footer',
        'walker'            => new hopeact_nav_walker_footer()
    ],
    'nav2'        => [
        'theme_location'    => 'footer-menu2',
        'depth'                => 2,
        'menu_class'        => 'menu menu--footer2',
    ],
];

$facebook = get_field("facebook", 'option');
$bluesky = get_field("bluesky", 'option');
$twitter = get_field("twitter", 'option');
$instagram = get_field("instagram", 'option');
$linkedin = get_field("linkedin", 'option');
$youtube = get_field("youtube", 'option');
?>

<?php /*****
       * END: MAIN CONTENT 
       ******/ ?>
</main>
<?php // Opened in header.php 
?>

<footer id="footer" class="footer <?php echo $args && $args['hasSidebar']?'has-sidebar':'';?> u-darkMode u-bgColorBlack">
    <?php /*****
           * FOOTER MAIN 
           ******/ ?>
    <section class="footer__main">
        <div class="container container--ultra-wide">

            <div class="footer__content">
				<div class="footer__logo">

				<?php if (get_field('footer_logo', 'options')) : $logo = get_field('footer_logo', 'options'); ?>
                                        <img src="<?php echo $logo['url']; ?>" alt="Hope Act Logo">
                                    <?php elseif (file_exists($themeGlobals['theme_rel'] . '/assets/dist/imgs/logo-white.png')) : ?>
                                        <img src="<?php echo $themeGlobals['theme_url']; ?>/assets/dist/imgs/logo-white.png" alt="Hope Act Logo" class="u-hidden u-lg-block" />
                                        <img src=" <?php echo $themeGlobals['theme_url']; ?>/assets/dist/imgs/logo-white-sm.png" alt="Hope Act Logos" class="u-lg-hidden" />
                                    <?php else : ?>
                                        <strong><?php echo bloginfo('title'); ?></strong>
                <?php endif; ?>
				</div>
                <div class="footer__attribute">
                    Website by <a href="https://bansheestud.io">Banshee Studio</a>
                    <?php echo date('Y'); ?> All Rights Reserved.
                </div>
                <?php /* Footer Menu */ ?>
                <div class="footer__menus">
                    <div class="footer__menu">
                        <div class="footer__social social">
                            <div class="social__head">
                                Social
                            </div>
                    <nav class="nav--social" aria-label="Social Media Menu">
                        <ul class="social__links">
                            <?php if($facebook) :?>
                                <li>
                                    <a href="<?php echo $facebook;?>" target="_blank">
                                    facebook
                                <?php echo GetIconMarkup('icon-social-facebook-white'); ?>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if($bluesky) :?>
                                <li>
                                    <a href="<?php echo $bluesky;?>" target="_blank">
                                    bluesky
                                <?php echo GetIconMarkup('icon-social-facebook-white'); ?>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if($twitter) :?>
                                <li>
                                    <a href="<?php echo $twitter;?>" target="_blank">
                                <?php echo GetIconMarkup('icon-social-twitter-white'); ?>
                                    x
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if($instagram) :?>
                                <li>
                                    <a href="<?php echo $instagram;?>" target="_blank">
                                <?php echo GetIconMarkup('icon-social-instagram-white'); ?>
                                        instagram
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if($linkedin) :?>
                                <li>
                                    <a href="<?php echo $linkedin;?>" target="_blank">
                                <?php echo GetIconMarkup('icon-social-linkedin-white'); ?>
                                linkedin
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if($youtube) :?>
                                <li>
                                    <a href="<?php echo $youtube;?>" target="_blank">
                                <?php echo GetIconMarkup('icon-social-youtube-white'); ?>
                                    youtube
                                    </a>
                                </li>
                            <?php endif;?>
                        </ul>
                    </nav>
                </div>

                    </div>
                    <nav class="nav--footer" aria-label="Footer Menu">
                        <?php
                        wp_nav_menu($footerData['nav']);
                        ?>
                    </nav>
                </div>
            
            </div>
            <!--.footer__content--wrapper-->

        </div>
    </section>

    <?php /*****
           * FOOTER BOTTOM / COPYRIGHT 
           ******/ ?>
    <section class="footer__bottom">
        <div class="container container--ultra-wide">
            <div class="footer__content">
                <div class="footer__description">
                    <?php echo get_field("footer_text", 'option');?>
                </div>
            </div>
        </div>
    </section>

    <?php // WP Footer 
    ?>
    <?php wp_footer(); ?>

</footer>

</div> <?php // END: .wrapper - opened in header.php 
?>
</body>

</html>