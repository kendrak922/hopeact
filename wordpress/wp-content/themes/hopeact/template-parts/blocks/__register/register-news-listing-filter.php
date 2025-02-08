<?php

// Register Block: News Listing
acf_register_block_type(array(
    'name'              => 'news-listing-filter',
    'title'             => __('News Listing'),
    'description'       => __('Ajax listing of news articles, used on news index page'),
    'render_template'   => 'template-parts/blocks/news-listing-filter/news-listing-filter.php',
    'category'          => $themeGlobals['guten_category'],
    'icon'              => 'filter',
    'keywords'          => array('news', 'listing', 'query', 'dynamic', 'index', 'categories', 'filter', 'page', 'build'),
    'supports'          => array(
        'customClassName' => true,
        'anchor' => true,
        'align' => false,
        'align_text' => false,
        'align_content' => false
    ),
));
