<?php

/**
 * The template that generates the html for the Iframe component.
 *
 * @package BansheeStudio
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$iframe_html            = get_sub_field('iframe_html');
$iframe_size_class      = get_sub_field('iframe_size');

if (!$iframe_html) {
    return; // return early if no iframe is defined
}

?>

<div class="iframe">
    <div class="<?php echo $iframe_size_class; ?>">
        <?php echo $iframe_html; ?>
    </div>
</div>
