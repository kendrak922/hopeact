<?php

// Register Block: Share
acf_register_block_type(array(
    'name'              => 'share',
    'title'             => __('Share'),
    'description'       => __('Share the page to FB/TW/LI'),
    'render_template'   => 'template-parts/blocks/_innerBlock/share/share.php',
    'category'          => $themeGlobals['guten_category'],
    'icon'              => 'share',
    'keywords'          => array('share', 'facebook', 'twitter', 'linkedin', 'text', 'copy', 'body', 'content', 'page', 'build'),
    'supports'          => array(
        'customClassName' => true,
        'anchor' => true,
        'align' => false,
        'align_text' => false,
        'align_content' => false
    ),
));
