<?php

// Register Block: News/Events Latest
acf_register_block_type(array(
    'name'              => 'news-events-latest',
    'title'             => __('News/Events Latest'),
    'description'       => __('Pulls the 3 latest news and 3 upcoming (or recently passed) events'),
    'render_template'   => 'template-parts/blocks/news-events-latest/news-events-latest.php',
    'category'          => $themeGlobals['guten_category'],
    'icon'              => 'editor-table',
    'keywords'          => array('news', 'events', 'latest', 'listing', 'query', 'dynamic', 'content', 'text', 'copy', 'body', 'content', 'page', 'build'),
    'supports'          => array(
        'customClassName' => true,
        'anchor' => true,
        'align' => false,
        'align_text' => false,
        'align_content' => false
    ),
    'example'  => array(
        'attributes' => array(
            'mode' => 'preview',
            'data' => array(
                '_is_preview'   => 'true'
            )
        )
    ),
));
