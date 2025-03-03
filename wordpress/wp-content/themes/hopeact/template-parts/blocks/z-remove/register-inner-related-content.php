<?php

// Register Block: Related Content
acf_register_block_type(array(
    'name'              => 'related-content',
    'title'             => __('Related Content'),
    'description'       => __('Pull content with tags or select manually.'),
    'render_template'   => 'template-parts/blocks/_innerBlock/related-content/related-content.php',
    'category'          => $themeGlobals['guten_category'],
    'icon'              => 'tag',
    'keywords'          => array('news', 'resource','impact','research', 'card', 'query', 'dynamic', 'content', 'text', 'copy', 'body', 'content', 'page', 'build'),
    'supports'          => array(
        'customClassName' => true,
        'anchor' => true,
        'align' => false,
        'align_text' => false,
        'align_content' => false
    ),
));
