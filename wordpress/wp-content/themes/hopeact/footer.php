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
];

$button = get_field('button', 'options');
// $social_links = get_field('socials', 'options');
$footer_graphic = get_field('global_imagery', 'options')['footer_graphic'];
$socials = get_field('socials', 'options');
?>

<?php /*****
       * END: MAIN CONTENT 
       ******/ ?>
</main>
<?php // Opened in header.php 
?>

<footer id="footer" class="footer <?php echo $args && $args['hasSidebar']?'has-sidebar':'';?> u-darkMode u-bgColorBlack">
<?php if(!empty($footer_graphic)) : ?>
    <div class="footer__graphic">

        <img src="<?php echo $footer_graphic['url'];?>" />
    </div>
<?php endif; ?>
    <?php /*****
           * FOOTER MAIN 
           ******/ ?>
    <section class="footer__main">
        <div class="container container--ultra-wide">

            <div class="footer__content">
                <div class="footer__description">
                    <h2 class="u-textColorSecondary h2"><?php echo get_field("footer_text", 'option');?></h2>
                </div>
                <?php /* Footer Menu */ ?>
               <?php if($socials) : ?>
                            <div class="footer__social social">
                                    <div class="social__head text-xs text-base u-textWeightBold ">
                                        Social
                                </div>
                                <nav class="menu--footer-social" aria-label="Social Media Menu">
                                    <?php foreach($socials as $social) : ?>
                                            <?php 
                                                $link = $social['social_link'];
                                                $title = $social['social_title'];
                                            
                                            ?>
                                            <a href="<?php echo $link; ?>" target="_blank">
                                                <?php echo $title; ?>
                                            </a>
                                    <?php endforeach;?>
                                </nav>
                            </div>
               <?php endif; ?>
                <nav class="menu--footer footer__nav-wrapper" aria-label="Footer Menu">
                                <?php
                                wp_nav_menu($footerData['nav']);
                                ?>
                            </nav>
               <div class="footer__attribute text-xs">
                    Website by <a href="https://bansheestud.io">Banshee Studio</a><br>
                    <?php echo date('Y'); ?> All Rights Reserved.
                </div>
            </div>
            <!--.footer__content--wrapper-->
            <div class="footer__logo">
                <?php if($button['button']): ?>
                    <?php  
                                Load::atom(
                                    'button/button',
                                    [
                                        'button' => $button['button'],
                                    ]
                                );
                    ?>
                    <?php if (get_field('footer_logo', 'options')) : $logo = get_field('footer_logo', 'options'); ?>
                            <img src="<?php echo $logo['url']; ?>" alt="Hope Act Logo">
                    <?php elseif (file_exists($themeGlobals['theme_rel'] . '/assets/dist/imgs/logo-white.png')) : ?>
                            <img src="<?php echo $themeGlobals['theme_url']; ?>/assets/dist/imgs/logo-white.png" alt="Hope Act Logo" class="u-lg-block" />                <?php else : ?>
                            <strong><?php echo bloginfo('title'); ?></strong>
                    <?php endif; ?>
            <?php endif; ?>
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