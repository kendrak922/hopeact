<?php
// REGISTER CUSTOM BLOCKS
/**
 * We use WordPress's init hook to make sure
 * our blocks are registered early in the loading
 * process.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */
function parallax_register_acf_blocks()
{
    /**
     * We register our block's with WordPress's handy
     * register_block_type();
     *
     * @link https://developer.wordpress.org/reference/functions/register_block_type/
     */

	register_block_type(__DIR__ . '/template-parts/blocks/three-column');
}
// Here we call our parallax_register_acf_block() function on init.
add_action('init', 'parallax_register_acf_blocks');