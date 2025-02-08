<?php

/**
 * The template that generates the html for the Headline component.
 *
 * @package BansheeStudio
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$headline_text          = get_sub_field('headline_text');
$headline_font          = get_sub_field('headline_font');
$headline_alignment     = get_sub_field('headline_alignment');
$headline_html_element  = get_sub_field('headline_html_element');
$headline_visibility    = get_sub_field('headline_visibility');
$headline_size          = get_sub_field('headline_size');
$headline_leading       = get_sub_field('headline_leading');
$headline_weight        = get_sub_field('headline_weight');
$headline_tracking      = get_sub_field('headline_tracking');
$headline_case          = get_sub_field('headline_case');
$headline_wrap          = get_sub_field('headline_wrap');
$headline_color         = get_sub_field('headline_color');

if (!$headline_text) {
    return; // return early if no headline text is defined
}

// headline attributes
$headline_vis_class     = ($headline_visibility == 'isVisible') ? '' : $headline_visibility;
$headline_class_list    = "txt"
                        . " txt--{$headline_font} txt--{$headline_color}"
                        . " txt--{$headline_size} txt--{$headline_leading}"
                        . " txt--{$headline_case} txt--{$headline_weight}"
                        . " txt--{$headline_wrap} txt--{$headline_tracking}"
                        . " txt--{$headline_alignment}"
                        ;

?>

<div class="headline <?php echo $headline_vis_class; ?>">
    <?php
    echo sprintf(
        '<%2$s class="%3$s">%1$s</%2$s>',
        $headline_text,
        $headline_html_element,
        $headline_class_list
    );
    ?>
</div>
