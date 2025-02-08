<?php

/**
 * The template that generates the <head> and opens the <body>
 *
 * @package BansheeStudio
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$body_classes = esc_attr(implode(' ', get_body_class()));

?>
<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body class="<?php echo $body_classes; ?>">
        <?php wp_body_open(); ?>
