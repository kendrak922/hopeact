<?php

/**
 * The template that generates the html for the Paragraph component.
 *
 * @package BansheeStudio
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$paragraph_text         = get_sub_field('paragraph_text');
$paragraph_font         = get_sub_field('paragraph_font');
$paragraph_alignment    = get_sub_field('paragraph_alignment');
$paragraph_size         = get_sub_field('paragraph_size');
$paragraph_leading      = get_sub_field('paragraph_leading');
$paragraph_weight       = get_sub_field('paragraph_weight');
$paragraph_tracking     = get_sub_field('paragraph_tracking');
$paragraph_case         = get_sub_field('paragraph_case');
$paragraph_wrap         = get_sub_field('paragraph_wrap');
$paragraph_color        = get_sub_field('paragraph_color');

if (!$paragraph_text) {
    return; // return early if no paragraph text is defined
}

// paragraph attributes
$paragraph_class_list   = "txt"
                        . " txt--{$paragraph_font} txt--{$paragraph_color}"
                        . " txt--{$paragraph_size} txt--{$paragraph_leading}"
                        . " txt--{$paragraph_case} txt--{$paragraph_weight}"
                        . " txt--{$paragraph_wrap} txt--{$paragraph_tracking}"
                        . " txt--{$paragraph_alignment}"
                        ;

?>

<div class="paragraph">
    <?php
    echo sprintf(
        '<p class="%2$s">%1$s</p>',
        $paragraph_text,
        $paragraph_class_list
    );
    ?>
</div>
