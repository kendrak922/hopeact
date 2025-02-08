<?php

// Register Block: Hero Block
acf_register_block_type(array(
    'name'              => 'hero-block',
    'title'             => __('Hero Block'),
    'description'       => __('Hero option 2, appears as a side by side'),
    'render_template'   => 'template-parts/blocks/hero-block/hero-block.php',
    'category'          => $themeGlobals['guten_category'],
    'icon'              => 'align-pull-right',
    'keywords'          => array('hero', 'side', 'layout', 'side by side', 'image', 'video', 'content', 'text', 'copy', 'body', 'content', 'page', 'build'),
    'supports'          => array(
        'jsx' => true, // allow inner blocks
        'anchor' => true,
        'align' => false,
        'align_text' => false,
        'align_content' => false
    ),
));
