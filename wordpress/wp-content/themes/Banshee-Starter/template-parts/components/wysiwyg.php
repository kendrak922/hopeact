<?php

/**
 * The template that generates the html for the WYSIWYG component.
 *
 * @package BansheeStudio
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$wysiwyg_content        = get_sub_field('wysiwyg_content');

if (!$wysiwyg_content) {
    return; // return early if no source is defined
}

?>

<div class="wysiwyg">
    <div class="userContent">
        <?php echo $wysiwyg_content; ?>
    </div>
</div>
