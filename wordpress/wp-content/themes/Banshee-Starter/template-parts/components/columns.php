<?php

/**
 * The template that generates the html for the Button Group component.
 *
 * @package BansheeStudio
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$buttonGroup_alignment  = get_sub_field('button_group_alignment');

if (!have_rows('button_group_buttons')) {
    return; // return early if no rows exist
}

?>

<div class="buttonGroup buttonGroup--<?php echo $buttonGroup_alignment; ?>">
    <?php while (have_rows('button_group_buttons')) : ?>
        <?php
        the_row();
        $button_link = get_sub_field('button_group_buttons_link');

        if (!$button_link) {
            return; // return early if a row has no link set
        }

        $button_link_url    = $button_link['url'];
        $button_link_text   = $button_link['title'];
        $button_link_target = $button_link['target'] ? $button_link['target'] : '_self';
        $button_type        = get_sub_field('button_group_buttons_style');
        $button_class       = "btn btn--{$button_type}";

        ?>
        <div class="buttonGroup__item">
            <?php
            echo sprintf(
                '<a href="%2$s" class="%3$s" target="%4$s">%1$s</a>',
                $button_link_text,
                $button_link_url,
                $button_class,
                $button_link_target
            );
            ?>
        </div>
    <?php endwhile; ?>
</div>

