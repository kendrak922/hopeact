<?php
/**
 * Block: seperator
 * - Slug: seperator
 */

 use Lean\Load;

// BLOCK :: DATA
$blockID = (!empty($block['anchor']) ? $block['anchor'] : uniqid($block['id']));
$blockData = array(
    'title' => get_field('title'),
    'title_level' => get_field('title_level') ?? 'h2'
);


// BLOCK :: RENDER
?>

<?php 
    // seperator
    Load::atom(
        'text/seperator',
        [
            'base'            => ['seperator'],
            'heading'         => $blockData['title'],
            'heading_level'   => $blockData['title_level'],
        ]
    );
?>